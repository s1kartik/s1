<?php 
$this->load->view('header_admin');
if( $param ) {
	$heading_label 	= "Customized Safety Talks";
}
else {
	$heading_label 	= "Safety Talks";
}
?>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
function addMoreSafetytalksItem()
{
	var s 	= parseInt( $('#hidn_safetytalks').val() );
	s 		= (s+1);

	$('#id_tbl_safetytalks').append('<tr id="id_tr_safetytalks'+s+'"></tr>');

	sectionAppend = '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_tr_safetytalks'+s+'"); title="Delete Item">Delete Item</a>';
	sectionAppend += '<div class="control-group">';
	sectionAppend += '<label class="control-label" for="txt_item">Item Name</label>';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<textarea id="txt_item'+s+'" name="txt_item[]" maxlength="255" onkeyup=showRemainingChars('+s+',255,10,"txt_item"); placeholder="Item Name" class="content-editor"></textarea><div id="cnt_itemname'+s+'"></div>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';

	$('#id_tr_safetytalks'+s).append( sectionAppend );

	showRemainingChars(s,255,10,"txt_item"+s);
	
	$('#hidn_safetytalks').val(s);
}

function addMoreSafetytalksImage()
{
	var cntImage 	= parseInt( $('#hidn_safetytalks_image').val() );
	cntImage = (cntImage+1);
	var imageAppend = '<div class="control-group" id="id_div_image_safety'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
	imageAppend += '<div class="controls"><input name="safetytalks_image[]" id="userfile_safety'+cntImage+'" type="file" class="input-xlarge"/>';
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
	videoAppend += '<div class="controls"><input name="safetytalks_video[]" placeholder="Type in Video" id="safety_video'+cntVideo+'" type="text" class="input-xlarge"/>';
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
	<form class="form-horizontal frm-new-safetytalks" method="post" enctype="multipart/form-data" action="">
		<fieldset>
		<!-- Form Name -->
		<legend><?php echo $heading_label;?></legend>
		<input type="hidden" name="hidn_safetytalks" id="hidn_safetytalks" value="1">

		<!-- Text input-->
		  <div class="control-group">  
			  <label class="control-label" for="txt_safetytalks_name">Safetytalks Topic</label>
			  <div class="controls">
				<input id="txt_safetytalks_name" name="txt_safetytalks_name" type="text" placeholder="Safetytalks Topic" class="input-xlarge" required />
			  </div>
		  </div>
		  <?php 
		  if( $param ) {
		  ?>
			<div class="control-group">
			  <label class="control-label" for="cmb_safetytalks_name">Select Safetytalks</label>
			  <div class="controls">
				<?php
				$row_safetytalks = $this->users->getMetaDataList('safetytalks','status=1 AND (date_safetytalks_end="0000-00-00" OR date_safetytalks_end>=CURDATE())','ORDER BY TRIM(st_safetytalks_topic)',' id,st_safetytalks_topic');
				?>
				<select id="cmb_safetytalks_name" name="cmb_safetytalks_name[]" multiple />
				  <?php 
				  foreach( $row_safetytalks AS $val_safetytalks ) { 
					$safetytalks_id = $val_safetytalks['id'];
					$safetytalks_name = $val_safetytalks['st_safetytalks_topic'];
					?>
					<option value="<?php echo $safetytalks_id;?>"><?php echo $safetytalks_name;?></option>
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
							$label_title= pathinfo($value);
							$label_title= $label_title['filename'];
							$icon_path 	= $base."img/safetytalks-item-icons/".$value;
							if( $icon_path ) {
								echo ($cnt_icons%2==2) ? '<div>' : '';
								?>
									<li>
									<label class="radio" title="<?php echo $label_title;?>"><input type="radio" name="rdb_safetytalks_icons" value="<?php echo $icon_path;?>"/><img src="<?php echo $icon_path;?>"></label>
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
		?>
		
		
		<?php
		if( !$is_custom ) {
			?>
			<!-- Text input-->
			<div id="id_safetytalks_image_bucket"></div>
			<input type="hidden" id="hidn_safetytalks_image" name="hidn_safetytalks_image" value="1">
			<div class="textright"><input type="button" class="btn btn-warning" value="Add New Image" onclick="javascript: addMoreSafetytalksImage(1);" /></div>
			<div id="id_safetytalks_video_bucket"></div>
			<input type="hidden" id="hidn_safetytalks_video" name="hidn_safetytalks_video" value="1">
			<div class="textright"><input type="button" class="btn btn-warning mart10" value="Add New Video" onclick="javascript: addMoreSafetytalksVideo(1);" /></div>
		
			<!-- Text input-->
			<table align="center" id="id_tbl_safetytalks" width="100%" class="mart10">
				<tr id="id_tr_safetytalks1">
					<td>
						<div class="control-group">
						  <label class="control-label" for="txt_item">Item Name</label>
						  <div class="controls">
							<textarea id="txt_item1" name="txt_item[]" maxlength="255" onkeyup="showRemainingChars(1,255,10,'txt_item');" placeholder="Item Name" class="content-editor"></textarea>
							<div id="cnt_itemname1"></div>
						  </div>
						</div>
					</td>
				</tr>
			</table>
			<div class="textright"><input type="button" class="btn btn-warning" value="Add New Item" onclick="javascript: addMoreSafetytalksItem(1);" /></div>
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
                        ?>
                	    <option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>
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
                        $sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $usermeta['industry_id']);
                        foreach($sections as $sc):
                        ?>
                	    <option value="<?php echo $sc['id'];?>"><?php echo $sc['sectionname'];?></option>
                        <?php endforeach;                       
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
                            $trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $usermeta['industry_id'], 'section_id', $usermeta['section_id']);                            
                            foreach($trades as $sc):
							?>
                	    <option value="<?php echo $sc['trade_id'];?>"><?php echo $sc['tradename'];?></option>
                        <?php endforeach;                       
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
		<div class="control-group">
			<label class="control-label">Start Date</label>
			<div class="controls">
				<input id="cmb_date_start" name="cmb_date_start" type="text" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo date("m/d/Y");?>" required/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">End Date</label>
			<div class="controls">
				<input id="cmb_date_end" name="cmb_date_end" type="text" placeholder="End Date" class="input-xlarge datestamp" value=""/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
				<?php 
				$checked = '';
				if(isset($rows_safetytalks['status'])) {
					if( $_POST['cmb_status'] == $rows_safetytalks['status'] ) {
						$checked = 'checked="checked"';
					}
				}
				?>
				<label class="radio inline"><input type="radio" name="cmb_status" value="1" <?php echo $checked;?>/>&nbsp;Active</label> 
				<label class="radio inline"><input type="radio" name="cmb_status" value="0" <?php echo (!$checked)?'checked="checked"':'';?>/>&nbsp;Inactive</label>
			</div>
		</div>

		<div class="textright mart10">
			<input type="submit" name="submit" value="Save" class="btn btn-primary" />
			<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/safetytalks?<?php echo $param;?>'" />
		</div>
		</fieldset>
    </form>
    </div>

	<script type="text/javascript">
		jQuery(window).load(function() {
			addMoreSafetytalksImage();
			addMoreSafetytalksVideo();
		});
		
		$is_custom = "<?php echo $is_custom;?>";
		if( !$is_custom ) {
			showRemainingChars(1,255,10,'txt_item');
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

			$(".datestamp").datepicker();

			$('.frm-new-safetytalks').validate({
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