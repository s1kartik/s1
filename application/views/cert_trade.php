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
<div class="info-container">

 
    <h3><?php echo $tradecert[$item]['trade'];?></h3>  
    <p><strong><?php echo $tradecert[$item]['family'];?></strong></p>
    <p><?php echo $tradecert[$item]['trade_cert'];?></p>
    
    <p><strong>Description:</strong></p>
    <p><?php echo $tradecert[$item]['descr'];?></p>
    
   <p><strong>Required Education, Training, Experience and Skills:</strong></p>
   
   <ul>
	<?php 
		$result = count($tradecert[$item]['required']);
		$i = 1;
		while ($i <= $result):
			?>   
			<li><?php echo $tradecert[$item]['required'][$i];?></li>
 	<?php    
		$i++;
	endwhile;
	
	?>

   </ul>

<p><strong>Obtaining Certificate of Apprenticeship:</strong></p>

   <ul>
	<?php 
		$result = count($tradecert[$item]['obtaining']);
		$i = 1;
		while ($i <= $result):
			?>   
			<li><?php echo $tradecert[$item]['obtaining'][$i];?></li>
 	<?php    
		$i++;
	endwhile;
	?>

   </ul>
    <p><strong>Related Trades</strong></p>
    
   <ul>
	<?php 
		$result = count($tradecert[$item]['related']);
		$i = 1;
		while ($i <= $result):
			?>   
			<li><?php echo $tradecert[$item]['related'][$i];?></li>
 	<?php    
		$i++;
	endwhile;
	?>

   </ul>

<p><strong>Potential Employers:</strong></p>

   <ul>
	<?php 
		$result = count($tradecert[$item]['potential']);
		$i = 1;
		while ($i <= $result):
			?>   
			<li><?php echo $tradecert[$item]['potential'][$i];?></li>
 	<?php    
		$i++;
	endwhile;
	?>

   </ul>
    
    <p><strong>Salary:</strong><?php echo $tradecert[$item]['sal'];?></p>



</div>
<?php $this->load->view('footer_admin'); ?>
