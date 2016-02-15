<?php $this->load->view('header_admin');
$cp 	= isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp 	= $cp - 1;
$nextp 	= $cp + 1;
$this->load->view('library_filter');
?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>S1 Library</h4>
		<?php
		if( "Procedures"!=$libtype ) {?>
			<a class="admin-new" href="<?php echo $base;?>admin/new_library" class="pull-left"><i class="icon-plus-2"></i>&nbsp;New Library</a>
			<?php 
		}?>
        <div class="clear"></div>
        <?php 
		// Common::pr($list);
		if(count($list)>0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead><tr><th>Title</th><th>Type</th><th>Language</th><th>Start Date</th><th>Status</th><th>Action</th></tr></thead>
                <?php 
				foreach($list as $lib) {?>
					<tr>
						<td class="wordbreak" data-title="Title"><?php echo $lib['title'];?></td>
						<td class="wordbreak" data-title="Title"><?php echo (isset($lib['library_type'])&&"Procedures"==$lib['library_type']) ? "S1&nbsp;".$lib['library_type'] : $lib['library_type'];?></td>
						<td data-title="Language"><?php echo $lib['language'];?></td>
						<td data-title="Start Date"><?php echo date("Y-m-d", strtotime($lib['date_start']));?></td>
						<td data-title="Status"><?php echo $lib['status']>0?'Active':'Inactive';?></td>
						<?php 
						if( "Procedures"!=$lib['library_type'] && "New Procedures" != $lib['library_type'] ) {?>
							<td nowrap="nowrap" data-title="Edit">
								<a href="<?php echo $base;?>admin/update_library?lib=<?php echo $lib['library_id'];?>" title="Update Library"><i class="icon-enter"></i></a> 
								<?php 
								if($lib['status']<1 && $lib['library_type_id']!='6') {?>
									<a href="<?php echo $base;?>admin/library_pages?lib=<?php echo $lib['library_id'];?>" title="Edit Library Pages"><i class="icon-book"></i></a>
									<a href="<?php echo $base;?>admin/add_library_page?lib=<?php echo $lib['library_id'];?>" title="Add Library Pages"><i class="icon-plus"></i></a>
									<?php 
								}?>
							</td>
							<?php
						}
						else {
							echo "<td>-</td>";
						}?>
					</tr>
					<?php 
				}?>
            </table>
            <div class="pagination pull-right <?php if($pages<2){echo 'hide';}?>">
              <ul>
                <?php 
				if($prevp>0) {?>
					<li><a href="#" rel="<?php echo $prevp;?>">Prev</a></li>
					<?php 
				}
                for($i=$startp; $i<$startp+10; $i++) {
					if($i<=$pages) {?>
						<li><a href="#" rel="<?php echo $i;?>"><?php echo $i;?></a></li>
						<?php 
					}
					else {
						break;
					}
				}
                if($nextp<=$pages) {?>
					<li><a href="#" rel="<?php echo $nextp;?>">Next</a></li>
					<?php 
				}?>
              </ul>
            </div>            
			<?php 
		}
		else {
            echo "<h5>No data found, please try again.</h5>";
        }?>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>