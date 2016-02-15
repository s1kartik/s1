<?php $this->load->view('header_admin');
?>
<div class="info-container metro">
  <form class="form-inline" method="post" id="publicPage">
<div class="tab-pane admin-settings" id="administrators">    
    <h4>Public Pages</h4>
    <div id="row-filter">
        <div class="profile-content-filter">                
                        <fieldset>
                        <div class="controls">
                            <select id="cmb_usertype" name="cmb_usertype" style="width:170px" >
                               <option value="">Select User Type</option>
                              <?php if(isset($filter_type) && $filter_type == 8 ) { ?>
                                    <option value="8" selected>Employer</option>
                              <?php } else {?>
                                    <option value="8"  >Employer</option>
                              <?php }if(isset($filter_type) && $filter_type == 12 ) { ?>      
                                    <option value="12" selected>Consultants</option>
                              <?php } else {?>
                                     <option value="12">Consultants</option>
                              <?php } if(isset($filter_type) && $filter_type == 7 ) { ?>
                                    <option value="7" selected>Union</option>
                              <?php } else {?>
                                    <option value="7">Union</option>
                              <?php } if(isset($filter_type) && $filter_type == "utc" ) { ?>
                                    <option value="utc" selected>Union Training Center</option>
                              <?php } else {?> 
                                    <option value="utc">Union Training Center</option>
                              <?php } ?>
                            </select>
			<input type="text" class="spannews1" id="txt_username" name="txt_username" placeholder="User Name" value="<?php echo isset($filter_name)?htmlspecialchars($filter_name):"";?>" />
			<textarea id="hidn_txtarea_username" name="hidn_txtarea_username" style="display: none;"></textarea>
			<button type="button" class="btn searchbtn">Go!</button>
            </div>
            </fieldset>
        </div>
    </div>
        <div class="clear"></div>
        <?php //Common::pr($list); 
        if(count($list)>0) {?>
        <div style="float:right;padding-top: 3px;padding-bottom: 3px;">
            <input name="actionType" id="actionType" type="hidden" value="">
            <button type="button" class="btn designate" >Grant Access Public page </button>
            &nbsp;
            <button type="button" class="btn removeAccess" >Deny Access Public page </button></div>
        </div>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                        <tr>
                                <th>Profile Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Status of S1 Public Pages</th>
                                <th>S1 Public Pages</th>                                
                        </tr>
                </thead>
                <?php foreach($list as $admin) {?>
                            <tr>
                                    <td data-title="Profile Image">
                                            <?php 
                                            if( !empty($admin['profile_image']) ) {
                                                    $pimg = $base.$this->path_upload_profiles.$admin['profile_image'];
                                            }
                                            else {
                                                    $pimg = $base."img/default.png";
                                            }
                                            ?>
                                            <img src="<?php echo $pimg;?>" rel="<?php echo $admin['id'];?>" width="70">
                                    </td>
                                    <td class="wordbreak" data-title="First Name"><?php echo $admin['firstname'];?></td>
                                    <td class="wordbreak" data-title="Last Name"><?php echo $admin['lastname'];?></td>
                                    <td class="wordbreak" data-title="Email"><?php echo $admin['email_addr'];?></td>
                                    <td class="wordbreak" data-title="Status of S1 Public Page">
                                        <?php if($admin['meta_value'] == "y"){
                                            echo "Yes";
                                        }else{
                                            echo "No";
                                        }
                                        ?>
                                    </td>
                                    <td class="wordbreak" data-title="S1 Public Page">
                                        <input id="access[<?php echo $admin['id'];?>]" name="access[<?php echo $admin['id'];?>]" type="checkbox" class="accesschk"/>
                                    </td>                                    
                            </tr>
                <?php }?>
            </table>
        <?php 
		}
		else {?>
            <h6>No data found</h6>
        <?php 
		}?>
</div>
   </form>
</div>
<?php $this->load->view('footer_admin'); ?>
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
      
    $( "#txt_username" )
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
			},
			select: function( event, ui ) {
			  var terms = split( this.value );
			  // remove the current input
			  terms.pop();
			  // add the selected item
				terms.push( ui.item.value );
			  // add placeholder to get the comma-and-space at the end
				// terms.push( "" );
			  this.value = terms; // this.value = terms.join( ", " );
			  if( $('#hidn_txtarea_username').length > 0 ) {
				$('#hidn_txtarea_username').val(ui.item.id);
			  }
			  return false;
			}
		  });
		  $("#txt_username").autocomplete("widget").css('z-index',1000000000);
  });

		  
    $(".searchbtn").click(function() {
        if($("#cmb_usertype").val() == "" && $("#txt_username").val() == ""){ 
            alert("Please enter value for atleast in one of the criterion");
        }else{
            $( "#actionType" ).val("");
            $( "#publicPage" ).submit();
        }
        
    });
    $(".designate").click(function() {
        var checkboxes = $(".accesschk[type='checkbox']");        
        if(!checkboxes.is(":checked")){
            alert("Please select atleast one checkbox to give access to S1 Public Page");
        }else {
            if( confirm("Are you sure you want to Grant Access to S1 Public Pages for selected User(s)?") ) {    
                $( "#actionType" ).val("designate");
                $("#publicPage").attr("action", "<?php echo $this->base;?>admin/change_public_pages_status");
                $( "#publicPage" ).submit();
            }
         }
    });
</script>

<script type="text/javascript">	
    $(".removeAccess").click(function() {
        var checkboxes = $(".accesschk[type='checkbox']");        
        if(!checkboxes.is(":checked")){
            alert("Please select atleast one checkbox to give access to S1 Public Page")
        }else {
            if( confirm("Are you sure you want to Deny Access to S1 Public Pages for selected User(s)?") ) {
              $( "#actionType" ).val("removeAccess");
              $("#publicPage").attr("action", "<?php echo $this->base;?>admin/change_public_pages_status");
              $( "#publicPage" ).submit();
              }
          }
    });
</script>