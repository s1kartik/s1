<div id="modal_contact_us" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-header bg-red">
	<h3 id="myModalLabel">CONTACT US<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
</div>
<div class="modal-body">
	<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
		<div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">
			<p>Please fill out the contact form and we will get back to you as soon as possible:</p>
			<form method="post" class="frm_footer_admin" id="frm_footer_admin" action="<?php echo $base."admin/contactusSendEmail?redirect_page=".$this->router->fetch_method();?>">
				<div class="controls ">
					<input class="span6" name="name" type="text" placeholder="Name" required />
					<input class="span6" name="phone" type="text" placeholder="Phone" required/>
				</div>
				<div class="clear"></div>
				<input id="email" name="email" class="span6" type="email" placeholder="Email"  required/>
				<textarea name="message" class="span6" rows="6" placeholder="Message" required></textarea>
				<input class="btn pull-right" type="submit" name="submit" value="Submit" />
			</form>
		</div>
	</div>
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>