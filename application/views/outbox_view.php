<?php $this->load->view('header_admin'); ?>
<h3>MESSAGES</h3>
<div id="message-page-container" class="content-row" >
 <div id="message-page-left">
  <div class="message-heading">
   <div class="pull-right">
    <select class="input-small">
	    <option value="<?php echo $base;?>admin/message">Inbox</option>
	    <option value="<?php echo $base;?>admin/message_sent" selected="selected">Sent</option>
    </select>
   </div>
    <h5 >Sent</h5>   
  </div>
  <!-- Begin skillset items section -->
<ul class="inline message-group">
    <?php 
        foreach($messages as $msg): 
        $pimg = empty($msg['profile_image'])?$base."img/no_image.jpg":$base.$this->path_upload_profiles.$msg['profile_image'];
        $sender = !empty($msg['firstname'])?$msg['firstname']." ".$msg['lastname']:$msg['nickname'];
    ?>
       <!--  item-->
           <li class="message-item clearfix  ">
				<ul class="inline clearfix">
				<li id="message-img">
					<img src="<?php echo $pimg;?>" class="profile_image_small" alt="<?php echo $msg['nickname'];?>"/>
				</li>
				<li id="message-name"><p><?php echo $sender;?> 
                <span id="message-time" ><?php echo date("Y")==date("Y", strtotime($msg['date_sent']))?date("M j", strtotime($msg['date_sent'])):date("M j, Y", strtotime($msg['date_sent']));?></span></p>
				    <p><a href="#" rel="<?php echo $msg['message_id'];?>" class="view_message"><?php echo $msg['subject'];?></a></p>
				</li>
				</ul>
    		</li>
        <!--  item --> 
    <?php endforeach;?>
  </ul>
    <div class="clear"></div>
  <?php 
    $cp = isset($_GET['paged'])?(int)$_GET['paged']:0;
    $prev = $cp-1;
    $next = $cp+1;
    if($prev>-1){
    ?>
    <span class="pagenumber-wrapper"><a href="<?php echo $base;?>admin/message_sent?paged=<?php echo $prev;?>">&lt;</a></span>
  <?php 
    }
    if($totalmsg>($cp+1)*10){
  ?>
    <span class="pagenumber-wrapper"><a href="<?php echo $base;?>admin/message_sent?paged=<?php echo $next;?>">&gt;</a></span>
  <?php      
    }
  ?>
  </div>
  <!-- End skillset items section --> 
    <div id="message-page-right">
    <?php if(count($messages)>0):?>
     <div class="message-heading">
  <h5 >To: <?php $message_to_view = $this->users->getMessageByID($messages[0]['message_id'], 'unread'); $sendto = $this->users->getUserByEmail($message_to_view['send_to']); echo isset($sendto['nickname']) ? $sendto['nickname'] : '';?></h5>
  <p><b>Subject: </b><?php echo $message_to_view['subject'];?></p>
  </div>
  <!-- End skillset items section -->
    <div id="message-content">
       <?php echo str_replace("\\n", "<br />", $message_to_view['message']);?>   
    </div>
    <?php endif;?>
  </div>
</div>
    <script type="text/javascript">
	$(document).ready(function () {
        $('.view_message').click(function(){
            $mid = $(this).attr(('rel'));
            $.post(
                    '<?php echo $base;?>admin/getMessage',
                    {'msg_id': $mid, 'status': 'unread'},
                    function(data) {
                        $('#message-page-right').html((data));
                    }
            );   
        })
        $('.input-small').change(function(){
            window.location = $(this).val();
        })        
    });
    </script>
<?php $this->load->view('footer_admin'); ?>