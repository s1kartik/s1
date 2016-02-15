<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL SAFETY BOARD</em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid ">
        <div class="main-content padding-metro-home clearfix"> 
        <!--START CODE FOR METRO STYLE-->
        <!-------BEGIN FIRST ROW FIRST COLUMN OF TILES------>
             <div class="tile-group no-margin no-padding clearfix " > 
                <?php $this->load->view('dig_proj_left_tile');?>
             </div>
        <!-- END  FIRST ROW FIRST COLUMN -->                                 
                <!-------BEGIN FIRST ROW SECOND COLUMN OF TILES------>
             <div class="tile-group no-margin no-padding clearfix " > 
                <!--begin CONNECTION tile -->
                <a href='#form1000' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/form_1000.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>FORM 1000</small></span>
                    </div>
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a href='#nop' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/nop.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>NOP</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin dig-safety-board tile -->
                <a href="<?php echo $base;?>admin/jhsc_meetings_metro" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/meetings.png"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name"><small>MINUTES MEETINGS</small></span>
                    </div>
                
                </a><br />
                <!--end dig-safety-board tile-->
                <!--begin inspections tile -->
                <a href='#washroom' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/washroom.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>WASHROOM</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a href='#emergencyplan' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/emergency_plan.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>EMERGENCY PLAN</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a href='#hazardsalerts' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/hazards.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>HAZARDS ALERTS</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                <!--begin SAFETY BOARD tile -->
                <a href='#molinspection' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/mol_inspection.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>MOL INSPECTION</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a href='#newworkerorientation' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/new_worker_orientation.png"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name"><small>NEW WORKER ORIENTATION</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a href='#actregulation' data-toggle='modal'  class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/dig-safety-board/act_reg.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>ACT/REGULATION</small></span>
                    </div>
                
                </a><br />
                <!--end  DATA tile-->
                 
             </div>
                          

         <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
									<div class="tile-group no-margin no-padding clearfix span2" >                    
										<!--begin text information paragraphs -->
											<!--begin small tile-->
									<?php $this->load->view('advertisement_right_tile');?>
								<!--end small tile--> 
                                
										<!--end text information paragraphs-->  
										 
										
										
									</div>
								<!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
        </div>
    </div>
</div>
<!--END OF CODE FOR METRO STYLE-->
<!--********************* BEGIN MODAL FORM 1000 ******************* -->

<div id="form1000" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">FORM 1000<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL CHARITIES-->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL FORM 1000 ******************* -->
<!--********************* BEGIN MODAL NOP ******************* -->

<div id="nop" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">NOP<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL NOP ******************* -->
<!--********************* BEGIN MODAL WASHROOM ******************* -->

<div id="washroom" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">WASHROOM<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
  <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL WASHROOM ******************* -->
<!--********************* BEGIN MODAL EMERGENCY PLAN ******************* -->

<div id="emergencyplan" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">EMERGENCY PLAN<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
                    </div>
<!--********************* END MODAL EMERGENCY PLAN ******************* -->
<!--********************* BEGIN MODAL HAZARDS ALERTS ****************** -->

<div id="hazardsalerts" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">HAZARDS ALERTS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL-->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL HAZARDS ALERTS ******************* -->
<!--********************* BEGIN MODAL MOL INSPECTION ******************* -->

<div id="molinspection" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">MOL INSPECTION<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL-->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL MOL INSPECTION ******************* -->
<!--********************* BEGIN MODAL NEW WORKER ORIENTATION ******************* -->

<div id="newworkerorientation" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">NEW WORKER ORIENTATION<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL NEW WORKER ORIENTATION ******************* -->
<!--********************* BEGIN MODAL ACT/REGULATION******************* -->

<div id="actregulation" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">ACT/REGULATION<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
                        </div>
                        <div class="modal-body">
                        <!--BEGIN BODY MODAL -->
                         <div class="charities-container" style="padding:5px 10px 0px 10px;box-shadow: none;">
              <div class="contact-form" style="border-top:none;padding-top:0px;margin:0px;">

                                <p>The standard Lorem Ipsum passage, used since the 1500s

"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
 magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
 eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
 voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione 
 voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci 
 velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut 
 enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
   vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL -->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
</div>
<!--********************* END MODAL ACT/REGULATION******************* -->

<?php $this->load->view('footer_admin');?>
