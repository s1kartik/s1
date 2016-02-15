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
      <div class="controls">
        <input  name="st_point_pagename" type="text" placeholder="Page Name" class="input-xlarge" value="<?php echo $admin['st_point_pagename'];?>" required/>
      </div>
    </div>
    <!--points-->
    <div class="control-group">
      <label class="control-label" >Points</label>
      <?php 
        $points = $this->points->getPagePointsByPageID( $admin['id'] );
        foreach($points as $bd) {?>
			<div class="controls pointlist"> 
				<input name="point_id[<?php echo $bd['in_pointpage_section_id'];?>]" type="text" value="<?php echo $bd['st_pointpage_section_name'];?>" placeholder="Point Section" class="input"/> 
				<input name="credits[<?php echo $bd['in_pointpage_section_id'];?>]" type="text" value="<?php echo $bd['in_credits'];?>" placeholder="Point Value" class="input-medium textright"/>  
				<a class="remove-row martmi4" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="icon-remove-sign"></i></a>
			</div>
		<?php 
		}?> 
           
      <div class="controls clone">
        <input name="point_id[new][]" type="text" value="" placeholder="Point Section" class="input"/> 
        <input name="credits[new][]" type="text" value="" placeholder="Point Value" class="input-medium textright"/> 
      </div>
	  <div align="right">
	  <a href="#" rel=".clone" class="add" title="Add more Points Section in the specified Page">[Add More]</a>
	  </div>
    </div>

    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['id'];?>" />
    <input type="hidden" name="type" value="point_page" />
    <input type="hidden" name="field" value="st_point_pagename" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=point_page'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
    $(function(){
        var removeLink = ' <a class="remove-row martmi4" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="icon-remove-sign"></i></a>';
        $('a.add').relCopy({ append: removeLink}); 
    });
    </script>   
</div>    
<?php $this->load->view('footer_admin');?>
<style>.clone, .pointlist{margin-bottom: 10px;}</style>