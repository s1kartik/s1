<?php $this->load->view('header_admin'); ?>
<div class="info-container">
<div class="document-content">
<form class="form-horizontal" method="post">

<!-- Form Name -->
<legend>Student Professional Information</legend>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lastname">Educational Institution Name</label>
  <div class="controls">
                <select id="company" name="company" placeholder="Institution Name" class="input-xlarge required">
                    <option value="0"></option>
                    <?php 
                        $employers = $this->users->getEmployers();
                        foreach($employers as $em):
                            $selected = (isset($usermeta['company']) && $usermeta['company']==$em['user_id'])?'selected="selected"':'';
                    ?>
                        <option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
                    <?php endforeach;?>
                </select>
  </div>
</div>
<div class="inline text-center">
<button class="btn btn-primary">Save</button>
<button class="btn btn-danger">Cancel</button>
<input type="hidden" name="page" value="professional"/>
</div>

</form>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>