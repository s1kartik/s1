                <!--************BEGIN TAB MENU***************-->
            <ul class="nav nav-tabs " style="margin-right: 10px;">
                
                    <li class="profile active" ><a href="#cover" data-toggle="tab" class="fg-white fg-hover-black">DP Cover</a></li>
                    <li class="profile" ><a href="#information" data-toggle="tab" class="fg-white fg-hover-black" >Project Information</a></li>
                    <li class="profile "><a href="#categories" data-toggle="tab" class="fg-white fg-hover-black">Categories</a></li>
            </ul>
			<!--************END TAB MENU***************-->
			<!--************BEGIN  PANELS***************-->
                <div class="tab-content " style="overflow:hidden">
                  <!--************begin cover panel***********-->
                  <?php $this->load->view('dig_proj_cover_panel');?>
                  
                  <!--************end cover panel***********-->
                  <!--************end information panel***********-->                  
                  <div class="tab-pane fade" id="information">
                  	<?php $this->load->view('dig_proj_info_panel');?>
                  </div>
                  <!--************end cover panel***********-->
                  <!--************end cover panel***********-->
                  <div class="tab-pane fade" id="categories">
                  	<?php $this->load->view('dig_proj_categ_panel');?>
                  </div>
                  <!--************end cover panel***********-->

                </div>
			<!--************END PANELS***************-->

                
                
