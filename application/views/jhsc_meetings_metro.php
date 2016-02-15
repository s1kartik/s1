<?php $this->load->view('header_admin');?>

<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">JHSC MINUTES/MEETINGS</em>
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
                <a href="#new" data-toggle="modal" class="tile bg-red">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/jhscmeeting/meetings.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>NEW MEETING</small></span>
                    </div>
                
                </a>
                <!--end tile-->
                <!--begin assign tile -->
                <a href="#jan" data-toggle="modal" class="tile bg-black">
                    
                    <div class="tile-status">
                            <span class="name"><small>JAN/2014-1</small></span>
                    </div>
                
                </a>
                <!--end assign tile-->
                <!--begin dig-safety-board tile -->
                <a class="tile bg-black">
                    
                    <div class="tile-status">
                            <span class="name"><small>FEB/2014-1</small></span>
                    </div>
                
                </a><br />
                <!--end dig-safety-board tile-->
                <!--begin inspections tile -->
                <a class="tile bg-black">
                    
                    <div class="tile-status">
                            <span class="name"><small>MAR/2014-1</small></span>
                    </div>
                
                </a>
                <!--end inspections tile-->
                <!--begin investigations tile -->
                <a class="tile bg-black">
                    
                    <div class="tile-status">
                            <span class="name"><small>MAR/2014-2</small></span>
                    </div>
                
                </a>
                <!--end investigations tile-->
                <!--begin safety talks tile -->
                <a class="tile bg-black">
                    
                    <div class="tile-status">
                            <span class="name"><small>APR/2014-1</small></span>
                    </div>
                
                </a><br />
                <!--end safety talks tile-->
                
                 
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

<!--start modal new page-->
<div id="jan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-header bg-red">
        <h3 id="myModalLabel">JHSC MEETING<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
    </div>
    <div class="modal-body">
   	<h5>JOINT HEALTH & SAFETY COMMITTEE</h5>
        <p>Date: December 12, 2013<br/>
        Meeting: #3<br/>
        Location: Site Office<br />
        Next meeting: January 9th, 2014.</p>
        <h5>Attendance:</h5>
        <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Workers/Representatives</th>
                  <th>Company</th>
                  <th>Attendance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Domenic Mesiti</td>
                  <td>Consolidated</td>
                  <td>Y</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Vince Amenta</td>
                  <td>Smart</td>
                  <td>Y</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Carlos Quintas</td>
                  <td>Consolidated</td>
                  <td>N</td>
                </tr>
              </tbody>
            </table>
            <h5>Old Business:</h5>
        <table class="table table-striped">
              <tbody>
                <tr>
                  <td>1</td>
                  <td>WHMIS - MSDS training/sign off for all workers. Please provide pingk copies back to head office
                      of material reviewed with wrkers. **(ONGOING)**</td>
                 
                </tr>
                
              </tbody>
            </table>
            <h5>New Business:</h5>
        <table class="table table-striped">
              <tbody>
                <tr>
                  <td >1</td>
                  <td>WHMIS - MSDS training/sign off for all workers. Please provide pingk copies back to head office
                      of material reviewed with wrkers. **(ONGOING)**</td>
                 
                </tr>
                
              </tbody>
            </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>
<!--end modal new page-->
<!--start modal Jan/2014 meeting page-->
<div id="new" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-header bg-red">
        <h3 id="myModalLabel">JHSC MEETING<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
    </div>
    <div class="modal-body">
   	<h5>JOINT HEALTH & SAFETY COMMITTEE</h5>
        <p>Date: December 12, 2013<br/>
        Meeting: #3<br/>
        Location: Site Office<br />
        Next meeting: January 9th, 2014.</p>
        <p>Attendance:</p>
        <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Workers/Representatives</th>
                  <th>Company</th>
                  <th>Att</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><input type="text" class="input-large" placeholder="Type"></td>
                  <td><input type="text" class="input-small" placeholder="Type"></td>
                  <td ><input type="radio" name="att1" id="attY" value="Y" checked>Y
                  	   <input type="radio" name="att1" id="attN" value="N" >N
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><input type="text" class="input-large" placeholder="Type"></td>
                  <td><input type="text" class="input-small" placeholder="Type"></td>
                  <td ><input type="radio" name="at2t" id="attY" value="Y" checked>Y
                  	   <input type="radio" name="att2" id="attN" value="N" >N
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><input type="text" class="input-large" placeholder="Type"></td>
                  <td><input type="text" class="input-small" placeholder="Type"></td>
                  <td ><input type="radio" name="att3" id="attY" value="Y" checked>Y
                  	   <input type="radio" name="att3" id="attN" value="N" >N
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><input type="text" class="input-large" placeholder="Type"></td>
                  <td><input type="text" class="input-small" placeholder="Type"></td>
                  <td ><input type="radio" name="att4" id="attY" value="Y" checked>Y
                  	   <input type="radio" name="att4" id="attN" value="N" >N
                  </td>
                </tr>
              </tbody>
            </table>
             <h5>Old Business:</h5>
        <table class="table table-striped">
              <tbody>
                <tr>
                  <td>1</td>
                  <td><input type="text" class="span5" placeholder="Type"></td>
                 
                </tr>
                
              </tbody>
            </table>
            <h5>New Business:</h5>
        <table class="table table-striped">
              <tbody>
                <tr>
                  <td >1</td>
                  <td><input type="text" class="span5" placeholder="Type"></td>
                 
                </tr>
                
              </tbody>
            </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
    </div>
</div>
<!--end modal Jan/2014 meeting page-->


<?php $this->load->view('footer_admin');?>
