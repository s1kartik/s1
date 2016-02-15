<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">DIGITAL PROJECTS</em>
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
                <a class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."connections.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>CONNECTIONS</small></span>
                    </div>
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a class="tile bg-darker" href="<?php echo $base;?>admin/mylibrary_training_metro">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."assign.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>ASSIGN</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin jhsc tile -->
                <a href="<?php echo $base;?>admin/jhsc_metro_employer" class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."jhsc.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>JHSC</small></span>
                    </div>
                
                </a><br />
                <!--end jhsc tile-->
                <!--begin inspections tile -->
                <a class="tile bg-darker" href="<?php echo $base;?>admin/my_inspection_metro">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."inspections.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>INSPECTIONS</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a class="tile bg-darker" href="<?php echo $base;?>admin/mylibrary_investigation_metro">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."investigations.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>INVESTIGATIONS</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a class="tile bg-darker" href="<?php echo $base;?>admin/mylibrary_safetytalks_metro">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."safety_talks.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY TALKS</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                <!--begin SAFETY BOARD tile -->
                <a href="<?php echo $base;?>admin/dig_safety_board_metro_employer" class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."safety_board.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>SAFETY BOARD</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a href='#newworkerorientation' data-toggle='modal' class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."new_worker.png";?>"></i>
                    </div>
                    <div class="tile-status" style="line-height:15px;">
                            <span class="name" ><small>NEW WORKER ORIENTATION</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a href='#digprojdata' data-toggle='modal' class="tile bg-darker">
                    <div class="tile-content icon">
                        <img src="<?php echo $base.$this->path_img_digitalproject."data.png";?>"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>DATA</small></span>
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
         <!--********************* BEGIN MODAL NEW WORKER ORIENTATION ******************* -->

<div id="newworkerorientation" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">NEW WORKER ORIENTATION<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
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

1914 translation by H. Rackham

"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will
 give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, 
 the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, 
 but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely 
 painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, 
 but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a 
 trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?
  But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, 
  or one who avoids a pain that produces no resultant pleasure?"

Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque 
corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
 qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita
  distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
   placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut 
   officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non 
   recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias 
   consequatur aut perferendis doloribus asperiores repellat."</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL CHARITIES-->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
                    </div>
<!--********************* END MODAL New Worker Orientation ******************* -->
     <!--********************* BEGIN MODAL DATA ******************* -->

<div id="digprojdata" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header bg-red">
                            <h3 id="myModalLabel">DATA<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
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

1914 translation by H. Rackham

"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will
 give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, 
 the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, 
 but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely 
 painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, 
 but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a 
 trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?
  But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, 
  or one who avoids a pain that produces no resultant pleasure?"

Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque 
corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
 qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita
  distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
   placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut 
   officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non 
   recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias 
   consequatur aut perferendis doloribus asperiores repellat."</p>
						         
                                  
                      </div>
</div>
                        <!--END BODY MODAL CHARITIES-->  
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal">Close</button>
                        </div>
                    </div>
<!--********************* END MODAL DATA ******************* -->

<?php $this->load->view('footer_admin');?>
