<?php $this->load->view('header_admin'); ?>
<div class="homebg metro ">
		    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">UNIONS</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <?php if(count($list)>0) {?>
    	<div class="container-fluid padding-metro-home ">
        <div class="row-fluid" >

        <?php 
		foreach($list as $union) {
			$union_training = $this->users->getMetaDataList('usermeta', 'user_id="'.$union['id'].'" AND meta_key="union_training_centre"', '', 'meta_value');
			$union_training = isset($union_training[0]['meta_value']) ? $union_training[0]['meta_value'] : '';

			if( !$union_training ) {?>
				<a href="<?php echo $base;?>admin/view_union_metro?id=<?php echo $union['id']?>" class="tile triple double-vertical bg-white text-center ">
					<div class="panel-header bg-white fg-black" ><strong><?php echo strtoupper($union['firstname']);?> <?php echo strtoupper($union['lastname']);?></strong></div>
					<div>
						<?php 
						if( !empty($union['profile_image']) ) {
							$pimg = $base.$this->path_upload_profiles.$union['profile_image'];
						}
						else {
							$pimg = $base."img/default.png";
						}
						?>
						<img class="union-logo" src="<?php echo $pimg;?>" rel="<?php echo $union['id'];?>" height="200px" width="200px"/>
					</div>
					<div class="tile-status">
						<?php $industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
						$industry = $industry['industryname'];
						?>
						<span class="brand bg-black fg-white"><?php echo strtoupper($union['nickname']);?>, <?php echo strtoupper($industry);?></span>
					</div>
				</a>
        <?php 
			}
			}?>
        	            
        </div>
    </div>
     <?php 
		}
		else {?>
            <h6>No data found</h6>
        <?php 
		}?>
</div>

<?php $this->load->view('footer_admin'); ?>

