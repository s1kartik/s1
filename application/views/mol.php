<?php $this->load->view('header_admin');
		$stats = (isset($stats))?$stats:"field_visits";
		$title_stats = strtoupper(str_replace("_", " ", $stats));
		?>
        <script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>
<div class="homebg metro ">
   	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
			<em class="margin20">MOL CONSTRUCTION STATS &nbsp;&nbsp;
        	<a href="#info_mol_construction_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
        </em> 
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/mol_construction_modal');
				?>	
    <!-- End INFO Modal -->
	<!--END PAGE TITLE-->
	<div class="container-fluid mol-data-container">
		<div class="main-content padding-metro-home clearfix"> 
		<!--START CODE FOR METRO STYLE-->
			<!-------BEGIN FIRST ROW OF TILES------>
				<div class="tile-group six no-margin no-padding clearfix span3" >
					<!--begin tiles menus left side general page -->
					<?php $this->load->view('mol_menu_left_tiles');?>
					<!--end tile menus left side general page-->  
				</div>
			<!-------END FIRST ROW OF TILES------>  
            
			<!-- BEGIN SECOND COLUMN FIRST ROW -->
            <div class="tile-group no-margin no-padding clearfix draggable mol-img" max-width="100%;" > 

				<img src="<?php echo $base;?>img/mol/<?php echo $stats."/".$stats."_stats.png";?>">
            </div>
            <!-- END SECOND COLUMN FIRST ROW -->
		
			<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
				<!--<div class="tile-group no-margin no-padding clearfix span2">  
        	<div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/mol/< ?php echo $stats;?>/ad1.png">
            </div>
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/mol/< ?php echo $stats;?>/ad2.png">
            </div>
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/mol/< ?php echo $stats;?>/ad3.png">
            </div> 
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/mol/< ?php echo $stats;?>/ad4.png">
            </div>  
            <div class="tile double profile-content-box tab-content">
            <img src="< ?php echo $base;?>img/ad/mol/< ?php echo $stats;?>/ad5.png">
            </div>
        </div> -->
			<!-------END  THIRD COLUMN FIRST ROW OF TILES------>  
		</div>
	</div>
</div>
<!--END OF CODE FOR METRO STYLE-->

<?php $this->load->view('footer_admin'); ?>
