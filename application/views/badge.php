<?php $this->load->view('header_admin');
$badge_title 	= (isset($badges['st_badge_title']) && $badges['st_badge_title']) ? $badges['st_badge_title'] : '';
$badge_description 	= (isset($badges['st_badge_description']) && $badges['st_badge_description']) ? $badges['st_badge_description'] : '';
$badge_image 	= (isset($badges['st_badge_image']) && $badges['st_badge_image']) ? $badges['st_badge_image'] : '';
$badge_industry = (isset($badges['in_industry_id']) && $badges['in_industry_id']) ? $badges['in_industry_id'] : '';
$badge_sector 	= (isset($badges['in_sector_id']) && $badges['in_sector_id']) ? $badges['in_sector_id'] : '';
$badge_trade 	= (isset($badges['in_trade_id']) && $badges['in_trade_id']) ? $badges['in_trade_id'] : '';
$badge_status 	= (isset($badges['in_status']) && $badges['in_status']) ? $badges['in_status'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_upd_badge" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <legend>D.R.O.T</legend>
    <div class="control-group">
      <label class="control-label" for="txt_badge_title">D.R.O.T Title</label>
      <div class="controls">
        <input id="txt_badge_title" name="txt_badge_title" type="text" placeholder="D.R.O.T Title" class="input-xlarge" value="<?php echo $badge_title;?>" required />
      </div>
    </div>
	
	<div class="control-group">
      <label class="control-label" for="txt_badge_title">D.R.O.T Description</label>
      <div class="controls">
		<textarea id="txtarea_badge_description1" style="margin:0;" name="txtarea_badge_description" maxlength="200" onkeyup="showRemainingChars(1,200,10,'txtarea_badge_description');" placeholder="(MAX OF 200 CHARACTERS)" class="content-editor"><?php echo $badge_description;?></textarea>
		<div id="cnt_itemname1"></div>
	  </div>
	</div>
	
	<div id="cnt_prdesc1"></div>
	<div class="control-group">
	  <label class="control-label" for="email">Industry</label>
	  <div class="controls ui-widget">
		<select id="cmb_industry" name="cmb_industry" class="styled-select bg-darker span4 fg-white">
			<option value="">-Industry-</option>
			<?php 
			$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
			foreach($industries as $in) {
				$selected = (isset($badge_industry)&&$badge_industry==$in['id'])?'selected="selected"':'';?>
				<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
				<?php 
			}?>
		</select>
	  </div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="nickname">Sector</label>
	  <div class="controls ui-widget">
		<select id="cmb_sector" name="cmb_sector" class="styled-select bg-darker span4 fg-white">
			<option value="">-Sector-</option>
			<?php 
			$sectors = $this->users->getRelatedElement('tbl_section', 'industry_id', $badge_industry);
			foreach($sectors as $sc) {
				$selected = (isset($badge_sector)&&$badge_sector==$sc['id'])?'selected="selected"':'';?>
				<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
				<?php
			}?>
		</select>
	  </div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	  <label class="control-label" for="firstname">Trade</label>
	  <div class="controls ui-widget">
		<select id="cmb_trade" name="cmb_trade" class="styled-select bg-darker span4 fg-white">
			<option value="">-Trade-</option>
			<?php 
			$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $badge_industry, 'section_id', $badge_sector);
			foreach($trades as $sc) {
				$selected = (isset($badge_trade)&&$badge_trade==$sc['trade_id'])?'selected="selected"':'';?>
				<option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
				<?php 
				}
			?>
		</select>
	  </div>
	</div>
	
	<?php 
	if( is_dir(FCPATH."img/badges/") ) {
		$img_files = scandir(FCPATH."img/badges/");
		?>
		<div class="control-group">
			<label class="control-label">Select D.R.O.T Image</label>
			<div class="controls">
				<div class="flexslider">
				<ul class="slides">
					<?php 
					$cnt_icons = 0;
					$arr_icons = array();
					foreach( $img_files AS $value ) {
						if( $value != "." && $value != ".." && $value!='buy_badge.png' ) {
							$checked 	= '';
							$label_title= pathinfo($value);
							$label_title= $label_title['filename'];
							$icon_path 	= $base."img/badges/".$value;

							if( $badge_image == $value ) {
								$checked = 'checked="checked"';
							}
								
							if( $icon_path ) {
								echo ($cnt_icons%2==2) ? '<div>' : '';?>
								<li>
								<label class="radio" title="<?php echo $label_title;?>"><input type="radio" name="rdb_badge_image" <?php echo $checked;?> value="<?php echo $value;?>"/>
									<img src="<?php echo $icon_path;?>">
								</label>
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
	}?>
	

	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="rdb_badge_status" value="1" <?php echo ($badge_status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="rdb_badge_status" value="0" <?php echo ($badge_status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=badge'" />
    </div>
    </fieldset>
    </form>
    </div>
</div>    
<?php $this->load->view('footer_admin'); ?>
<style>.flexslider .slides img {width: 130px; height: 115px; display: block;}</style>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#cmb_industry').change(function(){
            $industry_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#cmb_sector").html(data);
            });
        });
        $('#cmb_sector').change(function(){
            $industry_id = $('#cmb_industry').val();
            $section_id = $('#cmb_sector').val();
            $.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
                $("#cmb_trade").html(data);
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
			
		$('#frm_upd_badge').validate({
			highlight: function(element) {
				$(element).parent('div').addClass("text-error");
			},
			rules: {
				txt_badge_title: {required: true}
			},
			messages: {
				txt_badge_title: {required: "Please enter D.R.O.T Title"}
			}
		});
	});
</script>   