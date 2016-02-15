<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
    <!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
				<em class="margin20">PROPANE IN CONSTRUCTION - MODULE</em>
			</div>
		</div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home ">
        <div class="row-fluid">
			
			<a href="<?php echo $base;?>admin/instructor_library_view?libtype=56&libid=170&section=desc&language=EN;" >
				<div class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-04.png";?>"></div>
					<div class="tile-status"><span class="name"></span></div>
				</div>
			</a>
			
			<a href="<?php echo $base;?>admin/instructor_library_view?libtype=56&libid=170&section=desc&language=EN;" >
				<div class="tile double triple-half bg-black <?php echo $tile_class;?> half-opacity">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-05.png";?>"></div>
					<div class="tile-status"><span class="name"></span></div>
				</div>
			</a>
			
			<a href="<?php echo $base;?>admin/instructor_library_view?libtype=56&libid=170&section=desc&language=EN;" >
				<div class="tile double triple-half bg-black <?php echo $tile_class;?> half-opacity" >
					<div class="tile-content icongetstarted "><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-06.png";?>"></div>
					<div class="tile-status"><span class="name"></span></div>
				</div>
			</a>
			
			<a href="<?php echo $base;?>admin/instructor_library_view?libtype=56&libid=170&section=desc&language=EN;" >
				<div class="tile double triple-half bg-black <?php echo $tile_class;?> half-opacity">
					<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_awareness_training."awareness_training-07.png";?>"></div>
					<div class="tile-status"><span class="name"></span></div>
				</div>
			</a>
        </div>
        
    </div>
</div>

<script type="text/javascript">
	$('.triple-half').click(function(){
		if($(this).hasClass('selected')){
			// $(this).removeClass('selected'); // Line is disabled because Tile should not unselected when its selected //
		}
		else{
			$(this).addClass('selected');
		}
	});
	
	
</script>


<?php $this->load->view('footer_admin'); ?>