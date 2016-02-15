<div id="modal_shopping_options<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">Shopping Cart - Options<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="box-shadow: none;">
			<table>
				<tr>
					<td valign="top">Quantity:&nbsp;</td>
					<td>
					<input type="text" class="textright qty input-medium" name="cart_qty" id="cart_qty<?php echo $item_id;?>" placeholder="Enter Quantity" value="1" />
					</td>
				</tr>
				<tr>
					<td>Payment Option:&nbsp; </td>
					<td>
					<input type="radio" name="rdb_payment_option" id="rdb_payment_option<?php echo $item_id;?>1" onclick="javascript:cartPaymentOption('moneris')" value="moneris">By Cash&nbsp;
					<input type="radio" name="rdb_payment_option" id="rdb_payment_option<?php echo $item_id;?>2" onclick="javascript:cartPaymentOption('s1credits')" value="s1credits">By <i class=""><img src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:26px;" /></i>&nbsp;
					</td>
				</tr>
			</table>
			<div>&nbsp;</div>
				<div class="cls-bycredits" style="display:none;">
					<button class="bg-red fg-white" id="btn-confirm<?php echo $item_id;?>" cartqty<?php echo $item_id;?>=""><i class="icon-checkmark"></i>&nbsp;<b>Confirm</b></button>
					<button class="bg-red fg-white" id="btn-cancel<?php echo $item_id;?>"><i class="icon-cancel"></i>&nbsp;<b>Cancel</b></button>
					<div><br>For this purchase S1 Integration Systems will withdraw <i class=""><img src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:26px;" /></i>&nbsp;<strong><span class="cls_credits_amount"><?php echo isset($item_credits) ? $item_credits : '0';?></span></strong> from your balance.</div>
				</div>
			</div>
	</div>
	<div class="modal-footer"><button class="btn btn-cancel" data-dismiss="modal">Cancel</button></div>
</div>

<script type="text/javascript">
	$(function() {
		$('#modal_shopping_options<?php echo $item_id;?>').on('show.bs.modal', function () {
			// DON'T DELETE //
		});
		$('#modal_shopping_options<?php echo $item_id;?>').on('hidden.bs.modal', function () {
			// DON'T DELETE //
		});
	});
</script>

<div id="modal_bycredits<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">Shopping Cart - By Credits<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
			<button class="bg-red fg-white" id="btn-confirm<?php echo $item_id;?>" cartqty<?php echo $item_id;?>=""><i class="icon-checkmark"></i>&nbsp;<b>Confirm</b></button>
			<button class="bg-red fg-white" id="btn-cancel<?php echo $item_id;?>"><i class="icon-cancel"></i>&nbsp;<b>Cancel</b></button>
			<div><br>For this purchase S1 Integration Systems will withdraw <i class=""><img src="<?php echo $this->base;?>img/icons_s1credit.png" style="height:26px;" /></i>&nbsp;<strong><?php echo isset($item_credits) ? $item_credits : '0';?></strong>  from your balance.</div>
		</div>
	</div>
	<div class="modal-footer">
	<button class="btn" data-dismiss="modal">Close</button>
	</div>
</div>

<div id="modal_bycredits_confirm<?php echo $item_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">Shopping Cart - Confirm<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body">
		<div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
			<strong>Complete this item to gain&nbsp;<img src="<?php echo $this->base."img/icons_xp.png";?>" class="w50">&nbsp;<?php echo $item_points;?> </strong>
		</div>
	</div>
	<div class="modal-footer">
	<button class="btn" data-dismiss="modal">Close</button>
	</div>
</div>
