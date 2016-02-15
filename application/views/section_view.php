<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Sectors</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=section"><i class="icon-plus-2"></i> New Sector</a>
        <div class="input-prepend input-append">
            <form method="post">
            <span class="add-on">Industry</span>
            <select name="industry_id" id="industry_id">
                <option value="">-select-</option>
                <?php 
				$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
				foreach($industries as $in) {?>
					<option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>
					<?php 
				}?>
            </select>
            <span class="">Sector</span>
            <input type="text" name="sector" value="" class="input-large" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php 
                    $elements = $this->users->getTableColumn('tbl_section', 'sectionname');
                    foreach( $elements as $el ) {
                        echo '<option>'.$el['sectionname'].'</option>';
					}
                ?>            
            </datalist>
            <input class="btn" type="submit" value="Search"/>
            <input type="hidden" name="searchfor" value="section"/>
            </form>
        </div>     
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
               <thead>
                <tr><th>Industry</th><th>Sector Name</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
               </thead>
                <?php 
                    foreach($list as $admin):
                    $industry = $this->users->getElementByID('tbl_industry', $admin['industry_id']);
                ?>
                <tr>
                    <td data-title="Industry"><?php echo $industry['industryname'];?></td>
                    <td data-title="Sector Name"><?php echo $admin['sectionname'];?></td>
                    <td data-title="Description"><?php echo $admin['description'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=section&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <p>No data</p>
        <?php endif;?>
</div>
<script type="text/javascript">
	$(document).ready(function () {         
        $('#industry_id').change(function(){
            $industry_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElementText', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#searchresults").html(data);
            });
        });	   
    });
</script>        
</div>
<?php $this->load->view('footer_admin'); ?>