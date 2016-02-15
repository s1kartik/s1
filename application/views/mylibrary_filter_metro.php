 <!--Start Library Category Filter -->
 <!--div id="row-filter">
    <div class="profile-content-filter"-->
    <style>
	.styled-select{	
   
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border:none;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   
   }
   
	   option:hover{
		   box-shadow: 0 0 10px 100px #FF0000 inset;
	   }
	   
	</style>
        <form class="form-inline" method="post" id="filterfrm">
            <fieldset>
                
                   
                        <select id="industry_id" name="industry_id" class="styled-select bg-darker spannews1 fg-white">
                            <option value="">-Industry-</option>
                            <?php
                                $industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
                                foreach($industries as $in):
                                $selected = (isset($_POST['industry_id'])&&$_POST['industry_id']==$in['id'])?'selected="selected"':'';
                            ?>
                    	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select  id="section_id" name="section_id" class="styled-select bg-darker spannews1 fg-white">
                            <option value="">-Section-</option>
                            <?php
                            if(isset($_POST['industry_id']) && (int)$_POST['industry_id']>0){
                            $sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $_POST['industry_id']);
                            
                            foreach($sections as $sc):
                            $selected = (isset($_POST['section_id'])&&$_POST['section_id']==$sc['id'])?'selected="selected"':'';
                            ?>
                    	    <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
                            <?php endforeach;                       
                                }
                            ?>
                        </select>
                        <select id="trade_id" name="trade_id" class="styled-select bg-darker spannews1 fg-white">
                            <option value="">-Trade-</option>
                            <?php
                            if(isset($_POST['industry_id']) && (int)$_POST['industry_id']>0 && isset($_POST['section_id']) && (int)$_POST['section_id']>0){
                            $trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $_POST['industry_id'], 'section_id', $_POST['section_id']);
                            foreach($trades as $sc):
                            $selected = (isset($_POST['trade_id'])&&$_POST['trade_id']==$sc['trade_id'])?'selected="selected"':'';
                            ?>
                    	    <option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
                            <?php endforeach;                       
                                }
                            ?>
                        </select>
                        <input type="text" class="styled-select bg-darker spannews1 fg-white" name="title" placeholder="Title" value="<?php echo isset($_POST['title'])?htmlspecialchars($_POST['title']):"";?>" />
                        <input type="text" class="styled-select bg-darker spannews1 fg-white" name="description" placeholder="Description" value="<?php echo isset($_POST['description'])?htmlspecialchars($_POST['description']):"";?>" />
                        
                        <select name="language" class="styled-select bg-darker spannews1 fg-white" >
                            <option value="">-Language-</option>
                            <?php
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $in):
                            $selected = (isset($_POST['language'])&&$_POST['language']==$in['abbr'])?'selected="selected"':'';
                            ?>
                    	    <option value="<?php echo $in['abbr'];?>" <?php echo $selected;?>><?php echo $in['language'];?></option>
                            <?php endforeach;?>
                        </select>
                        
                        <?php $curi = uri_string();?>
                        <select name="status" class="spannews1 <?php if($curi!='admin/library'):?>hide<?php endif;?>">
                    	    <option value="1">Active</option>
                            <option value="0" <?php if(isset($_POST['status']) && $_POST['status']<1):?>selected="selected"<?php endif;?>>Inactive</option>
                        </select>
                        
                        <input type="hidden" name="action" value="FILTER"/>
                        <button type="submit" class="bg-red fg-white"><strong>Go!</strong></button>
                
            </fieldset>
        </form>
    <!--/div>
    <!--begin library filter -->
    <!-- end library filter -->
<!--/div-->
<script type="text/javascript">

	$(document).ready(function () {         
        $('#industry_id').change(function(){
            $industry_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
                $("#section_id").html(data);
            });
        });
        $('#section_id').change(function(){
            $industry_id = $('#industry_id').val();
            $section_id = $('#section_id').val();
            $.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
                $("#trade_id").html(data);
            });
        }); 
        $('.pagination ul li a').click(function(){
            $('#filterfrm').attr('action', '?page='+$(this).attr('rel')).submit();
        })     
    });
</script>