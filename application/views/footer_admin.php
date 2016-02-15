<?php 
if(!isset($module) || $module!="dashboard") {?>
            </div>        
        </div>
      </div>
    </div>
   <!-- End Profile Content -->
  </div>

  <div class="row-fluid">
	<!-- Bottom Banner Ad -->
		<?php $this->load->view('center-leaderboard.php'); ?>
        
	<!-- end bottom banner ad -->
  </div>
</div>
</div>
</div>
<!--end body -->

<script type="text/javascript">
	$('.carousel_ads').carousel({interval: 3000});
	$(document).ready(function () {
        $('#frm_footer_admin input[type=submit]').click(function(e){
            if($('#frm_footer_admin label.error').size()>0){
                e.preventDefault();
            }
        })
        $('#searchby').change(function(){
            $table = $(this).attr('rel');
            if($(this).val()!=""){
                $.post('<?php echo $base;?>admin/getTableColumn', {'table': $table, 'field': $(this).val()}, function(data){
                    $("#searchresults").html(data);
                    $('input[name=searchval]').val('');
                });
            }
        })
    });
</script> 
<style type="text/css">
    label.inline{ display: inline-block;}
    .right{ float: right; }
    .left{ float: left; }
</style>
	<?php 
}?>
<footer>
    <div class="container-fluid">
		<div class="wrapper">
			<div class="row-fluid">
				<div class="span6">
    				<h4>SITE NAVIGATION</h4>
    				<div class="menu">
						<ul style="list-style:none;">
							<?php $qrystr = (isset($_GET['userid'])&&(int)$_GET['userid']&&"12"==$this->sess_usertype) ? "?userid=".$_GET['userid'] : '';?>
							<li><a href="#modal_about_us" data-toggle='modal'>About Us</a></li>
							<!--li><a href="< ?php echo $base;?>admin/benefits" >Benefits</a></li-->
							<li><a href="#modal_charities" data-toggle='modal'>Charities</a></li>
							<li><a href="<?php echo $base;?>admin/connections_metro">Connections</a></li>
							<li><a href='#modal_contact_us' data-toggle='modal'>Contact</a></li>
							<li><a href="<?php echo $base;?>admin/dashboard">Dashboard</a></li>
							<li><a href="<?php echo $base;?>admin/hazard" >Digital Hazards</a></li>
							<li><a href="<?php echo $base;?>admin/fatality_metro" >Fatality Breakdown</a></li>
							<li><a href="<?php echo $base;?>admin/getstart_metro" >Get Started</a></li>
							<li><a href="#modal_hsnetwork" data-toggle='modal'>Health and Safety Network</a></li>
                            <li><a href="<?php echo $base;?>admin/mylibrary_training_metro<?php echo $qrystr;?>">H&amp;S Program</a></li>
							<li><a href="#modal_know_your_rights" data-toggle='modal'>Know your Rights</a></li>
							<!--<li><a href="< ?php echo $base;?>admin/map">Map</a></li> -->
							<li><a href="<?php echo $base;?>admin/message_metro" id="profile_message">Messages</a></li>
							
							<li><a href="<?php echo $base;?>admin/profile_view_integrated">My Profile</a></li>
							<li><a href="<?php echo $base;?>admin/profile">Profile Home</a></li>
							<li><a href="<?php echo $base;?>admin/libraries_metro?libtype=1" >S1 Library</a></li>
							<li><a href="<?php echo $base;?>admin/construction" >Safety Equipment</a></li>
							<li><a href="<?php echo $base;?>admin/skilledjob_main" >Skilled Job Section</a></li>
							<li><a href='#modal_terms' data-toggle='modal'>Terms of Use</a></li>
							
							<!--li> <a href="<?php echo $base;?>admin/faq" >FAQ</a></li-->
						</ul>
					</div>
				</div>
				<?php 
				// Modal: About Us //
					$this->load->view('frontend/modal_about_us');
				// Modal: Health and Safety Network //
					$this->load->view('frontend/modal_health_safety_network');
				// Modal: Know your Rights //
					$this->load->view('frontend/modal_know_your_rights');
				// Modal: Young Workers //
					$this->load->view('frontend/modal_young_workers');
				// Modal: Charities //
					$this->load->view('frontend/modal_charities');
				// MODAL CONTACT US //
					$this->load->view('frontend/modal_contact_us');
				// MODAL TERMS OF USE //
					$this->load->view('frontend/modal_terms_of_use');
				
				?>	
				<div class="span6">
    				<h4 class="m_title">CONTACT US</h4>
    				<div class="footer-info">
    					<p>S1 Integration Systems<br />
    					60 Caster Avenue - Vaughan - ON - Canada
                        L4L 5Y9<br />
                    	<a href='#modal_contact_us' data-toggle='modal'>info@mys1s.ca</a></p>
    				</div><!-- end contact-details -->
    			</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="copyright">
						<p>&copy; 2013 <strong>S1</strong>. All Rights Reserved.
							<small><a href='#modal_terms' data-toggle='modal' title="Terms of Use" >Terms of Use</a> </small>
							<a href="http://www.hrqsolutions.com/" target="_new"><img src="<?php echo $base;?>img/hrq/signature.png" /></a>
						</p>
					</div><!-- end copyright -->    			
				</div>
			</div>
        </div>
    </div>
</footer>

<!--style>ol, ul {list-style: none;}</style-->
<script type="text/javascript" src="<?php echo $base;?>js/main.js"></script>
</body>
</html>