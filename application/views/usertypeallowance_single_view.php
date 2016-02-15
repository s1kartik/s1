
        <?php foreach($admin as $ad):?>
            <div class="span6">
                <fieldset>
                    <legend><?php echo $ad['function_name'];?></legend> 
                    <?php
                        $allowances = $this->users->getFunctionAllowanceByUserTypeID($ad['id'],$type_id);
                        foreach($allowances as $al):
                    ?>
                        <div class="control-group">
                            <label class="control-label"><?php echo $al['allowance_name'];?>: <?php echo ($al['allowance']>0)?"Y":"N";?></label>
                        </div><!-- Multiple Radios (inline) -->
                    <?php endforeach;?>
                </fieldset>
            </div>
        <?php endforeach;?>
    <div class="clear"></div>  
    <div class="inline">
    <a class="btn" href="<?php echo $base;?>admin/update_meta?type=usertypeallowance&id=<?php echo $type_id;?>">Modify</a>
    </div>  