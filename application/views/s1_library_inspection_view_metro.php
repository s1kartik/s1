<?php $this->load->view('header_admin');
$free_price = 0;
?>
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			// animation: "slide", 
			// itemWidth: 1,
			minItems: 2,
			maxItems: 3,
			move: 2,
			reverse: false,
			slideshow: false
		});
	});
</script>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
<div class="container-fluid">
	<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
	<em class="margin20">S1 LIBRARY - INSPECTIONS
        	<a href="#info_s1library_inspections_modal" data-toggle='modal'><span class="icon-info-2 s1_info fg-white"></span></a>
            </em>
        </div>
    </div>
    <!-- Start INFO Modal --> 
    <?php // Modal: INFO//
					$this->load->view('info/s1library_inspections_modal');
				
				?>	
    <!-- End INFO Modal -->
<!--END PAGE TITLE-->

<div class="container-fluid">
	<div class="main-content padding-metro-home clearfix"> 
		<!--START CODE FOR METRO STYLE-->
        <div class="clearfix s1LibCon">
			<!-------BEGIN FIRST ROW OF TILES------>
				<div class="tile-group no-margin no-padding clearfix span3" >                    
					<!--begin tiles menus left side general page -->
					<?php $this->load->view('library_tiles_menu_left');?>
					<!--end tile menus left side general page-->  
				</div>
			<!-------END FIRST ROW OF TILES------>  
			<!-- BEGIN SECOND COLUMN FIRST ROW -->
			<div class="tile-group libtiles libtile-inspection no-margin no-padding clearfix draggable middleTile" max-width="100%;"> 
	   <!--*****************************code pages s1-library-contents *****************-->
<!--*********Begin Customized Inspection************-->
	<?php 
	$ct_page = 0;
	if(count($ct_list)>0) { 
		foreach($ct_list as $ct_val_inspection) {
			$ct_language 		 	= $ct_val_inspection['st_language'];
			$ct_inspection_id 		= $data['item_id'] = $ct_val_inspection['id'];
			$ct_inspection_name 	= $ct_val_inspection[$field_ct_inspection_name];
			$ct_icon_path 		 	= $ct_val_inspection['st_icon_path'];
			$ct_price               = $ct_val_inspection['in_price'];
			$ct_points              = $data['item_points'] = $ct_val_inspection['in_earning_points'];
			$ct_credits             = $data['item_credits'] = $ct_val_inspection['in_credits_buy'];
			$ct_date_inspection_start = $ct_val_inspection['date_inspection_start'];
			$ct_date_inspection_end   = $ct_val_inspection['date_inspection_end'];
			$ct_status 		 	      = $ct_val_inspection['status'];
			$ct_contents_on_hover     = '<h6>$'.$ct_price.' - <img src='.$base.'img/icons_s1credit.png style=height:20px />&nbsp;'.$ct_credits.' - <img src='.$base.'img/icons_xp.png style=height:20px />&nbsp;'.$ct_points.'</h6>';

			$class_addtocart = ($ct_price>$free_price) ? 'add_to_cart' : 'free_library';
			
			$cart_href_string 		= 'id="'.$ct_inspection_id.'" inspection_type="customized" library_type="custom_inspection" insp_title="'.$ct_inspection_name.'" price="'.$ct_price.'" points="'.$ct_points.'" credits="'.$ct_credits.'"';
			?>
				<!--not bought-->
				<a href="#modal_shopping_items<?php echo $ct_inspection_id;?>" <?php echo $cart_href_string;?> rel="<?php echo $ct_inspection_id;?>" class="tile half-library bg-darker <?php echo $class_addtocart;?> select_custom_inspection description"  data-toggle="modal" data-content="<?php echo $ct_contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$ct_inspection_name."</h6>"?>" data-placement="bottom" data-trigger="hover">
				  <?php 
					if( isset($ct_icon_path) && $ct_icon_path ) {?>
						<img src="<?php echo $ct_icon_path;?>" >
					<?php }
					else {?>
						<img src="<?php echo $base.$this->path_img_library."inspections.png";?>">
					<?php 
					}?>
					<span class="fg-white" style="position:absolute;top:5px;"><small><?php echo $ct_inspection_name; ?></small></span>
					<div class="brand">                                              
						<span class="label fg-white text-center">&nbsp;
							<small>
								<i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;
								<?php echo $ct_credits;?>&nbsp;
								<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;
								<?php echo $ct_points;?>
							</small>
						</span>
					</div>
				</a>                
				<?php 
				//if ($ct_page == 6) {
					//$ct_page = -3;
					//echo "<br />";
				//}
				$ct_page++;// = $ct_page + 3;
				if( 'add_to_cart' == $class_addtocart ) {?>
					<div id="modal_shopping_items<?php echo $ct_inspection_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
					<?php 
					$this->load->view('modal_shopping_options', $data);
				}?>
			<?php 
		}// END FOR EACH
	}// END IF COUNT
	?>
