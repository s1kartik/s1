<?php 
$this->load->view('header_admin');
$cp 	= isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp 	= $cp - 1;
$nextp 	= $cp + 1;

if( $param ) {
	$heading_label 	= "Customized Safety Talks";
	$view_link 		= '';
	$add_label 		= "New Customized Safety Talks";
}
else {
	$heading_label 	= "Safety Talks";
	$view_link 		= '<a class=admin-new href="'.$base.'admin/safetytalks?custom=1">View Customized Safety Talks</a>';
	$add_label 		= "New Safety Talks";
}
?>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 

<?php $this->load->view('library_filter1');?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
	<h4><?php echo $heading_label;?></h4>
	<a class="admin-new" href="<?php echo $base;?>admin/add_safetytalks?<?php echo $param;?>"><i class="icon-plus-2"></i>&nbsp;<?php echo $add_label;?></a>
	<?php 
	echo $view_link;
	
	if(count($list)>0) {?>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
			<tr>
				<th>Safety Talks</th>
				<th>Language</th>
				<?php echo (!$is_custom)?'<th>Icon</th>':''; ?>
				<?php echo (!$is_custom)?'<th>Image(s)</th>':''; ?>
				<?php echo (!$is_custom)?'<th>Video(s)</th>':''; ?>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php 
			foreach($list as $val_safetytalks) {
				$language 		 	= $val_safetytalks['st_language'];
				$safetytalks_items	= $this->users->getMetaDataList( 'safetytalks_items', 'in_safetytalks_id="'.$val_safetytalks['id'].'"', '', 'COUNT(id) AS noof_items' );
				
				$safetytalks_img_vid	= $this->users->getMetaDataList( 'safetytalks_image_video', 'in_safetytalks_id="'.$val_safetytalks['id'].'" AND in_status=1', '', 'in_safetytalks_image_video, st_safetytalks_image_video' );
				
				$no_of_items 	 	= isset($safetytalks_items[0]['noof_items']) ? $safetytalks_items[0]['noof_items'] : 0;
				
				$safetytalks_id 	= $val_safetytalks['id'];
				$safetytalks_name 	= $val_safetytalks[$field_safetytalks_name];
				$icon_path 		 	= (!$is_custom) ? $val_safetytalks['st_icon_path'] : '';
				$date_safetytalks_start = $val_safetytalks['date_safetytalks_start'];
				$date_safetytalks_end= $val_safetytalks['date_safetytalks_end'];
				$status 		 	= $val_safetytalks['status'];
				?>
				<tr>
					<td data-title="Safety Talks Name"><?php echo $safetytalks_name;?></td>
					<td data-title="Language"><?php echo $language;?></td>
					<?php
					if(!$is_custom) {?>
						<td data-title="Icon">
							<?php 
							if( isset($icon_path) && $icon_path ) {?>
								<img src="<?php echo $icon_path;?>" class="w45 h40">
								<?php
							}?>
						</td>
						<td>
							<?php 
							foreach( $safetytalks_img_vid AS $key_safety => $val_safety ) {
								$is_safetytalks_imgorvid = isset($val_safety['in_safetytalks_image_video'])  ? $val_safety['in_safetytalks_image_video'] : '';
								$name_safetytalks_imgorvid = isset($val_safety['st_safetytalks_image_video'])  ? $val_safety['st_safetytalks_image_video'] : '';
								if( "1" == $is_safetytalks_imgorvid ) {
									if( file_exists(FCPATH.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid) ) {?>
										<img src="<?php echo $base.$this->path_upload_safetytalks_image.$name_safetytalks_imgorvid;?>" width="50" height="50">
										<?php 
									}
								}
							}
							?>
						</td>
						<td>
							<?php 
							$cnt_safetyvideo=0;
							foreach( $safetytalks_img_vid AS $key_safetyvid => $val_safetyvid ) {
								$is_safetytalks_imgorvid = isset($val_safetyvid['in_safetytalks_image_video'])  ? $val_safetyvid['in_safetytalks_image_video'] : '';
								$name_safetytalks_imgorvid = isset($val_safetyvid['st_safetytalks_image_video'])  ? $val_safetyvid['st_safetytalks_image_video'] : '';
								if( "2" == $is_safetytalks_imgorvid ) {
									$cnt_safetyvideo++;?>
									<a class="fancybox fancybox.iframe" href="<?php echo "https://www.youtube.com/embed/".$name_safetytalks_imgorvid;?>?autoplay=1">Video<?php echo ($cnt_safetyvideo);?></a>
									<?php 
								}
							}
							?>
						</td>
						<?php
					}?>

					<td data-title="Start Date"><?php echo $date_safetytalks_start;?></td>
					<td data-title="End Date"><?php echo $date_safetytalks_end;?></td>
					<td data-title="Status"><?php echo $status>0?'Active':'Inactive';?></td>
					<td data-title="Action">
						<a title="Edit Safety Talks" href="<?php echo $base;?>admin/update_safetytalks?id=<?php echo $safetytalks_id;?>&<?php echo $param;?>"><i class="icon-enter"></i></a>
						<?php if(!$is_custom) {
						?>
							&nbsp;|
							<?php 
							if( $no_of_items > 0 ) {?>
								<a href="<?php echo $base;?>admin/safetytalks_items?id=<?php echo $safetytalks_id;?>&<?php echo $param;?>" class="fg-red">View Items(<?php echo $no_of_items;?>)</a>
								<?php 
							}
							else {?>
								<a>View Items(<?php echo $no_of_items;?>)</a>
								<?php 
							}
						}
						?>
						
					</td>
				</tr>
			<?php 
			}?>
		</table>
		<div class="text-right">
			<div class="pagination">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="<?php echo $base;?>admin/safetytalks?page=<?php echo $prevp;?>&<?php echo $param;?>">Prev</a></li>
				<?php endif;?>

				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<li><a href="<?php echo $base;?>admin/safetytalks?page=<?php echo $i;?>&<?php echo $param;?>"><?php echo $i;?></a></li>
				<?php else: break; endif;endfor;?>
			   
				<?php if($nextp<=$pages):?>
				<li><a href="<?php echo $base;?>admin/safetytalks?page=<?php echo $nextp;?>&<?php echo $param;?>">Next</a></li>
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

<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>