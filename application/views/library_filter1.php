<div id="row-filter">
    <div class="profile-content-filter">
        <form class="form-inline" method="post" id="filterfrm">
            <fieldset>
                <div class="controls">
                    <h6>FILTER RESULTS:</h6>
                        <input type="text" class="spannews1" name="name" placeholder="Name" value="<?php echo isset($_POST['name'])?htmlspecialchars($_POST['name']):"";?>" />
                        <select name="language" class="spannews1">
                            <option value="">-Language-</option>
                            <?php 
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $in) {
								$selected = (isset($_POST['language'])&&$_POST['language']==$in['abbr'])?'selected="selected"':'';?>
								<option value="<?php echo $in['abbr'];?>" <?php echo $selected;?>><?php echo $in['language'];?></option>
								<?php 
							}?>
                        </select>
                        <select name="status" class="spannews1">
                    	    <option value="1">Active</option>
                            <option value="0" <?php if(isset($_POST['status']) && $_POST['status']<1):?>selected="selected"<?php endif;?>>Inactive</option>
                        </select>                       
                        <input type="hidden" name="action" value="FILTER"/>
                        <button type="submit" class="btn">Go!</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>