<!--*********END Customized Inspection************-->


<!--*********Begin Normal Inspection************-->
	<?php 
	if(count($list)>0) {
		$page = 0;//common::pr($list);
		foreach($list as $val_inspection) {
			$language 		 	= $val_inspection['st_language'];
			$inspection_id 		= $data['item_id'] = $val_inspection['id'];
			$inspection_name 	= $val_inspection[$field_inspection_name];
			$icon_path 		 	= $val_inspection['st_icon_path'];
			$price              = $val_inspection['in_price'];
			$points             = $data['item_points'] = $val_inspection['in_earning_points'];
			$credits            = $data['item_credits'] = $val_inspection['in_credits_buy'];
			$date_inspection_start = $val_inspection['date_inspection_start'];
			$date_inspection_end= $val_inspection['date_inspection_end'];
			$status 		 	= $val_inspection['status'];
			$contents_on_hover = '<h6>$'.$price.' - <img src='.$base.'img/icons_s1credit.png style=height:20px />&nbsp;'.$credits.' - <img src='.$base.'img/icons_xp.png style=height:20px />&nbsp;'.$points.'</h6>';
			
			$class_addtocart = ($price>$free_price) ? 'add_to_cart' : 'free_library';
			
			$cart_href_string 	= 'id="'.$inspection_id.'" inspection_type="normal" library_type="normal_inspection" insp_title="'.$inspection_name.'" price="'.$price.'" points="'.$points.'" credits="'.$credits.'"';
			?>
			<!--not bought-->
			<a href="#modal_shopping_items<?php echo $inspection_id;?>" <?php echo $cart_href_string;?> rel="<?php echo $inspection_id;?>" class="tile half-library bg-darker <?php echo $class_addtocart;?> select_custom_inspection description" data-toggle="modal" data-content="<?php echo $contents_on_hover;?>" data-original-title="<?php echo "<h6 class='margin10'>".$inspection_name."</h6>"?>" data-placement="bottom" data-trigger="hover">
			  <?php 
					if( isset($icon_path) && $icon_path ) {?>
						<img class="w50" src="<?php echo $icon_path;?>" >
					<?php }
					else {?>
						<img src="<?php echo $base.$this->path_img_library."inspections.png";?>">
					<?php 
					}?>
					<span class="fg-white" style="position:absolute;top:5px;"><small><?php echo substr($inspection_name,0,20)."..."; ?></small></span>
					<div class="brand">                                              
						<span class="label fg-white text-center">&nbsp;
							<small>
								<i class=""><img src="<?php echo $base;?>img/icons_s1credit.png" style="height:16px;"></i>&nbsp;
								<?php echo $credits;?>&nbsp;
								<i class=""><img src="<?php echo $base;?>img/icons_xp.png" style="height:16px;"></i>&nbsp;
								<?php echo $points;?>
							</small>
						</span>
					</div>
			</a>
			<?php 
			$page++;

			if( 'add_to_cart' == $class_addtocart ) {?>
				<div id="modal_shopping_items<?php echo $inspection_id;?>" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
				<?php 
				$this->load->view('modal_shopping_options', $data);
			}?>
			<?php 
		}// END FOR EACH 
	}// END IF COUNT
	
	if( count($list)<=0 && count($ct_list)<=0 ) {
		echo "<h3 class='fl'>No data available</h3>";
	}
	else{
		$total_items = count($list) + count($ct_list);
		$total_pages = ceil( $total_items/$this->mylib_rows_limit );
		echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
		$this->common->getS1Pagination($this->router->fetch_method()."?", $pages, $current_page, $this->mylib_rows_limit, 10);
		echo "</div>";
	}?>
	

