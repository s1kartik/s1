<?php $this->load->view('header_admin'); 
$ret_price_settings = $this->users->getMetaDataList('price_settings', '1=1', '', 'id');
$id = sizeof($ret_price_settings) ?'&id='.$ret_price_settings[0]['id'].'' : '';
?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Price View</h4>
		<?php 
		//if(!$id) 
		{?>
			<a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=price_settings"><i class="icon-plus-2"></i> Add New</a>
		<?php 
		}?>
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Section</th><th>Price</th><th>Points</th><th>Credits</th><th>Action</th></tr>
                </thead>
                <?php foreach($list as $admin):?>
                <tr>
                    <td data-title="Section"><?php echo ucwords($admin['price_settingsname']);?></td>
                    <td data-title="Price"><?php echo $admin['in_price'];?></td>
                    <td data-title="Points"><?php echo $admin['in_points'];?></td>
					<td data-title="Credits"><?php echo $admin['in_credits'];?></td>
                    <td data-title="Edit" title="Edit Price"><a href="<?php echo $base;?>admin/update_meta?type=price_settings&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>