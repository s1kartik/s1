<?php $training = $this->users->getMetaDataList('proc_trainings', '1=1', '', 'st_training_name, in_training_id');?>
<div class="modal-header">
    <h4 id="myModalLabel">TRAINING<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body" >
    <!--BEGIN BODY MODAL -->
     <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
	 <form name="frm_proc_training" id="frm_proc_training" method="post">
        <!-- Text input-->
        <label>SEARCH TRAINING</label>
        <div class="input-control text size2"  >
            <input type="text" name="txt_search_training" id="txt_search_training">
            <button class="btn-search"></button>
        </div>
        <div class="clear"></div>
		<div class="row-fluid">
			<table class="table striped bordered hovered" id="tableTraining">
				<thead><tr><th class="text-left">Training Selected</th></tr></thead>
				<tbody id="id_sel_proc_training"></tbody>
			</table>
		</div>
		
		<div id="id_proc_training_errors"></div>
		
        <label>TRAINING</label>
            <div class="row-fluid" id="id_red_trainings">
				<?php 
				$result = count($training);
				sort($training);
				$i = 0;
				while(($i+1) <= $result){?>
					<a href="#" id="<?php echo "tline".($i+1);?>" class="tile half-library bg-red fg-white ttrain"  data-click="transform" training_id="<?php echo $training[$i]['in_training_id'];?>" data-original-title="<?php echo $training[$i]['st_training_name'];?>">
						<span class="training"><?php echo $training[$i]['st_training_name'];?></span>
					</a>
					<?php 
					$i++;
				}?>
			</div>
			<input type="hidden" name="hidn_procedure_section" value="training">
			<input type="hidden" id="training_user" name="trainingUser" value="">
			<input type="hidden" id="training_ids" name="trainingId" value="">
			<div class="inline text-center">
			<button class="image-button primary" id="btn_save_training">Save<i class="icon-enter bg-cobalt"></i></button>
			<button class="btn-cancel image-button danger ">Cancel<i class="icon-cancel-2"></i></button>
			</div>        
		</form>
     </div>
    <!--END BODY MODAL -->
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>

<script type="text/javascript">
	$('.modal-header').css('background-color','gray');
	$('#modalTraining').css('width','700px');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');
	
	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('.row-fluid').find("a").tooltip();
	$('.training').css({'font-size':'12px',
						'overflow': 'hidden',
						'text-overflow':'ellipsis',
						'padding':'5px',
						'white-space': 'nowrap',
						'display':'block',
						'padding-top':'15px'
	});

	$('.btn-search').click(function() {
		var output 			= '';
		var search_training = $("#txt_search_training").val();
		$('#id_red_trainings>a').each(function(){
			var $val_html 	= $(this).find('span').html();
			if( $val_html.toLowerCase().indexOf(search_training) >= 0 ) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	});

	$(document).ready(function () {
		$('#frm_proc_training').validate({
			submitHandler: function(form) {
				var procedure_id 	= '<?php echo $procedure_id;?>';
				var procedure_type 	= '<?php echo $procedure_type;?>';
				var training_ids 	= '';
				
				$('#tableTraining>tbody>tr').each(function() {
					var training_id = $(this).find("td").attr("id");
					training_ids 	+= training_id+" ";
				});
				var training_user = $("#proc_training_tab").attr("class");

				$("#training_ids").val(training_ids);
				$("#training_user").val(training_user);
				
				$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':3, 
											'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
				function(data){
					$("#modalTraining").modal("hide");
					$("#id_modal_procsaved").modal("show");
					setTimeout(function(){ form.submit(); }, 2000);
				});
			}
		});
	});

	$('.ttrain').click(function() {
		if( $(this).attr('id').toLowerCase().indexOf('tline') >= 0 ) {
			var find_str = $(this).attr('id');
		}
		else {
			var find_str = 'tline'+$(this).attr('id');
		}
		
		if( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
			$('#tableTraining>tbody').find('#'+find_str).remove();
		}
		else {
			$('#id_proc_training_errors').html('');
			$(this).addClass('selected');
			$('#tableTraining>tbody').append('<tr id="'+find_str+'"><td id='+$(this).attr('training_id')+'>'+$(this).attr('data-original-title')+'</td></tr>');
		}
	});
</script>