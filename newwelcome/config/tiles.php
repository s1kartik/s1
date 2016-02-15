<?php
/* All tiles on the homepage are configured here, be sure to check the tutorials/docs on http://metro-webdesign.info */

/* GROUP 0 */

$tile[] = array("type"=>"simple","group"=>0,"x"=>0,"y"=>0,'width'=>2,'height'=>1,"background"=>"#1f1f1f","url"=>"about-us.php",
"title"=>"Welcome","text"=>"<h4><b>HEALTH AND SAFETY<br/>JUST GOT SIMPLIFIED</b></h4>");

$tile[] = array("type"=>"slideshow","group"=>0,"x"=>0,"y"=>1,"width"=>1,"height"=>1,"background"=>"#6950ab","url"=>"",
	"images"=>array("img/welcome/about/img1.png","img/welcome/about/img2.jpg","img/welcome/about/img3.jpg"),
	"effect"=>"slide-right","speed"=>5000,"arrows"=>true,
	"classes"=>"noClick");

$tile[] = array("type"=>"scrollText","group"=>0,"x"=>1,"y"=>1,"width"=>2,"height"=>1,"background"=>"#e61e25","url"=>"external:panels/login.php",
"title"=>"<strong style='font-size:45px;'>JOIN NOW</strong><br> TO CHANGE THE WAY YOU DO SAFETY");


