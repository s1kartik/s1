<?php 
class Safetytalks extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('upload');
	}

	///////////////  START - SAFETY TALKS //////////////////////
		function addSafetytalks($table='', $files=array(), $isCustom='0')
		{
			$safetytalks_icon 		= '';

			foreach($_POST as $key=>$value) {
				if( !is_array($value) ) {
					$$key = $this->common->escapeStr($value);
					if( $key == 'rdb_safetytalks_icons' ) {
						$safetytalks_icon = $value;
					}
				}
			}
			$date_safetytalks_start = isset($cmb_date_start) ? date("Y-m-d", strtotime($cmb_date_start)) : date('Y-m-d');
			$date_safetytalks_end 	= (empty($cmb_date_end)||$cmb_date_end=="0000-00-00") ? '0000-00-00':date("Y-m-d", strtotime($cmb_date_end));

			if( isset($files) && $files ) {
				$safetytalks_icon = $this->common->escapeStr($files['url']);
			}
			$txt_safetytalks_name = isset($txt_safetytalks_name) ? $txt_safetytalks_name : 'new safety talks';
			$cmb_language 	= isset($cmb_language) ? $cmb_language : 'EN';
			$cmb_status 	= isset($cmb_status) ? $cmb_status : '1';

			if( 1 == $isCustom ) {
				$arr_add_safetytalks = array('st_custom_safetytalks_name'=>$txt_safetytalks_name, 'in_industry_id'=>$industry_id, 'in_section_id'=>$section_id, 'in_trade_id'=>$trade_id, 'in_user_id'=>$this->sess_userid);
			}
			else {
				$arr_add_safetytalks = array('st_safetytalks_topic'=>$txt_safetytalks_name, 'st_icon_path'=>$safetytalks_icon, 'in_user_id'=>$this->sess_userid);
			}
			
			// Add safetytalks //
				$arr_ins_safetytalks = array( 'st_language' => $cmb_language, 'date_safetytalks_start' => $date_safetytalks_start,
											'date_safetytalks_end' => $date_safetytalks_end, 'status' => $cmb_status);
				$arr_ins_safetytalks = array_merge($arr_add_safetytalks,$arr_ins_safetytalks);
				$safetytalks_id = $this->parentdb->manageDatabaseEntry( $table, 'INSERT', $arr_ins_safetytalks );

			// Add safetytalks image
				if( !$isCustom ) {
					if( isset($_FILES['safetytalks_image']['name']) )  {
						foreach( $_FILES['safetytalks_image']['name'] AS $key_image => $val_image ) {
							if( $val_image ) {
								$_FILES['userfile']['tmp_name'] 	=  $_FILES['safetytalks_image']['tmp_name'][$key_image];
								$_FILES['userfile']['name'] 		=  $_FILES['safetytalks_image']['name'][$key_image];
								$_FILES['userfile']['size'] 		=  $_FILES['safetytalks_image']['size'][$key_image];
								$_FILES['userfile']['type'] 		=  $_FILES['safetytalks_image']['type'][$key_image];
								$_FILES['userfile']['error'] 		=  $_FILES['safetytalks_image']['error'][$key_image];
											
								$ext_img	 	= $this->common->getImagePathInfo( $val_image, 'extension' );
								$next_row_id 	= $this->parentdb->getLastRowId('tbl_safetytalks_image_video');							
								$safety_image_name = "safetytalks_".$safetytalks_id."_image_".$next_row_id.".".$ext_img;

								// Delete the existing Safetytalks image if available //
									if( $safetytalks_image = glob(FCPATH.$this->path_upload_safetytalks_image."safetytalks_".$safetytalks_id."_image_".$next_row_id.".*") ) {
										$arr_safetytalks_image = explode("/", $safetytalks_image[0]);
										isset($arr_safetytalks_image[sizeof($arr_safetytalks_image)-1]) ? unlink( FCPATH.$this->path_upload_safetytalks_image.$arr_safetytalks_image[sizeof($arr_safetytalks_image)-1] ) : '';
									}

								// Add new safetytalks image //
									$arr_ins_safetyimgvid = array( 'in_safetytalks_id' => $safetytalks_id, 'in_safetytalks_image_video' => '1', 
																'st_safetytalks_image_video' => $safety_image_name );
									$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'INSERT', $arr_ins_safetyimgvid );

								// Upload the Safetytalks Image //
									$this->upload->initialize($this->common->setUploadOptions($this->path_upload_safetytalks_image, $safety_image_name));
									if( !$this->upload->do_upload() ) {
										echo $upload_error = $this->upload->display_errors("<span class='error'>", "</span>");
									}
							}
						}
					}
				
					// Add safetytalks video
						if( isset($_POST['safetytalks_video']) && $_POST['safetytalks_video'][0] ) {
							foreach($_POST['safetytalks_video'] AS $val_safetytalks_video ) {
								// Add new safetytalks video //
									$arr_ins_safetyimgvid = array( 'in_safetytalks_id' => $safetytalks_id, 'in_safetytalks_image_video' => '2', 
																'st_safetytalks_image_video' => $val_safetytalks_video );
									$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'INSERT', $arr_ins_safetyimgvid );
							}
						}
				}
		
			// Add selected safetytalks for the current Customized safetytalks //
				if( isset($_POST['cmb_safetytalks_name']) ) {
					foreach($_POST['cmb_safetytalks_name'] AS $val_custom_safetytalks ) {
						$selected_safetytalks 		= $this->common->escapeStr( $val_custom_safetytalks );
						$arr_ins_custom_safetylinks = array( 'in_custom_safetytalks_id' => $safetytalks_id, 'in_safetytalks_id' => $selected_safetytalks );
						$this->parentdb->manageDatabaseEntry( 'tbl_custom_safetytalks_links', 'INSERT', $arr_ins_custom_safetylinks );
					}
				}

			// Add safetytalks Items //
				if( isset($_POST['txt_item']) && is_array($_POST['txt_item']) ) {
					foreach($_POST['txt_item'] AS $key_safetyitem => $val_safetyitem ) {
						$txt_item = $this->common->escapeStr( $_POST['txt_item'][$key_safetyitem] );
						if( trim($txt_item) ) {
							$arr_ins_safetyitems = array( 'st_item_name' => $txt_item, 'in_safetytalks_id' => $safetytalks_id );
							$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_items', 'INSERT', $arr_ins_safetyitems );
						}
					}
				}
			return $safetytalks_id;
		}

		function updateSafetytalksByID($table='', $id='', $files=array(), $isCustom='0')
		{
			if( (int)$id ) {
				$upload_dir = (1 == $isCustom) ? $this->path_upload_custom_safetytalks : $this->path_upload_safetytalks;
				$safetytalks_icon = '';
				
				$field_icon = array();
				foreach($_POST as $key_post=>$value_post) {
					if( !is_array($value_post) ) {
						$$key_post = $this->common->escapeStr($value_post);
						if( $key_post == 'rdb_safetytalks_icons' ) {
							$safetytalks_icon = $value_post;
							$field_icon 	= array('st_icon_path'=>$safetytalks_icon);
						}
					}
				}

				$date_safetytalks_start 	= date("Y-m-d", strtotime($cmb_date_start));
				$date_safetytalks_end 	= (empty($cmb_date_end)||$cmb_date_end=="0000-00-00") ? '0000-00-00':date("Y-m-d", strtotime($cmb_date_end));    

				if( $files || $safetytalks_icon ) {
					if( $files ) {
						$safetytalks_icon= $this->common->escapeStr($files['url']);
						$field_icon 	= array('st_icon_path'=>$safetytalks_icon);
					}
					
					// Delete Safetytalks Icon physically // 
						$ret_safetytalks_icons = $this->users->getMetaDataList($table,"id='".$id."'",'','st_icon_path');
						if( isset($ret_safetytalks_icons) && sizeof($ret_safetytalks_icons) ) {
							$arr_safety_icon 	= $ret_safetytalks_icons[0]['st_icon_path'];
							$name_safety_icon 	= $this->common->getImagePathInfo($arr_safety_icon, 'filename');
							if( $safety_icon = glob(FCPATH.$upload_dir.$name_safety_icon.".*") ) {
								$arr_current_icon = explode("/", $safety_icon[0]);
								$sizeof_current_icon = sizeof($arr_current_icon);
								isset($arr_current_icon[$sizeof_current_icon-1]) ? unlink( FCPATH.$upload_dir.$arr_current_icon[$sizeof_current_icon-1] ) : '';
							}
						}
				}
				
				// Add safetytalks image
					if( !$isCustom ) {
						if( isset($_FILES['safetytalks_image']['name']) )  {
							foreach( $_FILES['safetytalks_image']['name'] AS $key_safety_image => $val_safety_image ) {
								if( "new" == $key_safety_image ) {
									foreach( $val_safety_image AS $key_new_safety_image => $val_new_safety_image ) {
										if( $val_new_safety_image ) {
											$_FILES['userfile']['tmp_name'] 	=  $_FILES['safetytalks_image']['tmp_name']['new'][$key_new_safety_image];
											$_FILES['userfile']['name'] 		=  $_FILES['safetytalks_image']['name']['new'][$key_new_safety_image];
											$_FILES['userfile']['size'] 		=  $_FILES['safetytalks_image']['size']['new'][$key_new_safety_image];
											$_FILES['userfile']['type'] 		=  $_FILES['safetytalks_image']['type']['new'][$key_new_safety_image];
											$_FILES['userfile']['error'] 		=  $_FILES['safetytalks_image']['error']['new'][$key_new_safety_image];
											$ext_img	 	= $this->common->getImagePathInfo( $val_new_safety_image, 'extension' );
											$next_row_id 	= $this->parentdb->getLastRowId('tbl_safetytalks_image_video');							
											$safety_image_name = "safetytalks_".$id."_image_".$next_row_id.".".$ext_img;

											// Delete the existing Safetytalks image if available //
												if( $safetytalks_image = glob(FCPATH.$this->path_upload_safetytalks_image."safetytalks_".$id."_image_".$next_row_id.".*") ) {
													$arr_safetytalks_image = explode("/", $safetytalks_image[0]);
													isset($arr_safetytalks_image[sizeof($arr_safetytalks_image)-1]) ? unlink( FCPATH.$this->path_upload_safetytalks_image.$arr_safetytalks_image[sizeof($arr_safetytalks_image)-1] ) : '';
												}
												
												// Insert new safetytalks image //
													$arr_ins_safetyimg = array( 'in_safetytalks_id' => $id, 'in_safetytalks_image_video' => '1', 
																				'st_safetytalks_image_video' => $safety_image_name );
													$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'INSERT', $arr_ins_safetyimg );

											// Upload the Safetytalks Image //
												$this->upload->initialize($this->common->setUploadOptions($this->path_upload_safetytalks_image, $safety_image_name));
												echo (!$this->upload->do_upload()) ? $upload_error = $this->upload->display_errors("<span class='error'>", "</span>") : '';
										}
									}
								}
								else {
									if( $val_safety_image ) {
										$_FILES['userfile']['tmp_name'] 	=  $_FILES['safetytalks_image']['tmp_name'][$key_safety_image];
										$_FILES['userfile']['name'] 		=  $_FILES['safetytalks_image']['name'][$key_safety_image];
										$_FILES['userfile']['size'] 		=  $_FILES['safetytalks_image']['size'][$key_safety_image];
										$_FILES['userfile']['type'] 		=  $_FILES['safetytalks_image']['type'][$key_safety_image];
										$_FILES['userfile']['error'] 		=  $_FILES['safetytalks_image']['error'][$key_safety_image];
										$ext_img	 	= $this->common->getImagePathInfo( $val_safety_image, 'extension' );
										$safety_image_name = "safetytalks_".$id."_image_".$key_safety_image.".".$ext_img;

										if($safetytalks_image=glob(FCPATH.$this->path_upload_safetytalks_image."safetytalks_".$id."_image_".$key_safety_image.".*")) {
											$arr_safetytalks_image = explode("/", $safetytalks_image[0]);
											if( isset($arr_safetytalks_image[sizeof($arr_safetytalks_image)-1]) ) {
												unlink( FCPATH.$this->path_upload_safetytalks_image.$arr_safetytalks_image[sizeof($arr_safetytalks_image)-1] );
											}
										}

										// Update safetytalks image //
											$arr_upd_safetyimg 	= array( 'st_safetytalks_image_video' => $safety_image_name );
											$arr_where_safetyimg= array( 'in_safetytalks_id' => $id, 'id'=>$key_safety_image, 'in_safetytalks_image_video'=>'1' );
											$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'UPDATE', $arr_upd_safetyimg, $arr_where_safetyimg );

										// Upload the Safetytalks Image //
											$this->upload->initialize($this->common->setUploadOptions($this->path_upload_safetytalks_image, $safety_image_name));
											echo (!$this->upload->do_upload()) ? $upload_error = $this->upload->display_errors("<span class='error'>", "</span>") : '';
									}
								}
							}
						}

					// Add safetytalks video
						if( isset($_POST['safetytalks_video']) ) {
							$upd_safetyvideo = 0;
							foreach($_POST['safetytalks_video'] AS $key_safety_video => $val_safety_video ) {
								if( "new" == $key_safety_video ) {
									foreach($val_safety_video AS $key_new_safety_video => $val_new_safety_video ) {
										if( $val_new_safety_video ) {
											// Add Safetytalks video //
											$arr_ins_safetyvid = array( 'in_safetytalks_id'=>$id, 'in_safetytalks_image_video'=>'2', 'st_safetytalks_image_video'=>$val_new_safety_video );
											$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'INSERT', $arr_ins_safetyvid );
										}
									}
								}
								else {
									if( $val_safety_video ) {
										// Update Safetytalks Video //
											$arr_upd_safetyvid 	= array( 'st_safetytalks_image_video' => $val_safety_video );
											$arr_where_safetyvid= array( 'id'=>$key_safety_video, 'in_safetytalks_id' => $id, 'in_safetytalks_image_video'=>'2' );
											$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_image_video', 'UPDATE', $arr_upd_safetyvid, $arr_where_safetyvid );

										// Delete videos which selects as deleted
											$this->db->delete('tbl_safetytalks_image_video');
											$this->db->where(array('id != '=>$key_safety_video, 'in_safetytalks_id'=>$id, 'in_safetytalks_image_video'=>'2'));
									}
								}
							}
						}						
					}
			

				// Update selected safetytalks for the current Customized safetytalks //
					if( 1 == $isCustom ) {
						$this->db->delete('tbl_custom_safetytalks_links', array('in_custom_safetytalks_id'=>$id));

						if( isset($_POST['cmb_safetytalks_name']) ) {
							foreach($_POST['cmb_safetytalks_name'] AS $val_customsafety ) {
								$selected_safetytalks = $this->common->escapeStr( $val_customsafety );
								$arr_ins_custom_safetylinks = array( 'in_custom_safetytalks_id' => $id, 'in_safetytalks_id' => $selected_safetytalks );
								$this->parentdb->manageDatabaseEntry( 'tbl_custom_safetytalks_links', 'INSERT', $arr_ins_custom_safetylinks );
							}
						}
					}

					// Update safetytalks //
					$field_safetytalks_name = (1==$isCustom) ? "st_custom_safetytalks_name" : "st_safetytalks_topic";
					
					if( 1 == $isCustom ) {
						$arr_edit_safetytalks = array('in_industry_id'=>$industry_id, 'in_section_id'=>$section_id, 'in_trade_id'=>$trade_id);
					}
					else {
						$arr_edit_safetytalks = $field_icon;
					}

					$arr_upd_safetytalks 	= array( $field_safetytalks_name=>$txt_safetytalks_name, 'st_language'=>$cmb_language, 'date_safetytalks_start'=>$date_safetytalks_start,
													'date_safetytalks_end'=>$date_safetytalks_end, 'status'=>$cmb_status );
					$arr_upd_safetytalks 	= array_merge($arr_edit_safetytalks, $arr_upd_safetytalks);
					$arr_where_safetytalks 	= array('id' => $id);
					$this->parentdb->manageDatabaseEntry( "tbl_".$table, 'UPDATE', $arr_upd_safetytalks, $arr_where_safetytalks );

				// Add/Update safetytalks Items //
					if( isset($_POST['txt_item']) && is_array($_POST['txt_item']) ) {
						foreach($_POST['txt_item'] AS $key_safetyitem => $val_safetyitem ) {
							if( "new" == $key_safetyitem && is_array($val_safetyitem) ) {
								foreach($val_safetyitem AS $key_newsafetyitem => $val_newsafetyitem ) {
									$txt_item = $this->common->escapeStr( $_POST['txt_item'][$key_safetyitem][$key_newsafetyitem] );
									$arr_ins_safetyitems = array( 'st_item_name' => $txt_item, 'in_safetytalks_id' => $id );
									$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_items', 'INSERT', $arr_ins_safetyitems );
								}
							}
							else {
								$txt_item = $this->common->escapeStr( $_POST['txt_item'][$key_safetyitem] );
								$edit_safety_item_id 	= $key_safetyitem;
								$arr_upd_safetyitems 	= array( 'st_item_name' => $txt_item );
								$arr_where_safetyitems 	= array( 'id' => $edit_safety_item_id );
								$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_items', 'UPDATE', $arr_upd_safetyitems, $arr_where_safetyitems );
							}
						}
					}
			}
			else {
				return false;
			}
		}
		
		
		// Add Safetytalks performing information
			function addSafetytalksPerformingInfo($arrPost=array())
			{
				$consultant_client_id = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
				if( is_array($arrPost) ) {			
					foreach( $arrPost as $key => $value ) {
						if( $key=="cmb_safetytalk_topics" ) {
							$$key = $this->common->escapeStr(json_encode($value));
						}
						else {
							$$key = (!is_array($value)) ? $this->common->escapeStr($value) : $value;
						}
						
						if( $key == "btn_save" && "save"==$value ) {
							$safetytalks_status = "inprogress";
						}
						else if( $key=="btn_submit" && "submit"==$value ) {
							$safetytalks_status = "completed";
						}
					}

					// ADD/EDIT Consultant performed Information //
						$library_section = ($is_custom==1) ? 'custom_safetytalks' : 'normal_safetytalks';
						
						
						$this->libraries->addConsultantPerformedLibrary($consultant_client_id, $library_section, $arrPost['safetytalks_id'], $safetytalks_status );
		
					
					$checkSafetytalksInfo 	= $this->users->getMetaDataList( 'safetytalks_information', 'in_safetytalks_id="'.$arrPost['safetytalks_id'].'"','','in_safetytalks_info_id' );

					$cmb_safetytalk_topics 	= isset($cmb_safetytalk_topics) ? $cmb_safetytalk_topics : '';
					$txt_atten_firstname	= $this->input->post('txt_atten_firstname');
					$txt_atten_lastname		= $this->input->post('txt_atten_lastname');
					$txt_atten_employer		= $this->input->post('txt_atten_employer');

					// ADD/EDIT Safetytalks Information //
						$sql_mode = sizeof($checkSafetytalksInfo)>0 ? "UPDATE" : "INSERT";
						$arr_safetytalksinfo = array( 'in_safetytalks_id' => $arrPost['safetytalks_id'], 'st_title' => $txt_title, 'st_location' => $txt_location, 
													'dt_datetime_safetytalk' => $txt_datetime_safetytalk, 'in_myemployer_id' => $cmb_myemployer, 'st_workforce' => $txt_workforce, 
													'dt_datetime_next_talk' => $txt_datetime_nexttalk, 'st_topics_selected' => $cmb_safetytalk_topics, 
													'st_notes' => $txt_notes, 'is_custom_safetytalks' => $is_custom );
						// common::pr($arr_safetytalksinfo); die;
						$arr_where_safetytalksinfo = (sizeof($checkSafetytalksInfo)>0) ? array('in_safetytalks_id' => $arrPost['safetytalks_id']) : array();
						
						
						$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_information', $sql_mode, $arr_safetytalksinfo, $arr_where_safetytalksinfo );

					// ADD/EDIT Safetytalks Attendees //
						$this->db->delete('tbl_safetytalks_attendees', array('in_safetytalks_id'=>$arrPost['safetytalks_id'], 'is_custom_safetytalks'=>$is_custom));

						$all_s1workers 	= isset($cmb_safetytalk_allworkers)&&sizeof($cmb_safetytalk_allworkers) ? implode(",",$cmb_safetytalk_allworkers) : '';
						$all_s1employers= isset($cmb_safetytalk_allemployers)&&sizeof($cmb_safetytalk_allemployers) ? implode(",",$cmb_safetytalk_allemployers) : '';
						
						if( (isset($txt_atten_firstname[0]) && $txt_atten_firstname[0])
							|| (isset($txt_atten_lastname[0]) && $txt_atten_lastname[0])
							|| (isset($txt_atten_employer[0]) && $txt_atten_employer[0])
							) {
							foreach( $txt_atten_firstname AS $key_nons1_attendee => $val_nons1_attendee ) {
								$nons1_attendees[$key_nons1_attendee]['firstname']	= $txt_atten_firstname[$key_nons1_attendee];
								$nons1_attendees[$key_nons1_attendee]['lastname']	= $txt_atten_lastname[$key_nons1_attendee];
								$nons1_attendees[$key_nons1_attendee]['employer']	= $txt_atten_employer[$key_nons1_attendee];
							}
						}
						$nons1_attendees = (isset($nons1_attendees)&&sizeof($nons1_attendees)) ? json_encode($nons1_attendees) : '';
						
						$arr_ins_safety_attendees = array( 'in_safetytalks_id' => $arrPost['safetytalks_id'], 
														   'st_attendee_s1worker' => $all_s1workers, 'st_attendee_s1employer' => $all_s1employers, 
														   'st_attendee_nons1users' => $nons1_attendees, 
														   'is_custom_safetytalks' => $is_custom );
						// common::pr( $arr_ins_safety_attendees );die;
						
						$this->parentdb->manageDatabaseEntry( 'tbl_safetytalks_attendees', 'INSERT', $arr_ins_safety_attendees );

						

					// ADD/EDIT Safetytalks //
						$tblname = ($is_custom==1) ? "tbl_custom_safetytalks" : "tbl_safetytalks";
						$arr_upd_safetytalksinfo 	= array( 'in_user_id'=>$this->sess_userid, 'st_safetytalks_status'=>$safetytalks_status);
						("completed"==$safetytalks_status) ? $arr_upd_safetytalksinfo['date_completed'] = date('Y-m-d h:i:s') : '';
						$arr_where_safetytalksinfo 	= array('id' => $arrPost['safetytalks_id']);
						$this->parentdb->manageDatabaseEntry( $tblname, 'UPDATE', $arr_upd_safetytalksinfo, $arr_where_safetytalksinfo );

					// Send message to Connected Members //
						if( "completed" == $safetytalks_status ) {
							// Send Message to Loggedin User
								$safetytalk_performed_by= $this->users->getUserByEmail( $this->session->userdata['username'], 'id, firstname, lastname', '');
								$safetytalk_performed_by= isset($safetytalk_performed_by) ? $safetytalk_performed_by['firstname']." ".$safetytalk_performed_by['lastname'] : "";
								$safetytalk_topics		= isset($arrPost['cmb_safetytalk_topics'])&&sizeof($arrPost['cmb_safetytalk_topics']) ? $arrPost['cmb_safetytalk_topics'] : array();
								foreach( $safetytalk_topics AS $val ) {
									$safetytalks_topic = $this->users->getMetaDataList('safetytalks', 'id="'.$val.'"', '', 'st_safetytalks_topic');
									$safetytalks_topic_names[] = $safetytalks_topic[0]['st_safetytalks_topic'];
								}

								$subject = "Safety Talks";
								$body = "You have attended a Safety Talks on: ".$txt_datetime_safetytalk;
								$body.= "\nBy: ".$safetytalk_performed_by;
								isset($safetytalks_topic_names) ? $body.= "\nList of Topics discussed: ".implode(",", $safetytalks_topic_names) : '';
								$body.= "\nNotes: ".$txt_notes;
								$body.= "\nNext Talk: ".$txt_datetime_nexttalk;
								
								$safetytalk_attendees = array_merge( $cmb_safetytalk_allworkers, $cmb_safetytalk_allemployers );
								// common::pr( $safetytalk_attendees );die;
								
								if( isset($safetytalk_attendees) && sizeof($safetytalk_attendees) ) {
									foreach( $safetytalk_attendees AS $val_attendee_id ) {
										$attendee_email = $this->users->getMetaDataList('user','status=1 AND id="'.$val_attendee_id.'"', '', 'email_addr');
										$attendee_email = (isset($attendee_email[0]['email_addr'])&&$attendee_email[0]['email_addr']) ? trim($attendee_email[0]['email_addr']) : '';
										$arr_ins_message = array( 'send_to' => $attendee_email, 'send_from' => $this->session->userdata("username"), 
																'subject' => $subject, 'message' => $body );
										$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
										$this->users->sendEmailToS1user($attendee_email, $this->session->userdata("username"), $subject, $body );
									}
								}
						}
					return true;
				}
			}
		
		function getTotalCompletedSafetytalksByAttendee($typeSafetytalks='', $userId='')
		{
			if( trim($typeSafetytalks) ) {
				$sel_safetytalksqry = "SELECT COUNT(id) AS total_safetytalks FROM tbl_".$typeSafetytalks." AS tsafety 
										LEFT JOIN tbl_safetytalks_attendees AS t2 ON (tsafety.id=t2.in_safetytalks_id)
										WHERE st_safetytalks_status = 'completed' AND status=1 AND 
															(FIND_IN_SET('".$userId."',t2.st_attendee_s1worker) OR FIND_IN_SET('".$userId."',t2.st_attendee_s1employer))";
				$sel_safetytalks	= $this->db->query($sel_safetytalksqry);
				if(!$sel_safetytalks) {
					return $this->common->dberror();
				}
				else {
					$rows_safetytalks = $sel_safetytalks->row_array();
					// common::pr($rows_safetytalks);
					return (isset($rows_safetytalks['total_safetytalks']) && $rows_safetytalks['total_safetytalks']) ? $rows_safetytalks['total_safetytalks'] : '0';
				}
			}
			else {
				return '0';
			}
		}
		
		// Get safetytalks topics with Items //
			function getSafetytalksTopicsWithItems($select='*', $isCustom='', $safetyTalkId='', $isItems='')
			{
				$sql 		= "SELECT ".$select;
				(int)$isItems ? $sql .= " ,tsftitems.id AS item_id, st_item_name" : '';
				$sql .= " FROM tbl_safetytalks AS tsft";

				if( $isCustom == 1 ) {
					$sql 	.=  " LEFT JOIN tbl_custom_safetytalks_links AS tcustsftlink ON tcustsftlink.in_safetytalks_id = tsft.id";
					$sql 	.=  " LEFT JOIN tbl_custom_safetytalks AS tcustsft ON (tcustsft.id = tcustsftlink.in_custom_safetytalks_id 
								AND tcustsft.status=1 AND (tcustsft.date_safetytalks_end = '0000-00-00' OR tcustsft.date_safetytalks_end >= '".date('Y-m-d')."'))";
				}
				($isItems) ? $sql .=  " LEFT JOIN tbl_safetytalks_items AS tsftitems ON tsftitems.in_safetytalks_id = tsft.id" : '';

				$sql .= " WHERE tsft.status=1 AND (tsft.date_safetytalks_end = '0000-00-00' OR tsft.date_safetytalks_end >= CURDATE())";
				($isCustom==1 && $safetyTalkId) ? $sql .= " AND tcustsft.id IN(".$safetyTalkId.")" : ''; // Custom Safetytalks ID passed //
				($isItems && $safetyTalkId) ? $sql .= " AND tsft.id IN(".$safetyTalkId.")" : ''; 
				
				$sql .= "ORDER BY TRIM(st_safetytalks_topic)";
				
				$query 		= $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					$rows = $query->result_array();
					if( $isItems ) {
						foreach( $rows AS $key_saftytalks_items => $val_saftytalks_items ) {
							$safetytalks_items[$val_saftytalks_items['safetytalks_id']]['safetytalks_topic'] = $val_saftytalks_items['st_safetytalks_topic'];
							$safetytalks_items[$val_saftytalks_items['safetytalks_id']]['icon_path'] = $val_saftytalks_items['st_icon_path'];
							$safetytalks_items[$val_saftytalks_items['safetytalks_id']][$val_saftytalks_items['item_id']]['safetytalks_id'] = $val_saftytalks_items['safetytalks_id'];
							$safetytalks_items[$val_saftytalks_items['safetytalks_id']][$val_saftytalks_items['item_id']]['item_id'] = $val_saftytalks_items['item_id'];
							$safetytalks_items[$val_saftytalks_items['safetytalks_id']][$val_saftytalks_items['item_id']]['st_item_name'] = $val_saftytalks_items['st_item_name'];
						}
						return $safetytalks_items;
					}
					else {
						return $rows;
					}
				}
			}
	///////////////  END - SAFETY TALKS //////////////////////
}
?>