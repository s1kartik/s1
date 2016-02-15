<?php 
class Regulation extends CI_Model {

	function __construct()	{
		parent::__construct();
		$this->load->library('common');
	}
	
	function updateRegulation()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_regulations 	= array( 'st_parent_regulation_title'=>$regulation_title, 'date_start'=>$startdate, 'date_end'=>$enddate );
		$arr_where_regulations	= array('id'=>$id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_regulations', 'UPDATE', $arr_upd_regulations, $arr_where_regulations );
    }
	
	function updateRegulationContent()
	{
		foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_regcontents 	= array( 'in_parent_regulation_id'=>$cmb_parent_regulation, 'st_regulation_number'=>$txt_regulation_number, 
										'st_title'=>$txt_title,	'st_part'=>$txt_part, 'st_subpart'=>$txt_subpart );
		$arr_where_regcontents	= array('id'=>$id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_regulation_contents', 'UPDATE', $arr_upd_regcontents, $arr_where_regcontents );
	}
	
	
	function validateRegulationTitle($name)
	{
        if (!empty($name)){
            $name = $this->common->escapeStr($name);
            $sql = "SELECT id FROM tbl_regulations WHERE st_parent_regulation_title like '$name' LIMIT 1;";
            $query = $this->db->query($sql);
			if(!$query) { 
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows() > 0) ? 'false' : 'true';
			}
        }
		else {
            return 'false'; //invalid post var
        }
    }

