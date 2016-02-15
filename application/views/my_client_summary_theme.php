                <!--************BEGIN TAB MENU***************-->
            <ul class="nav nav-tabs " style="margin-right: 10px;">
                	<li class="profile " ><a href="#client_description" data-toggle="tab" class="fg-white fg-hover-black">Description</a></li>
                    <li class="profile " ><a href="#client_projects" data-toggle="tab" class="fg-white fg-hover-black">Active Projects</a></li>
                    <li class="profile" ><a href="#client_tools" data-toggle="tab" class="fg-white fg-hover-black" >Tools Summary</a></li>
                    <li class="profile active"><a href="#client_info" data-toggle="tab" class="fg-white fg-hover-black">Client Info</a></li>
            </ul>
			<!--************END TAB MENU***************-->
			<!--************BEGIN  PANELS***************-->
                <div class="tab-content " style="overflow:hidden">
                  <!--************begin Client Info***********-->
                  <div class="tab-pane fade in active" id="client_info">
					<div class="grid fluid">
                   <span class="span2">NAME : </span><span class="span4"> <strong>XPTO CONSTRUCTIONS</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">ADDRESS : </span><span class="span4"> <strong>21 ROYALCREST RD</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">COUNTRY : </span><span class="span4"> <strong>CANADA</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">PROVINCE : </span><span class="span4"> <strong>ONTARIO</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">CITY : </span><span class="span4"> <strong>TORONTO</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">POSTAL CODE : </span><span class="span4"> <strong>M9V 1L6</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">INDUSTRY : </span><span class="span4"> <strong>CONSTRUCTION</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">WORKERS : </span><span class="span4"> <strong>99999</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">SUPERVISORS : </span><span class="span4"> <strong>999999</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2"># OF POINTS : </span><span class="span4"> <strong>999999</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2"># OF CREDITS : </span><span class="span4"> <strong>M9V 1L6</strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span2">LEVEL : </span><span class="span4"> <strong>999999</strong></span>  
                   </div>
                   <div class="grid fluid">
                   <span class="span2">CONSULTANT : </span><span class="span3"> <strong>JOHN DOE</strong></span>
                   <a href='#myConsultantModal' data-toggle='modal' class="fg-white" title="Edit">
                   	<span class="span1"><i class="icon-enter"></i></span> 
                   </a>
                   </div>
                   

                  </div>
                  <!--start modal Consultant-->
					<div id="myConsultantModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	My Consultant
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
                            <form class="form-inline no-margin" method="post">
                                <fieldset>
                                
                                <div class="input-control text size3" style="height:30px">
                                    <input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_workername" id="txt_workername" placeholder="Search"/>
                                    <button type="button" class="btn-search fg-gray"></button>
                                </div>
                                </fieldset>
                            </form>
                            <p>Current Consultant: JOHN DOE</p>
							 <?php for ($a=0;$a<=5;$a++){ ?>               
                            <a href="">FIRST LAST NAME</a><br/>
                            <?php } ?>
                            <div class="pull-right mart25 marr5 pagination small opacity">			<ul>
										<li><a href="" class="bg-red fg-black"><b>1</b></a></li>
												<li><a href="" class="bg-red fg-white"><b>2</b></a></li>
												
					<li class="next"><a href="" class="bg-red fg-white"><i class="icon-next"></i></a></li>
					<li class="last"><a href="" class="bg-red fg-white"><i class="icon-last-2"></i></a></li>
								</ul>
			</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    <script type="text/javascript">
						$('#myConsultantModal').width('300px');
					</script>
								<!--end modal Consultant-->
                  
                  <!--************end client info panel***********-->
                  <!--************begin Tools panel***********-->                  
                  <div class="tab-pane fade" id="client_tools">
                  
                  	<div class="grid fluid">
                    
                    <form class="form-inline no-margin" method="post" name="frm_connection" id="frm_connection">
					<fieldset>From:
					 <div class="input-control text size2 " style="height:30px">
						<input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_username" id="txt_username" placeholder="--/--/--" class=""/>
						<button type="submit" class="btn-search fg-gray"></button>
					</div>
                    <span class="span1"></span>To:
					<div class="input-control text size2 " style="height:30px">
						<input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_username" id="txt_username" placeholder="--/--/--" class=""/>
						<button type="submit" class="btn-search fg-gray"></button>
					</div>
					</fieldset>
				</form>
                
                    
                   <span class="span3">INSPECTIONS : </span>
                   <span class="span1 "> 
                   	<strong>
                    	<a href='#inspectionsModal' data-toggle='modal' class="fg-white">9999</a>
                    </strong></span>
                    <span class="span1"> 
                   	<strong>
                    	<a href='#inspectionsStatModal' data-toggle='modal' class="fg-white">STAT</a>
                    </strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span3">INVESTIGATIONS : </span>
                   <span class="span1 "> 
                   	<strong>
                    	<a href='#investigationModal' data-toggle='modal' class="fg-white">9999</a>
                    </strong></span>
                    <span class="span1 "> 
                   	<strong>
                    	<a href='#investigationStatModal' data-toggle='modal' class="fg-white">STAT</a>
                    </strong></span>
                   </div>
                   <div class="grid fluid">
                   <span class="span3">SAFETY TALKS : </span>
                   <span class="span1 "> 
                   	<strong>
                    	<a href='#saftalksModal' data-toggle='modal' class="fg-white">9999</a>
                    </strong></span>
                    <span class="span1 "> 
                   	<strong>
                    	<a href='#saftalksStatModal' data-toggle='modal' class="fg-white">STAT</a>
                    </strong></span>
                   </div>
                    <!--start modal Inspections page-->
					<div id="inspectionsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	INSPECTIONS
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body bg-black">
        					<div class="row-fluid">
							 <?php for ($a=0;$a<=6;$a++){ ?>               
                            <a href="" rel="35" style="opacity:0.8;" class="insp tile half-library bg-darker description  ui-draggable" data-toggle="popover" data-content="<h6>Condition Of Ladder</h6>" data-original-title="<h6>Condition Of Ladder</h6>" data-placement="bottom" data-trigger="hover" libtype_section="normal_inspection" title="Condition Of Ladder">
                            <i class="icon on-left"><img src="<?php echo $base;?>img/inspection-item-icons/LADDERS.png" width="40">
                            </i>
                                    <span class="list-title fg-white text-center"><small>Condition Of Lad..</small></span>
                                <div class="brand">
                                    <span class="label fg-white text-center"><small>5 points</small></span>
                                    <span class="badge bg-red" id="balance_normal_inspection35">3</span>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer bg-black">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
								<!--end modal Inspections page--> 
                                <!--start modal Inspections STAT page-->
					<div id="inspectionsStatModal" class="modal hide fade bg-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	INSPECTIONS
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body ">
        					<div class="row-fluid">
							 <div id="id_chart_mydata_training" class="bg-black"><div style="position: relative;"><div dir="ltr" style="position: relative;  height: 300px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="500" height="300" aria-label="A chart." style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="500" height="300" stroke="none" stroke-width="0" fill="#000000"></rect><g><rect x="306" y="58" width="101" height="31" stroke="none" stroke-width="0" fill-opacity="0" fill="#00000"></rect><g><rect x="306" y="58" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="68.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">Stat1</text></g><rect x="306" y="58" width="12" height="12" stroke="none" stroke-width="0" fill="#222222"></rect></g><g><rect x="306" y="77" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#ffffff">Stat2</text></g><rect x="306" y="77" width="12" height="12" stroke="none" stroke-width="0" fill="#e51400"></rect></g></g><g><path d="M172.6,182.86973485926734L145.00000000000003,230.67433714816838A92,92,0,0,1,191,59L191,114.19999999999999A36.800000000000004,36.800000000000004,0,0,0,172.6,182.86973485926734" stroke="#ffffff" stroke-width="1" fill="#e51400"></path><text text-anchor="start" x="117.6913951906942" y="136.25701854309423" font-family="Arial" font-size="14"  stroke="none" stroke-width="0" fill="#ffffff">5</text></g><g><path d="M191,114.19999999999999L191,59A92,92,0,1,1,145.00000000000003,230.67433714816838L172.6,182.86973485926734A36.800000000000004,36.800000000000004,0,1,0,191,114.19999999999999" stroke="#ffffff" stroke-width="1" fill="#222222"></path><text text-anchor="start" x="264.3086048093058" y="175.54298145690578" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#ffffff">7</text></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>My Training Data</th></tr></thead><tbody><tr><td>Completed</td><td>7</td></tr><tr><td>Assigned</td><td>0</td></tr><tr><td>Purchased</td><td>5</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 310px; left: 510px; white-space: nowrap; font-family: Arial; font-size: 12px; font-weight: bold;">5 (41.7%)</div><div></div></div></div>
                        </div>
                    </div>
                    <div class="modal-footer bg-black">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    <!--script type="text/javascript">
						$('#inspectionsStatModal').width('300px');
					</script-->
					<!--end modal Inspections STAT page--> 
                    <!--start modal Investigation page-->
					<div id="investigationModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	INVESTIGATION
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
							 <?php for ($a=0;$a<=6;$a++){ ?>               
                            <a href="http://localhost/s1localdev/admin/cover_page_investigation?invformid=36" lib_id="155" libdata="36-6-155" class="investigation tile half-library half-library bg-darker description ui-draggable" data-toggle="popover" data-content="<h5>Status: OPEN</h5>" style="opacity:0.8;" data-original-title="<h6 class='margin10'>Investigations</h6>" data-placement="bottom" data-trigger="hover" libtype_section="Investigations">
													   <span class="list-title fg-white margin10"><small>2015_36</small></span>
														<div class="brand">
															<span class="label fg-white text-center"><small></small></span>
														</div>
													   </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
								<!--end modal Investigation page--> 
                                <!--start modal Investigation STAT page-->
					<div id="investigationStatModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	INVESTIGATION
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
							 <div id="id_chart_mydata_training"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 500px; height: 300px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="500" height="300" aria-label="A chart." style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="500" height="300" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="306" y="58" width="101" height="31" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="306" y="58" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="68.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Stat1</text></g><rect x="306" y="58" width="12" height="12" stroke="none" stroke-width="0" fill="#1ba1e2"></rect></g><g><rect x="306" y="77" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Stat2</text></g><rect x="306" y="77" width="12" height="12" stroke="none" stroke-width="0" fill="#1bd2e2"></rect></g></g><g><path d="M172.6,182.86973485926734L145.00000000000003,230.67433714816838A92,92,0,0,1,191,59L191,114.19999999999999A36.800000000000004,36.800000000000004,0,0,0,172.6,182.86973485926734" stroke="#ffffff" stroke-width="1" fill="#1bd2e2"></path><text text-anchor="start" x="117.6913951906942" y="136.25701854309423" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">5</text></g><g><path d="M191,114.19999999999999L191,59A92,92,0,1,1,145.00000000000003,230.67433714816838L172.6,182.86973485926734A36.800000000000004,36.800000000000004,0,1,0,191,114.19999999999999" stroke="#ffffff" stroke-width="1" fill="#1ba1e2"></path><text text-anchor="start" x="264.3086048093058" y="175.54298145690578" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">7</text></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>My Training Data</th></tr></thead><tbody><tr><td>Completed</td><td>7</td></tr><tr><td>Assigned</td><td>0</td></tr><tr><td>Purchased</td><td>5</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 310px; left: 510px; white-space: nowrap; font-family: Arial; font-size: 12px; font-weight: bold;">5 (41.7%)</div><div></div></div></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
					<!--end modal Inspections STAT page--> 
                    <!--start modal SAFETY TALKS page-->
					<div id="saftalksModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	SAFETY TALKS
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
							 <?php for ($a=0;$a<=6;$a++){ ?>               
                            <a href="http://localhost/s1localdev/admin/my_safetytalks_page_metro?id=6&amp;type=custom_safetytalks" rel="6" style="opacity:0.8;" class="safety tile half-library bg-darker description  ui-draggable" data-toggle="popover" data-content="<h6>Construction</h6>" data-original-title="<h6>Construction</h6>" data-placement="bottom" data-trigger="hover" libtype_section="custom_safetytalks">
																							<i class="icon on-left"><img src="http://localhost/s1localdev/img/library/icon-en.png" height="40" width="40"></i> 
																						<span class="list-title fg-white margin10"><small>Construction</small></span>
											<div class="brand">
												<span class="label fg-white text-center"><small>20 points</small></span>
												<span class="badge bg-red" id="balance_custom_safetytalks6">3</span>
											</div>
											</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
								<!--end modal SAFETY TALKS page--> 
                                <!--start modal SAFETY TALKS STAT page-->
					<div id="saftalksStatModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	SAFETY TALKS
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
							 <div id="id_chart_mydata_training"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 500px; height: 300px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="500" height="300" aria-label="A chart." style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="500" height="300" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="306" y="58" width="101" height="31" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="306" y="58" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="68.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Stat1</text></g><rect x="306" y="58" width="12" height="12" stroke="none" stroke-width="0" fill="#1ba1e2"></rect></g><g><rect x="306" y="77" width="101" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="323" y="87.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Stat2</text></g><rect x="306" y="77" width="12" height="12" stroke="none" stroke-width="0" fill="#1bd2e2"></rect></g></g><g><path d="M172.6,182.86973485926734L145.00000000000003,230.67433714816838A92,92,0,0,1,191,59L191,114.19999999999999A36.800000000000004,36.800000000000004,0,0,0,172.6,182.86973485926734" stroke="#ffffff" stroke-width="1" fill="#1bd2e2"></path><text text-anchor="start" x="117.6913951906942" y="136.25701854309423" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">5</text></g><g><path d="M191,114.19999999999999L191,59A92,92,0,1,1,145.00000000000003,230.67433714816838L172.6,182.86973485926734A36.800000000000004,36.800000000000004,0,1,0,191,114.19999999999999" stroke="#ffffff" stroke-width="1" fill="#1ba1e2"></path><text text-anchor="start" x="264.3086048093058" y="175.54298145690578" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">7</text></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>My Training Data</th></tr></thead><tbody><tr><td>Completed</td><td>7</td></tr><tr><td>Assigned</td><td>0</td></tr><tr><td>Purchased</td><td>5</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 310px; left: 510px; white-space: nowrap; font-family: Arial; font-size: 12px; font-weight: bold;">5 (41.7%)</div><div></div></div></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
					<!--end modal SAFETY TALKS STAT page--> 
                   
                  </div>
                  <!--************end tools panel***********-->
                  <!--************begin project panel***********-->
                  <div class="tab-pane fade" id="client_projects">
                  	<div class="grid fluid">
                   <!--begin SAFETY BOARD tile -->
                <a href="#" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/profile-home/digital_project.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>PROJECT 01</small></span>
                    </div>
                
                </a>
                <!--end SAFETY BOARD tile-->
                <!--begin RNEW WORKER tile -->
                <a class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/profile-home/digital_project.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>PROJECT 02</small></span>
                    </div>
                
                </a>
                <!--end NEW WORKER tile-->
                <!--begin DATA tile -->
                <a href="#" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/profile-home/digital_project.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>PROJECT 03</small></span>
                    </div>
                
                </a>
                <!--end  DATA tile-->
                <!--begin DATA tile -->
                <a href="#" class="tile bg-black">
                    <div class="tile-content icon">
                        <img src="<?php echo $base;?>img/profile-home/digital_project.png"></i>
                    </div>
                    <div class="tile-status">
                            <span class="name"><small>PROJECT 04</small></span>
                    </div>
                
                </a>
                <!--end  DATA tile-->
                   </div>
                   
                  </div>
                  <!--************end project panel***********-->
                  <!--************begin Description panel***********-->
                  <div class="tab-pane fade" id="client_description">
                  	<div class="grid fluid">
                    
                    <span class="span6">
                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nunc nulla. Praesent pellentesque ac felis a pulvinar. Donec vel risus metus. Quisque non ipsum nec ligula porta lacinia. Sed hendrerit tempor purus, sit amet gravida nibh interdum sit amet. Fusce eleifend elementum risus ut eleifend. Nulla mauris dolor, lobortis et volutpat ac, pellentesque quis ante. Donec vitae urna porttitor, suscipit turpis eu, sodales orci. Quisque dignissim sapien ac pellentesque scelerisque.
                    </span>
                    </div>
                    <div class="grid fluid">
                    <span class="span6 text-right">
                    <a href='#descriptionModal' data-toggle='modal' class="fg-white" title="Edit">
                   	<i class="icon-enter"></i> 
                   </a>
                   </span>
                
                
                   </div>
                   
                  </div>
                  <!--start description Modal-->
					<div id="descriptionModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
        						<h3 id="myModalLabel">
                                	DESCRIPTION
                                    <i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i>
                                </h3>
					    </div>
  					  <div class="modal-body">
        					<div class="row-fluid">
                            <form novalidate="" method="post" name="" id="">
		<div id=""></div>
			
				
			
				<!-- Text input-->
			<label>(MAX OF 1000 CHARACTERS)</label>
			<div class="input-control textarea size5">
				<textarea name="txtarea_purpose_description" id="txtarea_purpose_description" rows="11"  placeholder="(MAX OF 1000 CHARACTERS)">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nunc nulla. Praesent pellentesque ac felis a pulvinar. Donec vel risus metus. Quisque non ipsum nec ligula porta lacinia. Sed hendrerit tempor purus, sit amet gravida nibh interdum sit amet. Fusce eleifend elementum risus ut eleifend. Nulla mauris dolor, lobortis et volutpat ac, pellentesque quis ante. Donec vitae urna porttitor, suscipit turpis eu, sodales orci. Quisque dignissim sapien ac pellentesque scelerisque. 
                </textarea>
			</div>
			<div class="inline text-center size4">
				<button class="image-button primary" id="btn_save_purpose" name="btn_save">Save<i style="padding: 3px;" class="icon-enter bg-cobalt"></i></button>
				<button class="image-button danger btn-cancel " name="btn_cancel">Cancel<i style="padding: 3px 4px 2px 2px;" class="icon-cancel-2 bg-red"></i></button>
			</div>
		</form>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    <script type="text/javascript">
						$('#descriptionModal').width('400px');
					</script>
								<!--end modal Description-->
                  <!--************end Description panel***********-->
					
                </div>
			<!--************END PANELS***************-->

                
                
