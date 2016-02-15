<?php 
class AjaxTranslate extends MY_Controller
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

	function translateS1Data()
	{
		$this->load->library('googletranslatetool');
		$section_to_translate 	= $this->input->post('sectionToTranslate');
		$fromLang 				= strtolower($this->input->post('fromLang'));
		$toLang 				= strtolower($this->input->post('toLang'));

		switch( $section_to_translate ) {
			case "digital_hazards": {
				break;
			}
			case "safety_equipment": {
				$rows_quiz_safetyequip 	= $this->users->getMetaDataList('quiz_questions', 'st_quiz_section_name="safety_equipment"', '', 
																		'in_quiz_id, st_quiz_question, in_quiz_section_id, in_answer_correct');
				foreach( $rows_quiz_safetyequip AS $val_quiz_safetyequip ) {
					$arr_quiz_safetyequip[$val_quiz_safetyequip['in_quiz_section_id']][] = $val_quiz_safetyequip;
				}
				$arr_quiz_safetyequip 	= (isset($arr_quiz_safetyequip)&&is_array($arr_quiz_safetyequip)) ? $arr_quiz_safetyequip : array();

				$section_id = $this->input->post('sectionId');
				$boxid = (31==$section_id) ? "1" : '';
				$boxid = (32==$section_id) ? "2" : '';
				$boxid = (33==$section_id) ? "3" : '';
				$boxid = (34==$section_id) ? "4" : '';
				$boxid = (35==$section_id) ? "5" : '';
				$boxid = (36==$section_id) ? "1" : '';
				$boxid = (37==$section_id) ? "2" : '';
				$boxid = (38==$section_id) ? "3" : '';
				$boxid = (39==$section_id) ? "1" : '';
				$boxid = (40==$section_id) ? "2" : '';
				$boxid = (41==$section_id) ? "3" : '';
				$boxid = (42==$section_id) ? "4" : '';
				$boxid = (43==$section_id) ? "5" : '';
				$boxid = (44==$section_id) ? "6" : '';
				$boxid = (45==$section_id) ? "7" : '';
				$boxid = (46==$section_id) ? "1" : '';
				$boxid = (47==$section_id) ? "2" : '';
				$boxid = (48==$section_id) ? "3" : '';
				$boxid = (49==$section_id) ? "4" : '';
				$boxid = (50==$section_id) ? "5" : '';
				$boxid = (51==$section_id) ? "6" : '';
				$boxid = (52==$section_id) ? "7" : '';

				foreach( $arr_quiz_safetyequip[$section_id] AS $key_safetyequip_quiz => $val_safetyequip_quiz ) {
					$quiz_id 		= isset($val_safetyequip_quiz['in_quiz_id']) ? $val_safetyequip_quiz['in_quiz_id'] : '';
					$quiz_question 	= isset($val_safetyequip_quiz['st_quiz_question']) ? $val_safetyequip_quiz['st_quiz_question'] : '';
					$quiz_section_id= isset($val_safetyequip_quiz['in_quiz_section_id']) ? $val_safetyequip_quiz['in_quiz_section_id'] : '';
					$correct_answer	= isset($val_safetyequip_quiz['in_answer_correct']) ? $val_safetyequip_quiz['in_answer_correct'] : '';

					$quiz_question = googletranslatetool::translate($quiz_question, $fromLang, $toLang );?>
					<script>$('.flexslider').css({ 'background-color':'#FFF'});</script>
					<div class="flexslider">
						<div class="ques" id="questions" quiz_section_id="<?php echo $quiz_section_id;?>" quiz_id="<?php echo $quiz_id;?>">
							<h5><span id="<?php echo "ques".$quiz_section_id."_quiz".$quiz_id;?>"><?php echo ($key_safetyequip_quiz+1);?>)&nbsp;<?php echo $quiz_question;?></span>
							&nbsp;<span id="<?php echo "span_ques".$quiz_section_id."_quiz".$quiz_id;?>"></span></h5>
							<ul style="list-style:lower-latin;">
							<?php 
							$rows_quiz_answers 	= $this->users->getMetaDataList('quiz_answers','in_quiz_section_id = "'.$quiz_section_id.'" 
																			AND in_quiz_id="'.$quiz_id.'"','','st_quiz_answer');
							foreach( $rows_quiz_answers AS $key_quiz_answer => $val_quiz_answer ) {
								$quiz_answer 		= $val_quiz_answer['st_quiz_answer'];
								$cnt_quiz_answer 	= ($key_quiz_answer+1);
								$rows_safetyequip_quiz 	= $this->users->getMetaDataList('quiz_master', 'in_quiz_id="'.$quiz_id.'" 
															AND in_quiz_section_id="'.$quiz_section_id.'" AND in_quiz_performed_by="'.$this->sess_userid.'"', 
														'', 'in_answer_by_user');
								$answer_by_user 		= (isset($rows_safetyequip_quiz[0]['in_answer_by_user']) && $rows_safetyequip_quiz[0]['in_answer_by_user']) 
														? $rows_safetyequip_quiz[0]['in_answer_by_user'] : '';
								$checked_correct_answer = ( $answer_by_user==$cnt_quiz_answer ) ? 'checked' : '';
								$quiz_answer = googletranslatetool::translate($quiz_answer, $fromLang, $toLang );
								?>
								<li style="background:none;margin-left:20px;"><input type="radio" onclick="checkQuizAnswer('<?php echo $quiz_section_id;?>','<?php echo $quiz_id;?>','<?php echo $correct_answer;?>','<?php echo $boxid;?>');" value="<?php echo $cnt_quiz_answer;?>" name="<?php echo "ans".$quiz_section_id."_quiz".$quiz_id;?>" <?php echo $checked_correct_answer;?>>
								&nbsp;<span id="<?php echo "quesans".$quiz_section_id."_quiz".$quiz_id."_ans".$cnt_quiz_answer;?>" class="quesans" cnt_quiz_answer="<?php echo $cnt_quiz_answer;?>"><?php echo $quiz_answer;?></span></li>
								<?php 
							}?>
							</ul>
						</div>
					</div>
					<?php
				}
				break;
			}
		}
	}	
}