	function checkRegulation( $tblName='', $where='' )
	{
		$sql 	= "SELECT id FROM ".$tblName." WHERE ".$where." LIMIT 1";
		$query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			return ($query->num_rows() > 0) ? 'false' : 'true';
		}
	}

	function getRegSectionFromTitle( $select='', $where='1', $optionLabel='' )
	{
		($optionLabel) ? $field = "st_".str_replace(' ', '', strtolower($optionLabel))."" : '';

		$sql 	= "SELECT ".$select." FROM tbl_regulation_sections AS trs
				  LEFT JOIN tbl_regulation_contents AS trc ON trs.st_regulation_number=trc.st_regulation_number
				  WHERE ".$where."'";
		($optionLabel) ? $sql .= " GROUP BY st_".str_replace(" ", "", strtolower($optionLabel)) : '';

		if(isset($field) && $field) {
			$sql .= " ORDER BY 
						CAST(".$field." AS UNSIGNED)=0, 
						CAST(".$field." AS UNSIGNED),      
						LEFT(".$field.",1), 
						CAST(MID(".$field.",2) AS UNSIGNED),
						ABS(".$field.")";
		}		
		// die;
		
		$query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	
	function getRegSection( $select='', $where='1', $optionLabel='' )
	{
		($optionLabel) ? $field = "st_".str_replace(' ', '', strtolower($optionLabel))."" : '';
		
		$sql 	= "SELECT ".$select." FROM tbl_regulation_sections WHERE ".$where."'";
		
		($optionLabel) ? $sql .= " GROUP BY st_".str_replace(" ", "", strtolower($optionLabel)) : '';
		
		if(isset($field) && $field) {
			$sql .= " ORDER BY 
						CAST(".$field." AS UNSIGNED)=0, 
						CAST(".$field." AS UNSIGNED),      
						LEFT(".$field.",1), 
						CAST(MID(".$field.",2) AS UNSIGNED),
						ABS(".$field.")";
		}
		// echo $sql;die;
		
		$query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
															
	function getRegulationTitleFromContentId($regNo='', $regContentId='')
	{
		if( $regNo ) {
			$sql = "SELECT tr.st_parent_regulation_title AS parent_regulation_title, trc.st_title AS regulation_title, 
						trc.st_part AS regulation_part, trc.st_subpart AS regulation_subpart 
						FROM tbl_regulation_contents AS trc
					RIGHT JOIN tbl_regulations AS tr ON tr.id = trc.in_parent_regulation_id
					WHERE trc.st_regulation_number='".$regNo."'";
			($regContentId) ? $sql .= " AND trc.id='".$regContentId."'" : '';
			$sql .= " GROUP BY tr.id";
			// echo "<br>".$sql;

			$query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				$rows 	= $query->row_array();
				return isset($rows) ? $rows : array();
			}
		}
		else {
			return false;
		}
	}

	function getRegContentsFromInspectionItem($itemId='', $inspectionId='')
	{
		if( (int)$itemId ) {
			$sql = "SELECT trs.st_section, trs.st_item, trs.st_content FROM tbl_regulation_sections AS trs 
					LEFT JOIN tbl_inspection_item_regulation AS tinspreg ON trs.st_regulation_number = tinspreg.st_regulation_number
						AND trs.st_section = tinspreg.st_section AND trs.st_subsection = tinspreg.st_subsection AND trs.st_item = tinspreg.st_item AND trs.st_subitem = tinspreg.st_subitem
					WHERE tinspreg.in_item_id='".$itemId."'";
			$query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				$rows 	= $query->row_array();
				return isset($rows) ? $rows : array();
			}
		}
		else {
			return false;
		}
	}
	
	
	///////////////  START - Regulation //////////////////////
		function addRegulation()
		{
			foreach($_POST as $key=>$value) {
				$$key = $this->common->escapeStr($value);
			}
			$arr_ins_regulations = array( 'st_parent_regulation_title' => $regulation_title, 'date_start' => $startdate, 'date_end' => $enddate );
			return $this->parentdb->manageDatabaseEntry( 'tbl_regulations', 'INSERT', $arr_ins_regulations );
		}

		function manageRegulationGroup($postArr=array()) 
		{
			$str_output 	= '';
			$err_regsection	= 0;
			
			foreach($postArr as $key=>$value) {
				$$key = $this->common->escapeStr($value);
			}
			
			if( $cmb_parent_regulation ) {
				if( "update" == $action ) {
					$where_str 	= "st_regulation_number='".$txt_regulation_number."' AND st_title='".$txt_title."' AND st_part='".$txt_part."' AND st_subpart='".$txt_subpart."' AND id!='".$id."'";
					$check_reg_group = $this->checkRegulation( "tbl_regulation_contents", $where_str );

					if( 'false' == $check_reg_group ) {
						$err_regsection = 1;
						$str_output .= "\n<br>Combination of Regulation Number/Title/Part/Sub Part, is already exists.";
					}
					else {
						$arr_upd_regcontents 	= array( 'in_parent_regulation_id'=>$cmb_parent_regulation, 'st_regulation_number'=>$txt_regulation_number, 
										'st_title'=>$txt_title,	'st_part'=>$txt_part, 'st_subpart'=>$txt_subpart );
						$arr_where_regcontents	= array('id'=>$id);
						$this->parentdb->manageDatabaseEntry( 'tbl_regulation_contents', 'UPDATE', $arr_upd_regcontents, $arr_where_regcontents );
					}
				}
				else {
					$where_str 	= "st_regulation_number='".$txt_regulation_number."' AND st_title='".$txt_title."' AND st_part='".$txt_part."' AND st_subpart='".$txt_subpart."'";
					$check_reg_group = $this->checkRegulation( "tbl_regulation_contents", $where_str );
					if( 'false' == $check_reg_group ) {
						$err_regsection = 1;
						$str_output .= "\n<br>Combination of Regulation Number/Title/Part/Sub Part, is already exists.";
					}
					else {
						$arr_ins_regcontents = array( 'in_parent_regulation_id' => $cmb_parent_regulation, 'st_regulation_number' => $txt_regulation_number, 
													'st_title' => $txt_title, 'st_part' => $txt_part, 'st_subpart' => $txt_subpart );
						$this->parentdb->manageDatabaseEntry( 'tbl_regulation_contents', 'INSERT', $arr_ins_regcontents );
					}
				}
			}
			else {
				$err_regsection = 1;
			}
			
			if( $err_regsection == 0 ) {
				return false;
			}
			return $str_output;
		}

		function manageRegulationSection( $postArr=array() ) 
		{
			$cnt_regsectgion 	= $err_regsection = 0;
			$str_output 		= '';
			$action 			= isset($postArr['action']) ? $postArr['action'] : '';

			if( "update" == $action ) {
				$cnt_regsectgion++;
				$section 	= $this->common->escapeStr($postArr['txt_section']);
				$contents 	= $this->common->escapeStr($postArr['txtarea_content']);				
				if( !$contents ) { 
					$err_regsection = 1;
					$str_output .= "\n<br>Please enter value for Content in Combination[".$cnt_regsectgion."]";
				}
				else if( !$section ) {
					$err_regsection = 1;
					$str_output .= "\n<br>Please enter value for Section in Combination[".$cnt_regsectgion."]";
				}
				else {
					$subsection = $this->common->escapeStr($postArr['txt_subsection']);
					$item 		= $this->common->escapeStr($postArr['txt_item']);
					$subitem 	= $this->common->escapeStr($postArr['txt_subitem']);
					
					$reg_no 	= $this->common->escapeStr($postArr['regulation_number']);
					$reggroupid	= $this->common->escapeStr($postArr['reggroupid']);
					$parent_regulation_id	= $this->common->escapeStr($postArr['parent_regulation_id']);
					$id			= $this->common->escapeStr($postArr['id']);

					$where_str 	= "st_regulation_number='".$reg_no."' AND st_section='".$section."' AND st_subsection='".$subsection."' AND st_item='".$item."' AND st_subitem='".$subitem."' AND id!='".$id."'";
					$check_reg_section = $this->checkRegulation("tbl_regulation_sections", $where_str );

					if( 'false' == $check_reg_section ) {
						$err_regsection = 1;
						$str_output .= "\n<br>Combination of Regulation Number/Section/Sub Section/Item/Sub Item, is already exists.";
					}
					else {
						$arr_upd_regsections 	= array( 'in_parent_regulation_id'=>$parent_regulation_id,'st_regulation_number'=>$reg_no, 'in_regulation_content_id'=>$reggroupid, 'st_section'=>$section, 'st_subsection'=>$subsection, 'st_item'=>$item, 'st_subitem'=>$subitem, 'st_content'=>$contents );
						$arr_where_regsections 	= array('id'=>$id);
						$this->parentdb->manageDatabaseEntry( 'tbl_regulation_sections', 'UPDATE', $arr_upd_regsections, $arr_where_regsections );
					}
				}
			}
			else if( "insert" == $action ) {
				foreach( $postArr['txt_section'] AS $key_regsection => $val_regsection ) {
					$section 	= $this->common->escapeStr($postArr['txt_section'][$key_regsection]);
					$contents 	= $this->common->escapeStr($postArr['txtarea_content'][$key_regsection]);
					
					$cnt_regsectgion++;
					if( !$contents ) { 
						$err_regsection = 1;
						$str_output .= "\n<br>Please enter value for Content in Combination[".$cnt_regsectgion."]";
					}
					else if( !$section ) {
						$err_regsection = 1;
						$str_output .= "\n<br>Please enter value for Section in Combination[".$cnt_regsectgion."]";
					}
					else {
						$subsection = $this->common->escapeStr($postArr['txt_subsection'][$key_regsection]);
						$item 		= $this->common->escapeStr($postArr['txt_item'][$key_regsection]);
						$subitem 	= $this->common->escapeStr($postArr['txt_subitem'][$key_regsection]);
						$contents 	= $this->common->escapeStr($postArr['txtarea_content'][$key_regsection]);
						$reg_no 	= $this->common->escapeStr($postArr['regulation_number']);
						$reggroupid	= $this->common->escapeStr($postArr['reggroupid']);
						$parent_regulation_id	= $this->common->escapeStr($postArr['parent_regulation_id']);

						$where_str 	= "st_regulation_number='".$reg_no."' AND st_section='".$section."' AND st_subsection='".$subsection."' AND st_item='".$item."' AND st_subitem='".$subitem."'";
						$check_reg_section = $this->checkRegulation( "tbl_regulation_sections", $where_str );

						if( 'false' == $check_reg_section ) {
							$err_regsection = 1;
							$str_output .= "\n<br>Combination[".$cnt_regsectgion."] of Regulation Number/Section/Sub Section/Item/Sub Item, is already exists.";
						}
						else {
							$arr_ins_regsections = array( 'in_parent_regulation_id'=>$parent_regulation_id, 'st_regulation_number'=>$reg_no, 'in_regulation_content_id'=>$reggroupid, 'st_section'=>$section, 'st_subsection'=>$subsection, 'st_item'=>$item, 'st_subitem'=>$subitem, 'st_content'=>$contents );
							$this->parentdb->manageDatabaseEntry( 'tbl_regulation_sections', 'INSERT', $arr_ins_regsections );
						}
					}
				}
			}			
			
			if( $err_regsection == 0 ) {
				return false;
			}

			return $str_output;
		}
	///////////////  END - Regulation //////////////////////
}
?>