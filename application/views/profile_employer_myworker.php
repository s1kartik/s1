<?php $this->load->view('header_admin'); ?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script>
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
<div class="info-container">
    <div class="document-content">
        <form class="form-horizontal adminfrm" method="post">
            <!-- Form Name -->
            <legend>My Worker Professional Information</legend>
                    <div>
                    <input type="text" name="name" id="searchname" class="input-large searchtxt" placeholder="search your workers" required />
                    <button type="submit" class="btn btn-search">Search</button>
                    <input type="hidden" name="action" value="SEARCH" />
                    <input type="hidden" name="page" value="myworkers"/>
                   </div>
        </form>
        <?php if(isset($worker) && count($worker)>0):?>
        <form class="form-horizontal adminfrm" method="post">                    
         <!-- Text input-->
         <div class="control-group">
            <div class="controls">
                <ul class="inline clearfix">
                  <li class="linked-img">
                    <img src=" <?php if(empty($worker['profile_image'])):?><?php echo $base;?>img/default.png<?php else:?><?php echo $worker['profile_image'];?><?php endif;?>" rel="" style="width: 100px;"/>
                  </li>
                   <li class="contact-details">
                    <p><span class="lead"><?php echo $worker['firstname'].' '.$worker['lastname'];?></span> </p>
                    
                  </li>
                   
                </ul>
                 </div>
            </div>  
              
            <!-- Text input-->
            
            <div class="control-group">
                                            <label class="control-label">Health and Safety Representative</label>
                                            <div class="controls">
                                                <label class="radio inline"><input type="radio" name="hsrep" value="y" <?php if(isset($workermeta['hsrep']) && $workermeta['hsrep']=="y"):?>checked="checked"<?php endif;?> /> y</label> 
                                                <label class="radio inline"><input type="radio" name="hsrep" value="n" <?php if(!isset($workermeta['hsrep']) || $workermeta['hsrep']!="y"):?>checked="checked"<?php endif;?> /> n</label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Joint Health and Safety Committe</label>
                                            <div class="controls">
                                                <label class="radio inline"><input type="radio" name="jhsrep" value="y" /> y</label> 
                                                <label class="radio inline"><input type="radio" name="jhsrep" value="n" checked="checked" /> n</label>
                                            </div>
                                        </div><!-- Multiple Radios (inline) -->
            <div class="control-group">
                                            <label class="control-label">Supervisor</label>
                                            <div class="controls">
                                                <label class="radio inline"><input type="radio" name="is_supervisor" value="y" <?php if(isset($workermeta['is_supervisor']) && $workermeta['is_supervisor']=="y"):?>checked="checked"<?php endif;?> /> y</label> 
                                                <label class="radio inline"><input type="radio" name="is_supervisor" value="n" <?php if(!isset($workermeta['is_supervisor']) || $workermeta['is_supervisor']!="y"):?>checked="checked"<?php endif;?> /> n</label>
                                            </div>
                                        </div><!-- Multiple Radios (inline) -->
                                        <div class="control-group">
                                            <label class="control-label">Profile Manager</label>
                                            <div class="controls">
                                                <label class="radio inline"><input type="radio" name="is_profile_manager" value="y" <?php if(isset($workermeta['is_profile_manager']) && $workermeta['is_profile_manager']=="y"):?>checked="checked"<?php endif;?> /> y</label> 
                                                <label class="radio inline"><input type="radio" name="is_profile_manager" value="n" <?php if(!isset($workermeta['is_profile_manager']) || $workermeta['is_profile_manager']!="y"):?>checked="checked"<?php endif;?> /> n</label>
                                            </div>
                                        </div><!-- Multiple Radios (inline) -->
                <div class="inline text-center">
                    <button class="btn btn-primary">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                    <input type="hidden" name="userid" value="<?php echo $worker['id'];?>" />
                    <input type="hidden" name="action" value="UPDATE" />
                    <input type="hidden" name="page" value="myworkers"/>
                </div>
            
        </form>
        <?php elseif($_SERVER['REQUEST_METHOD']=='POST'):?>
        <p>No Workers match your search, please try different name.</p>
        <?php endif;?>
    </div>
</div>    
<?php $this->load->view('footer_admin'); ?>