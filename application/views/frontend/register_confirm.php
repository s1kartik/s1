<?php $this->load->view('frontend/signup_header'); ?>

<div class="metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">Confirmation Email</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
	
    <div class="container-fluid padding-metro-home right">
        <div class="row-fluid" >
			<div id="id_div_signupemail_success"></div>
			<div class="tile quadro triple-vertical bg-black">
            <form class="padding20 frm_confirmsignup" id="frm_confirmsignup" name="frm_confirmsignup" method="post" action="">
				<fieldset>
					<div id="id_div_signupemail_errors"></div>
					<div class="input-control password" data-role="input-control">
						<input id="txt_confirm_signupemail" name="txt_confirm_signupemail" placeholder="Email" required/>
					</div>
					<div class="text-right">
						<div style=" display:inline	" class="fg-white">* - required fields</div>
						<button class="image-button danger" type="submit" name="submit" value="Submit">Got it<i class="icon-forward bg-red"></i></button>
						<button class="image-button bg-gray fg-white" onclick="resetForm();" type="button" name="reset" value="Reset">Reset<i class="icon-undo bg-steel"></i></button>
						<input type="hidden" name="action" value="ACTIVATE_ACCOUNT" />
					</div>
				</fieldset>
			</form>
			</div>
        </div>
    </div>
</div>

<div id="modal_s1signup_credits" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red"><h3 id="myModalLabel">Successfully Registration<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
	<div class="modal-body">
		<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
			<div>Congratulations, You have get <img src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:26px;" />&nbsp;<strong><?php echo "50 ";?></strong>
			</div>
		</div>
	</div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>


<script type="text/javascript">
$.fn.clearForm = function() {
	return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
  	  	if (tag == 'form') {
			return $(':input',this).clearForm();
		}

		if (type == 'text' || type == 'password' || type == 'email' || tag == 'textarea') {
      		this.value = '';
		}
		else if (type == 'checkbox' || type == 'radio') {
      		this.checked = false;
		}
    	else if (tag == 'select') {
      		this.selectedIndex = 0;
		}
  		});
};

function resetForm( idDiv )
{
	$("#"+idDiv).html("");
	$('form').clearForm();
}

$(document).ready(function () {
	<?php 
	if( isset($message) && $message ) {?>
		var register_message = '<?php echo $message;?>';
		$('#id_div_signupemail_success').html('<label class="fg-grayLighter">'+register_message+'</label>');
		if( register_message.indexOf('successfully activated') >= 0 ) {
			$("#modal_s1signup_credits").modal("show");
		}
		<?php 
	}?>

	$.validator.setDefaults({
		errorPlacement: function(error, element) {
			error.appendTo('#id_div_signupemail_errors');
		}
	});

	$('#frm_confirmsignup').validate({
		highlight: function(element) {
			$('label').addClass('fg-darkRed')
		}, 
		rules: {
			txt_confirm_signupemail: {
			required: true,
			email: true
			}
		},
		messages: {
			txt_confirm_signupemail: {
				required: "<?php echo lang('msg_enter_email');?>",
				email: "<?php echo lang('msg_valid_email');?>"
			},
		}
	});
});
</script>
<?php $this->load->view('frontend/signup_footer'); ?>

