<?php $this->load->view('header_admin');?>

	<div class="homebg metro ">
		<!--BEGIN PAGE TITLE-->
		<div class="container-fluid">
			<div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
            	<em class="margin20">MY CHALLENGES</em>
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
									<a href="#modal_challenge1"  data-toggle="modal"  class="tile double triple-half bg-darker">
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge1.png";?>">	</div>
                                        <div class="tile-status">
											<span class="name">CHALLENGE 1</span>
												
                                                
										</div>
									</a>
                                    <!--START - Points MOdal-->
									<div id="modal_challenge1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header bg-red">
											
											<h3 id="myModalLabel">CHALLENGE CARD #1<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
										</div>
										<div class="modal-body">
												
												<div class="tile-content text-center ">
                                                	<a href="<?php echo $base."admin/getstart_metro";?>">
                                                    	<img src="<?php echo $base."img/challenges/challenge1-1.png";?>">
                                                    </a>
                                                </div>
                                                <div class="tile-content text-center ">&nbsp;</div>
                                                
                                                <div class="tile-content text-center ">
                                                	<a href="<?php echo $base."admin/fatality_metro";?>">
		                                                <img src="<?php echo $base."img/challenges/challenge1-2.png";?>">
                                                    </a>
                                                </div>
                                                <div class="tile-content text-center ">&nbsp;</div>
                                                
                                                <div class="tile-content text-center ">
                                                	<a href="<?php echo $base."admin/connections_metro";?>">
		                                                <img src="<?php echo $base."img/challenges/challenge1-3.png";?>">
                                                    </a>
                                                </div>
                                        </div>
                                        
										
										<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
									</div>
									<!--END - Points MOdal-->
									<a href="#" class="tile double triple-half bg-darker half-opacity" >
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge2.png";?>"></div>
                                        <div class="tile-status">

											<span class="name">CHALLENGE 2</span>

										</div>
									</a>
                                    <a href="#" class="tile double triple-half bg-darker half-opacity" >
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge3.png";?>"></div>
                                        <div class="tile-status">

											<span class="name">CHALLENGE 3</span>

										</div>
									</a>
                                    <BR />
                                    <a href="#" class="tile double triple-half bg-darker half-opacity" >
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge4.png";?>"></div>
                                        <div class="tile-status">

											<span class="name">CHALLENGE 4</span>

										</div>
									</a>
                                    <a href="#" class="tile double triple-half bg-darker half-opacity" >
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge5.png";?>"></div>
                                        <div class="tile-status">

											<span class="name">CHALLENGE 5</span>

										</div>
									</a>
                                    <a href="#"  class="tile double triple-half bg-darker half-opacity" >
										<div class="tile-content image"><img src="<?php echo $base."img/challenges/challenge6.png";?>"></div>
                                        <div class="tile-status">

											<span class="name">CHALLENGE 6</span>

										</div>
									</a>						
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