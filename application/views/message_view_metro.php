<?php $this->load->view('header_admin'); ?>
	<div class="homebg metro ">
		<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">MESSAGE</em></div>
		</div>
		<!--END PAGE TITLE-->

		<div class="container-fluid ">
			<div class="main-content padding-metro-home clearfix"> 
				<!--START CODE FOR METRO STYLE-->
                 <div class="clearfix messageCon">	
					<!-------BEGIN FIRST ROW OF TILES------>
						<div class="tile-group two no-margin no-padding clearfix div-messages">
							<!--begin small tile-->
								<a class="tile double bg-red inbox-redtile" href="#inbox" data-toggle="tab">
									<div class="tile-content icon"><img src="<?php echo $base;?>img/message/profile.png"></div>
									<div class="brand"><span class="label fg-white text-right">INBOX</span></div>
								</a>
							<!--end small tile-->
							<!--begin small tile-->
								<a class="tile  double  bg-red" href='#modal_compose' data-toggle='modal'>
									<div class="tile-content icon"><img src="<?php echo $base;?>img/message/messages.png"></div>
									<div class="brand"><span class="label fg-white text-right">COMPOSE</span></div>
								</a>
							<!--end small tile--> 
							<!--begin small tile-->
								<a class="tile double  bg-red sent-redtile" href="#sent" data-toggle="tab">
									<div class="tile-content icon"><img src="<?php echo $base;?>img/message/my_wallet.png"></div>
									<div class="brand"><span class="label fg-white text-right">SENT MESSAGES</span></div>
								</a>
							<!--end small tile-->
						</div>
					<!-------END FIRST ROW OF TILES------> 
			
				<!-- BEGIN SECOND COLUMN FIRST ROW -->
				<div class="tile-group six no-margin no-padding clearfix " > 
					<!-- Begin TILE CONTENT -->                                                      
						<div class="tile-content">
							<!--begin tab control-->
								<div class="tab-content " >
									<!--begin Inbox tab-->
										<div class="tab-pane fade" id="inbox">
											<div id="id_inbox">
												<?php 
												if( sizeof($rows_inbox_messages) ) {
													foreach( $rows_inbox_messages AS $val_inbox_msg ) {
														$msg_id 	 	= isset($val_inbox_msg['message_id']) ? $val_inbox_msg['message_id'] : '';
														$sender_name 	= isset($val_inbox_msg['nickname']) ? $val_inbox_msg['nickname'] : '';
														$msg_subject 	= isset($val_inbox_msg['subject']) ? $val_inbox_msg['subject'] : '';
														$msg_content 	= isset($val_inbox_msg['message']) ? $val_inbox_msg['message'] : '';
														$sender_image 	= isset($val_inbox_msg['profile_image']) ? $val_inbox_msg['profile_image'] : '';
														$read_status 	= isset($val_inbox_msg['read_status']) ? $val_inbox_msg['read_status'] : '';
														$cls_msg_read 	= ($read_status==0) ? 'icon-checkmark' : '';
														$msg_date_sent   = isset($val_inbox_msg['date_sent']) ? $val_inbox_msg['date_sent'] : '';
														$msg_bg = "bg-darker";
														$date_sent_bg = "bg-transparent";
														//common::pr($val_inbox_msg);
														if ($read_status==1){
															$msg_bg = "bg-black";
															$date_sent_bg = "bg-red";}
														?>
														<!--begin Messages tile -->
														
														<a href="#modal_inbox_msg<?php echo $msg_id;?>" onclick="javascript:getMessagesModal('inbox','<?php echo $msg_id;?>');" alt="<?php echo $val_inbox_msg['in_corrective_action_id'];?>" class="cls-inbox-msg<?php echo $msg_id;?> tile double <?php echo $msg_bg;?> live" data-toggle="modal">
															<div class="tile-content email">
																<div class="email-image">
																<?php 
																// echo FCPATH.$this->path_upload_profiles.$sender_image;echo "<br>".$sender_image;
																if( file_exists(FCPATH.$this->path_upload_profiles.$sender_image) && $sender_image ) {?>
																	<img src="<?php echo $base.$this->path_upload_profiles.$sender_image;?>"/>
																	<?php 
																}
																else {?><img src="<?php echo $base;?>img/default.png" /><?php }?>
																</div>
																<div class="email-data">
																	<span class="email-data-title"><?php echo $sender_name;?></span>
																	<span class="email-data-subtitle"><?php echo $msg_subject;?></span>
																	<span class="email-data-text"><?php echo substr($msg_content,0,30)."...";?></span>
																</div>
															</div>
															<div class="brand">
																<div class="brand">
                                                                <div class="cls-date_sent_inbox<?php echo $msg_id;?> badge no-margin fg-white <?php echo $date_sent_bg;?>" style="right:60px;padding:3px;width:80px;" >
											<strong><?php echo date("Y-m-d", strtotime($msg_date_sent));?></strong>
											</div>
                                                                
                                                                <div class="cls_checkmark_inbox<?php echo $msg_id;?> badge no-margin fg-white bg-transparent"><span class="<?php echo $cls_msg_read;?>"></span></div></div>
															</div>
                                                                                                                        
														</a> 
														<!--end Messages Code tile--> 

														<div id="modal_inbox_msg<?php echo $msg_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
															<div class="modal-header bg-red">
																<h3 id="myModalLabel">Inbox<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
															</div>
															<div class="modal-body"><div id="id_inbox_msg<?php echo $msg_id;?>" class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">xxx</div></div>
														</div>
														
														<div id="modal_forward_msg<?php echo $msg_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
															<div class="modal-header bg-red">
																<h3 id="myModalLabel">Foward Message<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
															</div>
															<div class="modal-body">
																<div class="charities-container" id="id_forward_msg<?php echo $msg_id;?>" style="padding:0px 0px 0px 0px;box-shadow: none;">
																	<div id="message-page-container" class="content-row">
																	<div id="message-content">
																	<form method="post" action="<?php echo $this->base.'admin/message_metro';?>" id="frm_forward_msg<?php echo $msg_id;?>" name="frm_forward_msg" style="padding: 5px 0;">
																	<label>To: </label><input id="send_label<?php echo $msg_id;?>" name="send_label" type="text" value="" class="input-xlarge" placeholder="ALL" required />
																	<textarea id="send_to<?php echo $msg_id;?>" name="send_to" style="display: none;"></textarea>
																	<label>Subject:</label>
																	<input type="text" name="subject" value="Fwd: <?php echo $msg_subject;?>" placeholder="Subject" class="input-xlarge" required />
																	<textarea name="message"  placeholder="Message" rows="5" required><?php echo $msg_content;?></textarea>
																	<input type="submit" name="submit" value="Send" class="btn-info" />
																	&nbsp;<button class="danger" type="button" onclick="javascript:window.location.href='<?php echo $this->base.'admin/message_metro';?>'";><strong>Cancel</strong></button>
																	</form>
																	</div>
																	</div>
																</div>
															</div>
														</div>
														<?php 
													}
												}
												else {
													echo "<h4>No messages available</h4>";
												}
												?>
											</div>
											<?php 
											if( sizeof($rows_inbox_messages) < 9 && sizeof($rows_inbox_messages)>0 ) {
												$cnt_no_inbox = (sizeof($rows_inbox_messages)==0) ? 8 : (9-(sizeof($rows_inbox_messages)));
												for( $i=0;$i<$cnt_no_inbox;$i++) {?>
													<a href="#" class="tile double bg-transparent" style="box-shadow: 0px 0px 0px inset;"></a>
													<?php 
												}
											}
											if( $total_inbox_messages > $this->msg_rows_limit ) {
												// Pagination //
													$total_inbox = ceil( $total_inbox_messages/$this->msg_rows_limit );
													echo '<div class="pagination small opacity pull-right">'; 
													$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_inbox, $pgno_inbox, $this->msg_rows_limit, 10, '#inbox');
													echo '</div>';
											}?>
										</div>
										
									<!--end Inbox tab-->

									<!--begin Sent tab-->
										<div class="tab-pane fade" id="sent">
											<div id="id_sent">
											<?php 
											if( sizeof($rows_sent_messages) ) {
											foreach( $rows_sent_messages AS $val_sent_msg ) {
												$msg_id 	 	= isset($val_sent_msg['message_id']) ? $val_sent_msg['message_id'] : '';
												$sender_name 	= isset($val_sent_msg['nickname']) ? $val_sent_msg['nickname'] : '';
												$msg_subject 	= isset($val_sent_msg['subject']) ? $val_sent_msg['subject'] : '';
												$msg_content 	= isset($val_sent_msg['message']) ? $val_sent_msg['message'] : '';
												$sender_image	= isset($val_sent_msg['profile_image']) ? $val_sent_msg['profile_image'] : '';
												$read_status 	= isset($val_sent_msg['read_status']) ? $val_sent_msg['read_status'] : '';
												$cls_msg_read	= ($read_status==0) ? 'icon-checkmark' : '';
												$msg_date_sent   = isset($val_sent_msg['date_sent']) ? $val_sent_msg['date_sent'] : '';
												?>
												<!--begin Messages tile -->
												<a href="#modal_sent_msg<?php echo $msg_id;?>" onclick="javascript:getMessagesModal('sent','<?php echo $msg_id;?>');" class="cls-sent-msg tile double bg-gray live" data-toggle="modal">
													<div class="tile-content email">
														<div class="email-image">
															<?php 
															if( file_exists(FCPATH.$this->path_upload_profiles.$sender_image) && $sender_image ) {?>
																<img src="<?php echo $base.$this->path_upload_profiles.$sender_image;?>"/>
																<?php 
															}
															else {?><img src="<?php echo $base;?>img/default.png" /><?php }?>
														</div>
														<div class="email-data">
															<span class="email-data-title"><?php echo $sender_name;?></span>
															<span class="email-data-subtitle"><?php echo $msg_subject;?></span>
															<span class="email-data-text"><?php echo $msg_content;?></span>
														</div>
													</div>
													<div class="brand">
														<div class="brand">
                                                        <div class="badge no-margin fg-white bg-transparent " style="right:60px;padding:3px;width:80px;" >
											<strong><?php echo date("Y-m-d", strtotime($msg_date_sent));?></strong>
											</div>
															<div class="cls_checkmark_sent<?php echo $msg_id;?> badge no-margin fg-white bg-transparent"><span class="<?php echo $cls_msg_read;?>"></span></div>
														</div>
													</div>
												</a>
												<div id="modal_sent_msg<?php echo $msg_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-header bg-red">
														<h3 id="myModalLabel">Sent<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
													</div>
													<div class="modal-body"><div id="id_sent_msg<?php echo $msg_id;?>" class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
												</div>
												<!--end Messages Code tile--> 
												<?php 
											}
											}
											else {
												echo "<h4>No messages available</h4>";
											}
											?>
											</div>
											<?php 
											if( sizeof($rows_sent_messages) < 9 && sizeof($rows_sent_messages)>0 ) {
												$cnt_no_sent = (sizeof($rows_sent_messages)==0) ? 8 : (9-(sizeof($rows_sent_messages)));
												for( $i=0;$i<$cnt_no_sent;$i++) {?>
													<a href="#" class="tile double bg-transparent" style="box-shadow: 0px 0px 0px inset;"></a>
													<?php  
												}
											}
											if( $total_sent_messages > $this->msg_rows_limit ) {
												// Pagination //
													$total_sent = ceil( $total_sent_messages/$this->msg_rows_limit );
													echo '<div class="pagination small opacity pull-right">'; 
													$this->common->getS1Pagination($this->router->fetch_method()."?1", $total_sent, $pgno_sent, $this->msg_rows_limit, 10, '#sent');
													echo '</div>';
											}?>
										</div>
									<!--end Sent tab-->
										
									<!--begin compose-->
										<!--begin Modal -->
											<div id="modal_compose" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-header bg-red">
													<h3 id="myModalLabel">Compose<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
												</div>
												<div class="modal-body">
													<div class="charities-container" style="padding:0px 0px 0px 0px;box-shadow: none;">
														<div id="message-page-container" class="content-row" >
															<div id="message-content"> 
																<h6>You can only messaging connections.</h6>
																<h5 >Compose</h5>
																<form method="post" action="<?php echo $base;?>admin/message_metro" class="adminfrm1" style="padding: 0 0px 0;">
																	<label style="display: inline;" >To: </label>
																	<input id="compose_label" name="send_label" type="text" value="" class="input-xlarge" placeholder="ALL" required />
																	<textarea id="compose_to" name="send_to" style="display: none;"></textarea>
																	<br />
																	<label style="display: inline;">Subject:</label>
																	<input type="text" name="subject" value="" placeholder="Subject" class="input-xlarge" required />
																	<textarea name="message"  placeholder="Message" rows="5" required></textarea></li>
																	<input type="submit" name="submit" value="Send" class="primary" /> 
																	<button class="danger" data-dismiss="modal"><strong>Cancel</strong></button>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										<!--end Modal--> 
									<!--end compose-->
								</div>
							<!--end tab control-->    
						</div>  
					<!-- End TILE CONTENT -->
				</div>
				<!-- END SECOND COLUMN FIRST ROW -->
               </div>
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>
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

	$( "#compose_label" )
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
          terms.push( "" );
          this.value = terms.join( ", " );
		  if( $('#compose_to').length > 0 ) {
			$('#compose_to').val(ui.item.id+','+$('#compose_to').val());
		  }
          return false;
        }
      });
	  $("#compose_label").autocomplete("widget").css('z-index',1000000000);
	});

	function getForwardMsgModal(msgId)
	{
		$("#modal_inbox_msg"+msgId).modal("hide");
		
		$( "#send_label"+msgId )
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
			  terms.push( "" );
			  this.value = terms.join( ", " );
			  if( $('#send_to'+msgId).length > 0 ) {
				$('#send_to'+msgId).val(ui.item.id+','+$('#send_to'+msgId).val());
			  }
			  return false;
			}
		  });
		  $("#send_label"+msgId).autocomplete("widget").css('z-index',1000000000);
	}

	$(document).ready(function () { 
	// Pagination //                
		$(".div-messages>a").click(function(){
			$tab_selected = $(this).attr('href');
			window.location.href = js_base_path+"admin/"+js_method+$tab_selected;
		});
		var hash_val = window.location.hash.substr(1);
		hash_val = !(hash_val) ? "inbox" : hash_val;
		hash_val = hash_val.split("&");
		$(".div-messages>a[href='#"+hash_val[0]+"']").parent().addClass('active');
		$(".tab-pane[id='"+hash_val[0]+"']").addClass('in active');

		/*
		$('.pg-number').click(function(){
			$pg_value 	= $(this).attr('pg-value');
			$pg_section 	= $(this).attr('pg-section');
			$.post(
				'<?php echo $base;?>ajax/ajaxGetMessages', 
				{'pgValue': $pg_value, 'pgSection':$pg_section},
				function(data) {
					$('#id_'+$pg_section).html(data);
				}
			);
		});
		*/
	});

	$(document).on('click', '.idesc', function(){
			$(".idesc>span").toggle();
		});
	function getMessagesModal(msgSection, msgId)
	{
		if( msgSection=="inbox" ) {
			var action_id 	= $(".cls-inbox-msg"+msgId).attr('alt');
			var ajax_page = 'getMessage';
			
			// Set checkmark icon in the Inbox list
				$("div.cls_checkmark_inbox"+msgId+" span").addClass('icon-checkmark');
				$(".cls-inbox-msg"+msgId).removeClass('bg-black');
				$(".cls-inbox-msg"+msgId).addClass('bg-darker');
				$(".cls-date_sent_inbox"+msgId).removeClass('bg-red');
				$(".cls-date_sent_inbox"+msgId).addClass('bg-transparent');
				
		} 
		else {
			var ajax_page = 'getSentMessage';
			$("div.cls_checkmark_sent"+msgId+" span").addClass('icon-checkmark');
		}
		$modal_id = 'id_'+msgSection+'_msg'+msgId;
		$.post(
			'<?php echo $base;?>admin/'+ajax_page, 
			{'msg_id': msgId, 'status': 'read', 'page_view': 'modal', 'msgSection':msgSection, action_id: action_id},
			function(data) {
				$('#'+$modal_id).html(data);
			}
		);
	}

	$(document).on('click', '.icon_accept', function(){
		if( confirm("Are you sure you want to accept this request?") ) {
			var send_to 	= $(this).attr('send_to');
			var send_from 	= '<?php echo $this->sess_userid;?>';
			// alert( "send_to: "+send_to+"send_from: "+send_from );
			$.post(
				'<?php echo $base;?>admin/connectAccept',
				{'id': send_to, 'from-id':send_from},
				function(data) {
					window.location.reload();
				}
			)	
		}
	});
        
        $(document).on('click', '.icon_client_accept', function(){
                var designate_status = '0';
                var msgConfirm = '';
                var consultantId = $(this).attr('id');
                if($('#'+consultantId).is(':checked')) {
                    designate_status = '1';
                    msgConfirm = "Are you sure you want to accept this request?";
                } else {
                    designate_status = '0';
                    msgConfirm = "Are you sure you want to reject the request?";
                }
		if( confirm(msgConfirm) ) {			
                    $.ajax({
			url: '<?php echo $base;?>ajax/ajaxAcceptRequest', 
			type: 'post', 
			data: {'consultantId': consultantId,'designate_status':designate_status },
			success: function(output) {
				//$(".cls_myidcard").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});    
		}
	});
        
        
</script>
<!--END SCRIPTS FOR MESSAGE-->
