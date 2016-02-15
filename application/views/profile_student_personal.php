<?php $this->load->view('header_admin'); ?>

<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>

<?php if(isset($textmsg)):?>
<div class="alert alert-block alert-error fade in">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <?php echo $textmsg;?>
</div>
<?php endif;?>
<div class="info-container">
    <div class="document-content">
        <form class="form-horizontal adminfrm" method="post" enctype="multipart/form-data" action="<?php echo $base;?>admin/profile_setting?section=personal">
            
            <!-- Form Name -->
                <legend>Student Personal Information</legend>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="nickname">Nickname</label>
                    <div class="controls">
                        <input id="nickname" name="nickname" type="text" placeholder="nickname" class="input-xlarge" value="<?php echo $user['nickname'];?>" required/>
                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="firstname">First Name</label>
                  <div class="controls">
                    <input id="firstname" name="firstname" type="text" placeholder="First Name" class="input-xlarge" value="<?php echo $user['firstname'];?>" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="lastname">Last Name</label>
                  <div class="controls">
                    <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="input-xlarge" value="<?php echo $user['lastname'];?>" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="street_number">Street #</label>
                  <div class="controls">
                    <input id="street_number" name="street_number" type="text" placeholder="Street #" value="<?php echo isset($usermeta['street_number'])?$usermeta['street_number']:"";?>" class="input-xlarge" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="street">Street Name</label>
                  <div class="controls">
                    <input id="street" name="street" type="text" placeholder="Street Name" class="input-xlarge" value="<?php echo isset($usermeta['street'])?$usermeta['street']:"";?>" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="apt_number">Unit/Apt</label>
                  <div class="controls">
                    <input id="apt_number" name="apt_number" type="text" placeholder="Unit/Apt" class="input-xlarge" value="<?php echo isset($usermeta['apt_number'])?$usermeta['apt_number']:"";?>"/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Country</label>
                  <div class="controls">
                    <select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php
                            $countries = $this->users->getMetaDataList('country');
                            foreach($countries as $in):
                            $selected = ($usermeta['country_id']==$in['id'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['countryname'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Province </label>
                  <div class="controls">
                    <select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php 
                            if((int)$usermeta['province_id']>0){
                                $provinces = $this->users->getRelatedElement('tbl_province', 'country_id', $usermeta['country_id']);
                
                                foreach($provinces as $sc):
                                    $selected = ($usermeta['province_id']==$sc['id'])?'selected="selected"':'';
                        ?>
                        <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['provincename'];?></option>
                        <?php endforeach;                       
                            }
                        ?>
                    </select>
                  </div>
                </div>                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="enddate">City</label>
                  <div class="controls">
                      <select id="city_id" name="city_id" class="input-xlarge" required>
                            <option value="">-select-</option>
                            <?php
                                if((int)$usermeta['country_id']>0 && (int)$usermeta['province_id']>0){
                                $cities = $this->users->getRelatedElementTwo('tbl_city', 'country_id', $usermeta['country_id'], 'province_id', $usermeta['province_id']);
                                
                                foreach($cities as $sc):
                                $selected = ($usermeta['city_id']==$sc['id'])?'selected="selected"':'';
                            ?>
                    	    <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['cityname'];?></option>
                            <?php endforeach;                       
                                }
                            ?>
                        </select>                  
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Postal Code</label>
                  <div class="controls">
                    <input id="zip" name="zip" type="text" placeholder="Postal Code" class="input-xlarge" value="<?php echo isset($usermeta['zip'])?$usermeta['zip']:"";?>" required/>
                  </div>
                </div>
				
				<!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Date of Birth</label>
                  <div class="controls">
                        <input id="date_of_birth" name="date_of_birth" type="text" placeholder="Date of Birth" class="input-small datestamp" value="<?php echo isset($usermeta['date_of_birth']) ? date("m/d/Y", strtotime($usermeta['date_of_birth'])) : '';?>" required/>
                  </div>
                </div>
				
                <!-- Password input-->
                <div class="control-group">
                    <label class="control-label" for="confirmpassword">Upload Image</label>
                    <div class="controls">
                        <input class="input-xlarge" id="uploadimg" name="uploadimg" placeholder="Upload Image" type="file" />
                    </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="startdate">Nationality</label>
                  <div class="controls">
                    <select id="nationality" name="nationality" class="input-xlarge">
                        <option value="">-select-</option>
                        <?php
                            $countries = $this->users->getMetaDataList('country');
                            foreach($countries as $in):
                            $selected = ($usermeta['nationality']==$in['countryname'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $in['countryname'];?>" <?php echo $selected;?>><?php echo $in['countryname'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
				
				<!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="preferred_language">Preferred Language</label>
                  <div class="controls">
					<select id="preferred_language" name="preferred_language" class="input-xlarge">
                        <option value="">-select-</option>
                        <?php
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $ln):
                            $selected = ($usermeta['preferred_language']==$ln['language'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $ln['language'];?>" <?php echo $selected;?>><?php echo $ln['language'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
				
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="second_language">Other Language</label>
                  <div class="controls">
					<select id="second_language" name="second_language" class="input-xlarge">
                        <option value="">-select-</option>
                        <?php
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $ln):
                            $selected = ($usermeta['second_language']==$ln['language'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $ln['language'];?>" <?php echo $selected;?>><?php echo $ln['language'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="inline text-center">
                <button class="btn btn-primary">Save</button>
                <button class="btn btn-danger">Cancel</button>
                <input type="hidden" name="page" value="personal"/>
                </div>
            
        </form>
    </div>
    <script>
	$( ".datestamp" ).datepicker();
	
	$(document).ready(function () {
        $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });
        $('#province_id').change(function(){
            $country_id = $('#country_id').val();
            $province_id = $('#province_id').val();
            $.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_city', 'field1': 'country_id', 'value1': $country_id, 'field2': 'province_id', 'value2': $province_id, 'field_fetch': 'cityname'}, function(data){
                $("#city_id").html(data);
            });
        });        
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>