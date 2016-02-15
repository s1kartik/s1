<?php 
class Ajax extends MY_Controller
{
	function __construct()	{
		parent::__construct();

		$this->sess_userid 		= $this->session->userdata('userid');
		$this->sess_usertype 	= $this->session->userdata('usertype');
		$this->sess_useremail 	= $this->session->userdata('username');
        $this->sess_nickname 	= $this->session->userdata('nickname');
		$this->user 			= $this->users->getUserByEmail($this->sess_useremail);

		$this->load->library('common');
	}

	function getTranslatedText()
	{
		$this->load->library('googletranslatetool');
		
		$_POST['fromLang'] 	= isset($_POST['fromLang']) ? strtolower($_POST['fromLang']) : 'en';
		$_POST['toLang'] 	= isset($_POST['toLang']) ? strtolower($_POST['toLang']) : 'en';
		$translate_section	= isset($_POST['translateSection']) ? ($_POST['translateSection']) : '';
		
		if( "digital_hazards" == $translate_section ) {
			$paragraph_description	= isset($_POST['paragraphDescription']) ? ($_POST['paragraphDescription']) : '';
			// Store language into the session //
				isset($_POST['fromLang']) ? $this->session->set_userdata('hazard_fromlang' ,$_POST['fromLang']) : '';
				isset($_POST['toLang']) ? $this->session->set_userdata('hazard_tolang', $_POST['toLang']) : '';
				if( $paragraph_description ) {
					echo googletranslatetool::translate($paragraph_description, $this->session->userdata('hazard_fromlang'), $this->session->userdata('hazard_tolang'));
				}
		}
		
		if( "safety_equipment" == $translate_section ) {
			$paragraph_description	= isset($_POST['paragraphDescription']) ? ($_POST['paragraphDescription']) : '';
			// Store language into the session //
				isset($_POST['fromLang']) ? $this->session->set_userdata('safetyequip_fromlang' ,$_POST['fromLang']) : '';
				isset($_POST['toLang']) ? $this->session->set_userdata('safetyequip_tolang', $_POST['toLang']) : '';

			if( $this->session->userdata('safetyequip_tolang') ) {
			// When language is changed //
				$arr_trade	= isset($_POST['arrTrade']) ? ($_POST['arrTrade']) : array();
				if( isset($arr_trade[0]) && $arr_trade[0] ) { 
					$arr_return_trade = array();
					foreach( $arr_trade AS $key_trade => $val_trade ) {
						$arr_return_trade[$key_trade] = googletranslatetool::translate($val_trade, $this->session->userdata('safetyequip_fromlang'), $this->session->userdata('safetyequip_tolang') );
					}
					echo json_encode($arr_return_trade);
				}
				
			// When "dot" is clicked for any trade //
				if( $paragraph_description ) {
					echo googletranslatetool::translate($paragraph_description, $this->session->userdata('safetyequip_fromlang'), $this->session->userdata('safetyequip_tolang') );
				}
			}
		}
		else if( "s1_library" == $translate_section ) {
			$paragraph_description	= isset($_POST['paragraphDescription']) ? ($_POST['paragraphDescription']) : '';
			$is_plain_text			= isset($_POST['isPlainText']) ? ($_POST['isPlainText']) : '';
			
			isset($_POST['fromLang']) ? $this->session->set_userdata('s1lib_fromlang' ,$_POST['fromLang']) : '';
			isset($_POST['toLang']) ? $this->session->set_userdata('s1lib_tolang', $_POST['toLang']) : '';
			
			$paragraph_description	= ("1"==$is_plain_text) ? $paragraph_description : base64_decode($paragraph_description);
			echo googletranslatetool::translate($paragraph_description, $this->session->userdata('s1lib_fromlang'), $this->session->userdata('s1lib_tolang') );
		}
		else if( "instructor_library" == $translate_section ) {
			$paragraph_description	= isset($_POST['paragraphDescription']) ? ($_POST['paragraphDescription']) : '';
			isset($_POST['fromLang']) ? $this->session->set_userdata('instructor_lib_fromlang' ,$_POST['fromLang']) : '';
			isset($_POST['toLang']) ? $this->session->set_userdata('instructor_lib_tolang', $_POST['toLang']) : '';
			$paragraph_description	= isset($paragraph_description) ? base64_decode($paragraph_description) : '';
			echo googletranslatetool::translate($paragraph_description, $this->session->userdata('instructor_lib_fromlang'), $this->session->userdata('instructor_lib_tolang') );
		}
		else if( "proc_preview" == $translate_section ) {
			isset($_POST['fromLang']) ? $this->session->set_userdata('procprev_fromlang' ,$_POST['fromLang']) : '';
			isset($_POST['toLang']) ? $this->session->set_userdata('procprev_tolang', $_POST['toLang']) : '';
			
			// Purpose // 
				$trans_purpose_title = $trans_purpose_description = '';
				if( isset($_POST['purpose_title']) && $_POST['purpose_title'] ) {
					$purpose_title	= $_POST['purpose_title'];
					$trans_purpose_title = googletranslatetool::translate($purpose_title, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
				}
				if( isset($_POST['purpose_description']) && $_POST['purpose_description'] ) {
					$purpose_description	= $_POST['purpose_description'];
					$trans_purpose_description = googletranslatetool::translate($purpose_description, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
				}
			
			// Machinery //
				$trans_machinery_contents = array();
				if( isset($_POST['machinery_contents']) && $_POST['machinery_contents'] ) {
					$machinery_contents 	= json_decode($_POST['machinery_contents']);
					foreach( $machinery_contents AS $val_machinery_contents ) {
						$trans_machinery_contents[] = googletranslatetool::translate($val_machinery_contents, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
					}
				}
			
			// Procedures // 
				$trans_procedure_tips = '';
				if( isset($_POST['procedure_tips']) ) {
					$procedure_tips			= json_decode($_POST['procedure_tips']);
					$trans_procedure_tips 	= (isset($procedure_tips[0])&&$procedure_tips[0]) 
											? googletranslatetool::translate($procedure_tips[0], $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang')) : '';
				}
				$trans_procedure_items = array();
				if( isset($_POST['procedure_items']) && $_POST['procedure_items'] ) {
					$procedure_items		= json_decode($_POST['procedure_items']);
					foreach( $procedure_items AS $val_procedure_items ) {
						$trans_procedure_items[] = googletranslatetool::translate($val_procedure_items, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
					}
				}
			
			// Due Diligence //
				$duedilig_prev_worker = "<p class='s1content_subtitle'>OHSA s.28 and s.66(1)</p>";
				$duedilig_prev_worker .= "<p class='s1content_body_section'>As a worker you have the responsibility to ensure:</p>";
				$duedilig_prev_worker .= "<ul class='s1content_ul_disc'><li>You wear the appropriate PPE for the task being performed and that it is in good condition.</li>";
				$duedilig_prev_worker .= "<li>You are aware of all health and safety hazards in the workplace</li>";				
				$duedilig_prev_worker .= "<li>Work safely and ensure you follow all the safety rules and regulations required by law</li>";
				$duedilig_prev_worker .= "<li>Report to your supervisor if you’ve been injured at work immediately</li>";
				$duedilig_prev_worker .= "<li>Report to management any hazard that you see in the workplace</li></ul>";
				$duedilig_prev_worker .= "<p class='s1content_body_section'><strong>Note:</strong> Workers have been charged for failing to tell Management of a hazard in the workplace directly relating to an injury or fatality of another worker.</p>";
				$duedilig_prev_worker .= "<p class='s1content_body_section'><strong>Max Penalty:</strong> $25,000 per charge and possible Jail time</p>";
				$trans_duedilig_prev_worker		= googletranslatetool::translate($duedilig_prev_worker, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
				
				$duedilig_prev_supervisor = "<p class='s1content_subtitle'>OHSA s.27 s.66(2) and Bill C-45 (criminal)</p>";
				$duedilig_prev_supervisor .= "<p class='s1content_body_section'>As a Supervisor you are responsible for the safety of all the workers under your supervision.</p>";
				$duedilig_prev_supervisor .= "<ul class='s1content_ul_disc'><li>Ensuring health and safety policies and procedures for the workplace are created and communicated to workers</li>";
				$duedilig_prev_supervisor .= "<li>Ensuring workers, follow the law and the company safety requirements</li>";				
				$duedilig_prev_supervisor .= "<li>Making sure workers work safely and use the required safety equipment</li>";
				$duedilig_prev_supervisor .= "<li>Informing workers of the actual and potential health and safety risks and hazards in their work area, and show them how to work safely.</li>";
				$duedilig_prev_supervisor .= "<li>Ensuring workers are adequately trained to perform their jobs safely.</li>";
				$duedilig_prev_supervisor .= "<li>Taking all reasonable precautions to protect the health and safety of workers.</li></ul>";
				$trans_duedilig_prev_supervisor	= googletranslatetool::translate($duedilig_prev_supervisor, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
				
				$duedilig_prev_employer = "<p class='s1content_subtitle'>OHSA s.25, s.26 s.66(2) and Bill C-45 (criminal)</p>";
				$duedilig_prev_employer .= "<ul class='s1content_ul_disc'><li>Ensuring health and safety policies and procedures for the workplace are created and communicated to workers</li>";
				$duedilig_prev_employer .= "<li>Ensuring workers are adequately trained </li>";				
				$duedilig_prev_employer .= "<li>Making sure workers are informed of the hazards and dangers in the workplace.</li>";
				$duedilig_prev_employer .= "<li>Ensuring adequate PPE is provided, maintained and used appropriately</li>";
				$duedilig_prev_employer .= "<li>Taking all reasonable precautions to protect the health and safety of workers</li>";
				$duedilig_prev_employer .= "<li>Ensuring that tools, equipment and materials are  maintained in good condition</li>";
				$duedilig_prev_employer .= "<li>Providing information, instruction and supervision to protect worker health and safety</li></ul>";
				$trans_duedilig_prev_employer	= googletranslatetool::translate($duedilig_prev_employer, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
			
				$trans_regulation_string 	= array();
				if( isset($_POST['regulation_string']) && $_POST['regulation_string'] ) {
					$arr_regulation_data = json_decode($_POST['regulation_string']);
					foreach( $arr_regulation_data AS $val_regulation_string ) {
						$regno 		= ($val_regulation_string->regno) ? "Reg. ".$val_regulation_string->regno." " : '';
						$section 	= ($val_regulation_string->section) ? "s. ".$val_regulation_string->section : '';
						$subsection = ($val_regulation_string->subsection) ? " - ".$val_regulation_string->subsection : '';
						$item 		= ($val_regulation_string->item) ? " - ".$val_regulation_string->item : '';
						$subitem 	= ($val_regulation_string->subitem) ? " - ".$val_regulation_string->subitem : '';
						$regulation_string = $regno.$section.$subsection.$item.$subitem;
											
						$trans_regulation_string[] = googletranslatetool::translate($regulation_string, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );
					}
				}
			// Glossary //
				$trans_desc_glossary = '';
				if( isset($_POST['desc_glossary']) ) {
					$desc_glossary			= urldecode($_POST['desc_glossary']);
					
					$trans_desc_glossary 	= (isset($desc_glossary)&&$desc_glossary) 
											? googletranslatetool::translate($desc_glossary, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang')) : '';
				}
			
			// Save and Close
				$text_save_close 		= "By clicking on button below this Procedure will be locked, available for assigning.";
				$trans_text_save_close	= googletranslatetool::translate($text_save_close, $this->session->userdata('procprev_fromlang'), $this->session->userdata('procprev_tolang') );

				
			echo json_encode( array("purpose_title"		=> $trans_purpose_title, "purpose_desc" => $trans_purpose_description, 
									"machinery"			=> $trans_machinery_contents, "procedure_tips" 	=> $trans_procedure_tips, 
									"procedure_items" 	=> $trans_procedure_items, "regulation_string" => $trans_regulation_string,
									"duedilig_prev_worker" 	=> $trans_duedilig_prev_worker, "duedilig_prev_supervisor" => $trans_duedilig_prev_supervisor,
									"duedilig_prev_employer"=> $trans_duedilig_prev_employer, "desc_glossary" => $trans_desc_glossary, "text_save_close" => $trans_text_save_close
									)
							);
		}
	}
	
	/*
	function getHazardTranslatedText()
	{
		$lang 		= "";
		$type 		= isset($_POST['contentType']) ? $_POST['contentType'] : "";
		$arr_content= array('fall'=> array('box1description'=>1,'box1stats'=>1,'box1controls'=>2), 
							'falling'=> array('box2description'=>1,'box2stats'=>1,'box2controls'=>2), 
							'struck'=> array('box3description'=>1,'box3stats'=>1,'box3controls'=>2), 
							'trench'=> array('box4description'=>1,'box4stats'=>1,'box4controls'=>2), 

							'washroom'=> array('box5description'=>1,'box5stats'=>1,'box5controls'=>2), 
							'unguarded'=> array('box6description'=>1,'box6stats'=>1,'box6controls'=>2), 
							'exposure'=> array('box7description'=>1,'box7stats'=>1,'box7controls'=>2), 
							'explosions'=> array('box8description'=>1,'box8stats'=>1,'box8controls'=>2), 

							'crushed'=> array('box9description'=>1,'box9stats'=>1,'box9controls'=>2), 
							'fire'=> array('box10description'=>1,'box10stats'=>1,'box10controls'=>2), 
							'fall_level'=> array('box11description'=>1,'box11stats'=>1,'box11controls'=>2), 
							'scaffolds'=> array('box12description'=>1,'box12stats'=>1,'box12controls'=>2), 

							'office'=> array('box13description'=>1,'box13stats'=>1,'box13controls'=>2), 
							'excavation_collapse'=> array('box14description'=>1,'box14stats'=>1,'box14controls'=>2),
							'overhead'=> array('box15description'=>1,'box15stats'=>1,'box15controls'=>2), 
							'ladders'=> array('box16description'=>1,'box16stats'=>1,'box16controls'=>2), 
							);

		if(isset($_POST['toLang'])) {
			$lang = $_POST['toLang'];
			$this->session->set_userdata('hazard_tolang',$lang);
		}
		// Store language into the session //            
		if(!$this->session->userdata('hazard_tolang')) {
			$lang = "english";
			$this->session->set_userdata('hazard_tolang',$lang);
			$this->lang->load('hazard', $lang);
		}
		else {
			$lang = $this->session->userdata('hazard_tolang');
			$this->lang->load('hazard', $lang);
		}

		$this->lang->load('hazard', $lang);
		$j = 1;$cnt = 1;
		// common::pr( $arr_content );
		foreach ($arr_content[$type] as $key=>$cntval){
			for($i=1;$i<=$cntval;$i++){
				$arr_return_content[$cnt] = lang($type."_".$j."_".$i);
				$cnt++;
				}
			   $j++;
		}
		$arr_return_content[$cnt+1] = $this->session->userdata('hazard_tolang');
		$arr_return_content[$cnt+2] = lang("heading_1");
		$arr_return_content[$cnt+3] = lang("heading_2");
		$arr_return_content[$cnt+4] = lang("heading_3");

		// common::pr($arr_return_content);die;
		echo json_encode($arr_return_content);
	}
	*/
	
	

        function getTranslatedImageDesc(){
            $this->load->library('googletranslatetool');
            isset($_POST['fromLang']) ? $this->session->set_userdata('s1lib_fromlang' ,$_POST['fromLang']) : '';
            isset($_POST['toLang']) ? $this->session->set_userdata('s1lib_tolang', $_POST['toLang']) : '';
            $image_description	= isset($_POST['imageDescription']) ? ($_POST['imageDescription']) : '';
            $image_description	= isset($image_description) ? base64_decode($image_description) : '';
            $fromlang	= isset($_POST['fromLang']) ? ($_POST['fromLang']) : '';
            $tolang	= isset($_POST['toLang']) ? ($_POST['toLang']) : '';            
            echo googletranslatetool::translate($image_description, $fromlang, $tolang);
        }
		
        function getTranslatedVideoDesc(){
            $this->load->library('googletranslatetool');
            isset($_POST['fromLang']) ? $this->session->set_userdata('s1lib_fromlang' ,$_POST['fromLang']) : '';
            isset($_POST['toLang']) ? $this->session->set_userdata('s1lib_tolang', $_POST['toLang']) : '';
            $video_description	= isset($_POST['videoDescription']) ? ($_POST['videoDescription']) : '';
            $video_description	= isset($video_description) ? base64_decode($video_description) : '';
            $fromlang	= isset($_POST['fromLang']) ? ($_POST['fromLang']) : '';
            $tolang	= isset($_POST['toLang']) ? ($_POST['toLang']) : '';        
            echo googletranslatetool::translate($video_description, $fromlang, $tolang);
        }
                
	function ajaxSearchInvestigationWorkers()
	{
		$data['user']=$this->user;
		
		$investigation_id 			= isset($_POST['investigation_no']) ? $_POST['investigation_no'] : '';
		$worker_text 				= isset($_POST['txt_worker_text']) ? $_POST['txt_worker_text'] : '';
		$data['txt_worker_text'] 	= $worker_text;
		$arrWhere['txt_worker_text']= $worker_text;

		$rows_workers 		= array();
		if($worker_text) {
			$rows_workers 	= $this->investigation->getInvestigationWorkers( $investigation_id, $arrWhere );
		}
		$data['rows_workers']	= $rows_workers;
		$data['display_msg']	= "No data found, please try again.";

		$this->load->view('ajax/ajax_investigation_workers', $data); 
	}

	function ajaxAddInvestigation()
	{
		$arr_post 		= isset($_POST) ? $_POST : array();
		$arr_files 		= isset($_FILES) ? $_FILES : array();
		$section_name 	= isset($_POST['sectionName']) ? $_POST['sectionName'] : '';

		switch($section_name)
		{
			case 'main_investigator': {
				$this->investigation->addMainInvestigator( $arr_post );
				break;
			}
			case 'COVER_NEXT': {
				$this->investigation->addMainInvestigator( $arr_post );
				break;
			}
			case 'investigation_workers': {
				$this->investigation->addInvestigationWorkers( $arr_post );
				break;
			}
			case 'investigation_cover': {
				$this->investigation->addInvestigationCover( $arr_post );
				break;
			}
			case 'incident_types': {
				$this->investigation->addIncidentTypes( $arr_post );
				break;
			}
			case 'incident_detaildesc': {
				$this->investigation->addIncidentDetailDesc( $arr_post );
				break;
			}
			case 'incident_details': {
				$this->investigation->addIncidentDetails( $arr_post );
				break;
			}
			case 'injury_report': {
				$this->investigation->addInjuryReport( $arr_post );
				break;
			}
			case 'inv_first_aid': {
				$this->investigation->addFirstAid( $arr_post );
				break;
			}
			case 'environment_incident': {
				$this->investigation->addEnvironmentIncident( $arr_post );
				break;
			}
			case 'material_involved': {
				return $ret_material_involved = $this->investigation->addMaterialInvolved( $arr_post, $arr_files );
				break;
			}
			case 'vehicle_accident': {
				$this->investigation->addVehicleAccident( $arr_post );
				break;
			}
			case 'witness_report': {
				$this->investigation->addWitnessReport( $arr_post );
				break;
			}
			case 'possible_contrib_factors': {
				$this->investigation->addPossibleContribFactors( $arr_post );
				break;
			}
			case 'recommended_actions': {
				$this->investigation->addRecommendedActions( $arr_post );
				break;
			}
			case 'followup_actions': {
				$this->investigation->updateFollowupAction( $arr_post );
				break;
			}
			case 'investigation_photoes': {
				return $ret_inv_photoes = $this->investigation->addInvestigationPhotoes( $arr_post, $arr_files );
				break;
			}
		}
	}

	function checkIfAllQuizAnswered()
	{
		$quiz_section 		= (isset($_POST['quizSection']) && $_POST['quizSection']) ? $_POST['quizSection'] : 'fatality_breakdown';
		$quiz_section_id 	= (isset($_POST['quizSectionId']) && $_POST['quizSectionId']) ? $_POST['quizSectionId'] : '1';

		$rows_quiz 	= $this->users->getMetaDataList('quiz_questions', 'st_quiz_section_name="'.$quiz_section.'" AND in_quiz_section_id="'.$quiz_section_id.'"', '', 'in_quiz_id');
		$total_quiz_answers = (isset($rows_quiz[0]['in_quiz_id']) && $rows_quiz[0]['in_quiz_id']) ? sizeof($rows_quiz) : '';

		// Check if All quiz answers are correct //
			$rows_quiz_answers 	= $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$quiz_section_id.'" AND 
																st_quiz_section_name="'.$quiz_section.'" AND in_quiz_performed_by="'.$this->sess_userid.'" 
																AND is_answer_correct=1', '', 'in_quiz_id');
			$total_user_quiz_answers = (isset($rows_quiz_answers[0]['in_quiz_id']) && $rows_quiz_answers[0]['in_quiz_id'] ) ? sizeof($rows_quiz_answers) : 0;
			$quiz_score = ($total_quiz_answers>0) ? round(($total_user_quiz_answers/$total_quiz_answers)*100) : '0';
			
			$total_quiz_answers.": ".$total_user_quiz_answers.": ".$quiz_score;
			if( $quiz_score >= 100 ) {
				echo "1";
			}
	}
	
	function addQuizDetails()
	{
		$quiz_section_id 	= (isset($_POST['quizSectionId']) && $_POST['quizSectionId']) ? $_POST['quizSectionId'] : '';
		$quiz_id 			= (isset($_POST['quizId']) && $_POST['quizId']) ? $_POST['quizId'] : '';
		$correct_answer 	= (isset($_POST['correctAns']) && $_POST['correctAns']) ? $_POST['correctAns'] : '0';
		$user_answer 		= (isset($_POST['userAnswer']) && $_POST['userAnswer']) ? $_POST['userAnswer'] : '';
		
		$is_answer_correct 	= ($correct_answer==$user_answer) ? 1 : 0;
		$quiz_section 		= (isset($_POST['quizSection']) && $_POST['quizSection']) ? $_POST['quizSection'] : '';
		
		("awareness_training"==$quiz_section || "instructor_library"==$quiz_section) ? $is_answer_correct = $correct_answer : '';

		// Add User Quiz entry //
			$rows_videos_quiz = $this->users->getMetaDataList('quiz_master', 'in_quiz_id="'.$quiz_id.'" AND in_quiz_section_id="'.$quiz_section_id.'" AND in_quiz_performed_by="'.$this->sess_userid.'"', '', 'in_quiz_id');
			if( isset($rows_videos_quiz[0]['in_quiz_id']) && $rows_videos_quiz[0]['in_quiz_id'] ) {
				$arr_upd_quiz = array('st_quiz_section_name'=> $quiz_section, 
									  'in_quiz_section_id' 	=> $quiz_section_id, 
									  'in_answer_by_user'	=> $user_answer, 
									  'is_answer_correct'	=> $is_answer_correct, 
									  'dt_date_updated'		=> date('Y-m-d h:i:s'));
				$arr_where_quiz = array('in_quiz_id'		=> $quiz_id, 
										'in_quiz_section_id'	=> $quiz_section_id, 
										'in_quiz_performed_by'	=> $this->sess_userid);
				$this->parentdb->manageDatabaseEntry( 'tbl_quiz_master', 'UPDATE', $arr_upd_quiz, $arr_where_quiz );
			}
			else {
				$arr_ins_quiz = array('in_quiz_id'			=> $quiz_id, 
									  'in_quiz_performed_by'=> $this->sess_userid, 
									  'st_quiz_section_name'=> $quiz_section, 
									  'in_quiz_section_id' 	=> $quiz_section_id, 
									  'in_answer_by_user'	=> $user_answer, 
									  'is_answer_correct'	=> $is_answer_correct);
				$this->parentdb->manageDatabaseEntry( 'tbl_quiz_master', 'INSERT', $arr_ins_quiz );
			}
	}

	function ajaxGetFatalityQuiz()
	{
		$videoquiz_section_id = (isset($_POST['videoId']) && $_POST['videoId']) ? $_POST['videoId'] : '';
		$rows_videos_quiz = $this->users->getMetaDataList('quiz_questions', 'st_quiz_section_name="fatality_breakdown" 
											AND in_quiz_section_id="'.$videoquiz_section_id.'"', '', 'in_quiz_id, st_quiz_question, in_answer_correct');
		foreach( $rows_videos_quiz AS $key_video_quiz => $val_video_quiz ) {
			$quiz_id = isset($val_video_quiz['in_quiz_id']) ? $val_video_quiz['in_quiz_id'] : '';
			$rows_quiz_answers 	= $this->users->getMetaDataList('quiz_answers','in_quiz_section_id = "'.$videoquiz_section_id.'" AND in_quiz_id="'.$quiz_id.'"','','st_quiz_answer');
			?>
			<div class="flexslider" id="<?php echo 'id_fatality_quiz'.$quiz_id;?>">
				<div>
					<h5>
						<?php echo ($key_video_quiz+1);?>&nbsp;<?php echo $val_video_quiz['st_quiz_question'];?>
						<span id="icon_<?php echo $quiz_id;?>" class="cls_icon_<?php echo $quiz_id;?>"></span>
					</h5>
					<ul style="list-style:lower-latin;">
						<?php 
						$user_answer_checked= '';
						$total_quiz_answers = sizeof($rows_quiz_answers);
						$correct_answer 	= (isset($val_video_quiz['in_answer_correct']) && $val_video_quiz['in_answer_correct']) ? $val_video_quiz['in_answer_correct'] : '';
						$checked_correct_answer	='';
						
						foreach( $rows_quiz_answers AS $key_quiz_ans => $val_quiz_ans ) {
							$quiz_answer = $val_quiz_ans['st_quiz_answer'];
							$rows_videos_quiz 	= $this->users->getMetaDataList('quiz_master', 'in_quiz_id="'.$quiz_id.'" 
												AND in_quiz_section_id="'.$videoquiz_section_id.'" 
												AND in_quiz_performed_by="'.$this->sess_userid.'"', '', 'in_answer_by_user');
							$answer_by_user 	= (isset($rows_videos_quiz[0]['in_answer_by_user']) && $rows_videos_quiz[0]['in_answer_by_user']) 
													? $rows_videos_quiz[0]['in_answer_by_user'] : '';
							$checked_correct_answer = ( $answer_by_user==($key_quiz_ans+1) ) ? 'checked' : '';?>
							<li for="answer<?php echo ($key_quiz_ans+1);?>" onclick="checkQuizAnswer('<?php echo $videoquiz_section_id;?>', '<?php echo $quiz_id;?>', '<?php echo $correct_answer;?>', '<?php echo $total_quiz_answers;?>');">
								<input type="radio" value="<?php echo $key_quiz_ans+1;?>" <?php echo $checked_correct_answer;?> name="answer<?php echo $quiz_id;?>" id="answer<?php echo $quiz_id;?>" class="my_answer wordbreak">
								&nbsp;<?php echo $quiz_answer;?>
							</li>
							<?php 
						}?>
					</ul>
				</div>
			</div>
			<?php 
		}
	}
	
	function ajax_addpoints()
	{
        echo $this->points->addPagePoints($this->sess_userid, $_POST['page_id'], $_POST['point_id']);
    }
	
	function ajax_section_read()
	{
		$point_page_id 			= 12;
		$point_pagesection_id 	= isset($_POST['alertId']) ? $_POST['alertId'] : '';
		$user_id 		= isset($_POST['userId']) ? $_POST['userId'] : '';
		
		$has_selected_byuser= $this->points->hasUserGotPointsOfPageSection( $user_id, $point_pagesection_id, $point_page_id);
		$has_selected_byuser= isset($has_selected_byuser['has_points']) ? $has_selected_byuser['has_points'] : "";
		// common::pr( $has_selected_byuser );die;

		( !$has_selected_byuser ) ? $add_points 	= $this->points->addPagePoints($this->sess_userid, $point_page_id, $point_pagesection_id) : '';
		echo trim($has_selected_byuser);
    }

	// Check the reading history of the Awareness Training libraries and add/update the same accordingly //
		function ajaxSetPointsForWholePageSection()
		{
			$pointSection = isset($_POST['pointSection']) ? $_POST['pointSection'] : '';
			switch ($pointSection) {
				case "getstarted_awareness_training": {
					$lib = array(248,245,246,244,365,368,369,370); // Awareness training library ids //
					foreach($lib AS $val_lib) {
						$check_reading_userlib = $this->users->getMetaDataList('reading_history','uid="'.$this->sess_userid.'" AND library_id="'.$val_lib.'"', '', 'library_id');
						if( isset($check_reading_userlib[0]['library_id']) ) {
							$arr_upd_readhistory 	= array('progress' => 100);
							$arr_where_readhistory 	= array('uid'=>$this->sess_userid, 'library_id'=>$val_lib);
							$this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'UPDATE', $arr_upd_readhistory, $arr_where_readhistory );
						}
						else {
							$arr_ins_readhistory 	= array('uid'=>$this->sess_userid, 'library_id'=>$val_lib, 'progress'=>100);
							$this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'INSERT', $arr_ins_readhistory );
						}
					}
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 23, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 23) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 24, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 24) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 25, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 25) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 26, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 26) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 27, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 27) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 28, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 28) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 29, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 29) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 30, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 30) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(2, 1018, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 2, 1018) : '';

					echo ("7"!=$this->sess_usertype) ? $rows['page_points'] : "";
				}

				case "digital_hazards": {
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 1, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 1) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 2, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 2) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 3, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 3) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 4, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 4) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 5, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 5) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 6, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 6) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 7, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 7) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 8, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 8) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 9, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 9) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 10, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 10) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 11, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 11) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 12, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 12) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 13, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 13) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 14, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 14) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 1019, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 1019) : '';
					$rows = $this->points->hasUserGainedPointsGetPoints(1, 1020, $checkPointsGained=1);
					(!$rows['has_points_gained']) ? $this->points->addPagePoints($this->sess_userid, 1, 1020) : '';

					echo ("7"!=$this->sess_usertype) ? $rows['page_points'] : "";
				}
			}
		}

		function ajaxRiskSlider()
		{
			(isset($_POST['procedure_id'])&&$_POST['procedure_id']) ? $data['procedure_id'] = $_POST['procedure_id'] : '';
			(isset($_POST['procedure_status'])&&$_POST['procedure_status']) ? $data['procedure_status'] = $_POST['procedure_status'] : '';
			(isset($_POST['procedure_type'])&&$_POST['procedure_type']) ? $data['procedure_type'] = $_POST['procedure_type'] : '';
			$this->load->view('new_procedure_preview', $data);
		}
		
	function ajax_set_get_page_points()
	{
		$point_page_id 			= isset($_POST['pointPageId']) ? $_POST['pointPageId'] : '';
		$point_pagesection_id 	= isset($_POST['pointPageSectionId']) ? $_POST['pointPageSectionId'] : '';
		$point_pagesubsection_id= isset($_POST['pointPageSubSectionId']) ? $_POST['pointPageSubSectionId'] : '';
		$visitedSection 		= isset($_POST['visitedSection']) ? $_POST['visitedSection'] : '';
		$id_page_section 		= '';

		if( "fatality_video" == $visitedSection ) {
			$id_page_section = 18; // Point PageId = 18
		}
		else if( "procedures" == $visitedSection ) {
			$id_page_section= $point_pagesection_id;
		}
		if( (int)$id_page_section ) {
			$get_pagesection_points = $this->points->hasUserGotPointsOfPageSection( $this->sess_userid, $point_pagesection_id, $point_page_id, $point_pagesubsection_id);
			$get_pagesection_points	= isset($get_pagesection_points['has_points']) ? $get_pagesection_points['has_points'] : "";
			if( !$get_pagesection_points ) {
				$add_points 	= $this->points->addPagePoints($this->sess_userid, $point_page_id, $point_pagesection_id, $point_pagesubsection_id);
				$rows_points	= $this->points->getPagePointsByPageID( $point_page_id, $id_page_section );
				$points 		= isset($rows_points[0]['in_credits']) ? $rows_points[0]['in_credits'] : '';
				echo ("7"!=$this->sess_usertype) ? $points : "";
			}
			else {
				if( "54" == $point_pagesection_id ) { // 54 = New Procedure //
					$this->points->updateNoofInstanceForNewProcedure( $this->sess_userid, $point_page_id, $point_pagesection_id, $point_pagesubsection_id );
				}
			}
		}
		else {
			$rows = $this->points->hasUserGainedPointsGetPoints($point_page_id, $point_pagesection_id, 1);
			if( !$rows['has_points_gained'] ) {
				$add_pagesection_points = $this->points->addPagePoints($this->sess_userid, $point_page_id, $point_pagesection_id);

				// Training worker and Training supervisor //
					("2"==$point_page_id) ? $rows['page_points'] : '';
				
				echo ("7"!=$this->sess_usertype) ? $rows['page_points'] : "";
			}
			else {
				echo "";
			}
		}
	}

	function ajaxUnionLibraries()
	{
		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);

		$where_unionlib 		= '1';
		$data['union_libtype'] 	= $union_libtype= isset($_POST['union_libtype']) ? $_POST['union_libtype'] : '';
		$data['union_libtext'] 	= $union_libtext= isset($_POST['union_libtext']) ? $_POST['union_libtext'] : '';
		$union_campus 			= isset($_POST['union_campus']) ? $_POST['union_campus'] : '';
		$data['union_campus']	= $union_campus;
		("all"==$union_campus) ? $union_campus = '' : '';
		
		$data['union_id'] 		= $union_id = isset($_POST['unionId']) ? $_POST['unionId'] : '';

		if( !$union_libtype ) { // Set all the Union Library types if no library selected //
			$union_lib_types 		= $this->users->getMetaDataList('library_types', 'find_in_set("'.$union_id.'", parent_library_type)', '', 'id, library_type');
			$union_lib_types		= (isset($union_lib_types) && sizeof($union_lib_types)) ? $union_lib_types : array();
			$library_types = array();
			foreach( $union_lib_types AS $key_id => $val ) {
				$library_types[] = $val['id'];
			}
			$union_libtype = (isset($library_types[0]) && $library_types[0]) ? implode(",", $library_types) : '';
		}
		
		$union_libtype ? $where_unionlib .= " AND library_type_id IN (".$union_libtype.")" : '';
		$union_libtext ? $where_unionlib .= " AND (title LIKE '%".$union_libtext."%')" : '';

		if( $union_campus || $union_libtype ) {
			$where_unionlib 	.= " AND status=1 AND (date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>CURDATE()))";
			$row_union_library 	= $this->users->getMetaDataList( "library", $where_unionlib, "ORDER BY TRIM(title)" );
			$row_union_library 	= isset($row_union_library) ? $row_union_library : array();
			foreach( $row_union_library AS $key => $val ) {
				if( $union_campus ) {
					$where_campus = ($union_campus=="all") ? 'st_campus_name="'.$union_campus.'" AND ' : '';
					// Get library types of selected Campus //
						$rows_libid = $this->users->getMetaDataList('library_campus',
												$where_campus.' in_library_type_id="'.$val['library_type_id'].'" AND in_status=1', '', 'in_library_id');
						$campus_libid = (isset($rows_libid[0]['in_library_id'])&&$rows_libid[0]['in_library_id']) ? $rows_libid[0]['in_library_id'] : '';

						($val['library_id']==$campus_libid) ? $union_libraries[$val['library_type_id']][] = $val : '';
				}
				else {
					$union_libraries[$val['library_type_id']][] = $val;
				}
			}
		}
		// common::pr($union_libraries);
		$data['union_libraries'] = isset($union_libraries) ? $union_libraries : array();
		
		$this->load->view('ajax/ajax_union_libraries', $data); 
	}

	function ajaxGetUnionCourses()
	{
		$data['campus_name'] 	= $campus_name = isset($_POST['campus_name']) ? trim($_POST['campus_name']) : '';
		$data['union_id'] 		= $union_id 		= isset($_POST['unionId']) ? trim($_POST['unionId']) : '';

		$where_unioncourses 	= (!$campus_name||"all"==$campus_name) ?  array('in_union_id'=>$union_id) : array('in_union_id'=>$union_id, 'st_campus_name'=>$campus_name);

		$rows_union_courses 	= $this->users->getUnionLibraryCourses($where_unioncourses);

		$data['rows_union_courses'] = isset($rows_union_courses) ? $rows_union_courses : array();
		$this->load->view('ajax/ajax_union_courses', $data); 
	}
	
	function ajaxAddUnionCourse()
	{
		$lib_id 		= isset($_POST['lib_id']) ? $_POST['lib_id'] : '';
		$union_id 		= isset($_POST['union_id']) ? $_POST['union_id'] : '';
		$code_lib_course= isset($_POST['code_lib_course']) ? $_POST['code_lib_course'] : '';
		$union_campus	= isset($_POST['union_campus']) ? $_POST['union_campus'] : '';
		$instructor_id 	= $this->sess_userid;
		
		$rows_union_courses = $this->users->getMetaDataList('union_courses', 'in_union_id="'.$union_id.'" AND in_instructor_id = "'.$instructor_id.'" AND in_library_id="'.$lib_id.'"', '', 'id,is_course_active');
		$union_course_id 	= isset($rows_union_courses[0]['id'])&&$rows_union_courses[0]['id'] ? $rows_union_courses[0]['id'] : '';
		$is_course_active 		= isset($rows_union_courses[0]['is_course_active']) && $rows_union_courses[0]['is_course_active'] ? $rows_union_courses[0]['is_course_active'] : '';

		if( $is_course_active != "yes" ) {
			$arr_ins_course 	= array('in_union_id'=>$union_id, 'in_instructor_id'=>$instructor_id, 'in_library_id'=>$lib_id, 
										'in_course_code' => $code_lib_course, 'st_campus_name'=>$union_campus, 'is_course_active'=>"yes");
			$this->parentdb->manageDatabaseEntry( 'tbl_union_courses', 'INSERT', $arr_ins_course );
			echo true;
		}
	}
	
	function ajaxAddParticipants()
	{
		$course_id 				= isset($_POST['courseId']) ? $_POST['courseId'] : '';
		$course_lib_id 			= isset($_POST['courseLibraryId']) ? $_POST['courseLibraryId'] : '';
		$union_id 				= isset($_POST['unionId']) ? $_POST['unionId'] : '';
		$participant_worker_id 	= $this->sess_userid;

		$rows_course_participants 	= $this->users->getMetaDataList('union_course_participants', 
										'in_course_id="'.$course_id.'" AND in_participant_worker_id = "'.$participant_worker_id.'" AND in_union_id="'.$union_id.'"', '', 'id');
		$course_participant_id 		= isset($rows_course_participants[0]['id'])&&$rows_course_participants[0]['id'] ? $rows_course_participants[0]['id'] : '';

		if( $course_participant_id ) {
			echo false;
		}
		else {
			$arr_ins_course 	= array('in_participant_worker_id'	=> $participant_worker_id, 
										'in_library_id' 	=> $course_lib_id, 
										'in_union_id'		=> $union_id, 
										'in_course_id'		=> $course_id);
			// common::pr($arr_ins_course);
			$this->parentdb->manageDatabaseEntry( 'tbl_union_course_participants', 'INSERT', $arr_ins_course );
			echo true;
		}
	}
	
	

	function ajaxSearchUnion()
	{
		$industry 				= isset($_POST['cmb_industry_id']) ? $_POST['cmb_industry_id'] : '';
		$data['industry_id']	= $industry;
		$union_text 			= isset($_POST['txt_union_text']) ? $_POST['txt_union_text'] : '';
		$data['txt_union_text'] = $union_text;

		$arrWhere['industry_id'] 	= $industry;
		$arrWhere['txt_union_text'] = $union_text;

		$row_unions 		= array();
		
		if( $industry || $union_text ) 
		{
			$row_unions 	= $this->users->getUnions( $arrWhere );
		}

		$data['row_unions']	= $row_unions;
		$data['display_msg']= "No data found, please try again.";
		
		$this->load->view('ajax/ajax_union_search_view', $data); 
	}
	
	function getUnions()
	{
		$industry 	= isset($_POST['industry_id']) ? $_POST['industry_id'] : '';
		$sector 	= isset($_POST['section_id']) ? $_POST['section_id'] : '';
		$unions 	= $this->users->getUnions( array('industry_id'=>$industry, 'section_id'=>$sector) );
		// common::pr($unions);
		echo '<option value="">-select-</option>'; 
        foreach($unions as $un) {
            echo '<option value="'.$un['id'].'">'.$un['firstname'].$un['lastname'].'</option>';
		}
	}
	
	function ajaxPublicUnion()
	{
		$where = " in_status = 1";

		$sector 				= isset($_POST['cmb_sector']) ? $_POST['cmb_sector'] : '';
		$data['cmb_sector']		= $sector;		
		$sector ? $where .= " AND in_sector = '".$sector."'" : '';

		$role_title 			= isset($_POST['cmb_job_title']) ? $_POST['cmb_job_title'] : '';
		$data['cmb_job_title']	= $role_title;
		$role_title	? $where .= " AND in_job_title = '".$role_title."'" : '';
		
		$unionreps_text 			= isset($_POST['txt_unionreps_text']) ? $_POST['txt_unionreps_text'] : '';
		$data['txt_unionreps_text'] = $unionreps_text;
		$unionreps_text ? $where .= " AND (st_first_name LIKE '%".$unionreps_text."%' OR st_last_name LIKE '%".$unionreps_text."%')" : '';
		
		$row_union_reps 		= array();

		if( $sector || $role_title || $unionreps_text ) {
			$row_union_reps 		= $this->users->getMetaDataList( "union_reps", $where, "ORDER BY TRIM(st_first_name)" );
		}
		
		$data['row_union_reps']	= $row_union_reps;
		
		$data['display_msg']	= "No data found, please try again.";
	
		$this->load->view('ajax/ajax_union_public_view', $data); 
	}
	
	
	function getCourseRemainingTime()
	{
		if( $_SERVER['SERVER_ADDR'] != "127.0.0.1" ) {
			date_default_timezone_set("America/New_York");
		}
		else {
			date_default_timezone_set("Asia/Kolkata");
		}
		$course_start_time 	= $this->input->post('course_start_time');
		$union_id 			= $this->input->post('union_id');
		$course_id 			= $this->input->post('course_id');

		$datetime_info = Common::getDatetimeDiff(date('Y-m-d H:i:s'), $course_start_time);
		$datetime_info = explode("|", $datetime_info);
		// common::pr($datetime_info);
		($datetime_info['1']>12) ? $datetime_info['1'] = ($datetime_info['1']-12) : '';
		
		if( $datetime_info['1'] >= 2 ) {
			echo "Time Over";
			$course_end_time 	= date('Y-m-d h:i:s');
			$is_course_active 	= "no";
		}
		else {
			echo $course_timeleft =  $datetime_info['1'].":".$datetime_info['2'].":".$datetime_info['3'];
		}
		// Update course status //
			$arrupd_union_course 	= array( 'dt_end_time'=>$course_end_time );
			$arrwhere_union_course 	= array( 'in_union_id'=>$union_id, 'in_instructor_id'=>$this->sess_userid, 'in_library_id'=>$course_id );
			
			(isset($is_course_active)&&$is_course_active) ? $arrupd_union_course['is_course_active'] = $is_course_active : '';
			(isset($is_course_active)&&$is_course_active) ? $arrwhere_union_course['is_course_active'] = "yes" : '';
			
			// common::pr($arrwhere_union_course);
			
			$this->parentdb->manageDatabaseEntry( 'tbl_union_courses', 'UPDATE', $arrupd_union_course, $arrwhere_union_course );
	}
						
						
	function ajaxSetQuiz()
	{
		session_start();
		$cp 		= isset($_POST['pn'])?$_POST['pn']:1;
		$userAnswer = isset($_POST['userAnswer'])?$_POST['userAnswer']:'';
		$selAnswerId= isset($_POST['selAnswerId'])?$_POST['selAnswerId']:'';
		$quesId 	= isset($_POST['quesId'])?$_POST['quesId']:'';
		$pageId 	= isset($_POST['pageId'])?$_POST['pageId']:'';
		$libId 		= isset($_POST['libId'])?$_POST['libId']:'';
	
		$_SESSION['final_arr_quiz'][$pageId][$quesId]['user_answer'] 	= $userAnswer;
		$_SESSION['final_arr_quiz'][$pageId][$quesId]['sel_answer_id'] 	= $selAnswerId;
		// common::pr( $_SESSION['final_arr_quiz'] );		
		
		$rows_quiz = isset($_SESSION['final_arr_quiz']) ? $_SESSION['final_arr_quiz'] : array();
		
		if(count($rows_quiz)>0) {?>
			<div class="span6 pull-left">
				<?php 
				$cnt_page = $cnt_ques = $rate = 0;
				foreach( $rows_quiz AS $key_page => $val_page ) {?>
					<div class="flexslider">
						<?php 
						$cnt_page++;
						$page_id = $key_page;
						// echo "<h4><u>Page-".$cp."</u></h4><br>";
						// common::pr($val_page);
						foreach( $val_page AS $key_ques => $val_ques ) {
							$cnt_ques++;
							$ques 		= $val_ques['question'];
							$ans 		= isset($val_ques['answer']) ? $val_ques['answer'] : '';
							$user_ans 	= (isset($val_ques['user_answer']) && $val_ques['user_answer']>=0) ? $val_ques['user_answer'] : '';
							?>
							<h5 class="wordbreak"><strong><?php echo $cnt_ques.")&nbsp;".$ques;?></strong></h5>
							<ul class="no-list-style">
								<li class="wordbreak"><strong>Your answer: </strong>
									<?php 
									if('1' == $user_ans) {
										$rate++;?>
										<img src='../img/icons/right.png' width='25' height='20'>
										<?php
									}
									else if('0' == $user_ans) {?>
										<img src='../img/icons/wrong.png' width='25' height='20'>
										<?php
									}
									else {
										echo "n/a";
									}?>
								</li>
							</ul>
							<?php 
						}
						?>
					</div>
				<?php 
				}?>
			</div>
			
			<div class="span6 pull-left">
				<div class="flexslider">
					<?php 
					$score = round( ($rate/$cnt_ques)*100 );
					if( $score < 75 ) {
						//$this->libraries->resetReadingHistory( $this->sess_userid, $libId, $progress='0' );
						echo "<h6>Sorry, You have reached ".$score."% of right answers, You are not eligible to earn any points, Please try again.</h6>";
					}
					else {
						//$this->libraries->resetReadingHistory( $this->sess_userid, $libId, $progress='100' );
						echo "<h6>Congratulations, You have reached ".$score."% of right answers, You have earn points.</h6>";
					}?>
				</div>
			</div>
		<?php
		}
		else {
			echo "<h5>No data found<h5>";
		}
	}

	function ajaxCheckUnionInstructorKey()
	{
		$instructor_key 	= (isset($_POST['instructorKey']) && $_POST['instructorKey']) ? $_POST['instructorKey'] : '';
		$instructor_id 		= (isset($_POST['instructorId']) && $_POST['instructorId']) ? $_POST['instructorId'] : '';
		$rows_instructordata = $this->users->getDesignationData('tbl_union_designations', array("in_worker_id"=>$this->sess_userid, 
																								"in_union_id"=>$instructor_id, 
																								"st_designation"=>"union_instructor", 
																								"st_password"=>$instructor_key) );
		// common::pr($rows_instructordata);
		echo (isset($rows_instructordata[0]['id'])&&$rows_instructordata[0]['id']) ? true : "Invalid Instructor Key.";
	}
	
	function ajaxCheckCourseActivationCode()
	{
		$course_code = (isset($_POST['courseActCode']) && $_POST['courseActCode']) ? $_POST['courseActCode'] : '';
		$course_id 		= (isset($_POST['courseId']) && $_POST['courseId']) ? $_POST['courseId'] : '';
		
		$rows_course_libcode = $this->users->getMetaDataList('union_courses', 'id="'.$course_id.'" AND in_course_code="'.$course_code.'" AND in_status=1', '', 'id, dt_start_time');
		$dt_start_time = (isset($rows_course_libcode[0]['dt_start_time']) && $rows_course_libcode[0]['dt_start_time']) ? $rows_course_libcode[0]['dt_start_time'] : '';

		$try_participant_code = $this->session->userdata("try_participant_code".$course_id);
		$try_participant_code = (int)$try_participant_code + 1;
		$this->session->set_userdata("try_participant_code".$course_id, $try_participant_code);

		if( $try_participant_code > 3 ) {
			$error_msg = 'Sorry your access has been Locked to this content for 5 minutes.';
			if( (time()-$this->session->userdata('last_participant_access'.$course_id)) >= 300 ) { // 5 minutes(300 seconds access lock) //
				$this->session->unset_userdata("try_participant_code".$course_id);
				$this->session->unset_userdata( "last_participant_access".$course_id );
			}
		}
		else {
			$this->session->set_userdata( "last_participant_access".$course_id, time() );
			$error_msg = 'Invalid Code.';
		}		
		echo (isset($rows_course_libcode[0]['id'])&&$rows_course_libcode[0]['id']) ? true : $error_msg;
	}

	function ajaxLibraryContentsByType()
	{
		$data['libType'] 	= isset($_POST['libType']) ? $_POST['libType'] : '';
		$data['libid'] 		= isset($_POST['libid']) ? $_POST['libid'] : '';
		$this->load->view('ajax_library_contents_by_type', $data);
	}

	function ajaxDeleteSection()
	{
		$id 		= (int)$this->input->post('id') ? $this->input->post('id') : '';
		$section	= $this->input->post('section');
		$section_id	= $this->input->post('sectionId');
		$this->parentdb->deleteSection($id, $section, $section_id);
	}
	
	function deleteMessages()
	{
		$msgid 	= (int)$this->input->post('msgId') ? $this->input->post('msgId') : '';
		$this->users->deleteMessages(array($msgid));
	} 

	function ajaxSendConfimEmailByAdmin()
	{
		$data['userId'] 	= isset($_POST['userId']) ? $_POST['userId'] : '';
		$data['email'] 		= isset($_POST['email']) ? $_POST['email'] : '';
		// Update confirmation email date and status, by admin//
			$arrUpdate['date_confirm_email_by_admin'] 	= date('Y-m-d h:i:s');
			$arrUpdate['is_confirm_email_by_admin'] 	= 1;
			
			$arrWhere['id'] = $data['userId'];
			$this->users->updateUserDetails( $arrUpdate, $arrWhere );
			//echo $this->send_recovery_notification( $data['email'], 1 );
			$this->send_recover_email_notification($data['email']);
	}
	
	// INSERTED BY MARCIO ON AUG-29 TO FIX RECOVER REGISTRATION E-MAIL
	function send_recover_email_notification($to, $pwd)
	{
		$data['base']	= $this->base;
		$data['url'] 	= $this->base."?user_section=register_confirm&user=".urlencode($this->encrypt_decrypt('encrypt', $to));
		$email_body 	= $this->load->view('email_templates/resend', $data, true);
		$this->users->sendEmailToS1user($to, $this->config->item('site_email'), 'IMPORTANT! Please Confirm Your Registration at S1', $email_body);
		return true;
	}
	
	function encrypt_decrypt($action, $string) {
		
       $output = false;
       $key = 'S1WEBSITE ENCRYPT KEY';
    
       // initialization vector 
       $iv = md5(md5($key));
       if( $action == 'encrypt' ) {
           $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
		   $output = base64_encode($output);
		       
       }
       else if( $action == 'decrypt' ){
           $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
           $output = rtrim($output, "");
       }
       return $output;
    }
