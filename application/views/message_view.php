<?php $this->load->view('header_admin'); ?>
<h3>MESSAGES</h3>
<div id="message-page-container" class="content-row" >
 <div id="message-page-left">
 <form method="post">
  <div class="message-heading">
    <h5>INBOX</h5>
       <div class="pull-right">
        <a href="<?php echo $base;?>admin/create_message" class="btn btn-mini btn-info">COMPOSE</a>
        <select class="input-small">
    	    <option value="<?php echo $base;?>admin/message">Inbox</option>
    	    <option value="<?php echo $base;?>admin/message_sent">Sent</option>
        </select>
       </div>
       <input type="checkbox" id="checkall" value="" /> 
       <input type="submit" name="submit" value="DELETE" class="btn btn-mini btn-warning" />   
  </div>
  <div class="clear"></div>
  <!-- Begin skillset items section -->
    <ul class="inline message-group">
        <?php 
        foreach($messages as $msg) {
			if( !empty($msg['profile_image']) ) {
				$pimg = $msg['profile_image'];
			}
			else {
				$pimg = $base."img/no_image.jpg";
			}
            $sender = !empty($msg['firstname'])?$msg['firstname']." ".$msg['lastname']:$msg['nickname'];
			?>
			<!--  item-->
			<li class="message-item clearfix">
				<ul class="inline clearfix">
				<li id="message-img">
					<input type="checkbox" name="msg[]" class="chkmsg" value="<?php echo $msg['message_id'];?>" /><img src="<?php echo $pimg;?>" class="profile_image_small" alt="<?php echo $msg['nickname'];?>"/>
				</li>
				<li id="message-name">
					<p class="readstatus<?php echo $msg['read_status'];?>"><?php echo $sender;?> 
					<span id="message-time" ><?php echo date("Y")==date("Y", strtotime($msg['date_sent']))?date("M j", strtotime($msg['date_sent'])):date("M j, Y", strtotime($msg['date_sent']));?></span></p>
					<p class="readstatus<?php echo $msg['read_status'];?>"><a href="#" alt="<?php echo $msg['in_corrective_action_id'];?>" rel="<?php echo $msg['message_id'];?>" class="view_message"><?php echo $msg['subject'];?></a></p>
				</li>
				</ul>
        	</li>
            <!--  item --> 
        <?php 
		}?>
    </ul>
  <div class="clear"></div>
  <?php 
    $cp = isset($_GET['paged'])?(int)$_GET['paged']:0;
    $prev = $cp-1;
    $next = $cp+1;
    if($prev>-1){
    ?>
    <span class="pagenumber-wrapper"><a href="<?php echo $base;?>admin/message?paged=<?php echo $prev;?>">&lt;</a></span>
  <?php 
    }
    if($totalmsg>($cp+1)*10){
  ?>
    <span class="pagenumber-wrapper"><a href="<?php echo $base;?>admin/message?paged=<?php echo $next;?>">&gt;</a></span>
  <?php      
    }
  ?>
  </form>
  </div>
  <!-- End skillset items section --> 
    <div id="message-page-right">
    <?php if(count($messages)>0):?>
     <div class="message-heading">
  <h5 class="pull-left">From: 
  <?php 
    $message_to_view = $this->users->getMessageByID($messages[0]['message_id'], 'read');
    echo !empty($message_to_view['firstname'])?$message_to_view['firstname']." ".$message_to_view['lastname']:$message_to_view['nickname'];?></h5>
  <a href="<?php echo $base;?>admin/forward_message?msg_id=<?php echo $messages[0]['message_id'];?>" class="btn btn-mini btn-info pull-right btn-forward">Forward</a>  
  <div class="clear"></div>  
  <p><b>Subject: </b><?php echo $message_to_view['subject'];?></p>
  </div>
  <!-- End skillset items section -->
    <div id="message-content">
    <form method="post" class="adminfrm">
       <?php echo str_replace("\\n", "<br />", $message_to_view['message']);?>   
        <div id="message-reply-wrapper">
            <textarea rows="8" placeholder="Reply to this message" name="message" required></textarea>
        </div>
        <input type="submit" name="submit" value="Send" class="btn btn-info pull-right" <?php if($message_to_view['subject']=="Connection Rejected"):?>disabled="disabled"<?php endif;?> />
        <input type="hidden" name="subject" value="RE: <?php echo $message_to_view['subject'];?>" />
        <input type="hidden" name="send_to" value="<?php echo $message_to_view['send_from'];?>" />
    </form>
    </div>
    <?php endif;?>
  </div>
  <div class="clear"></div>
</div>
    <script>
	$(document).ready(function () {
        $('.view_message').click(function(){
            $mid 		= $(this).attr(('rel'));
			$action_id 	= $(this).attr(('alt'));
            $('.message-item').removeClass('active-message');
            $(this).parents('.message-item').addClass('active-message');
            $.post(
				'<?php echo $base;?>admin/getMessage',
				{'msg_id':$mid, 'status':'read', 'action_id':$action_id},
				function(data) {
					$('#message-page-right').html((data));
				}
            );   
        })
        $('.input-small').change(function(){
            window.location = $(this).val();
        }) 
        $('#checkall').click(function(){
            if($(this).is(':checked'))
                $('.chkmsg').prop("checked", true);
            else
                $('.chkmsg').prop("checked", false);
        })       
    });
    </script>
<?php $this->load->view('footer_admin'); ?>