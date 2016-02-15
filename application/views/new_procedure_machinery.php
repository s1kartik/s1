<?php 
$machinery_names 		= $this->users->getMetaDataList('proc_machinery', '1=1', '', 'st_machinery_name');
$machinery_list 		= $this->users->getMetaDataList('proc_ppe_machinery', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', '', 'st_machinery_selected, st_machinery_added, st_machinery_contents');
$machinery_added 		= (isset($machinery_list[0]['st_machinery_added']) && $machinery_list[0]['st_machinery_added']) ? json_decode($machinery_list[0]['st_machinery_added']) : array();
$machinery_selected 	= (isset($machinery_list[0]['st_machinery_selected']) && $machinery_list[0]['st_machinery_selected']) ? json_decode($machinery_list[0]['st_machinery_selected']) : array();
$all_machinery			= array_merge( $machinery_selected, $machinery_added );

$machinery_contents 	= (isset($machinery_list[0]['st_machinery_contents']) && $machinery_list[0]['st_machinery_contents']) ? json_decode($machinery_list[0]['st_machinery_contents']) : array();

if( isset($machinery_names) && sizeof($machinery_names) ) {
	foreach( $machinery_names AS $key => $val ) {
		$machinery_names[$key] = $val['st_machinery_name'];
	}
}
else {
	$machinery_names = array();
}
?>
<div class="modal-header">
    <h4 id="myModalLabel">MACHINERY - EQUIPMENT<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body" >
    <!--BEGIN BODY MODAL -->
     <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
        <!-- Text input-->
        <label>SEARCH MACHINERY</label>
        <div class="input-control text size2">
            <input type="text" name="txt_search_machinery" id="txt_search_machinery">
            <button class="btn-search"></button>
        </div>
		<div class="row-fluid">
			<table class="table striped bordered hovered" id="tableMachinery">
				<thead><tr><th class="text-left">Machinery Selected</th></tr></thead>
				<tbody>
				<?php 
				if( sizeof($all_machinery) && $all_machinery[0] ) {
					foreach( $all_machinery AS $key_machinery => $val_machinery ) {?>
						<tr id="mline"><td><?php echo $val_machinery;?></td></tr>
					<?php
					}
				}?>
				</tbody>
			</table>
		</div>

		<form method="post" id="frm_machinery" name="frm_machinery">
			<div class="row-fluid">
				<ol id="mac_list">
					<?php 
					if( sizeof($machinery_added) ) {
						foreach( $machinery_added AS $key_machinery_added => $val_machinery_added ) { ?>
							<li id="mac_group<?php echo ($key_machinery_added+1);?>">
								<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('mac_group<?php echo ($key_machinery_added+1);?>');" title="Remove">
									<i class="icon-minus-2"></i>
								</a>
								<div class="input-control text size3" >
									<input type="text" id="machinery_item<?php echo ($key_machinery_added+1);?>" name="machinery_item[]" value="<?php echo $val_machinery_added;?>" placeholder="TYPE MACHINERY" />
								</div>
							</li>
							<?php 
						}
					}
					?>
				</ol>
			</div>		
			<div class="row-fluid"><label data-click="transform" onclick="javascript: addMoreMac(1);" title="Add"> <i class="icon-plus-2"></i> ADD MORE</label></div>

			<div id="id_proc_machinery_errors"></div>
			<label>MACHINERY - EQUIPMENT</label>
			<div class="row-fluid" id="id_red_machinery">
				<?php 
				$result = count($machinery_names);
				sort($machinery_names);
				$i = 0;
				while (($i+1) <= $result) {
					if( trim($machinery_names[$i]) ) {?>
						<a href="#" id="<?php echo "mline".($i+1);?>" class="tile half-library bg-red fg-white mctile"  data-click="transform" data-original-title="<?php echo $machinery_names[$i];?>">
							<span class="machinery"><?php echo $machinery_names[$i];?></span>
						</a>
						<?php 
					}
					$i++;
				}
				?>
			</div>
			<!--*** BEGIN *** ADD SPECIFIC MANUFACTURER'S INSTRUCTIONS ******* -->           
				<div class="row-fluid"><label >SPECIFIC MANUFACTURER'S INSTRUCTIONS (UP TO 3)</label></div>
				<div class="row-fluid">
					<ol id="instructions_list">
						<?php 
						if( sizeof($machinery_contents) ) {
							foreach( $machinery_contents AS $key_mac_contents => $val_mac_contents ) { ?>
								<li id="instructions_group<?php echo ($key_mac_contents+1);?>">
									<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('instructions_group<?php echo ($key_mac_contents+1);?>');" title="Remove">
										<i class="icon-minus-2"></i>
									</a>
									<div class="input-control textarea" >
										<textarea id="machinery_instruction<?php echo ($key_mac_contents+1);?>" name="machinery_instruction[]" placeholder="(MAX OF 1000 CHARACTERS)" ><?php echo $val_mac_contents;?></textarea> 
									</div>
								</li>
							<?php
							}
						}
						else {?>
							<li>
								<div class="input-control textarea" >
									<textarea id="machinery_instruction1" name="machinery_instruction[]" placeholder="(MAX OF 1000 CHARACTERS)" ></textarea> 
								</div>
							</li>
						<?php
						}?>
					</ol>
				</div> 
				<div class="row-fluid">
					<label data-click="transform" onclick="javascript: addMoreInstructions(1);" title="Add"> <i class="icon-plus-2"></i> ADD MORE</label>
				</div>
				
				<div class="row-fluid">
					<div class="inline text-center padding20">
						<button class="image-button primary" id="btn_save_machinery">Save<i class="icon-enter bg-cobalt"></i></button>
						<button class="btn-cancel image-button danger">Cancel<i class="icon-cancel-2 bg-red"></i></button>
					</div>
				</div>
			<!--**** END ** ADD SPECIFIC MANUFACTURER'S INSTRUCTIONS ******* -->
			<input type="hidden" name="hidn_procedure_section" value="machinery">
			<input type="hidden" id="hidn_proc_machinery_selected" name="hidn_proc_machinery_selected" value="">
		</form>
     </div>
    <!--END BODY MODAL -->  
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>

<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">	
	function addMoreMac()
	{
		var s 	= parseInt($("#mac_list").children("li").length);
		if (s >= 10){alert("You have reached 10 items.");return false;}
		s 		= (s+1);
		$('#mac_list').append('<li id="mac_group'+s+'"></li>');

		macAppend = '<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("mac_group'+s+'"); title="Remove"><i class="icon-minus-2"></i></a>';
		macAppend += '&nbsp;<div class="input-control text size3" >';
		macAppend += '<input type="text" id="machinery_item'+s+'" name="machinery_item[]" placeholder="Machinery Name" />';
		macAppend += '</div>';
		$('#mac_group'+s).append( macAppend );
	};

	function addMoreInstructions(){
		var t 	= parseInt($("#instructions_list").children("li").length);
		if (t >= 3){alert("You have reached 3 items.");return false;};	
		t = (t+1);
		$('#instructions_list').append('<li id="instructions_group'+t+'">');
		instAppend = '<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("instructions_group'+t+'"); title="Remove"><i class="icon-minus-2"></i></a>';
		instAppend += '<div class="input-control textarea" >';
		instAppend += '<textarea  id="machinery_instruction'+t+'" name="machinery_instruction[]" placeholder="(MAX OF 1000 CHARACTERS)" ></textarea>';
		instAppend += '</div></li>';
		
		$('#instructions_group'+t).append( instAppend );		
	}

	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('.row-fluid').find("a").tooltip();
	$('.machinery').css({'font-size':'12px',
						'overflow': 'hidden',
						'text-overflow':'ellipsis',
						'padding':'5px',
						'white-space': 'nowrap',
						'display':'block',
						'padding-top':'15px'
	});

	$('.mctile').click(function(){
		if( $(this).attr('id').toLowerCase().indexOf('mline') >= 0 ) {
			var find_str = $(this).attr('id');
		}
		else {
			var find_str = 'mline'+$(this).attr('id');
		}
		if( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
			$('#tableMachinery>tbody').find("#"+find_str).remove();
		} 
		else {
			$('#id_proc_machinery_errors').html('');
			$(this).addClass('selected');
			$('#tableMachinery>tbody').append('<tr id="'+find_str+'"><td>'+$(this).attr('data-original-title')+'</td></tr>');
		}
	});

	$("#tableMachinery>tbody>tr").each(function() {
		var sel_mac = $(this).find("td").html();
		var id_sel_mac = $(this);
		$('#id_red_machinery>a').each(function() {
			var mac = $(this).find('span').html();
			if( sel_mac == mac ) {
				var id_mac = $(this).prop('id');
				$(id_sel_mac).prop('id', id_mac);
				$(this).addClass('selected');
			}
		});
	});
	$('.modal-header').css('background-color','gray');
	$('#modalMachinery').css('width','700px');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');

	$('.btn-search').click(function() {
		var output 			 = '';
		var search_machinery = $("#txt_search_machinery").val();
		$('#id_red_machinery>a').each(function() {
			var $val_html 	= $(this).find('span').html();
			if( $val_html.toLowerCase().indexOf(search_machinery) >= 0 ) {
				$(this).show();
			}
			else {
				$(this).hide();
			}
		});
	});

	$(document).ready(function () {
		$('#frm_machinery').validate({
			submitHandler: function(form) {
				var procedure_id 		= '<?php echo $procedure_id;?>';
				var procedure_type 		= '<?php echo $procedure_type;?>';
				var machinery_selected	= new Array();
				var cnt_machinery		= 0;

				// machinery selected //
					var machinery_selected 	= new Array();
					var cnt_mac 			= 0;
					$('#id_red_machinery>a').each(function() {
						if( $(this).hasClass('selected') ) {
							machinery_selected[cnt_mac] 	= $(this).find("span").html();
							cnt_mac+=1;
						}
					});
				$("#hidn_proc_machinery_selected").val(machinery_selected);
				$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':5, 
										'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
					function(data) {
						$("#modalMachinery").modal("hide");
						$("#id_modal_procsaved").modal("show");
						setTimeout(function(){ form.submit(); }, 2000);
					}
				);
			}
		});
	});
</script>   
