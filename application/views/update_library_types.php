<?php $this->load->view('header_admin'); ?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach($_POST as $key=>$val) {
        $admin[$key] = $val;
	}
}
?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal" id="frm_upd_libtype" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>Library Type</legend>
	
	<div id="id_div_libtype_errors"></div>
	
	<?php
	$s1_libtype_selected 	= ("S1 Systems" == $admin['parent_library_type']) ? "checked" : "";
	$union_libtype_selected = ("S1 Systems" != $admin['parent_library_type']) ? "checked" : "";
	
	if( "S1 Systems" == $admin['parent_library_type'] ) {
		$s1_display 	= "style='display:block;'";
		$union_display 	= "style='display:none;'";
	}
	else if( "S1 Systems" != $admin['parent_library_type'] ) {
		$s1_display 	= "style='display:none;'";
		$union_display 	= "style='display:block;'";
	}
	?>	
	<div class="control-group">
		<label class="control-label" for="rdb_parent_libtype">Select Parent Library Type</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" id="rdb_parent_libtype" name="rdb_parent_libtype" value="s1" <?php echo $s1_libtype_selected;?> required />&nbsp;S1 Systems</label>
			<label class="radio inline"><input type="radio" id="rdb_parent_libtype" name="rdb_parent_libtype" <?php echo $union_libtype_selected;?> value="union" required />&nbsp;Unions</label>
		</div>
	</div>

	 <div class="control-group">
      <label class="control-label" id="lbl_parent_libtype" for="firstname">Parent Library Type</label>
	  <div class="controls">
		<select name="cmb_parent_s1_libtype[]" id="cmb_parent_s1_libtype" <?php echo $s1_display;?>>
			<option value="S1 Systems" <?php echo ($admin['parent_library_type']=="S1 Systems") ? 'selected="selected"' : '';?>>S1 Systems</option>
		</select>
	  </div>

      <div class="controls">
		<select name="cmb_parent_union_libtype[]" id="cmb_parent_union_libtype" multiple required <?php echo $union_display;?>>
			<?php 
			foreach( $rows_unions AS $val_unions ) {
				$union_training = $this->users->getMetaDataList('usermeta', 'user_id="'.$val_unions['id'].'" AND meta_key="union_training_centre"', '', 'meta_value');
				$union_training = isset($union_training[0]['meta_value']) ? $union_training[0]['meta_value'] : '';
				if( !$union_training ) {
					$selected = in_array($val_unions['id'], explode(",", $admin['parent_library_type']))?'selected="selected"':'';
					?>
					<option value="<?php echo $val_unions['id'];?>" <?php echo $selected;?>><?php echo $val_unions['nickname'];?></option>
					<?php
				}
			}?>
		</select>
      </div>
	 </div>

    <div class="control-group">
      <label class="control-label" for="firstname">Library Type Name</label>
      <div class="controls">
        <input id="librarytypename" name="librarytypename" type="text" placeholder="Library Type Name" class="input-xlarge" title="<?php echo isset($_POST['librarytypename'])?$_POST['librarytypename']:$admin['library_type'];?>" value="<?php echo isset($_POST['librarytypename'])?$_POST['librarytypename']:$admin['library_type'];?>" required />
		
        <?php 
		if(isset($update) && $update=='duplicated'):?>
            <label class="errormsg" for="email">This type name is already in use.</label>
        <?php endif;?>
      </div>
	 </div>
	  <div class="control-group">
		<label class="control-label">Status</label>
		<div class="controls">
			<label class="radio inline"><input type="radio" name="status" value="1" <?php if($admin['library_type_status']>0):?>checked="checked"<?php endif;?>/> Active</label> 
			<label class="radio inline"><input type="radio" name="status" value="0" <?php if($admin['library_type_status']<1):?>checked="checked"<?php endif;?>/> Inactive</label>
		</div>
	  </div> 
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="library_types" />
    <input type="hidden" name="field" value="library_type" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
     <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=library_types'" />
    </div>
    </fieldset>
    </form>
    </div>
	
	
    <script type="text/javascript">
	$(document).ready(function () {
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
            $initial_value = $(this).attr('title');
            if($initial_value!=$(this).val()){
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
            }else{
                obj.parent().children('label').remove();
            }   
        });

		$.validator.setDefaults({
			errorPlacement: function(error, element) {
				error.appendTo('#id_div_libtype_errors');
			}
		});
	   
		$('#frm_upd_libtype').validate({
			highlight: function(element) {
				$('#id_div_libtype_errors').addClass('fgred')
			}, 
			
			rules: {
				librarytypename: {
					required: true
				}, 
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
			}
		});
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>