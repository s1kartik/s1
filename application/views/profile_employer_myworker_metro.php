<?php
$flashdata 	= $this->session->flashdata('data');
$postdata 	= $this->session->flashdata('postdata');
$worker 	= isset($flashdata['worker']) ? $flashdata['worker'] : array();
$workermeta = isset($flashdata['workermeta']) ? $flashdata['workermeta'] : array();
$type 		= $this->session->userdata("usertype");
?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
        <form class="form-horizontal adminfrm" method="post" action="<?php echo $base;?>admin/profile_setting?section=myworker" enctype="multipart/form-data">
			<div class="padding10">
				<input type="text" name="name" id="search_worker_name" class="input-large searchworker" placeholder="search your workers" required />
				<button type="submit" class="btn btn-searchworker">Search</button>
				<input type="hidden" name="action" value="SEARCH" />
				<input type="hidden" name="page" value="myworkers"/>
				<input type="hidden" name="page_design" value="metro"/>
		   </div>
        </form>
        <?php 
		if(isset($worker) && count($worker)>0) {?>
			<form class="form-horizontal adminfrm" method="post" action="<?php echo $base;?>admin/profile_setting?section=myworker">
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label"><img src=" <?php if(empty($worker['profile_image'])):?><?php echo $base;?>img/default.png<?php else:?><?php echo $base.$this->path_upload_profiles.$worker['profile_image'];?><?php endif;?>" rel="" style="width: 100px;"/></label>
					<div class="controls"><label><span class="lead"><?php echo $worker['firstname'].' '.$worker['lastname'];?></span></</label></div>
				</div>
				
				<!-- Text input-->
				<!-- Multiple Radios (inline) -->
				<?php 
				if ($type == 7) {?>
					<div class="control-group">
						<label class="control-label">My Instructor</label>
						<div class="controls">
							<label class="radio inline" id="instructor_set"><input type="radio" name="is_instructor" value="y" <?php if(isset($workermeta['is_instructor']) && $workermeta['is_instructor']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
							<label class="radio inline"><input type="radio" name="is_instructor" value="n" <?php if(!isset($workermeta['is_instructor']) || $workermeta['is_instructor']!="y"):?>checked="checked"<?php endif;?> /> N</label>
						</div>
					</div>
				<?php }?>
				<div class="control-group">
					<label class="control-label">H&S REP</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" name="hsrep" value="y" <?php if(isset($workermeta['hsrep']) && $workermeta['hsrep']=="y"):?>checked="checked" <?php endif;?> /> Y</label> 
						<label class="radio inline"><input type="radio" name="hsrep" value="n" <?php if(!isset($workermeta['hsrep']) || $workermeta['hsrep']!="y"):?>checked="checked" <?php endif;?> /> N</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">JHSC</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" name="jhsrep" value="y" <?php if(isset($workermeta['jhsrep']) && $workermeta['jhsrep']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
						<label class="radio inline"><input type="radio" name="jhsrep" value="n" <?php if(!isset($workermeta['jhsrep']) || $workermeta['jhsrep']!="y"):?>checked="checked"<?php endif;?> /> N</label>
					</div>
				</div><!-- Multiple Radios (inline) -->
				<div class="control-group">
					<label class="control-label">Supervisor</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" name="is_supervisor" value="y" <?php if(isset($workermeta['is_supervisor']) && $workermeta['is_supervisor']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
						<label class="radio inline"><input type="radio" name="is_supervisor" value="n" <?php if(!isset($workermeta['is_supervisor']) || $workermeta['is_supervisor']!="y"):?>checked="checked"<?php endif;?> /> N</label>
					</div>
				</div>
				<!-- Multiple Radios (inline) -->
				<div class="control-group">
					<label class="control-label">Profile Manager</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" name="is_profile_manager" value="y" <?php if(isset($workermeta['is_profile_manager']) && $workermeta['is_profile_manager']=="y"):?>checked="checked"<?php endif;?> /> Y</label> 
						<label class="radio inline"><input type="radio" name="is_profile_manager" value="n" <?php if(!isset($workermeta['is_profile_manager']) || $workermeta['is_profile_manager']!="y"):?>checked="checked"<?php endif;?> /> N</label>
					</div>
				</div><!-- Multiple Radios (inline) -->
				<div class="inline text-center">
					<button class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='<?php echo $base.'admin/profile_view_integrated';?>';">Cancel</button>
					<input type="hidden" name="userid" value="<?php echo $worker['id'];?>" />
					<input type="hidden" name="action" value="UPDATE" />
					<input type="hidden" name="page" value="myworkers"/>
					<input type="hidden" name="page_design" value="metro"/>
				</div>
			</form>
        <?php 
		} 
		elseif( isset($postdata['name']) ) {?>
			<p class="padding10">No Workers match your search, please try different name.</p>
        <?php 
		}?>
		
		<?php 
		if( "7" == $type ) {?>
			<!--********************* BEGIN INSTRUCTOR KEY INSERTING ******************* -->
				<div id="myworker_instructor" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 >Instructor Key</h3>
					</div>
					<div class="modal-body">
						<!--BEGIN BODY MODAL -->
						<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
							<div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">
								<p>Please set the Instructor Key:</p>
								<div class="controls ">
									<form class="frm_union_instructor" method="post" class="adminfrm" action="<?php echo $base;?>admin/profile_setting?section=myworker">
										<input id="instructor_key" name="instructor_key" value="" type="password" class="input-xlarge" placeholder="Instructor Key" required/>
										<input id="confirm_instructor_key" name="confirm_instructor_key" value="" type="password" class="input-xlarge" placeholder="Confirm Instructor Key" required/>
										<input class="btn pull-right" type="submit" name="submit" value="Submit" />
										<input type="hidden" name="is_instructor" value="y"/>
										<input type="hidden" name="userid" value="<?php echo isset($worker['id']) ? $worker['id'] : '';?>" />
										<input type="hidden" name="page" value="myworkers"/>
										<input type="hidden" name="page_design" value="metro"/>
									</form>
								</div>
							</div>
						 </div>
						<!--END BODY MODAL-->  
					</div>
				</div>
			<!--********************* END MODAL INSTRUCTOR KEY******************* -->	
		<?php 
		}
if("7" != $type) { // 7 = Union //?>
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<?php }?>
<script type="text/javascript">
	$(document).on('click', '#instructor_set', function() {
		$('#myworker_instructor').modal('show')
	});
	$(document).ready(function () 
	{
		$.validator.addMethod("alphanumeric", function(value, element) {
			return this.optional(element) || /^\w+$/i.test(value);
		}, "Instructor Key must be Letters or Numbers.");
		$('.frm_union_instructor').validate({
			rules: {
                instructor_key: {
                    required: true, 
                    minlength: 4, 
					maxlength: 6, 
					alphanumeric: true
                }, 
				confirm_instructor_key: {
					equalTo: "#instructor_key"
                }
            }, 
            messages: {
				instructor_key: {
					required: "Please enter Instructor Key.", 
					minlength: "Instructor Key should not be less than 4 and more than 6 characters.", 
					maxlength: "Instructor Key should not be less than 4 and more than 6 characters.",
				}, 
				confirm_instructor_key: {
					required: "Please enter Confirm Instructor Key.", 
					equalTo: "Please enter same Instructor Key."
				}
            }
		});
	});
	
	$(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
      
    $( "#search_worker_name" )
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