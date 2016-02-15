<?php 
class Inspection extends CI_Model 
{
	function __construct()	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('upload');
	}

	function getInspectionItems($select='*',$id='',$isCustom='0', $isInspNameRequired='', $groupBy='')
	{
		$sql 		= "SELECT ".$select." FROM tbl_inspection_items AS tinspitem
					   LEFT JOIN tbl_inspection_item_regulation AS tinspitreg ON tinspitem.id = tinspitreg.in_item_id AND tinspitem.in_inspection_id = tinspitreg.in_inspection_id";

		if( $isInspNameRequired ) {
			if( $isCustom == 1 ) {
				$sql 	.=  " LEFT JOIN tbl_custom_inspection_links AS tcustinsplink ON tinspitem.in_inspection_id = tcustinsplink.in_custom_inspection_id";
				$sql 	.=  " RIGHT JOIN tbl_inspection AS tinsp ON (tinsp.id = tcustinsplink.in_inspection_id AND status=1 AND (date_inspection_end = '0000-00-00' OR date_inspection_end >= '".date('Y-m-d')."'))";
			}
			else {
				$sql 	.=  " RIGHT JOIN tbl_inspection AS tinsp ON (tinsp.id = tinspitem.in_inspection_id AND status=1 AND (date_inspection_end = '0000-00-00' OR date_inspection_end >= '".date('Y-m-d')."'))";
			}
		}
		$id ? $sql .= " WHERE tinspitem.in_inspection_id='".$id."'" : '';
		$sql .= " AND tinspitem.is_custom_inspection='".$isCustom."'";

		($groupBy) ? $sql .= ' GROUP BY '.$groupBy : '';
		
		// echo $sql;
		
		$query 		= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$rows 		= $query->result_array();
			if( $isInspNameRequired ) {
				$new_rows_insp_items = array();
				foreach( $rows AS $key_insp_items => $val_insp_items ) {
					$new_rows_insp_items[$val_insp_items['st_inspection_name']][$val_insp_items['item_id']][] = $val_insp_items;
				}
				return $new_rows_insp_items;
			}
			return $rows;
		}
	}
	
	function addUserCustomInspections( $arrInspCustom=array(), $selectedInspections=array() )
	{
		if(is_array($arrInspCustom)) {
			// Add Custom Inspection //
				// DISABLED because of Item#264: S1 INSPECTIONS - CUSTOMIZED - If any user creates one customized inspection, by dragging and dropping in the right frame, after purchased that system rightly displays it in My Inspections, HOWEVER system display this piece on S1 INSPECTIONS available for all users. A customized inspection by user should belongs only to the creator, it is not expected to be displayed on S1 INSPECTIONS. //
				$arr_ins_custinsp = array( 'st_custom_inspection_name' => $arrInspCustom['name'], 'in_user_id' => $this->session->userdata('userid'), 
											'st_language' => $arrInspCustom['language'], 'in_price' => $arrInspCustom['price'], 
											'in_earning_points' => $arrInspCustom['options']['Credits'], 'in_credits_buy' => $arrInspCustom['options']['Creditsbuy'], 'date_inspection_start' => date('Y-m-d h:i:s'), 'status' => '2' );
				$custom_insp_id = $this->parentdb->manageDatabaseEntry( 'tbl_custom_inspection', 'INSERT', $arr_ins_custinsp );

			// Add Custom Inspection Links for the current Customized Inspection //
				if( isset($arrInspCustom['name']) && sizeof($selectedInspections) > 0 && (int)$custom_insp_id ) {
					foreach($selectedInspections AS $val_custominsp ) {
						$selected_inspection 	= $this->common->escapeStr($val_custominsp);
						$arr_ins_custinsplinks 	= array( 'in_custom_inspection_id' => $custom_insp_id, 'in_inspection_id' => $selected_inspection );
						$this->parentdb->manageDatabaseEntry( 'tbl_custom_inspection_links', 'INSERT', $arr_ins_custinsplinks );
					}
				}
			return $custom_insp_id;
		}
	}
	

	function addInspection($table='', $files=array(), $isCustom='0')
	{
		$inspection_icon 		= '';
		$field_inspection_name 	= (1==$isCustom) ? "st_custom_inspection_name" : "st_inspection_name";

		foreach($_POST as $key=>$value) {
			if( !is_array($value) ) {
				$$key = $this->common->escapeStr($value);
				if( $key == 'rdb_inspection_icons' ) {
					$inspection_icon = $value;
				}
			}
		}

		$date_inspection_start 	= date("Y-m-d", strtotime($cmb_date_start));
		$date_inspection_end 	= (empty($cmb_date_end)||$cmb_date_end=="0000-00-00") ? '0000-00-00':date("Y-m-d", strtotime($cmb_date_end));

		if( isset($files) && $files ) {
			$inspection_icon = $this->common->escapeStr($files['url']);
		}

		// Add Inspection //
			$arr_ins_inspection = array( $field_inspection_name => $txt_inspection_name, 'st_icon_path' => $inspection_icon, 'st_language'=>$cmb_language, 
										'in_price'=>$txt_price, 'in_earning_points'=>$txt_earning_points, 'in_credits_buy'=>$cmb_creditsbuy, 
										'date_inspection_start'=>$date_inspection_start, 'date_inspection_end'=>$date_inspection_end, 'in_user_id'=>$this->sess_userid, 'status'=>$cmb_status );
			$inspection_id = $this->parentdb->manageDatabaseEntry( $table, 'INSERT', $arr_ins_inspection );

		// Add selected Inspection for the current Customized Inspection //
			if( isset($_POST['cmb_inspection_name']) ) {
				foreach($_POST['cmb_inspection_name'] AS $val_custominsp ) {
					$selected_inspection = $this->common->escapeStr( $val_custominsp );
					$arr_ins_custinsplinks 	= array( 'in_custom_inspection_id' => $inspection_id, 'in_inspection_id' => $selected_inspection );
					$this->parentdb->manageDatabaseEntry( 'tbl_custom_inspection_links', 'INSERT', $arr_ins_custinsplinks );
				}
			}

		// Add Inspection Items with Regulation details //
			if( isset($_POST['txt_item']) && is_array($_POST['txt_item']) ) {
				$this->parentdb->deleteSection('', "inspection item", $inspection_id);
				foreach($_POST['txt_item'] AS $key_inspitem => $val_inspitem ) {
					// Common::pr($_POST['txt_item']);//

					if( trim($val_inspitem) ) {
						$item_key = ($key_inspitem+1);

						// Get last insterted workplace information Inspection Id 
							$item_id 	= $this->users->getMetaDataList('inspection_items', '1=1', 'ORDER BY id DESC', 'id', '', '1');
							$item_id 	= isset($item_id) ? ($item_id[0]['id']+1) : '1';

						$arr_ins_inspitems 	= array( 'id'=>$item_id, 'st_item_name'=>$val_inspitem, 'in_inspection_id' => $inspection_id, 'is_custom_inspection' => $isCustom );
						$this->parentdb->manageDatabaseEntry( 'tbl_inspection_items', 'INSERT', $arr_ins_inspitems );

						foreach($_POST['cmb_regulation_number'][$item_key] AS $key_inspitemreg => $val_inspitemreg ) {
							$cmb_regulation_number 	= $this->common->escapeStr( $_POST['cmb_regulation_number'][$item_key][$key_inspitemreg] );
							$cmb_section 			= $this->common->escapeStr( $_POST['cmb_section'][$item_key][$key_inspitemreg] );
							$cmb_subsection 		= $this->common->escapeStr( $_POST['cmb_subsection'][$item_key][$key_inspitemreg] );
							$cmb_item 				= $this->common->escapeStr( $_POST['cmb_item'][$item_key][$key_inspitemreg] );
							$cmb_subitem 			= $this->common->escapeStr( $_POST['cmb_subitem'][$item_key][$key_inspitemreg] );

							$arr_ins_inspitemreg = array( 'in_item_id'=>$item_id, 'in_inspection_id' => $inspection_id, 'st_regulation_number' => $cmb_regulation_number, 
														'st_section' => $cmb_section, 'st_subsection' => $cmb_subsection, 'st_item' => $cmb_item, 
														'st_subitem' => $cmb_subitem, 'is_custom_inspection' => $isCustom );
							$this->parentdb->manageDatabaseEntry( 'tbl_inspection_item_regulation', 'INSERT', $arr_ins_inspitemreg );
						}
					}
				}
			}
		return true;
	}

	function updateInspectionByID($table='', $id='', $files=array(), $isCustom='0')
	{
		if( (int)$id ) {
			$upload_dir = (1 == $isCustom) ? $this->path_upload_custom_inspections : $this->path_upload_inspections;
			$inspection_icon = '';
			$field_inspection_name 	= (1==$isCustom) ? "st_custom_inspection_name" : "st_inspection_name";
			$field_icon = array();
			foreach($_POST as $key_post=>$value_post) {
				if( !is_array($value_post) ) {
					$$key_post = $this->common->escapeStr($value_post);
					if( $key_post == 'rdb_inspection_icons' ) {
						$inspection_icon = $value_post;
						$field_icon 	= array('st_icon_path'=>$inspection_icon);
					}
				}
			}

			$date_inspection_start 	= date("Y-m-d", strtotime($cmb_date_start));
			$date_inspection_end 	= (empty($cmb_date_end)||$cmb_date_end=="0000-00-00") ? '0000-00-00':date("Y-m-d", strtotime($cmb_date_end));    

			if( $files || $inspection_icon ) {
				if( $files ) {
					$inspection_icon= $this->common->escapeStr($files['url']);
					$field_icon 	= array('st_icon_path'=>$inspection_icon);
				}

				// Delete Inspection image physically // 
					$ret_inspections = $this->users->getMetaDataList($table,"id='".$id."'",'','st_icon_path');
					if( isset($ret_inspections) && sizeof($ret_inspections) ) {
						$arr_custom_insp 	= $ret_inspections[0]['st_icon_path'];
						$name_custom_insp 	= $this->common->getImagePathInfo($arr_custom_insp, 'filename');
						if( $custom_insp = glob(FCPATH.$upload_dir.$name_custom_insp.".*") ) {
							$arr_current_insp = explode("/", $custom_insp[0]);
							$sizeof_custom_insp = sizeof($arr_current_insp);
							isset($arr_current_insp[$sizeof_custom_insp-1]) ? unlink( FCPATH.$upload_dir.$arr_current_insp[$sizeof_custom_insp-1] ) : '';
						}
					}
			}

			// Update selected Inspection for the current Customized Inspection //
				if( 1 == $isCustom ) {
					$this->db->delete('tbl_custom_inspection_links', array('in_custom_inspection_id'=>$id));
					if( isset($_POST['cmb_inspection_name']) ) {
						foreach($_POST['cmb_inspection_name'] AS $val_custominsp ) {
							$selected_inspection 	= $this->common->escapeStr( $val_custominsp );
							$arr_ins_custinsplinks 	= array( 'in_custom_inspection_id' => $id, 'in_inspection_id' => $selected_inspection );
							$this->parentdb->manageDatabaseEntry( 'tbl_custom_inspection_links', 'INSERT', $arr_ins_custinsplinks );
						}
					}
				}

			// Update Inspection //
				$arr_upd_inspection = array( $field_inspection_name => $txt_inspection_name, 'st_language' => $cmb_language, 
											'in_price' => $txt_price, 'in_earning_points' => $txt_earning_points, 'in_credits_buy' => $cmb_creditsbuy, 
											'date_inspection_start' => $date_inspection_start, 'date_inspection_end' => $date_inspection_end, 
											'in_user_id'=>$this->sess_userid, 'status'=>$cmb_status );
				$arr_upd_inspection = array_merge($arr_upd_inspection, $field_icon);
				$arr_where_inspection = array('id' => $id);
				$this->parentdb->manageDatabaseEntry( "tbl_".$table, 'UPDATE', $arr_upd_inspection, $arr_where_inspection );

			// Add Inspection Items with Regulation details //
				if( isset($_POST['txt_item']) && is_array($_POST['txt_item']) ) {
					$this->parentdb->deleteSection('', "inspection item", $id); //die;
					
					foreach($_POST['txt_item'] AS $key_inspitem => $val_inspitem ) {
						if( trim($val_inspitem) ) {
							$item_key = ($key_inspitem);
							// Get last insterted workplace information Inspection Id 
								$item_id 	= $this->users->getMetaDataList('inspection_items', '1=1', 'ORDER BY id DESC', 'id', '', '1');
								$item_id 	= isset($item_id) ? ($item_id[0]['id']+1) : '1';

							$arr_ins_inspitems 	= array( 'id'=>$item_id, 'st_item_name'=>$val_inspitem, 'in_inspection_id' => $id, 'is_custom_inspection' => $isCustom );
							$this->parentdb->manageDatabaseEntry( 'tbl_inspection_items', 'INSERT', $arr_ins_inspitems );

							foreach($_POST['cmb_regulation_number'][$item_key] AS $key_inspitemreg => $val_inspitemreg ) {
								$cmb_regulation_number 	= $this->common->escapeStr( $_POST['cmb_regulation_number'][$item_key][$key_inspitemreg] );
								$cmb_section 			= $this->common->escapeStr( $_POST['cmb_section'][$item_key][$key_inspitemreg] );
								$cmb_subsection 		= $this->common->escapeStr( $_POST['cmb_subsection'][$item_key][$key_inspitemreg] );
								$cmb_item 				= $this->common->escapeStr( $_POST['cmb_item'][$item_key][$key_inspitemreg] );
								$cmb_subitem 			= $this->common->escapeStr( $_POST['cmb_subitem'][$item_key][$key_inspitemreg] );

								$arr_ins_inspitemreg = array( 'in_item_id'=>$item_id, 'in_inspection_id' => $id, 'st_regulation_number' => $cmb_regulation_number, 
															'st_section' => $cmb_section, 'st_subsection' => $cmb_subsection, 'st_item' => $cmb_item, 
															'st_subitem' => $cmb_subitem, 'is_custom_inspection' => $isCustom );
															
								// common::pr($arr_ins_inspitemreg);
								$this->parentdb->manageDatabaseEntry( 'tbl_inspection_item_regulation', 'INSERT', $arr_ins_inspitemreg );
							}
						}
					}
				}
				// die;
		}
		else {
			return false;
		}
	}
	

	// Inspection Workplace Information
		function addInspectionWorkplaceInfo( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				foreach( $arrPost as $key => $value ) {
					$$key = ($key=="cmb_jhsc_users" OR $key=="cmb_hs_rep_users") ? $this->common->escapeStr(json_encode($value)) : $this->common->escapeStr($value);
				}

				$checkInspectionInfo = $this->users->getMetaDataList( 'inspection_information', 'in_inspection_id = "'.$arrPost['inspection_id'].'"', '', 'in_inspection_info_id' );
				$txt_jhsc_username 	= isset($txt_jhsc_username) ? $txt_jhsc_username : '';
				$txt_hs_rep_username= isset($txt_hs_rep_username) ? $txt_hs_rep_username : '';

				$sql_mode = sizeof($checkInspectionInfo)>0 ? "UPDATE" : "INSERT";
				$arr_inspectioninfo = array( 'in_inspection_id' => $arrPost['inspection_id'], 'st_inspection_type' => $hidn_inspection_type, 
											'st_project_name' 	=> $txt_project_name, 'st_phase' => $txt_phase, 
											'st_area_inspected' => $txt_area_inspected, 'st_address' => $txt_address, 
											'st_phone' => $txt_phone, 'dt_datetime_inspection' => $txt_datetime_inspection,
											'st_workforce' => $txt_workforce, 'st_jhsc_users' => $cmb_jhsc_users, 'st_jhsc_username' => $txt_jhsc_username, 
											'st_hs_rep_users' => $cmb_hs_rep_users, 'st_hs_rep_username' => $txt_hs_rep_username, 
											'st_weather' => $txt_weather, 'st_accompanied_by' => $txt_accompanied_by );
				$arr_where_inspectioninfo = (sizeof($checkInspectionInfo)>0) ? array('in_inspection_id' => $arrPost['inspection_id']) : array();
				return $this->parentdb->manageDatabaseEntry( 'tbl_inspection_information', $sql_mode, $arr_inspectioninfo, $arr_where_inspectioninfo );
			}
		}

		
	// Add Inspection Item Information
		function addInspectionItemInfo( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$hidn_item_id 		= isset($arrPost['hidn_item_id']) ? $arrPost['hidn_item_id']: '';
				$hidn_inspection_id = isset($arrPost['hidn_inspection_id']) ? $arrPost['hidn_inspection_id'] : '';
				$arr_cntid 			= $hidn_item_id.$hidn_inspection_id;
				
				$cmb_s1members_connected=isset($arrPost['cmb_s1members_connected'][$arr_cntid])? $this->common->escapeStr(json_encode($arrPost['cmb_s1members_connected'][$arr_cntid])) :'';
				$txt_datetime_comply 	= isset($arrPost['txt_datetime_comply'][$arr_cntid]) ? $this->common->escapeStr($arrPost['txt_datetime_comply'][$arr_cntid]) : '';
				$txt_location 			= isset($arrPost['txt_location'][$arr_cntid]) ? $this->common->escapeStr($arrPost['txt_location'][$arr_cntid]) : '';
				$txt_notes 				= isset($arrPost['txt_notes'][$arr_cntid]) ? $this->common->escapeStr($arrPost['txt_notes'][$arr_cntid]) : '';
				$txt_actions 			= isset($arrPost['txt_actions'][$arr_cntid]) ? $this->common->escapeStr($arrPost['txt_actions'][$arr_cntid]) : '';

				$item_status = "failed";

				$checkInspectionItemInfo= $this->users->getMetaDataList('inspection_item_information', 'in_item_id="'.$hidn_item_id.'" AND in_inspection_id="'.$hidn_inspection_id.'"', '', 'in_item_information_id' );
				
				$sql_mode = sizeof($checkInspectionItemInfo)>0 ? "UPDATE" : "INSERT";
				$arr_inspiteminfo = array( 'in_item_id' => $hidn_item_id, 'in_inspection_id' => $hidn_inspection_id, 
											'dt_datetime_comply' => $txt_datetime_comply, 'st_users_action_required' => $cmb_s1members_connected, 
											'st_location' => $txt_location, 'st_notes' => $txt_notes, 
											'st_actions' => $txt_actions, 'st_item_status' => $item_status );
				$arr_where_inspiteminfo = (sizeof($checkInspectionItemInfo)>0) ? array('in_inspection_id'=>$hidn_inspection_id,'in_item_id'=>$hidn_item_id):array();
				$this->parentdb->manageDatabaseEntry( 'tbl_inspection_item_information', $sql_mode, $arr_inspiteminfo, $arr_where_inspiteminfo );
				
				// Send message to Connected Members, JHSC users and H&S REP users //
					$rows_s1member_connected= $arrPost['cmb_s1members_connected'][$arr_cntid];
					$rows_s1member_connected= isset($rows_s1member_connected) ? $rows_s1member_connected : array();

					$rows_jhsc_hsrep_users 	= $this->users->getMetaDataList('inspection_information','in_inspection_id = "'.$hidn_inspection_id.'"','','st_jhsc_users, st_hs_rep_users');
					$jhsc_users 	= isset($rows_jhsc_hsrep_users[0]['st_jhsc_users']) ? json_decode($rows_jhsc_hsrep_users[0]['st_jhsc_users']) : array();
					$hs_rep_users 	= isset($rows_jhsc_hsrep_users[0]['st_hs_rep_users']) ? json_decode($rows_jhsc_hsrep_users[0]['st_hs_rep_users']) : array();
					$rows_item_action_users = array_unique( array_merge($rows_s1member_connected, $jhsc_users, $hs_rep_users) );
					
					$employers_assigned_users = array();
					if( sizeof($rows_s1member_connected) ) {
						foreach( $rows_s1member_connected AS $val_email ) {
							$getUser = $this->users->getUserByID('"'.$val_email.'"','id', 1);
							$get_employers = $this->users->getEmployersFromUserId($getUser[0]['id'], 'email_addr');
							
							foreach( $get_employers AS $val ) {
								array_push($employers_assigned_users, $val['email_addr']);
							}
						}
					}
					$rows_item_action_users = array_unique( array_merge($employers_assigned_users, $rows_s1member_connected, $jhsc_users, $hs_rep_users) );
					
					$inspection_name	= $arrPost['hidn_inspection_name'][$arr_cntid];
					$regulation_details = $this->regulation->getRegContentsFromInspectionItem( $arrPost['hidn_item_id'] );

					$subject = "Corrective Action Requested";
					$body= "First and last name: ".$this->session->userdata("nickname");
					$body.= "\nInspection name: ".$inspection_name;
					$body.= "\nSection name: ";$body .= isset($regulation_details['st_section']) ? $regulation_details['st_section'] : '';
					$body.= "\nItem: ";$body .= isset($regulation_details['st_item']) ? $regulation_details['st_item'] : '';
					$body.= "\nContent: ";$body .= isset($regulation_details['st_content']) ? $regulation_details['st_content'] : '';
					$body.= "\nDate&Time to comply: ".$txt_datetime_comply;
					$body.= "\nLocation: ".$txt_location;
					$body.= "\nNotes: ".$txt_notes;
					$body.= "\nActions: ".$txt_actions;

					foreach( $rows_item_action_users AS $val_email ) {
						$arr_ins_message = array( 'send_to' => $val_email, 'send_from' => $this->session->userdata("username"), 'subject' => $subject, 'message' => $body );
						$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
						$this->users->sendEmailToS1user($val_email, $this->session->userdata("username"), $subject, $body );
					}
					return true;
			}
		}

	// Advanced inspection Workplace Information //
		function addAdvancedInspectionWorkplaceInfo( $arrPost=array() )
		{
			// common::pr( $arrPost );die;

			if( is_array($arrPost) ) {
				foreach( $arrPost as $key => $value ) {
					if( !is_array($value) ) {
						$$key = $this->common->escapeStr($value);
					}
				}
				$checkInspectionInfo = $this->users->getMetaDataList( 'inspection_advanced_consultant', 'id="'.$arrPost['inspection_id'].'"', '', 'id' );
				//common::pr( $checkInspectionInfo );die;

				$sql_mode = sizeof($checkInspectionInfo)>0 ? "UPDATE" : "INSERT";
				$arr_inspectioninfo = array( 'in_consultant_id' => $arrPost['consultant_id'], 'in_client_id' => $client_id, 'st_title' => $txt_advinspection_title, 
											'st_project_name' => $txt_project_name, 'dt_datetime_inspection' => $txt_datetime_inspection, 
											'in_inspection_completed_by' => $this->sess_userid, 'st_inspection_type' => $rdb_inspection_type, 
											'st_constructor_name' => $txt_constructor_name, 'st_location' => $txtarea_location, 
											'st_site_supervisor' => $txt_site_supervisor, 'st_weather_condition' => $rdb_weather, 'st_action'=>$arrPost['submit_action'] );

				$arr_where_inspectioninfo = (sizeof($checkInspectionInfo)>0) ? array('id' => $arrPost['inspection_id']) : array();
				return $this->parentdb->manageDatabaseEntry( 'tbl_inspection_advanced_consultant', $sql_mode, $arr_inspectioninfo, $arr_where_inspectioninfo );
			}
		}

		function addAdvancedInspectionItems($arrPost)
		{
			// common::pr($arrPost);die;

			if( is_array($arrPost) ) {
				// Add/Update Inspection Items //
				if( isset($arrPost['cmb_my_clients']) && is_array($arrPost['cmb_my_clients']) ) {
					// Get last insterted workplace information Inspection Id 
						$inspection_id = $this->users->getMetaDataList('inspection_advanced_consultant', '1=1', 'ORDER BY id DESC', 'id', '', '1');
						$inspection_id = isset($inspection_id) ? $inspection_id[0]['id'] : '1';

					foreach($arrPost['cmb_my_clients'] AS $key_inspitem => $val_inspitem ) {
						if( "new" == $key_inspitem && is_array($val_inspitem) ) {
							foreach($val_inspitem AS $key_newinspitem => $val_newinspitem ) {
								
								if( isset($arrPost['cmb_regulation_number']) ) {
									$reg_no 	= isset($arrPost['cmb_regulation_number']['new'][$key_newinspitem]) ? $arrPost['cmb_regulation_number']['new'][$key_newinspitem] : '';
									$section 	= isset($arrPost['cmb_section']['new'][$key_newinspitem]) ? $arrPost['cmb_section']['new'][$key_newinspitem] : '';
									$subsection = isset($arrPost['cmb_subsection']['new'][$key_newinspitem]) ? $arrPost['cmb_subsection']['new'][$key_newinspitem] : '';
									$item 		= isset($arrPost['cmb_item']['new'][$key_newinspitem]) ? $arrPost['cmb_item']['new'][$key_newinspitem] : '';
									$subitem 	= isset($arrPost['cmb_subitem']['new'][$key_newinspitem]) ? $arrPost['cmb_subitem']['new'][$key_newinspitem] : '';

									$arr_insp_regulations['regtitle'] 	= $reg_no;
									$arr_insp_regulations['section'] 	= $section;
									$arr_insp_regulations['subsection']	= $subsection;
									$arr_insp_regulations['item'] 		= $item;
									$arr_insp_regulations['subitem'] 	= $subitem;				
								}
								$regulation_data 	= isset($arr_insp_regulations) ? json_encode($arr_insp_regulations) : '';
								// echo "<br>".$regulation_data;
								
								$contravention_observation_content 	= $this->common->escapeStr( $arrPost['txtarea_contravention_observation'][$key_inspitem][$key_newinspitem] );
								$contravention_observation 		= $this->common->escapeStr( $arrPost['rdb_contravention_observation'][$key_inspitem][$key_newinspitem] );
								$my_clients 		= $this->common->escapeStr( $arrPost['cmb_my_clients'][$key_inspitem][$key_newinspitem] );
								$nons1_notconnected_employer 	= $this->common->escapeStr( $arrPost['txt_nons1_notconnected_employer'][$key_inspitem][$key_newinspitem] );
								$compliance_type 	= $this->common->escapeStr( $arrPost['rdb_compliance_type'][$key_inspitem][$key_newinspitem] );
								$compliance_date 	= $this->common->escapeStr( $arrPost['txt_compliance_date'][$key_inspitem][$key_newinspitem] );
								$item_summary 		= $this->common->escapeStr( $arrPost['txtarea_item_summary'][$key_inspitem][$key_newinspitem] );

								$arr_ins_inspitem 	= array( 'in_consultant_id' => $arrPost['consultant_id'], 'in_client_id' => $arrPost['client_id'], 
														'in_inspection_id' 	=> $inspection_id, 
														'st_regulation_data' => $regulation_data, 'st_contravention_observation_contents' => $contravention_observation_content, 
														'st_contravention_observation' => $contravention_observation, 'in_employer_selected' => $my_clients, 'st_nons1_notconnected_employer' => $nons1_notconnected_employer, 
														'st_compliance_type' => $compliance_type, 
														'dt_compliance_date' => $compliance_date, 'st_item_summary' => $item_summary );
								$this->parentdb->manageDatabaseEntry( 'tbl_inspection_items_advanced_consultant', 'INSERT', $arr_ins_inspitem );
							}
						}
						else {
							if( isset($arrPost['cmb_regulation_number']) ) {
									$reg_no 	= isset($arrPost['cmb_regulation_number'][$key_inspitem][0]) ? $arrPost['cmb_regulation_number'][$key_inspitem][0] : '';
									$section 	= isset($arrPost['cmb_section'][$key_inspitem][0]) ? $arrPost['cmb_section'][$key_inspitem][0] : '';
									$subsection = isset($arrPost['cmb_subsection'][$key_inspitem][0]) ? $arrPost['cmb_subsection'][$key_inspitem][0] : '';
									$item 		= isset($arrPost['cmb_item'][$key_inspitem][0]) ? $arrPost['cmb_item'][$key_inspitem][0] : '';
									$subitem 	= isset($arrPost['cmb_subitem'][$key_inspitem][0]) ? $arrPost['cmb_subitem'][$key_inspitem][0] : '';

									$arr_insp_regulations['regtitle'] 	= $reg_no;
									$arr_insp_regulations['section'] 	= $section;
									$arr_insp_regulations['subsection']	= $subsection;
									$arr_insp_regulations['item'] 		= $item;
									$arr_insp_regulations['subitem'] 	= $subitem;				
								}
								$regulation_data 	= isset($arr_insp_regulations) ? json_encode($arr_insp_regulations) : '';
								// echo "<br>".$regulation_data;
								
							$contravention_observation_content 	= $this->common->escapeStr( $arrPost['txtarea_contravention_observation'][$key_inspitem] );
							$contravention_observation 		= $this->common->escapeStr( $arrPost['rdb_contravention_observation'][$key_inspitem] );
							$my_clients 		= $this->common->escapeStr( $arrPost['cmb_my_clients'][$key_inspitem] );
							$nons1_notconnected_employer 	= isset($arrPost['txt_nons1_notconnected_employer'][$key_inspitem]) ? $this->common->escapeStr($arrPost['txt_nons1_notconnected_employer'][$key_inspitem]) : '';
							$compliance_type 	= $this->common->escapeStr( $arrPost['rdb_compliance_type'][$key_inspitem] );
							$compliance_date 	= $this->common->escapeStr( $arrPost['txt_compliance_date'][$key_inspitem] );
							$item_summary 		= $this->common->escapeStr( $arrPost['txtarea_item_summary'][$key_inspitem] );

							$edit_insp_item_id 	= $key_inspitem;

							$arr_upd_inspitem 	= array( 'st_regulation_data' => $regulation_data, 'st_contravention_observation_contents' => $contravention_observation_content, 
														'st_contravention_observation' => $contravention_observation, 'in_employer_selected' => $my_clients, 'st_nons1_notconnected_employer' => $nons1_notconnected_employer,
														'st_compliance_type' => $compliance_type, 
														'dt_compliance_date' => $compliance_date, 'st_item_summary' => $item_summary );
							$arr_where_inspitem = array('id' => $edit_insp_item_id);
							$this->parentdb->manageDatabaseEntry( 'tbl_inspection_items_advanced_consultant', 'UPDATE', $arr_upd_inspitem, $arr_where_inspitem );
						}
					}

					// Update Advance Inspection status //
						$arr_upd_advinspection 		= array( 'st_action' => $arrPost['submit_action'] );
						$arr_where_advinspection 	= array( 'id' => $inspection_id );
						$this->parentdb->manageDatabaseEntry( 'tbl_inspection_advanced_consultant', 'UPDATE', $arr_upd_advinspection, $arr_where_advinspection );

					$this->libraries->addConsultantPerformedLibrary($arrPost['client_id'], 'new_inspection', $inspection_id, $arrPost['submit_action'] );
				}
			}
		}

	

	function updateInspectionItemStatus($arrPost=array())
	{
		$item_status 	= isset($arrPost['itemStatus']) ? $arrPost['itemStatus'] : '';
		$item_id 		= isset($arrPost['itemId']) ? $arrPost['itemId'] : '';
		$inspection_id 	= isset($arrPost['inspectionId']) ? $arrPost['inspectionId'] : '';
		
		$checkInspectionItemInfo = $this->users->getMetaDataList( 'inspection_item_information', 'in_item_id="'.$item_id.'" AND in_inspection_id="'.$inspection_id.'"', '', 'in_item_information_id, st_item_status' );

		$sql_mode = sizeof($checkInspectionItemInfo)>0 ? "UPDATE" : "INSERT";
		$arr_inspiteminfo = array( 'in_item_id' => $item_id, 'in_inspection_id' => $inspection_id, 'st_item_status' => $item_status );
		$arr_where_inspiteminfo = (sizeof($checkInspectionItemInfo)>0) ? array('in_inspection_id'=>$inspection_id, 'in_item_id'=>$item_id) : array();
		$query = $this->parentdb->manageDatabaseEntry( 'tbl_inspection_item_information', $sql_mode, $arr_inspiteminfo, $arr_where_inspiteminfo );

		// "Corrective Action Accomplished" message to Connected Members, JHSC users and H&S REP users //
			if( "ok" == $item_status && "failed" == $checkInspectionItemInfo[0]['st_item_status'] ) {
				$rows_item_assigned_users = $this->users->getMetaDataList( 'inspection_item_information','in_inspection_id="'.$inspection_id.'" AND in_item_id="'.$item_id.'"', '', 'st_users_action_required' );
				$rows_item_assigned_users = json_decode( $rows_item_assigned_users[0]['st_users_action_required'] );

				$rows_jhsc_hsrep_users 	= $this->users->getMetaDataList( 'inspection_information','in_inspection_id="'.$inspection_id.'"', '', 'st_jhsc_users, st_hs_rep_users' );
				$jhsc_users 	= isset($rows_jhsc_hsrep_users[0]['st_jhsc_users']) ? json_decode($rows_jhsc_hsrep_users[0]['st_jhsc_users']) : array();
				$hs_rep_users 	= isset($rows_jhsc_hsrep_users[0]['st_hs_rep_users']) ? json_decode($rows_jhsc_hsrep_users[0]['st_hs_rep_users']) : array();
				$rows_item_action_users = array_unique( array_merge($rows_item_assigned_users, $jhsc_users, $hs_rep_users) );

				$inspection_name	= $arrPost['hidn_inspection_name'][$arr_cntid];
				$regulation_details = $this->regulation->getRegContentsFromInspectionItem( $item_id );

				$subject = "Corrective Action Accomplished";
				$body= "Thanks for your job! ".implode(", ", $rows_item_assigned_users);
				$body.= "\nthe corrective action under inspection: ".$inspection_name;
				$body.= "\nSection name: ";$body .= isset($regulation_details['st_section']) ? $regulation_details['st_section'] : '';
				$body.= "\nItem: ";$body .= isset($regulation_details['st_item']) ? $regulation_details['st_item'] : '';
				$body.= "\nContent: ";$body .= isset($regulation_details['st_content']) ? $regulation_details['st_content'] : '';
				$body.= "\nhas been done and already inspected by the user: ".$this->session->userdata("nickname");
				
				foreach( $rows_item_action_users AS $val_email ) {
					$arr_ins_message = array( 'send_to' => $val_email, 'send_from' => $this->session->userdata("username"), 'subject' => $subject, 'message' => $body );
					$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
					$this->users->sendEmailToS1user($val_email, $this->session->userdata("username"), $subject, $body );
				}
			}
		return true;
	}

	function updateInspectionStatus($inspectionId='', $valInspItemStatus='', $inspectionType='')
	{
		$consultant_client_id = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
		
		if( "normal" == $inspectionType ) {
			if( sizeof($valInspItemStatus) <= 0 ) {
				$insp_status = '';
			}
			else {
				$insp_status = '';
				foreach( $valInspItemStatus AS $val_insp_item ) {
					("ok" != $val_insp_item['st_item_status']) ? $insp_status = "inprogress" : '';
				}
				$insp_status = (!$insp_status) ? "completed" : $insp_status;
			}
			$arr_upd_inspection 	= array( 'st_inspection_status' => $insp_status, 'in_user_id'=>$this->sess_userid, 'date_completed'=>date('Y-m-d') );
			$arr_where_inspection 	= array( 'id' => $inspectionId );
			$this->parentdb->manageDatabaseEntry( 'tbl_inspection', 'UPDATE', $arr_upd_inspection, $arr_where_inspection );
		}
		else {
			$insp_status 		= 'completed';
			$arr_upd_custinsp 	= array( 'st_inspection_status'=>$insp_status, 'in_user_id'=>$this->session->userdata['userid'], 'date_completed'=>date('Y-m-d') );
			$arr_where_custinsp	= array( 'id' => $inspectionId );
			$this->parentdb->manageDatabaseEntry( 'tbl_custom_inspection', 'UPDATE', $arr_upd_custinsp, $arr_where_custinsp );
		}

		// ADD/EDIT Consultant performed Information //
			$this->libraries->addConsultantPerformedLibrary($consultant_client_id, $inspectionType.'_inspection', $inspectionId, $insp_status );

		return true;						
	}
}
?>