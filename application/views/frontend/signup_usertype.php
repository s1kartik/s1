<?php $this->load->view('frontend/signup_header'); ?>

<div class="metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">ABOUT ME</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home ">
        <div class="row-fluid" >
            <a href="?signup=mydata&industry=<?php echo $industry_id;?>&usertype=8" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/employer.png" alt="S1 Construction">
                </div>
                <div class="tile-status"><span class="name">EMPLOYER</span></div>
            </a>
        	<a href="?signup=mydata&industry=<?php echo $industry_id;?>&usertype=9" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/worker.png" alt="S1 Health">
                </div>
                <div class="tile-status"><span class="name">WORKER</span></div>
            </a>
            <a href="?signup=mydata&industry=<?php echo $industry_id;?>&usertype=11" class="tile double triple-half bg-black ">
            	<div class="tile-content icongetstarted">
                    <img src="<?php echo $base;?>img/signup/student.png" alt="S1 Industrial">
                </div>
                <div class="tile-status">
                    <span class="name">STUDENT</span>
                </div>
            </a>
            
        </div>
        
    </div>
</div>

<?php $this->load->view('frontend/signup_footer'); ?>

