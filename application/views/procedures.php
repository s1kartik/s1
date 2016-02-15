<?php $this->load->view('header_admin');
$procedure_name = (isset($rows_procedures['st_procedure_name'])&&$rows_procedures['st_procedure_name']) ? $rows_procedures['st_procedure_name'] : '';
$related_glossary = (isset($rows_procedures['in_related_glossary'])&&$rows_procedures['in_related_glossary']) ? $rows_procedures['in_related_glossary'] : '';
$language 		= (isset($rows_procedures['st_language'])&&$rows_procedures['st_language']) ? $rows_procedures['st_language'] : '';
$date_start 	= (isset($rows_procedures['dt_date_start'])&&$rows_procedures['dt_date_start']) ? $rows_procedures['dt_date_start'] : '';
$status 		= (isset($rows_procedures['status'])&&strlen($rows_procedures['status'])) ? $rows_procedures['status'] : '';
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_upd_procedures" method="post" action="">
    <fieldset>
    <legend>Procedures</legend>
    <div class="control-group">
      <label class="control-label" for="txt_procedure_name">Procedure Name</label>
      <div class="controls">
        <input id="txt_procedure_name" name="txt_procedure_name" type="text" required placeholder="Procedure Name" class="input-xlarge" value="<?php echo $procedure_name;?>" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">Language</label>
	  <div class="controls">
		<select id="cmb_language" name="cmb_language" placeholder="Select Language" class="input-xlarge" >
			<?php 
			$languages 		= $this->users->getMetaDataList('language');
			$rows_language 	= $this->users->getMetaDataList('language', 'abbr="'.$language.'"', '', 'abbr, language');
			$language_abbr	= $rows_language[0]['abbr'];
			foreach($languages as $in) {
				$selected = ($language_abbr==$in['abbr'])?'selected="selected"':'';?>
				<option value="<?php echo $in['abbr'];?>" <?php echo $selected;?>><?php echo $in['language'];?></option>
				<?php 
			}?>
		</select>
	  </div>
    </div>
    <!--sample for inserting glossary by Marcio in Feb-11-2015-->
    <div class="control-group">
	<label class="control-label">Related Glossary</label>
        <div class="controls">
            <div class="span6 pull-left metro">
				<?php 
				$rows_lib_contents 	= $this->users->getMetaDataList( 'library', "library_type_id=70 AND status=1", '', 'library_id AS id, title' );
				?>
				<select id="cmb_related_glossary" name="cmb_related_glossary" class="input-xlarge">
					<option value="">select</option>
					<?php 
					if( sizeof($rows_lib_contents) ) {
						$selected = '';
						foreach($rows_lib_contents as $key => $val) {
							$lib_id 	= $val['id'];
							$lib_title 	= $val['title'];
							if( isset($related_glossary) && $related_glossary ) {
								$selected 	= ($lib_id==$related_glossary) ? 'selected="selected"' : '';
							}?>
							<option value="<?php echo $lib_id;?>" title="<?php echo $lib_title;?>" <?php echo $selected;?>><?php echo $lib_title;?></option>
							<?php 
						}
					}
					else {?>
						<option value="" disabled>No data available</option>
					<?php 
					}?>
				</select>
			</div>
         </div>
	</div>
    <!--end sample for inserting glossary by Marcio in Feb-11-2015-->
	<div class="control-group">
		<label class="control-label">Created Date</label>
		<div class="controls">
		<input id="cmb_date_start" name="cmb_date_start" type="text" placeholder="Created Date" class="input-large datestamp" value="<?php echo $date_start;?>" >
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<?php $checked = 'checked="checked"';?>
			<label class="radio inline"><input type="radio" name="rdb_status" value="1" <?php echo ($status==1) ? $checked : '';?>/>&nbsp;Active</label> 
			<label class="radio inline"><input type="radio" name="rdb_status" value="0" <?php echo ($status==0) ? $checked : '';?>/>&nbsp;Inactive</label>
		</div>
	</div>
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/procedures_view'" />
    </div>
    </fieldset>
    </form>
    </div>

	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
	<script type="text/javascript">	
		$(document).ready(function () {
			$( ".datestamp" ).datepicker();
			
			$('#frm_upd_procedures').validate({
				highlight: function(element) {
					$(element).parent('div').addClass("text-error");
				},
				rules: {
					
				},
				messages: {
					txt_procedure_name: "Please enter Procedure Name"
				}
			});
		});
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>