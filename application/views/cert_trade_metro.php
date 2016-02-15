
<!--Start  Trade Certification Service Skilled Library Content -->
	<?php
//////////////////////////////////////////////////////////////////
//Content coming from OYAP Trade Certification Service.docx
//BEGIN TRADE 1
// Trade: Appliance Service Technician
$tradecert[1]['family'] = "Trade Certification Service";
$tradecert[1]['trade'] = "Appliance Service Technician";
$tradecert[1]['trade_cert'] = "ACA, Unrestricted Certified Trade ";
//*********Description - descr
$tradecert[1]['descr'] = "An Appliance Service Technician repairs, services, maintains and installs various types of appliances and household products. They prepare for jobs by reading and interpreting work orders, diagrams, specs and manuals. They make operate hand and power tools, measuring devices, and testing equipment to fix problems and ensure the proper actions taken.
</br>
They must resolve business enquiries, prepare cost estimates, clean and inspect work sites, and show the operation of items. They must also know various systems and equipment, (refrigeration sealed, recovery, soldering, brazing etc).
";
//*********Required Education, Training, Experience and Skills - required
$tradecert[1]['required'][1] = "Grade 12 education or ministry equivalent. Coop or OYAP is an asset.";
$tradecert[1]['required'][2] = "Recommended high school courses: English, math, electronics, physics, chemistry and design technology.";
$tradecert[1]['required'][3] = "Suggested: Possess good communication, analytical and problem-solving skills. Should be mechanically inclined and enjoy working with hands and tools. Be in good physical shape and have good stamina. Must have a pleasant manner and be presentable to work directly with customers in their homes.";

//*********Obtaining Trade Certification - obtaining
$tradecert[1]['obtaining'][1] = "Complete a three year apprenticeship program";
$tradecert[1]['obtaining'][2] = "Complete the requirements for Apprenticeship Contract to obtain a Certificate of Apprenticeship.";
$tradecert[1]['obtaining'][3] = "Obtain a Certificate of Qualification with journeyperson status";
$tradecert[1]['obtaining'][4] = "Suggested: obtain Interprovincial (Red Seal) Trade Certification to be able to work anywhere in Canada";

//********Other Related Job Titles/Related Trades - related
$tradecert[1]['related'][1] = "Electronics Repairer";
$tradecert[1]['related'][2] = "Electrician, Heating";
$tradecert[1]['related'][3] = "Refrigeration and Air Conditioning Technician";
$tradecert[1]['related'][4] = "Small Engine Mechanic";
$tradecert[1]['related'][5] = "Industrial Maintenance Mechanic.";

//********Potential Employers - potential
$tradecert[1]['potential'][1] = "Large or small repair shops";
$tradecert[1]['potential'][2] = "Appliance manufacturers";
$tradecert[1]['potential'][3] = "Gas and utility companies";
$tradecert[1]['potential'][4] = "Self-employed. ";

//********Salary - sal
$tradecert[1]['sal'] = "Range from $11 to $17 per hour";
//END TRADE 1
///////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
//Content coming from OYAP Trade Certification Service.docx
//BEGIN TRADE 2
// Trade: Arborist
$tradecert[2]['family'] = "Trade Certification Service";
$tradecert[2]['trade'] = "Arborist";
$tradecert[2]['trade_cert'] = "ACA, Unrestricted Certified Trade";
//*********Description - descr
$tradecert[2]['descr'] = "Arborists, Tree Care Specialists or Tree Service Technicians. Maintain healthy trees and treat or removed diseased trees. They analyze, evaluate and diagnose a wide variety of plants for disease or disorder and prepare recommendations for treatment as well as provide cost estimates.  They select and use treatment products (pesticides, biological controls, cabling, pruning). They also maintain safety equipment, manual and power tools (chainsaws, pruning and spraying equipment).";
//*********Required Education, Training, Experience and Skills - required
$tradecert[2]['required'][1] = "Grade 12 education or ministry-approved equivalent";
$tradecert[2]['required'][2] = "Recommended courses include: English, math, biology; technical programs.  Coop or other pre-apprenticeship programs are strongly suggested.";
$tradecert[2]['required'][3] = "Suggested: Posses strong communication, analytical and problem-solving skills. Be in good condition, and have excellent stamina to be able to climb and descend trees using safety equipment. You must be safety conscious and work well individually or as a member of a team. You should also enjoy learning about plant material and applying that knowledge.";

//*********Obtaining Trade Certification - obtaining
$tradecert[2]['obtaining'][1] = "Complete a three year apprenticeship program";
$tradecert[2]['obtaining'][2] = "Complete the terms of the Apprenticeship Contract to receive a Certificate of Apprenticeship";
$tradecert[2]['obtaining'][3] = "Pass the exam to receive your Certificate of Qualification with journeyperson status";
$tradecert[2]['obtaining'][4] = "There is NO Interprovincial (Red Seal) Trade Certification for this trade";

//********Other Related Job Titles/Related Trades - related
$tradecert[2]['related'][1] = "Horticultural Technician";
$tradecert[2]['related'][2] = "Landscape Architect";
$tradecert[2]['related'][3] = "Forestry Technician/Technologist";
$tradecert[2]['related'][4] = "Nursery/Greenhouse Worker.";

//********Potential Employers - potential
$tradecert[2]['potential'][1] = "Private residential landscape management companies";
$tradecert[2]['potential'][2] = "Commercial landscape management companies";
$tradecert[2]['potential'][3] = "Tree nurseries";
$tradecert[2]['potential'][4] = "Tree care contractors";
$tradecert[2]['potential'][5] = "Municipal governments";
$tradecert[2]['potential'][6] = "National or provincial parks departments";
$tradecert[2]['potential'][7] = "Utility companies";

