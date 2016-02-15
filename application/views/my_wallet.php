<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
		<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
            	<em class="margin20">MY WALLET</em>
            </div>
		</div>
		<!--END PAGE TITLE-->
			<div class="container-fluid">
				<div class="main-content padding-metro-home clearfix"> 
					<!-------BEGIN FIRST ROW OF TILES------>
						<div class="tile-group no-margin no-padding clearfix span2"></div>
					<!-------END FIRST ROW OF TILES------>  
					
					<!-- BEGIN SECOND COLUMN FIRST ROW -->
					
						<div class="tile-group no-margin no-padding clearfix" > 
									<a href="#modal_my_points"  data-toggle="modal"  class="tile double triple-half bg-darker">
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."points.png";?>"></div>
                                        <div class="tile-status">
											<span class="name">MY POINTS</span>
										</div>
									</a>

									<?php 
									// START - Get points, level, nextlevel and Update Points and Level //
										$total_points = $this->points->getS1Points($this->session->userdata("userid"), $this->sess_usertype);

										// Current Level points //
											$rows_points_level = $this->points->getPointsLevel($total_points,1);
											$points_of_level = isset($rows_points_level[0]['in_points_of_level']) ? $rows_points_level[0]['in_points_of_level'] : 10;

										// Update points and level //
											$this->points->updateUsersPointsWithLevelHistory('', $this->sess_userid, $total_points);

										// Get points Level
											$points_level   = $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$this->sess_userid.'"', '', 'in_points_level');
											$points_level 	= (isset($points_level[0]['in_points_level'])&&$points_level[0]['in_points_level']<=3) ? $points_level[0]['in_points_level'] : '0';

										$next_level_points 	= Common::getNextLevelPoints($points_level); // Next Level Points //
										$next_level 		= ($points_level>=0&&$points_level<=3) ? ($points_level+1) : ''; // Next Level //
									// END - Get points, level, nextlevel and Update Points and Level //

										if( $total_points == 0 ) {
											$progressbar_value = 0;
										}
										else {
											if( $total_points >= $next_level_points ) {
												$progressbar_value = 100;
											}
											else {
												if( $points_level==0 ) {
													$progressbar_value = (100 / ($next_level_points/$total_points));
												}
												else {
													$subs_points = ($total_points-$points_of_level)==0 ? "1" : ($points_of_level/($total_points-$points_of_level));
													$progressbar_value = ( 100/$subs_points );
												}
											}
										}
									?>
                                    <!--START - Points MOdal-->
									<div id="modal_my_points" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
											<h3 id="myModalLabel">My Points<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body">											
											<div class="tile-content text-center "><img src="<?php echo $base."img/points-level/level_".$points_level.".png";?>" width="200" height="200"></div>
											<div class="tile-content text-center ">&nbsp;</div>
											<div class="tile-content text-center f22"><strong><?php echo number_format($total_points)." POINTS";?></strong></div>
											<div class="tile-content text-center ">&nbsp;</div>
											<div class="progress-bar large" data-role="progress-bar" data-value="<?php echo $progressbar_value;?>">
												<div class="bar bg-cyan" style="width: <?php echo $progressbar_value;?>%;"></div>
											</div>
											<div class="tile-content text-left "><?php echo "<b>Next Level: ".$next_level."</b>";?></div>
											<div class="tile-content text-left "><?php echo "<b>Points needed to reach Next Level: ".$next_level_points."</b>";?></div>
                                        </div>
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
									<!--END - Points MOdal-->
									<a href="<?php echo $base."admin/buy_credits";?>" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."buy_credits.png";?>"></div>
                                        <div class="tile-status"><span class="name">BUY CREDITS</span></div>
									</a>
                                    <a href="#modal_credits_history" data-toggle="modal" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."history_credits.png";?>"></div>
                                        <div class="tile-status"><span class="name">HISTORY OF CREDITS</span></div>
									</a>
									<?php $this->load->view('credits_history_view');?>
                                    <div class="clearfix"></div>
                                    <a href="#" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content"><img src="<?php echo $base;?>img/ad/my_wallet/ad1.png"></div>
                                        <div class="tile-status"><span class="name"></span></div>
									</a>
                                    <!--a href="< ?php echo $base."admin/my_challenges";?>" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."challenges.png";?>"></div>
                                        <div class="tile-status"><span class="name">MY CHALLENGES</span></div>
									</a-->
                                    <a href="#modal_purchase_history" data-toggle="modal" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."purchases.png";?>"></div>
                                        <div class="tile-status"><span class="name">MY PURCHASES</span></div>
									</a>
									<?php $this->load->view('purchase_history_view');?>
									
                                    <a href="#modal_faq" data-toggle="modal" class="tile double triple-half bg-darker add_to_cart description" >
										<div class="tile-content icongetstarted"><img src="<?php echo $base.$this->path_img_my_wallet."faq.png";?>"></div>
                                        <div class="tile-status"><span class="name">FAQ</span></div>
									</a>
									<!--START - FAQ MOdal-->
         <div id="modal_faq" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-header bg-red">
           
           <h3 id="myModalLabel">FAQ<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
          </div>
          <div class="modal-body">
			 <dl >
				  <dt>What are S1 Credits?</dt>
				  <dd>Think of credits as S1 very own currency. Simply load your account with credits to buy S1 Library contents as you go.</dd>
				  <dt><dl></dl></dt>
				  <dt>Do I Have to Use S1 Credits?</dt>
				  <dd>No you don't need. But it is much more easy. While credit works best for most users, you can always Pay as You Go with your Credit Card to buy S1 Library content. Buy using your credits is cheaper than by cash.</dd>
				  <dt><dl></dl></dt>
				  <dt>How Many Credits Do I Need?</dt>
				  <dd>The credit cost of a content will depend on Type, Industry, Trades and Quantity. The total of Credits will depend on its size of the company, number of workers and number of projects. We also offer a Platinum Option that allows you to buy big amount of credits.</dd>
				  <dt><dl></dl></dt>
				  <dt>How Long Are My Credits Good For?</dt>
				  <dd>Credits are valid for one year from the date of purchase. We'll send you an email notification before your credits expire. Click Here to see your credit balance.</dd>
				  
				</dl>
			</div>
          <div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
         </div>
         <!--END - FAQ MOdal-->
						</div>
						
					<!-- END SECOND COLUMN FIRST ROW -->

					<!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
					<div class="tile-group no-margin no-padding clearfix span2"></div>
					<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
				</div>
			</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->
<?php $this->load->view('footer_admin');?>