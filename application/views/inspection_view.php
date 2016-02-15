<?php 
$this->load->view('header_admin');
$cp 	= isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp 	= $cp - 1;
$nextp 	= $cp + 1;

if( $param ) {
	$heading_label 	= "Customized Inspections";
	$view_link 		= '';
	$add_label 		= "New Customized Inspection";
}
else {
	$heading_label 	= "Inspections";
	$view_link 		= '<a class=admin-new href="'.$base.'admin/inspection?custom=1">View Customized Inspections</a>';
	$add_label 		= "New Inspection";
}
$this->load->view('library_filter1');
?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
	<h4><?php echo $heading_label;?></h4>
	<a class="admin-new" href="<?php echo $base;?>admin/add_inspection?<?php echo $param;?>"><i class="icon-plus-2"></i>&nbsp;<?php echo $add_label;?></a>
	<?php 
	echo $view_link;
	
	if(count($list)>0) {
		?>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Inspection</th>
				<th>Language</th>
				<th>Icon</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php 
			foreach($list as $val_inspection) {
				$language 		 	= $val_inspection['st_language'];
				$inspection_items	= $this->inspection->getInspectionItems('tinspitem.id', $val_inspection['id'], $is_custom, '', 'tinspitem.id');

				$no_of_items 	 	= sizeof($inspection_items);

				$inspection_id 		= $val_inspection['id'];
				$inspection_name 	= $val_inspection[$field_inspection_name];
				$icon_path 		 	= $val_inspection['st_icon_path'];
				$date_inspection_start = $val_inspection['date_inspection_start'];
				$date_inspection_end= $val_inspection['date_inspection_end'];
				$status 		 	= $val_inspection['status'];?>

				<tr>
					<td data-title="Inspection Name"><?php echo $inspection_name;?></td>
					<td data-title="Language"><?php echo $language;?></td>
					<td data-title="Icon">
						<?php 
						if( isset($icon_path) && $icon_path ) {?>
							<img src="<?php echo $icon_path;?>" class="w45 h40">
							<?php 
						}?>
					</td>
					<td data-title="Start Date"><?php echo $date_inspection_start;?></td>
					<td data-title="End Date"><?php echo $date_inspection_end;?></td>
					<td data-title="Status"><?php echo $status>0?'Active':'Inactive';?></td>
					<td data-title="Action">
						<a title="Edit Inspection" href="<?php echo $base;?>admin/update_inspection?id=<?php echo $inspection_id;?>&<?php echo $param;?>"><i class="icon-enter"></i></a>&nbsp;|
						<?php 
						if( $no_of_items > 0 ) {
						?>
							<a href="<?php echo $base;?>admin/inspection_items?id=<?php echo $inspection_id;?>&<?php echo $param;?>" class="fg-red">View Items(<?php echo $no_of_items;?>)</a>
						<?php 
						}
						else 
						{?>
							<a>View Items(<?php echo $no_of_items;?>)</a>
						<?php 
						}?>
						<!--&nbsp;|&nbsp;<a title="Delete Inspection" href="<?php echo $base;?>admin/delete_inspection?id=<?php echo $val_inspection['id'];?>"><i class="icon-remove"></i></a>-->
					</td>
				</tr>
			<?php 
			}?>
		</table>
		<div class="text-right">
			<div class="pagination">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="<?php echo $base;?>admin/inspection?page=<?php echo $prevp;?>&<?php echo $param;?>">Prev</a></li>
				<?php endif;?>

				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<li><a href="<?php echo $base;?>admin/inspection?page=<?php echo $i;?>&<?php echo $param;?>"><?php echo $i;?></a></li>
				<?php else: break; endif;endfor;?>
			   
				<?php if($nextp<=$pages):?>
				<li><a href="<?php echo $base;?>admin/inspection?page=<?php echo $nextp;?>&<?php echo $param;?>">Next</a></li>
				<?php endif;?>
			  </ul>
			</div>
		</div>
    <?php 
	}
	else
	{?>
        <h5>No data found</h5>
    <?php 
	}?>
</div>       
</div>  
<?php $this->load->view('footer_admin'); ?>