<?php $this->load->view('header_admin'); ?>
<div class="homebg metro">
<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <h4 class="fglightgrey" align="center">ACCESS DENIED</h4>
        </div>
    </div>
    <!--END PAGE TITLE-->
<div class="container-fluid" style="padding-bottom:30px">
<div class="row-fluid">
<div id="library-container" class="content-row bg-black">
<!-- Begin Section -->

    <h4 class="fg-red padding20" align="center" >You are not allowed to access this area.</h4>
    <div class="checkout-area" style="text-align:center !important">
				<button class="danger " type="button" id="id_btn_dashboard">Back to dashboard</button>
	</div>
    </div>
</div>
</div>
</div>
<script>
$('#id_btn_dashboard').click(function(){
           $(location).attr('href','<?php echo $base;?>admin/dashboard');
		   return false;
       });
</script>
<?php $this->load->view('footer_admin');?>

