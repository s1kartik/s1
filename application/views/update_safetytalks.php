<?php 
$this->load->view('header_admin');
$sizeof_safetyitems = isset($rows_safety_items) ? sizeof($rows_safety_items) : '';
if( $param ) {
	$heading_label 	= "Customized Safetytalks";
}
else {
	$heading_label 	= "Safetytalks";
}?>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
function addMoreInspItemForSafetytalks()
{
	var s 	= parseInt( $('#hidn_safetytalks').val() );
	s 		= (s+1);

	$('#id_tbl_safetytalks').append('<tr id="id_tr_safetytalks'+s+'"></tr>');

	sectionAppend = '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_tr_safetytalks'+s+'"); title="Delete Item">Delete Item</a>';
	sectionAppend += '<div class="control-group">';
	sectionAppend += '<label class="control-label" for="txt_item">Item Name</label>';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<textarea id="txt_item'+s+'" name="txt_item[new][]" onkeyup=showRemainingChars('+s+',255,10,"txt_item"); maxlength="255" placeholder="Item Name" class="content-editor"></textarea><div id="cnt_itemname'+s+'"></div>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';
	
	$('#id_tr_safetytalks'+s).append( sectionAppend );

	showRemainingChars(s,255,10,"txt_item");
	
	$('#hidn_safetytalks').val(s);
}

