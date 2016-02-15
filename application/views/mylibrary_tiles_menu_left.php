<?php
$qrystr = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? "?userid=$userid" : '';?>
<!--begin training tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/mylibrary_training_metro<?php echo $qrystr;?>">
	<i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."training.png";?>"></i>
	<div class="brand">
	 <span class="label fg-white text-right">My TRAINING</span>
	</div>

</a>
<!--end Training tile-->
<!--begin SAFETY TALKS tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/mylibrary_safetytalks_metro<?php echo $qrystr;?>">
        <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."safety_talks.png";?>"></i>
        <div class="brand">
         <span class="label fg-white text-right">My SAFETY TALKS</span>
        </div>
</a>
<!--end SAFETY TALKS tile-->		
<!--begin HAZARDS tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/mylibrary_hazards_metro<?php echo $qrystr;?>">

        <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."hazards.png";?>"></i>
        <div class="brand">
         <span class="label fg-white text-right">My HAZARDS</span>
        </div>
    
</a>
<!--end HAZARDS tile-->		
<!--begin PROCEDURES tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/mylibrary_procedures_metro<?php echo $qrystr;?>">

        <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."procedures.png";?>"></i>
        <div class="brand">
         <span class="label fg-white text-right">My PROCEDURES</span>
        </div>
    
</a>
<!--end PROCEDURES tile-->		
<!--begin INSPECTIONS tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/my_inspection_metro<?php echo $qrystr;?>">

        <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."inspections.png";?>"></i>
        <div class="brand">
         <span class="label fg-white text-right">My INSPECTIONS</span>
        </div>
    
</a>
<!--end INSPECTIONS tile-->		
<!--begin INVESTIGATIONS tile-->
<a class="tile half double marcio-menu-tile bg-red" href="<?php echo $base;?>admin/mylibrary_investigation_metro<?php echo $qrystr;?>">

        <i class="icon on-left"><img src="<?php echo $base.$this->path_img_library."investigations.png";?>"></i>
        <div class="brand">
         <span class="label fg-white text-right">My INVESTIGATIONS</span>
        </div>
    
</a>
<!--end INVESTIGATIONS tile-->