// END OF CODES INSERTED BY MARCIO ON AUG-29 D015

    function ajax_assign_inventory($connectionId='', $libId='', $libtypeSection='')
	{
		// Worker Id
			if( $connectionId ) {
				$worker_id 	= $connectionId;
			}
			else {
				$worker_id	= isset($_POST['worker_id']) ? $_POST['worker_id'] : '';
			}
		
		// Library Type Section 
			if( !$libtypeSection ) {
				$libtypeSection= isset($_POST['libtype_section']) ? trim($_POST['libtype_section']) : '';
			}
	
		// Library Id
			if( !$libId ) {
				$libId	= isset($_POST['lib_id']) ? $_POST['lib_id'] : '';
			}
			
		if( $libtypeSection ) {
			if( "Investigations" == $libtypeSection ) {
				$arr_library 	= explode("-", $libId);
				$inv_form_id 	= (isset($arr_library[0])&&$arr_library[0] ) ? $arr_library[0] : '';
				$libId 		= (isset($arr_library[2])&&$arr_library[2]) ? $arr_library[2] : '';
			}
			else {
				$libId 		= isset($libId) ? $libId : '';
				$inv_form_id	= '';
			}

			// Assign libary(or badge) to User //
				$assigned 		= $this->libraries->assignLibraryToUser($libId, $worker_id, $this->sess_userid, $inv_form_id, $libtypeSection );

			if( $assigned ) {
				return "1";
			}
			else if( !$assigned && ("badge"!=$libtypeSection || "WAT_badge"!=$libtypeSection || "SAT_badge"!=$libtypeSection) ) {
				return "2";
			}
		}
		else {
			return false;
		}
    }

    function ajax_getSectorList(){
        $sections = $this->adminsettings->getSectorListByIndustries($_GET['industry'], $_GET['term']);
        $datalist = array();
        $retornar_array = array();
        foreach($sections as $sc){
            $datalist['label']=$sc['sectionname']; 
            $datalist['id']=$sc['id'];
            array_push($retornar_array,$datalist);  
        }

        echo json_encode($retornar_array);     
    }
    
    function ajax_getTradeList(){
        $sectors = $this->adminsettings->getTradeListBySectors($_GET['industry'], $_GET['sector'], $_GET['term']);
        $datalist = array();
        $retornar_array = array();
        foreach($sectors as $sc){
            $datalist['label']=$sc['tradename']; 
            array_push($retornar_array,$datalist);  
        }
            
        echo json_encode($retornar_array);     
    }
    
    function ajax_getConnections()
	{
		$term = (isset($_GET['term'])&&$_GET['term']) ? $_GET['term'] : '';
        if($this->sess_usertype>1) {
            $connections = $this->users->getSimilarLinksByUserID($this->sess_userid, $this->sess_usertype, 1, $term);
		}
        else {
            $connections = $this->users->getUsersByName($term);
		}
		
        $datalist 		= array();
        $retornar_array = array();
        foreach( $connections as $sc) {
            $datalist['label']	= $sc['firstname'].' '.$sc['lastname'];
            $datalist['id']		= $sc['email_addr']; 
			$datalist['user_id']= $sc['id']; 
            array_push( $retornar_array, $datalist );
        }
		
        if( $term ) {
			echo json_encode($retornar_array);
		}
		else { 
			return json_encode($retornar_array);
		}
    }
	function ajaxUpdateInspectionItemStatus()
	{
		$upd_iteminsp_status = $this->inspection->updateInspectionItemStatus($_POST);
	}
	
	function ajaxProcedureTraining()
	{
		$this->load->view('ajax/ajax_procedure_training');
	}
	
	function ajaxProfileDetails()
	{
		$data['base'] 		= $this->base;
		$data['usermeta'] 	= $this->users->getUserMetaByID($this->sess_userid);
		$data['user'] 		= $this->users->getUserByEmail($this->sess_useremail);
		
		$rows_usertype = $this->users->getElementByID('tbl_usertype', $this->sess_usertype);
		// Get Union board members //
			if(strtolower($rows_usertype['typename']) == "union") {
				$data['boards'] = $this->users->getBoardMembersByUnionID($this->sess_userid);
			}
	
		$type 		= $this->sess_usertype;
		$section 	= (isset($_POST['profileSection']) && $_POST['profileSection']) ? $_POST['profileSection'] : '';
		$data['section'] = $section;
		
		$cls_personal_fade 		= ('personal'==$section) ? '' : 'fade';
		$cls_professional_fade 	= ('professional'==$section) ? '' : 'fade';

		switch($type) {
			case 1: { //administrator ?>
				<!--begin Administrator tile content-->
					<div class="tab-pane fade in active" id="admin"><a href="<?php echo $this->base;?>admin/metadata?type=administrator">Administrator</a></div>
				<!--end Administrator tile content-->
				<?php 
				break;
			}
			case 7: { //Union ?>
				<!--begin Union tile content-->
					<?php 
					if(!$cls_personal_fade) { // Union Personal // ?>
						<div class="tab-pane <?php echo $cls_personal_fade;?>" id="personal">
							<div class="document-content"><?php $this->load->view('profile_union_personal_metro', $data);?></div>
						</div>
						<?php
					}
					if(!$cls_professional_fade) { // Union Personal // ?>
						<div class="tab-pane <?php echo $cls_professional_fade;?>" id="professional">
							<div class="document-content"><?php $this->load->view('profile_union_professional_metro', $data);?></div>
						</div>
					<?php
					}?>
				<!--end Union tile content-->
				<?php 
				break;
			}
			case 8: case 12: { 
			//Employer ?>
				<!--begin Employer tile content-->
					<?php 
					if(!$cls_personal_fade) { // Employer Personal // ?>
						<div class="tab-pane <?php echo $cls_personal_fade;?>" id="personal">
							<div class="document-content"><?php $this->load->view('profile_employer_personal_metro', $data);?></div>
						</div>
						<?php 
					}
					if(!$cls_professional_fade) { // Employer Professional // ?>
						<div class="tab-pane <?php echo $cls_professional_fade;?>" id="professional">
							<div class="document-content" ><?php $this->load->view('profile_employer_professional_metro', $data);?></div>
						</div>
					<?php 
					}?>
				<!--end Employer tile content-->
				<?php 
				break;
			}
			case 9: { //Worker
			?> 
				<!--begin Worker tile content-->
					<?php 
					if(!$cls_personal_fade) { // Worker Personal // ?>
						<div class="tab-pane <?php echo $cls_personal_fade;?> in active" id="personal">
							<div class="document-content"><?php $this->load->view('profile_worker_personal_metro', $data);?></div>
						</div>
						<?php
					}
					if(!$cls_professional_fade) { // Worker Professional // ?>
						<div class="tab-pane <?php echo $cls_professional_fade;?>" id="professional">
							<div class="document-content"><?php $this->load->view('profile_worker_professional_metro', $data);?>
							</div>
						</div>
					<?php
					}?>
				<!--end Worker tile content-->
				<?php 
				break;
			}
			case 11: { // Student?>
				<!--begin Student tile content-->
					<?php 
					if(!$cls_personal_fade) { // Student Personal // ?>
						<div class="tab-pane <?php echo $cls_personal_fade;?> in active" id="personal">
							<div class="document-content"><?php $this->load->view('profile_student_personal_metro', $data);?></div>
						</div>
						<?php 
					}
					if(!$cls_professional_fade) { // Student Professional // ?>
						<div class="tab-pane <?php echo $cls_professional_fade;?>" id="professional">
							<div class="document-content"><?php $this->load->view('profile_student_professional_metro', $data);?></div>
						</div>
						<?php
					}?>
				<!--end Student tile content-->
				<?php 
				break;
			}
		}
	}
	
	function ajaxGetMessages()
	{
		$pg_section = isset($_POST['pgSection']) ? $_POST['pgSection']:0;
		$cp 		= isset($_POST['pgValue']) ? $_POST['pgValue']:0;
	
		if( "inbox" == $pg_section ) {
			$rows_messages = $this->users->getMyMessages($this->sess_useremail, ($cp-1), 9);
			$cls_display_msg = "bg-darker";
		}
		else {
			$rows_messages = $this->users->getMySentMessages($this->sess_useremail, ($cp-1), 9);
			$cls_display_msg = "bg-gray";
		}

		foreach( $rows_messages AS $val_msg ) {
			$msg_id 	 	= isset($val_msg['message_id']) ? $val_msg['message_id'] : '';
			$sender_name 	= isset($val_msg['nickname']) ? $val_msg['nickname'] : '';
			$msg_subject 	= isset($val_msg['subject']) ? $val_msg['subject'] : '';
			$msg_content 	= isset($val_msg['message']) ? $val_msg['message'] : '';
			$sender_image 	= isset($val_msg['profile_image']) ? $val_msg['profile_image'] : '';
			$read_status 	= isset($val_msg['read_status']) ? $val_msg['read_status'] : '';
			$cls_msg_read 	= ($read_status==0) ? 'icon-checkmark' : '';
			?>
			<a href="#modal_<?php echo $pg_section;?>_msg<?php echo $msg_id;?>" modal-id="id_<?php echo $pg_section;?>_msg<?php echo $msg_id;?>" onclick="javascript:getMessagesModal('<?php echo $pg_section;?>','<?php echo $msg_id;?>');" class="cls-<?php echo $pg_section;?>-msg<?php echo $msg_id;?> tile double <?php echo $cls_display_msg;?> live" data-toggle="modal">
				<div class="tile-content email">
					<?php $sender_image = (!empty($sender_image)) ? $sender_image : $this->base."img/default.png";?>
					<div class="email-image"><img src="<?php echo $sender_image;?>"/></div>
					<div class="email-data">
						<span class="email-data-title"><?php echo $sender_name;?></span>
						<span class="email-data-subtitle"><?php echo $msg_subject;?></span>
						<span class="email-data-text"><?php echo $msg_content;?></span>
					</div>
				</div>
				<div class="brand"><div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="<?php echo $cls_msg_read;?>"></span></div></div></div>
			</a>
			<div id="modal_<?php echo $pg_section;?>_msg<?php echo $msg_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel"><?php echo ucwords($pg_section);?><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
				<div class="modal-body">
					<div id="id_<?php echo $pg_section;?>_msg<?php echo $msg_id;?>" class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;"></div>
				</div>
			</div>
			<?php 
		}
	}

	function ajaxMyWorkers()
	{
		$worker_name = (isset($_POST['workerName']) && $_POST['workerName']) ? $_POST['workerName'] : '';
		$redirect_to = $data['redirect_to'] = (isset($_POST['redirectTo']) && $_POST['redirectTo']) ? $_POST['redirectTo'] : 'myworkers_metro';
		$data['connect_status'] = (isset($_POST['connectStatus']) && $_POST['connectStatus']) ? $_POST['connectStatus'] : '';

		if( isset($worker_name) && $worker_name ) {
			$worker = $this->users->getMyWorkerByUserID($this->sess_userid, $this->sess_usertype, 1, $_POST['workerName']);
			$worker = (isset($worker[0]) && $worker[0]) ? $worker[0] : array();

			if( isset($worker) ) {
				if( sizeof($worker) ) {
					if($this->sess_usertype == "7") {
						$where_arr['in_worker_id'] 	= $worker['id'];
						$where_arr['in_union_id'] 	= $this->sess_userid;
						$workermeta= $this->users->getDesignation('tbl_union_designations', $where_arr);
					}
					else {
						$where_arr['in_worker_id'] 	= $worker['id'];
						$where_arr['in_user_id'] 	= $this->sess_userid;
						$workermeta= $this->users->getDesignation('tbl_employer_consultant_designations', $where_arr);
					}
					$data['workermeta'] = $workermeta;
				}
			}
			// common::pr($workermeta);
			$data['worker'] = $worker;
		}
		$this->load->view('ajax/ajax_my_workers', $data);
	}


	//***************** created by Marcio for Id-card on Nov-16-2014 ****************//
	function ajaxMyIDCard()
	{
		$user_id = $data['user_id'] = (isset($_POST['userId']) && $_POST['userId']) ? $_POST['userId'] : '';
		$data['connect_status'] = (isset($_POST['connectStatus']) && $_POST['connectStatus']) ? $_POST['connectStatus'] : '';

		$user_wallet 		= $this->users->getMyDataOfUser($user_id, 'user_wallet');
		$data['user_wallet']= isset($user_wallet['user_wallet']) ? $user_wallet['user_wallet'] : '';
		
		$user_badges 		= $this->users->getMyDataOfUser($user_id, 'badge');
		$data['user_badges']= isset($user_badges['user_badges']) ? $user_badges['user_badges'] : '';

		if( "8" == $user_wallet['user_wallet']['type_id'] || "7" == $user_wallet['user_wallet']['type_id'] ) {
			$key_user 			= ("8"==$user_wallet['user_wallet']['type_id']) ? "my_workers" : "my_members";
			$rows_total_users 	= $this->users->getMyDataOfUser($user_id, $key_user);
			$total_users		= $data['total_users'] = $rows_total_users['user_libraries'][$key_user]['total'];
		}

		if( ("9" == $user_wallet['user_wallet']['type_id'] || ("12"==$user_wallet['user_wallet']['type_id']&&"8"==$this->sess_usertype) ) && $data['connect_status']=="1") {
			// Get Designations //
				$rows_designations 	= $this->users->getMyDataOfUser($user_id, "my_designations");
				$rows_designations 	= $rows_designations['user_libraries']['my_designations'];

				if( isset($rows_designations) && sizeof($rows_designations) ) {
					foreach( $rows_designations AS $key_designations => $val_designations ) {
						if( "total" !== $key_designations ) {
							$designations[] = ucwords( str_replace("_", " ",$val_designations['meta_key']) );
						}
					}
				}
				$data['designations'] = (isset($designations)&&is_array($designations)) ? implode(", ", $designations) : '';
		}
		
		// Check User has access for my public page //
			$rec  = $this->users->get_user_meta($user_id, 's1_public_page');
			$data['accessS1PublicPage'] = "no";
			if(count($rec)>0) {
				if($rec['meta_value'] == "y"){
					$data['accessS1PublicPage'] = "yes";
				}
				else {
					$data['accessS1PublicPage'] = "no";
				}
			}
			else {
				$data['accessS1PublicPage'] = "no";
			}

			// Check selected user connected to MainUnion //
			/*
				if( "7" !== $user_id ) {
					$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $user_id, 1, 'id' );
					$org_links 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $user_id, 1, 'id' );
					$all_links 	= array_merge($peo_links, $org_links);
					
					$is_main_union = 0;
					foreach($all_links AS $val ) {
						$recUtc = $this->users->get_user_meta($val['id'], 'union_training_centre');
						$is_utc = isset($recUtc['meta_value']) ? $recUtc['meta_value'] : '';

						$rows_usertype = $this->users->getMetaDataList("user", 'id="'.$val['id'].'" AND status=1', '', 'type_id' );
						$usertype = (isset($rows_usertype[0]['type_id'])&&$rows_usertype[0]['type_id']) ? $rows_usertype[0]['type_id'] : '';
						
						("7"==$usertype && $is_utc=="") ? $is_main_union = 1 : '';
					}
					(isset($is_main_union)&&'1'==$is_main_union) ? $data['accessS1PublicPage'] = 'yes' : '';
				}
				*/

		// No public page allowed for the Workers //
			("9"==$data['user_wallet']['type_id']) ? $data['accessS1PublicPage'] = "no" : '';

		// Set S1 public view //
		// echo $data['user_wallet']['type_id'];
			if( "7" == $data['user_wallet']['type_id'] ) { // Union //
				$data['url_s1_public_page'] = "s1_public_page_union";
			}
			else if( "12" == $data['user_wallet']['type_id'] ) { // Consultant //
				$data['url_s1_public_page'] = "s1_public_page_consultant";
			}
			else { // Except Union and Consultant users //
				$data['url_s1_public_page'] = "s1_public_page";
			}

		$this->load->view('ajax/ajax_my_id_card', $data);
	}
	//***************** end created by Marcio for Id-card on Nov-16-2014 ****************//
	
	function ajaxBadgeIDCard()
	{
		$badge_id 			= $data['badge_id'] = (isset($_POST['badgeId']) && $_POST['badgeId']) ? $_POST['badgeId'] : '';
		$assigned_by_userid	= (isset($_POST['assignedBy']) && $_POST['assignedBy']) ? $_POST['assignedBy'] : '';
		$assigned_by 		= '';
		if( (int)$assigned_by_userid ) {
			$assigned_by 		= $this->users->getMetaDataList('user', 'status=1 AND id="'.$assigned_by_userid.'"', '', 'CONCAT(firstname, " ", lastname) AS username');
			$assigned_by		= isset($assigned_by[0]['username']) ? "Assigned By: ".$assigned_by[0]['username'] : '';
		}
		$data['assigned_by'] = $assigned_by;

		$badge_providers = $this->libraries->getBadgeProviderDetails($badge_id);
		$data['badge_providers'] = isset($badge_providers) ? $badge_providers : array();

		$this->load->view('ajax/ajax_badge_id_card', $data);
	}

	function ajaxGetNewlySelectedCrewWorkers()
	{
		$worker_ids 	= $data['worker_ids'] = (isset($_POST['worker_id']) && $_POST['worker_id']) ? implode(",", $_POST['worker_id']) : '';
		if( $worker_ids ) {
			// Get Newly Selected Crew workers tiles //
				$this->load->view('ajax/ajax_update_supervisor', $data);
		}
		else {
			echo "<h5 class='fg-black'>No workers available</h5>";
		}
	}

	function ajaxSaveCrewWorkers()
	{
		$crew_id 	= (isset($_POST['crew_id']) && $_POST['crew_id']) ? $_POST['crew_id'] : '';
		$crew_label = (isset($_POST['crew_label']) && $_POST['crew_label']) ? $_POST['crew_label'] : '';
		$rows_emp_crew_workers = $this->users->getMetaDataList('crew_of_employers', 
								'in_crew_status=1 AND in_crew_id="'.$crew_id.'" AND in_crew_employer_id = "'.$this->sess_userid.'"', '', 'st_crew_workers' );
		if( isset($rows_emp_crew_workers[0]['st_crew_workers']) ) {
			if( $crew_label ) {
				$arr_update_myworkers 	= array( 'st_crew_label'=>$crew_label );
			}
			else {
				$arr_workers 			= ( isset($_POST['arrWorkers'])&&is_array($_POST['arrWorkers']) ) ? implode(",", $_POST['arrWorkers']) : '';
				// common::pr( $arr_workers );die;
				$arr_update_myworkers 	= array( 'st_crew_workers'=>$arr_workers, 'dt_date_crew_updated'=>date('Y-m-d h:i:s') );
			}
			$arr_where_myworkers 	= array( 'in_crew_id'=>$crew_id, 'in_crew_employer_id'=>$this->sess_userid );
			$this->parentdb->manageDatabaseEntry( 'tbl_crew_of_employers', 'UPDATE', $arr_update_myworkers, $arr_where_myworkers );
		}
	}
	
	function ajaxAddFreeLibrary()
	{
		$libid 		= (isset($_POST['libid']) && $_POST['libid']) ? $_POST['libid'] : '';
		$libtype	= (isset($_POST['libtype']) && $_POST['libtype']) ? $_POST['libtype'] : '';
		
		if( (int)$libtype ) {
			$libtype	= $this->users->getElementByID('tbl_library_types', $libtype, 'library_type');
			$libtype	= $libtype['library_type'];
		}
		
		if( 'custom_inspection' == $libtype ) { // CUSTOM INSPECTION //
			$ret_cart_items			= $this->users->getElementByID('tbl_custom_inspection', $libid, 'in_price, st_language AS language, st_custom_inspection_name AS title, in_earning_points AS in_points, in_credits_buy AS in_credits, in_credits_buy AS creditsbuy');

			$cart_data['language'] 	= $ret_cart_items['language'];
			$cart_data['title'] 	= $ret_cart_items['title'];
		}
		else if( 'normal_inspection' == $libtype ) { // NORMAL INSPECTION //
			$ret_cart_items			= $this->users->getElementByID('tbl_inspection', $libid, 'in_price, st_language AS language, st_inspection_name AS title, in_earning_points AS in_points, in_credits_buy AS in_credits, in_credits_buy AS creditsbuy');
			$cart_data['language'] 	= $ret_cart_items['language'];
			$cart_data['title'] 	= $ret_cart_items['title'];
		}
		else if( 'new_normal_safetytalks' == $libtype ) {
			$libtype 	= "normal_safetytalks";
			$libid 			= $this->safetytalks->addSafetytalks('tbl_safetytalks', '', 0);
			$cart_data		= $this->users->getElementByID('tbl_safetytalks', $libid, 'st_language AS language, st_safetytalks_topic AS title');
			$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
		}
		else if( 'new_procedure' == $libtype ) {
			$arr_procedures = array("title"=>"My New Procedure", 'userid' =>$this->sess_userid, 'procedure_status'=>'inprogress', 'status'=>'0');
			$libid 			= $this->adminsettings->addUserProcedures($arr_procedures);
			$cart_data 		= $this->users->getMetaDataList('procedures', "id='".$libid."'", '', 'st_language AS language, st_procedure_name AS title');
			$cart_data 		= $cart_data[0];
			$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="procedures"', '', "in_price, in_points, in_credits");
		}
		else if( 'custom_safetytalks' == $libtype ) {
			$cart_data		=	 $this->users->getElementByID('tbl_custom_safetytalks', $libid, 'st_language AS language, st_custom_safetytalks_name AS title');
			$ret_cart_items	= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
		}
		else if( 'normal_safetytalks' == $libtype ) {
			$cart_data			= $this->users->getElementByID('tbl_safetytalks', $libid, 'st_language AS language, st_safetytalks_topic AS title');
			$ret_cart_items		= $this->users->getMetaDataList('price_settings', 'price_settingsname="safetytalks"', '', "in_price, in_points, in_credits");
		}
		else { // Other library contents except Inspection and SafetyTalks
			$cart_data= $this->libraries->getLibraryByID($libid);
		}

		if( 'custom_inspection' == $libtype || 'normal_inspection' == $libtype ) { 
			isset($ret_cart_items['in_price']) ? $cart_data['price'] 		= $ret_cart_items['in_price'] : '';
			isset($ret_cart_items['in_credits']) ? $cart_data['credits'] 	= $ret_cart_items['in_credits'] : '';
			isset($ret_cart_items['in_credits']) ? $cart_data['creditsbuy'] = $ret_cart_items['in_credits']: '';
		}
		else  {
			isset($ret_cart_items[0]['in_price']) ? $cart_data['price'] 		= $ret_cart_items[0]['in_price'] : '';
			isset($ret_cart_items[0]['in_credits']) ? $cart_data['credits'] 	= $ret_cart_items[0]['in_credits'] : '';
			isset($ret_cart_items[0]['in_credits']) ? $cart_data['creditsbuy'] 	= $ret_cart_items[0]['in_credits']: '';
		}

		$arr_ins_mylibrary = array('user_id'			=> $this->sess_userid,
									'lib_id'			=> $libid,
									'st_libtype_bought'	=> $libtype,
									'lib_title'			=> $cart_data['title'],
									'qty_ordered'		=> 1,
									'transaction_type'	=> 'free',
									'credits'			=> $cart_data['credits'],
									'creditsbuy'		=> $cart_data['creditsbuy']);

		echo $this->parentdb->manageDatabaseEntry( 'tbl_my_library', 'INSERT', $arr_ins_mylibrary );
	}
	
	function getAlertCriteriaUsers($alerts_users=array(), $all_links=array(), $alerted_users=array(), $user_id='') 
	{
		$cnt_user = 0;
		foreach( $alerts_users AS $users ) {
			if( isset($users['type_id']) && $user_id==$users['type_id'] ) {
				if( "7" == $this->sess_usertype ) {
					foreach( $all_links AS $val_all_links ) {
						if( $val_all_links['id'] == $users['id'] ) {
							$userid 	= isset($users['id']) ? $users['id'] : '';
							$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
							$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
							$username 	= $firstname." ".$lastname;
							$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';?>
							<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
							<?php 
							$cnt_user++;
						}
					}
				}
				else {
					$userid 	= isset($users['id']) ? $users['id'] : '';
					$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
					$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
					$username 	= $firstname." ".$lastname;
					$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';?>
					<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
					<?php 
					$cnt_user++;
				}
			}
		}
		return $cnt_user;
	}
	
	function ajaxHazardsAlertCriteria()
	{
		$alerts_data['alerts_users'] 		= $this->users->getMetaDataList('user', '1', 'ORDER BY TRIM(firstname)', 'id, nickname, firstname, lastname, type_id');
		$alerts_data['alerts_usertypes'] 	= $this->users->getMetaDataList('usertype', '(date_end>=CURDATE() OR date_end="")', 'ORDER BY TRIM(typename)', 'id, typename');
		$alerts_data['alerts_industry'] 	= $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', 'ORDER BY TRIM(industryname)', 'id, industryname');

		$alerts_data['alert_criteria_selected'] = isset($_POST['valAlertCriteria']) ? $_POST['valAlertCriteria'] : '';
		$alerts_data['alerted_users'] 			= isset($_POST['alerted_users']) ? json_decode($_POST['alerted_users']) : array();
		$alerts_data['alert_criteria_options'] 	= isset($_POST['alert_criteria_options']) ? $_POST['alert_criteria_options'] : '';

		if( "7" == $this->sess_usertype ) {
			$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE', $this->sess_userid, 1, 'id' );
			$org_links 	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION', $this->sess_userid, 1, 'id' );
			$all_links 	= $alerts_data['all_links'] = array_merge($peo_links, $org_links);
		}
		$this->load->view('ajax/ajax_hazards_alert_criteria', $alerts_data);
	}
	
	function ajaxBuyBadgeModal()
	{
		$arr_badges_tobuy	= isset($_POST['arrBadgesToBuy']) ? $_POST['arrBadgesToBuy'] : '';
		$credit_icon 		= isset($_POST['credit_icon']) ? $_POST['credit_icon'] : '';
		$total_credits 		= $this->points->getS1Credits();

		if( $total_credits > 0 ) {
			$total_badge_price = 0;
			foreach( $arr_badges_tobuy AS $val_badges_tobuy ) {
				$badge_id 	= $val_badges_tobuy['badge_id'];
				$badge_title= $val_badges_tobuy['badge_title'];
				$badge_price= $val_badges_tobuy['badge_price'];
				$total_badge_price += $badge_price;

				$item = array('libid'			=> $badge_id, 
							'transaction_type'	=> 's1credits', 
							'qty'      		  	=> 1, 
							'price'    	      	=> '', 
							'name'     		  	=> $badge_title,
							'library_type'		=> 'badge', 
							'options'  		  	=> array('Credits' => '', 'Creditsbuy'=>$badge_price));

				// Add badge purchase entry //
					$this->libraries->addItemInCartToMyLibrary($this->sess_userid, $this->sess_useremail, $item, $item['options']);
			}?>
			<p class="s1content_body_title">For this purchase S1 Integration Systems will withdraw <?php echo $credit_icon;?><span id="id_selected_badge_price">
			<strong><?php echo $total_badge_price;?></strong></span> from your balance.</p>
			<p class="s1content_body_section">You have sole responsibility of this purchase, original documents supporting this purchase should be able to be presented if required.</p>
			<button type="submit" class="btn btn-buybadge btn-danger bg-red fg-white">Buy It</button>

			<script type="text/javascript">
				$(".btn-buybadge").click(function() {
					$("#id_modal_buybadge").modal("show");
					$("#modal_confirm_buy_badge").modal("hide");
					$(".cls_buybadge").html('You have successfully bought the badge <?php echo $badge_title;?>');
					$(".btn-close-buybadge").click(function() {
						window.location.reload();
					});
				});
			</script>
			<?php 
		}
		else {?>
			<p>Please buy more credits to perform this purchase.</p>
			<a href="<?php echo $this->base."admin/buy_credits";?>" class="btn">Buy Credits</a>
			<?php 
		}
	}


	function ajaxAssignBadgeModal()
	{
		$redirect_from 	= isset($_POST['redirectFrom']) ? $_POST['redirectFrom'] : '';
		$worker_id 		= isset($_POST['workerId']) ? $_POST['workerId'] : '';
		$worker_name 	= isset($_POST['workerName']) ? $_POST['workerName'] : '';
		$badge_id 		= isset($_POST['badgeId']) ? $_POST['badgeId'] : '';
		$badge_title 	= isset($_POST['badgeTitle']) ? $_POST['badgeTitle'] : '';
		$libtype_bought = isset($_POST['libtypeBought']) ? $_POST['libtypeBought'] : '';
			
		$badge_id 		= ("myworkers"==$redirect_from) ? $badge_id : $this->session->userdata('badge_id');
		$badge_title 	= ("myworkers"==$redirect_from) ? $badge_title : $this->session->userdata('badge_title');
		$libtype_bought 	= ("myworkers"==$redirect_from) ? $libtype_bought : $this->session->userdata('libtype_bought');

		$worker_id 		= ("myworkers"==$redirect_from) ? $this->session->userdata('worker_id') : $worker_id;
		$worker_name 	= ("myworkers"==$redirect_from) ? ucwords($this->session->userdata('worker_name')) : ucwords($worker_name);

		$data['worker_id'] 		= $worker_id;
		$data['badge_id'] 		= $badge_id;
		$data['redirect_from'] 	= $redirect_from;
		$data['libtype_bought'] = $libtype_bought;

		/*$has_badge_purchased = $this->libraries->getMyBadges($this->sess_userid, ' AND lib_id="'.$badge_id.'"');
		$has_badge_purchased = isset($has_badge_purchased[0]) ? 1 : '';*/
		$has_badge_assigned = $this->libraries->getMyAssignedBadges($worker_id, ' AND library_id="'.$badge_id.'"');
		$has_badge_assigned = isset($has_badge_assigned[0]) ? 1 : '';

		if( !$has_badge_assigned ) {
			if(isset($_POST['hidn_worker_id'])&&$_POST['hidn_worker_id']) {
				$worker_id 			= $this->input->post('hidn_worker_id');
				
				if( $libtype_bought == 'badge' ) 
				{ // $libtype_assigned!="WAT_badge" and $libtype_assigned!="SAT_badge" //
					$provider_type 		= $this->input->post('cmb_provider_type');
					$provider_name 		= $this->input->post('txt_provider_name');
					$provider_location 	= $this->input->post('txt_provider_location');
					$instructor_name 	= $this->input->post('txt_instructor_name');
					$date_badge_attended= $this->input->post('txt_date_badge_attended');
					$date_badge_expiry	= $this->input->post('txt_date_badge_expiry');

					// Add Badge Provider details //
						$arr_ins_badge_provider = array('in_badge_id' 				=> $badge_id,
														'in_badge_provider_type_id' => $provider_type,
														'st_badge_provider_name' 	=> $provider_name,
														'st_badge_provider_location'=> $provider_location,
														'st_instructor_name' 		=> $instructor_name,
														'dt_badge_attended' 		=> $date_badge_attended,
														'dt_badge_expiry' 			=> $date_badge_expiry);
						$this->parentdb->manageDatabaseEntry( 'tbl_badge_provider_details', 'INSERT', $arr_ins_badge_provider );
				}
				
				// Assign Badge to Selected worker //
					$assigned = $this->ajax_assign_inventory($worker_id, $badge_id, $libtype_bought );
			}
			$this->load->view('ajax/ajax_assign_badge',$data);
		}
		else {
			echo  'You are not able to send D.R.O.T '.$badge_title.' to user '.$worker_name.', due he already has this D.R.O.T, please select other D.R.O.T or user!';
		}
	}

	function ajaxCartCreditsModal()
	{
		$total_available_credits = $this->points->getS1Credits();

		if( $total_available_credits > 0 ) {
			$item_id		= (isset($_POST['itemId']) && (int)$_POST['itemId']) ? trim($_POST['itemId']) : '';
			$item_title		= (isset($_POST['itemTitle']) && $_POST['itemTitle']) ? trim($_POST['itemTitle']) : '';
			$item_libtype 	= (isset($_POST['itemLibType']) && $_POST['itemLibType']) ? trim($_POST['itemLibType']) : '';
			$item_credits 	= (isset($_POST['itemCredits']) && $_POST['itemCredits']) ? trim($_POST['itemCredits']) : '';
			$item_points 	= (isset($_POST['itemPoints']) && $_POST['itemPoints']) ? trim($_POST['itemPoints']) : '';
			
			$item_cart_qty 	= (isset($_POST['cartQty']) && $_POST['cartQty']) ? $_POST['cartQty'] : '';

			$total_points_amount 	= ($item_cart_qty*$item_points);
			$total_credits_amount 	= ($item_cart_qty*$item_credits);

			$_POST['rdb_payment_option'][1] = (isset($_POST['paymentOption']) && $_POST['paymentOption']) ? trim($_POST['paymentOption']) : '';

			$libid = $item_id;
			if( "new_normal_safetytalks" == $item_libtype ) {
				$libid 		= $this->safetytalks->addSafetytalks('tbl_safetytalks', '', 0);
			}
			else if( "new_procedure" == $item_libtype ) {
				$arr_procedures = array("title"=>"My New Procedure", 'userid' =>$this->sess_userid, 'procedure_status'=>'inprogress', 'status'=>'1');
				$libid 			= $this->adminsettings->addUserProcedures($arr_procedures);
			}

			$item = array('libid'				=> $libid,
							'language'			=> 'EN', 
							'rowid'				=> 1, 
							'transaction_id'	=> '', 
							'transaction_type'	=> 's1credits', 
							'qty'      		  	=> $item_cart_qty, 
							'price'    	      	=> '0',
							'name'     		  	=> $item_title,
							'library_type'		=> $item_libtype,
							'options'  		  	=> array('Credits' => $total_points_amount, 'Creditsbuy'=>$total_credits_amount));
			// common::pr( $item );die;
			
			if( "new_custom_inspection" == $item_libtype ) { // Created by using Drag&Drop Inspection/Custmized Inspection //
				session_start();
				$new_custominsp_id 	= $this->inspection->addUserCustomInspections( $item, $_SESSION['all_inspections'] );
				$item['libid'] 		= $new_custominsp_id;
				unset($_SESSION['all_inspections'], $_SESSION['normal_inspections'], $_SESSION['customized_inspections']);
			}

			// Add library purchase entry //
				$this->libraries->addItemInCartToMyLibrary($this->sess_userid, $this->sess_useremail, $item, $item['options']);
				echo '1';
		}
		else {?>
			<p>You have not enough credits to perform this purchase.</p>
			<a href="<?php echo $this->base."admin/buy_credits";?>" class="btn">Buy Credits</a>
			<?php 
		}
	}
	
	function create_library_by_consultant()
	{
		// common::pr( $_POST );die;
		
		$consultant_client_id 		= isset($_POST['consultant_client_id']) ? $_POST['consultant_client_id'] : '';
		$item_id 		= isset($_POST['item_id']) ? $_POST['item_id'] : '';
		$item_title 	= isset($_POST['item_title']) ? $_POST['item_title'] : '';
		$item_libtype 	= isset($_POST['item_libtype']) ? $_POST['item_libtype'] : '';
		$item_price 	= isset($_POST['item_price']) ? $_POST['item_price'] : '';
		$item_credits 	= isset($_POST['item_credits']) ? $_POST['item_credits'] : '';
		$item_creditsbuy= isset($_POST['item_creditsbuy']) ? $_POST['item_creditsbuy'] : '';

		$libid = $item_id;
		if( "normal_safetytalks" == $item_libtype || "new_procedure" == $item_libtype ) {
			if( "normal_safetytalks" == $item_libtype ) {
				$libid 		= $this->safetytalks->addSafetytalks('tbl_safetytalks', '', 0);
			}
			else if( "new_procedure" == $item_libtype ) {
				$arr_procedures = array("title"=>"My New Procedure", 'userid' =>$this->sess_userid, 'procedure_status'=>'inprogress', 'status'=>'1');
				$libid 			= $this->adminsettings->addUserProcedures($arr_procedures);
			}
		}

		$item = array('libid'			=> $libid,
					'transaction_type'	=> 'moneris', 
					'qty'      		  	=> 1, 
					'price'    	      	=> $item_price,
					'name'     		  	=> $item_title,
					'library_type'		=> $item_libtype,
					'consultant_client_id' => $consultant_client_id, 
					'options'  		  	=> array('Credits' => $item_credits, 'Creditsbuy'=>$item_creditsbuy));
		// common::pr($item);die;

		if( "normal_safetytalks" == $item_libtype || "new_procedure" == $item_libtype ) {
			// 	Add Opened new library by consultant// 
				$this->libraries->addConsultantPerformedLibrary($consultant_client_id, $item_libtype, $libid, 'opened' );
		}
		
		// Add Purchased Library details //
			$this->libraries->addItemInCartToMyLibrary($this->sess_userid, $this->sess_useremail, $item, $item['options']);		
	}

  /** Action to Multiple user disconnect **/
  function disconnect_connection()
  {
    if(isset($_POST['arr_connec'])) {
		// common::pr($_POST['arr_connec']);

		foreach( $_POST['arr_connec'] AS $val_disconnect ){
			$this->users->connectIgnore( $val_disconnect['user_id'], $this->sess_userid );

			// IF Union: Disconnect to Union Traininng Centres, other designated fields
				if( "7" == $this->sess_usertype || "7" == $val_disconnect['user_typeid'] ) {
					if( "7" == $this->sess_usertype ) {
						$from_userid= $this->sess_userid;
						$to_userid 	= $val_disconnect['user_id'];
					}
					else if( "7" == $val_disconnect['user_typeid'] ) {
						$from_userid= $val_disconnect['user_id'];
						$to_userid 	= $this->sess_userid;
					}
					// Delete Union Designated Rows
						$this->parentdb->deleteRows('tbl_union_designations', "in_union_id='".$from_userid."' AND in_worker_id='".$to_userid."'");

					// Disconnect with the Unions Training Centres //
						$rows_main_unions = $this->users->getUserConnc($from_userid);
						if( isset($rows_main_unions[0]['meta_value']) ) {
							foreach( $rows_main_unions AS $traincent_mainunion ) {
								$from_utc 	= ("7"==$this->sess_usertype) ? $to_userid : $traincent_mainunion['user_id'];
								$to_utc 	= ("7"==$this->sess_usertype) ? $traincent_mainunion['user_id'] : $to_userid;
								$this->users->connectIgnore( $from_utc, $to_utc );
							}
						}
						
				}
		}
      }
	  
      if(isset($_POST['arr_crew'])){
        foreach($_POST['arr_crew'] as $val){
            $result = $this->users->getUserIDsFromCrewID($val);
            if(is_object($result))
			{
				$arrMembers = explode(",", $result->st_crew_workers);                    
			}
            foreach ($arrMembers as $memVal) {
              $this->users->connectIgnore($memVal,$this->sess_userid);
            }
		}          
      }
  }
  
	function connectToUnionInPublicPage()
	{
		if( $_POST['user_id'] != $this->sess_userid ) {
			if( $this->users->isConnected( $_POST['user_id'], $this->sess_userid ) < 1 ) {
				$this->users->connectRequest( $_POST['user_id'], $this->sess_userid );
				$this->users->connectAccept( $_POST['user_id'], $this->sess_userid );
				echo "Successfully Connected";
			}
			else {
				echo "Already Connected";
			}
		}
		else {
			echo "Please verify Users Combination";
		}
	}
						
  
	function multiconnect_connection()
	{
		if( isset($_POST['arr_connec']) && is_array($_POST['arr_connec']) ) {
			foreach( $_POST['arr_connec'] AS $val_connec ) {
				$user_id 	= isset($val_connec['user_id']) ? trim($val_connec['user_id']) : '';
				$user_name 	= isset($val_connec['user_name']) ? trim($val_connec['user_name']) : '';
				
				if( "7" == $val_connec['user_typeid'] ) { // Check if selected user is Main union or UTC //
					$rows_main_unions 		= $this->users->getUserConnc($user_id);
					$rows_training_centre 	= $this->users->getUserConnc($user_id, '1');
					if( "7" == $this->sess_usertype ) { // LoggedIn user is already Union //
						$this->connectUnionAndItsTrainingCentres( $user_id );
						echo "You are also connected to Main Union(s)";
					}
					else { // LoggedIn user is NOT Union // ?>
						<form method="post" name="frm_union_connection" id="frm_union_connection"> 
							<?php
							if( isset($rows_main_unions[0]['meta_value']) ) { // Selected user is Main Union and has Training Centres //
								$selected_user = "MAIN_UNION";
							}
							else { // Selected user is Training Centre and have main unions //
								$selected_user = "UTC";
							}
							?>
							<label class="inline">Select Industry: </label><select class="industry_id<?php echo $user_id;?> input-xlarge" name="industry_id[<?php echo $user_id;?>]" required>
								<option value="">-select-</option>
								<?php 
								$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
								foreach($industries as $in) {?>
									<option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>
									<?php 
								}?>
							</select>
							<label class="inline">Select Sector: </label><select class="section_id<?php echo $user_id;?> input-xlarge" name="section_id[<?php echo $user_id;?>]" required>
								<option value="17">ALL</option>
							</select>
							<div class="ques_unionname<?php echo $user_id;?>"></div>
							<div class="hsrep_shopsteward<?php echo $user_id;?>"></div>							
							<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
							<input type="hidden" name="user_name" value="<?php echo $user_name;?>">
							
							<?php
							if( "9" == $this->sess_usertype ) {
								$where_arr 		= array('st_designation'=>"hsrep", 'in_union_id'=>$user_id,'in_worker_id'=>$this->sess_userid);
								$rows_hsrep 	= $this->users->getDesignationData("tbl_union_designations", $where_arr);
								$hsrep 			= isset($rows_hsrep[0]['meta_value']) ? $rows_hsrep[0]['meta_value'] : '';
								$hsrep_checked 	= ("y"==$hsrep) ? "checked" : '';
								$where_arr 		= array('st_designation'=>"shop_steward", 'in_union_id'=>$user_id,'in_worker_id'=>$this->sess_userid);
								$rows_shop_steward 	= $this->users->getDesignationData("tbl_union_designations", $where_arr);
								$shop_steward 	= isset($rows_shop_steward[0]['meta_value']) ? $rows_shop_steward[0]['meta_value'] : '';										$shop_steward_checked = ("y"==$shop_steward) ? "checked" : '';										
							}?>
							<br><br><div class='inline text-center'><button class='btn' type='submit'>Connect</button></div>
						</form>
						<script type="text/javascript">
							function selectHsrep(val_union_member)
							{
								var sess_usertype = '<?php echo $this->sess_usertype;?>';
								var hsrep_checked = '<?php echo isset($hsrep_checked) ? $hsrep_checked : '';?>';
								var shop_steward_checked = '<?php echo isset($shop_steward_checked) ? $shop_steward_checked : '';?>';
								if( "9" == sess_usertype ) {
									if( "yes" == val_union_member ) {
										$(".hsrep_shopsteward<?php echo $user_id;?>").html('<input name="chk_hsrep[<?php echo $user_id;?>]" '+hsrep_checked+' id="chk_hsrep<?php echo $user_id;?>" type="checkbox">H&S REP <input name="chk_shopsteward[<?php echo $user_id;?>]" '+shop_steward_checked+' id="chk_shopsteward<?php echo $user_id;?>" type="checkbox">Shop Steward');
									}
									else {
										$(".hsrep_shopsteward<?php echo $user_id;?>").html('');
									}
								}
							}
							$(document).ready(function () {
								$(".industry_id<?php echo $user_id;?>").change(function() {
									$industry_id = $(this).val();
									$.post(js_base_path+'admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
										$(".section_id<?php echo $user_id;?>").html(data);
									});
								});
								$(".section_id<?php echo $user_id;?>").change(function() {
									$(".ques_unionname<?php echo $user_id;?>").html( "<br><b>Are you member of <?php echo $user_name;?> ?&nbsp;&nbsp;<input type='radio' value='yes' name='rdb_union_member[<?php echo $user_id;?>]' class='rdb_union_member_yes<?php echo $user_id;?>' onclick=javascript:selectHsrep('yes');>Yes&nbsp;<input type='radio' name='rdb_union_member[<?php echo $user_id;?>]' onclick=javascript:selectHsrep('no'); class='rdb_union_member_no<?php echo $user_id;?>' value='no' checked>No</b>" );
								});
							});
						</script>
						<?php 
					}
				}
				else { // User is NOT Main union or Training Centre //					
					// Connecion request/accept except Selected User is Union or Worker //// Connect //
						if( $val_connec['connect_status']=='0' ) {
							$this->users->connectAccept( $user_id, $this->sess_userid );
						}
						if( $val_connec['connect_status']==NULL || !trim($val_connec['connect_status']) ) {
							$this->users->connectRequest( $user_id, $this->sess_userid );
						}
				}
			} // Foreach ends // 
			?>
			<script type="text/javascript">
			$('#frm_union_connection').validate({
				submitHandler: function(form) {
					$.ajax({
						url: js_base_path+'ajax/ajaxCheckIfUnionMember',
						type: 'post', 
						data: $('#frm_union_connection').serialize(),
						success: function(output) {
							alert( output );
							window.location.href=js_base_path+"admin/connections_metro";
						},
						error: function(errMsg) {
							alert( errMsg.responseText );
							return false;
						}
					});
				}
			});
			</script>
			<?php 
		}// IF Ends //
	}

	function saveHrsSpend() 
	{
		$tool_libid 	= isset($_POST['tool_libid']) ? $_POST['tool_libid'] : '';
		$hrs_spend 		= isset($_POST['hrs_spend']) ? $_POST['hrs_spend'] : '';
		$arr_upd 		= array( 'in_hours_spend'	=> $hrs_spend );
		$arr_where 		= array( 'id' 			=> $tool_libid );
		$this->parentdb->manageDatabaseEntry( 'tbl_librarytool_performed_by_consultant', 'UPDATE', $arr_upd, $arr_where );				
	}

	function connectUnionAndItsTrainingCentres( $userId='', $utcUserConnectReqToUtc='' )
	{
		$rows_main_unions 		= $this->users->getUserConnc($userId);
		$rows_training_centre 	= $this->users->getUserConnc($userId, '1');

		if( isset($rows_main_unions[0]['meta_value']) ) { // Selected user is Main Union and has Training Centres //
			foreach( $rows_main_unions AS $traincent_mainunion ) {
				// Connect to Traininng Centre
					$this->users->connectRequest( $traincent_mainunion['user_id'],$this->sess_userid );
					$this->users->connectAccept( $traincent_mainunion['user_id'], $this->sess_userid );
			}
			// Connect directly to Select Main Union //
				$this->users->connectRequest( $userId, $this->sess_userid );
				$this->users->connectAccept( $userId, $this->sess_userid );
		}
		else { // Selected user is Training Centre and have main unions //
			if( isset($rows_training_centre[0]['meta_value']) ) {
				// Send Connect Request to Selected Union Training centre //
					$this->users->connectRequest( $userId, $this->sess_userid );
				if( "1"==$utcUserConnectReqToUtc ) {
					$this->users->connectAccept( $userId, $this->sess_userid );
				}

				// Connect directly to Main Unions of Selected User //
					foreach( $rows_training_centre AS $key_traincent => $val_traincent ) {
						$arr_main_unions = isset($val_traincent['meta_value']) ? explode(",", $val_traincent['meta_value']) : array();
						foreach( $arr_main_unions AS $val_main_union ) {
							$this->users->connectRequest( $val_main_union, $this->sess_userid );
							$this->users->connectAccept( $val_main_union, $this->sess_userid );
						}
					}
			}
		}
	}

	function ajaxCheckIfUnionMember()
	{
		$user_id 	= isset($_POST['user_id']) ? $_POST['user_id'] : '';
		$user_name 	= isset($_POST['user_name']) ? $_POST['user_name'] : '';
		// common::pr($_POST);die;
		
		foreach( $_POST['rdb_union_member'] AS $val_union_data ) {
			$rdb_union_member 	= isset($_POST['rdb_union_member'][$user_id]) ? $_POST['rdb_union_member'][$user_id] : '';
			$industry_id 		= isset($_POST['industry_id'][$user_id]) ? $_POST['industry_id'][$user_id] : '';
			$section_id 		= isset($_POST['section_id'][$user_id]) ? $_POST['section_id'][$user_id] : '';
			
			
			// Check Selected User is Union Members //
				if( "no" == $rdb_union_member ) {
					$this->connectUnionAndItsTrainingCentres( $user_id );
					echo "You are now connected to ".$user_name;
				}
				else if( "yes" == $rdb_union_member ) {
					if( "8" == $this->sess_usertype ) {
						$rows_employer_unions = $this->users->getMetaDataList("user_unions", "in_status=1 AND in_union_id='".$user_id."' 
													AND in_user_id='".$this->sess_userid."' AND in_industry_id='".$industry_id."' AND in_sector_id='".$section_id."'",'','COUNT(in_user_union_id) AS user_have_selected_union' );
						$user_have_selected_union = isset($rows_employer_unions[0]['user_have_selected_union']) ? $rows_employer_unions[0]['user_have_selected_union'] : '';
						if( !$user_have_selected_union ) {
							echo "Please update your profile";
						}
						else {
							$this->connectUnionAndItsTrainingCentres( $user_id );
							echo "You are now connected to ".$user_name;
						}
					}
					else if( "9" == $this->sess_usertype ) {
						$rows_worker_unions = $this->users->getMetaDataList("user_unions", "in_status=1 AND in_union_id='".$user_id."' 
													AND in_user_id='".$this->sess_userid."' AND in_industry_id='".$industry_id."' AND in_sector_id='".$section_id."'",'', 'COUNT(in_user_union_id) AS user_have_selected_union' );
						$user_have_selected_union 		= isset($rows_worker_unions[0]['user_have_selected_union']) ? $rows_worker_unions[0]['user_have_selected_union'] : '';

						// Add/Update H&S REP and Shop Steward //
								$hsrep 			= isset($_POST['chk_hsrep'][$user_id]) ? $_POST['chk_hsrep'][$user_id] : '';
								$status_hsrep = ($hsrep) ? "y" : "n";
								$where_arr = array('st_designation'=>"hsrep", 'in_union_id'=>$user_id,'in_worker_id'=>$this->sess_userid);
								$rows_designation = $this->users->getDesignationData("tbl_union_designations", $where_arr);
								if(count($rows_designation) > 0 ) {
									$arr_designation_fields = array('st_status'=>$status_hsrep, 'dt_date_updated'=>date('Y-m-d h:i:s'));
									$arrWhere 				= array('in_union_id'=>$user_id, 'in_worker_id'=>$this->sess_userid, 'st_designation'=>"hsrep");
									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'UPDATE', $arr_designation_fields,$arrWhere);
								}
								else {
									$arr_designation_fields = array('in_worker_id'=>$this->sess_userid, 'in_union_id'=>$user_id, 'st_designation'=>"hsrep", 'st_status'=>$status_hsrep);
									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'INSERT', $arr_designation_fields);
								}

								$shop_steward 	= isset($_POST['chk_shopsteward'][$user_id]) ? $_POST['chk_shopsteward'][$user_id] : '';
								$status_shop_steward = ($shop_steward) ? "y" : "n";
								$where_arr = array('st_designation'=>"shop_steward",'in_union_id'=>$user_id,'in_worker_id'=>$this->sess_userid);
								$rows_designation = $this->users->getDesignationData("tbl_union_designations", $where_arr);
								if(count($rows_designation) > 0 ) {
									$arr_designation_fields = array('st_status'=>$status_shop_steward,'dt_date_updated'=>date('Y-m-d h:i:s'));
									$arrWhere 				= array('in_union_id'=>$user_id, 'in_worker_id'=>$this->sess_userid, 'st_designation'=>"shop_steward");
									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'UPDATE', $arr_designation_fields,$arrWhere);
								}
								else {
									$arr_designation_fields = array('in_worker_id'=>$this->sess_userid, 'in_union_id'=>$user_id, 'st_designation'=>"shop_steward", 'st_status'=>$status_shop_steward);
									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'INSERT', $arr_designation_fields);
								}

						if( !$user_have_selected_union ) {
							echo "Please update your profile";
						}
						else {
							$this->connectUnionAndItsTrainingCentres( $user_id );
							echo "You are now connected to ".$user_name;
						}
					}
					else if( "11" == $this->sess_usertype ) {?>
						<script>alert("Sorry, A student cannot be a union member");</script>
						<?php 
					}
				}
		}
	}
	
	function checkIfMyUnion()
	{
		$union_id 	= $this->input->post('union_id') ? $this->input->post('union_id') : '';
		$user_id 	= $this->input->post('user_id') ? $this->input->post('user_id') : '';
		$is_my_union = $this->users->checkIfMyUnion( $union_id, $user_id );
		// common::pr( $is_my_union );
		echo $is_my_union;
	}
	
	function send_worker_instructor_email($to, $pwdInstructor='' )
	{
		$employer_consultant_name 			= $this->sess_nickname;
		$data['base']						= $this->base;
		$data['url']						= $this->base;
		$data['employer_consultant_name'] 	= $employer_consultant_name;
		$data['pwd_instructor'] 			= $pwdInstructor;
        $email_body = $this->load->view('email_templates/worker_instructor', $data, true);

		$this->users->sendEmailToS1user($to, $this->config->item('site_email'), 'You have been assigned as Worker Instructor of '.strtoupper($employer_consultant_name), $email_body);

	    return true;
	}
        function multi_designate_employer()
		{
            foreach( $_POST['arr_employer'] AS $key=> $val) {                
                $to = ($val['employer_id']) ? $this->users->getUserByID($val['employer_id']) : '';
                // Message Sending
					$message_designate_employer = $this->sess_nickname." requests client confirmation.";
					$arr_ins_message = array('send_to'=>$to['email_addr'], 'send_from'=>$this->sess_useremail, 'subject'=>'Client Request', 
							'message'=> $message_designate_employer);
					$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
					$this->users->sendEmailToS1user($to['email_addr'], $this->sess_useremail, 'Client Request', $message_designate_employer);

                // Consultant send the request to employer(client) //
					$arr_ins_request = array('employer_id'=>$val['employer_id'], 'designate_status'=>0, 'consultant_id'=>$this->sess_userid);
					$this->parentdb->manageDatabaseEntry( 'tbl_consultant_employers', 'INSERT', $arr_ins_request );
            }
        }
        function ajaxAcceptRequest()
		{                    
            if($_POST['consultantId']){
                $arr_updt_accept = array('designate_status'=>$_POST['designate_status']);
                $arr_where_accept = array( 'consultant_id'=>$_POST['consultantId'], 'employer_id'=>$this->sess_userid );
                $this->parentdb->manageDatabaseEntry( 'tbl_consultant_employers', 'UPDATE', $arr_updt_accept, $arr_where_accept );
                $to = ($_POST['consultantId']) ? $this->users->getUserByID($_POST['consultantId']) : '';
                // Message Sending
                if($_POST['designate_status'] == "1")
                {
                    $subject= "Employer Accepted Client Request";
                    $message = $this->sess_nickname." accepted client request.";
                }
                else{
                    $subject= "Employer Rejected Client Request";
                    $message = $this->sess_nickname." rejected client request.";
                }
                $arr_ins_message = array('send_to'=>$to['email_addr'], 'send_from'=>$this->sess_useremail, 'subject'=>$subject, 
						'message'=>$message );
                $this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
				$this->users->sendEmailToS1user($to['email_addr'], $this->sess_useremail, $subject, $message );
            }   
        }
        function ajaxgetInstructor(){
            $select = "";            
            $name = $_POST['userNameVal'] ? $_POST['userNameVal'] : "";
            $clientID  = $_POST['client_id'] ? $_POST['client_id'] : "";
            $arrallInstructors = $this->users->getInstructorsFromConsultant($name);
            $select = "<select id='consultant_instructor' name='consultant_instructor[]' > ";
            if(count($arrallInstructors) > 0){
                foreach($arrallInstructors as $val ){
                    $selected = $val['in_employer_client_id'] == $clientID ? "selected" : "";
                    $workerID = $val['in_worker_id'];
                    $select .= "<option value='$workerID' $selected>".$val['firstname'].$val['lastname']."</option>";
                }
            }
			else {
                $select .= "<option value=''></option>";
            }
            $select .= "</select>";
            echo  $select;
        }
		
		function getToolsSummary()
		{
			// common::pr( $_POST );die;
			$client_id 			= isset($_POST['client_id']) ? $_POST['client_id'] : '';
			$summary_startdate 	= isset($_POST['txt_summary_startdate'])&&$_POST['txt_summary_startdate'] ? date("Y-m-d", strtotime($_POST['txt_summary_startdate'])) : '';
			$summary_enddate 	= isset($_POST['txt_summary_enddate'])&&$_POST['txt_summary_enddate'] ? date("Y-m-d", strtotime($_POST['txt_summary_enddate'])) : '';
			$where_params = array('summary_startdate'=>$summary_startdate, 'summary_enddate'=>$summary_enddate);			
			$consultant_libraries = $data['consultant_libraries'] = $this->libraries->getConsultantOpenedLibrary( $this->sess_userid, $client_id, '', $where_params );
			$closed_inspection = $open_inspection = $closed_safetytalks = $open_safetytalks = $closed_procedure = $open_procedure = $closed_investigation = $open_investigation = 0;
			// common::pr($consultant_libraries);

			foreach( $consultant_libraries AS $val_total_stats ) {
				$library_section = isset($val_total_stats->st_library_section) ? $val_total_stats->st_library_section : '';
				$library_perform_status = isset($val_total_stats->st_library_perform_status) ? $val_total_stats->st_library_perform_status : '';

				if( $library_section == "new_procedure" ) {
					($library_perform_status != "completed" ) ? $open_procedure += 1 : $closed_procedure += 1;
				}
				if( $library_section == "normal_safetytalks" ) {
					($library_perform_status != "completed" ) ? $open_safetytalks += 1 : $closed_safetytalks += 1;
				}
				if( $library_section == "normal_inspection" ) {
					($library_perform_status != "completed" ) ? $open_inspection += 1 : $closed_inspection += 1;
				}
				if( $library_section == "Investigations" ) {
					($library_perform_status != "completed" ) ? $open_investigation += 1 : $closed_investigation += 1;
				}
			}
			
			$data['total_safetytalks'] = $total_safetytalks 		= $open_safetytalks + $closed_safetytalks;
			$data['total_procedure'] = $total_procedure 		= $open_procedure + $closed_procedure;
			$data['total_inspections'] = $total_inspections 		= $open_inspection + $closed_inspection;
			$data['total_investigations'] = $total_investigations 	= $open_investigation + $closed_investigation;
			
			$data['open_safetytalks'] = $open_safetytalks;
			$data['closed_safetytalks'] = $closed_safetytalks;
			$data['open_procedure'] = $open_procedure;
			$data['closed_procedure'] = $closed_procedure;
			$data['open_inspection'] = $open_inspection;
			$data['closed_inspection'] = $closed_inspection;
			$data['open_investigation'] = $open_investigation;
			$data['closed_investigation'] = $closed_investigation;
			
			$this->load->view('ajax/ajax_client_tools_summary', $data);
		}
		
		function getRegulationContents($regTitle='', $section='', $subsection='', $item='', $subitem='')
		{
			$reg_no 	= ($this->input->post('reg_no')) ? $this->input->post('reg_no') : '';
			$section 	= ($this->input->post('section')) ? $this->input->post('section') : '';
			$subsection = ($this->input->post('subsection')) ? $this->input->post('subsection') : '';
			$item 		= ($this->input->post('item')) ? $this->input->post('item') : '';
			$subitem 	= ($this->input->post('subitem')) ? $this->input->post('subitem') : '';
			
			($regTitle) ? $reg_no = $regTitle : '';
			($section) ? $section = $section : '';
			($subsection) ? $subsection = $subsection : '';
			($item) ? $item = $item : '';
			($subitem) ? $subitem = $subitem : '';
			
			$reg_contents = $this->regulation->getRegSectionFromTitle("st_content", "st_title='".$reg_no."' AND st_section = '".$section."' AND st_subsection = '".$subsection."' AND st_item = '".$item."' AND st_subitem = '".$subitem, 'content' );
			
			// common::pr( $reg_contents ); 
			echo isset($reg_contents[0]['st_content']) ? $reg_contents[0]['st_content'] : 'N/A';
			// common::pr( $reg_contents );
		}
		
		function getLanguages($returnType='')
		{
			$returnType = isset($_POST['returnType']) ? $_POST['returnType'] : 'json';
			$languages = $this->users->getMetaDataList('language');
			if( "json" == $returnType ) {
				echo json_encode($languages);
			}
		}
		
}