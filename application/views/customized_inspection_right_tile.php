<?php
$custinspitem_id = "S1".($this->cart->total_items()+1);
?>
<div class=" tile triple-vertical double profile-content-box tab-content">
<div class="linkedto-container " style="height:390px;overflow-y: scroll;" >
	<div class="linked-group">
		<div class="bg-grayLight fg-gray text-center"><h5 style="padding: 11px;margin: 0px">CUSTOMIZED</h5>
			<form method="post" action="" name="frm_checkout_custom_inspections">
				<div class="bg-red padt10"><input type="text" name="txt_label_custominsp" id="txt_label_custominsp" class="text-right" value="" placeholder="Type Title"></div>
				<input type="hidden" name="hpp_key" value="<?php echo (isset($hpp_key) && $hpp_key) ? $hpp_key : '';?>" />
				<ul class="bundle_custom_inspection">
					<li class="fg-gray text-center">Drag and drop</li>
					<p class="clearfix custom_id" style="height:215px;"></p>
				</ul>
				<input type="hidden" name="email" value ="<?php echo $user['email_addr'];?>" />
				<div>
					<a href="#modal_shopping_items<?php echo $custinspitem_id;?>" data-toggle="modal" class="btn btn-danger btn-checkout">Checkout</a>
					<button type="button" onclick="resetCustomInspBox();" class="btn btn-info btn-warning">Reset</button>
				</div><br>
			</form>			
		</div>
	</div>
</div>
</div>

<div id="modal_shopping_items<?php echo $custinspitem_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<?php 
$data['item_id'] 		= $custinspitem_id;
$this->load->view('modal_shopping_options', $data);
?>

<script type="text/javascript">
	$('.btn-checkout').click(function(e) {
		var custom_inspection_items = $(".custom_id").html();
		var library_type = '';
		var txt_label_custominsp = $("#txt_label_custominsp").val();
		if( custom_inspection_items.trim() != '' ) {
			var library_type = 'new_custom_inspection';
		}
		$.ajax({
			url: js_base_path+'admin/modal_shopping_items',
			type: 'post', 
			data: {'library_type':library_type, 'txt_label_custominsp': txt_label_custominsp},
			success: function(output) {
				$(".libtiles.libtile-inspection").css('z-index','');
				$("#modal_shopping_items<?php echo $custinspitem_id;?>").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	});
</script>