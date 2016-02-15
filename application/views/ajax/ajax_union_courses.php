<!-- AJAX Union Courses search-->
	<h5 class="title"></h5>
	<?php 
	if( isset($rows_union_courses) && sizeof($rows_union_courses) ) {?>
		<div class="heading clearfix">
			<?php 
			$cnt_courselib = 1;
			// common::pr($rows_union_courses);
			foreach( $rows_union_courses AS $key_union_courses => $val_union_courses ) {
				$course_id 			= isset($val_union_courses['id']) && $val_union_courses['id'] ? $val_union_courses['id'] : '';
				$course_lib_id		= isset($val_union_courses['in_library_id']) && $val_union_courses['in_library_id'] ? $val_union_courses['in_library_id'] : '';$course_libtype	   = isset($val_union_courses['library_type_id']) && $val_union_courses['library_type_id'] ? $val_union_courses['library_type_id'] : '';
				$course_liblang		= isset($val_union_courses['language']) && $val_union_courses['language'] ? $val_union_courses['language'] : '';
				$course_lib_title 	= isset($val_union_courses['title']) && $val_union_courses['title'] ? $val_union_courses['title'] : '';
				$campus_name 		= isset($val_union_courses['st_campus_name']) && $val_union_courses['st_campus_name'] ? $val_union_courses['st_campus_name'] : '';
				$course_code 		= isset($val_union_courses['in_course_code']) && $val_union_courses['in_course_code'] ? $val_union_courses['in_course_code'] : '';

				if( $cnt_courselib%3==1 ) {?>
					<div class="row-fluid">
				<?php }?>
				<div class="span4">
					<div href="#" class=" heading-item heading-item-padded clearfix">
						<div class="clearfix">
							<span class="btn-warning pull-left"><i class="sprite-brick sprite-white"></i></span>
							<div class="training-details">
								<h5><?php echo $course_lib_title;?></h5>
								<p class="msg_course_actcode<?php echo $course_id;?> fgred"></p>
								<input type="password" name="txt_course_activation_code<?php echo $course_id;?>" id="txt_course_activation_code<?php echo $course_id;?>" value="" class="span5"  placeholder="Type Code" style="margin-bottom:0px;"/>
								<button class="btn btn-danger" id="participate<?php echo $course_id;?>">Participate</button>
								<script type="text/javascript">
									$(document).on('click', '#participate<?php echo $course_id;?>', function(){
										var course_lib_id 	= '<?php echo $course_lib_id;?>';
										var campus_name 	= '<?php echo $campus_name;?>';
										var course_id 		= '<?php echo $course_id;?>';
										var course_lib_title= '<?php echo $course_lib_title;?>';
										var participant_id 	= '<?php echo $this->sess_userid;?>';
										var course_actcode 	= $("#txt_course_activation_code"+course_id).val();
										
										$.post(
											'<?php echo $this->base."ajax/ajaxCheckCourseActivationCode";?>',
											{'courseActCode':course_actcode, 'courseId':course_id},
											function(data) {
												if( data == true ) {
													$(".msg_course_actcode"+course_id).html("");
													$.post(
														'<?php echo $this->base."ajax/ajaxAddParticipants";?>', 
														{'courseId': course_id, 
														'courseLibraryId': course_lib_id, 
														'unionId': "<?php echo $union_id;?>", 
														'campusName':campus_name},
														function(data) {
															if( data==true ) {
																$("#id_modal_participant").modal("show");
																$("#id_participant_modal").html('You have participate now in Course '+course_lib_title+', redirecting to you on Course');
																$(".btn_close_participant_modal").click(function() {
																	window.location.href="<?php echo $this->base."admin/instructor_library_view?libtype=".$course_libtype."&libid=".$course_lib_id."&section=desc&language=".$course_liblang."&union=".$union_id;?>";
																});
															}
															else {
																$("#id_modal_participant").modal("show");
																$("#id_participant_modal").html('You already have participation in Course '+course_lib_title+', redirecting to you on Course');
																$(".btn_close_participant_modal").click(function() {
																	window.location.href="<?php echo $this->base."admin/instructor_library_view?libtype=".$course_libtype."&libid=".$course_lib_id."&section=desc&language=".$course_liblang."&union=".$union_id;?>";
																});
															}
														}
													);
												}
												else {
													$(".msg_course_actcode"+course_id).html(data);
													$("#txt_course_activation_code"+course_id).focus();
												}
											}
										);
									});
								</script>
							</div>
						</div>
					</div>
				</div>
				<!-- Participant Course status Modal -->
					<div id="id_modal_participant" class="modal metro fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-header bg-red">
							<h3 id="myModalLabel">Participant Portal
							<i class="pull-right icon-cancel-2 btn_close_participant_modal" style="margin-right:10px;" data-dismiss="modal"></i></h3>
						</div>
						<div class="modal-body"><p id="id_participant_modal"></p></div>
						<div class="modal-footer">
							<div class="modal-footer"><button class="btn btn_close_participant_modal" data-dismiss="modal">Close</button></div>
						</div>
					</div>
								
				<?php 
				if( $cnt_courselib%3==0) {?>
					</div>
				<?php }
				$cnt_courselib++;
			}?>						
		</div>
	<?php
	}
	else {?>
		<div class="well">
			<div class="row-fluid">
				<div class="span12">
					<span class="btn btn-warning pull-left">!</span><h5>There are no items matching your search, please try a different option</h5>
				</div>
			</div>
		</div>
	<?php
	}?>