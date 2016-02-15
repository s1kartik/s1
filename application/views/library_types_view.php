<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane  admin-settings" id="administrators">
    <h4>Library Types</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=library_types"><i class="icon-plus-2"></i> New Library Type</a>
        <div class="input-prepend input-append">
            <form method="post">
            <input type="hidden" name="searchby" value="library_type" />
            <input type="text" name="searchval" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php 
                    $elements = $this->users->getTableColumn('tbl_library_types', 'library_type');
                    foreach($elements as $el) {
                        echo '<option>'.$el['library_type'].'</option>';
					}
                ?>
            </datalist>
            <input class="btn" type="submit" value="Search"/>
            </form>
        </div>
        <?php if(count($list)>0) {?>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <tr><th>Type Name</th><th>Parent</th><th>Status</th><th>Action</th></tr>
                </thead>
                <?php 
				foreach( $list as $admin ) {
					$parent_libtype = '';
					$arr_parent_libtypes = explode(",", $admin['parent_library_type']);
					if( is_array($arr_parent_libtypes) ) {
						$rows_union_users = $this->users->getMetaDataList('user', 'find_in_set(id,"'.$admin['parent_library_type'].'")', '', 'nickname');
						if( isset($rows_union_users) && sizeof($rows_union_users)>0 ) {
							foreach( $rows_union_users AS $key => $val ) {
								$parent_libtype[] = $val['nickname'];
							}
							$parent_libtype = implode(", ", $parent_libtype);
						}
						else {
							$parent_libtype = $admin['parent_library_type'];
						}
					}
					?>
					<tr>
						<td data-title="Type Name"><?php echo $admin['library_type'];?></td>
						<td data-title="Type Name"><?php echo $parent_libtype;?></td>
						<td data-title="Status"><?php echo ($admin['library_type_status']=='1')?"Active":"Inactive";?></td>
						<td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=library_types&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
					</tr>
				<?php
				}?>
            </table>
        <?php }
		else{?>
            <h6>No data found</h6>            
        <?php }?>
</div>       
</div> 
<?php $this->load->view('footer_admin'); ?>