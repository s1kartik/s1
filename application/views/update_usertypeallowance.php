<?php $this->load->view('header_admin'); ?>
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal adminfrm" id="frm_upd_usertypeallowance" method="post" enctype="multipart/form-data" action="">
    <fieldset>
    <!-- Form Name -->
    <legend>User Type Allowance</legend>
        <?php foreach($admin as $ad):?>
            <div class="span6">
                <fieldset>
                    <legend><?php echo $ad['function_name'];?></legend> 
                    <?php
                        $allowances = $this->users->getFunctionAllowanceByUserTypeID($ad['id'],(int)$_GET['id']);
                        foreach($allowances as $al):
                    ?>
                        <div class="control-group">
                            <label class="control-label"><?php echo $al['allowance_name'];?></label>
                            <div class="controls">
                                <label class="radio inline">
                                    <input type="radio" name="allowance[<?php echo $al['id'];?>]" value="1" <?php if($al['allowance']>0):?>checked="checked"<?php endif;?> /> y
                                </label> 
                                <label class="radio inline">
                                    <input type="radio" name="allowance[<?php echo $al['id'];?>]" value="0" <?php if($al['allowance']<1):?>checked="checked"<?php endif;?>/> n
                                </label>
                            </div>
                        </div><!-- Multiple Radios (inline) -->
                    <?php endforeach;?>
                </fieldset>
            </div>
        <?php endforeach;?>
    <div class="clear"></div>  
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
    <input type="hidden" name="type" value="usertypeallowance" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary" />
     <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=administrator'" />
    </div>
    </fieldset>
    </form>
    </div>
    <style type="text/css">
        .row-fluid .span6 {
            width: 47.4%;
            min-height: 280px;
            
        }
        .row-fluid .form-horizontal .span6:first-child{
            margin-left: 2.5641%
        }
        .form-horizontal .span6 .control-label{
            width: 180px;
        }
        .form-horizontal .span6 .controls{
            margin-left: 200px;
        }
        .clear{
            clear: both;
        }
    </style>
</div>
<?php $this->load->view('footer_admin'); ?>