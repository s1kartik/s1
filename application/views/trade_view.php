<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Trades</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=trade"><i class="icon-plus-2"></i> New Trade</a>
        <div class="input-prepend input-append">
            <form method="post">
            <span class="add-on">Industry</span>
            <select class="input-medium" name="industry_id" id="industry_id">
                <option value="">-select-</option>
                <?php
                    $industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
                    foreach($industries as $in):
                ?>
        	    <option value="<?php echo $in['id'];?>"><?php echo $in['industryname'];?></option>
                <?php endforeach;?>
            </select>
            <span class="add-on">Sector</span>
            <select class="input-medium" name="sector_id" id="sector_id">
            </select>
            <input type="text" name="trade" value="" class="input-small" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php
                    $elements = $this->users->getTableColumn('tbl_trade', 'tradename');
                    foreach($elements as $el)
                        echo '<option>'.$el['tradename'].'</option>';                 
                ?>            
            </datalist> 
            <input class="btn" type="submit" value="Search"/>
            <input type="hidden" name="searchfor" value="trade"/>
            </form>
        </div>        
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
               <thead> 
                <tr><th>Industry</th><th>Sector</th><th>Trade name</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
               </thead>
                <?php 
                    foreach($list as $admin):
                ?>
                <tr>
                    <td data-title="Industry"><?php echo $admin['industryname'];?></td>
                    <td data-title="Sector">
                        <?php echo $admin['section_id']<1?'All':$admin['sections'];?>
                    </td>
                    <td data-title="Trade Name"><?php echo $admin['tradename'];?></td>
                    <td data-title="Description"><?php echo $admin['description'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=trade&id=<?php echo $admin['trade_id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>
        <?php endif;?>
</div>
<script type="text/javascript">
	$(document).ready(function () {         
        $('#industry_id').change(function(){
            $industry_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#sector_id").html(data);
            });
        });	   
    });
</script>
</div>
<?php $this->load->view('footer_admin'); ?>