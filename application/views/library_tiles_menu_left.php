<?php 
// 29Aug2014: Library functionality has been reverted for Union User //
/*if( "7" == $this->sess_usertype ) { // 7=Union // 
	// Get Union Library types //
		$union_libtypes = $this->libraries->getUnionLibtypes();
	foreach( $union_libtypes AS $val_libtypes ) {?>
		<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/libraries_metro?libtype=<?php echo $val_libtypes['id'];?>">
			<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."training.png";?>"></i>
			<div class="brand"><span class="label fg-white text-right"><?php echo ucwords($val_libtypes['library_type']);?></span></div>
		</a>
		<?php 
	}
}
else 
*/

{?>
	<!--begin Training tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/libraries_metro?libtype=1">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."training.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">TRAINING</span></div>
	</a>
	<!--end Training tile-->
	<!--begin SAFETY TALKS tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/s1_library_safetytalks_view_metro">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">SAFETY TALKS</span></div>
	</a>
	<!--end SAFETY TALKS tile-->		
	<!--begin HAZARDS tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/libraries_metro?libtype=3">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."hazards.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">HAZARDS</span></div>
	</a>
	<!--end HAZARDS tile-->
	<!--begin PROCEDURES tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/libraries_metro?libtype=4">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."procedures.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">PROCEDURES</span></div>
	</a>
	<!--end PROCEDURES tile-->
	<!--begin INSPECTIONS tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/s1_library_inspection_view_metro">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."inspections.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">INSPECTIONS</span></div>
	</a>
	<!--end INSPECTIONS tile-->		
	<!--begin INVESTIGATIONS tile-->
	<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/libraries_metro?libtype=6">
		<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."investigations.png";?>"></i>
		<div class="brand"><span class="label fg-white text-right">INVESTIGATIONS</span></div>
	</a>
	<!--end INVESTIGATIONS tile-->
<?php
}?>	
