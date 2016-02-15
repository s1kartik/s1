<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
        <form class="form-horizontal adminfrm" method="post" id="frm_worker_professional">
           
            <!-- Form Name -->
            <legend>Worker Professional Information</legend>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="lastname">Employer</label>
              <div class="controls">
                <select id="company" name="company" placeholder="Companyname" class="input-xlarge required">
                    <option value="">-select-</option>
            	    <option value="0" <?php if(isset($usermeta['company']) && $usermeta['company']==0):?>selected="selected"<?php endif;?>>Self-Employed</option>
                    <option value="-1" <?php if(isset($usermeta['company']) && $usermeta['company']==-1):?>selected="selected"<?php endif;?>>Unemployed</option>
                    <option value="">------------------</option>
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
			
			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="union">Union</label>
			  <div class="controls">
			  <?php $unions = $this->users->getUnions();
			  if( isset($unions) && sizeof($unions) ) {
			  ?>
				<select id="union" name="union" class="input-xlarge">
					<option></option>
					<?php 
						foreach($unions as $em):
							$selected = (isset($usermeta['union']) && $usermeta['union']==$em['user_id'])?'selected="selected"':'';
					?>
						<option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
					<?php endforeach;?>        
				</select>
			  <?php 
			  }?>
			  </div>
			 </div>
			  
			 <div class="control-group" id="id_div_union_number">
			  <div class="controls">
					<input type="text" name="union_number" id="union_number" placeholder="Union" class="input-xlarge" value="<?php echo isset($usermeta['union_number'])?$usermeta['union_number']:"";?>" />
				</div>
			 </div>
			 <input type="hidden" name="deleted_union" id="deleted_union" value="" />

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="email">Industry</label>
              <div class="controls">
                        <select  id="industry_id" name="industry_id" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php
                            $industries = $this->users->getMetaDataList('industry');
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
              <label class="control-label" for="nickname">Section</label>
              <div class="controls">
                    <select id="section_id" name="section_id" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php
                            if((int)$usermeta['industry_id']>0){
                            $sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $usermeta['industry_id']);
                            
                            foreach($sections as $sc):
                            $selected = ($usermeta['section_id']==$sc['id'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
                        <?php endforeach;                       
                            }
                        ?>
                    </select>
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="firstname">Trade</label>
              <div class="controls">
                    <select  id="trade_id" name="trade_id" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php
                            if((int)$usermeta['industry_id']>0 && (int)$usermeta['section_id']>0){
                            $trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $usermeta['industry_id'], 'section_id', $usermeta['section_id']);
                            
                            foreach($trades as $sc):
                            $selected = ($usermeta['trade_id']==$sc['trade_id'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
                        <?php endforeach;                       
                            }
                        ?>
                    </select>
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="lastname">Years of Experience</label>
              <div class="controls">
                <input id="years_experience" name="years_experience" type="text" placeholder="Years of Experience" class="input-xlarge" value="<?php echo isset($usermeta['years_experience'])?$usermeta['years_experience']:"";?>" required/>
              </div>
            </div>
            <div class="control-group">
			<label class="control-label">Joint Health and Safety Representative</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" name="hsrep" value="y" <?php if(isset($usermeta['hsrep']) && $usermeta['hsrep']=="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> y</label> 
				<label class="radio inline"><input type="radio" name="hsrep" value="n" <?php if(!isset($usermeta['hsrep']) || $usermeta['hsrep']!="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> n</label>
			</div>
                                        </div><!-- Multiple Radios (inline) -->
            <div class="control-group">
				<label class="control-label">Supervisor</label>
				<div class="controls">
					<label class="radio inline"><input type="radio" name="is_supervisor" value="y" <?php if(isset($usermeta['is_supervisor']) && $usermeta['is_supervisor']=="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> y</label> 
					<label class="radio inline"><input type="radio" name="is_supervisor" value="n" <?php if(!isset($usermeta['is_supervisor']) || $usermeta['is_supervisor']!="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> n</label>
				</div>
			</div><!-- Multiple Radios (inline) -->
			<div class="control-group">
				<label class="control-label">Profile Manager</label>
				<div class="controls">
					<label class="radio inline"><input type="radio" name="is_profile_manager" value="y" <?php if(isset($usermeta['is_profile_manager']) && $usermeta['is_profile_manager']=="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> y</label> 
					<label class="radio inline"><input type="radio" name="is_profile_manager" value="n" <?php if(!isset($usermeta['is_profile_manager']) || $usermeta['is_profile_manager']!="y"):?>checked="checked"<?php endif;?> disabled="disabled"/> n</label>
				</div>
			</div><!-- Multiple Radios (inline) -->
                <div class="inline text-center">
                    <button class="btn btn-primary">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                    <input type="hidden" name="page" value="professional"/>
                </div>
            
        </form>
    </div>
    <script>
	$(document).ready(function () {
        $('#industry_id').change(function(){
            $industry_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#section_id").html(data);
            });
        });	
        $('#section_id').change(function(){
            $industry_id = $('#industry_id').val();
            $section_id = $('#section_id').val();
            $.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
                $("#trade_id").html(data);
            });
        }); 

		// Start - Worker union //
			if( $('#union').val() ) {
				$('#deleted_union').val( $('#union').val() );
				$('#id_div_union_number').show();
			}
			else {
				$('#union_number').val("");
				$('#id_div_union_number').hide();
			}
			$('#union').change(function(){
				if( $('#union').val() ) {
					$('#deleted_union').val( $('#union').val() );
					$('#id_div_union_number').show();
				}
				else {
					$('#union_number').val("");
					$('#id_div_union_number').hide();
				}
			});
		// End - Worker union //
		
		$( "#frm_worker_professional" ).validate({
			// errorClass: 'error help-inline', 
			rules: { 
					union_number: { required: true }
				}, 
			messages: {
				//"union_number": {"required": "Union number is required."}
			}, 
			errorPlacement: function(error, element) {
				// if (element.attr("name") == "union_number") {
				//	error.insertAfter("#union_number");
				//}
			}
		});
    });
    </script> 
</div>    
<?php $this->load->view('footer_admin'); ?>