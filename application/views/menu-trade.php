<div id="equip-sort" class="profile-content-box">
  <h4>Select your trade:</h4><select id="equip-drop-down">
	<option value="">- Select -</option>
	<option value="<?php echo $base;?>admin/construction" <?php echo ($this->router->method=='construction') ? 'selected' : '';?>>Construction</option>
	<option value="<?php echo $base;?>admin/nurse" <?php echo ($this->router->method=='nurse') ? 'selected' : '';?>>Nurse</option>
	<option value="<?php echo $base;?>admin/firefighter" <?php echo ($this->router->method=='firefighter') ? 'selected' : '';?>>Firefighter</option>
	<option value="<?php echo $base;?>admin/hockey" <?php echo ($this->router->method=='hockey') ? 'selected' : '';?>>Hockey</option>
  </select>
</div>