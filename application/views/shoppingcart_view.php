<?php $this->load->view('header_admin'); ?>

<div class="homebg metro"> 
  <!--BEGIN PAGE TITLE-->
  <div class="container-fluid">
    <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"> <em class="margin20">SHOPPING CART</em> </div>
  </div>
  <!--END PAGE TITLE-->
  
  <div class="container-fluid" style="padding-bottom:30px">
    <div class="row-fluid">
      <div id="library-container" class="content-row bg-black">
        <?php 
	if(!$this->cart->contents()) {?>
        <div class="tablehead bg-red fg-white">
          <h4 class="fg-white">Your shopping cart is empty!</h4>
        </div>
        <div style="padding: 5%;">
          <div class="checkout-area">
            <button type="button" onclick="javascript:location.href='<?php echo $base;?>admin/libraries_metro?libtype=1';" class="keep link" style="float: left;">Keep Shopping</button>
          </div>
        </div>
        <?php
	}
    else {
		$cls_total_credits 		= ($total_available_credits <= 0) ? 'fgred' : '';
		$disabled_credits_payment= ($total_available_credits <= 0) ? 'disabled' : '';
    ?>
        <div class="tablehead bg-red fg-white">
          <h4 class="fg-white">CHECKOUT</h4>
        </div>
        <form method="post" id="cartfrm" action="<?php echo $payment_url;?>">
          <input type="hidden" name="ps_store_id" value="<?php echo $ps_store_id;?>" />
          <input type="hidden" name="hpp_key" value="<?php echo $hpp_key;?>" />
          <div class="clearfix shopping-cart-data-table">
            <table class="table bg-black fg-white" id="checkout-table">
              <tbody>
			  <thead class="table-stripped">
					<tr>
					  <td width="80" class="span1">Remove</td>
					  <td width="50" class="span1">Item</td>
					  <td >&nbsp;</td>
					  <td width="50" >Credits</td>
					  <td width="100">Quantity</td>
					  <td width="100" ><div class="<?php echo $cls_total_credits;?> fg-yellow"><i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:20px;" /></i>&nbsp;<?php echo $total_available_credits;?></div></td>
					  <td width="200" class="textright">Price</td>
					  <td width="100" class="textright">Subtotal</td>
					</tr>
				</thead>
				
                <?php $i=1;
					foreach($this->cart->contents() as $rowid => $item) {
						$item_creditsbuy 	= isset($item['options']['Creditsbuy']) ? $item['options']['Creditsbuy'] : '';
						$item_language 		= isset($item['language']) ? $item['language'] : '';
						$item_library_type 	= isset($item['library_type']) ? $item['library_type'] : '';

						if( isset($item['transaction_type']) && "s1credits"==$item['transaction_type'] ) {
							$creditsbuy =  '-';
							$item_image = "<img src=".$base."img/s1logo.png width=33 height=33 />";
							$item_label = " Package";
						}
						else {
							$creditsbuy = $item_creditsbuy;
							$item_image = "<img src=".$base."img/icons/icon-".strtolower($item_language).".png />";
							$item_label = "";
						}
						
						$icon = "";
						switch ($item_library_type){
							case "Training":
								$icon = "library/training";
								break;
							case "Hazards":
								$icon = "library/hazards";
								break;
							case "custom_safetytalks":
							case "normal_safetytalks":
								$icon = "library/safety_talks";
								break;	
							case "s1procedures":
							case "new_procedure":
								$icon = "library/procedures";
								break;
							case "normal_inspection":
							case "custom_inspection":
							case "new_custom_inspection":
								$icon = "library/inspections";
								break;
							case "Investigations":
								$icon = "library/investigations";
								break;
							case "":
								$icon = "icons_s1credit";
								break;
							default:
								$icon = "logo";
						};
						?>
				
              <tr id="row<?php echo $item['id'];?>">
                <td data-title="Remove">
					<a class="remove-row martmi12" title="Remove from your cart" rel="<?php echo $item['rowid'];?>" href="#"><i class="icon-remove-sign"></i></a>
				</td>
                <td data-title="Item">
					<span class="icon" ><img src="<?php echo $base;?>img/<?php echo $icon;?>.png" width="30" height="30"></span>
				</td>
                <td><?php echo $item['name'].$item_label;?></td>
                <td data-title="Credits"><?php echo $creditsbuy;?></td>
                <td data-title="Quantity"><input type="text" class="textright qty" name="qty[<?php echo $item['rowid'];?>]" rel="<?php echo $item['id'];?>"  value="<?php echo $item['qty'];?>" /></td>
                <td data-title="Total Credits"><input type="radio" name="rdb_payment_option[<?php echo $rowid;?>]" value="moneris" <?php echo isset($item['payment_option'])&&$item['payment_option']=='moneris'?"checked":"checked";?>>
                  Moneris<br>
				</td>
                <td data-title="Price" class="price textright"><?php echo number_format($item['price'], 2);?></td>
                <td data-title="Subtotal" class="subtotal textright"><?php echo number_format($item['subtotal'], 2);?></td>
				
                <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $i;?>"/>
                <input type="hidden" name="description<?php echo $i;?>" value="<?php echo $item['name'];?>"/>
                <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $i;?>"/>
                <input type="hidden" name="price<?php echo $i;?>" value="<?php echo $item['price'];?>"/>
                <input type="hidden" name="subtotal<?php echo $i;?>" value="<?php echo $item['subtotal'];?>"/>
              </tr>
              <?php 
						$i++; 
					}?>
                </tbody>
              
            </table>
          </div>
          <input type="hidden" name="cust_id" value="<?php echo $user['firstname']." ".$user['lastname'];?>" />
          <input type="hidden" name="email" value ="<?php echo $user['email_addr'];?>" />
          <?php if(count($tax)>0): $tax_amount = number_format($tax['rate']*$this->cart->total(), 2);?>
          <input type="hidden" id="tax" name="<?php echo strtolower($tax['tax_abbr']);?>" value="<?php echo $tax_amount;?>" />
          <?php endif;?>
          <input type="hidden" id="cart_total" name="charge_total" value="<?php echo number_format($this->cart->total()+$tax_amount, 2);?>" />
          <div class="checkout-area">
            <button type="button" onclick="javascript:location.href='<?php echo $base;?>admin/libraries_metro?libtype=1';" class="keep link" style="float: left;">Keep Shopping</button>
            <button class="link update">Update Your Cart</button>&nbsp;<button class="danger " type="button" id="id_btn_checkout">Checkout</button>
          </div>
        </form>
        <?php 
	}?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).ready(function () {
	   /*
	   $('.qty').keyup(function(){
	       $qty = $(this).val();
           $qty = parseFloat($qty);
           $qty = isNaN($qty)?0:$qty;
           $price = $(this).parent().parent().children('.price').text().replace(/,/g, '');
           $subtotal = $qty*$price;
           $(this).parent().parent().children('.subtotal').text($subtotal.toFixed(2));
	   })*/
       $('.update').click(function(){
           $('#cartfrm').attr('action', '').submit();
       })
       $('a.remove-row').click(function(e){
            e.preventDefault();
            $rowid = $(this).attr('rel');
            $.post('<?php echo $base;?>ecommerce/delItem', {'rowid': $rowid}, function(){
                window.location.reload();
            })
       });
	   $('.keep').click(function(){
           $(location).attr('href','<?php echo $base;?>admin/libraries_metro?libtype=1');
		   return false;
       });
		$('#id_btn_checkout').click(function() {
			if( confirm("Are you sure your Cart is Updated?") ) {
				$('#cartfrm').submit();
			}
			else {
				return false;
			}
		});	   
	})
</script>