<?php $this->load->view('header_admin');?>
<?php 
    $cp = isset($_GET['page'])?(int)$_GET['page']:1;
    $startp = floor(($cp-1)/10)*10+1;
    $prevp = $cp - 1;
    $nextp = $cp + 1;
?>

<div id="library-container" class="content-row" >
  <div class="popup">
    	<div class="header-title"><h1>OHSA Content Options</h1></div>
        <div class="middle-content">
            <div class="left">
            	<div class="news1title">
            		<p>
                		<span>OHSA</span>
                	</p>
                </div>
            </div>
            <div class="right">
            	<ul class="content-options">
				<?php 
				$cnt_libtype = 0;
				foreach($libraries AS $library) {
					$library_type 	= $library['library_type'];
					$title 			= $library['title'];
					$description 	= $library['description'];
					$price 			= $library['price'];
					$credits 		= $library['credits'];

					$contents_on_hover = '<h5><p><strong>'.$title.'</strong></p></h5><h5>Price: $'.$price.'</h5><h6>'.$credits.' points</h6>';
					?>
					<li>
						<div class="library-item-info">
							<a href="#" class="description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="Library Content Details" data-placement="bottom" data-trigger="hover">
								<?php echo ($cnt_libtype+1);?>
							</a>
						</div>
					</li>
					<?php 
					$cnt_libtype++;
				}?>
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
        <div class="footer-title"><h2>***All library content is according to industry, sector and trade. available multi-language</h2></div>
    </div>
</div>
<!-- End FOURTH content row TRADE CERTIFICATION--> 

<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).ready(function () {         
        $('.description').popover({html: true});
        $('a.add_to_cart').click(function(e){
            e.preventDefault();
            $.post('<?php echo $base;?>ecommerce/addItem', {'id':$(this).attr('rel')}, function(data){
                var cart = $.parseJSON(data);
                $('#qty-in_cart').text(cart.qty);
                $('#amount_in_cart').text(cart.amount);
            })
        })
    });
</script>
<script src="<?php echo $base;?>js/jquery-1.9.1.js"></script>
<script src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
    var jq191 = jQuery.noConflict();
    jq191(document).ready(function () {
        jq191('.library-item img').draggable({helper: 'clone', start: function (event, ui) {
            /*
                jq191(ui.helper).css("margin-left", event.clientX - jq191(event.target).offset().left);
                jq191(ui.helper).css("margin-top", event.clientY - jq191(event.target).offset().top);*/
        }});
        jq191('.cart-info').droppable({
          drop: function( event, ui ) {
            jq191.post('<?php echo $base;?>ecommerce/addItem', {'id':ui.draggable.attr('id')}, function(data){
                var cart = $.parseJSON(data);
                jq191('#qty-in_cart').text(cart.qty);
                jq191('#amount_in_cart').text(cart.amount.toFixed(2));
            })
          }
        });
    }) 
</script>

<style type="text/css">
    .library-item.ui-draggable-dragging { background: #ccc; opacity: 0.8; border: 1px solid #ccc; padding: 10px; border-radius: 5px;}
</style>

