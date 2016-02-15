<?php $this->load->view('header_admin'); ?>
<div class="info-container metro">
<div class="tab-pane admin-settings" id="administrators">
    <h4>Cities</h4>
        <a class="admin-new" href="<?php echo $base;?>admin/new_metadata?type=city"><i class="icon-plus-2"></i> New City</a>
        <div class="input-prepend input-append">
            <form method="post">
            <span class="add-on">Country</span>
            <select class="input-medium" name="country_id" id="country_id">
                <option value="">-select-</option>
                <?php
                    $countries = $this->users->getMetaDataList('country');
                    foreach($countries as $in):
                ?>
        	    <option value="<?php echo $in['id'];?>"><?php echo $in['countryname'];?></option>
                <?php endforeach;?>
            </select>
            <span class="add-on">Province</span>
            <select class="input-medium" name="province_id" id="province_id">
            </select>
            <input type="text" name="city" value="" class="input-small" list="searchresults" autocomplete="off" />
            <datalist id="searchresults">
                <?php
                    $elements = $this->users->getTableColumn('tbl_city', 'cityname');
                    foreach($elements as $el)
                        echo '<option>'.$el['cityname'].'</option>';                 
                ?>            
            </datalist> 
            <input class="btn" type="submit" value="Search"/>
            <input type="hidden" name="searchfor" value="city"/>
            </form>
        </div>        
        <?php if(count($list)>0):?>
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <tr><th>Country</th><th>Province</th><th>City Name</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>
              </thead>
                <?php 
                    foreach($list as $admin):
                    $country = $this->users->getElementByID('tbl_country', $admin['country_id']);
                    $province = $this->users->getElementByID('tbl_province', $admin['province_id']);
                ?>
                <tr>
                    <td data-title="Country"><?php echo $country['countryname'];?></td>
                    <td data-title="Province"><?php echo $province['provincename'];?></td>
                    <td data-title="City Name"><?php echo $admin['cityname'];?></td>
                    <td data-title="Start Date"><?php echo $admin['date_start'];?></td>
                    <td data-title="End Date"><?php echo $admin['date_end'];?></td>
                    <td data-title="Status">
                        <?php echo ($admin['date_start']<=date('Y-m-d') && (empty($admin['date_end']) || date("Y-m-d", strtotime($admin['date_end']))>=date('Y-m-d')))?'Active':'Inactive';?>
                    </td>
                    <td data-title="Edit"><a href="<?php echo $base;?>admin/update_meta?type=city&id=<?php echo $admin['id'];?>"><i class="icon-enter"></i></a></td>
                </tr>
                <?php endforeach;?>
            </table>
        <?php else:?>
            <h6>No data found</h6>            
        <?php endif;?>
</div>
<script type="text/javascript">
	$(document).ready(function () {         
        $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });	   
    });
</script>     
</div>    
<?php $this->load->view('footer_admin'); ?>