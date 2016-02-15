<?php $this->load->view('header_admin'); ?>
<div class="homebg metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">NEW WORKER ORIENTATION</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home ">
        <div class="row-fluid" >
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st1.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 1</span>
                </div>
            </div>
        	<div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st2.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 2</span>
                </div>
            </div>
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st3.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 3</span>
                </div>
            </div>
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st4.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 4</span>
                </div>
            </div>
        </div>
        <div class="row-fluid" >
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st5.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 5</span>
                </div>
            </div>
        	<div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st6.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 6</span>
                </div>
            </div>
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st7.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 7</span>
                </div>
            </div>
            <div class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/new-worker-orientation/st8.png"  alt="S1 Profile Information">
                </div>
                <div class="tile-status">
                    <span class="name">STEP 8</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
/*script for equal height columns*/

$(document).ready (function(){
	
	$(".started-item  .started-img").click(function(){
		
		$("#started-overlay").addClass(" started-overlay ").stop().animate({opacity:0.7}),
		
		$(".started-i-c").fadeOut("fast"),
		
		
		$(this).siblings(".started-i-c").fadeIn(300, function(){
			
			$(".started-item .icon-remove, .started-item .close-button ").click(function(){
		    
		    $(".started-i-c").fadeOut(500),
		    
		    $("#started-overlay").stop().animate({opacity:0},300, function(){
			    $(this).removeClass(" started-overlay ")
		    });
				});
				
			
			}),
			$(".item").addClass("active"),
	    $('.item').equalHeightColumns(),
	
		$(".item").removeClass("active"),
		$(".item:first-child").addClass("active")
			
		});
		
		
	$('.started-carousel').carousel({
		interval: false
	})	;
	
	$('.started-img').equalHeightColumns();
	
});



</script>

<?php $this->load->view('footer_admin'); ?>

