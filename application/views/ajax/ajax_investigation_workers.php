<ul class="clearfix">
	<?php 
	$sizeof_workers = sizeof($rows_workers);
	if( $sizeof_workers ) {
		foreach( $rows_workers AS $key => $value ) {
			$worker_name 		= (isset($value['worker_name'])&&$value['worker_name'])?$value['worker_name']:'-';
			$worker_jobtitle 	= (isset($value['worker_jobtitle'])&&$value['worker_jobtitle'])? $value['worker_jobtitle']:'-';
			$worker_address 	= (isset($value['worker_address'])&&$value['worker_address'])? $value['worker_address']:'-';
			?>
			<li>
				<div class="u-img">
					<img src="<?php echo $this->base;?>img/union/blank-user.jpg"/>
					<span class="u-tag btn-inverse">WORKER</span>
				</div>
				<div class="u-results-details">
					<span class="pull-right u-action">
						<a class="btn btn-mini btn-warning">contact</a>
					</span>
					<div class="u-name"><?php echo $worker_name;?></div>
					<div class="u-trade"><i class="icon-briefcase "></i>&nbsp;<?php echo $worker_jobtitle;?></div>
					<div class="u-loc" ><i class="icon-map-marker "></i>&nbsp;<?php echo $worker_address;?></div>
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