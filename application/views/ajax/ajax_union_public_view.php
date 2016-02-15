<ul class="clearfix">
	<?php 
	$sizeof_union_reps = sizeof($row_union_reps);
	
	if( $sizeof_union_reps ) {
		foreach( $row_union_reps AS $key_union_reps => $val_union_reps ) {
			$name 		= $val_union_reps['st_first_name']." ".$val_union_reps['st_last_name'];
			
			$sector = $this->users->getElementByID('tbl_sector', $val_union_reps['in_sector']);
			$sector = $sector['sector'];
			$job_title = $this->users->getElementByID('tbl_job_title', $val_union_reps['in_job_title']);
			$job_title = $job_title['job_title'];
			$phone 		= $val_union_reps['st_phone'];
			$email 		= $val_union_reps['st_email'];
			?>
			<li>
				<div class="u-img">
				<img src="<?php echo $this->base;?>img/union/blank-user.jpg"/>
				<span class="u-tag btn-inverse">Union Rep</span>
				</div>
				<div class="u-results-details">
					<span class="pull-right u-action">
						<a class="btn btn-mini btn-warning">contact</a>
					</span>
					<div class="u-name"><?php echo $name;?></div>
					<div class="u-trade"><i class="icon-briefcase "></i><?php echo "&nbsp;".$job_title;?></div>
					<div class="u-trade"><i class="icon-wrench "></i><?php echo "&nbsp;".$sector;?></div>
					<div class="u-loc" ><i class="icon-user "></i><?php echo "&nbsp;".$phone;?></div>
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