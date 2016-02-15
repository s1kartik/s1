<?php
class Parentdb extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library('common');
		$this->load->library('upload');
	}
	
	function getLastRowId( $tblName='' )
	{
		if( $tblName ) {
			$sel_lastrowid_qry 	= "SHOW TABLE STATUS LIKE '".$tblName."'";
			$sel_lastrowid 		= $this->db->query($sel_lastrowid_qry);
			if( !$sel_lastrowid ) {
				return $this->common->dberror();
			}
			else {
				$rows 				= $sel_lastrowid->result_array();
				return isset($rows[0]['Auto_increment']) ? $rows[0]['Auto_increment'] : 1;
			}
		}
	}

	// DB error function remains to integrate //
	function deleteSection($id='', $section='', $sectionId='')
	{
		// Procedure Images and Videos //
			if( "procedure_image" == $section ) {
				if( $current_primg = glob(FCPATH.$this->path_upload_procedures."procedure_image".$id."_*") ) {
					$arr_current_primg 		= explode("/", $current_primg[0]);
					$sizeof_current_primg 	= sizeof($arr_current_primg);
					isset($arr_current_primg[$sizeof_current_primg-1]) ? unlink( FCPATH.$this->path_upload_procedures.$arr_current_primg[$sizeof_current_primg-1] ) : '';
				}
				$this->db->delete('tbl_procedures_image_video', array('id'=>$id));
			}
			if( "procedure_video" == $section ) {
				if( $current_prvid = glob(FCPATH.$this->path_upload_procedures."procedure_video".$id."_*") ) {
					$arr_current_prvid 		= explode("/", $current_prvid[0]);
					$sizeof_current_prvid 	= sizeof($arr_current_prvid);
					isset($arr_current_prvid[$sizeof_current_prvid-1]) ? unlink( FCPATH.$this->path_upload_procedures.$arr_current_prvid[$sizeof_current_prvid-1] ) : '';
				}
				$this->db->delete('tbl_procedures_image_video', array('id'=>$id));
			}
			
		// Library //
			if( "image" == $section ) {
				if( $current_primg = glob(FCPATH.$this->path_upload_paragraph_images."libpg_".$id.".*") ) {
					$arr_current_primg 		= explode("/", $current_primg[0]);
					$sizeof_current_primg 	= sizeof($arr_current_primg);
					isset($arr_current_primg[$sizeof_current_primg-1]) ? unlink( FCPATH.$this->path_upload_paragraph_images.$arr_current_primg[$sizeof_current_primg-1] ) : '';
				}
				$this->db->delete('tbl_library_images', array('paragraph_image_id'=>$id));
			}
			if( "video" == $section ) {
				$this->db->delete('tbl_library_videos', array('paragraph_video_id'=>$id));
			}
			if( "quiz" == $section ) {
				$this->db->delete('tbl_page_questions', array('question_id'=>$id));
				$this->db->delete('tbl_library_question_answers', array('question_id'=>$id));
			}

		// Safetytalks // 
			if( "safetytalks image" == $section ) {
				if( $safety_image = glob(FCPATH.$this->path_upload_safetytalks_image."safetytalks_".$sectionId."_image_".$id.".*") ) {
					$arr_safety_image = explode("/", $safety_image[0]);
					$sizeof_safety_image = sizeof($arr_safety_image);
					isset($arr_safety_image[$sizeof_safety_image-1]) ? unlink( FCPATH.$this->path_upload_safetytalks_image.$arr_safety_image[$sizeof_safety_image-1] ) : '';
				}
				$this->db->delete('tbl_safetytalks_image_video', array('id'=>$id, 'in_safetytalks_id'=>$sectionId, 'in_safetytalks_image_video'=>'1'));
			}
			if( "safetytalks video" == $section ) {
				$this->db->delete('tbl_safetytalks_image_video', array('id'=>$id, 'in_safetytalks_id'=>$sectionId, 'in_safetytalks_image_video'=>'2'));
			}
			if( "safetytalks item" == $section ) {
				$this->db->delete('tbl_safetytalks_items', array('id'=>$id, 'in_safetytalks_id'=>$sectionId));
			}

		// Inspection //
			if( "inspection item" == $section ) {
				$arr_delete_inspitemreg = (int)$id ? array('in_item_id'=>$id,'in_inspection_id'=>$sectionId) : array('in_inspection_id'=>$sectionId);
				$arr_delete_inspitems 	= (int)$id ? array('id'=>$id,'in_inspection_id'=>$sectionId) : array('in_inspection_id'=>$sectionId);
				
				// common::pr($arr_delete_inspitemreg);common::pr($arr_delete_inspitems);
				
				$this->db->delete('tbl_inspection_item_regulation', $arr_delete_inspitemreg);
				$this->db->delete('tbl_inspection_items', $arr_delete_inspitems);
			}

		// Library Regulation
			if( "lib_regulation" == $section ) {
				$this->db->delete('tbl_library_regulation', array('in_library_id'=>$sectionId));
			}
			
		// Alert  Criteria//
			if( "alert_criteria" == $section ) {
				$this->db->delete('tbl_alerts_criteria_users', array('in_alert_id'=>$id));
			}

		// My Union //
			if( "myunion" == $section ) {
				$this->db->delete('tbl_user_unions', array('in_user_union_id'=>$id));
			}
			
		// Library Campus //
			if( "library_campus" == $section ) {
				$this->db->delete('tbl_library_campus', array('in_library_id'=>$sectionId));
			}
	}
	
	// Delete Rows //
		function deleteRows($tblName='', $whereDelete='')
		{
			if( $tblName ) {
				$delqry = "DELETE FROM ".$tblName." WHERE 1=1";
				($whereDelete) ? $delqry .= " AND ".$whereDelete : '';
				$del = $this->db->query($delqry);
				return true;
			}
			else {
				return false;
			}
		}
	
	// Global Select Query Records //
		function getDatabaseRows($tblName='', $select='*', $whereArr=array(), $orderBy='', $rowsPerPage='', $paged='', $isTotalRows='' )
		{
			$sql 			= "SELECT ".$select." FROM ".$tblName."";
			$where_vals 	= " WHERE 1=1";

			foreach( $whereArr AS $key_where => $val_where ) {
				if( "like" == $key_where ) {
					$val_wherelike = isset($whereArr['like']) ? $whereArr['like'] : '';
					foreach( $val_wherelike AS $key_like => $val_like ) {
						($val_like!=='') ? $where_vals .= " AND (".$key_like." LIKE '%".$this->common->escapeStr($val_like)."%')" : '';
					}
				}
				else if( "greaterthan" == $key_where ) {
					$val_wheregreater = isset($whereArr['greaterthan']) ? $whereArr['greaterthan'] : '';
					foreach( $val_wheregreater AS $key_wheregreaterthan => $val_wheregreaterthan ) {
						($val_wheregreaterthan!=='') ? $where_vals .= " AND (".$key_wheregreaterthan." >= ".$val_wheregreaterthan.")" : '';
					}
				}
				else {
					($val_where!=='') ? $where_vals .= " AND ".$key_where."='".$this->common->escapeStr($val_where)."'" : '';
				}
			}
			(sizeof($whereArr)) ? $sql .= $where_vals : '';
			
			$orderBy ? $sql .= " ORDER BY TRIM(".$orderBy.")" : '';

			if( !$isTotalRows ) {
				(int)$rowsPerPage ? $sql .= " LIMIT ".$paged*$rowsPerPage.", $rowsPerPage" : '';
			}

			// echo $sql;
			$query 	= $this->db->query($sql);
			if( $isTotalRows ) {
				if(!$query) { 
					return $this->common->dberror(); 
				}
				else {
					$total_rows = ceil( $query->num_rows()/$rowsPerPage );
					return $total_rows;
				}
			}
			// Common::pr($query->result_array());
			return (!$query) ? $this->common->dberror() : $query->result_array();
		}
	
	function manageDatabaseEntry( $tblName='', $action='', $arrDbData=array(), $arrWhere=array(), $limitStr='' )
	{
		if( $action ) {
			$sql = $action." ".$tblName." SET ";

			if( sizeof($arrDbData) ) {
				$cnt_inv = 0;
				foreach( $arrDbData AS $key => $val ) {
					if( stristr($val, "CASE") === false ) {
						$sql .= $key.'='."'".$val."'";
					}
					else {
						$sql .= $key.'='."'".$val."'";
					}
					$cnt_inv++;
					($cnt_inv < sizeof($arrDbData)) ? $sql .= ', ' : '';
				}
			}
			
			if( sizeof($arrWhere) ) {
				$cnt_whereinv = 0;
				foreach( $arrWhere AS $key_where => $val_where ) {
					$cnt_whereinv++;
					('1'==$cnt_whereinv) ? $sql .= " WHERE " : '';
					
					if( "lessthan" == $key_where ) {
						foreach( $val_where AS $key_wherelessthan => $val_wherelessthan ) {
							$sql .= $key_wherelessthan.' < '."'".$val_wherelessthan."'";
						}
					}
					else if( "like" == $key_where ) {
						foreach( $val_where AS $key_wherelike => $val_wherelike ) {
							$sql .= $key_wherelike.' LIKE '."'%".$val_wherelike."%'";
						}
					}
					else {
						$sql .= $key_where.'='."'".$val_where."'";
					}
					($cnt_whereinv < sizeof($arrWhere)) ? $sql .= ' AND ' : '';
				}
			}

			if( isset($sql) && $sql ) {
				($limitStr) ? $sql .= " LIMIT ".$limitStr : '';
				// echo $sql;
				$query = $this->db->query($sql);
				// common::pr( $this->common->dberror() );
				return (!$query) ? $this->common->dberror() : $this->db->insert_id();
				
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	
	function addPriceSettings()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_price = array( 'price_settingsname' => $price_settingsname, 'in_price' => $txt_price, 'in_points' => $txt_points, 'in_credits' => $txt_credits );
		return $this->manageDatabaseEntry( 'tbl_price_settings', 'INSERT', $arr_ins_price );
    }

	function updatePriceSettings()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$ret_price_settings = $this->users->getMetaDataList('price_settings', 'price_settingsname="'.$price_settingsname.'"', '', 'id');

		$sql_mode = sizeof($ret_price_settings) ? "UPDATE" : "INSERT";
		$arr_price_settings = array( 'price_settingsname' => $price_settingsname, 'in_price' => $txt_price, 
									'in_points' => $txt_points, 'in_credits' => $txt_credits );
		$arr_where_settings = sizeof($ret_price_settings) ? array('id'=>$id, 'price_settingsname'=>$price_settingsname) : '';
		return $this->manageDatabaseEntry( 'tbl_price_settings', $sql_mode, $arr_price_settings, $arr_where_settings );
    }

	function validatePriceSection($name) 
	{
        if (!empty($name)) {
            $name 	= $this->common->escapeStr($name);
            $sql 	= "SELECT id FROM tbl_price_settings WHERE price_settingsname='".$name."' LIMIT 1;";
            $query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows()>0) ? 'false' : 'true';
			}
        }
		else {
            return 'false'; //invalid post var
        }        
    }
}
?>