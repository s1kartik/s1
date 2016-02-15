<?php $this->load->view('header_admin');?>
<?php 
    $cp = isset($_POST['page'])?(int)$_POST['page']:1;
    $startp = floor(($cp-1)/10)*10+1;
    $prevp = $cp - 1;
    $nextp = $cp + 1;
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
			   <h3 align="center"><?php echo isset($library_type) ? $library_type : '';?></h3>
                <div id="row-filter">
                  <div class="profile-content-filter">
                    <?php 
                    //if( isset($libraries) && sizeof($libraries) ) 
					{
                        $this->load->view('library_filter');
                    }?>
                  </div>
                </div>
				<form class="form-horizontal forms1" method="post">
                <div class="union-container">
                  <div class="module library">
                    <div class="row-fluid">
                      <div class="span12">
                        <div class="popup"> 
                          
                          <!--<div class="header-title"><h1><?php echo isset($library_type) ? $library_type."&nbsp;Content Options" : '';?></h1></div>-->
                          <div class="middle-content-option">
                            <div class="left1">
                              <div class="news1title">
                                <p> <span><?php echo isset($library_type) ? $library_type : '';?><span> </p>
                              </div>
                            </div>
                            <div class="right s1libcontents">
                              <ul class="content-options">
                                <?php 
								if( isset($libraries) && sizeof($libraries) ) {
									foreach($libraries AS $library) {
										$library_id		= $library['library_id'];
										
										$total_pages 	= $this->libraries->getTotalPageNumber($library_id);
										
										$library_type_id= $library['library_type_id'];
										$library_type 	= $library['library_type'];
										$title 			= $library['title'];
										$description 	= $library['description'];
										$price 			= $library['price'];
										$credits 		= $library['credits'];
										
										$is_libbought = $this->libraries->checkLibraryBought($library_id);

										$contents_on_hover = '<h5><p><strong>'.$title.'</strong></p></h5><h5><p>'.$description.'</p></h5><h5>Price: $'.$price.'</h5>';
										if( '0' == $is_libbought )
										{?>
											<li>
											  <div class="library-item-img"> <a href="#" rel="<?php echo $library_id;?>" class="add_to_cart description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="Library Details" data-placement="bottom" data-trigger="hover"><?php echo ($cnt_libtype+1);?> </a> </div>
											</li>
											<?php 
										}
										else {
											if( $total_pages <= 0 ) {
												$contents_on_hover = '<h5><p><strong>No pages available.</h5>';
												$href = "#";
											}
											else {
												$href = $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id."&section=desc";
											}
											?>
											<li class="bought">
											  <div class="library-item-info"> <a href="<?php echo $href;?>" rel="<?php echo $library_id;?>" class="description" data-toggle="popover" data-content="<?php echo $contents_on_hover;?>" data-original-title="Library Details" data-placement="bottom" data-trigger="hover"> <?php echo ($cnt_libtype+1);?> </a> </div>
											</li>
											<?php 
										}
										$cnt_libtype++;
									}
								}
								else {
									echo "<h2 class='fl'>No data available</h2>";
								}
								?>
                                <div class="clear"></div>
                              </ul>
                            </div>
							
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--------END ITEM--------> 
                  </div>
		  
                </div>
				 <!-- Start - Pagination -->
						<div class="text-right">
							<div class="pagination">
								<ul>  <!--removed class="input-append"-->
									<?php 
									if($prevp>0) {?>
										<li><button name="page" class="btn btn-warning" value="<?php echo $prevp;?>">Prev</button></li>
									<?php 
									}
									for($i=$startp; $i<$startp+10; $i++){ 
										if( $i<=$pages ){?>
											<!--<li><a href="<?php echo $base;?>admin/library_page_contents?libid=<?php echo $_GET['libid'];?>&libtype=<?php echo $library_type_id;?>&section=desc&page=<?php echo $i;?>"><?php echo $i;?></a></li>-->
											<li><button name="page" class="btn btn-warning <?php echo ($cp==$i)?"btn-current-page":"";?>" value="<?php echo $i;?>"><?php echo $i;?></button></li>
										<?php 
										} else { 
											break; 
										}
									}
									if( $nextp<=$pages ) {?>
										<li><button name="page" class="btn btn-warning" value="<?php echo $nextp;?>">Next</button></li>
									<?php 
									}?>
								</ul>
								
								<?php 
								if( isset($libraries) && sizeof($libraries) ) {
									?>
									<input type="hidden" name="current_page_id" value="<?php echo $library_id;?>" />
								<?php 
								}?>
							</div>
						</div>
					<!-- End - Pagination -->
					</form>
                <h4 align="center">*Click on the icon to read or buy the content.</h4>
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
            <div id="leaderboard" class="span8"> <img src="<?php echo $base;?>img/leaderboard.png"> </div>
          </div>
        <!-- end bottom banner ad --> 
      </div>
    </div>
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
<style type="text/css">.library-item.ui-draggable-dragging { background: #ccc; opacity: 0.8; border: 1px solid #ccc; padding: 10px; border-radius: 5px;}</style>
