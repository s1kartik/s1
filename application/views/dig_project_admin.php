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
                <legend>Digital Project Cover</legend>
                <!-- Text input-->
                <div class="control-group">
                    <label class="control-label" for="nickname">Constructor</label>
                    <div class="controls">
                        <input id="nickname" name="nickname" type="text" placeholder="Company name" class="input-xlarge" value="" required/>
                    </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="lastname">Street #</label>
                  <div class="controls">
                    <input id="street_number" name="street_number" type="text" placeholder="Street #" value="" class="input-xlarge" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="startdate">Street Name</label>
                  <div class="controls">
                    <input id="street" name="street" type="text" placeholder="Street Name" class="input-xlarge" value="" required/>
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
                    <input id="zip" name="zip" type="text" placeholder="Postal Code" class="input-xlarge" value="" required/>
                  </div>
                </div>
				<!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="firstname">Supervisor</label>
                  <div class="controls">
                    <input id="firstname" name="firstname" type="text" placeholder="Supervisor in Charge" class="input-xlarge" value="" required/>
                  </div>
                </div>
                <legend>Project Information</legend>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="lastname">Street #</label>
                  <div class="controls">
                    <input id="street_number" name="street_number" type="text" placeholder="Street #" value="" class="input-xlarge" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="startdate">Street Name</label>
                  <div class="controls">
                    <input id="street" name="street" type="text" placeholder="Street Name" class="input-xlarge" value="" required/>
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
                    <input id="zip" name="zip" type="text" placeholder="Postal Code" class="input-xlarge" value="" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="firstname">Description</label>
                  <div class="controls">
                    <textarea id="" name="" type="text" rows="4" placeholder="Description of Project" class="input-xlarge" value="" required></textarea>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Anticipated # workers</label>
                  <div class="controls">
                    <input type="radio" name="workersNumber" value=""> 1-5 &nbsp;
					<input type="radio" name="workersNumber" value=""> 6-19 &nbsp;
                    <input type="radio" name="workersNumber" value=""> 20-49 &nbsp;
                    <input type="radio" name="workersNumber" value=""> 50 and over &nbsp;
                    <input type="text" placeholder="Specify number" class="" value="" />
                  </div>
                </div>
                <legend>Category which best describes the Project</legend>
                <!--category-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Residential Building</label>
                  <div class="controls">
                    <input type="checkbox" name="workersNumber" value=""> Single Family Housing<br />
					<input type="checkbox" name="workersNumber" value=""> Apartment and Other Mutiple Housing<br />
                    <input type="checkbox" name="workersNumber" value=""> High-Rise &nbsp;&nbsp;
                    <input type="checkbox" name="workersNumber" value=""> Low-Rise

                  </div>
                </div>
                <!--end category-->
                <!--category-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Road</label>
                  <div class="controls">
                    <input type="checkbox" name="workersNumber" value=""> Highway & Road Construction<br />
					<input type="checkbox" name="workersNumber" value=""> Asphalt Paving<br />
                    <input type="checkbox" name="workersNumber" value=""> Bridge


                  </div>
                </div>
                <!--end category-->
                <!--category-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Buildings</label>
                  <div class="controls">
                    <input type="checkbox" name="workersNumber" value=""> Commercial<br />
					<input type="checkbox" name="workersNumber" value=""> Industrial<br />
                    <input type="checkbox" name="workersNumber" value=""> Institutional


                  </div>
                </div>
                <!--end category-->
                <!--category-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Additional Categories</label>
                  <div class="controls">
                    <input type="checkbox" name="workersNumber" value=""> Shaft<br />
					<input type="checkbox" name="workersNumber" value=""> Tunnel<br />
                    <input type="checkbox" name="workersNumber" value=""> Subway<br />
                    <input type="checkbox" name="workersNumber" value=""> Caisson<br />
                    <input type="checkbox" name="workersNumber" value=""> Cofferdam <br />
                    <input type="checkbox" name="workersNumber" value=""> Excavation - Grading<br />
                    <input type="checkbox" name="workersNumber" value=""> Railway <br />
                    <input type="checkbox" name="workersNumber" value=""> Marine <br />
                    <input type="checkbox" name="workersNumber" value=""> Asbestos Removal <br />
                    <input type="checkbox" name="workersNumber" value=""> Mining Plant <br />
                    <input type="checkbox" name="workersNumber" value=""> Shipbuilding <br />


                  </div>
                </div>
                <!--end category-->
                <!--category-->
                <div class="control-group">
                  <label class="control-label" for="enddate">Services</label>
                  <div class="controls">
                    <input type="checkbox" name="workersNumber" value=""> Hydroelectric Power Plants & related structures<br />
					<input type="checkbox" name="workersNumber" value=""> Cable<br />
                    <input type="checkbox" name="workersNumber" value=""> Hydro <br />
                    <input type="checkbox" name="workersNumber" value=""> Gas <br />
                    <input type="checkbox" name="workersNumber" value=""> Telephone <br />
                    <input type="checkbox" name="workersNumber" value=""> Elec. Towers/Trans Lines <br />
                    <input type="checkbox" name="workersNumber" value=""> Water/Sewer <br />
                    <input type="checkbox" name="workersNumber" value=""> Pipeline <br />
                    <input type="checkbox" name="workersNumber" value=""> Well Drilling <br />
                    <input type="checkbox" name="workersNumber" value=""> MOving of a building/structure <br />

                  </div>
                </div>
                <!--end category-->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="startdate">Involved Employers</label>
                  <div class="controls">
                    <input id="" name="street" type="text" placeholder="Type Company name" class="input-xlarge" value="" required/>
                  </div>
                </div>
                    
                
                
                <div class="inline text-center">
                <button class="btn btn-primary">Save</button>
                <button class="btn btn-danger">Cancel</button>
                <input type="hidden" name="page" value="personal"/>
                </div>
            
        </form>
    </div>
    <script type="text/javascript">
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