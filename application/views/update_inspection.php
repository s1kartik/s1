<?php 
$this->load->view('header_admin');
$sizeof_inspitems = isset($rows_insp_items) ? sizeof($rows_insp_items) : '';
if( $param ) {
	$heading_label 	= "Customized Inspection";
}
else {
	$heading_label 	= "Inspection";
}
?>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<style>.flexslider .slides img {width: 75px; height: 74px; display: block;}</style>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<div class="info-container">
    <div class="document-content">
	<form class="form-horizontal frm-update-inspection" enctype="multipart/form-data" method="post" action="">
		<fieldset>
		<!-- Form Name -->
		<legend><?php echo $heading_label;?></legend>
		<?php
		if( isset($list) && sizeof($list) > 0 ) {?>
			<div class="control-group">
			  <label class="control-label" for="txt_inspection_name">Inspection Name</label>
			  <div class="controls">
				<input id="txt_inspection_name" name="txt_inspection_name" type="text" value="<?php echo $list[0][$field_inspection_name];?>" placeholder="Inspection Name" class="input-xlarge" required />
			  </div>
			</div>
			<?php 
			  if( $param ) {
			  ?>
				<div class="control-group">
				  <label class="control-label" for="cmb_inspection_name">Select Inspection</label>
				  <div class="controls">
					<select id="cmb_inspection_name" name="cmb_inspection_name[]" multiple />
					  <?php 
					  foreach( $row_inspections AS $val_inspection ) { 
						$inspection_id 	= $val_inspection['id'];
						$inspection_name= $val_inspection['st_inspection_name'];
						$selected 		= in_array($inspection_id,$arr_assigned_inspections) ? 'selected="selected"' : '';
						?>
						<option value="<?php echo $inspection_id;?>" <?php echo $selected;?>><?php echo $inspection_name;?></option>
					  <?php
					  }?>
					</select>
				  </div>
				</div>
			  <?php 
			  }?>
		
			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="">Select Icon</label>
			  <div class="controls">
				<input type="file" name="userfile" id="userfile" class="input-xlarge"/>
				<?php 
				if( isset($list[0]['st_icon_path']) && $list[0]['st_icon_path'] ) {?>
					<a title="Current Inspection Icon"><img class="w45 h40" src="<?php echo $list[0]['st_icon_path'];?>"></a>
					<?php
				}?>
				<span id="err_inspicon"></span>
			  </div>
			</div>
			
			<?php 
			if( is_dir(FCPATH."img/inspection-item-icons/") ) {
				$img_files = scandir(FCPATH."img/inspection-item-icons/");
				?>
				<div class="control-group">
					<label class="control-label">Existing Icons</label>
					<div class="controls">
						<div class="flexslider">
						<ul class="slides">
						<?php 
						$cnt_icons = 0;
						$arr_icons = array();
						foreach( $img_files AS $value ) {
							if( $value != "." && $value != ".." ) {
								$checked 	= '';
								$icon_path 	= $base."img/inspection-item-icons/".$value;
								$label_title= pathinfo($value);
								$label_title= $label_title['filename'];
								
								$current_icon = pathinfo($list[0]['st_icon_path']);
								$current_icon= $current_icon['filename'];
								
								if( $current_icon == $label_title ) {
									$checked = 'checked="checked"';
								}
								if( $icon_path ) {
									echo ($cnt_icons%2==2) ? '<div>' : '';
									?>
										<li>
										<label class="radio inline" title="<?php echo $label_title;?>"><input type="radio" name="rdb_inspection_icons" <?php echo $checked;?> value="<?php echo $icon_path;?>"/><img src="<?php echo $icon_path;?>"></label>
										</li>
									<?php 
									echo ($cnt_icons%2==2) ? '</div>' : '';
									$cnt_icons++;
								}
							}
						}?>
						</ul>
						</div>
					</div>
				</div>
				<?php
			}
		
			/*
			  $is_icon = 0;
			  if( isset($existing_icons) ) {
					foreach( $existing_icons AS $value ) {
						//echo $list[0]['st_icon_path'];
						if( $value['st_icon_path'] != $list[0]['st_icon_path'] ) {
							$value['st_icon_path'] ? $is_icon = 1 : '';
						}
					}
				}
				if( $is_icon == 1 ) {?>
				<div class="control-group">
					<label class="control-label">Existing Icons</label>
					<div class="controls">
						<?php 
						if( isset($existing_icons) ) {
							$cnt_icons = 0;
							$arr_icons = array();
							foreach( $existing_icons AS $value ) {
								$id 		= $value['id'];
								$icon_path 	= $value['st_icon_path'];
								if( $icon_path ) {
									if( !in_array($icon_path,$arr_icons) 
										&& $value['st_icon_path'] != $list[0]['st_icon_path'] ) {
										array_push($arr_icons, $icon_path);
										echo ($cnt_icons%2==2) ? '<div>' : '';
										?>
											<label class="radio inline">
												<input type="radio" name="rdb_inspection_icons" value="<?php echo $icon_path;?>"/>&nbsp;<img src="<?php echo $icon_path;?>" width="70" height="65">
											</label>
										<?php 
										echo ($cnt_icons%2==2) ? '</div>' : '';
										$cnt_icons++;
									}
								}
							}
						}?>
					</div>
				</div>
			<?php
			}
			*/
			?>
			
			<table align="center" id="id_tbl_inspection" width="100%">
			<?php 
			if( $sizeof_inspitems ) {
				$cntinspitem = 0;
				foreach( $rows_insp_items AS $key_insp_items => $val_insp_items ) {
					$new_rows_insp_items[$val_insp_items['id']][] = $val_insp_items;
				}?>
				<input type="hidden" name="hidn_inspection" id="hidn_inspection" value="<?php echo sizeof($new_rows_insp_items);?>">
				<?php 
				// common::pr($new_rows_insp_items);die;

				foreach( $new_rows_insp_items AS $key_insp_items => $val_insp_items ) {
					$cntinspitem++;
					$insp_item_id 	= $key_insp_items;
					$item_name 		= $val_insp_items[0]['st_item_name'];?>
					<tr id="id_tr_inspection<?php echo $cntinspitem;?>">
						<td>
							<a style="float:right;" href="javascript:void(0);" class="del-ajax-section" div-id="id_tr_inspection<?php echo $cntinspitem;?>" section-id="<?php echo $insp_item_id;?>" main-section-id="<?php echo $get_inspection_id;?>" section-name="inspection item" title="Delete Item">Delete Item</a>
							<!-- Text input-->

							<div id="id_main_regulation<?php echo $cntinspitem;?>">
								<div class="control-group">
								  <label class="control-label" for="txt_item">Item Name</label>
								  <div class="controls">
									<textarea id="txt_item<?php echo $cntinspitem;?>" style="margin:0;" name="txt_item[<?php echo $cntinspitem;?>]" maxlength="255" onkeyup="showRemainingChars('<?php echo $cntinspitem;?>',255,10,'txt_item');" placeholder="Item Name" class="content-editor"><?php echo $item_name;?></textarea>
									<div id="cnt_itemname<?php echo $cntinspitem;?>"></div>
								  </div>
								</div>
							<?php 
							$cntinspitemreg = 0;
							foreach( $val_insp_items AS $key_inspreg => $val_inspreg ) {
								$cntinspitemreg++;
								$insp_reg_no 	= isset($val_inspreg['st_regulation_number']) ? $val_inspreg['st_regulation_number'] : '';
								$insp_section 	= isset($val_inspreg['st_section']) ? $val_inspreg['st_section'] : '';
								$insp_subsection= isset($val_inspreg['st_subsection']) ? $val_inspreg['st_subsection'] : '';
								$insp_item 		= isset($val_inspreg['st_item']) ? $val_inspreg['st_item'] : '';
								$insp_subitem 	= isset($val_inspreg['st_subitem']) ? $val_inspreg['st_subitem'] : '';
								
								$id_itemreg = $cntinspitem.$cntinspitemreg;
								?>
								<div class="control-group">
								  <div class="controls">
									<?php $reg_no = $this->users->getMetaDataList("regulation_contents",'1','','st_regulation_number', 'st_regulation_number');?>
									<input type="text" placeholder="Regulation Number" value="<?php echo $insp_reg_no;?>" name="cmb_regulation_number[<?php echo $cntinspitem;?>][]" id="cmb_regulation_number<?php echo $cntinspitem;?>" list="cmb_regno_list<?php echo $cntinspitem;?>" onblur="getSection('cmb_regulation_number<?php echo $cntinspitem;?>','cmb_section_list<?php echo $cntinspitem;?>', '<?php echo $cntinspitem;?>');">
									<datalist id="cmb_regno_list<?php echo $cntinspitem;?>">
										<?php 
										foreach($reg_no AS $reg) {
											$selected = ($reg['st_regulation_number']==$insp_reg_no)?'selected="selected"':'';?>
											<option value="<?php echo $reg['st_regulation_number'];?>" <?php echo $selected;?>><?php echo $reg['st_regulation_number'];?></option>
											<?php 
										}?>
									</datalist>
								  </div>
								</div>
								<div class="control-group">
								  <div class="controls">
									<?php $section = $this->users->getMetaDataList("regulation_sections", 'st_regulation_number="'.$insp_reg_no.'"', 'ORDER BY 
													CAST(st_section AS UNSIGNED)=0, CAST(st_section AS UNSIGNED), LEFT(st_section,1), 
													CAST(MID(st_section,2) AS UNSIGNED),ABS(st_section)', 'st_section', 'st_section');?>
									<input type="text" placeholder="Section" value="<?php echo $insp_section;?>" name="cmb_section[<?php echo $cntinspitem;?>][]" id="cmb_section<?php echo $cntinspitem;?>" list="cmb_section_list<?php echo $cntinspitem;?>" onblur="getSubsection('cmb_section<?php echo $cntinspitem;?>','cmb_subsection_list<?php echo $cntinspitem;?>', '<?php echo $cntinspitem;?>');">
									<datalist id="cmb_section_list<?php echo $cntinspitem;?>">
										<?php 
										foreach($section AS $val_section) {
											if( $val_section['st_section'] ) {
												$selected = ($val_section['st_section']==$insp_section)?'selected="selected"':'';?>
												<option value="<?php echo $val_section['st_section'];?>" <?php echo $selected;?>>
													<?php echo $val_section['st_section'];?>
												</option>
											<?php 
											}
										}?>
									</datalist>
									
									<?php $subsection = $this->users->getMetaDataList("regulation_sections",
													'st_regulation_number="'.$insp_reg_no.'" AND st_section="'.$insp_section.'"'
													, 'ORDER BY 
													CAST(st_subsection AS UNSIGNED)=0, CAST(st_subsection AS UNSIGNED), LEFT(st_subsection,1), 
													CAST(MID(st_subsection,2) AS UNSIGNED),ABS(st_subsection)', 'st_subsection', 'st_subsection');?>
									<input type="text" placeholder="Sub Section" value="<?php echo $insp_subsection;?>" name="cmb_subsection[<?php echo $cntinspitem;?>][]" id="cmb_subsection<?php echo $cntinspitem;?>" list="cmb_subsection_list<?php echo $cntinspitem;?>" onblur="getItem('cmb_subsection<?php echo $cntinspitem;?>','cmb_item_list<?php echo $cntinspitem;?>', '<?php echo $cntinspitem;?>');">
									<datalist id="cmb_subsection_list<?php echo $cntinspitem;?>">
										<?php 
										foreach($subsection AS $val_subsec) {
											if( $val_subsec['st_subsection'] ) {
												$selected = ($val_subsec['st_subsection']==$insp_subsection)?'selected="selected"':'';?>
												<option value="<?php echo $val_subsec['st_subsection'];?>" <?php echo $selected;?>>
													<?php echo $val_subsec['st_subsection'];?>
												</option>
												<?php 
											}
										}?>
									</datalist>
								  </div>
								</div>
								<div class="control-group">
								  <div class="controls">
									<?php $item = $this->users->getMetaDataList("regulation_sections", 
													'st_regulation_number="'.$insp_reg_no.'" AND st_section="'.$insp_section.'"
													AND st_subsection="'.$insp_subsection.'"'
													, 'ORDER BY 
													CAST(st_item AS UNSIGNED)=0, CAST(st_item AS UNSIGNED), LEFT(st_item,1), 
													CAST(MID(st_item,2) AS UNSIGNED),ABS(st_item)','st_item', 'st_item');?>
									<input type="text" placeholder="Item" value="<?php echo $insp_item;?>" name="cmb_item[<?php echo $cntinspitem;?>][]" id="cmb_item<?php echo $cntinspitem;?>" list="cmb_item_list<?php echo $cntinspitem;?>" onblur="getSubitem('cmb_item<?php echo $cntinspitem;?>','cmb_subitem<?php echo $cntinspitem;?>', '<?php echo $cntinspitem;?>');">
									<datalist id="cmb_item_list<?php echo $cntinspitem;?>">
										<?php 
										foreach($item AS $val_item) {
											if( $val_item['st_item'] ) {
												$selected = ($val_item['st_item']==$insp_item)?'selected="selected"':'';?>
												<option value="<?php echo $val_item['st_item'];?>" <?php echo $selected;?>>
													<?php echo $val_item['st_item'];?>
												</option>
											<?php 
											}
										}?>
									</datalist>
									
									<?php $subitem = $this->users->getMetaDataList("regulation_sections",
													'st_regulation_number="'.$insp_reg_no.'" AND st_section="'.$insp_section.'"
													AND st_subsection="'.$insp_subsection.'" AND st_item="'.$insp_item.'"'
													, 'ORDER BY 
													CAST(st_subitem AS UNSIGNED)=0, CAST(st_subitem AS UNSIGNED), LEFT(st_subitem,1), 
													CAST(MID(st_subitem,2) AS UNSIGNED),ABS(st_subitem)','st_subitem', 'st_subitem');?>
									<input type="text" placeholder="Sub Item" value="<?php echo $insp_subitem;?>" name="cmb_subitemp[<?php echo $cntinspitem;?>][]" id="cmb_subitem<?php echo $cntinspitem;?>" list="cmb_subitem_list<?php echo $cntinspitem;?>">
									<datalist id="cmb_subitem_list<?php echo $cntinspitem;?>">										
										<?php 
										foreach($subitem AS $val_subitem) {
											if( $val_subitem['st_subitem'] ) {
												$selected = ($val_subitem['st_subitem']==$insp_subitem)?'selected="selected"':'';?>
												<option value="<?php echo $val_subitem['st_subitem'];?>" <?php echo $selected;?>>
													<?php echo $val_subitem['st_subitem'];?>
												</option>
											<?php 
											}
										}?>
									</datalist>
								  </div>
								</div>
								<?php 
							}?>
							</div>
							<input type="hidden" name="hidn_libreg<?php echo $cntinspitem;?>" id="hidn_libreg<?php echo $cntinspitem;?>" value="<?php echo $cntinspitemreg;?>">
							<div class="textright"><input type="button" class="btn btn-warning" value="Add New Regulation" onclick="javascript:addInspectionRegulationItem('<?php echo $cntinspitem;?>', '[new]');" /></div><br>
						</td>
					</tr>
					<script type="text/javascript">showRemainingChars('<?php echo $cntinspitem;?>',255,10,'txt_item');</script>
					<?php 
				}
				
			}?>
			</table>
			<input type="hidden" name="hidn_inspection" id="hidn_inspection" value="0">
			<div class="textright"><input type="button" class="btn btn-warning" value="Add New Item" onclick="javascript: addMoreInspectionItem(1);" /></div>

			<div class="control-group mart10">
			  <label class="control-label" for="cmb_language">Language</label>
			  <div class="controls">
				<select id="cmb_language" name="cmb_language" class="input-xlarge">
					<option value="">-select-</option>
					<?php
					$languages 	= $this->users->getMetaDataList('language');
					foreach($languages as $ln) {
						echo $selectd 	= ($ln['abbr']==$list[0]['st_language']) ? 'selected="selected"' : '';
						?>
						<option value="<?php echo $ln['abbr'];?>" <?php echo $selectd;?>><?php echo $ln['language'];?></option>
					<?php 
					}?>
				</select>
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="txt_price">Price</label>
			  <div class="controls">
				<input id="txt_price" name="txt_price" type="text" value="<?php echo $list[0]['in_price'];?>" placeholder="Price" class="input-xlarge textright"/>
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="txt_earning_points">Earning Points</label>
			  <div class="controls">
				<input id="txt_earning_points" name="txt_earning_points" type="text" value="<?php echo $list[0]['in_earning_points'];?>" placeholder="Earning Points" class="input-xlarge textright" />
			  </div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="cmb_creditsbuy">Credits for Buying</label>
			  <div class="controls">
				<input id="cmb_creditsbuy" name="cmb_creditsbuy" type="text" value="<?php echo $list[0]['in_credits_buy'];?>" placeholder="Credits for Buying" class="input-xlarge textright" />
			  </div>
			</div>
			<div class="control-group">
				<label class="control-label">Start Date</label>
				<div class="controls">
					<input id="startdate" name="cmb_date_start" type="text" value="<?php echo date("m/d/Y", strtotime($list[0]['date_inspection_start']));?>" placeholder="Start Date" class="input-xlarge datestamp"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">End Date</label>
				<div class="controls">
					<input id="enddate" name="cmb_date_end" type="text" value="<?php echo $list[0]['date_inspection_end']=="0000-00-00"?'':date("m/d/Y", strtotime($list[0]['date_inspection_end']));?>" placeholder="End Date" class="input-xlarge datestamp"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls">
					<?php  $checked = 'checked="checked"';?>
					<label class="radio inline"><input type="radio" name="cmb_status" value="1" <?php echo ($list[0]['status']==1) ? $checked : '';?>/>&nbsp;Active</label> 
					<label class="radio inline"><input type="radio" name="cmb_status" value="0" <?php echo ($list[0]['status']==0) ? $checked : '';?>/>&nbsp;Inactive</label>
				</div>
			</div>
			<div class="inline text-center">
				<input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
				<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/inspection'" />
			</div>
		<?php
		}
		else {
			echo "<h5>No data found.</h5>";
		}
		?>
		</fieldset>
		<input type="hidden" name="hidn_errmsg_duedilegence" id="hidn_errmsg_duedilegence" value="">
		</form>
    </div>

	<script type="text/javascript">	
		var img_inspicon = $("#userfile");
		var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
		$("#userfile").change(function () {
			if( img_inspicon.val()!='' && ($.inArray(img_inspicon.val().split('.').pop().toLowerCase(), fileExtension) == -1) ) {
				$('#err_inspicon').html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
				$('#err_inspicon').addClass("text-error");
				img_inspicon.focus();
				$error = 1;
			}
			else {
				$('#err_inspicon').html("");
			}
		});

		$('input[type=submit]').click(function(e){
			$errmsg_duedilegence = $("#hidn_errmsg_duedilegence").val();
			if( $errmsg_duedilegence != '' ) {
				alert( "Please check the Invalid value(s) selected" );
				$("#cmb_regulation_number11").focus();
				return false;
			}
			
			$error 		= 0;
			if( img_inspicon.val()!='' && ($.inArray(img_inspicon.val().split('.').pop().toLowerCase(), fileExtension) == -1) ) {
				$('#err_inspicon').html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
				$('#err_inspicon').addClass("text-error");
				img_inspicon.focus();
				$error = 1;
			}
			else {
				$('#err_inspicon').html("");
			}
            $('label').each(function(){
                if( $(this).hasClass('text-error') ) {
                    $error++;
				}
            });
			
			if( $error > 0 ) {
                e.preventDefault();
            }
        });
		
		$(document).ready(function () {
			$(".del-ajax-section").click(function() {
				var section_name = $(this).attr('section-name');
				if( confirm("Are you sure you want to delete this "+section_name+"?") ) {
					var section_id = $(this).attr('section-id');
					var div_id = $(this).attr('div-id');
					var main_section_id = $(this).attr('main-section-id');
					$.ajax({
						url: js_base_path+'ajax/ajaxDeleteSection',
						type: 'post', 
						data: 'id='+section_id+'&section='+section_name+'&sectionId='+main_section_id, 
						success: function(output) {
							deleteSection(div_id);
							return true;
						},
						error: function(errMsg) {
							alert( errMsg.responseText );
							return false;
						}
					});
				}
			});
			
			$(".datestamp").datepicker();
			
			$('.flexslider').flexslider({
				controlNav: false,
				prevText:"",
				nextText:"",
				animation: "slide",
				itemWidth: 1,
				minItems: 4,
				maxItems: 4,
				move: 4,
				animationLoop: false,
				reverse: false,
				slideshow: false
			});
			
			$('.frm-update-inspection').validate({
				rules: {
					'txt_inspection_name':{
						required:true
					}
				},
				messages: {
					'txt_inspection_name': {required:"Please enter Inspection Name."},
				},
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				unhighlight: function(element) {
					$(element).parent('div').removeClass("text-error");
				}
			});
		});
	</script>
</div>
<?php $this->load->view('footer_admin'); ?>