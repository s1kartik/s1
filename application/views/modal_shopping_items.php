<?php 
if( $library_type ) {?>
	<div class="modal-header bg-red"><h3 id="myModalLabel">Shopping Cart - Item details<i class="pull-right icon-cancel-2 btn-close" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
	<div class="modal-body">
		<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
			<p>Title: <?php echo $item_title;?></p>
			<p>Description: <?php echo $item_description;?></p>
			<p><strong>$ <?php echo $item_price;?></strong></p>
			<p><i class=""><img src="<?php echo $this->base;?>img/icons_xp.png" style="height:26px;" /></i>&nbsp; <strong><?php echo $item_points;?></strong></p>
			<p><i class=""><img src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:26px;" /></i>&nbsp; <strong><?php echo $item_credits;?></strong></p>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#modal_shopping_options<?php echo $item_id;?>" id="id_shopping_options<?php echo $item_id;?>" data-toggle="modal" class="btn pull-left">Buy it</a> 
		<button class="btn btn-close" data-dismiss="modal">Close</button>
	</div>

	<script type="text/javascript">
		var item_id 	= '<?php echo $item_id;?>';
		var item_title 	= '<?php echo $item_title;?>';
		var item_libtype= '<?php echo $item_libtype;?>';
		var item_price	= '<?php echo $item_price;?>';
		var item_points	= '<?php echo $item_points;?>';
		var item_credits= '<?php echo $item_credits;?>';
		var credits_available = '<?php echo $credits_available;?>';

		function cartPaymentOption(paymentOption)
		{
			$payment_option = paymentOption;
			$cart_qty 		= $("#cart_qty"+item_id).val();

			if( "moneris" == $payment_option ) {
				$(".cls-bycredits").hide();
				$.post(
					js_base_path+'ecommerce/addItem', 
					{'id':item_id, 'item_title':item_title, 'item_price':item_price, 'item_points':item_points, 'item_credits':item_credits, 
						'library_type':item_libtype, 'payment_option':$payment_option, 'cart_qty':$cart_qty}, 
					function(data) {
						var cart = $.parseJSON(data);
						$('#qty-in_cart').text(cart.qty);
						$('#amount_in_cart').text(cart.amount);
					}
				);
				alert( "Added to shopping cart" );
				window.location.href = js_base_path+"ecommerce/shoppingcart";
			}
			else {
				$("#btn-confirm"+item_id).attr("cartqty", $cart_qty);
				$total_credits_amount = ($cart_qty*item_credits);
				if( $total_credits_amount <= credits_available ) {
					
					$(".cls_credits_amount").html($total_credits_amount);
					
					$(".cls-bycredits").show();
					
					return false;
				}
				else {
					alert("You have not enough credits to perform this purchase.");
					window.location.href="<?php echo $this->base."admin/buy_credits";?>";
				}
			}
		}

		$(document).ready(function () {
			$(".cls-bycredits").hide();

			$("#id_shopping_options"+item_id).click( function() {
				$("#modal_shopping_items"+item_id).modal("hide");
			});

			$("#btn-confirm"+item_id).click( function() {
				$cart_qty = $(this).attr("cartqty");
				$.ajax({
					url: js_base_path+'ajax/ajaxCartCreditsModal', 
					async: false, 
					type: 'post',
					data: {'itemId':item_id, 'itemTitle':item_title, 'itemLibType':item_libtype, 'itemPoints':item_points, 'itemCredits':item_credits,
							'paymentOption':$payment_option, 'cartQty':$cart_qty},
					success: function(output) {
						$("#modal_shopping_options"+item_id).modal("hide");
						// $("input[type=radio]").prop("checked", false);
						$("#modal_bycredits_confirm"+item_id).modal("show");

						setTimeout(function(){
							window.location.reload();
						}, 2000);
					}, 
					error: function (xhr, status, text) {
						alert(xhr.responseText);
						return false;
					}
				});
			});

			$("#btn-cancel"+item_id).click( function() {	
				$("#modal_shopping_options"+item_id).modal("hide");
				return false;
			});
		});
	</script>
	<?php
}
else {?>
	<div class="modal-header bg-red"><h3 id="myModalLabel">Shopping Cart - Item details<i class="pull-right icon-cancel-2 btn-close" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
	<div class="modal-body">
		<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
			<p>No Items available</p>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-close" data-dismiss="modal">Close</button>
	</div>
	<?php
}?>