
		<form class="form-horizontal adminfrm" method="post" id="frm_worker_professional" enctype="multipart/form-data" action="<?php echo $base;?>admin/profile_setting?section=professional">
		<!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="lastname">Employer</label>
              <div class="controls">
                <select id="company" name="company" placeholder="Companyname" class="input-xlarge required">
                    <option value="2" <?php if(isset($usermeta['company']) && $usermeta['company']==2):?>selected="selected"<?php endif;?>>--- Select your Status ---</option>
                    <option value="1" <?php if(isset($usermeta['company']) && $usermeta['company']==1):?>selected="selected"<?php endif;?>>Employed</option>
            	    <option value="0" <?php if(isset($usermeta['company']) && $usermeta['company']==0):?>selected="selected"<?php endif;?>>Self-Employed</option>
                    <option value="-1" <?php if(isset($usermeta['company']) && $usermeta['company']==-1):?>selected="selected"<?php endif;?>>Unemployed</option>
                    <option value="">--- or your Employer ---</option>
                    <?php 
                        $employers = $this->users->getEmployers();
                        foreach($employers as $em):
                            $selected = (isset($usermeta['company']) && $usermeta['company']==$em['user_id'])?'selected="selected"':'';?>
                        <option value="<?php echo $em['user_id'];?>" <?php echo $selected;?>><?php echo $em['meta_value'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
			
			<div class="control-group">
				<label class="control-label" for="">Industry</label>
				  <div class="controls">
					<select id="industry_id" name="industry_id" class="industry_id input-xlarge">
						<option value="">-select-</option>
						<?php 
						$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
						foreach($industries as $in) {?>
							<option value="<?php echo $in['id'];?>" <?php echo ($usermeta['industry_id']==$in['id'])?'selected="selected"':'';?>><?php echo $in['industryname'];?></option>
							<?php 
						}?>
					</select>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="section_id">Sector</label>
				  <div class="controls">
						<select id="section_id" name="section_id" class="input-xlarge section_id">
							<option value="17">ALL</option>
							<?php 
								$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $usermeta['industry_id']);
								foreach($sections as $sc){
									$selected = ($usermeta['section_id']==$sc['id'])?'selected="selected"':'';?>
									<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
								<?php 
								}
							?>
						</select>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="trade_id">Trade</label>
				  <div class="controls">
					<select id="trade_id" name="trade_id" class="trade_id input-xlarge">
						<option value="">ALL</option>
						<?php 
						if((int)$usermeta['industry_id']>0 && (int)$usermeta['section_id']>0){
							$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $usermeta['industry_id'], 'section_id', $usermeta['section_id']);
							foreach($trades as $td) {
								$selected = ($usermeta['trade_id']==$td['trade_id'])?'selected="selected"':'';?>
								<option value="<?php echo $td['trade_id'];?>" <?php echo $selected;?>><?php echo $td['tradename'];?></option>
								<?php
							}
						}?>
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
                    <button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
                    <input type="hidden" name="page" value="professional"/>
                    <input type="hidden" name="page_design" value="metro"/>
                </div>
</form>
<script type="text/javascript">
$(document).ready(function () {    
	$(".industry_id").change(function() {
		$industry_id = $(this).val();
		$('.trade_id').html("<option value=''>-select-</option>");
		$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
			$(".section_id").html(data);
		});
	});
	
	$(".section_id").change(function(){
		$section_id = $(this).val();
		$industry_id = $(".industry_id").val();
		$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
			$(".trade_id").html(data);
		});
	});
});
</script>
