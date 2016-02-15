<?php $this->load->view('frontend/signup_header'); ?>

<div class="metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">MY INDUSTRY</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home">
        <div class="row-fluid" >
            <a href="?signup=usertype&industry=1" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/construction.png"  alt="S1 Construction">
                </div>
                <div class="tile-status">
                    <span class="name">CONSTRUCTION</span>
                </div>
            </a>
        	<a href="?signup=usertype&industry=3" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/health.png"  alt="S1 Health">
                </div>
                <div class="tile-status">
                    <span class="name">HEALTH</span>
                </div>
            </a>
            <a href="?signup=usertype&industry=2" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/industrial.png"  alt="S1 Industrial">
                </div>
                <div class="tile-status">
                    <span class="name">INDUSTRIAL</span>
                </div>
            </a>
            <a href="?signup=usertype&industry=10" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/mining.png"  alt="S1 Mining">
                </div>
                <div class="tile-status">
                    <span class="name">MINING</span>
                </div>
            </a>
        </div>
        
    </div>
</div>
<?php $this->load->view('frontend/signup_footer');?>