<?php $this->load->view('header_admin'); ?>
<div class="info-container">
<div class="tab-pane admin-settings" id="administrators">
    <h4>User Type Allowance</h4>
        <p>
            <select id="usertype">
                <option value="">-select user type-</option>
                <?php 
                    $list = $this->users->getMetaDataList('usertype');
                    foreach($list as $type):
                ?>
                    <option value="<?php echo $type['id'];?>"><?php echo $type['typename'];?></option>
                <?php endforeach;?>
            </select>
        </p>
        <div id="allowance-holder"></div>
</div>
<style type="text/css">
        .row-fluid .span6 {
            width: 47.4%;
            min-height: 200px;
        }
        .row-fluid .span6:first-child{
            margin-left: 2.5641%
        }
        
        .form-horizontal .span6 .control-label{
            width: 180px;
        }
        .form-horizontal .span6 .controls{
            margin-left: 200px;
        }
        .clear{
            clear: both;
        }
</style>  
<script type="text/javascript">
	$(document).ready(function () {
        $('#usertype').change(function(){
            if($(this).val()!=""){
                $.post(
                    '<?php echo $base;?>admin/getAllowanceByUserTypeID',
                    {'id': $(this).val()},
                    function(data) {
                            $('#allowance-holder').html(data);
                    }
                );                
            }   
        })
    });
</script>         
</div>
<?php $this->load->view('footer_admin'); ?>