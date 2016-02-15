<?php $this->load->view('header_admin');
?>
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
	<div class="homebg metro ">    
                	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">SKILLED JOB TRADE CERTIFICATION SERVICE</em>
        </div>
     </div>
	<!--END PAGE TITLE-->
		<div class="container-fluid ">
        
			<div class="main-content padding-metro-home skilledjob-data-container clearfix"> 
				
					
							<!--START CODE FOR METRO STYLE-->
								<!-------BEGIN FIRST ROW OF TILES------>
									<?php /*<div class="tile-group no-margin no-padding clearfix span3" >                    
										<!--begin tiles menus left side general page -->
                                        <?php $this->load->view('general_tiles_menu_left');?>
										<!--end tile menus left side general page-->  
									</div>*/?>
								<!-------END FIRST ROW OF TILES------>  
                                <!-- BEGIN SECOND COLUMN FIRST ROW -->
										<div class="tile-group no-padding clearfix max780" > 
								
    <!--*****************************code pages s1-library-contents *****************-->
          <!--  item-->
    <?php 
	$cnt_results	= 0;
	$records_limit 	= 24;
	$result 		= count($tradecert);
	$page 			= 1;
	$current_page	= isset($_GET['page']) ? $_GET['page'] : 1;
	$cnt_limit 		= (($current_page-1)*$records_limit)+1;
	if( $result > 0 ) {
	while ($cnt_limit <= $result):
		if( $cnt_results < $records_limit ) {
			$contents_on_hover[$cnt_limit] 	= '<p><b>'.$this->common->subString($tradecert[$cnt_limit]['descr'],100).'</b></p><h6>'.$tradecert[$cnt_limit]['trade_cert'].'</h6>'; ?>
            <a href="<?php echo $base;?>admin/cert_trade_metro?item=<?php echo $cnt_limit;?>" rel="#" class="tile half-library bg-black  description" data-toggle="modal" data-content="<?php echo $contents_on_hover[$cnt_limit];?>" data-original-title="<?php echo "<h5 class='margin10'>".$tradecert[$cnt_limit]['trade']."</h5>"; ?>" data-placement="bottom" data-trigger="hover">
              <div class="half bg-black">
				<i class="icon on-left"><img src="<?php echo $base;?>img/skilled-job/trade-service_55x55.png"></i>
					<span class="fg-white" style="position:absolute;top:0px;"><small><?php echo $this->common->subString($tradecert[$cnt_limit]['trade'], 17);?></small>
                    </span>
				</div>
            </a>
            
        <?php 
		}
		if ($page == 4)
		{
			$page = 0;
			echo "<br />";
		}
		$page++;
		$cnt_limit++;
		$cnt_results++;
	endwhile;
	}
	else {
		echo "<h3>No data available</h3>";
	}
	if( $cnt_results < $records_limit ) {
		$cnt_spans = ($cnt_results==0) ? ($records_limit-1) : ($records_limit-$cnt_results);
		for( $i=0;$i<$cnt_spans;$i++) {
			?><span class="tile half-library bg-transparent description" style="box-shadow: 0px 0px 0px inset;"></span>
			<?php  
			echo ($i%4==0) ? "<br />" : '';
		}
	}
	// Pagination //
		if( $result > $records_limit ) {
			$total_pages = ceil($result/$records_limit);
			echo "<div class='pull-right mart25 marr5 pagination small opacity'>"; 
			$this->common->getS1Pagination('skilledjob_trade?1', $total_pages, $current_page, $records_limit, 10);
			echo "</div>";
		}?>
    <!--  item -->                          
                    
                                 
	<!--************************ end second column first row ***************************--> 
                                 </div>
                                 <!-- END SECOND COLUMN FIRST ROW -->
                                 <!-------BEGIN THIRD COLUMN FIRST ROW OF TILES------>


									<div class="tile-group no-margin no-padding clearfix span4" >                    
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
<script type="text/javascript">
$(document).ready(function () {
$('.description').popover({html: true});

});
</script>
<?php $this->load->view('footer_admin');?>