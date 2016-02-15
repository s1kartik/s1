<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>WSIB Rate Group</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/wsib_rategroup"><i class="icon-plus-2"></i> New Rate Group</a>
        <div class="input-prepend input-append">
            <form method="post">
            <span class="">Rate Group Sector</span>
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php 
                    $elements = $this->users->getTableColumn('tbl_wsib_rategroup', 'st_sector');
                    foreach( $elements as $el ) {
                        echo '<option>'.$el['st_sector'].'</option>';
					}
                ?>            
            </datalist>
            <input class="btn" type="submit" value="Search"/>
            <input type="hidden" name="searchby" value="st_sector"/>
            </form>
        </div>     
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
               <thead>
                <tr><th>Sector</th><th>Rate Group</th><th>Description</th><th>Action</th></tr>
               </thead>
                <?php 
                    foreach($list as $admin) {?>
						<tr>
							<td data-title="Sector"><?php echo isset($admin['st_sector']) ? $admin['st_sector'] : '';?></td>
							<td data-title="Rate Group"><?php echo isset($admin['in_rate_group']) ? $admin['in_rate_group'] : '';?></td>
							<td data-title="Rate Group Description"><?php echo isset($admin['st_rate_group_description']) ? $admin['st_rate_group_description'] : '';?></td>
							<td data-title="Edit"><a href="<?php echo $base;?>admin/wsib_rategroup?id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
						</tr>
						<?php 
					}?>
            </table>
        <?php else:?>
            <p>No data available</p>
        <?php endif;?>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>