<!--*********END Normal Inspection************-->

	<!--bought-->
		</div>
		 <!-- END SECOND COLUMN FIRST ROW -->
		 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
			<div class="tile-group no-margin no-padding clearfix span4 inspection-view-content" >
			<?php $this->load->view('customized_inspection_right_tile');?>
			</div>
		<!-------END  THIRD COLUMN FIRST ROW OF TILES------>
		</div>
		</div>
	</div>
</div>
<!--END OF CODE FOR METRO STYLE-->

<?php $this->load->view('footer_admin'); ?>

<script type="text/javascript">
	$(document).ready(function () {
        $('.description').popover({html: true});
		$('a.free_library').click(function(e){
            e.preventDefault();
            $.post(js_base_path+'ajax/ajaxAddFreeLibrary', {'libid':$(this).attr('rel'), 'libtype':$(this).attr('library_type')}, function(data){
				if( data.trim() ) {
					alert("Successfully purchased");
					return false;
				}
            })
        });

		$('a.add_to_cart').click(function(e){
			$item_id = $(this).attr('id');
			$.ajax({
				url: js_base_path+'admin/modal_shopping_items',
				type: 'post', 
				data: {'id':$item_id, 'library_type':$(this).attr('library_type'), 'title':$(this).attr('insp_title'), 'inspection_type':$(this).attr('inspection_type'), 'description':$(this).attr('description'), 'price':$(this).attr('price'), 'points':$(this).attr('points'), 'credits':$(this).attr('credits')},
				success: function(output) {
					$("#modal_shopping_items"+$item_id).html(output);
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
        });
    });
</script> 

<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript">
    var jq201 = jQuery.noConflict();
	var current_page = '<?php echo $current_page;?>';
	
	function resetCustomInspBox()
	{
		localStorage.clear();
		jq201(".custom_id").text("");
		jq201.ajax({
			url: js_base_path+'admin/resetCustomInspBox',
			type: 'post', 
			success: function(output) {
				$("#txt_label_custominsp").val("");
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}
	
    jq201(document).ready(function () {
		var id_custominsp 		= localStorage.getItem("id_custominsp");
		var libtype_custominsp 	= localStorage.getItem("libtype_custominsp");
		var insptype_custominsp = localStorage.getItem("insptype_custominsp");

		jq201.ajax({
			url: js_base_path+'admin/addCustomInspection',
			type: 'post', 
			data: {'id': id_custominsp, 'library_type':libtype_custominsp, 'inspection_type': insptype_custominsp},
			success: function(output) {
				jq201('.custom_id').append(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});

        jq201('.cart-info').droppable({
			drop: function(event, ui) {
            jq201.post(js_base_path+'ecommerce/addItem', {'id':ui.draggable.attr('id'), 'library_type':ui.draggable.attr('library_type'), 'inspection_type': ui.draggable.attr('inspection_type')}, function(data) {
                var cart1 = $.parseJSON(data);
                jq201('#qty-in_cart').text(cart1.qty);
                jq201('#amount_in_cart').text(cart1.amount);
            });
          }
        });

		jq201('.draggable a.select_custom_inspection').draggable({helper:'clone', start: function (event, ui) {
			$(".libtiles.libtile-inspection").css('z-index','10000');
		}});

        jq201('.bundle_custom_inspection').droppable({
			drop: function(event, ui) {
				if( localStorage.getItem('id_custominsp')==null ) {
					var arr_id_custominsp = new Array();
				} else {
					arr_id_custominsp =  JSON.parse(localStorage.getItem('id_custominsp'));
				}

				if (arr_id_custominsp.indexOf(ui.draggable.attr('id')) > -1){
					alert("Already Exists");return false;
				}

				jq201.ajax({
					url: js_base_path+'admin/addCustomInspection', 
					type: 'post', 
					data: {'id': ui.draggable.attr('id'), 'library_type':ui.draggable.attr('library_type'), 'inspection_type': ui.draggable.attr('inspection_type')},

					success: function(output) {
						if( localStorage.getItem('id_custominsp')==null ) {
							var arr_id_custominsp = new Array();
						} else {
							arr_id_custominsp =  JSON.parse(localStorage.getItem('id_custominsp'));
						}
						arr_id_custominsp.push(ui.draggable.attr('id'));
						localStorage.setItem('id_custominsp', JSON.stringify(arr_id_custominsp));
						localStorage.setItem("libtype_custominsp", ui.draggable.attr('library_type'));
						localStorage.setItem("insptype_custominsp", ui.draggable.attr('inspection_type'));

						jq201('.custom_id').append(output);
					},
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
        });
    });
</script>
