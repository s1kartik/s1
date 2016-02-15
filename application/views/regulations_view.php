<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Regulations</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=regulations"><i class="icon-plus-2"></i> New Regulation</a>
        <div class="input-prepend input-append">
            <form method="post">
            <input type="hidden" name="searchby" value="st_parent_regulation_title" />
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php 
                    $elements = $this->users->getTableColumn('tbl_regulations', 'st_parent_regulation_title');
                    foreach($elements as $el)
                        echo '<option>'.$el['st_parent_regulation_title'].'</option>';                 
                ?>
            </datalist>
            <input class="btn" type="submit" value="Search"/>
            </form>
		</div>
		<div align="right"><a href="<?php echo $base."admin/metadata?type=regulation_contents";?>">View Regulation Groups</a></div>
	
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Regulation Title</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
                </thead>
                <?php foreach($list as $admin):?>
                <tr>
                    <td data-title="Regulation Name"><?php echo $admin['st_parent_regulation_title'];?></td>
                    <td data-title="Start Date"><?php echo ($admin['date_start']) ? date('Y-m-d',strtotime($admin['date_start'])) : '';?></td>
                    <td data-title="Start Date"><?php echo ($admin['date_end']) ? date('Y-m-d',strtotime($admin['date_end'])) : '';?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=regulations&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>