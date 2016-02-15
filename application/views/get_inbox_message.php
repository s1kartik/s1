<?php $newmessages = $this->users->newMessageCount( $user['email_addr'], '', array('assign','connection request','alert') );?>
<script type="text/javascript">
	$("#btn_delete_message").click(function() {
		var msg_id = $(this).attr('msg_id');
		if( confirm("Do you realy want to delete this Message?") ) {
			$.ajax({
				url: "<?php echo $base;?>ajax/deleteMessages",
				type: 'post', 
				data: {'msgId': msg_id },
				success: function(output) {
					window.location.href="<?php echo $base;?>admin/message_metro";
					return false;
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			})
		}
		else {
			window.location.href="<?php echo $base;?>admin/message_metro";
			return false;	
		}
	});
	var $newmessages = '<?php echo $newmessages;?>';
	if( $newmessages <= 0 ) {
		$(".cls_header_msgcnt").html('<a href="<?php echo $base;?>admin/message_metro" title="MESSAGES"><i class="icon-mail"></i></a>');
	}
	else {
		$(".cls_header_msgcnt").html('<span class="notification-number"><span>'+$newmessages+'</span></span><a href="<?php echo $base;?>admin/message_metro" title="MESSAGES"><i class="icon-mail"></i></a>');
	}
</script>