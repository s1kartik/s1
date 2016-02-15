<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Industries</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=industry"><i class="icon-plus-2"></i> New Industry</a>
        <div class="input-prepend input-append">
            <form method="post">
            <input type="hidden" name="searchby" value="industryname" />
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php
                    $elements = $this->users->getTableColumn('tbl_industry', 'industryname');
                    foreach($elements as $el)
                        echo '<option>'.$el['industryname'].'</option>';                 
                ?>
            </datalist> 
            <input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
              	<thead>
                <tr><th>Industry Name</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
              	</thead>
                <?php foreach($list as $admin):?>
                <tr>
                    <td data-title="Industry Name"><?php echo $admin['industryname'];?></td>
                    <td data-title="Description"><?php echo $admin['description'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=industry&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>         
</div>
<?php $this->load->view('footer_admin'); ?>