<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Administrators</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_admin"><i class="icon-plus-2"></i> New Administrator</a>
        <div class=" input-prepend input-append">
            <form method="post">
            <span class="add-on">Search By</span>
            <select name="searchby" id="searchby" rel="tbl_administrator">
                <option value="">-select-</option>
                <option value="email_addr">Email</option>
                <option value="nickname">Nickname</option>
                <option value="firstname">First Name</option>
                <option value="lastname">Last Name</option>
                <option value="date_start">Start Date</option>
                <option value="date_end">End Date</option>
                <option value="status">Status</option>
            </select>
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults"></datalist> 
            <input class="btn" type="submit" value="Go!"/>
            </form>
        </div>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Email</th><th>Nickname</th><th>First Name</th><th>Last Name</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
                </thead>
                <?php foreach($list as $admin):?>
                <tr>
                    <td data-title="Email"><?php echo $admin['email_addr'];?></td>
                    <td data-title="Nickname"><?php echo $admin['nickname'];?></td>
                    <td data-title="First"><?php echo $admin['firstname'];?></td>
                    <td data-title="Last"><?php echo $admin['lastname'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=administrator&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <p>No data</p>
        <?php endif;?>
</div>         
</div>
<?php $this->load->view('footer_admin'); ?>