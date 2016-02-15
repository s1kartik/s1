<?php 
$rows_risk 			= $this->users->getMetaDataList('proc_riskratings_hazards', '', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', 'st_risk_ratings, st_hazards_selected');
$risk_ratings 		= isset($rows_risk[0]['st_risk_ratings']) ? json_decode($rows_risk[0]['st_risk_ratings']) : array();
$hazards_selected 	= isset($rows_risk[0]['st_hazards_selected']) ? explode(",", $rows_risk[0]['st_hazards_selected']) : array();
?>

<div class="modal-header">
    <h4 id="myModalLabel">RISK RATING/HAZARDS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body" >
    <!--BEGIN BODY MODAL -->
	<div id="id_proc_risk_errors"></div>	
    <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
		<form name="frm_risk_rating" id="frm_risk_rating" method="post">
        <div class="row-fluid">
			<?php 
			$cnt_ratings = 0;
			if( sizeof($risk_ratings) ) {
				foreach( $risk_ratings AS $key_ratings => $val_ratings ) {
					switch ($cnt_ratings) {
						case 0: {
							$label = "Risk";
							$rating_description = "The possibility that something unpleasant or unwelcome will happen. (Oxford)";
							break;
						}
						case 1: {
							$label = "Probability";
							$rating_description = "The likelihood of something happening or being the case. (Oxford)";
							break;
						}
						case 2: {
							$label = "Severity";
							$rating_description = "(Of something bad or undesirable) very great; intense. (Oxford)";
							break;
						}
					}?>
					<label>
								<strong><?php echo $label;?></strong>
								<p><?php echo $rating_description;?></p>
							</label>
					<br />
					<div class="slider permanent-hint <?php echo "risk_slider".($cnt_ratings+1);?>" data-role="slider" data-position="<?php echo $val_ratings;?>" data-accuracy="1" data-colors="green, green, yellow, red, red" data-show-hint="show" data-animate="true" data-min="0" data-max="5" id="<?php echo "risk_slider".($cnt_ratings+1);?>">
					</div>
					<?php 
					$cnt_ratings++;
				}
			}
			else {?>
				<label>
				<strong>Risk</strong>
				<p > 
				The possibility that something unpleasant or unwelcome will happen. (Oxford) 
				</p>
				</label>
					<br />
					<div class="slider permanent-hint" data-role="slider" 
						data-position="0" data-accuracy="1" data-colors="green, green, yellow, red, red" data-show-hint="show" data-animate="true" data-min="0" data-max="5" id="risk_slider1">
					</div>
				<label>
				<strong>Probability</strong>
				<p > 
				The likelihood of something happening or being the case. (Oxford) 
				</p>
				</label>
					<br />
					<div class="slider permanent-hint" data-role="slider" 
						data-position="0" data-accuracy="1" data-colors="green, green, yellow, red, red" data-show-hint="show" data-animate="true" data-min="0" data-max="5" id="risk_slider2">
					</div>
				<label>
				<strong>Severity</strong>
				<p>(Of something bad or undesirable) very great; intense. (Oxford)</p>
				</label>
					<br />
					<div class="slider permanent-hint" data-role="slider"  
						data-position="0" data-accuracy="1" data-colors="green, green, yellow, red, red" data-show-hint="show" data-animate="true" data-min="0" data-max="5" id="risk_slider3">
					</div>
				<?php
				
			}
			?>
		</div>
		<div class="row-fluid">
			<table class="table striped bordered hovered" id="tableRisk">
				<thead><tr><th class="text-left">Hazard List Selected</th></tr></thead>
				<tbody class="cls_hazards_risk">
					<?php 
					if( sizeof($hazards_selected) ) {
						foreach( $hazards_selected AS $key_hazards => $val_hazards ) {?>
							<tr><td><?php echo $val_hazards;?></td></tr>
						<?php
						}
					}?>
				</tbody>
            </table>
        </div>
		

        <label><strong>HAZARD LIST</strong></label>
        <div class="container-fluid padding-metro-home ">
            <div class="row-fluid" id="id_div_risk">
            	<a href="#" id="rline1" class="tile half bg-black image-container"  data-click="transform" title="Cold Stress">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline2" class="tile half bg-black image-container"  data-click="transform" title="Confined Space">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline3" class="tile half bg-black image-container" data-click="transform" title="Crushed By An Object">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
            	<a href="#" id="rline4" class="tile half bg-black image-container"  data-click="transform" title="Electrical">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>

                <a href="#" id="rline5" class="tile half bg-black image-container"  data-click="transform" title="Excavation Collapse">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline6" class="tile half bg-black image-container"  data-click="transform" title="Explosions">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline7" class="tile half bg-black image-container"  data-click="transform" title="Exposure to Chemicals">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline8" class="tile half bg-black image-container"  data-click="transform" title="Fall at Heights">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline9" class="tile half bg-black image-container"  data-click="transform" title="Fall from Same Level">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline10" class="tile half bg-black image-container"  data-click="transform" title="Falling Objects and Overhead Protection">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline11" class="tile half bg-black image-container"  data-click="transform" title="Fire">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline12" class="tile half bg-black image-container"  data-click="transform" title="Floor Openings">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline13" class="tile half bg-black image-container"  data-click="transform" title="Heat Stress">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline14" class="tile half bg-black image-container"  data-click="transform" title="Heavy Equipments">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline15" class="tile half bg-black image-container"  data-click="transform" title="Ladder">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
            	<a href="#" id="rline16" class="tile half bg-black image-container"  data-click="transform" title="Lighting">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
				<a href="#" id="rline17" class="tile half bg-black image-container"  data-click="transform" title="MSD">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>

                <a href="#" id="rline18" class="tile half bg-black image-container"  data-click="transform" title="Overhead Power Lines">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline19" class="tile half bg-black image-container"  data-click="transform" title="Overloaded Vehicle &amp; Forklift">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
            	<a href="#" id="rline20" class="tile half bg-black image-container"  data-click="transform" title="Poor Indoor Air Quality">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>

                <a href="#" id="rline21" class="tile half bg-black image-container"  data-click="transform" title="Protruding">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline22" class="tile half bg-black image-container"  data-click="transform" title="Struck by Object">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline23" class="tile half bg-black image-container"  data-click="transform" title="Trench Collapse">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline24" class="tile half bg-black image-container"  data-click="transform" title="Unguarded Machinery">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline25" class="tile half bg-black image-container"  data-click="transform" title="Unsafe Electrical Equipment &amp; Operations">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline26" class="tile half bg-black image-container"  data-click="transform" title="Unsafe Lifting Operations">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline27" class="tile half bg-black image-container" data-click="transform" title="Unsafe Scaffold">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
                <a href="#" id="rline28" class="tile half bg-black image-container"  data-click="transform" title="Unsafe Working at Heights">
                    <img src="<?php echo $base."img/new-procedure/risk/hazards.png";?>"/>
            	</a>
            </div>
        </div>
		<div class="inline text-center">
            <button class="image-button primary" name="btn_save_risk" id="btn_save_risk">Save<i class="icon-enter bg-cobalt"></i></button>
            <button class="image-button danger btn-cancel" >Cancel<i class="icon-cancel-2 bg-red"></i></button>
        </div>
		<input type="hidden" name="hidn_procedure_section" value="risk">
		<input type="hidden" id="hidn_proc_riskhazard_names" name="hidn_proc_riskhazard_names" value="">
		<input type="hidden" id="hidn_proc_riskslider1" name="hidn_proc_riskslider1" value="">
		<input type="hidden" id="hidn_proc_riskslider2" name="hidn_proc_riskslider2" value="">
		<input type="hidden" id="hidn_proc_riskslider3" name="hidn_proc_riskslider3" value="">
		</form>
     </div>
    <!--END BODY MODAL -->
</div>
<div class="modal-footer"><button class="btn btn-close" data-dismiss="modal">Close</button></div>
<script>
	$(".btn-close").click(function() {
		/* if( $("#modalPreview11").hasClass("hide") ) {
			$("#modalPreview11").removeClass("hide");
		}
		else {
			$("#modalPreview11").addClass("hide");
		}*/
	});
</script>
<script type="text/javascript">
	$("#tableRisk>tbody>tr").each(function() {
		var sel_risk = $(this).find("td").html();
		var id_sel_risk = $(this);
		$('#id_div_risk>a').each(function() {
			var risk = $(this).attr('title');
			if( sel_risk == risk ) {
				var id_risk = $(this).attr('id');
				$(id_sel_risk).attr('id', id_risk);
				$(this).addClass('selected');
			}
		});
	});

	$('.image-container').click(function(){
		if( $(this).attr('id').toLowerCase().indexOf('rline') >= 0 ) {
			var find_riskstr = $(this).attr('id');
		}
		else {
			var find_riskstr = 'rline'+$(this).attr('id');
		}
		if( $(this).hasClass('selected')){
			$(this).removeClass('selected');
			$('#tableRisk>tbody').find('#'+find_riskstr).remove();
		}
		else {
			$('#id_proc_risk_errors').html('');
			$(this).addClass('selected');
			$('#tableRisk>tbody').append('<tr id="'+find_riskstr+'"><td>'+$(this).attr('data-original-title')+'</td></tr>');
		}
	});
	
	var cnt_hazards 	= 0;
	var hazard_names 	= new Array();

	$(document).ready(function () {
		$('#frm_risk_rating').validate({
			submitHandler: function(form) {
				$('#tableRisk>tbody.cls_hazards_risk>tr').each(function() {
					if( $(this).find("td").html() ) {
						hazard_names[cnt_hazards] 	= $(this).find("td").html().replace("&","");
						cnt_hazards += 1;
					}
				});
				if( cnt_hazards > 0 ) {
					var procedure_id 	= '<?php echo $procedure_id;?>';
					var procedure_type 	= '<?php echo $procedure_type;?>';
					
					var risk_slider1 	= $("#risk_slider1").slider();
					var val_risk_slider1= risk_slider1.slider('value');
					var risk_slider2 	= $("#risk_slider2").slider();
					var val_risk_slider2= risk_slider2.slider('value');		
					var risk_slider3 	= $("#risk_slider3").slider();
					var val_risk_slider3= risk_slider3.slider('value');

					$("#hidn_proc_riskhazard_names").val(hazard_names);
					$("#hidn_proc_riskslider1").val(val_risk_slider1);
					$("#hidn_proc_riskslider2").val(val_risk_slider2);
					$("#hidn_proc_riskslider3").val(val_risk_slider3);
					$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':2, 
												'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
						function(data) {
							$("#modalRisk").modal("hide");
							$("#id_modal_procsaved").modal("show");
							setTimeout(function(){ form.submit(); }, 2000);
						}
					);
				}
				else {
					$('#id_proc_risk_errors').html('Please select atleast 1 hazard.');
					$('#id_proc_risk_errors').addClass('fgred');
					$("div").scrollTop(0);
				}
			}
		});
	});
	
	
	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('.row-fluid').find("a").tooltip();

	$('.modal-header').css('background-color','gray');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');
</script>  