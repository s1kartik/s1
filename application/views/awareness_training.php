<?php $this->load->view('header_admin');?>
<?php 
$tile_class = '';
?>
<div class="homebg metro ">
    <!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
				<em class="margin20"><?php echo strtoupper($utype);?> AWARENESS TRAINING</em>
			</div>
		</div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home ">
        <div class="row-fluid">
			<?php 
			$rows_training_progress = $this->users->checkAwarenessTrainingCompletedByUser($utype);
			// common::pr($rows_training_progress);
			$lib1 = $rows_training_progress['training_libraries'][0];
			$lib2 = $rows_training_progress['training_libraries'][1];
			$lib3 = $rows_training_progress['training_libraries'][2];
			$lib4 = $rows_training_progress['training_libraries'][3];

			foreach( $rows_training_progress['training_libraries'] AS $key => $val_training_lib ) {
				$rows_quiz_answers = $this->users->getMetaDataList('quiz_master', 'in_quiz_section_id="'.$val_training_lib.'" AND 
											st_quiz_section_name="awareness_training" AND in_quiz_performed_by="'.$this->sess_userid.'" 
											AND is_answer_correct=1', '', '*');
				$total_user_quiz_answers = (isset($rows_quiz_answers[0]['in_quiz_id']) && $rows_quiz_answers[0]['in_quiz_id'] ) ? sizeof($rows_quiz_answers) : 0;

				$rows_lib_pn = $this->users->getMetaDataList('library_pages', 'library_id="'.$val_training_lib.'"', '', 'MAX(pn) AS page_number');
				$lib_pn = isset($rows_lib_pn[0]['page_number']) ? $rows_lib_pn[0]['page_number'] : 1;

				$page = $this->libraries->getPageByPageNumber($val_training_lib, $lib_pn);
				foreach( $page AS $key_page => $val_page ) {
					$pn 			= $val_page['pn'];
					$page_id 		= $val_page['page_id'];
					$paragraph_id 	= $val_page['paragraph_id'];

					$rows_quiz = $this->libraries->getQuizScore($page_id, $paragraph_id);
					// common::pr($rows_quiz);
					$cnt_awtraining_quiz = sizeof($rows_quiz);
					$score_awtraining_quiz 	= ($cnt_awtraining_quiz>0) ? round(($total_user_quiz_answers/$cnt_awtraining_quiz)*100) : '0';
					$arr_score_quiz[$val_training_lib] 	= $score_awtraining_quiz;
				}
			}
			// common::pr($rows_training_progress);
			// common::pr( $arr_score_quiz );

			$training1_progress = isset($rows_training_progress[$lib1]) ? $rows_training_progress[$lib1] : '';
			$training2_progress = isset($rows_training_progress[$lib2]) ? $rows_training_progress[$lib2] : '';
			$training3_progress = isset($rows_training_progress[$lib3]) ? $rows_training_progress[$lib3] : '';
			$training4_progress = isset($rows_training_progress[$lib4]) ? $rows_training_progress[$lib4] : '';
			
			$training1_quizscore = isset($arr_score_quiz[$lib1]) ? $arr_score_quiz[$lib1] : '';
			$training2_quizscore = isset($arr_score_quiz[$lib2]) ? $arr_score_quiz[$lib2] : '';
			$training3_quizscore = isset($arr_score_quiz[$lib3]) ? $arr_score_quiz[$lib3] : '';
			$training4_quizscore = isset($arr_score_quiz[$lib4]) ? $arr_score_quiz[$lib4] : '';
			
			$training1_progress = ($training1_progress+$training1_quizscore)/2;
			$training2_progress = ($training2_progress+$training2_quizscore)/2;
			$training3_progress = ($training3_progress+$training3_quizscore)/2;
			$training4_progress = ($training4_progress+$training4_quizscore)/2;

			if( $training1_progress>=75 && $training2_progress>=75 && $training3_progress>=75 && $training4_progress>=75 ) {
				$cls_opacity_tile1 = $cls_opacity_tile2 = $cls_opacity_tile3 = $cls_opacity_tile4 = "selected";
				$href_tile1 = $base."admin/library_page_contents?libtype=1&libid=".$lib1."&section=desc&language=en&awtraining=".$utype."&clib=1";
				$href_tile2 = $base."admin/library_page_contents?libtype=1&libid=".$lib2."&section=desc&language=en&awtraining=".$utype."&clib=2";
				$href_tile3 = $base."admin/library_page_contents?libtype=1&libid=".$lib3."&section=desc&language=en&awtraining=".$utype."&clib=3";
				$href_tile4 = $base."admin/library_page_contents?libtype=1&libid=".$lib4."&section=desc&language=en&awtraining=".$utype."&clib=4";
			}
			else if( $training1_progress>=75 && ($training2_progress<75 && $training3_progress<75 && $training4_progress<75) ) { 
				$cls_opacity_tile1 = "selected"; $cls_opacity_tile2 = "";
				$cls_opacity_tile3 = $cls_opacity_tile4 = "half-opacity";
				$href_tile1 = $base."admin/library_page_contents?libtype=1&libid=".$lib1."&section=desc&language=en&awtraining=".$utype."&clib=1";
				$href_tile2 = $base."admin/library_page_contents?libtype=1&libid=".$lib2."&section=desc&language=en&awtraining=".$utype."&clib=2";
				$href_tile3 = "#";
				$href_tile4 = "#";
			}
			else if( ($training1_progress>=75 && $training2_progress>=75) && $training3_progress<75 && $training4_progress<75 ) {
				$cls_opacity_tile1 = $cls_opacity_tile2 = "selected"; $cls_opacity_tile3 = "";
				$cls_opacity_tile4 = "half-opacity";
				$href_tile1 = $base."admin/library_page_contents?libtype=1&libid=".$lib1."&section=desc&language=en&awtraining=".$utype."&clib=1";
				$href_tile2 = $base."admin/library_page_contents?libtype=1&libid=".$lib2."&section=desc&language=en&awtraining=".$utype."&clib=2";
				$href_tile3 = $base."admin/library_page_contents?libtype=1&libid=".$lib3."&section=desc&language=en&awtraining=".$utype."&clib=3";
				$href_tile4 = "#";
			}
			else if( ($training1_progress >= 75&&$training2_progress>=75&&$training3_progress>=75) && $training4_progress<75 ) {
				$cls_opacity_tile1 = $cls_opacity_tile2 = $cls_opacity_tile3 = "selected"; $cls_opacity_tile4 = "";

				$href_tile1 = $base."admin/library_page_contents?libtype=1&libid=".$lib1."&section=desc&language=en&awtraining=".$utype."&clib=1";
				$href_tile2 = $base."admin/library_page_contents?libtype=1&libid=".$lib2."&section=desc&language=en&awtraining=".$utype."&clib=2";
				$href_tile3 = $base."admin/library_page_contents?libtype=1&libid=".$lib3."&section=desc&language=en&awtraining=".$utype."&clib=3";
				$href_tile4 = $base."admin/library_page_contents?libtype=1&libid=".$lib4."&section=desc&language=en&awtraining=".$utype."&clib=4";
			}
			else {
				$cls_opacity_tile1 = ($training1_progress>=75) ? "selected" : '';
				$cls_opacity_tile2 = $cls_opacity_tile3 = $cls_opacity_tile4 = "half-opacity";
				$href_tile1 = $base."admin/library_page_contents?libtype=1&libid=".$lib1."&section=desc&language=en&awtraining=".$utype."&clib=1";
				$href_tile2 = "#";
				$href_tile3 = "#";
				$href_tile4 = "#";
			}?>
			<a href="<?php echo $href_tile1;?>">
				<div class="tile double triple-half bg-black <?php echo $tile_class." ".$cls_opacity_tile1;?>">
                
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-04.png";?>"></div>
					<div class="s1_top_tile_title"><center>MODULE</center></div>
				</div>
			</a>
			<a href="<?php echo $href_tile2;?>">
				<div class="tile double triple-half bg-black <?php echo $tile_class." ".$cls_opacity_tile2;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-05.png";?>"></div>
					<div class="s1_top_tile_title"><center>MODULE</center></div>
				</div>
			</a>
			<a href="<?php echo $href_tile3;?>">
				<div class="tile double triple-half bg-black <?php echo $tile_class." ".$cls_opacity_tile3;?>" >
					<div class="tile-content icongetstarted "><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-06.png";?>"></div>
					<div class="s1_top_tile_title"><center>MODULE</center></div>
				</div>
			</a>
			<a href="<?php echo $href_tile4;?>">
				<div class="tile double triple-half bg-black <?php echo $tile_class." ".$cls_opacity_tile4;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-07.png";?>"></div>
					<div class="s1_top_tile_title"><center>MODULE</center></div>
				</div>
			</a>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var training1_progress = '<?php echo $training1_progress;?>';
		var training2_progress = '<?php echo $training2_progress;?>';
		var training3_progress = '<?php echo $training3_progress;?>';
		var training4_progress = '<?php echo $training4_progress;?>';

		if( training1_progress>=75 && training2_progress>=75 && training3_progress>=75 && training4_progress>=75 ) {
			$.ajax({
				url: js_base_path+'ajax/ajax_set_get_page_points',
				type: 'post', 
				async: false, 
				data: {'pointPageSectionId':30,'pointPageId':2,'visitedSection':'training' },
				success: function(output) {
					if( output.trim() ) {
						$("#id_modal_points").html(output);
						$("#modal_points").modal('show');
					}
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}
	});
	
	$('.triple-half').click(function(){
		if( $(this).hasClass('selected') ){
			// $(this).removeClass('selected'); // Line is disabled because Tile should not unselected when its selected //
		}
		else{
			if( $(this).hasClass('half-opacity') ) {
			}
			else {
				$(this).addClass('selected');
			}
		}
	});
</script>
<?php $this->load->view('footer_admin');?>
