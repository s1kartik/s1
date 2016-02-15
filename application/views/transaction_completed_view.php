<?php $this->load->view('header_admin'); ?>
<div class="homebg metro">
<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">Thank You for Your Order</em>
        </div>
    </div>
    <!--END PAGE TITLE-->

<div class="container-fluid" style="padding-bottom:30px">
<div class="row-fluid">

<!-- ***********************************-->
<!-- GENERAL LIBRARY -->
<!-- ***********************************-->
<!-- Start FIRST content row GENERAL LIBRARY-->
<div id="library-container" class="content-row bg-black" >
	<div class="tablehead bg-red fg-white">
        <h4 class="fg-white">The following libraries have been add to your library.</h4>
    </div>
    <div style="padding: 5%;">
    
    <table class="table bg-black fg-white">
        <tr><td>Title</td><td></td><td class="textright">Qty</td></tr>
    <?php 
	foreach($items as $item) {?>
    	<?php 
						$icon = "";
						switch ($item['library_type']){
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
		<script type="text/javascript">
			var libtype = '<?php echo $item['library_type'];?>';
			if( "new_procedure" == libtype ) {
				setPagePoints(11, 54, 'id_modal_points', 'modal_points', 'procedures');
			}
		</script>
        <tr >
        <td class="span1"><span class="icon" ><img src="<?php echo $base;?>img/<?php echo $icon;?>.png" width="30" height="30"></span></td>
        <td><?php echo $item['name'];?></td>
        <td class="textright"><?php echo $item['qty'];?></td>
        </tr>
		<?php 
	}?>
    </table>
    <div class="checkout-area">
				<button href="<?php echo $base;?>admin/profile" class="keep link" style="float: left;">Keep Shopping</button>
				
			</div>
    </div>
</div>
</div>
</div>
</div>
<!-- End FOURTH content row TRADE CERTIFICATION--> 
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).ready(function () {
	   $('.keep').click(function(){
           $(location).attr('href','<?php echo $base;?>admin/profile');
		   return false;
       });		   
	})
</script>