$tile[] = array("type"=>"custom","group"=>0,"x"=>2,"y"=>0,'width'=>1,'height'=>1,"background"=>"#e61e25","url"=>"for-workers.php",
"content"=>
"<div style='line-height:30px; margin-top:5px;'>
<div style='color:#FFF;font-size:43px;line-heigt:70px;'><strong>FOR</strong></div>
<span style='color:#FFF;font-size:30px;'><strong>WORKERS</strong></span>
<div style='font-size:47px;line-height:30px;'>BY</div>
<div style='font-size:28px;line-height:40px;'><strong>WORKERS</strong></div>
</div>");

/* GROUP 1*/

$tile[] = array("type"=>"slidefx","group"=>1,"x"=>0,"y"=>0,'width'=>2,'height'=>1,"background"=>"#333","url"=>"welcome-workers.php",
	"text"=>"SIMPLIFYING HEALTH AND SAFETY","img"=>"img/welcome/workers/metro_slide_300x150.png");

$tile[] = array("type"=>"slide","group"=>1,"x"=>0,"y"=>1,'width'=>2,'height'=>1,"background"=>"#ed1c24","url"=>"external:img/welcome/workers/earn_points.png",
	"text"=>"<h5>Earn Points. Get Discounts.</h5>","img"=>"img/welcome/workers/metro_slide_300x150_2.png","imgSize"=>1,
	"slidePercent"=>0.40,
	"slideDir"=>"up", // can be up, down, left or right
	"doSlideText"=>true,"doSlideLabel"=>true,
	 "classes"=>"lightbox"
);

$tile[] = array("type"=>"slideshow","group"=>1,"x"=>2,"y"=>0,"width"=>1,"height"=>1,"background"=>"#ed1c24","url"=>"workers-toolbox.php",
	"images"=>array("img/welcome/workers/chars/a.png","img/welcome/workers/chars/b.png","img/welcome/workers/chars/c.png","img/welcome/workers/chars/d.png","img/welcome/workers/chars/e.png","img/welcome/workers/chars/f.png","img/welcome/workers/chars/g.png"),
	"effect"=>"slide-right, slide-left, slide-down, slide-up, flip-vertical, flip-horizontal, fade",
	"speed"=>1500,"arrows"=>false,
	"labelText"=>"Toolbox","labelColor"=>"#333333","labelPosition"=>"top");
	
$tile[] = array("type"=>"flip","group"=>1,"x"=>2,"y"=>1,'width'=>1,'height'=>1,"background"=>"#333333","url"=>"external:panels/login.php","img"=>"img/welcome/workers/metro_150x150.png",
	"text"=>"<h4 style='color:#FFF;font-size:22px'><b>FREE</b></h4><h4 style='color:#FFF;font-size:22px'><b>TO</b></h4><h4 style='color:#FFF;font-size:22px'><b>JOIN!</b></h4>");


/* GROUP 2 */
$tile[] = array("type"=>"slidefx","group"=>2,"x"=>0,"y"=>0,'width'=>2,'height'=>1,"background"=>"#333","url"=>"welcome-employers.php",
	"text"=>"SIMPLIFYING HEALTH AND SAFETY","img"=>"img/welcome/employers/metro_slide_300x150.png");

$tile[] = array("type"=>"slide","group"=>2,"x"=>0,"y"=>1,'width'=>2,'height'=>1,"background"=>"#FF8000","url"=>"external:img/welcome/employers/learn_accident.png",
	"text"=>"<h5>Shouldn’t learn  by accident.</h5>","img"=>"img/welcome/employers/metro_slide_300x150_2.png","imgSize"=>1,
	"slidePercent"=>0.40,
	"slideDir"=>"up", // can be up, down, left or right
	"doSlideText"=>true,"doSlideLabel"=>true,
	 "classes"=>"lightbox"
);	

$tile[] = array("type"=>"slideshow","group"=>2,"x"=>2,"y"=>0,"width"=>1,"height"=>1,"background"=>"#FF8000","url"=>"employers-toolbox.php",
	"images"=>array("img/welcome/employers/chars/a.png","img/welcome/employers/chars/b.png","img/welcome/employers/chars/c.png","img/welcome/employers/chars/d.png","img/welcome/employers/chars/e.png","img/welcome/employers/chars/f.png","img/welcome/employers/chars/g.png"),
	"effect"=>"slide-right, slide-left, slide-down, slide-up, flip-vertical, flip-horizontal, fade",
	"speed"=>1500,"arrows"=>false,
	"labelText"=>"Toolbox","labelColor"=>"#333333","labelPosition"=>"top");
	
$tile[] = array("type"=>"flip","group"=>2,"x"=>2,"y"=>1,'width'=>1,'height'=>1,"background"=>"#333333","url"=>"external:panels/login.php","img"=>"img/welcome/employers/metro_150x150.png",
	"text"=>"<h4 style='color:#FFF;font-size:22px'><b>FREE</b></h4><h4 style='color:#FFF;font-size:22px'><b>TO</b></h4><h4 style='color:#FFF;font-size:22px'><b>JOIN!</b></h4>");
	

	
/* GROUP 3 */
$tile[] = array("type"=>"simple","group"=>3,"x"=>0,"y"=>0,'width'=>2,'height'=>1,"background"=>"#1f1f1f","url"=>"about-unions.php",
"title"=>"<div style='line-height:60px; margin:15px;margin-top:30px;font-size:40px;'><strong>KEY BENEFITS</strong></div>","text"=>"");

$tile[] = array("type"=>"slideshow","group"=>3,"x"=>0,"y"=>1,"width"=>1,"height"=>1,"background"=>"#6950ab","url"=>"",
	"images"=>array("img/welcome/union/img1.png","img/welcome/union/img2.jpg","img/welcome/union/img3.jpg"),
	"effect"=>"slide-right","speed"=>5000,"arrows"=>true,
	
	"classes"=>"noClick");

$tile[] = array("type"=>"scrollText","group"=>3,"x"=>1,"y"=>1,"width"=>2,"height"=>1,"background"=>"#e61e25","url"=>"external:img/welcome/union/union.png",
"title"=>"<div style='line-height:50px; margin:15px;margin-top:20px;font-size:40px;'><strong>Evolution of Safety</strong></div>","classes"=>"lightbox");


$tile[] = array("type"=>"custom","group"=>3,"x"=>2,"y"=>0,'width'=>1,'height'=>1,"background"=>"#e61e25","url"=>"external:panels/login.php",
"content"=>
"<div style='line-height:30px; margin-top:15px;'>
<div style='color:#FFF;font-size:45px;line-heigt:70px;margin-left:20px;'><strong>JOIN</strong></div><BR>
<div style='color:#FFF;font-size:40px;line-heigt:70px;margin-left:20px;'><strong>NOW</strong></div>

</div>");

/* GROUP 4*/ /*** REMOVED ON SEP-09-2015 AS PER PHILL REQUEST***/

//$tile[] = array("type"=>"slidefx","group"=>4,"x"=>0,"y"=>0,'width'=>2,'height'=>1,"background"=>"#333","url"=>"external:admin/instructor_library_view?libtype=3&libid=160&section=desc",
//	"text"=>"UNION LIBRARY VIEW","img"=>"img/welcome/our-tools/instructor_library_300x150.png");

//$tile[] = array("type"=>"slide","group"=>4,"x"=>0,"y"=>1,'width'=>2,'height'=>1,"background"=>"#ed1c24","url"=>"external:admin/fatality_metro",
//	"text"=>"<h5>FATALITY BREAKDOWN</h5>","img"=>"img/welcome/our-tools/fatality_300x150_2.png","imgSize"=>1,
//	"slidePercent"=>0.40,
//	"slideDir"=>"up", // can be up, down, left or right
//	"doSlideText"=>true,"doSlideLabel"=>true
//);
//$tile[] = array("type"=>"flip","group"=>4,"x"=>2,"y"=>0,'width'=>1,'height'=>1,"background"=>"#e61e25","url"=>"external:admin/hazard","img"=>"img/welcome/our-tools/digital_hazards_150x150.png",
//	"text"=>"<h4 style='color:#FFF;font-size:22px'><b>DIGITAL</b></h4><h4 style='color:#FFF;font-size:22px'><b>HAZARDS</b></h4>");
	
//$tile[] = array("type"=>"flip","group"=>4,"x"=>2,"y"=>1,'width'=>1,'height'=>1,"background"=>"#333333","url"=>"external:admin/construction","img"=>"img/welcome/our-tools/safety_equipment_150x150.png",
//	"text"=>"<h4 style='color:#FFF;font-size:22px'><b>SAFETY</b></h4><h4 style='color:#FFF;font-size:22px'><b>EQUIPMENT</b></h4>");


?> 