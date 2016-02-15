<?php 
class Investigation extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('upload');
	}
	
	// Auto Generate Investigation number //
		function generateInvestigationNo()
		{
			$autoincr_inv_no= $this->parentdb->getLastRowId('tbl_inv_investigation_forms');
			$inv_no 	 	= date('Y')."_".$autoincr_inv_no;
			return $inv_no;
		}
	
	// Main Investigator //
		function addMainInvestigator( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				foreach( $arrPost as $key => $value ) {
					!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
				}
				$arr_ins_investigator = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_investigator_name' => $txt_investigator_name, 
												'st_job_title' => $txt_investigator_jobtitle );
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_investigator', 'INSERT', $arr_ins_investigator );
			}
		}

	// Investigation Additional Workers //
		function addInvestigationWorkers( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				if( isset($arrPost['txt_inv_worker_name']) && is_array($arrPost['txt_inv_worker_name']) ) {
					for( $cntInv=0; $cntInv<sizeof($arrPost['txt_inv_worker_name']); $cntInv++ ) {
						$worker_name 	= $this->common->escapeStr( $arrPost['txt_inv_worker_name'][$cntInv] );
						$worker_jobtitle= $this->common->escapeStr( $arrPost['txt_inv_worker_jobtitle'][$cntInv] );
						$arr_ins_invworkers = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_worker_name' => $worker_name, 
													'st_worker_job_title' => $worker_jobtitle );
						$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_investigation_workers', 'INSERT', $arr_ins_invworkers );
					}
				}
			}
		}

		function getInvestigationOfCoverPageUsers( $userName='' )
		{
			$sql = "SELECT in_inv_form_id, in_investigation_id, st_inv_form_no, is_inv_form_sealed 
					FROM tbl_inv_investigation_forms 
					WHERE (in_inv_form_id = (SELECT in_investigation_id FROM tbl_inv_investigation_workers 
											WHERE st_worker_name = (SELECT CONCAT(firstname,' ',lastname) FROM tbl_user where nickname = '".$userName."')) )
							OR 
						  (in_inv_form_id = (SELECT in_investigation_id FROM tbl_inv_investigator 
											WHERE st_investigator_name = (SELECT CONCAT(firstname,' ',lastname) FROM tbl_user where nickname = '".$userName."')) )";
			$query= $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->result_array();
		}
		
	// Get Additional Investigation Workers
		function getInvestigationWorkers( $investigationId='', $where='' )
		{
			// Get investigation workers
				$sql1 = "SELECT * FROM
						(SELECT id, st_worker_name AS worker_name, st_worker_job_title AS worker_jobtitle
						FROM tbl_inv_investigation_workers
						WHERE in_investigation_id = '".$investigationId."') AS workers1";
				if( $where ) {
					$where['txt_worker_text'] ? $sql1 .= " WHERE workers1.worker_name LIKE '%".$where['txt_worker_text']."%'" : '';
				}
				$query1 = $this->db->query($sql1);
				$rows_invest_workers = (!$query1) ? $this->common->dberror() : $query1->result_array();

			// Get workers connected to employer/union only
				$sql2 = "SELECT * FROM 
							(SELECT DISTINCT tu.id, tu.type_id, nickname, CONCAT(firstname,' ',lastname) AS worker_name, industryname AS worker_jobtitle, profile_image
							FROM tbl_user AS tu 
							RIGHT JOIN tbl_connection AS tc ON tc.worker_id = tu.id AND tc.employer_id = '".$this->sess_userid."'
							LEFT JOIN tbl_industry AS ti ON tu.industry_id = ti.id
							WHERE tu.type_id = '9' AND tu.status=1) AS workers2";
				if( $where ) {
					$where['txt_worker_text'] ? $sql2 .= " WHERE workers2.worker_name LIKE '%".$where['txt_worker_text']."%'" : '';
				}
				$query2 = $this->db->query($sql2);
				$rows_s1_users = (!$query2) ? $this->common->dberror() : $query2->result_array();

			// Get injured workers
				$sql3 = "SELECT * FROM
							(SELECT DISTINCT id, st_worker_fullname AS worker_name, st_job_title AS worker_jobtitle, st_address AS worker_address
							FROM tbl_inv_injured_worker_details
							WHERE in_investigation_id = '".$investigationId."') AS workers3";
				if( $where ) {
					$where['txt_worker_text'] ? $sql3 .= " WHERE workers3.worker_name LIKE '%".$where['txt_worker_text']."%'" : '';
				}					
				$query3 = $this->db->query($sql3);
				$rows_injured_workers = (!$query3) ? $this->common->dberror() : $query3->result_array();

			$arr_rows_workers = array_merge( $rows_invest_workers, $rows_s1_users, $rows_injured_workers );

			return $arr_rows_workers;
		}
		

	// Investigation Cover
		function addInvestigationCover( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				foreach( $arrPost as $key => $value ) {
					if( strtolower($value)=='yes' ) {
						$value = '1';
					}
					else if( strtolower($value)=='no' ) {
						$value = '0';
					}
					$$key = $this->common->escapeStr($value);
				}
				
				$checkInvestigation = $this->users->getMetaDataList( 'inv_investigation_incident_cover', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );

				$sql_mode = (sizeof($checkInvestigation)>0) ? "UPDATE" : "INSERT";
				$arr_inv_incidentcover = array( 'in_investigation_id' => $arrPost['investigation_id'], 'datetime_incident' => $txt_datetime_incident, 
												'datetime_incident_reported' => $txt_datetime_incident_reported, 
												'st_incident_reported_to' => $txt_incident_reported_to, 
												'st_incident_address' => $txt_incident_address, 'st_project' => $txt_project, 
												'st_project_area' => $txt_project_area, 'st_project_supervisor' => $txt_incident_supervisor, 
												'st_weather' => $txt_weather, 'is_incident_reported_to_MOL' => $is_incident_reported_to_MOL, 
												'datetime_incident_reported_to_MOL' => $txt_datetime_incident_reported_to_MOL, 
												'st_incident_reported_to_MOL' => $txt_incident_reported_to_MOL, 
												'st_name_MOL_officer_incident_attended' => $txt_name_MOL_officer_incident_attended, 
												'st_contact_MOL_officer_incident_attended' => $txt_contact_MOL_officer_incident_attended, 
												'is_witness_to_incident' => $txt_witness_to_incident );
				$arr_where_incidentcover = (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_investigation_incident_cover', $sql_mode, $arr_inv_incidentcover, $arr_where_incidentcover );
			}
		}

	// Incident Types
		function addIncidentTypes( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$incident_types 	= json_encode( $arrPost['chk_incident_types'] );
				$checkInvestigation = $this->users->getMetaDataList( 'inv_incident_details', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );

				$sql_mode 					= (sizeof($checkInvestigation)>0) ? "UPDATE" : "INSERT";
				$arr_inv_incident_details 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_incident_types' => $incident_types);
				$arr_where_incidentdetails 	= (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_incident_details', $sql_mode, $arr_inv_incident_details, $arr_where_incidentdetails );
			}
		}
	
	// Incident Detail Description
		function addIncidentDetailDesc( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				if( isset($arrPost['txt_worker_fullname']) && is_array($arrPost['txt_worker_fullname']) ) {
					foreach( $arrPost['txt_worker_fullname'] AS $key => $val ) {
						if( $key == 'new' ) {
							foreach( $arrPost['txt_worker_fullname']['new'] AS $key_new => $val_new ) {
								$worker_fullname 	= $this->common->escapeStr( $arrPost['txt_worker_fullname']['new'][$key_new] );
								$worker_employer 	= $this->common->escapeStr( $arrPost['txt_worker_employer']['new'][$key_new] );
								
								$arr_ins_injworkers = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_worker_fullname' => $worker_fullname, 
													'st_worker_employer_name' => $worker_employer );
								$this->parentdb->manageDatabaseEntry( 'tbl_inv_injured_worker_details', 'INSERT', $arr_ins_injworkers );
							}
						}
						else {
							$worker_fullname 	= $this->common->escapeStr( $arrPost['txt_worker_fullname'][$key] );
							$worker_employer 	= $this->common->escapeStr( $arrPost['txt_worker_employer'][$key] );

							$arr_upd_injworkers 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_worker_fullname' => $worker_fullname, 
														'st_worker_employer_name' => $worker_employer );
							$arr_where_injworkers 	= array('in_investigation_id' => $arrPost['investigation_id'], 'id' => $key);
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_injured_worker_details', 'UPDATE', $arr_upd_injworkers, $arr_where_injworkers );
						}
					}
				}

				if( isset($arrPost['txt_incident_detaildesc']) ) {
					$checkInvestigation = $this->users->getMetaDataList( 'inv_incident_details', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );
					foreach( $arrPost as $key => $value ) {
						!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
					}
					
					$sql_mode 					= (sizeof($checkInvestigation)>0) ? "UPDATE" : "INSERT";
					$arr_inv_incident_details 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_incident_description' => $txt_incident_detaildesc,
														'in_no_of_injured_workers' => $txt_no_of_workers );
					$arr_where_incidentdetails 	= (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
					$this->parentdb->manageDatabaseEntry( 'tbl_inv_incident_details', $sql_mode, $arr_inv_incident_details, $arr_where_incidentdetails );
				}
			}
		}
	
	// Incident details
		function addIncidentDetails( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$checkInvestigation = $this->users->getMetaDataList( 'inv_incident_details', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );
				foreach( $arrPost as $key => $value ) {
					!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
				}

				$sql_mode 					= (sizeof($checkInvestigation)>0) ? "UPDATE" : "INSERT";
				$arr_inv_incident_details 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_incident_details' => $rdb_incident_details,
													'st_other_incident_details' => $txt_incident_details );
				$arr_where_incidentdetails 	= (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_incident_details', $sql_mode, $arr_inv_incident_details, $arr_where_incidentdetails );
			}
		}
	
	// Firstaid
		function addFirstAid( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$contrib_factors 	= json_encode( $arrPost['chk_incident_types'] );
				$checkInvestigation = $this->users->getMetaDataList( 'inv_firstaid', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );
				
				foreach( $arrPost as $key => $value ) {
					!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
				}
				$sql_mode 			= (sizeof($checkInvestigation)>0) ? "UPDATE" : "INSERT";
				$arr_inv_firstaid 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_fullname' => $txt_fullname,
											'st_job_title' => $txt_job_title, 'st_employer_name' => $txt_employer_name, 
											'st_employement_type' => $rdb_employement_type, 'st_first_aid_received' => $txt_first_aid_received );
				$arr_where_firstaid = (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_firstaid', $sql_mode, $arr_inv_firstaid, $arr_where_firstaid );
			}
		}

	// Add Injury Report //
		function addInjuryReport( $arrPost=array() )
		{
			// common::pr($arrPost);die;
			if( isset($arrPost['txt_worker_fullname']) && is_array($arrPost['txt_worker_fullname']) ) {			
				foreach( $arrPost['txt_worker_fullname'] AS $key => $val ) {
					if( $key == 'new' ) {
						foreach( $arrPost['txt_worker_fullname']['new'] AS $key_new => $val_new ) {
							$arr_bodyparts_injured = array();

							$worker_fullname 				= $this->common->escapeStr( $arrPost['txt_worker_fullname']['new'][$key_new] );
							$worker_employer_name 			= $this->common->escapeStr( $arrPost['txt_worker_employer_name']['new'][$key_new] );
							$address 					 	= $this->common->escapeStr( $arrPost['txt_address']['new'][$key_new] );
							$phone_number 					= $this->common->escapeStr( $arrPost['txt_phone_number']['new'][$key_new] );
							$job_title 						= $this->common->escapeStr( $arrPost['txt_job_title']['new'][$key_new] );
							$position_time_experience 		= $this->common->escapeStr( $arrPost['txt_position_time_experience']['new'][$key_new] );
							$dob 							= $this->common->escapeStr( $arrPost['txt_dob']['new'][$key_new] );
							$preferred_language 			= $this->common->escapeStr( $arrPost['cmb_preferred_language']['new'][$key_new] );
							if( "other" == $preferred_language ) {
								$preferred_other_language 		= $this->common->escapeStr( $arrPost['txt_preferred_language']['new'][$key_new] );
							}
							else {
								$preferred_other_language 		= "";
							}
							
							$sex 							= $this->common->escapeStr( $arrPost['rdb_sex']['new'][$key_new] );
							$is_worker_unionized 			= $this->common->escapeStr( $arrPost['rdb_worker_unionized']['new'][$key_new] );
							$worker_union_name 				= $this->common->escapeStr( $arrPost['txt_worker_union_name']['new'][$key_new] );
							$employeement_type 				= $this->common->escapeStr( $arrPost['rdb_employeement_type']['new'][$key_new] );
							$is_firstaid_provided			= $this->common->escapeStr( $arrPost['rdb_firstaid_provided']['new'][$key_new] );
							$firstaid_provided_by 			= $this->common->escapeStr( $arrPost['txt_firstaid_provided_by']['new'][$key_new] );
							$is_healthcare_professional 	= $this->common->escapeStr( $arrPost['rdb_healthcare_professional']['new'][$key_new] );
							$healthcare_received_date 		= $this->common->escapeStr( $arrPost['txt_healthcare_received_date']['new'][$key_new] );
							$management_learn_worker_received_healthcare = $this->common->escapeStr( $arrPost['txt_management_learn_worker_received_healthcare']['new'][$key_new] );
							$name_position_worker_reported_to 				= $this->common->escapeStr( $arrPost['txt_name_position_worker_reported_to']['new'][$key_new] );
							$place_of_worker_treatment 						= $this->common->escapeStr( $arrPost['rdb_place_of_worker_treatment']['new'][$key_new] );
							$facility_name_address_phone_worker_treated 	= $this->common->escapeStr( $arrPost['txt_facility_name_address_phone_worker_treated']['new'][$key_new] );
							$name_phone_transported_by_for_medical_aid 		= $this->common->escapeStr( $arrPost['txt_name_phone_transported_by_for_medical_aid']['new'][$key_new] );
							$is_worker_fit_for_work 						= $this->common->escapeStr( $arrPost['rdb_worker_fit_for_work']['new'][$key_new] );
							$worker_status 						= $this->common->escapeStr( $arrPost['rdb_worker_status']['new'][$key_new] );
							$days_worker_away_due_to_incident 	= $this->common->escapeStr( $arrPost['txt_days_worker_away_due_to_incident']['new'][$key_new] );

							$arr_bodyparts_injured['body_parts_injured'] 		= $arrPost['cmb_body_parts_injured']['new'];
							$arr_bodyparts_injured['type_body_parts_injured'] 	= $arrPost['cmb_type_body_parts_injured']['new'];
							
							$arr_bodyparts_injured				= json_encode( $arr_bodyparts_injured );
							$injury_brief_description 			= $this->common->escapeStr( $arrPost['txt_injury_brief_description']['new'][$key_new] );
							
							$arr_ins_injworkers = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_worker_fullname' => $worker_fullname, 
														'st_worker_employer_name' => $worker_employer_name, 'st_address' => $address, 
														'st_phone_number' => $phone_number, 'st_job_title' => $job_title,  
														'st_position_time_experience' => $position_time_experience, 'dt_dob' => $dob, 
														'st_preferred_language' => $preferred_language, 'st_other_preferred_language' => $preferred_other_language, 
														'st_sex' => $sex, 'is_worker_unionized' => $is_worker_unionized, 
														'st_worker_union_name' => $worker_union_name, 'st_employeement_type' => $employeement_type, 
														'is_firstaid_provided' => $is_firstaid_provided, 'st_firstaid_provided_by' => $firstaid_provided_by, 
														'is_healthcare_professional' => $is_healthcare_professional, 'dt_healthcare_received_date' => $healthcare_received_date, 
														'dt_management_learn_worker_received_healthcare' => $management_learn_worker_received_healthcare, 
														'st_name_position_worker_reported_to' => $name_position_worker_reported_to, 
														'st_place_of_worker_treatment' => $place_of_worker_treatment, 
														'st_facility_name_address_phone_worker_treated' => $facility_name_address_phone_worker_treated, 
														'st_name_phone_transported_by_for_medical_aid' => $name_phone_transported_by_for_medical_aid, 
														'is_worker_fit_for_work' => $is_worker_fit_for_work, 'st_worker_status' => $worker_status, 
														'in_days_worker_away_due_to_incident' => $days_worker_away_due_to_incident, 
														'st_body_part_injured_type_with_name' => $arr_bodyparts_injured, 'st_injury_brief_description' => $injury_brief_description );
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_injured_worker_details', 'INSERT', $arr_ins_injworkers );
						}
					}
					else {
						$arr_bodyparts_injured = array();

						$worker_fullname 				= $this->common->escapeStr( $arrPost['txt_worker_fullname'][$key] );
						$worker_employer_name 			= $this->common->escapeStr( $arrPost['txt_worker_employer_name'][$key] );
						$address 					 	= $this->common->escapeStr( $arrPost['txt_address'][$key] );
						$phone_number 					= $this->common->escapeStr( $arrPost['txt_phone_number'][$key] );
						$job_title 						= $this->common->escapeStr( $arrPost['txt_job_title'][$key] );
						$position_time_experience 		= $this->common->escapeStr( $arrPost['txt_position_time_experience'][$key] );
						$dob 							= $this->common->escapeStr( $arrPost['txt_dob'][$key] );
						$preferred_language 			= $this->common->escapeStr( $arrPost['cmb_preferred_language'][$key] );
						if( "other" == $preferred_language ) {
							$preferred_other_language 		= $this->common->escapeStr( $arrPost['txt_preferred_language'][$key] );
						}
						else {
							$preferred_other_language 		= "";
						}
						$sex 							= $this->common->escapeStr( $arrPost['rdb_sex'][$key] );
						$is_worker_unionized 			= $this->common->escapeStr( $arrPost['rdb_worker_unionized'][$key] );
						$worker_union_name 				= $this->common->escapeStr( $arrPost['txt_worker_union_name'][$key] );
						$employeement_type 				= $this->common->escapeStr( $arrPost['rdb_employeement_type'][$key] );
						$is_firstaid_provided			= $this->common->escapeStr( $arrPost['rdb_firstaid_provided'][$key] );
						$firstaid_provided_by 			= $this->common->escapeStr( $arrPost['txt_firstaid_provided_by'][$key] );
						$is_healthcare_professional 	= $this->common->escapeStr( $arrPost['rdb_healthcare_professional'][$key] );
						$healthcare_received_date 		= $this->common->escapeStr( $arrPost['txt_healthcare_received_date'][$key] );
						$management_learn_worker_received_healthcare= $this->common->escapeStr( $arrPost['txt_management_learn_worker_received_healthcare'][$key] );
						$name_position_worker_reported_to 			= $this->common->escapeStr( $arrPost['txt_name_position_worker_reported_to'][$key] );
						$place_of_worker_treatment 					= $this->common->escapeStr( $arrPost['rdb_place_of_worker_treatment'][$key] );
						$facility_name_address_phone_worker_treated = $this->common->escapeStr( $arrPost['txt_facility_name_address_phone_worker_treated'][$key] );
						$name_phone_transported_by_for_medical_aid 	= $this->common->escapeStr( $arrPost['txt_name_phone_transported_by_for_medical_aid'][$key] );
						$is_worker_fit_for_work 					= $this->common->escapeStr( $arrPost['rdb_worker_fit_for_work'][$key] );
						$worker_status 						= $this->common->escapeStr( $arrPost['rdb_worker_status'][$key] );
						$days_worker_away_due_to_incident 	= $this->common->escapeStr( $arrPost['txt_days_worker_away_due_to_incident'][$key] );

						$arr_bodyparts_injured['body_parts_injured'] 		= $arrPost['cmb_body_parts_injured'][$key];
						$arr_bodyparts_injured['type_body_parts_injured'] 	= $arrPost['cmb_type_body_parts_injured'][$key];
						$arr_bodyparts_injured		= json_encode( $arr_bodyparts_injured );
						$injury_brief_description 	= $this->common->escapeStr( $arrPost['txt_injury_brief_description'][$key] );

						$arr_upd_injworkers = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_worker_fullname' => $worker_fullname, 
													'st_worker_employer_name' => $worker_employer_name, 'st_address' => $address, 'st_phone_number' => $phone_number, 
													'st_job_title' => $job_title,  'st_position_time_experience' => $position_time_experience, 'dt_dob' => $dob, 
													'st_preferred_language' => $preferred_language, 'st_other_preferred_language' => $preferred_other_language, 
													'st_sex' => $sex, 'is_worker_unionized' => $is_worker_unionized, 
													'st_worker_union_name' => $worker_union_name, 'st_employeement_type' => $employeement_type, 
													'is_firstaid_provided' => $is_firstaid_provided, 'st_firstaid_provided_by' => $firstaid_provided_by, 
													'is_healthcare_professional' => $is_healthcare_professional, 'dt_healthcare_received_date' => $healthcare_received_date, 
													'dt_management_learn_worker_received_healthcare' => $management_learn_worker_received_healthcare, 
													'st_name_position_worker_reported_to' => $name_position_worker_reported_to, 
													'st_place_of_worker_treatment' => $place_of_worker_treatment, 
													'st_facility_name_address_phone_worker_treated' => $facility_name_address_phone_worker_treated, 
													'st_name_phone_transported_by_for_medical_aid' => $name_phone_transported_by_for_medical_aid, 
													'is_worker_fit_for_work' => $is_worker_fit_for_work, 'st_worker_status' => $worker_status, 
													'in_days_worker_away_due_to_incident' => $days_worker_away_due_to_incident, 
													'st_body_part_injured_type_with_name' => $arr_bodyparts_injured, 'st_injury_brief_description' => $injury_brief_description );
						$arr_where_injworkers = array('in_investigation_id' => $arrPost['investigation_id'], 'id'=>$key);
						// common::pr($arr_upd_injworkers);die;
						
						$this->parentdb->manageDatabaseEntry( 'tbl_inv_injured_worker_details', 'UPDATE', $arr_upd_injworkers, $arr_where_injworkers );
					}
				}
			}
		}
	
	
	// Witness Report and Questions //
		function addWitnessReport( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$investigation_id = $arrPost['investigation_id'];

				if( isset($arrPost['txt_witness_fullname']) && $arrPost['txt_witness_fullname'] && is_array($arrPost['txt_witness_fullname']) ) {
				
					foreach( $arrPost['txt_witness_fullname'] AS $key_witness => $val_witness ) {
						if( $key_witness == 'new' ) {
							foreach( $arrPost['txt_witness_fullname']['new'] AS $key_new => $val_new ) {
								$witness_fullname 	= $this->common->escapeStr( $arrPost['txt_witness_fullname']['new'][$key_new] );
								$address 			= $this->common->escapeStr( $arrPost['txt_address']['new'][$key_new] );
								$phone_number 		= $this->common->escapeStr( $arrPost['txt_phone_number']['new'][$key_new] );
								$employer_name 		= $this->common->escapeStr( $arrPost['txt_employer_name']['new'][$key_new] );
								$interviewer_name 	= $this->common->escapeStr( $arrPost['txt_interviewer_name']['new'][$key_new] );
								$witness_statement 	= $this->common->escapeStr( $arrPost['txt_witness_statement']['new'][$key_new] );
								$witness_more_notes = $this->common->escapeStr( $arrPost['txt_witness_more_notes'] );
								
								$arr_ins_witnessreport = array( 'in_investigation_id' => $investigation_id, 'st_witness_fullname' => $witness_fullname, 'st_address' => $address, 
																'st_phone_number' => $phone_number, 'st_employer_name' => $employer_name, 'st_interviewer_name' => $interviewer_name, 
																'st_witness_statement' => $witness_statement, 'st_witness_more_notes' => $witness_more_notes );
								$witness_report_id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_witness_report', 'INSERT', $arr_ins_witnessreport );

								// Witness Report Questions and Answers //
									foreach( $arrPost['txt_question']['new'] AS $key_newques => $val_newques ) {
										for( $cntWQues=0; $cntWQues<sizeof($val_newques); $cntWQues++ ) {
											$question 	= $this->common->escapeStr( $val_newques[$cntWQues] );
											$answer 	= $this->common->escapeStr( $arrPost['txt_answer']['new'][$key_newques][$cntWQues] );
											
											$arr_ins_witness_intquesans = array('in_witness_id' => $witness_report_id, 'in_investigation_id' => $investigation_id, 
																				'st_question' => $question, 'st_answer' => $answer);
											$this->parentdb->manageDatabaseEntry( 'tbl_inv_witness_interviewer_questions_answers', 'INSERT', $arr_ins_witness_intquesans );
										}
									}
							}
						}
						else {
							$witness_fullname 	= $this->common->escapeStr( $arrPost['txt_witness_fullname'][$key_witness] );
							$address 			= $this->common->escapeStr( $arrPost['txt_address'][$key_witness] );
							$phone_number 		= $this->common->escapeStr( $arrPost['txt_phone_number'][$key_witness] );
							$employer_name 		= $this->common->escapeStr( $arrPost['txt_employer_name'][$key_witness] );
							$interviewer_name 	= $this->common->escapeStr( $arrPost['txt_interviewer_name'][$key_witness] );
							$witness_statement 	= $this->common->escapeStr( $arrPost['txt_witness_statement'][$key_witness] );

							$witness_more_notes = $this->common->escapeStr( $arrPost['txt_witness_more_notes'] );

							$arr_upd_witnessreport = array( 'in_investigation_id' => $investigation_id, 'st_witness_fullname' => $witness_fullname, 'st_address' => $address, 
															'st_phone_number' => $phone_number, 'st_employer_name' => $employer_name, 'st_interviewer_name' => $interviewer_name, 'st_witness_statement' => $witness_statement, 'st_witness_more_notes' => $witness_more_notes );
							$arr_where_witnessreport = array('in_investigation_id' => $arrPost['investigation_id'], 'id'=>$key_witness);
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_witness_report', 'UPDATE', $arr_upd_witnessreport, $arr_where_witnessreport );
								
							// Witness Report Questions and Answers //
								if( isset($arrPost['txt_question'][$key_witness]) && is_array($arrPost['txt_question'][$key_witness]) ) {
									$arrWitnessQues = $arrPost['txt_question'][$key_witness];
									
									foreach( $arrPost['txt_question'][$key_witness] AS $key_ques => $val_ques ) {
										if( $key_ques == 'new' ) {
											for( $cntWQues=0; $cntWQues<sizeof($val_ques); $cntWQues++ ) {
												$question 	= $this->common->escapeStr( $val_ques[$cntWQues] );
												$answer 	= $this->common->escapeStr( $arrPost['txt_answer'][$key_witness][$key_ques][$cntWQues] );
												
												$arr_ins_witness_intquesans = array('in_witness_id' => $key_witness, 'in_investigation_id' => $investigation_id, 
																				'st_question' => $question, 'st_answer' => $answer);
												$this->parentdb->manageDatabaseEntry( 'tbl_inv_witness_interviewer_questions_answers', 'INSERT', $arr_ins_witness_intquesans );
											}
										}
										else {
											$question 	= $this->common->escapeStr( $arrPost['txt_question'][$key_witness][$key_ques] );
											$answer 	= $this->common->escapeStr( $arrPost['txt_answer'][$key_witness][$key_ques] );
											
											$arr_upd_witness_intquesans = array('in_witness_id' => $key_witness, 'in_investigation_id' => $investigation_id, 
																				'st_question' => $question, 'st_answer' => $answer);
											$arr_where_witness_intquesans = array('in_investigation_id' => $arrPost['investigation_id'], 'id'=>$key_ques);
											$this->parentdb->manageDatabaseEntry( 'tbl_inv_witness_interviewer_questions_answers', 'UPDATE', $arr_upd_witness_intquesans, $arr_where_witness_intquesans );
										}
									}
								}
							}
						}
				}
			}
		}

	// Material Involved or Damaged //
		function addMaterialInvolved( $arrPost=array(), $arrFiles=array() )
		{
			if( is_array($arrPost) ) {
				if( isset($arrPost['txt_brief_description']) && is_array($arrPost['txt_brief_description']) ) {
					$investigation_id 	= isset($arrPost['investigationId']) ? $arrPost['investigationId'] : '';
					$upload_dir 		= $this->path_upload_material_involved; // Relative to the root

					foreach( $arrPost['txt_brief_description'] AS $key => $val ) {
						if( $key == 'new' ) {
							foreach( $arrPost['txt_brief_description']['new'] AS $key_new => $val_new ) {							
								$brief_description 			= $this->common->escapeStr( $arrPost['txt_brief_description']['new'][$key_new] );
								$type 						= $this->common->escapeStr( $arrPost['txt_type']['new'][$key_new] );
								$size 						= $this->common->escapeStr( $arrPost['txt_size']['new'][$key_new] );
								$weight 					= $this->common->escapeStr( $arrPost['txt_weight']['new'][$key_new] );
								$make 						= $this->common->escapeStr( $arrPost['txt_make']['new'][$key_new] );
								$model 						= $this->common->escapeStr( $arrPost['txt_model']['new'][$key_new] );
								$serial 					= $this->common->escapeStr( $arrPost['txt_serial']['new'][$key_new] );
								$manufacturer 				= $this->common->escapeStr( $arrPost['txt_manufacturer']['new'][$key_new] );
								$additional_specifications 	= $this->common->escapeStr( $arrPost['txt_additional_specifications']['new'][$key_new] );
								$estimated_damage_cost 		= $arrPost['txt_estimated_damage_cost']['new'][$key_new];
								
								// Upload Material photo //
									$next_row_id 				= $this->parentdb->getLastRowId('tbl_inv_material_involved_damaged');
									$photo_name					= '';
									if( isset($arrFiles['userfile']['size'][$key][$key_new]) && $arrFiles['userfile']['size'][$key][$key_new] ) {
										$_FILES['userfile']['tmp_name'] 	=  $arrFiles['userfile']['tmp_name'][$key][$key_new];
										$_FILES['userfile']['name'] 		=  $arrFiles['userfile']['name'][$key][$key_new];
										$_FILES['userfile']['size'] 		=  $arrFiles['userfile']['size'][$key][$key_new];
										$_FILES['userfile']['type'] 		=  $arrFiles['userfile']['type'][$key][$key_new];
										$_FILES['userfile']['error'] 		=  $arrFiles['userfile']['error'][$key][$key_new];

										$ext_photo	 	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
										$photo_name 	= "inv_".$investigation_id."_material_".$next_row_id.".".$ext_photo;
										
										$this->upload->initialize($this->common->setUploadOptions($upload_dir, $photo_name));
										if( !$this->upload->do_upload() ) {
											$upload_error[$next_row_id] = $this->upload->display_errors();
										}
									}

								$arr_ins_material_involdamage = array( 'in_investigation_id' => $investigation_id, 'st_brief_description' => $brief_description, 
															'st_type'=>$type, 'st_size'=>$size, 'st_weight'=>$weight, 'st_make'=>$make, 'st_model'=>$model, 'st_serial'=>$serial, 
															'st_manufacturer'=>$manufacturer, 'st_additional_specifications'=>$additional_specifications, 'in_estimated_damage_cost'=>$estimated_damage_cost, 'st_picture_attached'=>$photo_name );
								$this->parentdb->manageDatabaseEntry( 'tbl_inv_material_involved_damaged', 'INSERT', $arr_ins_material_involdamage );
							}
						}
						else {
							$brief_description 			= $this->common->escapeStr( $arrPost['txt_brief_description'][$key] );
							$type 						= $this->common->escapeStr( $arrPost['txt_type'][$key] );
							$size 						= $this->common->escapeStr( $arrPost['txt_size'][$key] );
							$weight 					= $this->common->escapeStr( $arrPost['txt_weight'][$key] );
							$make 						= $this->common->escapeStr( $arrPost['txt_make'][$key] );
							$model 						= $this->common->escapeStr( $arrPost['txt_model'][$key] );
							$serial 					= $this->common->escapeStr( $arrPost['txt_serial'][$key] );
							$manufacturer 				= $this->common->escapeStr( $arrPost['txt_manufacturer'][$key] );
							$additional_specifications 	= $this->common->escapeStr( $arrPost['txt_additional_specifications'][$key] );
							$estimated_damage_cost 		= $arrPost['txt_estimated_damage_cost'][$key];

							// Upload Material photo //
								$next_id 				= $key;
								$photo_name				= '';
								if( isset($arrFiles['userfile']['size'][$key]) && $arrFiles['userfile']['size'][$key] ) {
									$_FILES['userfile']['tmp_name'] 	=  $arrFiles['userfile']['tmp_name'][$key];
									$_FILES['userfile']['name'] 		=  $arrFiles['userfile']['name'][$key];
									$_FILES['userfile']['size'] 		=  $arrFiles['userfile']['size'][$key];
									$_FILES['userfile']['type'] 		=  $arrFiles['userfile']['type'][$key];
									$_FILES['userfile']['error'] 		=  $arrFiles['userfile']['error'][$key];

									$ext_photo	 	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
									$photo_name 	= "inv_".$investigation_id."_material_".$next_id.".".$ext_photo;
									
									if( $current_matephoto = glob(FCPATH.$upload_dir."inv_".$investigation_id."_material_".$next_id.".*") ) {
										$arr_current_matephoto = explode("/", $current_matephoto[0]);
										$sizeof_current_matephoto = sizeof($arr_current_matephoto);
										isset($arr_current_matephoto[$sizeof_current_matephoto-1]) ? unlink( FCPATH.$upload_dir.$arr_current_matephoto[$sizeof_current_matephoto-1] ) : '';
									}
									$this->upload->initialize($this->common->setUploadOptions($upload_dir, $photo_name));
									if( !$this->upload->do_upload() ) {
										$upload_error[$next_id] = $this->upload->display_errors();
									}
								}

							$arr_upd_material_involdamage = array( 'in_investigation_id' => $investigation_id, 'st_brief_description' => $brief_description, 
															'st_type'=>$type, 'st_size'=>$size, 'st_weight'=>$weight, 'st_make'=>$make, 'st_model'=>$model, 'st_serial'=>$serial, 
															'st_manufacturer'=>$manufacturer, 'st_additional_specifications'=>$additional_specifications, 
															'in_estimated_damage_cost'=>$estimated_damage_cost );
							(isset($photo_name)&&$photo_name) ? $arr_upd_material_involdamage['st_picture_attached'] = $photo_name : '';
							$arr_where_material_involdamage = array('in_investigation_id' => $investigation_id, 'id'=>$key);
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_material_involved_damaged', 'UPDATE', $arr_upd_material_involdamage, $arr_where_material_involdamage );
						}
					}
				}
			}
		}
	
	// Environment Incident
		function addEnvironmentIncident( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$checkInvestigation = $this->users->getMetaDataList( 'inv_environment_incident', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );

				foreach( $arrPost as $key => $value ) {
					!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
				}

				$sql_mode = sizeof($checkInvestigation)>0 ? "UPDATE" : "INSERT";
				$arr_env_incident = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_name_substance_spilled' => $txt_name_substance_spilled, 
											'st_amount_substance_spilled' => $txt_amount_substance_spilled, 
											'is_other_environment_consultant_contacted' => $rdb_other_environment_consultant_contacted, 
											'is_ministry_environment_notified' => $rdb_ministry_environment_notified, 
											'st_description_environmental_impacts' => $txt_description_environmental_impacts );
				$arr_where_env_incident = (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_environment_incident', $sql_mode, $arr_env_incident, $arr_where_env_incident );
			}
		}

	// Vehicle Accident //
		function addVehicleAccident( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$investigation_id 	= $arrPost['investigation_id'];
				$checkInvestigation = $this->users->getMetaDataList( 'inv_vehicle_accident_master', 'in_investigation_id = "'.$investigation_id.'"', '', 'id' );

				foreach( $arrPost as $key => $value ) {
					!is_array($value) ? $$key = $this->common->escapeStr($value) : "";
				}

				$arr_inv_vehaccmaster 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'is_police_called' => $rdb_police_called,
												'st_officer_name' => $txt_officer_name, 'st_officer_badge' => $txt_officer_badge, 
												'st_division' => $txt_division, 'st_officer_contact_information' => $txt_officer_contact_information );
				$arr_where_vehaccmaster 	= (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $investigation_id) : array();
				$this->parentdb->manageDatabaseEntry( 'tbl_inv_vehicle_accident_master', $sql_mode, $arr_inv_vehaccmaster, $arr_where_vehaccmaster );
				
				$vehicle_master_id = sizeof($checkInvestigation)>0 ? $checkInvestigation[0]['id'] : $this->db->insert_id();

				if( isset($arrPost['txt_driver_name']) && is_array($arrPost['txt_driver_name']) ) {
					foreach( $arrPost['txt_driver_name'] AS $key => $val ) {
						if( $key == 'new' ) {
							foreach( $arrPost['txt_driver_name']['new'] AS $key_new => $val_new ) {
								$driver_name 			= $this->common->escapeStr( $arrPost['txt_driver_name']['new'][$key_new] );
								$driver_license_number 	= $this->common->escapeStr( $arrPost['txt_driver_license_number']['new'][$key_new] );
								$vehicle_owner 			= $this->common->escapeStr( $arrPost['txt_vehicle_owner']['new'][$key_new] );
								$insurance_information 	= $this->common->escapeStr( $arrPost['txt_insurance_information']['new'][$key_new] );
								$vehicle_make 			= $this->common->escapeStr( $arrPost['txt_vehicle_make']['new'][$key_new] );
								$vehicle_model 			= $this->common->escapeStr( $arrPost['txt_vehicle_model']['new'][$key_new] );
								$vehicle_year 			= $arrPost['txt_vehicle_year']['new'][$key_new];
								$vehicle_type 			= $this->common->escapeStr( $arrPost['txt_vehicle_type']['new'][$key_new] );
								$vehicle_color 			= $this->common->escapeStr( $arrPost['txt_vehicle_color']['new'][$key_new] );
								$vehicle_license_plate 	= $this->common->escapeStr( $arrPost['txt_vehicle_license_plate']['new'][$key_new] );
								$no_of_passengers 		= $this->common->escapeStr( $arrPost['txt_no_of_passengers']['new'][$key_new] );
								$seat_belts_warns 		= $arrPost['rdb_seat_belts_warns']['new'][$key_new];

								$arr_ins_vehaccident = array( 'in_investigation_id' => $investigation_id, 'in_vehicle_accident_id' => $vehicle_master_id, 
															'st_driver_name'=>$driver_name, 'st_driver_license_number'=>$driver_license_number,
															'st_vehicle_owner'=>$vehicle_owner, 'st_insurance_information'=>$insurance_information, 'st_vehicle_make'=>$vehicle_make,
															'st_vehicle_model'=>$vehicle_model, 'st_vehicle_year'=>$vehicle_year, 'st_vehicle_type'=>$vehicle_type, 
															'st_vehicle_color'=>$vehicle_color, 'st_vehicle_license_plate'=>$vehicle_license_plate, 
															'in_no_of_passengers'=>$no_of_passengers, 'is_seat_belts_warns'=>$seat_belts_warns );
								$this->parentdb->manageDatabaseEntry( 'tbl_inv_vehicle_accident_details', 'INSERT', $arr_ins_vehaccident );
							}
						}
						else {
							$driver_name 			= $this->common->escapeStr( $arrPost['txt_driver_name'][$key] );
							$driver_license_number 	= $this->common->escapeStr( $arrPost['txt_driver_license_number'][$key] );
							$vehicle_owner 			= $this->common->escapeStr( $arrPost['txt_vehicle_owner'][$key] );
							$insurance_information 	= $this->common->escapeStr( $arrPost['txt_insurance_information'][$key] );
							$vehicle_make 			= $this->common->escapeStr( $arrPost['txt_vehicle_make'][$key] );
							$vehicle_model 			= $this->common->escapeStr( $arrPost['txt_vehicle_model'][$key] );
							$vehicle_year 			= $arrPost['txt_vehicle_year'][$key];
							$vehicle_type 			= $this->common->escapeStr( $arrPost['txt_vehicle_type'][$key] );
							$vehicle_color 			= $this->common->escapeStr( $arrPost['txt_vehicle_color'][$key] );
							$vehicle_license_plate 	= $this->common->escapeStr( $arrPost['txt_vehicle_license_plate'][$key] );
							$no_of_passengers 		= $this->common->escapeStr( $arrPost['txt_no_of_passengers'][$key] );
							$seat_belts_warns 		= $arrPost['rdb_seat_belts_warns'][$key];

							$arr_upd_vehaccident = array( 'in_investigation_id' => $investigation_id, 'in_vehicle_accident_id' => $vehicle_master_id, 
														'st_driver_name'=>$driver_name, 'st_driver_license_number'=>$driver_license_number,
														'st_vehicle_owner'=>$vehicle_owner, 'st_insurance_information'=>$insurance_information, 'st_vehicle_make'=>$vehicle_make,
														'st_vehicle_model'=>$vehicle_model, 'st_vehicle_year'=>$vehicle_year, 'st_vehicle_type'=>$vehicle_type, 
														'st_vehicle_color'=>$vehicle_color, 'st_vehicle_license_plate'=>$vehicle_license_plate, 
														'in_no_of_passengers'=>$no_of_passengers, 'is_seat_belts_warns'=>$seat_belts_warns );
							$arr_where_vehaccident = array('in_investigation_id' => $investigation_id, 'id'=>$key);
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_vehicle_accident_details', 'UPDATE', $arr_upd_vehaccident, $arr_where_vehaccident );
						}
					}
				}
			}
		}
	
	// Possible Contributing Factors //
		function addPossibleContribFactors( $arrPost=array() )
		{
			if( is_array($arrPost) ) {
				$checkInvestigation = $this->users->getMetaDataList( 'inv_possible_contributing_factors', 'in_investigation_id = "'.$arrPost['investigation_id'].'"', '', 'id' );
				
				$fall_protection 			= isset($arrPost['chk_fall_protection']) ? json_encode($arrPost['chk_fall_protection']) : '';
				$housekeeping_storage 		= isset($arrPost['chk_housekeeping_storage']) ? json_encode($arrPost['chk_housekeeping_storage']) : '';
				$environmental_condetions 	= isset($arrPost['chk_environmental_condetions']) ? json_encode($arrPost['chk_environmental_condetions']) : '';
				$ergonomics 				= isset($arrPost['chk_ergonomics']) ? json_encode($arrPost['chk_ergonomics']) : '';
				$personal_protective_equipment = isset($arrPost['chk_personal_protective_equipment']) ? json_encode($arrPost['chk_personal_protective_equipment']) : '';
				$tools_equipment_machinery 	= isset($arrPost['chk_tools_equipment_machinery']) ? json_encode($arrPost['chk_tools_equipment_machinery']) : '';
				$training 					= isset($arrPost['chk_training']) ? json_encode($arrPost['chk_training']) : '';
				$general 					= isset($arrPost['chk_general']) ? json_encode($arrPost['chk_general']) : '';
				$other_contributing_factors = isset($arrPost['txt_other_contributing_factors']) ? json_encode($arrPost['txt_other_contributing_factors']) : '';

				$sql_mode = sizeof($checkInvestigation)>0 ? "UPDATE" : "INSERT";
				$arr_inv_possiblecontrifact = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_fall_protection' => $fall_protection, 
													'st_housekeeping_storage' => $housekeeping_storage, 'st_environmental_condetions' => $environmental_condetions, 
													'st_ergonomics' => $ergonomics, 'st_personal_protective_equipment' => $personal_protective_equipment, 
													'st_tools_equipment_machinery' => $tools_equipment_machinery, 'st_training' => $training, 
													'st_general' => $general, 'st_other_contributing_factors' => $other_contributing_factors );
				$arr_where_possiblecontrifact = (sizeof($checkInvestigation)>0) ? array('in_investigation_id' => $arrPost['investigation_id']) : array();
				$id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_possible_contributing_factors', $sql_mode, $arr_inv_possiblecontrifact, $arr_where_possiblecontrifact );
			}
		}
	
	// Add Recommended Corrective Actions
		function addRecommendedActions( $arrPost=array() )
		{
			if( isset($arrPost['txt_action_assign_to']) && is_array($arrPost['txt_action_assign_to']) ) {
				foreach( $arrPost['txt_action_name'] AS $key => $val ) {
					// common::pr($arrPost['txt_action_name']);die;

					if( $key == 'new' ) {
						$subject_correction_action = "Corrective action assigned from Investigator : ".$this->session->userdata("nickname");
						foreach( $arrPost['txt_action_assign_to']['new'] AS $key_new => $val_new ) {
							if( $arrPost['txt_action_assign_to']['new'][$key_new] ) {
								$action_name 			= $this->common->escapeStr( $arrPost['txt_action_name']['new'][$key_new] );
								$action_assign_to 		= $this->common->escapeStr( $arrPost['txt_action_assign_to']['new'][$key_new] );
								$ret_users 				= $this->users->getUsersByName($action_assign_to);
								
								$assign_to_user_id 		= '';
								$assign_to_user_email 	= '';
								if( isset($ret_users) && sizeof($ret_users) ) {
									$assign_to_user_id 		= $ret_users[0]['id'];
									$assign_to_user_email 	= $ret_users[0]['email_addr'];
								}
								
								$action_comply_date 	= $this->common->escapeStr( $arrPost['txt_action_comply_date']['new'][$key_new] );
								$msg_correction_action 	= "Corrective action: ".$action_name.", which requires to be comply on ".$action_comply_date;
								
								// Insert Corrective action details 
									$arr_ins_recomcorraction = array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_action_name' => $action_name, 
																	'st_action_assign_to' => $assign_to_user_id, 'st_action_comply_date' => $action_comply_date );
									$corrective_action_id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_recommended_corrective_action', 'INSERT', $arr_ins_recomcorraction );
								
								// Insert Followup action details 
									$arr_ins_followupaction = array( 'in_corrective_action_id' => $corrective_action_id, 'st_action_complied_by' => $this->sess_userid );
									$this->parentdb->manageDatabaseEntry( 'tbl_inv_followup_action_taken', 'INSERT', $arr_ins_followupaction );
									
								// Send message to assigned user //
									$arr_ins_message = array( 'send_to' => $assign_to_user_email, 'send_from' => $this->sess_useremail, 
															'subject' => $subject_correction_action, 'message' => $msg_correction_action, 
															'in_corrective_action_id' => $corrective_action_id);
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
									$this->users->sendEmailToS1user($assign_to_user_email, $this->sess_useremail, $subject_correction_action, $msg_correction_action );
							}
						}
					}
					else {
						$subject_correction_action = "Corrective action updated from Investigator : ".$this->session->userdata("nickname");

						if( $arrPost['txt_action_assign_to'][$key] ) {
							$action_name 			= $this->common->escapeStr( $arrPost['txt_action_name'][$key] );
							$action_assign_to 		= $this->common->escapeStr( $arrPost['txt_action_assign_to'][$key] );
							$ret_users 				= $this->users->getUsersByName($action_assign_to);
							
							$assign_to_user_id 		= $assign_to_user_email = '';

							if( isset($ret_users) && sizeof($ret_users) ) {
								$assign_to_user_id 		= $ret_users[0]['id'];
								$assign_to_user_email 	= $ret_users[0]['email_addr'];
							}
							$action_comply_date 	= $this->common->escapeStr( $arrPost['txt_action_comply_date'][$key] );
							
							// Update existing correction action //
								$arr_upd_recomcorrcaction 	= array( 'in_investigation_id' => $arrPost['investigation_id'], 'st_action_name'=>$action_name, 
															'st_action_assign_to'=> $assign_to_user_id, 'st_action_comply_date'=>$action_comply_date );
								$arr_where_recomcorrcaction	= array( 'in_investigation_id'=>$arrPost['investigation_id'], 'id'=>$key );
								$corrective_action_id = $this->parentdb->manageDatabaseEntry( 'tbl_inv_recommended_corrective_action', 'UPDATE', $arr_upd_recomcorrcaction, $arr_where_recomcorrcaction );

							/* Disabling the update recommended action for the existing data //
								// Send corrective action message to assigned user //
									$msg_correction_action 	= "Corrective action: ".$action_name.", which requires to be comply on ".$action_comply_date;
									$arr_ins_message = array( 'send_to' => $assign_to_user_email, 'send_from' => $this->sess_useremail, 
															'subject' => $subject_correction_action, 'message' => $msg_correction_action, 
															'in_corrective_action_id' => $corrective_action_id);
									$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
									$this->users->sendEmailToS1user($assign_to_user_email, $this->sess_useremail, $subject_correction_action, $msg_correction_action );
								*/
						}
					}
				}
			}
		}

	// Get FollowUp Actions 
		function getFollowupAction( $investigationId='' )
		{
			$sql = "SELECT tifat.id, in_corrective_action_id, st_action_name, st_action_complied_by, st_action_complied_date 
					FROM tbl_inv_followup_action_taken AS tifat 
					LEFT JOIN tbl_inv_recommended_corrective_action AS tirca ON tifat.in_corrective_action_id = tirca.id
					WHERE in_investigation_id = '".$investigationId."'";
			$query = $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->result_array();
		}
	
	// Update Followup action //
		function updateFollowupAction( $arrPost=array() )
		{
			if( isset($arrPost['txt_action_complied_date']) && is_array($arrPost['txt_action_complied_date']) ) {
				foreach( $arrPost['txt_action_complied_date'] AS $key_complied_date => $val_complied_date ) {
					$arr_upd_followupaction 	= array( 'st_action_complied_date'=>$val_complied_date );
					$arr_where_followupaction	= array( 'id'=>$key_complied_date );
					$this->parentdb->manageDatabaseEntry( 'tbl_inv_followup_action_taken', 'UPDATE', $arr_upd_followupaction, $arr_where_followupaction );
				}
			}
		}
	
	// Check seal investigation  // 
		function checkInvestigationSealed( $invFormId='' )
		{
			$consultant_client_id = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
						
			$checkInvSealed = $this->users->getMetaDataList( 'inv_investigation_forms', 'in_inv_form_id = "'.$invFormId.'"', '', 'is_inv_form_sealed' );
			$checkInvSealed = $checkInvSealed[0]['is_inv_form_sealed'];

			if( "1" != $checkInvSealed ) {// Investigation is not sealed //
				// ADD/EDIT Consultant performed Information //
					$this->libraries->addConsultantPerformedLibrary($consultant_client_id, 'investigation', $invFormId, 'inprogress' );

				$sql = "SELECT COUNT(trca.id) AS action_pending 
						FROM tbl_inv_recommended_corrective_action AS trca
						LEFT JOIN tbl_inv_followup_action_taken ON trca.id=in_corrective_action_id 
						WHERE in_investigation_id = '".$invFormId."' AND (st_action_complied_date IS NULL || st_action_complied_date = '0000-00-00 00:00:00')";
				$query = $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					$rows_action_pending= $query->row_array();
					$action_pending 	= $rows_action_pending['action_pending'];
					return ($action_pending) ? "SEAL_DISABLE" : "SEAL";
				}
			}
			else if( "1" == $checkInvSealed ) { // Investigation is sealed //
				return "SEALED";
			}
		}
		
	// check Investigation Scope for Specific User //
		function checkInvestigationScope( $invFormId='' )
		{
			if( (int)$invFormId && $invFormId ) {
				$checkInvSealed = $this->users->getMetaDataList( 'inv_investigation_forms', 'in_inv_form_id = "'.$invFormId.'"', '', 'is_inv_form_sealed' );
				$checkInvSealed = $checkInvSealed[0]['is_inv_form_sealed'];

				$loggedin_username 	= $this->session->userdata("nickname");
				$loggedin_userid 	= $this->session->userdata("userid");
				$loggedin_usertype 	= $this->session->userdata("usertype");

				// Check Main Investigator, Additional workers for the logged in user //
					$sql = "SELECT (SELECT COUNT(id) FROM tbl_inv_investigator 
									WHERE st_investigator_name LIKE '%".$loggedin_username."%' OR in_investigation_id = '".$invFormId."') AS main_investigators, 
									(SELECT COUNT(id) FROM tbl_inv_investigation_workers 
									WHERE st_worker_name LIKE '%".$loggedin_username."%' OR in_investigation_id = '".$invFormId."') AS addi_inv_workers";
					$query = $this->db->query($sql);
					$rows_inv_added = (!$query) ? $this->common->dberror() : $query->row_array();

				// Investigation Assigned/Purchased // 
					$sql = "SELECT (SELECT COUNT(id) FROM tbl_assignments WHERE in_inv_form_id = '".$invFormId."'";
					if( $loggedin_usertype == '9' || $loggedin_usertype == '11' ) { // 9=Worker, 11=Student //
						$sql .= " AND uid = '".$loggedin_userid."'";
					}
					else {
						$sql .= " AND owner_id = '".$loggedin_userid."'";
					}
					$sql .= ") AS inv_assigned";
					$sql .= ", (SELECT COUNT(id) FROM tbl_my_library WHERE in_inv_form_id = '".$invFormId."') AS inv_purchased";

					$query = $this->db->query($sql);
					$rows_inv_assign_purchase = (!$query) ? $this->common->dberror() : $query->row_array();

				if( $checkInvSealed == 1 ) {
					$scope = "VIEW";
				}
				else if( $checkInvSealed != 1 ) {
					if( $loggedin_usertype == '9' || $loggedin_usertype == '11' ) { // 9=Worker, 11=Student //
						if( ($rows_inv_added['main_investigators']>0 || $rows_inv_added['addi_inv_workers']>0) 
							|| ($rows_inv_assign_purchase['inv_assigned']>0 || $rows_inv_assign_purchase['inv_purchased']) ) {
							$scope = "EDIT";
						}
						else {
							$scope = "VIEW";
						}
					}
					else {
						if( ($rows_inv_added['main_investigators']>0 || $rows_inv_added['addi_inv_workers']>0) 
							|| ($rows_inv_assign_purchase['inv_purchased']>0 && $rows_inv_assign_purchase['inv_assigned']==0) ) {
							$scope = "EDIT";
						}
						else {
							$scope = "VIEW";
						}
					}
				}
				return $scope;
			}
			else {
				return false;
			}
		}
	
	function sealInvestigation($invFormId='')
	{
		if( (int)$invFormId && $invFormId ) {
			$consultant_client_id = isset($_GET['clientid'])&&(int)$_GET['clientid'] ? (int)$_GET['clientid'] : '';
			
			// Seal investigation 
				$arr_upd_invforms 	= array( 'is_inv_form_sealed'=>'1' );
				$arr_where_invforms	= array( 'in_inv_form_id'=>$invFormId );
				$this->parentdb->manageDatabaseEntry( 'tbl_inv_investigation_forms', 'UPDATE', $arr_upd_invforms, $arr_where_invforms );

			// Get investigation details
				$rows_investigation = $this->users->getMetaDataList( 'inv_investigation_forms', 'in_inv_form_id="'.$invFormId.'"', '', 'in_inv_form_id, st_inv_form_no, in_inv_form_created_by' );
			
			// Send message to Employer //
				$msg_seal_investigation = "Investigation #".$rows_investigation[0]['st_inv_form_no']." Sealed";
				$body_seal_investigation= "Investigation #".$rows_investigation[0]['st_inv_form_no']." sealed on ".date('Y-m-d h:i:s')." from ".$this->session->userdata("username")."";

				$rows_users 			= $this->users->getMetaDataList( 'user', 'id="'.$rows_investigation[0]['in_inv_form_created_by'].'"', '', 'id, email_addr' );
				$assign_to_user_email 	= '';
				( isset($rows_users) && sizeof($rows_users) ) ? $assign_to_user_email = $rows_users[0]['email_addr'] : '';

			// Send seal investigation message //
				$arr_ins_message = array( 'send_to' => $assign_to_user_email, 'send_from' => $this->sess_useremail, 
										'subject' => $msg_seal_investigation, 'message' => $body_seal_investigation);
				$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
				$this->users->sendEmailToS1user($assign_to_user_email, $this->sess_useremail, $msg_seal_investigation, $body_seal_investigation );
				
			// ADD/EDIT Consultant performed Information //
				$this->libraries->addConsultantPerformedLibrary($consultant_client_id, 'investigation', $invFormId, 'completed' );
			
			return true;
		}
		else {
			return false;
		}
	}

	// Investigation Photoes //
		function addInvestigationPhotoes( $arrPost=array(), $arrFiles=array() )
		{
			// common::pr( $arrFiles );die;

			if( isset($arrFiles) ) {
				$upload_error = array();
				$investigation_id 	= isset($arrPost['investigationId']) ? $arrPost['investigationId'] : '';
				$upload_dir 		= $this->path_upload_investigation_photoes; // Relative to the root

				foreach( $arrPost['txt_picture_description'] AS $key_file => $val_file ) {
					if( "new" == $key_file ) {
						foreach( $val_file AS $key_new_file => $val_new_file ) {
							$picture_description= trim($val_file[$key_new_file]);
							$next_row_id 		= $this->parentdb->getLastRowId('tbl_inv_photoes');
							$photo_name			= '';
							if( isset($arrFiles['userfile']['size'][$key_file][$key_new_file]) && $arrFiles['userfile']['size'][$key_file][$key_new_file] > 0 ) {
								$_FILES['userfile']['tmp_name'] 	=  $arrFiles['userfile']['tmp_name'][$key_file][$key_new_file];
								$_FILES['userfile']['name'] 		=  $arrFiles['userfile']['name'][$key_file][$key_new_file];
								$_FILES['userfile']['size'] 		=  $arrFiles['userfile']['size'][$key_file][$key_new_file];
								$_FILES['userfile']['type'] 		=  $arrFiles['userfile']['type'][$key_file][$key_new_file];
								$_FILES['userfile']['error'] 		=  $arrFiles['userfile']['error'][$key_file][$key_new_file];

								$ext_photo	 	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
								$photo_name 	= "inv_".$investigation_id."_".$next_row_id.".".$ext_photo;
							
								// Upload investigation photo //
									$this->upload->initialize($this->common->setUploadOptions($upload_dir, $photo_name));
									(!$this->upload->do_upload()) ? $upload_error[$next_row_id] = $this->upload->display_errors() : '';
							}
							if( $picture_description || $photo_name) {
								$arr_ins_invphotos = array( 'in_investigation_id' => $investigation_id, 'st_picture_description' => $picture_description, 
															'dt_photo_inserted' => date('Y-m-d h:i:s') );
								(isset($photo_name)&&$photo_name) ? $arr_ins_invphotos['st_picture'] = $photo_name : '';
								$this->parentdb->manageDatabaseEntry( 'tbl_inv_photoes', 'INSERT', $arr_ins_invphotos );
							}
						}
					}
					else {
						$picture_description= trim($val_file);
						$row_id 			= $key_file;
						$photo_name			= '';
			
						if( isset($arrFiles['userfile']['size'][$key_file]) && $arrFiles['userfile']['size'][$key_file] ) {
							$_FILES['userfile']['tmp_name'] 	=  $arrFiles['userfile']['tmp_name'][$key_file];
							$_FILES['userfile']['name'] 		=  $arrFiles['userfile']['name'][$key_file];
							$_FILES['userfile']['size'] 		=  $arrFiles['userfile']['size'][$key_file];
							$_FILES['userfile']['type'] 		=  $arrFiles['userfile']['type'][$key_file];
							$_FILES['userfile']['error'] 		=  $arrFiles['userfile']['error'][$key_file];

							$ext_photo	 	= $this->common->getImagePathInfo( $_FILES['userfile']['name'], 'extension' );
							$photo_name 	= "inv_".$investigation_id."_".$row_id.".".$ext_photo;

							if( $current_photo = glob(FCPATH.$upload_dir."inv_".$investigation_id."_".$row_id.".*") ) {
								$arr_current_photo = explode("/", $current_photo[0]);
								$sizeof_current_photo = sizeof($arr_current_photo);
								isset($arr_current_photo[$sizeof_current_photo-1]) ? unlink( FCPATH.$upload_dir.$arr_current_photo[$sizeof_current_photo-1] ) : '';
							}

							// Upload investigation photo //
								$this->upload->initialize($this->common->setUploadOptions($upload_dir, $photo_name));
								(!$this->upload->do_upload()) ? $upload_error[$key_file] = $this->upload->display_errors() : '';
						}
						if( $picture_description || $photo_name) {
							$arr_upd_invphotos = array('in_investigation_id' => $investigation_id, 'st_picture_description' => $picture_description, 'dt_photo_inserted'=>date('Y-m-d h:i:s'));
							(isset($photo_name)&&$photo_name) ? $arr_upd_invphotos['st_picture'] = $photo_name : '';
							$arr_where_invphotos = array('id' => $row_id);
							$this->parentdb->manageDatabaseEntry( 'tbl_inv_photoes', 'UPDATE', $arr_upd_invphotos, $arr_where_invphotos );						
						}
					}
				}
			}
			return $upload_error;
		}
}