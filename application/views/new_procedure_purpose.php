<?php 
$rows_purpose 		= $this->users->getMetaDataList('proc_purpose', '', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', 'dt_purpose_date, st_purpose_title, st_purpose_description');
$purpose_date 		= isset($rows_purpose[0]['dt_purpose_date']) ? $rows_purpose[0]['dt_purpose_date'] : '';
$purpose_title 		= isset($rows_purpose[0]['st_purpose_title']) ? $rows_purpose[0]['st_purpose_title'] : '';
$purpose_description= isset($rows_purpose[0]['st_purpose_description']) ? $rows_purpose[0]['st_purpose_description'] : '';
?>
<div class="modal-header">
    <h4 id="myModalLabel">PURPOSE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body">
    <!--BEGIN BODY MODAL -->
	<div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
		<form method="post" name="frm_proc_purpose" id="frm_proc_purpose" action="<?php echo $base."admin/my_created_procedures_metro?id=".$procedure_id."&type=".$procedure_type;?>">
		<div id="id_proc_purpose_errors"></div>
			<div class="row-fluid">
			<!-- Text input-->
				<div id="id_purpose_date" class="fgred"></div>
				<label>SELECT DATE</label>				
				<div class="input-control text size2" id="purposeDate">					
					<input type="text" name="txt_purpose_date" id="txt_purpose_date" class="purpose_date" value="<?php echo $purpose_date;?>">
					<button type="button" class="btn-date"></button>
				</div>
                <h5>*May not be earlier than today.</h5>
			</div>
			<div class="row-fluid">
			<!-- Text input-->
				<label>TITLE</label>
				<div class="input-control text size4">
					<input type="text" name="txt_purpose_title" id="txt_purpose_title" placeholder="(MAX OF 100 CHARACTERS)" value="<?php echo $purpose_title;?>">
				</div>
				<!-- Text input-->
			</div>
			<div class="row-fluid">
				<label>PURPOSE</label>
				<div class="input-control textarea">
					<textarea name="txtarea_purpose_description" onkeyUp="showRemainingChars('',500,10,'txtarea_purpose_description');" maxlength="500" id="txtarea_purpose_description" placeholder="(MAX OF 500 CHARACTERS)"><?php echo $purpose_description;?></textarea>
				</div>
				<div id="cnt_itemname"></div>
			</div>
			<div class="inline text-center">
				<button class="image-button primary" id="btn_save_purpose" name="btn_save">Save<i class="icon-enter bg-cobalt"></i></button>
				<button class="image-button danger btn-cancel " name="btn_cancel">Cancel<i class="icon-cancel-2 bg-red"></i></button>
			</div>
			<input type="hidden" name="hidn_procedure_section" value="purpose">
		</form>
    </div>
    <!--END BODY MODAL -->
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro-calendar.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/metro/metro-datepicker.js"></script>
<script type="text/javascript">
	$("#purposeDate").datepicker({
		// set init date //
		format: "yyyy-mm-dd", // set output format
		effect: "fade", // none, slide, fade
		position: "bottom", // top or bottom,
		// 'ru' or 'en', default is $.Metro.currentLocale
	});
	$('.purpose_date').css('cursor', 'pointer');

	$(document).ready(function () {
		if( !$('#modalRisk').hasClass('hide') ) {
			$('#modalRisk').addClass('hide');
		}

		$.validator.setDefaults({
			errorPlacement: function(error, element) {
				error.appendTo('#id_proc_purpose_errors');
			}
		});

		$.validator.addMethod(
            'checkDate',
            function (value) {
				var current_date = new Date();
				var month 	= current_date.getMonth()+1+"";
				if(month.length==1){ month="0"+month; }
				var date = current_date.getDate()+"";
				if(date.length==1){ date="0" +date; }

				currentdate = current_date.getFullYear()+"-"+month+"-"+date;
                return value >= currentdate;
            }
        );
		
		$('#frm_proc_purpose').validate({
			highlight: function(element) {
				$('#id_proc_purpose_errors').addClass('fgred')
			}, 
			rules: {
				txt_purpose_date: {
					required: true,
					maxlength: 100,
					checkDate: true
				}, 
				txt_purpose_title: {
					required: true,
					maxlength: 100
				},
				txtarea_purpose_description: {
					required: true,
					maxlength: 500
				}
			}, 
			messages: {
				txt_purpose_date: {
					required: "Please enter Date",
					checkDate: "Invalid Date"
				}, 
				txt_purpose_title: {
					required: "Please enter Title"
				}, 
				txtarea_purpose_description: {
					required: "Please enter Purpose"
				}
			}, 

			submitHandler: function(form) {
				$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':1, 
									'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
					function(data) {
						$("#modalPurpose").modal("hide");
						$("#id_modal_procsaved").modal("show");
						setTimeout(function(){ form.submit(); }, 2000);
					}
				);
			}
		});
	});

	$('.modal-header').css('background-color','gray');
	//$('#modalPurpose').css('width','350px');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');
</script>
