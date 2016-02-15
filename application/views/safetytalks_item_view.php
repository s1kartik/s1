<?php 
$this->load->view('header_admin');
$cp 	= isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp 	= $cp - 1;
$nextp 	= $cp + 1;

if( $param ) {
	$heading_label 			= "Customized Safety Talks Items";
	$back_link 				= '<a href="'.$base.'admin/safetytalks?custom='.$is_custom.'">Back to Customized Safety Talks</a>';
	$safetytalks_name_label	= "Customized Safety Talks Name";
}
else {
	$heading_label 			= "Safety Talks Items";
	$back_link 				= '<a href="'.$base.'admin/safetytalks">Back to Safety Talks</a>';
	$safetytalks_name_label 	= 'Safety Talks Name';
}
?>
<div class="info-container">
<div class="tab-pane  admin-settings" id="administrators">
	<h4><?php echo $heading_label;?></h4>
	<?php 
	echo $back_link;
	if(sizeof($list)>0) {
		?>
		<h5 class="fr"><?php echo $safetytalks_name_label;?>: <?php echo $safetytalks_name;?></h5>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Item Name</th>
			</tr>
			</thead>
			<?php 
			foreach($list as $val_inspitems) {
				$item_name 			= $val_inspitems['st_item_name'];
				?>
				<tr>
					<td data-title="Item Name" class="wordbreak"><?php echo wordwrap($item_name,50,"<br>\n",true);?></td>
				</tr>
			<?php 
			}?>
		</table>
		<div class="text-right">
			<div class="pagination">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="<?php echo $base;?>admin/safetytalks_items?page=<?php echo $prevp;?>&id=<?php echo $safetytalks_id;?>">Prev</a></li>
				<?php endif;?>
			   
				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<li><a href="<?php echo $base;?>admin/safetytalks_items?page=<?php echo $i;?>&id=<?php echo $safetytalks_id;?>"><?php echo $i;?></a></li>
				<?php else: break; endif;endfor;?>
			   
				<?php if($nextp<=$pages):?>
				<li><a href="<?php echo $base;?>admin/safetytalks_items?page=<?php echo $nextp;?>&id=<?php echo $safetytalks_id;?>">Next</a></li>
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