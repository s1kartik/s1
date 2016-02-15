<ul class="clearfix">
	<?php 
	$sizeof_unions = sizeof($row_unions);
	
	if( $sizeof_unions ) {
		foreach( $row_unions AS $key_unions => $val_unions ) {
			$name 			= $val_unions['nickname']." ".$val_unions['firstname']." ".$val_unions['lastname'];
			$profile_image 	= $this->base.$this->path_upload_profiles.$val_unions['profile_image'];
			
			$city = '';
			if(isset($usermeta['city_id'])) {
				$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
				$city = $city['cityname'];
			}
			
			$province = '';
			if(isset($usermeta['province_id'])) {
				$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
				$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
			}
			
			$country = '';
			if(isset($usermeta['country_id'])) {
				$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
				$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
			}
			
			$industry = '';
			if( isset($val_unions['industry_id']) ) {
				$industry = $this->users->getElementByID('tbl_industry', $val_unions['industry_id']);
				$industry = $industry['industryname'];
			}
			?>
			<li>
				<div class="u-img">
				<!--<a href="#" class="description" data-toggle="popover" data-content="LiUnaLocal183" data-original-title="Brief Description" data-placement="bottom" data-trigger="hover">
					<img src="<?php echo $this->base;?>img/union/local183.jpg"/>
				</a>
				-->
				<?php 
				if( !empty($profile_image) ) {
					$pimg = $profile_image;
				}
				else {
					$pimg = $this->base."img/union/local183.jpg";
				}
				?>
				<img src="<?php echo $pimg;?>">
		
				<span class="u-tag btn-inverse">UNION</span>
				</div>
				<div class="u-results-details">
					<span class="pull-right u-action">
						<a class="btn btn-mini btn-danger">Not Linked</a>
						<a class="btn btn-mini btn-warning" href="<?php echo $this->base;?>admin/view_union">Visit Profile</a>
					</span>
					<div class="u-name"><?php echo $name;?></div>
					<div class="u-trade"><i class="icon-wrench"></i><?php echo $industry;?></div>
					<?php
					if($city || $province || $country) {
					?><div class="u-loc" ><i class="icon-map-marker"></i><?php echo $city.$province.$country;?></div>
					<?php
					}?>
				</div>							
			</li>
		<?php
		}
	}
	else {
		echo "<h5>".$display_msg."</h5>";
	}
	?>
</ul>