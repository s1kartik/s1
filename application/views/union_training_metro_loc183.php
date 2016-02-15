<?php 
$this->load->view('header_admin');
$union['id'] 	= isset($union['id']) ? $union['id'] : '';

$is_training_centre		= '';
if( "7" == $this->sess_usertype ) {
	$check_training_centre 	= $this->users->getUserMetaByID($this->sess_userid);
	$is_training_centre 	= isset($check_training_centre['union_training_centre']) && $check_training_centre['union_training_centre'] ? $check_training_centre['union_training_centre'] : '';
	$campus_names			= isset($check_training_centre['campus_name']) && $check_training_centre['campus_name'] ? $check_training_centre['campus_name'] : '';	
}?>
	
<div class="homebg ">
		    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20"><h3> UPCOMING TRAINING</h3></em>
        </div>
    </div>
    <!--END PAGE TITLE-->



<div class="union-container u-metro ">

<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
        
			<span class="ad-tab " ><a data-toggle="modal" class="btn btn-warning" href="#ad-modal">ADVERTISING</a></span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/ad-examples/nissan_1024x724.jpg"/>
			</div>
			<!-- END MODAL -->	
			
			<div class="row-fluid">
				<!-- START HEADER INFORMATION-->
				<div class="span3">					
					<div class="u-img">
						<?php 
						$pimg = (!empty($union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>">
					</div>
				</div>			
				<div class="span9">
					<div class="u-details">
						<?php 
						$city = $province = $country = '';
						if( isset($is_training_centre) && "on" == $is_training_centre ) {
							foreach( $parent_unions AS $key_parent_unions => $val_parent_unions ) {
								$union 		= $this->users->getUserByID( $val_parent_unions );
								$usermeta 	= $this->users->getUserMetaByID( $val_parent_unions );
								?>
								<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
                                <button class="btn btn-warning"  type="button" title="Connect"><img src="<?php echo $base;?>img/myprofile/connections.png" width="30"></button>
                                </h3>
								<h5 class="u-trade">
									<?php 
									$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
									$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
									if( isset($industry) && sizeof($industry) ) {
										$industry = $industry['industryname'];
										echo strtoupper($industry);
									}?>
								</h5>
								<?php 
								if(isset($usermeta['city_id'])) { // Get City //
									$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
									$city = $city['cityname'];
								}
								if(isset($usermeta['province_id'])) { // Get Province //
									$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
									$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
								}
								if(isset($usermeta['country_id'])) { // Get Country //
									$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
									$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
								}
								$location = strtoupper($city." ".$province." ".$country);
								?>
								<h6 class="u-loc"><?php echo $location;?></h6>
							<?php
							}?>
							<br><br><div class="pull-right fr"><h5 class="u-loc"><?php echo "Campus Name: ";echo ($campus_names) ? $campus_names : 'N/A';?></h5></div>
							<?php 
						}
						else { ?>
							<h3 class="u-name"><?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?> <?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?> 
                            </h3>
                            
							<h5 class="u-trade">
								<?php 
								$union['industry_id'] = isset($union['industry_id']) ? $union['industry_id'] : '';
								$industry = $this->users->getElementByID('tbl_industry', $union['industry_id']);
								if( isset($industry) && sizeof($industry) ) {
									$industry = $industry['industryname'];
									echo strtoupper($industry);
								}
								?>
							</h5>
							<?php
							if(isset($usermeta['city_id'])) { // Get City //
								$city = $this->users->getElementByID('tbl_city', $usermeta['city_id']);
								$city = $city['cityname'];
							}
							if(isset($usermeta['province_id'])) { // Get Province //
								$province = $this->users->getElementByID('tbl_province', $usermeta['province_id']);
								$province = (isset($province['provincename'])&&$province['provincename']) ? ", ".$province['provincename'] : '';
							}
							if(isset($usermeta['country_id'])) { // Get Country //
								$country = $this->users->getElementByID('tbl_country', $usermeta['country_id']);
								$country = (isset($country['countryname'])&&$country['countryname']) ? ", ".$country['countryname'] : '';
							}
							$location = strtoupper($city." ".$province." ".$country);
							?>
							<h6 class="u-loc">60 CASTER AVENUE - <?php echo $location;?>, L4L 5Y9</h6>
						<?php 
						}?>
					</div>
				</div>
				<!-- END HEADER INFORMATION-->
			</div>
		</div>
		<!--------END UNION PROFILE HEAD-------->

		<!--------START FILTER-------->
			<!--<div class="row-fluid assign-container">
			<div class="search">
				
						 <form method="post" id="filterfrm">
							<fieldset>
								 <div class="controls controls-row ">
									
								    <select class="span2 selectpicker" data-style="btn-warning">
										 <option  value="">-Location-</option>
										 <option value="">Vaughan Campus</option>
										 <option value="">Cobourg Campus</option>
										 <option value="">Barrie Campus</option>
									</select>
									<select class="span2 selectpicker" data-style="btn-warning">
										 <option value="">-Program Name-</option>
										 <option value="">Brick and Stone Level 1</option>
										 <option value="">CCW Level 1</option>
										 <option value="">Cement Finisher Level 1</option>
										 <option value="test">High Rise Layout</option>
										  <option value="">Rodman</option>
										 
									</select>
									
									<input type="text" class="span5"  placeholder="SEARCH"/>
									<button class="span1 btn btn-warning"  type="submit" >Go!</button>
									
								 </div>
							</fieldset>	 
						 </form>
								 
			</div>
            </div> -->
		<!--------END FILTER-------->
		
		<h5 class="title">CONSTRUCTION SKILLS COURSES</h5>

		<!--------START SKILLED JOBS CONTAINER 1-------->
		<div class="heading clearfix">
	   		
	   		<div class="row-fluid">	
	   			<!--** BEGIN ASPHALT WORKER**-->
		   			<div class="span4"><a name="asphalt"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
							
						
						<a name="asphalt"></a>
								<div class="training-details">
							<h4>Asphalt Worker</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183qsphalt.jpg" />
							<p>The Asphalt worker program provides hands-on training in the placement, spreading, raking, as well as, compaction of asphalt materials. Safety issues surrounding working with asphalt are also covered.</p> 
                            <span id="collapse-asphalt" class="collapse show-content"> <p>These include burns, fumes, chemicals and heat stress. Trainees are introduced to the properties, uses and mix designs of asphalt and the equipment and tools used in paving operations. Placement methods are shown in detail, as well as, repair and patching, clean up and maintenance. Working on an asphalt crew is a demanding job. You have to work hard and long hours; however the rewards can be great as well. Participants should have a good understanding of basic construction math.</p></span>
							
							<a href="#collapse-asphalt" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/asphalt-worker" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END ASPHALT WORKER**-->		
                <!--** BEGIN Bridge Construction and Heavy Form Setting **-->
		   			<div class="span4"><a name="bridge"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Bridge Construction and Heavy Form Setting </h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183formsetter.jpg" />
							<p>The LiUNA Local 183 Training Centre also offers a Heavy Form Setter course where trainees will learn to construct and install footing forms by establishing starting points and learning to cut and install side boards, as well as, aligning and supporting forms.</p> 
                            <span id="collapse-bridge" class="collapse show-content"> <p>Trainees will also learn how to install spreaders and ties on various structures. The heavy civil sector represents some of the following areas of construction; bridge building, subway and tunnel work to name a few. The course will also touch on the erection of columns and piers, construction of ramps, runways, building beams, building of bridge abutments and girders. Trainees will also learn to use tube and clamp scaffolding to perform their work.</p>

<p>This work mostly takes place outdoors and there is some work at heights.</p></span>
							
							<a href="#collapse-bridge" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/heavy-form-setter" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Bridge Construction and Heavy Form Setting **-->	
                <!--** BEGIN Concrete and Drain **-->
		   			<div class="span4"><a name="concrete"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Concrete and Drain</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183drain.jpg" />
							<p>In this four week program offered by the Training Centre, trainees will be taught the industry standard techniques used to install sanitary drainage systems including traps and cleanouts.</p> 
                            <span id="collapse-concrete" class="collapse show-content"> <p>They will also learn types of pipes and fittings needed to complete both sanitary and storm sewer systems. Trainees will practice steps for proper grading, concrete pouring and placement, as well as, cement finishing techniques. Work will also include forming of staircases, porches and sills, as well as, installation of reinforcement steel to strengthen concrete.</p>

<p>Upon successful completion of this training, trainees can apply their skills in the Concrete and Drain sector (residential, high rise and ICI) or anywhere drain pipe layers and concrete finishers are needed. Trainees are taught the importance of health and safety on the job site throughout the course. Included in the course curriculum are a variety of health and safety courses such as, WHMIS, Fall Protection, Traffic Control, Personal Protective Equipment, Standard First Aid and many more.</p></span>
							
							<a href="#collapse-concrete" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/concrete-and-drain" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Concrete and Drain **-->
                			   	  
	   		</div>
            <div class="row-fluid">	
	   			<!--** BEGIN Demolition Worker Training**-->
		   			<div class="span4"><a name="asphalt"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
							
						
						<a name="demolition"></a>
								<div class="training-details">
							<h4>Demolition Worker Training</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183demolition.jpg" />
							<p>This program will provide trainees with an overall understanding of the Demolition industry. The program begins with the history and development of the Demolition Industry.</p> 
                            <span id="collapse-demolition" class="collapse show-content"> <p>This course aims to provide trainees with knowledge on commonly used methods and techniques of controlled demolition for both conventional and special structures with emphasis on safety planning and procedures. The program will provide the basic understanding of the regulations, tools, equipment and techniques used throughout this field through both, theoretic and hands-on experiences. The trainees will be exposed to Torch Cutting (practicing the use of the torch by cutting scrap metal of different types and thickness) at both heights and ground level. There will also be work on Power Elevating Work Platforms (practice exercises using Boom and Scissor lift), Skid Steer (practical exercises such as, moving loads, load bins and use of hydraulic breaker). Also included are courses in Electrical Hazard Awareness, Powder Actuated Tools, Demolition Site Hazard Analysis, Quick Cut Safety Saw and many more.</p></span>
							
							<a href="#collapse-demolition" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/demolition-worker" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Demolition Worker Training**-->		
                <!--** BEGIN Fence Installation**-->
		   			<div class="span4"><a name="fence"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Fence Installation </h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183Fence2.jpg" />
							<p>The Fence Installation program covers a variety of various fencing requirements in the various sectors of construction. From working on residential wood fences to barrier walls, chain link, wire mesh, portable fencing, iron and new materials that introduced by the industry from time to time.</p> 
                            <span id="collapse-fence" class="collapse show-content"> <p>With the increase in health and safety requirements by the Ministry of Labour and employers becoming more aware of the close proximity of work sites in GTA, fencing requirements have increased and new companies are looking for workers to meet industry demands. At our Vaughan campus our Fencing program will cover new and existing methods for fence construction with all types of different materials used in the industry, while including all of the health and safety required and best practices used for this type of construction.</p>

</span>
							
							<a href="#collapse-fence" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/fence-installation" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Fence Installation **-->	
                
                <!--** BEGIN GPS - Surveying **-->
		   			<div class="span4"><a name="gps"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>GPS - Surveying</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183GPS1.jpg" />
							<p>The GPS/Surveying course gives workers who are performing layout duties for contractors an opportunity to learn the latest in technology and bring their skills up to date. This course would apply to the roads, high rise and sewer and water main sector.</p> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/gps-surveying" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END GPS - Surveying**-->
                			   	  
	   		</div>
	   		<div class="row-fluid">	
	   			<!--** BEGIN High Rise Form Setter**-->
		   			<div class="span4"><a name="asphalt"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
							
						
						<a name="formsetter"></a>
								<div class="training-details">
							<h4>High Rise Form Setter</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/high_rise_form_setter.jpg" />
							<p>The High Rise construction sector consists of various trades all working on one building. The LiUNA Local 183 Training Centre's High Rise Forming course allows trainees to work on a dedicated high-rise structure designed specifically for this program and to simulate a true to life work site experience.</p> 
                            <span id="collapse-highriseform" class="collapse show-content"> <p>Form Setters build the walls and floors that make up the main structure of the building.</p>
                            <p>Trainees in this program are exposed to "Fly Forms", as well as, many other tasks specific to this sector. It will also include working with bracing and forming materials and additional construction materials specific to this sector. Work in this sector involves heights and possible exposure to high winds and cold temperatures. Health and Safety procedures need to be followed very closely when working in this sector. The High Rise Form Setter course has quickly become one of the most popular programs that the LiUNA Local 183 Training Centre has to offer.</p>
                            </span>
							
							<a href="#collapse-highriseform" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/high-rise-form-setter" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END High Rise Form Setter**-->		
                <!--** BEGIN High-Rise Rodman **-->
		   			<div class="span4"><a name="rodman"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>High-Rise Rodman </h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183highriserodmanmain.jpg" />
							<p>In the High-Rise Rodman course Trainees will learn to cut, bend, lay out and place reinforcing steel rods, welded wire fabric and composite materials in a wide variety of poured concrete products and structures, such as, buildings, highways, bridges, stadiums and towers.</p> 
                            <span id="collapse-rodman" class="collapse show-content"> <p>Rodman workers pre-assemble reinforcing material by laying it out and connecting subassemblies on the ground prior to final placement. They position, align and secure components according to drawings, using a variety of methods. They also place and stress various post-tensioning systems in structures such as, parking garages, bridges and stadiums where longer unsupported spans are required. After placing post-tensioning systems they stress the tendons to predetermined specifications using hydraulic jacks and pumps.</p>
                            <p>High-Rise Rodman workers generally work outside in all weather, although some work indoors in manufacturing plants or underground work sites. Work sites may be in a variety of locations ranging from remote areas where they could be working on dams, bridges or mining projects to urban environments where they could work on high-rise buildings, parking garages, transit systems, tunnels or stadiums.</p>

</span>
							
							<a href="#collapse-rodman" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a>
							    
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/high-rise-rodman" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END High-Rise Rodman  **-->	
                
                <!--** BEGIN House Framing  **-->
		   			<div class="span4"><a name="house"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>House Framing </h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183houseframingmain.jpg" />
							<p>Wood Framing continues to be one of the most common methods used to build homes in Canada. The LiUNA Local 183 Training Centre offers an 8 week hands-on course which allows trainees to build the framework of a two storey detached home from the ground up.</p>
                            <span id="collapse-house" class="collapse show-content"> <p>Trainees will also learn to build exterior, as well as, interior walls, floors, and learn all proper calculations involved when framing a home. As in all of our Skills courses, health and safety is at the forefront of this program and is a significant part of the curriculum.</p>
                            <p>If you enjoy working in a field that allows you to be creative with your mind, as well as, your hands then our House Framing course may be the program for you.</p>

</span>
							
							<a href="#collapse-house" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/house-framing" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END House Framing **-->
                			   	  
	   		</div>
	   		
            <div class="row-fluid">	
                <!--** BEGIN Landscaping  **-->
		   			<div class="span4"><a name="landscaping"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Landscaping</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183landscapingmain.jpg" />
							<p>In the Landscaping course trainees will learn aspects of landscaping such as, surveying, interlocking brick, as well as, basic blueprint reading.</p>
                            <span id="collapse-Landscaping" class="collapse show-content"> <p>Landscapers construct and maintain gardens, parks, golf courses and other landscape environments. In addition, they advise clients on issues related to horticulture and landscape construction. They can be self-employed or employed by landscape designers, architects and contractors, lawn service and tree care establishments, recreation facilities, golf courses, parks, nurseries, greenhouses and municipal, provincial and federal governments. Landscaping skills are utilized throughout the construction industry. Some landscapers specialize in areas such as, landscape design, construction and maintenance of greenhouses, and sod and nursery production. Landscapers require good communication skills to coordinate and facilitate work with clients, co-workers and other trades. They also require strong analytical and organizational skills.</p>
                            <p>Employment in this trade is quite often seasonal with long hours in the summer months. Much of this work is done outdoors, while indoor work may involve greenhouse production, interior landscaping and sale of plants, landscape materials and supplies. The work may be strenuous and can involve activities such as, lifting, climbing and bending.</p>

</span>
							
							<a href="#collapse-Landscaping" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/landscaping" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Landscaping **-->
                
                <!--** BEGIN Low Rise Forming   **-->
		   			<div class="span4"><a name="lowriseforming"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Low Rise Forming </h4>
							</div>
	   						</div>
	   						<hr/>
                            <!--img src="<?php echo $base;?>img/union/local183/liuna183landscapingmain.jpg" /-->
							<p>The Low Rise Forming course focuses on building the foundation of residential homes. This is one of the most physically demanding sectors in construction. With changing technologies and the use of different forming structures, up to date training for our Members is required.</p>


    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/low-rise-forming" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Low Rise Forming**--> 
                
                 <!--** BEGIN Railroad   **-->
		   			<div class="span4"><a name="railroad"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Railroad</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183railroadmain.jpg" />
							<p>In this course, trainees will learn how to prep a worksite for construction of a new railway track. They will learn layout of tiles and set rails which will allow them to perform maintenance and repairs on an existing track. </p>
                            <span id="collapse-Railroad" class="collapse show-content"> <p>Trainees will also gain knowledge of pneumatic, hydraulic systems, testing and inspection methods and tools needed for track maintenance and inspection. The course will also cover the theory behind track construction, including measurements and layout requirements.d facilitate work with clients, co-workers and other trades. They also require strong analytical and organizational skills.</p>
                            <p>To work in this sector, trainees should be prepared to perform heavy manual labour, frequently lifting anywhere between 50 and 100 pounds, with the assistance of applicable equipment and/or other employees for extremely heavy loads. You must have the ability to work from heights with the assistance of proper safety equipment. The majority of this work is outdoors, so trainees should expect to work outdoors in all weather conditions.</p>

</span>
							
							<a href="#collapse-Railroad" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/railroad" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Railroad  **-->           
            </div>
            
            <div class="row-fluid">
            <!--** BEGIN Residential Handyman**-->
		   			<div class="span4"><a name="handyman"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Residential Handyman</h4>
							</div>
	   						</div>
	   						<hr/>
                            <!--img src="<?php echo $base;?>img/union/local183/liuna183landscapingmain.jpg" /-->
							<p>The Handyman course is tailored to suit the needs of those wanting to learn the fundamentals of various trades. Trainees will be exposed to such things as plastering, kitchen fitting, bathroom installation, minor tile replacement, and some basic carpentry. </p>
                            <span id="collapse-handyman" class="collapse show-content">
                            <p>The course will also cover taping, caulking and sanding areas requiring preparation for various treatments such as priming or sealing. General painting and decorating will also be included as part of the course program. This program is important to our Membership as the role of a handyman in the residential sector is in very high demand.</p>

</span>
<a href="#collapse-handyman" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/residential-handyman" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Residential Handyman**--> 
            
             <!--** BEGIN Residential Trim   **-->
		   			<div class="span4"><a name="trim"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Residential Trim</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183RT1.jpg" />
							<p>To coincide with the economic growth in the high-rise construction sector, a Residential Trim course is being added to the 2015 course catalogue.</p>
                            <span id="collapse-trim" class="collapse show-content"> <p>This course has been developed based on a need expressed to us by our Employer partners. Members working in this sector need to keep abreast of new technologies and techniques relevant to their jobs. This course will cover such topics as installing casing, baseboards, related hardware and understanding the difference and usage of various high-rise trim materials.</p>
                            <p>It is the role of the Training Centre to provide training to our Membership and ensure they remain job ready.</p>

</span>
							
							<a href="#collapse-trim" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/residential-trim" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Residential Trim  **--> 
                
                <!--** BEGIN Road Building Trim   **-->
		   			<div class="span4"><a name="roadbuilding"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Road Building</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183roadbuildingmain.jpg" />
							<p>The LiUNA Local 183 Training Centre Road Building program has been one of the Centre's signature programs running successfully over the last 15 years. </p>
                            <span id="collapse-roadbuilding" class="collapse show-content"> <p>During this 8 week program, trainees cover many areas of this sector, including but not limited to, general labor, curb machine operation, maintenance, as well as, concrete forming and finishing.  Sidewalk, curb construction and finishing techniques are all covered during this 8 week program. Instructors provide real life scenarios during the hands-on training portion of the program. Health and Safety courses such as, WHMIS, Traffic Control, House Keeping and Personal Protective Equipment are also covered in this program.</p>
                            <p>The Roads sector is primarily a seasonal one and extremely busy during the peak months of late spring and throughout the summer. Work in this sector could also lead to a position as a general laborer, rake man or curb machine operator. Workers work outdoors and jobs may include sidewalk construction, patch work, parking lots, bridges, roads and highways, just to name a few.</p>

</span>
							
							<a href="#collapse-roadbuilding" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/road-building" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Road Building Trim  **-->
            </div>
            
            <div class="row-fluid">
            <!--** BEGIN Sewer and Water Main**-->
		   			<div class="span4"><a name="sewer"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Sewer and Water Main</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183sewerwatermain.jpg" />
							<p>In this eight week course, trainees will be introduced and become familiar with blueprint reading and surveying.</p>
                            <span id="collapse-sewer" class="collapse show-content">
                            <p>They will be required to review various sets of plans, understand what information is contained in the different types of drawings, as well as, be able to find the information required to construct various construction projects specific to the Sewer and Water Main sector. Trainees will also learn proper laser set up, check benchmarks, levels, elevations and grades continuously throughout the program.</p>

</span>
<a href="#collapse-sewer" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/sewer-and-water-main" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Sewer and Water Main**--> 
            
             <!--** BEGIN Tile Setting   **-->
		   			<div class="span4"><a name="tile"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Tile Setting</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183tilesetting1.jpg" />
							<p>The course will focus on installing tiles in the residential sector. As the industry changes and evolves and new types of adhesives and tiles are used, the demand to train the existing workforce on new materials increases.</p>
                            <span id="collapse-tile" class="collapse show-content"> <p> It is necessary for the Training Centre to ensure that the demand for trained people in this sector is met.</p>

</span>
							
							<a href="#collapse-tile" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/tile-setting" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Tile Setting **--> 
                
                <!--** BEGIN Utilities  **-->
		   			<div class="span4"><a name="utilities"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Utilities</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183utilities.jpg" />
							<p>The LiUNA Local 183 Training Centre also offers a Utilities course which exposes trainees to work in many aspects of the utility sector. In our hands-on course trainees will work on rebuilding existing, as well as, building new cable chambers.</p>
                            <span id="collapse-utilities" class="collapse show-content"> <p>This type of work involves exposure to high voltage so trainees should be aware of this prior to starting this course. They will also work on street light projects, pole bases torpedo shots (trenchless technology), hydro and communication fields. Training will also include work in day lighting which is exposing cables prior to digging with equipment. Training in this field can lead to work with many of the utility companies in the GTA. Most of the work in the utility sector is outdoors and is done year round.</p>

</span>
							
							<a href="#collapse-utilities" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
                             
							    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/utilities" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Utilities **-->
            </div>
			 <div class="row-fluid">
            <!--** BEGIN Welding**-->
		   			<div class="span4"><a name="welding"></a>
			   			<div href="#" class=" heading-item heading-item-padded clearfix">
	   						<div class="clearfix">
	   							<span class="btn-warning pull-left">
									<i class="sprite-high-rise sprite-white"></i>
								</span>
								<div class="training-details">
							<h4>Welding</h4>
							</div>
	   						</div>
	   						<hr/>
                            <img src="<?php echo $base;?>img/union/local183/liuna183weldingmain.jpg" />
							<p>Welders permanently join pieces of metal by applying heat, using filler metal or the fusion process. They join parts being manufactured, build structures and repair damaged or worn parts. They use various welding and cutting processes to join structural steel and cut metal in vessels, piping and other components.</p>
                            <span id="collapse-welding" class="collapse show-content">
                            <p>They also fabricate parts, tools, machines and equipment used in the construction/manufacturing industries. Welders may specialize in certain types of welding such as custom fabrication, ship building and repair, aerospace, pressure vessel, pipeline, structural welding and machinery and equipment repair.</p>
                            <p>Welders require attributes such as, good mechanical ability, manual dexterity, good vision, excellent hand-eye coordination, the ability to concentrate on detail work and work as part of a team. They also require the ability to work quickly and accurately, to visualize a finished product, to reason logically and to understand metallurgy. Occupational hazards in this trade include sparks, gases, hazardous fumes, burns, heavy lifting, exposure to ultra-violet light and infra-red rays, working at heights, in confined spaces and in trenches. With experience, welders may advance to positions such as, welding inspector, lead hand or welding supervisor.</p>

</span>
<a href="#collapse-welding" class="pull-right btn btn-info btn-mini show-content-btn collapsed" data-toggle="collapse"></a> 
    <a class="btn btn-warning" href="https://www.183training.com/index.php/programs/construction-skills/welding" target="new">Sign Up</a>
							
			   			</div>
	   				
			   	    </div>
		   			
	   			<!--** END Welding**--> 
            
             
                
               
            </div>  	 
	   		
		</div>
		<!--------END SKILLED JOBS CONTAINER 2-------->
	
	
		
		
		


</div>
</div>

<?php $this->load->view('footer_admin'); ?>

