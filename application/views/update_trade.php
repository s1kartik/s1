<?php $this->load->view('header_admin'); ?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
      
    $( "#section_label" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo $base;?>ajax/ajax_getSectorList?industry="+$('#industry_id option:selected').text(), {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = '';
          if($('#section'+ui.item.id).size()<1){
              $('#idwrapper').append('<input id="section'+ui.item.id+'" type="hidden" name="section_id[]" value="'+ui.item.id+'"/>');
              $('#selectedwrapper').append('<div class="itemblock"><a href="#" rel="'+ui.item.id+'">x</a>'+ui.item.value+'</div>')            
          }else{
              alert('This section has been selected already.')  
          }
          return false;
        }
      });
	  
      $(document).on('click', 'div.itemblock a', function(e){
        e.preventDefault();
        $rel = $(this).attr('rel');
        $('#section'+$rel).remove();
        $('#error'+$rel).remove();
        $(this).parent().remove();
      });
      $('#tradename').change(function(){
        validateTrade();
      });
      $('#selectedwrapper').bind('DOMNodeInserted DOMNodeRemoved', function(event) {
        if($('#tradename').val()!=""){
            validateTrade();
        }
      });            
  });
  </script>
  <script type="text/javascript">
      function validateTrade(){
        $('#idwrapper input').each(function(){
            $section = $(this).attr('title');
            $sid = $(this).val();
            $.post('<?php echo $base;?>admin/validateTradeUpdate', {'trade_name': $(tradename).val(), 'industry_id':$('#industry_id').val(), 'section_id': $sid, 'trade_id': <?php echo $admin['trade_id'];?>}, function(data){
                if(data>0){
                    $('#tradecontrol').append('<label id="error'+$sid+'" class="error" style="width: 270px;" for="email">This trade has been relataed to section '+$section+' already.</label>');
                }    
            });
        })
      }              
  </script>  
<div class="info-container">
    <div class="document-content">
    <form class="form-horizontal frm_update_trade" id="frm_update_trade" method="post">
    <fieldset>
    <!-- Form Name -->
    <legend>Trade</legend>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Industry </label>
      <div class="controls">
        <select  id="industry_id" name="industry_id" type="select" placeholder="Industry Name" class="input-xlarge" title="<?php echo $admin['industry_id'];?>" required>
            <?php
                $industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
                foreach($industries as $in):
                $selected = ($admin['industry_id']==$in['industry_id'])?'selected="selected"':'';
            ?>
    	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
            <?php endforeach;?>
        </select>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label">Sector </label>
      <div class="controls control-row">
        <input id="section_label" name="section_label" class="input-xlarge" value="" placeholder="ALL" style="vertical-align: top;"/>
        <?php $sections = $this->users->getMetaDataList('section2trade_view', 'trade_id="'.$admin['trade_id'].'"', '', '*' );?>
        <div id="idwrapper">
        <?php foreach($sections as $sc):?>
            <input id="section<?php echo $sc['section_id'];?>" type="hidden" name="section_id[]" value="<?php echo $sc['section_id'];?>"/>
        <?php endforeach;?>
        </div>
        <div class="input-xlarge" id="selectedwrapper">
        <?php foreach($sections as $sc):?>
            <div class="itemblock"><a href="#" rel="<?php echo $sc['section_id'];?>">x</a><?php echo $sc['sectionname'];?></div>
        <?php endforeach;?>
        </div>
      </div>
    </div>    
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Trade Name</label>
      <div class="controls" id="tradecontrol">
        <input id="tradename" name="tradename" type="text" placeholder="Trade Name" class="input-xlarge" title="<?php echo $admin['tradename'];?>" value="<?php echo $admin['tradename'];?>" required />
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Description</label>
      <div class="controls">
        <textarea  id="desc" name="desc" type="text" placeholder="Description" class="input-xlarge" required><?php echo $admin['description'];?></textarea>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >Start Date</label>
      <div class="controls">
        <input id="startdate" name="startdate" type="text" placeholder="Start Date" class="input-xlarge datepicker" value="<?php echo $admin['date_start'];?>"/>
      </div>
    </div>
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" >End Date</label>
      <div class="controls">
        <input id="enddate" name="enddate" type="text" placeholder="End Date" class="input-xlarge datepicker" value="<?php echo $admin['date_end'];?>"/>
      </div>
    </div>
    <div class="inline text-center">
    <input type="hidden" name="id" value="<?php echo $admin['trade_id'];?>" />
    <input type="hidden" name="type" value="trade" />
    <input type="hidden" name="field" value="tradename" />
    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-validate-date" />
    <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base;?>admin/metadata?type=trade'" />
    </div>
    </fieldset>
    </form>
    </div>
    <script type="text/javascript">
	$(document).ready(function () {
	    $('input.datepicker').Zebra_DatePicker({onSelect: function(e, selectedDate, $td, obj) {
            obj.val(e);	          
        }});
        /*
        $('#tradename, #industry_id, #section_id').change(function(){
            obj = $('#tradename');
            $initial_industry = $('#industry_id').attr('title');
            $initial_section = $('#section_id').attr('title');
            $initial_trade = $('#tradename').attr('title');
            if($initial_industry!=$('#industry_id').val() ||  $initial_section!=$('#section_id').val() || $initial_trade!=$('#tradename').val() ){
                $.post(
                        '<?php echo $base;?>admin/validateMetaDataRelatedTwo',
                        {'table': 'tbl_trade', 'field': 'tradename', 'value': $('#tradename').val(), 'filed_related1': 'industry_id', 'value_related1': $('#industry_id').val(), 'filed_related2': 'section_id', 'value_related2': $('#section_id').val()},
                        function(data) {
                            if(data=='false'){
                                if(obj.parent().children('label').size()<1)
                                    obj.parent().append('<label class="error" for="email">This trade name is already in use with the industry and section you selected.</label>')
                            }else{
                                obj.parent().children('label').remove();
                            }
                        }
                );  
            }else{
                obj.parent().children('label').remove();
            }              
        })*/         
        $('#industry_id').change(function(){
            $('#idwrapper, #selectedwrapper').empty();
        });	 
          
        $('#frm_update_trade').validate({});
    });
    </script>    
</div>    
<?php $this->load->view('footer_admin'); ?>