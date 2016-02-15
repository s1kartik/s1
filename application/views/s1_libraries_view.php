<?php $this->load->view('header_admin');?>
<?php 
    $cp = isset($_GET['page'])?(int)$_GET['page']:1;
    $startp = floor(($cp-1)/10)*10+1;
    $prevp = $cp - 1;
    $nextp = $cp + 1;
?>
<?php if( "old" == $s1 ){?>

<h3>S1 LIBRARY</h3>
<?php }?>

<!-- ***********************************--> 
<!-- GENERAL LIBRARY --> 
<!-- ***********************************--> 
<!-- Start FIRST content row GENERAL LIBRARY--> 
<!--Start Library Category Filter -->
<?php if( "old" == $s1 ){ $this->load->view('library_filter'); } ?>
<!--End Library Category Filter -->

<?php 
	if( "old" == $s1 ) {?>
		<div id="library-container" class="content-row" >
		<div class="profile-content-heading">
		  <h4>OHSA - Occupational Health and Safety Act</h4>
		</div>
		<!-- Begin skillset items section -->
		<ul class="inline item-group">
		  <?php if(count($libraries)>0):?>
		  <!--  item-->
		  <?php foreach($libraries as $library):?>
		  <li class="clearfix">
			<div class='library-item' id="<?php echo $library['library_id'];?>">
			  <div class="library-item-img"> 
			  <a href="#" title="Drag me to your cart!"> <img src='<?php echo $base;?>img/icons/icon-<?php echo strtolower($library['language']);?>.png' id="<?php echo $library['library_id'];?>"/> </a> </div>
			  <div class="library-item-info">
				<p> <strong> <a href="#" class="description" data-toggle="popover" data-content="<?php echo $library['description'];?>" data-original-title="Brief Description" data-placement="bottom" data-trigger="hover"> <?php echo $library['title'];?> </a> </strong> </p>
				<p>
				<h6><?php echo $library['credits'];?> points</h6>
				</p>
			  </div>
			  <div class="library-item-price">
				<h5>$<?php echo $library['price'];?></h5>
				<p> <small> <a href="#" class="add_to_cart" rel="<?php echo $library['library_id'];?>">add to cart</a> </small> </p>
			  </div>
			  <div class="clear"></div>
			</div>
		  </li>
		  <?php endforeach;?>
		  <!--  item -->
		  <li class="clear" style="width: 98%;">
			<div class="pagination pull-right <?php if($pages<2){echo 'hide';}?>">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="#" rel="<?php echo $prevp;?>">Prev</a></li>
				<?php endif;?>
				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<li><a href="#" rel="<?php echo $i;?>" class="<?php echo ($i==$cp)?'current-page':'';?>">
				  <?php echo $i;?>
				  </a></li>
				<?php else: break; endif;endfor;?>
				<?php if($nextp<=$pages):?>
				<li><a href="#" rel="<?php echo $nextp;?>">Next</a></li>
				<?php endif;?>
			  </ul>
			</div>
		  </li>
		  <?php else:?>
		  <li class='clearfix' style="margin-left: 20px;">No results match your search.</li>
		  <?php endif;?>
		</ul>
		<!-- End skillset items section -->
		<div>
	<?php
	}
	else {
	?>
		<div class="homebg">
		  <div class="container-fluid">
			<div class="profile-wrapper">
				<div class="row-fluid"> 
				  <!-- Start Profile Content -->
				  <div class="span12">
					<div class="border-red">
					  <div class="profile-content-box">
						<div id="profile-content">
						  <h3 align="center">S1 LIBRARIES</h3>
						  <div class="union-container">
							<div class="module library"> 
							  
							  <!--------START  ITEM-------->
							  
							  <div class="row-fluid">
								  <div class="span12">
									<div class="popup">
									  <div class="middle-content">
										<ul class="menu">
											<?php 
												$valid_lib_types = array("ohsa","safety talks","hazards","procedures","inspections","investigations");
												foreach( $rows_library_types AS $key_libtype => $val_libtype ) {
													$library_type_id		= $val_libtype['id'];
													$library_type 			= $val_libtype['library_type'];
													$display_library_type 	= strtoupper($library_type);
													$library_type_lower 	= strtolower($library_type);
													
													if( in_array($library_type_lower, $valid_lib_types ) ) {
													
														$linkurl = $base."admin/libraries?libtype=".$library_type_id;
														if( "ohsa" == $library_type_lower ) {
															$class_name = "ohsa";
														}
														else {
															$class_name = $library_type_lower;
														}
													
														if( "hazards" == $library_type_lower ) {
															$class_name = "hazards";
														}
														if( "safety talks" == $library_type_lower ) {
															$class_name = "safetytalks";
														}
														if( "investigations" == $library_type_lower ) {
															$class_name = "investigations";
														}
														?>
														<li class="<?php echo $class_name;?>"><a href="<?php echo $linkurl;?>"><?php echo $display_library_type;?></a></li>
													<?php
													}
											}?>
										  <div class="clear"></div>
										</ul>
									  </div>
									</div>
								  </div>
								</div>
							  <!--------END ITEM--------> 
							</div>
						  </div>
						  <h4 align="center">***Select the Library clicking on the icon</h4> 
						</div>
					  </div>
					</div>
				  </div>
				  <!-- End Profile Content --> 
				</div>
				  <div class="row-fluid">
					<div class="text-center" id="center-leaderboard">
					  <div class="span4">
						<ul class="inline">
						  <li> <img src="<?php echo $base;?>img/button-1.png"> </li>
						  <li> <img src="<?php echo $base;?>img/button-2.png"> </li>
						</ul>
					  </div>
					  <div id="leaderboard" class="span8"><img src="<?php echo $base;?>img/leaderboard.png"> </div>
					</div>
				  </div>
				  <!-- end bottom banner ad --> 
				</div>
		  </div>
		</div>
	<?php 
	}?>
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
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script> 
<script type="text/javascript">
    var jq201 = jQuery.noConflict();
    jq201(document).ready(function () {
        jq201('.library-item img').draggable({helper: 'clone', start: function (event, ui) {
            /*
                jq201(ui.helper).css("margin-left", event.clientX - jq201(event.target).offset().left);
                jq201(ui.helper).css("margin-top", event.clientY - jq201(event.target).offset().top);*/
        }});
        jq201('.cart-info').droppable({
          drop: function( event, ui ) {
            jq201.post('<?php echo $base;?>ecommerce/addItem', {'id':ui.draggable.attr('id')}, function(data){
                var cart = $.parseJSON(data);
                jq201('#qty-in_cart').text(cart.qty);
                jq201('#amount_in_cart').text(cart.amount.toFixed(2));
            })
          }
        });
    }) 
</script>
<style type="text/css">
    .library-item.ui-draggable-dragging { background: #ccc; opacity: 0.8; border: 1px solid #ccc; padding: 10px; border-radius: 5px;}
</style>
