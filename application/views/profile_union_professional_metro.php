<?php 
(isset($union))?$user=$union:'';
(isset($unionmeta))?$usermeta=$unionmeta:'';
?>
<script type="text/javascript" src="<?php echo $base;?>js/reCopy.js"></script>
<form class="form-horizontal adminfrm" method="post" action="<?php echo $base;?>admin/profile_setting?section=professional">
<!-- Form Name -->
<div class="control-group">
  <label class="control-label" for="industry_id">Industry</label>
  <div class="controls">
		<select  id="industry_id" name="industry_id" class="input-xlarge" required>
			<option value="">-select-</option>
			<?php
			$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
			foreach($industries as $in):
			$selected = ($usermeta['industry_id']==$in['id'])?'selected="selected"':'';
			?>
			<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
			<?php endforeach;?>
		</select>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="branch">Headquarters/Branch</label>
  <div class="controls">
    <select id="branch" name="branch" placeholder="Headquarters/Branch" class="input-xlarge">
	    <option>Select One</option>
	    <option <?php if(isset($usermeta['branch']) && $usermeta['branch']=="Headquarters"):?>selected="selected"<?php endif;?>>Headquarter</option>
	     <option <?php if(isset($usermeta['branch']) && $usermeta['branch']=="Branch"):?>selected="selected"<?php endif;?>>Branch</option>
    </select>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="headquarters_name">Headquartes Name</label>
  <div class="controls">
    <input id="headquarters_name" name="headquarters_name" type="text" placeholder="Headquarters" class="input-xlarge" value="<?php echo isset($usermeta['headquarters_name'])?$usermeta['headquarters_name']:"";?>"/>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="member_number"># of Members</label>
  <div class="controls">
    <input id="member_number" name="member_number" type="text" placeholder="# of Members" class="input-xlarge" value="<?php echo isset($usermeta['member_number'])?$usermeta['member_number']:"";?>"/>
  </div>
</div>
<!--board list -->
<div class="control-group">
  <label class="control-label" for="">Board of Directors</label>
</div>
<div class="control-group" id="boardlist">
  <?php 
  if( isset($boards) ) {
  foreach($boards as $bd):?>
  <div> 
    <input name="title[<?php echo $bd['id'];?>]" type="text" value="<?php echo $bd['title'];?>" placeholder="Title" class="textname"/> 
    <input name="firstname[<?php echo $bd['id'];?>]" type="text" value="<?php echo $bd['firstname'];?>" placeholder="FirstName" class="textname"/> 
    <input name="lastname[<?php echo $bd['id'];?>]" type="text" value="<?php echo $bd['lastname'];?>" placeholder="LastName" class="textname"/> 
    <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="icon-remove-sign"></i></a>
  </div>     
  <?php endforeach;
  }
  ?>
  <div class="clone">
    <input name="title[]" type="text" value="" placeholder="Title" class="textname"/> 
    <input name="firstname[]" type="text" value="" placeholder="FirstName" class="textname"/> 
    <input name="lastname[]" type="text" value="" placeholder="LastName" class="textname"/> 
  </div>
  <p><a href="#" class="add" rel=".clone">Add More</a></p>
</div>

<div class="inline text-center">
<button class="btn btn-primary"><?php if(isset($rel)):?>Finished<?php else:?>Save<?php endif;?></button>
<input type="hidden" name="page" value="professional"/>
<input type="hidden" name="page_design" value="metro"/>
</div>
</form>
<script type="text/javascript">
$(function(){
    var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false"><i class="icon-remove-sign"></i></a>';
    $('a.add').relCopy({ append: removeLink}); 
});
</script>