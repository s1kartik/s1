<?php $this->load->view('header_admin'); ?>
<div class="homebg">


 
  

<div class="container container-profile">

  <div class="profile-wrapper">

  <div id="equip-container" class="row-fluid">
  
   <!-- Start Profile Menu Navigation -->
    <div id="equip-items"  class="span6">
    
     <!-- Start cart widget --> 
      <div  id="equip-landing" class="profile-menu-box">
      
         <div class="profile-menu-heading clearfix">
          <h3>Safety Equipment</h3>
         </div>
         
         <div class="cart-info"> 
          <h5>Learn more about the equipment that is helping you stay safe. Click on the <span style="color:#e61e25" >red dots</span> to get more info.</h5>
         
         </div>
         
         
         
         
       
       
         </div>    
      
   

   <?php
	 		$page = null;
			$page = $_REQUEST['equip-trade'];

 switch ($page) {
 case null:
 $page = "construction";
  break;	 
	 }

	  $this->load->view('equip-trades/'.$page.'.php'); ?>
 
    
    
  </div>
  
  <div class="row-fluid">
  
<!-- Bottom Banner Ad -->

<?php $this->load->view('center-leaderboard.php'); ?>    

<!-- end bottom banner ad -->

    
  </div>
  
  
  
  </div>
  
 </div>
 
</div>
<?php $this->load->view('footer_admin'); ?>



