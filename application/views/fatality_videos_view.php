<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Fatality Videos</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/fatalityvideo"><i class="icon-plus-2"></i> New Fatality Video</a>
        <?php if(count($list) > 0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
					<tr>
						<th>Title</th>
						<th>Thumbnail</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
                </thead>
                <?php 
				foreach($list as $admin) {?>
					<tr>
						<td class="wordbreak" data-title="Fatality Video"><?php echo $admin['st_fatality_video_title'];?></td>
						<td class="wordbreak" data-title="Thumbnail"><img src="<?php echo $base."img/fatality/".$admin['st_fatality_video_thumbnail'];?>" width="75" height="75" title="<?php echo $admin['st_fatality_video_title'];?>"/></td>
						<td class="wordbreak" data-title="Status"><?php echo ($admin['in_fatality_video_status'] == 1)?'Active':'Inactive';?></td>
						<td class="wordbreak" data-title="Action" title="Edit Fatality Video"><a href="<?php echo $base."admin/fatalityvideo?videoid=".$admin['id'];?>"><i class="icon-enter"></i></td>
					</tr>
                <?php 
				}?>
            </table>
        <?php 
		}
		else {?>
            <h6>No data found</h6>
        <?php 
		}?>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>