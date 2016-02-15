<?php $this->load->view('header_admin');
$badge_price = $this->users->getMetaDataList('price_settings', 'price_settingsname="badges"', '', 'in_price');
$badge_price = (isset($badge_price[0]['in_price'])&&$badge_price[0]['in_price']) ? $badge_price[0]['in_price'] : 'N/A';
?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Digital Records of Training</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/badge"><i class="icon-plus-2"></i> New D.R.O.T</a>
        <div class="input-prepend input-append">
            <form method="post">
				<input type="hidden" name="searchby" value="st_badge_title" />
				<input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
				<input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php 
		if( sizeof($list) > 0 ) {?>
			<h4>D.R.O.T Price: <?php echo $badge_price;?></h4>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>D.R.O.T Title</th>
						<th>Image</th>
						<th>Industry</th>
						<th>Sector</th>
						<th>Trade</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {
					$id = isset($admin['id']) ? $admin['id'] : '';?>
					<tr>
						<td class="wordbreak"><?php echo wordwrap($admin['st_badge_title'],20,"<br>\n",true);?></td>
						<td><img src="<?php echo $base."img/badges/".$admin['st_badge_image'];?>" width="130" height="115"></td>
						<?php
						$industry = $this->users->getMetaDataList('industry', 'id="'.$admin['in_industry_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'industryname');
						$industry = (isset($industry[0]['industryname'])&&$industry[0]['industryname']) ? $industry[0]['industryname'] : '';
						
						$sectors = $this->users->getMetaDataList('section', 'id="'.$admin['in_sector_id'].'"', '', 'sectionname');
						$sector = (isset($sectors[0]['sectionname'])&&$sectors[0]['sectionname']) ? $sectors[0]['sectionname'] : '';
						
						$trades = $this->users->getMetaDataList('trade', 'trade_id="'.$admin['in_trade_id'].'"', '', 'tradename');
						$trade = (isset($trades[0]['tradename'])&&$trades[0]['tradename']) ? $trades[0]['tradename'] : '';
						?>
						<td><?php echo $industry;?></td>
						<td><?php echo $sector;?></td>
						<td><?php echo $trade;?></td>						
						<td><?php echo ($admin['in_status']=='1') ? 'Active' : 'Inactive';?></td>
						<td title="Edit D.R.O.T"><a href="<?php echo $base;?>admin/badge?id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
					</tr>
					<?php 
				}?>
            </table>
			<?php 
		}
		else {?>
            <h6>No data found</h6>            
			<?php 
		}?>
</div>
</div>  
<?php $this->load->view('footer_admin'); ?>