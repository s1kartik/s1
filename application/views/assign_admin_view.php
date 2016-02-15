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
      
    $( "#searchname" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo $base;?>ajax/ajax_getConnections", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 1 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        }
      });            
  });
</script>
    <h3>ASSIGN LIBRARY PIECES</h3>
    <?php if(isset($textmsg)):?>
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
        <?php foreach($textmsg as $msg):?>
            <li><?php echo $msg;?></li>
        <?php endforeach;?>
        </ul>
    </div>
    <?php endif;?>
    <div id="library-container" class="content-row clearfix" >
    
    <form method="post">
        <div id="inventory-left">
            <div class="inventory-heading">
                <div class="pull-left"><label class="checkbox"><input type="checkbox" rel="inventories" class="checkall"/></label></div>
                <h5 >INVENTORY</h5>
            </div>
            <!-- Begin skillset items section -->
            <ul class="inline inventory-group" id="inventories">
                <!--  item-->
                <?php 
				$inventories = isset($inventories) ? $inventories : array();
				foreach($inventories as $in) {?>
                <li class="clearfix">
				    <div class='inventory-item'>
    				    <div class="inventory-checkbox">
    				        <input type="checkbox" name="lib_id[]" value="<?php echo $in['lib_id'];?>"/>
    				    </div>
    				    <div class="inventory-item-img draggable">
    					   <a href="#" title="Drag me!">
    						  <img src='<?php echo $base;?>img/icons/icon-<?php echo strtolower($in['language']);?>.png'  alt="<?php echo $in['lib_id'];?>"/>
    					   </a>
    				    </div>
    					<div class="inventory-item-info">
    						<p>
    						  <strong>
    							 <a href="#"><?php echo $in['lib_title'];?></a>
    						  </strong>
    						</p>
            			</div>
    					<div class="inventory-item-qt text-right">
    					   <h5 id="balance<?php echo $in['lib_id'];?>"><?php echo $in['qty_ordered']-(int)$in['qty_assigned'];?></h5>
    					   <p><small>pieces left</small></p>
    					</div>
                        <div class="clear"></div>
                    </div>
                </li>
                <?php }?>
                <!--  item --> 
            </ul>
        </div>
    <!-- End skillset items section --> 
        <div id="inventory-right">
            <div class="inventory-heading">
                <!--<div class="pull-left"><label class="checkbox"><input type="checkbox" rel="members" class="checkall"/></label></div>-->
                <h5 class="pull-left">MEMBERS</h5>
                <div class="pull-right input-append">
                    <input type="text" name="name" id="searchname" class="span8 searchtxt" placeholder="search members" />
                    <button type="submit" name="action" class="btn btn-search" value="SEARCH">Search</button>
                    <input type="hidden" name="page" value="myworkers"/>
                </div>
                <div class="clear"></div>
            </div>
    <!-- End skillset items section -->
            <!-- Begin skillset items section -->
            <ul class="inline inventory-group" id="members">
                <!--  item-->
                <?php foreach($links as $ln):?>
                <li class="clearfix" rel="<?php echo $ln['worker_id'];?>">
    				<div class='inventory-item member-wrapper'>
    				    <div class="inventory-checkbox">
                            <input type="checkbox" name="userid[]" value="<?php echo $ln['worker_id'];?>"/>
    				    </div>
    				    <div class="member-item-img">
    					   <a href="#" >
    						  <img src='<?php echo !empty($ln['profile_image'])?$base.$this->path_upload_profiles.$ln['profile_image']:$base.'img/default.png';?>' alt="<?php echo $ln['nickname'];?>" />
    					   </a>
    				    </div>
    					<div class="inventory-item-info">
    						<p>
    						  <strong>
    							 <a href="#" ><?php echo $ln['firstname']." ".$ln['lastname'];?></a>
    						  </strong>
    						</p>
            			</div>
    					<div class="inventory-item-qt text-right">
    					   <p><small><a href="<?php echo $base;?>admin/profile_setting?section=myworker">view profile</a></small></p>
    					</div>
                        <div class="clear"></div>
          			</div>
                </li>
                <?php endforeach;?>
                <!--  item -->
             </ul>
        </div>
        <div class="pull-right assign-button"><button class="btn">Assign</button></div>
    </form>    
    </div>
    <!-- End FOURTH content row TRADE CERTIFICATION--> 
    <script type="text/javascript">
	$(document).ready(function () {
	   $('.checkall').change(function(){
	       $rel = $(this).attr('rel');
           if($(this).is(':checked')){
                $('#'+$rel+' input[type=checkbox]').prop("checked", true);
           }else{
                $('#'+$rel+' input[type=checkbox]').prop("checked", false);
           }
	   })
	})
    </script>
    <script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
    <script type="text/javascript">
        var jq201 = jQuery.noConflict();
        jq201(document).ready(function () {
            jq201('.draggable img').draggable({helper: 'clone', start: function (event, ui) {
                /*
                    jq201(ui.helper).css("margin-left", event.clientX - jq201(event.target).offset().left);
                    jq201(ui.helper).css("margin-top", event.clientY - jq201(event.target).offset().top);*/
            }});
            
            jq201('#members .clearfix').droppable({
              drop: function( event, ui ) {
                $lib_id = ui.draggable.attr('alt');
                jq201.post('<?php echo $base;?>ajax/ajax_assign_inventory', {'lib_id':$lib_id, 'worker_id': $(this).attr('rel')}, function(data){
                    if(data.trim() != '')
                        alert(data);
                    else{
                        $qty = $('#balance'+$lib_id).text();
                        $qty = parseInt($qty) - 1;
                        $('#balance'+$lib_id).text($qty);
                        if($qty<1)
                            ui.draggable.draggable('disable').parent().parent().parent().css({ opacity: 0.5 }).children().children('input[type=checkbox]').prop('disabled', true);
                    }
                })
              }
            });
        }) 
    </script>    
<?php $this->load->view('footer_admin'); ?>