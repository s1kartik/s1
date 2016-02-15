<?php $this->load->view('header_admin');
$heading_label = ($param) ? "Customized Inspection" : "Inspection";?>
<style>.flexslider .slides img {width: 75px; height: 74px; display: block;}</style>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<div class="info-container">
    <div class="document-content">
	<form class="form-horizontal frm-new-inspection" method="post" enctype="multipart/form-data" action="">
		<fieldset>
		<!-- Form Name -->
		<legend><?php echo $heading_label;?></legend>
		<input type="hidden" name="hidn_inspection" id="hidn_inspection" value="1">

		<!-- Text input-->
		  <div class="control-group">  
			  <label class="control-label" for="txt_inspection_name">Inspection Name</label>
			  <div class="controls">
				<input id="txt_inspection_name" name="txt_inspection_name" type="text" placeholder="Inspection Name" class="input-xlarge" required />
			  </div>
		  </div>
		  <?php 
		  if( $param ) {?>
			<div class="control-group">
			  <label class="control-label" for="cmb_inspection_name">Select Inspection</label>
			  <div class="controls">
				<?php
				$row_inspections = $this->users->getMetaDataList('inspection','status=1 AND (date_inspection_end="0000-00-00" OR date_inspection_end>=CURDATE())', 'ORDER BY TRIM(st_inspection_name)',' id,st_inspection_name');?>
				<select id="cmb_inspection_name" name="cmb_inspection_name[]" multiple />
				  <?php 
				  foreach( $row_inspections AS $val_inspection ) { 
					$inspection_id = $val_inspection['id'];
					$inspection_name = $val_inspection['st_inspection_name'];
					?>
					<option value="<?php echo $inspection_id;?>"><?php echo $inspection_name;?></option>
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
							$label_title= pathinfo($value);
							$label_title= $label_title['filename'];
							$icon_path 	= $base."img/inspection-item-icons/".$value;
							if( $icon_path ) {
								echo ($cnt_icons%2==2) ? '<div>' : '';
								?>
									<li>
									<label class="radio" title="<?php echo $label_title;?>"><input type="radio" name="rdb_inspection_icons" value="<?php echo $icon_path;?>"/><img src="<?php echo $icon_path;?>"></label>
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
					$icon_path 	= $value['st_icon_path'];
					$icon_path ? $is_icon = 1 : '';
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
								if( !in_array($icon_path,$arr_icons) ) {
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
		
		<!-- Text input-->
		<table align="center" id="id_tbl_inspection" width="100%">
			<tr id="id_tr_inspection1">
				<td>
					<div class="control-group">
					  <label class="control-label" for="txt_item">Item Name</label>
					  <div class="controls">
						<textarea id="txt_item1" name="txt_item[]" maxlength="255" onkeyup="showRemainingChars(1,255,10,'txt_item');" placeholder="Item Name" style="margin:0;" class="content-editor"></textarea>
						<div id="cnt_itemname1"></div>
					  </div>
					</div>
					<div id="id_main_regulation1">
						<div class="control-group">
						  <div class="controls">
							<input type="text" value="" placeholder="Regulation Number" name="cmb_section[]" id="cmb_regulation_number11" list="cmb_regno_list11" onblur="getSection('cmb_regulation_number11','cmb_section_list11',1);">
							<datalist id="cmb_regno_list11"></datalist>
						  </div>
						</div>
						<div class="control-group">
						  <div class="controls">
							<input type="text" value="" placeholder="Section" name="cmb_section[]" id="cmb_section11" list="cmb_section_list11" onblur="getSubsection('cmb_section11','cmb_subsection_list11',11);">
							<datalist id="cmb_section_list11"></datalist>
							<input type="text" value="" placeholder="Sub Section" name="cmb_subsection[]" id="cmb_subsection11" list="cmb_subsection_list11" onblur="getItem('cmb_subsection11','cmb_item_list11',11);">
							<datalist id="cmb_subsection_list11"></datalist>
						  </div>
						</div>
						<div class="control-group">
						  <div class="controls">
							<input type="text" value="" placeholder="Item" name="cmb_item[]" id="cmb_item11" list="cmb_item_list11" onblur="getSubitem('cmb_item11','cmb_subitem_list11',11);">
							<datalist id="cmb_item_list11"></datalist>									
							<input type="text" value="" placeholder="Sub Item" name="cmb_subitem[]" id="cmb_subitem11" list="cmb_subitem_list11">
							<datalist id="cmb_subitem_list11"></datalist>
						  </div>
						</div>
					</div>
					<div class="textright"><input type="button" class="btn btn-warning" value="Add New Regulation" onclick="javascript:addInspectionRegulationItem(1);" /></div><br>
					<input type="hidden" name="hidn_libreg1" id="hidn_libreg1" value="1">
				</td>				
			</tr>
		</table>
		<div class="textright"><input type="button" class="btn btn-warning" value="Add New Item" onclick="javascript:addMoreInspectionItem();" /></div>

		
		<div class="control-group mart10">
		  <label class="control-label" for="cmb_language">Language</label>
		  <div class="controls">
			<select id="cmb_language" name="cmb_language" class="input-xlarge">
				<option value="">-select-</option>
				<?php
				$languages = $this->users->getMetaDataList('language');
				foreach($languages as $ln) {
					$selected = ($ln['abbr']=='EN') ? 'selected="selected"' : '';
					?>
					<option value="<?php echo $ln['abbr'];?>" <?php echo $selected;?>><?php echo $ln['language'];?></option>
				<?php 
				}?>
			</select>
		  </div>
		</div>

		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_price">Price</label>
		  <div class="controls">
			<input id="txt_price" name="txt_price" type="text" placeholder="Price" class="input-xlarge textright"/>
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="txt_earning_points">Earning Points</label>
		  <div class="controls">
			<input id="txt_earning_points" name="txt_earning_points" type="text" placeholder="Earning Points" class="input-xlarge textright" />
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="control-group">
		  <label class="control-label" for="cmb_creditsbuy">Credits for Buying</label>
		  <div class="controls">
			<input id="cmb_creditsbuy" name="cmb_creditsbuy" type="text" placeholder="Credits for Buying" class="input-xlarge textright" />
		  </div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Start Date</label>
			<div class="controls">
				<input id="startdate" name="cmb_date_start" type="text" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo date("m/d/Y");?>" required/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">End Date</label>
			<div class="controls">
				<input id="enddate" name="cmb_date_end" type="text" placeholder="End Date" class="input-xlarge datestamp" value=""/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<?php 
				$checked = '';
				if(isset($rows_inspection['status'])) {
					if( $_POST['cmb_status'] == $rows_inspection['status'] ) {
						$checked = 'checked="checked"';
					}
				}
				?>
				<label class="radio inline"><input type="radio" name="cmb_status" value="1" <?php echo $checked;?>/>&nbsp;Active</label> 
				<label class="radio inline"><input type="radio" name="cmb_status" value="0" <?php echo (!$checked)?'checked="checked"':'';?>/>&nbsp;Inactive</label>
			</div>
		</div>
		<div class="textright mart10">
			<input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
			<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/inspection?<?php echo $param;?>'" />
		</div>
		</fieldset>
		<input type="hidden" name="hidn_errmsg_duedilegence" id="hidn_errmsg_duedilegence" value="">
    </form>
    </div>

	<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
	<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
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
	
		showRemainingChars(1,255,10,'txt_item');
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
			if( $error > 0 ) { e.preventDefault(); }
        });
		
		$(document).ready(function () {
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
			getRegulationNumber('cmb_regno_list11');
			$(".datestamp").datepicker();
			
			$('.frm-new-inspection').validate({
				rules: {
					'txt_inspection_name':{required:true}
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