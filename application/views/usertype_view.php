<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>User Types</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=usertype"><i class="icon-plus-2"></i> New User Type</a>
        <div class="input-prepend input-append">
            <form method="post">
            <input type="hidden" name="searchby" value="typename" />
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php
                    $elements = $this->users->getTableColumn('tbl_usertype', 'typename');
                    foreach($elements as $el)
                        echo '<option>'.$el['typename'].'</option>';                 
                ?>
            </datalist> 
            <input class="btn" type="submit" value="Search"/>
            </form>
        </div>        
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Type Name</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
                </thead>
                <?php foreach($list as $admin):?>
                <tr>
                    <td data-title="Type Name"><?php echo $admin['typename'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=usertype&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>