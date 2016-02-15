<?php 
$this->load->view('header_admin');
$cp 	= isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp 	= $cp - 1;
$nextp 	= $cp + 1;

if( $param ) {
	$heading_label 			= "Customized Inspection Items";
	$back_link 				= '<a href="'.$base.'admin/inspection?custom='.$is_custom.'">Back to Customized Inspection</a>';
	$inspection_name_label	= "Customized Inspection Name";
}
else {
	$heading_label 			= "Inspection Items";
	$back_link 				= '<a href="'.$base.'admin/inspection">Back to Inspection</a>';
	$inspection_name_label 	= 'Inspection Name';
}
?>
<div class="info-container">
<div class="tab-pane  admin-settings" id="administrators">
	<h4><?php echo $heading_label;?></h4>
	<?php 
	echo $back_link;
	if(sizeof($list)>0) {
		?>
		<h5 class="fr"><?php echo $inspection_name_label;?>: <?php echo $inspection_name;?></h5>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Item Name</th>
				<th>Regulation Number</th>
				<th>Section</th>
				<th>Sub Section</th>
				<th>Item</th>
				<th>Sub Item</th>
			</tr>
			</thead>
			<?php 
			foreach($list as $val_inspitems) {
				$item_id 			= $val_inspitems['in_item_id'];
				$inspection_id 		= $val_inspitems['in_inspection_id'];
				$rows_item_name 	= $this->users->getMetaDataList('inspection_items', 'id = "'.$item_id.'" AND in_inspection_id="'.$inspection_id.'"', 'ORDER BY TRIM(st_item_name)', 'st_item_name');
				$item_name 			= $rows_item_name[0]['st_item_name'];
				$regulation_number 	= $val_inspitems['st_regulation_number'];
				$section 			= $val_inspitems['st_section'];
				$subsection 		= $val_inspitems['st_subsection'];
				$item 				= $val_inspitems['st_item'];
				$subitem 			= $val_inspitems['st_subitem'];
				?>
				<tr>
					<td data-title="Item Name" class="wordbreak"><?php echo wordwrap($item_name,50,"<br>\n",true);?></td>
					<td data-title="Regulation Number"><?php echo $regulation_number;?></td>
					<td data-title="Section"><?php echo $section;?></td>
					<td data-title="Sub Section"><?php echo $subsection;?></td>
					<td data-title="Item"><?php echo $item;?></td>
					<td data-title="Sub Item"><?php echo $subitem;?></td>
				</tr>
			<?php 
			}?>
		</table>
		<div class="text-right">
			<div class="pagination">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="<?php echo $base;?>admin/inspection_items?page=<?php echo $prevp;?>&id=<?php echo $inspection_id;?>">Prev</a></li>
				<?php endif;?>
			   
				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<li><a href="<?php echo $base;?>admin/inspection_items?page=<?php echo $i;?>&id=<?php echo $inspection_id;?>"><?php echo $i;?></a></li>
				<?php else: break; endif;endfor;?>
			   
				<?php if($nextp<=$pages):?>
				<li><a href="<?php echo $base;?>admin/inspection_items?page=<?php echo $nextp;?>&id=<?php echo $inspection_id;?>">Next</a></li>
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