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
	option:hover{box-shadow: 0 0 10px 100px #FF0000 inset;}
</style>
<?php
$alert_title 		= $this->input->post('txt_alert_title');
$alert_sendby_usertype 	= $this->input->post('cmb_alert_sendby_usertype');
$alert_sender 		= $this->input->post('txt_alert_sender');
$from_created_date 	= $this->input->post('txt_from_created_date');
$to_created_date 	= $this->input->post('txt_to_created_date');
?>
<form class="form-inline" method="post" id="filterfrm">
	<fieldset>
		<input type="text" name="txt_alert_title" class="bg-darker span2 fg-white" placeholder="Title" id="txt_alert_title" value="<?php echo $alert_title;?>"/>
		<input type="text" name="txt_alert_sender" class="bg-darker span2 fg-white" placeholder="Sender" id="txt_alert_sender" value="<?php echo $alert_sender;?>"/>
		<select id="cmb_user_type" name="cmb_alert_sendby_usertype" class="styled-select bg-darker span2 fg-white">
			<option value="">-Sender Usertype-</option>
			<option value="1" <?php echo (isset($alert_sendby_usertype)&&$alert_sendby_usertype=="1")?'selected="selected"':'';?>>Admin</option>
			<option value="7" <?php echo (isset($alert_sendby_usertype)&&$alert_sendby_usertype=="7")?'selected="selected"':'';?>>Union</option>
		</select>
		<input type="text" name="txt_from_created_date" class="datestamp bg-darker span2 fg-white" placeholder="From Date" id="txt_from_created_date" value="<?php echo $from_created_date;?>"/>
		<input type="text" name="txt_to_created_date" class="datestamp bg-darker span2 fg-white" placeholder="To Date" id="txt_to_created_date" value="<?php echo $to_created_date;?>"/>
		<input type="checkbox" name="chk_alerts_unread" id="chk_alerts_unread" <?php echo ($chk_alerts_unread) ? 'checked="checked"' : '';?>>
		<label class="radio inline" style="padding-bottom:10px;" for="chk_alerts_unread"><b>Unread</b>
		</label>
		<input type="hidden" name="action" value="FILTER"/>
		&nbsp;<button type="submit" class="bg-red fg-white"><strong>Go!</strong></button>
	</fieldset>
</form>

<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
		$( ".datestamp" ).datepicker();
	});
</script>