//********Salary - sal
$tradecert[2]['sal'] = "Range from $15 to $20 per hour";
//END TRADE 2
///////////////////////////////////////////////////////////////////////
?>
<!--End  Trade Certification Service Skilled Library Content -->

<?php $this->load->view('header_admin'); ?>
<!--***********************************************************-->

	<div class="homebg metro trade-metro">
    
                	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">SKILLED JOB TRADE CERTIFICATION SERVICE</em>
        </div>
     </div>
	<!--END PAGE TITLE-->
		<div class="container">
			<div class="main-content padding-metro-home constr-trade-container clearfix"> 
            <!--START CODE FOR METRO STYLE-->
            <!-------BEGIN FIRST ROW OF TILES------>
            <!--div class="tile-group no-margin no-padding clearfix span3" >                    
                <!--begin tiles menus left side general page -->
                <?php // $this->load->view('general_tiles_menu_left');?>
                <!--end tile menus left side general page- ->  
            </div-->
            <!-------END FIRST ROW OF TILES------>  
                <!-- BEGIN SECOND COLUMN FIRST ROW -->
			<div class="tile-group no-margin no-padding clearfix" > 
                <div class="tile quadro marcio_profile_home triple-vertical bg-white panel">
		            <div class="panel-header bg-black fg-white" >
                    <i class="icon on-left"><img src="<?php echo $base;?>img/skilled-job/trade-service_28x28.png"></i>
                        <?php echo $tradecert[$item]['trade'];?>
                        <span class="pull-right">
						<a href='<?php echo $base;?>admin/skilledjob_trade' class="icon-arrow-left fg-white" title="Back"></a>
                        </span>
                    </div>
				<div class=" pre-scrollable"> 
    				<div class="info-container">
    				<span href="#mypageModal" data-toggle="modal" >

                        <!--<p><strong>< ?php echo $tradecert[$item]['family'];?></strong></p> -->
                        <p class="s1content_subtitle">Certification:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['trade_cert'];?></p>
                        <p class="s1content_subtitle">Description:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['descr'];?></p>
						<p class="s1content_subtitle">Required Education, Training, Experience and Skills:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['required']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['required'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
						<p class="s1content_subtitle">Obtaining Certificate of Apprenticeship:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['obtaining']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['obtaining'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
					    <p class="s1content_subtitle">Related Trades:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['related']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['related'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
						<p class="s1content_subtitle">Potential Employers:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['potential']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['potential'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
                        <p class="s1content_subtitle">Salary:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['sal'];?></p>
                        </span>

					</div>
				</div>
			</div>
          </div>
         <!-- END SECOND COLUMN FIRST ROW -->
         <!--start modal page-->
		<div id="mypageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header bg-black">
				<h3 id="myModalLabel"><i class="icon on-left"><img src="<?php echo $base;?>img/skilled-job/trade-service_28x28.png"></i>
                        <?php echo $tradecert[$item]['trade'];?>
<i class="pull-right icon-cancel-2" data-dismiss="modal"></i></h3>
			</div>
			<div class="modal-body modal_library_body">
                        <p class="s1content_subtitle">Certification:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['trade_cert'];?></p>
                        <p class="s1content_subtitle">Description:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['descr'];?></p>
						<p class="s1content_subtitle">Required Education, Training, Experience and Skills:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['required']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['required'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
						<p class="s1content_subtitle">Obtaining Certificate of Apprenticeship:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['obtaining']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['obtaining'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
					    <p class="s1content_subtitle">Related Trades:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['related']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['related'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
						<p class="s1content_subtitle">Potential Employers:</p>
						<ul>
						<?php 
                            $result = count($tradecert[$item]['potential']);
                            $i = 1;
                            while ($i <= $result):
                                ?>   
                                <li class="s1content_body_section"><?php echo $tradecert[$item]['potential'][$i];?></li>
                        <?php    
                            $i++;
                        endwhile;
                        ?>
                       	</ul>
                        <p class="s1content_subtitle">Salary:</p>
                        <p class="s1content_body_section"><?php echo $tradecert[$item]['sal'];?></p>
				
			</div>
			<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
		</div>
<script type="text/javascript">
	$('#mypageModal').css({ 'width':'98%', 'left':'1%', 'margin-left': '0px', 'top':'1%' });
	$('.modal_library_body').css({ 'max-height':'80vh','overflow-y':'auto','overflow-x':'hidden'});
</script>
<!--end modal page-->
         
         <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>
            <div class="tile-group no-margin no-padding clearfix span2" >                    
                <!--begin text information paragraphs -->
                    <!--begin small tile-->
             <a href="http://www.liunalocal183.ca/Home.aspx" class="tile double profile-content-box tab-content" target="new">
                                <img src="<?php echo $base;?>img/ad/skilled/certification/ad1.png">
                                </a>
                                <a href="http://www.forces.ca/en/jobexplorer/browsejobs-70" class="tile double profile-content-box tab-content" target="new">
                                <img src="<?php echo $base;?>img/ad/skilled/certification/ad2.png">
                                </a>
                                <a href="http://cobtrades.com/hammerheads/" class="tile double profile-content-box tab-content" target="new">
                                <img src="<?php echo $base;?>img/ad/skilled/certification/ad3.png">
                                </a>    
        <!--end small tile--> 
                <!--end text information paragraphs-->  
            </div>
        <!-------END  THIRD COLUMN FIRST ROW OF TILES------> 
			</div>
		</div>
	</div>
<!--END OF CODE FOR METRO STYLE-->

<?php $this->load->view('footer_admin'); ?>
