 <!--Start Library Category Filter -->
<style>
	.styled-select{	
		padding: 5px;
		font-size: 16px;
		line-height: 1;
		border:none;
		border-radius: 0;
		height: 34px;
		-webkit-appearance: none;
	}
	option:hover{box-shadow: 0 0 10px 100px #FF0000 inset;}
</style>
<form class="form-inline" method="post" id="filterfrm">
	<fieldset>
		<!--?php if($libtype!=4) {?-->
			<select id="industry_id" name="industry_id" class="styled-select bg-darker spannews1 fg-white">
				<option value="">-Industry-</option>
				<?php 
				$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
				foreach($industries as $in):
					if( "all" != strtolower($in['industryname']) ) {
						$selected = (isset($_POST['industry_id'])&&$_POST['industry_id']==$in['id'])?'selected="selected"':'';?>
						<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
						<?php 
					}
				endforeach;?>
			</select>
			<select id="section_id" name="section_id" class="styled-select bg-darker spannews1 fg-white">
				<option value="">-Sector-</option>
				<?php
				if(isset($_POST['industry_id']) && (int)$_POST['industry_id']>0) {
					$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $_POST['industry_id']);
					foreach($sections as $sc):
						if( "all" != strtolower($sc['sectionname']) ) {
							$selected = (isset($_POST['section_id'])&&$_POST['section_id']==$sc['id'])?'selected="selected"':'';?>
							<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
							<?php 
						}
					endforeach;
				}?>
			</select>
			<select id="trade_id" name="trade_id" class="styled-select bg-darker spannews1 fg-white">
				<option value="">-Trade-</option>
				<?php
				if(isset($_POST['industry_id']) && (int)$_POST['industry_id']>0 && isset($_POST['section_id']) && (int)$_POST['section_id']>0){
					$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $_POST['industry_id'], 'section_id', $_POST['section_id']);
					foreach($trades as $trd):
						if( "all" != strtolower($trd['tradename']) ) {
							$selected = (isset($_POST['trade_id'])&&$_POST['trade_id']==$trd['trade_id'])?'selected="selected"':'';?>
							<option value="<?php echo $trd['trade_id'];?>" <?php echo $selected;?>><?php echo $trd['tradename'];?></option>
							<?php 
						}
					endforeach;
				}?>
			</select>

		<?php 
		if($libtype!=4) {
			$curi = uri_string();?>
			<select name="status" class="spannews1 <?php if($curi!='admin/library'):?>hide<?php endif;?>">
				<option value="1">Active</option>
				<option value="0" <?php if(isset($_POST['status']) && $_POST['status']<1):?>selected="selected"<?php endif;?>>Inactive</option>
			</select>
			<?php
		}?>
		<input type="hidden" name="action" value="FILTER"/>
		<button type="submit" class="bg-red fg-white"><strong>Go!</strong></button>
	</fieldset>
</form>
<!-- end library filter -->
<script type="text/javascript">
	$(document).ready(function () {         
        $('#industry_id').change(function(){
            $industry_id = $(this).val();
			$('#trade_id').html("<option value=''>-select-</option>");
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#section_id").html(data);
            });
        });
        $('#section_id').change(function(){
            $industry_id = $('#industry_id').val();
            $section_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
                $("#trade_id").html(data);
            });
        }); 
        $('.pagination ul li a').click(function(){
            $('#filterfrm').attr('action', '?page='+$(this).attr('rel')).submit();
        })
    });
</script>