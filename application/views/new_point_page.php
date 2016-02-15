<?php $this->load->view('header_admin'); ?>
<script type="text/javascript" src="<?php echo $base;?>js/reCopy.js"></script>
<div class="info-container">
    <div class="document-content">
		<form class="form-horizontal adminfrm" method="post">
			<fieldset>
				<!-- Form Name -->
				<legend>Points</legend>
				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" >Page Name</label>
				  <div class="controls"><input name="st_point_pagename" type="text" placeholder="Page Name" class="input-xlarge" required/></div>
				</div>

				<!-- Points -->	
				<div class="control-group">
				  <label class="control-label" >Points</label>
				  <div class="controls clone">
					<input name="point_id[]" type="text" value="" placeholder="Point Section" class="input-medium"/> 
					<input name="credits[]" type="text" value="" placeholder="Point Value" class="input-medium textright"/> 
				  </div>
				  <div align="right"><a href="#" rel=".clone" class="add" title="Add more Points Section in the specified Page">+Add More</a></div>
				</div>
				<div class="inline text-center">
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
					<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=point_page'" />
				</div>
			</fieldset>
		</form>
    </div>
	
    <script type="text/javascript">
    $(function(){
        var removeLink = ' <a class="remove-row martmi4" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="icon-remove-sign"></a>';
        $('a.add').relCopy({ append: removeLink}); 
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin'); ?>
<style>.clone{ margin-bottom: 10px;}</style>