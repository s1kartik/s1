<?php $this->load->view('header_admin');?>
<div class="info-container">
    <div class="document-content">
     <form class="form-horizontal" id="frm_add_libtype" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Library Type</legend>
	
	<div id="id_div_libtype_errors"></div>
	
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="rdb_parent_libtype">Select Parent Library</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="rdb_parent_libtype" name="rdb_parent_libtype" value="s1" required />&nbsp;S1 Systems</label>
				<label class="radio inline"><input type="radio" id="rdb_parent_libtype" name="rdb_parent_libtype" value="union" required />&nbsp;Unions</label>
			</div>
		</div>

	 <div class="control-group">
      <label class="control-label" id="lbl_parent_libtype" for="cmb_parent_libtype">Parent Library</label>
      <div class="controls">
		<select name="cmb_parent_s1_libtype[]" id="cmb_parent_s1_libtype">
			<option value="S1 Systems">S1 Systems</option>
		</select>
	  </div>

	  <div class="controls">
		<select name="cmb_parent_union_libtype[]" id="cmb_parent_union_libtype" multiple required>
			<?php 
			foreach( $rows_unions AS $val_unions ) {
				$union_training = $this->users->getMetaDataList('usermeta', 'user_id="'.$val_unions['id'].'" AND meta_key="union_training_centre"', '', 'meta_value');
				$union_training = isset($union_training[0]['meta_value']) ? $union_training[0]['meta_value'] : '';
				if( !$union_training ) {
					?>
					<option value="<?php echo $val_unions['id'];?>"><?php echo $val_unions['nickname'];?></option>
					<?php
				}
			}?>
		</select>
      </div>
	 </div>
	 
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="firstname">Library Type Name</label>
      <div class="controls">
        <input id="librarytypename" name="librarytypename" type="text" placeholder="Library Type Name" class="input-xlarge" required />
      </div>
    </div>
	
    <div class="inline text-center">
		<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=library_types'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
		$(document).ready(function () {
			$("#lbl_parent_libtype").hide();
			$("#cmb_parent_s1_libtype").hide();
			$("#cmb_parent_union_libtype").hide();
			
			$('input[name=rdb_parent_libtype]').change(function(){
				var rdb_val = $(this).val();
				(rdb_val) ? $("#lbl_parent_libtype").show() : $("#lbl_parent_libtype").hide();
				if( rdb_val == 's1' ) {
					$("#cmb_parent_s1_libtype").show();
					$("#cmb_parent_union_libtype").hide();
				}
				else if( rdb_val == 'union' ) {
					$("#cmb_parent_s1_libtype").hide();
					$("#cmb_parent_union_libtype").show();
				}
			});
			
			$('input[name=librarytypename]').change(function(){
				obj = $(this);
				$.post(
						'<?php echo $base;?>admin/validateLibraryType',
						{'librarytypename': $(this).val()},
						function(data) {
							if(data=='false'){
								if(obj.parent().children('label').size()<1)
									obj.parent().append('<label class="fgred" for="email">This type name is already in use.</label>')
							}else{
								obj.parent().children('label').remove();
							}
						}
				);   
			}); 


			$.validator.setDefaults({
				errorPlacement: function(error, element) {
					error.appendTo('#id_div_libtype_errors');
				}
			});
		   
			$('#frm_add_libtype').validate({
				highlight: function(element) {
					$('#id_div_libtype_errors').addClass('fgred')
				}, 
				
				rules: {
					librarytypename: {
						required: true
					} , 
					rdb_parent_libtype: {
						required: true
					}, 
					'cmb_parent_union_libtype[]': {
						required: true
					}
				},
				messages: {
					librarytypename: {
						required: "Please enter Library Type Name."
					}, 
					rdb_parent_libtype: {
						required: "Please select atleast 1 Parent Library"
					}, 
					'cmb_parent_union_libtype[]': {
						required: "Please select atleast 1 Union Parent Library"
					}
				},	
			});
		});
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>