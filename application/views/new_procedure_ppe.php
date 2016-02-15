<?php 
$ppe_names 		= $this->users->getMetaDataList('proc_ppe', '1=1', '', 'st_ppe_name');

$ppe_list 		= $this->users->getMetaDataList('proc_ppe_machinery', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', '', 'st_ppe_selected, st_ppe_added');
$ppe_added 		= (isset($ppe_list[0]['st_ppe_added']) && $ppe_list[0]['st_ppe_added']) ? json_decode($ppe_list[0]['st_ppe_added']) : array();
$ppe_selected 	= (isset($ppe_list[0]['st_ppe_selected']) && $ppe_list[0]['st_ppe_selected']) ? json_decode($ppe_list[0]['st_ppe_selected']) : array();
$all_ppes		= array_merge( $ppe_selected, $ppe_added );

if( isset($ppe_names) && sizeof($ppe_names) ) {
	foreach( $ppe_names AS $key => $val ) {
		$ppe_names[$key] = $val['st_ppe_name'];
	}
}
else {
	$ppe_names = array();
}?>
<div class="modal-header">
    <h4 id="myModalLabel">PERSONAL PROTECTION EQUIPMENTS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body" >
    <!--BEGIN BODY MODAL -->
     <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
        <!-- Text input-->
        <label>SEARCH PPE</label>
        <div class="input-control text size2"  >
            <input type="text" name="txt_search_ppe" id="txt_search_ppe">
            <button class="btn-search"></button>
        </div>
		
		<form method="post" id="frm_ppe" name="frm_ppe">
			<div class="row-fluid">
				<table class="table striped bordered hovered" id="tablePPE">
					<thead><tr><th class="text-left">PPE Selected</th></tr></thead>
					<tbody>
					<?php 
					if( sizeof($all_ppes) && $all_ppes[0] ) {
						foreach( $all_ppes AS $key_ppes => $val_ppes ) {?>
							<tr id=""><td><?php echo $val_ppes;?></td></tr>
						<?php
						}
					}?>
					</tbody>
				</table>
			</div>
	
			<div class="row-fluid">
				<ol id="ppe_list">
					<?php 
					if( sizeof($ppe_added) ) {
						foreach( $ppe_added AS $key_ppe_added => $val_ppe_added ) { ?>
							<li id="ppe_group<?php echo ($key_ppe_added+1);?>">
								<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('ppe_group<?php echo ($key_ppe_added+1);?>');" title="Remove">
									<i class="icon-minus-2"></i>
								</a>
								<div class="input-control text size3" >
									<input type="text" id="ppe_item<?php echo ($key_ppe_added+1);?>" name="ppe_item[]" value="<?php echo $val_ppe_added;?>" placeholder="TYPE PPE" />
								</div>
							</li>
							<?php 
						}
					}?>
				</ol>
			</div>
			<div class="row-fluid"><label data-click="transform" onclick="javascript: addMorePPE(1);" title="Add"> <i class="icon-plus-2"></i> ADD MORE (MAX OF 10)</label></div>

			<div id="id_proc_ppe_errors"></div>
			<label>PPE - CSA APPROVED</label>
			<div class="row-fluid" id="id_red_ppe">
				<?php 
				$result = sizeof($ppe_names);
				if( $result ) {
					sort($ppe_names);
					$i = 0;
					while(($i+1) <= $result) {
						if( trim($ppe_names[$i]) ) {?>
							<a href="#" id="<?php echo "pline".($i+1);?>" class="tile half-library bg-red fg-white pptile"  data-click="transform" data-original-title="<?php echo $ppe_names[$i];?>">
								<span class="ppe"><?php echo $ppe_names[$i];?></span>
							</a>
							<?php 
						}
						$i++;
					}
				}
				else {
					echo "<p>No PPE Found</p>";
				}
				?>
			</div>
			<input type="hidden" name="hidn_procedure_section" value="ppe">
			<input type="hidden" id="hidn_proc_ppe_selected" name="hidn_proc_ppe_selected" value="">
			<div class="inline text-center">
				<button class="image-button primary" id="btn_save_ppe">Save<i class="icon-enter bg-cobalt"></i></button>
				<button class="image-button danger btn-cancel">Cancel<i class="icon-cancel-2 bg-red"></i></button>
			</div>
		</form>
	</div>
    <!--END BODY MODAL -->  
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>


<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
	function addMorePPE()
	{
		var s = parseInt($("#ppe_list").children("li").length);
		if( s >= 10) {
			alert("You have reached 10 items.");
			return false;
		}
		s 	= (s+1);
		$('#ppe_list').append('<li id="ppe_group'+s+'"></li>');

		ppeAppend = '<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("ppe_group'+s+'"); title="Remove"><i class="icon-minus-2"></i></a>';
		ppeAppend += '&nbsp;<div class="input-control text size3" >';
		ppeAppend += '<input type="text" id="ppe_item'+s+'" name="ppe_item[]" placeholder="PPE Name" />';
		ppeAppend += '</div>';

		$('#ppe_group'+s).append( ppeAppend );
	};

	$('.pptile').click(function(){
		if( $(this).attr('id').toLowerCase().indexOf('pline') >= 0 ) {
			var find_str = $(this).attr('id');
		}
		else {
			var find_str = 'pline'+$(this).attr('id');
		}
		if( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
			$('#tablePPE>tbody').find("#"+find_str).remove();
		} 
		else {
			$('#id_proc_ppe_errors').html('');
			$(this).addClass('selected');
			$('#tablePPE>tbody').append('<tr id="'+find_str+'"><td>'+$(this).attr('data-original-title')+'</td></tr>');
		}
	});

	$("#tablePPE>tbody>tr").each(function() {	
		var sel_ppe = $(this).find("td").html();
		var id_sel_ppe = $(this);
		$('#id_red_ppe>a').each(function() {
			var ppe = $(this).find('span').html();
			if( sel_ppe == ppe ) {
				var id_ppe 		= $(this).attr('id');
				$(id_sel_ppe).attr('id', id_ppe);
				$(this).addClass('selected');
			}
		});
	});
	
	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('.row-fluid').find("a").tooltip();

	$('.ppe-tile').css({'font-size':'12px',
						'overflow': 'hidden',
						'text-overflow':'ellipsis',
						'padding':'5px',
						'white-space': 'nowrap',
						'display':'block',
						'padding-top':'15px'
	});
	$('.modal-header').css('background-color','gray');
			//$('#modalPPE').css('width','700px');
			$('.icon-enter').css('padding','3px');
			$('.icon-cancel-2').css('padding','3px 4px 2px 2px');

	$('.btn-search').click(function() {
		var output 			= '';
		var search_ppe = $("#txt_search_ppe").val();
		$('#id_red_ppe>a').each(function() {
			var $val_html 	= $(this).find('span').html();
			if( $val_html.toLowerCase().indexOf(search_ppe) >= 0 ) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	});

	$(document).ready(function () {
		$('#frm_ppe').validate({
			submitHandler: function(form) {
				var procedure_id 	= '<?php echo $procedure_id;?>';
				// ppe selected //
					var ppe_selected 	= new Array();
					var cnt_ppe 		= 0;
					$('#id_red_ppe>a').each(function() {
						if( $(this).hasClass('selected') ) {
							ppe_selected[cnt_ppe] = $(this).find("span").html();
							cnt_ppe+=1;
						}
					});

				// ppe added 					
					$("#hidn_proc_ppe_selected").val(ppe_selected);
					$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':4, 
											'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
						function(data) {
							$("#modalPPE").modal("hide");
							$("#id_modal_procsaved").modal("show");
							setTimeout(function(){ form.submit(); }, 2000);
						}
					);
			}
		});
	});
</script>