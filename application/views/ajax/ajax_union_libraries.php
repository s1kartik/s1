<?php 
if( isset($union_libraries) && sizeof($union_libraries) ) {
	foreach( $union_libraries AS $union_libtype => $val_union_library ) {
		$library_type_name 	= $this->users->getMetaDataList('library_types', 'id="'.$union_libtype.'"', '', 'library_type');
		$library_type_name 	= isset($library_type_name[0]['library_type']) && $library_type_name[0]['library_type'] ? $library_type_name[0]['library_type'] : '';
		?>
		<h5 class="title"><?php echo $library_type_name;?></h5>
		<div class="heading clearfix">
			<?php 
			$cnt_unionlib = 1;
			
			// common::pr($_SERVER);
			if( $_SERVER['SERVER_ADDR'] != "127.0.0.1" ) {
				date_default_timezone_set("America/New_York");
			}
			else {
				date_default_timezone_set("Asia/Kolkata");
			}
			
			foreach( $val_union_library AS $key_lib => $val_lib ) {
				$title 	= isset($val_lib['title']) && $val_lib['title'] ? $val_lib['title'] : '';?>
				<?php 
				if( $cnt_unionlib%3==1 ) {?>
					<div class="row-fluid">
				<?php }?>
					<div class="span4">
						<div href="#" class=" heading-item heading-item-padded clearfix">
							<div class="clearfix">
								<span class="btn-warning pull-left"><i class="sprite-brick sprite-white"></i></span>
								<div class="training-details">
									<h5><?php echo $title;?></h5>
									<?php 
									$rows_union_courses = $this->users->getMetaDataList('union_courses', 'in_union_id="'.$union_id.'" AND in_library_id="'.$val_lib['library_id'].'" AND in_instructor_id="'.$this->sess_userid.'" AND is_course_active="yes"', '', 'id, in_course_code, dt_start_time');
									$union_course_id= isset($rows_union_courses[0]['id'])&&$rows_union_courses[0]['id'] ? $rows_union_courses[0]['id'] : '';
									$course_code 	= (isset($rows_union_courses[0]['in_course_code']) && $rows_union_courses[0]['in_course_code']) ? $rows_union_courses[0]['in_course_code'] : '';
								
									$dt_start_time = (isset($rows_union_courses[0]['dt_start_time']) && $rows_union_courses[0]['dt_start_time']) ? $rows_union_courses[0]['dt_start_time'] : '';								
									$datetime_info = Common::getDatetimeDiff(date('Y-m-d H:i:s'), $dt_start_time);
									$datetime_info = explode("|", $datetime_info);									
									// echo "<br>Current Datetime: ".date('Y-m-d H:i:s')."<br>Start Datetime: ".$dt_start_time;

									if( $datetime_info['[0]']==0 && 
										($datetime_info['1']<2&&$datetime_info['1']>=0) && ($datetime_info['2']>0||$datetime_info['3']>0) ) {
										$course_status = '1';
									}
									else {
										$course_status = '0';
									}
									/* if( $course_status!=1 ) {
										$del_union_course 	= $this->parentdb->deleteSection($course_code, 'union_course', $course_id);
									}
									*/
									if( $course_status==1 ) {
										$lbl_active = 'Activated';
										$cls_active = 'btn';?>
										<script>$('#start<?php echo $val_lib['library_id'];?>').show();</script>
										<?php 
									}
									else {
										// $del_union_course 	= $this->parentdb->deleteSection($course_code, 'union_course', $union_course_id);
										$lbl_active 		= 'Activate';
										$cls_active 		= 'btn btn-danger';
									}?>
									<button title="Click to view Activation Code" activation-code="<?php echo $course_code;?>" time-left='<?php echo $course_timeleft;?>' class="<?php echo $cls_active;?>" id="activate<?php echo $val_lib['library_id'];?>" onclick="javascript:generateUnionCourse('<?php echo $val_lib['library_id'];?>', '<?php echo $lbl_active;?>');"><?php echo $lbl_active;?></button>

									<a <?php if(!$course_status) { echo "style=display:none;"; }?> class="btn btn-warning " target="_blank" href="<?php echo $this->base."admin/instructor_library_view?libtype=".$union_libtype."&libid=".$val_lib['library_id']."&section=desc&language=".$val_lib['language']."&union=".$union_id;?>" id="start<?php echo $val_lib['library_id'];?>">Start</a>
								</div>
							</div>
						</div>
					</div>
				<?php 
				if( $cnt_unionlib%3==0) {?>
					</div>
				<?php }
				$cnt_unionlib++;
			}?>
		</div>
	<?php
	}
}
else {?>
	<div class="well">
		<div class="row-fluid">
			<div class="span12"><span class="btn btn-warning pull-left">!</span><h5>There are no items matching your search, please try a different option</h5></div>
		</div>
	</div>
	</div>
<?php }?>
<script type="text/javascript">
function generateUnionCourse(libid, libMode)
{
	if( libMode == 'Activate' ) {
		$("#activation_portal").show();
		$("#start"+libid).show();
		var code_lib_course 	= '<?php echo mt_rand(1000, 9999);?>';
		$(".code_lib_course").html("Activation Code: "+code_lib_course);
		
		var timeleft_lib_course = '2:00:00 Time left';
		$(".timeleft_lib_course").html(timeleft_lib_course);
		
		$("#activate"+libid).html("Activated");
		$("#activate"+libid).prop('class', 'btn');
		$.post(
			'<?php echo $this->base."ajax/ajaxAddUnionCourse";?>',
			{'lib_id': libid, 
			'union_id': "<?php echo $union_id;?>", 
			'code_lib_course': code_lib_course, 
			'union_campus': "<?php echo $union_campus;?>"},

			function(data) {
				if( data==true ) {
					alert('Course activated successfully');
					return false;
				}
				else {
					return false;
				}
			}
		);
	}
	else {
		$activation_time_left = $("#activate"+libid).attr('time-left');
		$arr_activation_time_left = $activation_time_left.split(":");
		$day_left 	= $arr_activation_time_left[0];
		$hr_left 	= $arr_activation_time_left[1];
		$time_left	= $arr_activation_time_left[1]+":"+$arr_activation_time_left[2]+":"+$arr_activation_time_left[3];

		if( $hr_left < 2 && $day_left <= 0 ) {
			$("#activation_portal").show();
			$("#start"+libid).show();
			
			var code_lib_course = $("#activate"+libid).attr('activation-code');
			$(".code_lib_course").html("Activation Code: "+code_lib_course);
			var timeleft_lib_course = $time_left+" Time left";
			$(".timeleft_lib_course").html(timeleft_lib_course);
		}
		else {
			alert( "Sorry, this course has been expired, plaese reactivate" );
			$(".code_lib_course").html("");
			$(".timeleft_lib_course").html("");
			$("#activate"+libid).html("Activate");
			$("#activate"+libid).attr('class', 'btn btn-danger');
			$("#start"+libid).hide();
		}
	}
}
</script>