function addMoreSafetytalksImage()
{
	var cntImage 	= parseInt( $('#hidn_safetytalks_image').val() );
	cntImage = (cntImage+1);
	var imageAppend = '<div class="control-group" id="id_div_image_safety'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
	imageAppend += '<div class="controls"><input name="safetytalks_image[new][]" id="safetytalks_image'+cntImage+'" type="file" class="input-xlarge"/>';
	imageAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Image" onclick=javascript:deleteSection("id_div_image_safety'+cntImage+'");>Delete</a>';
	imageAppend += '</div></div>';
	
	$('#id_safetytalks_image_bucket').append( imageAppend );
	$('#hidn_safetytalks_image').val(cntImage);
}
function addMoreSafetytalksVideo()
{
	var cntVideo 	= parseInt( $('#hidn_safetytalks_video').val() );
	cntVideo = (cntVideo+1);
	var videoAppend = '<div class="control-group" id="id_div_video_safety'+cntVideo+'"><label class="control-label" for="video">Enter Video Link</label>';
	videoAppend += '<div class="controls"><input name="safetytalks_video[new][]" placeholder="Type in Video" id="safetytalks_video'+cntVideo+'" type="text" class="input-xlarge"/>';
	videoAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Video" onclick=javascript:deleteSection("id_div_video_safety'+cntVideo+'");>Delete</a>';
	videoAppend += '</div></div>';
	
	$('#id_safetytalks_video_bucket').append( videoAppend );
	$('#hidn_safetytalks_video').val( cntVideo );
}
</script>
<style>.flexslider .slides img {width: 75px; height: 74px; display: block;}</style>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<div class="info-container">
    <div class="document-content">
	<form class="form-horizontal frm-update-safetytalks" enctype="multipart/form-data" method="post" action="">
		<fieldset>
		<!-- Form Name -->
		<legend><?php echo $heading_label;?></legend>
		<?php
		if( isset($list) && sizeof($list) > 0 ) {
		?>
			<input type="hidden" name="hidn_safetytalks" id="hidn_safetytalks" value="<?php echo $sizeof_safetyitems;?>">
			
			<div class="control-group">
			  <label class="control-label" for="txt_safetytalks_name">Safetytalks Topic</label>
			  <div class="controls">
				<input id="txt_safetytalks_name" name="txt_safetytalks_name" type="text" value="<?php echo $list[0][$field_safetytalks_name];?>" placeholder="Safetytalks Topic" class="input-xlarge" required />
			  </div>
			</div>
			<?php 
			  if( $param ) {
			  ?>
				<div class="control-group">
				  <label class="control-label" for="cmb_safetytalks_name">Select Safetytalks</label>
				  <div class="controls">
					<select id="cmb_safetytalks_name" name="cmb_safetytalks_name[]" multiple />
					  <?php 
					  foreach( $row_safetytalks AS $val_safetytalks ) { 
						$safetytalks_id 	= $val_safetytalks['id'];
						$safetytalks_name= $val_safetytalks['st_safetytalks_topic'];
						$selected 		= in_array($safetytalks_id,$arr_assigned_safetytalks) ? 'selected="selected"' : '';
						?>
						<option value="<?php echo $safetytalks_id;?>" <?php echo $selected;?>><?php echo $safetytalks_name;?></option>
					  <?php
					  }?>
					</select>
				  </div>
				</div>
			  <?php 
			  }
			if( !$is_custom ) {
			?>
		
			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="">Select Icon</label>
			  <div class="controls">
				<input type="file" name="userfile" id="userfile" class="input-xlarge"/>
				<?php 
				if( isset($list[0]['st_icon_path']) && $list[0]['st_icon_path'] ) 
				{?>
					<a title="Current Inspection Icon"><img class="w45 h40" src="<?php echo $list[0]['st_icon_path'];?>"></a>
				<?php
				}?>
			  </div>
			</div>
			
			
			<?php 			
			if( is_dir(FCPATH."img/safetytalks-item-icons/") ) {
				$img_files = scandir(FCPATH."img/safetytalks-item-icons/");
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
								$icon_path 	= $base."img/safetytalks-item-icons/".$value;
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
										<label class="radio inline" title="<?php echo $label_title;?>"><input type="radio" name="rdb_safetytalks_icons" <?php echo $checked;?> value="<?php echo $icon_path;?>"/><img src="<?php echo $icon_path;?>"></label>
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
			}
			
			if( !$is_custom ) {?>
				<div id="id_safetytalks_image_bucket">
					<?php 
					// IMAGES //
						$safetytalks_img_vid	= $this->users->getMetaDataList( 'safetytalks_image_video', 'in_safetytalks_id="'.$get_safetytalks_id.'" AND in_status=1', '', 'id, in_safetytalks_image_video, st_safetytalks_image_video' );
						$cnt_safety_image = 0;
						if(sizeof($safetytalks_img_vid)>0) {
							foreach($safetytalks_img_vid as $val_img) {
								$is_safetytalks_imgorvid 	= isset($val_img['in_safetytalks_image_video'])  ? $val_img['in_safetytalks_image_video'] : '';
								if( $is_safetytalks_imgorvid == 1 ) {
									$id = isset($val_img['id'])  ? $val_img['id'] : '';
									$name_safetytalks_imgorvid 	= isset($val_img['st_safetytalks_image_video'])  ? $val_img['st_safetytalks_image_video'] : '';
									?>
									<div class="control-group" id="id_div_image_safety<?php echo ($cnt_safety_image+1);?>">
									  <label class="control-label" for="">Select Image</label>
									  <div class="controls">
										<input type="file" name="safetytalks_image[<?php echo $id;?>]" id="safetytalks_image<?php echo ($cnt_safety_image+1);?>" class="input-xlarge"/>
										<?php 
										if( file_exists(FCPATH.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid) ) { ?>
											<a title="Click to see full image" class="fancybox-media" href="<?php echo $base.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid;?>" data-fancybox-group="gallery">
											<img class="w45 h40" src="<?php echo $base.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid;?>">
											</a>
											<?php 
										}?>
										&nbsp;<a href="javascript:void(0);" class="del-ajax-section" title="Delete Image" div-id="id_div_image_safety<?php echo ($cnt_safety_image+1);?>" section-id='<?php echo $id;?>' main-section-id='<?php echo $get_safetytalks_id;?>' section-name='safetytalks image'>Delete</a>
									  </div>
									</div>
									<?php 
									$cnt_safety_image++;
								}
							}
						}?>
					</div><input type="hidden" id="hidn_safetytalks_image" name="hidn_safetytalks_image" value="<?php echo $cnt_safety_image;?>"><div class="textright"><input type="button" class="btn btn-warning" value="Add New Image" onclick="javascript: addMoreSafetytalksImage('<?php echo $cnt_safety_image;?>');" /></div>
					<br><div id="id_safetytalks_video_bucket">
						<?php
					// VIDEOS //
						$cnt_safety_video = 0;
						if(count($safetytalks_img_vid)>0) {
							foreach($safetytalks_img_vid as $val_video) {
								$is_safetytalks_imgorvid = isset($val_video['in_safetytalks_image_video'])  ? $val_video['in_safetytalks_image_video'] : '';
								if( $is_safetytalks_imgorvid == 2 ) {
									$id = isset($val_video['id'])  ? $val_video['id'] : '';
									$name_safetytalks_imgorvid = isset($val_video['st_safetytalks_image_video'])  ? $val_video['st_safetytalks_image_video'] : '';?>
									<div class="control-group" id="id_div_video_safety<?php echo ($cnt_safety_video+1);?>">
									  <label class="control-label" for="">Enter Video Link</label>
									  <div class="controls">
										<input id="safetytalks_video<?php echo $cnt_safety_video+1;?>" name="safetytalks_video[<?php echo $id;?>]" type="text" placeholder="Type in Video" class="input-xlarge" value="<?php echo $name_safetytalks_imgorvid;?>"/>
										<?php 
										if( $name_safetytalks_imgorvid ) {?>
											<a class="fancybox fancybox.iframe" href="<?php echo "https://www.youtube.com/embed/".$name_safetytalks_imgorvid;?>?autoplay=1">See Video</a>
											<?php 
										}?>
										&nbsp;<a href="javascript:void(0);" class="del-ajax-section" title="Delete Video" div-id="id_div_video_safety<?php echo ($cnt_safety_video+1);?>" section-id='<?php echo $id;?>' main-section-id='<?php echo $get_safetytalks_id;?>' section-name='safetytalks video'>Delete</a>
									  </div>
									</div>
									<?php 
									$cnt_safety_video++;
								}
							}
						}?>
					</div><input type="hidden" id="hidn_safetytalks_video" name="hidn_safetytalks_video" value="<?php echo $cnt_safety_video;?>"><div class="textright"><input type="button" class="btn btn-warning mart10" value="Add New Video" onclick="javascript:addMoreSafetytalksVideo('<?php echo $cnt_safety_video;?>');" /></div>
				
				
				<br><table align="center" id="id_tbl_safetytalks" width="100%" class="mart10">
				<?php 
				if( $sizeof_safetyitems ) {
					$cntitem = 0;
					foreach( $rows_safety_items AS $key_safety_items => $val_safety_items ) {
					$cntitem++;
					$safety_item_id 	= $val_safety_items['id'];
					?>
						<tr id="id_tr_safetytalks<?php echo $cntitem;?>">
							<td>
								<a style="float:right;" href="javascript:void(0);" class="del-ajax-section" div-id="id_tr_safetytalks<?php echo $cntitem;?>" section-id="<?php echo $safety_item_id;?>" main-section-id="<?php echo $get_safetytalks_id;?>" section-name="safetytalks item" title="Delete Item">Delete Item</a>
								<!-- Text input-->
								<div class="control-group">
								  <label class="control-label" for="txt_item">Item Name</label>
								  <div class="controls">
									<textarea id="txt_item<?php echo $cntitem;?>" name="txt_item[<?php echo $safety_item_id;?>]" maxlength="255" onkeyup="showRemainingChars('<?php echo $cntitem;?>',255,10,'txt_item');" placeholder="Item Name" class="content-editor"><?php echo $val_safety_items['st_item_name'];?></textarea>
									<div id="cnt_itemname<?php echo $cntitem;?>"></div>
								  </div>
								</div>
							</td>
						</tr>
						<script type="text/javascript">showRemainingChars('<?php echo $cntitem;?>',255,10,"txt_item");</script>
					<?php
					}
				}?>
				</table>
				
				<div class="textright"><input type="button" class="btn btn-warning" value="Add New Item" onclick="javascript: addMoreInspItemForSafetytalks(<?php echo $sizeof_safetyitems;?>);" /></div>
			<?php
			}
			
			
			if( $is_custom ) {
			?>
			<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="email">Industry</label>
				  <div class="controls">
							<select  id="industry_id" name="industry_id" class="input-xlarge" required>
							<option value="">-select-</option>
							<?php
								$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
								foreach($industries as $in):
								$selected = ($list[0]['in_industry_id']==$in['id'])?'selected="selected"':'';
							?>
							<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
							<?php endforeach;?>
						</select>
				  </div>
				</div>
			<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="nickname">Section</label>
				  <div class="controls">
						<select id="section_id" name="section_id" class="input-xlarge" required>
							<option value="">-select-</option>
							<?php
								if((int)$list[0]['in_section_id']>0){
								$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $list[0]['in_industry_id']);
								
								foreach($sections as $sc):
								$selected = ($list[0]['in_section_id']==$sc['id'])?'selected="selected"':'';
							?>
							<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
							<?php endforeach;                       
								}
							?>
						</select>
				  </div>
				</div>
			<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="firstname">Trade</label>
				  <div class="controls">
						<select  id="trade_id" name="trade_id" class="input-xlarge" required>
							<option value="">-select-</option>
							<?php
								if((int)$list[0]['in_industry_id']>0 && (int)$list[0]['in_section_id']>0){
								$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $list[0]['in_industry_id'], 'section_id', $list[0]['in_section_id']);
								
								foreach($trades as $sc):
								$selected = ($list[0]['in_trade_id']==$sc['trade_id'])?'selected="selected"':'';
							?>
							<option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
							<?php endforeach;                       
								}
							?>
						</select>
				  </div>
				</div>
			<?php
			}?>
		
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
			
			<div class="control-group">
				<label class="control-label">Start Date</label>
				<div class="controls">
					<input id="cmb_date_start" name="cmb_date_start" type="text" value="<?php echo $list[0]['date_safetytalks_start'];?>" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo date("m/d/Y");?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">End Date</label>
				<div class="controls">
					<input id="cmb_date_end" name="cmb_date_end" type="text" value="<?php echo $list[0]['date_safetytalks_end'];?>" placeholder="End Date" class="input-xlarge datestamp" value=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls">
					<?php 
					$checked = 'checked="checked"';
					?>
					<label class="radio inline"><input type="radio" name="cmb_status" value="1" <?php echo ($list[0]['status']==1) ? $checked : '';?>/>&nbsp;Active</label> 
					<label class="radio inline"><input type="radio" name="cmb_status" value="0" <?php echo ($list[0]['status']==0) ? $checked : '';?>/>&nbsp;Inactive</label>
				</div>
			</div>
			<div class="inline text-center">
				<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/safetytalks'" />
			</div>
		<?php
		}
		else {
			echo "<h5>No data found.</h5>";
		}
		?>
		</fieldset>
		</form>
    </div>

	<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
	<script type="text/javascript">
		var cnt_safety_image = "<?php echo $cnt_safety_image;?>";
		if( cnt_safety_image <= 0) {
			jQuery(window).load(function() {
				addMoreSafetytalksImage();
			});
		}
		
		var cnt_safety_video = "<?php echo $cnt_safety_video;?>";
		if( cnt_safety_video <= 0) {
			jQuery(window).load(function() {
				addMoreSafetytalksVideo();
			});
		}
		
		$('input[type=submit]').click(function(e){
			$error 		= 0;
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
			
			$('#industry_id').change(function(){
				$industry_id = $(this).val();
				$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
					$("#section_id").html(data);
				});
			});	
			$('#section_id').change(function(){
				$industry_id = $('#industry_id').val();
				$section_id = $('#section_id').val();
				$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
					$("#trade_id").html(data);
				});
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
			
			$('.frm-update-safetytalks').validate({
				rules: {
					'txt_safetytalks_name':{required:true}
				},
				messages: {
					'txt_safetytalks_name': {required:"Please enter Safetytalks Topic."},
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