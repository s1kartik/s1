<?php 
class Libraries extends CI_Model {
  
	function __construct()	{
		parent::__construct();
		$this->load->library('common');
	}
	
    function addLibrary()
	{
		$arr_related_library = array();
        foreach( $_POST as $key_post => $value_post ) {
			if( "cmb_related_items" == $key_post ) {
				foreach($value_post as $key => $value) {
					$arr_related_library[$key] = array( implode(",", $value) );
				}
			}
            $$key_post = !is_array($value_post) ? $this->common->escapeStr($value_post) : '';
		}
		$library_related_items = json_encode($arr_related_library);

        $date_start = date("Y-m-d", strtotime($date_start));
        $date_end 	= empty($date_end)?'0000-00-00':date("Y-m-d", strtotime($date_end));

		$arr_ins_library = array('country_id' => $country_id, 'province_id' => $province_id, 'industry_id' => $industry_id, 'section_id' => $section_id, 
								'trade_id' => $trade_id, 'language'=>$language_id, 'title'=>$title, 'description' => nl2br($shortdesc), 
								'keywords'=>$keywords, 'library_type_id'=>$type, 'library_related_items'=>$library_related_items, 'price'=>$price, 
								'credits'=>$credits, 'creditsbuy'=>$creditsbuy, 'is_gov_required'=>$is_gov_required, 'is_printable'=>$is_printable, 
								'is_sendable'=>$is_sendable, 'date_start'=>$date_start, 'date_end'=>$date_end);
		return $this->parentdb->manageDatabaseEntry( 'tbl_library', 'INSERT', $arr_ins_library );
    }

	// Get Union Library types //
		function getUnionLibtypes() 
		{
			$union_libtypes = $this->users->getMetaDataList('library_types', 'library_type_status=1 AND parent_library_type!="'.$this->s1_parent_libtype.'"', '', 'id, library_type');
			return $union_libtypes;
		}

	function addLibraryType()
	{
		$librarytypename= isset($_POST['librarytypename']) ? $_POST['librarytypename'] : '';
		$parent_libtype = ("s1"==$_POST['rdb_parent_libtype']) ? $_POST['cmb_parent_s1_libtype'] : $_POST['cmb_parent_union_libtype'];

		if( is_array($parent_libtype) ) {
				foreach( $parent_libtype AS $union_id ) {
					// Get Union Training Centres //
						$rows_training_centre = $this->users->getUserConnc($union_id);
						$utc = isset($rows_training_centre[0]['user_id']) ? trim($rows_training_centre[0]['user_id']) : '';
					($utc) ? array_push($parent_libtype, $utc) : '';
				}
				$parent_libtype = array_unique($parent_libtype);
				$parent_libtype =  is_array($parent_libtype) ? implode(",", $parent_libtype) : '';

			$arr_ins_librarytypes = array('library_type' => $librarytypename, 'parent_library_type' => $parent_libtype);
			return $this->parentdb->manageDatabaseEntry( 'tbl_library_types', 'INSERT', $arr_ins_librarytypes );
		}
	}

	function validateLibraryType($name)
	{
        if (!empty($name)) {
            $name 	= $this->common->escapeStr($name);
            $sql 	= "SELECT id FROM tbl_library_types WHERE library_type='".$name."' LIMIT 1;";
            $query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows() > 0) ? 'false' : 'true';
			}
        }
		else {
            return ''; //Invalid post var
        }
    }
	
    function getLibraryByID($id, $select='*', $where='')
	{
        $sql = "SELECT ".$select." FROM tbl_library WHERE library_id = '".$id."'";
		($where) ? $sql .= $where : '';
		$sql .= " LIMIT 1";
        $query = $this->db->query($sql);
		return !($query) ? $this->common->dberror() : $query->row_array();
    }
    
    function getNewPageNumberByLibraryID($lid)
	{
        $sql = "SELECT page_id FROM tbl_library_pages WHERE library_id=$lid";
        $query = $this->db->query($sql);
		return !($query) ? $this->common->dberror() : ($query->num_rows()+1);
    }
	
    function addPagetoLibrary($lid, $files='')
	{
		// common::pr($files);
		// common::pr($_POST); die;

		$cntQues = $page_id = 0;
		foreach($_POST['description'] AS $key_desc => $val_desc ) {
			$paragraph_title 		= $this->common->escapeStr( $_POST['paragraph_title'][$key_desc][0] );
			$paragraph_subtitle 	= $this->common->escapeStr( $_POST['paragraph_subtitle'][$key_desc][0] );
			$paragraph_description 	= $this->common->escapeStr( $val_desc[0] );

			if( $page_id == 0 ) {
				$arr_ins_librarypages = array('library_id' => $lid, 'pn' => $_POST['pn']);
				$page_id = $this->parentdb->manageDatabaseEntry( 'tbl_library_pages', 'INSERT', $arr_ins_librarypages );
			}

			$arr_ins_library_paragraph = array('paragraph_title' => $paragraph_title, 'paragraph_subtitle' => $paragraph_subtitle, 'paragraph_description'=>$paragraph_description, 
										'page_id'=>$page_id, 'library_id'=>$lid);
			$paragraph_id = $this->parentdb->manageDatabaseEntry( 'tbl_library_paragraph', 'INSERT', $arr_ins_library_paragraph );

			// Add paragraph Images //
				if( isset($files['userfile']) ) {
					foreach( $files['userfile']['name'][$key_desc]['new'] AS $key_cont => $val_cont )
					{
						if( !empty($val_cont) ) {
							// Get last inserted paragraph image id //
								$next_image_id 	= $this->parentdb->getLastRowId('tbl_library_images');
								$ext_primg	 	= $this->common->getImagePathInfo( $this->common->escapeStr($val_cont),'extension' );
								$realImageName 	= "libpg_".$next_image_id.".".$ext_primg;
								$img_description	= isset($_POST['description_img'][$key_desc]['new'][$key_cont]) ? $_POST['description_img'][$key_desc]['new'][$key_cont] : '';

							// Insert paragraph images //
								$arr_ins_library_images = array('paragraph_id' => $paragraph_id, 'page_id' => $page_id, 'library_id'=>$lid, 
																'image'=>$realImageName, 'image_description'=>$img_description, 'date_image_created'=>date('Y-m-d h:i:s'));
								// common::pr($arr_ins_library_images);
								$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'INSERT', $arr_ins_library_images );
						}
					}
				}

			// Add paragraph Videos //
				if( isset($_POST['paragraph_video']) ) {
					foreach( $_POST['paragraph_video'][$key_desc] AS $key_video => $val_video )
					{
						if( !empty($val_video) ) {
							$video 				= $this->common->escapeStr( $val_video );
							$video_description	= isset($_POST['description_vid'][$key_desc][$key_video]) ? $_POST['description_vid'][$key_desc][$key_video] : '';
							// Insert paragraph videos //
								$arr_ins_library_videos = array('paragraph_id' => $paragraph_id, 'page_id' => $page_id, 'library_id'=>$lid, 
																'video'=>$video, "video_description"=>$video_description, 'date_video_created'=>date('Y-m-d h:i:s'));
								// common::pr($arr_ins_library_videos);
								$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'INSERT', $arr_ins_library_videos );
						}
					}
				}

			foreach($_POST['question'][$key_desc] AS $key_ques => $val_ques)
			{
				if( !empty($val_ques) ) {
					$question = $this->common->escapeStr( $val_ques );

					$arr_ins_page_questions = array('library_id'=>$lid, 'page_id'=>$page_id, 'paragraph_id'=>$paragraph_id, 'question'=>$question);
					$question_id = $this->parentdb->manageDatabaseEntry( 'tbl_page_questions', 'INSERT', $arr_ins_page_questions );
					$cntQues++;
				}

				$quesKey = "ques".($key_ques+1);
				foreach($_POST['choice'][$key_desc][$quesKey] AS $key_choice => $val_choice) {
					$cntChoice = 0;	
					if(!empty($val_choice)) {
						$answer = $_POST['answer'][$key_desc][$quesKey][$key_choice][$cntChoice];

						$arr_ins_libquesans = array('question_id'=>$question_id, 'choice'=>$val_choice, 'answer'=>$answer);
						$this->parentdb->manageDatabaseEntry( 'tbl_library_question_answers', 'INSERT', $arr_ins_libquesans );
						$cntChoice++;
					}
				}
			}
        }
        return $page_id;
    }
    
    function insertPageAfterPageNumber($lid, $pn, $files='')
	{
        $sql 	= "UPDATE tbl_library_pages SET pn=pn+1 WHERE library_id=$lid AND pn>=$pn";
        $query 	= $this->db->query($sql);
		(!$query) ? $this->common->dberror() : '';
        $this->addPagetoLibrary($lid, $files);
    }  

    function deletePageByPageID($lid, $pid)
	{
		$this->db->delete('tbl_library_pages', array('page_id'=>$pid));
		$this->db->delete('tbl_library_paragraph', array('page_id'=>$pid));
		$this->db->delete('tbl_library_images', array('page_id'=>$pid));
		$this->db->delete('tbl_library_videos', array('page_id'=>$pid));
        $this->reorderPageNumbersByLibraryID($lid);
        return true;
    }

    function reorderPageNumbersByLibraryID($lid)
	{
        $sql 	= "SELECT page_id FROM tbl_library_pages WHERE library_id=$lid ORDER BY pn ASC";
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$pages 	= $query->result_array();
			$pn 	= 1;
			foreach($pages as $page){
				$arr_upd_libpages 	= array( 'pn' => $pn );
				$arr_where_libpages	= array('page_id' => $page['page_id']);
				$this->parentdb->manageDatabaseEntry( 'tbl_library_pages', 'UPDATE', $arr_upd_libpages, $arr_where_libpages );
				$pn++;
			}
		}
    }
    
    function getLibraryList()
	{
        $where = " Where tbl_library.id=tbl_library_types.id";
		$where = '';
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER"){
            foreach($_POST as $key=>$value) {
                if(!empty($value) && $key!="action" && $key!="lang"){
                    if(strpos($key, '_id')){
                        $row = $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);
                        $value = $row[substr($key, 0, -3).'name'];
                    }
                    $where .= " AND ($key LIKE '%".$this->common->escapeStr($value)."%' OR $key LIKE 'all')";
                }
			}
        }
        $sql 	= "SELECT * FROM tbl_library, tbl_library_types".$where." ORDER BY TRIM(title)";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    } 
    
    function getLibraryTypes( $libraryTypeId='' ){
		$sql = "SELECT id, library_type FROM tbl_library_types WHERE library_type_status = 1";
		(isset($libraryTypeId) && $libraryTypeId) ? $sql .= " AND id='".$libraryTypeId."'" : '';
		$sql .= " ORDER BY id";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
	function getRelatedLibraryIdsOfLibrary( $libId='', $libTypeId='', $libRelatedItems="" ) 
	{
		if( $libRelatedItems ) {
			$arr_libitems_decoded = json_decode($libRelatedItems);
			$arr_libitems_decoded = (array)$arr_libitems_decoded;
			$arr_libitems_decoded = array_keys($arr_libitems_decoded);
			return $arr_libitems_decoded;
		}
		else {
			if( (int)$libId && (int)$libTypeId) {
				$sql 	= "SELECT library_related_items FROM tbl_library AS trellib WHERE library_id = '".$libId."'";
				$query 	= $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					$rows 	= $query->row_array();
					if( isset($rows['library_related_items']) && $rows['library_related_items'] ) {
						$arr_libitems_decoded = json_decode($rows['library_related_items']);
						
						$is_valid_libtype = '';
						foreach($arr_libitems_decoded as $key => $value) {
							($key==$libTypeId) ? $is_valid_libtype = true : '';
							$arr[$key] = $value[0];
						}
						return $is_valid_libtype ? explode(",",$arr[$libTypeId]) : array();
					}
					else {
						return array();
					}
				}
			}
			else {
				return array();
			}
		}
	}
	
    function getLibraryListByLanguage($lang, $paged, $limit, $restricted, $libTypeId='', $libid='' )
	{
        $lang 	= strtoupper($lang);
        $status = isset($_POST['status']) ? $_POST['status'] : 1;
		$where 	= " WHERE tl.library_type_id=tlt.id AND status='".$status."'";
		$lang ? $where .= " AND language='".$lang."'" : '';
        $restricted ? $where .= " AND date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>=CURDATE())" : '';
		(int)$libTypeId ? $where .= " AND tl.library_type_id = '".$libTypeId."'" : '';

		if( !is_array($libid) && (int)$libid ) {
			$where .= " AND tl.library_id = '".$libid."'";
		}
		else if( is_array($libid) ) { // To fetch the related library contents //
			$where .= " AND tl.library_id IN ('".implode("','",$libid)."')";
		}
		
		if( isset($_GET['search_libtext']) && $_GET['search_libtext'] ) {
			$where .= " AND tl.title LIKE '%".$_GET['search_libtext']."%'";
		}

		if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER") {
            foreach($_POST as $key=>$value) {
                if(!empty($value) && $key!="action" && $key!="language" && $key!="status") {
                    if(strpos($key, '_id')){
                        $row = $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);						
                        $value = $row[substr($key, 0, -3).'name'];
                    }
                    // $where .= " AND ($key LIKE '%".$this->common->escapeStr($value)."%' OR $key LIKE '%all%')";
					$where .= " AND ($key LIKE '%".$this->common->escapeStr($value)."%')"; // comments removed and reverted on 03Sep2015 as per the post launch sheet(S1System-Review-Sep-02-15) //
                }
			}
        }

        $sql = "SELECT tl.*, tlt.* FROM tbl_library AS tl LEFT JOIN tbl_library_types AS tlt ON tl.library_type_id = tlt.id ".$where." ORDER BY TRIM(title)";
		(int)$limit ? $sql .= " LIMIT ".$paged*$limit.", $limit" : '';
		// echo $sql;

		$this->db->query("SET NAMES UTF8");
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function getTotalNumberOfLibrariesByLanguage( $lang, $rows, $restricted, $libTypeId='', $libid='' )
	{
        $lang = strtoupper($lang);
        $status = isset($_POST['status'])?$_POST['status']:1;        
        $where = " Where tl.library_type_id=tlt.id AND language='".$lang."' AND status='".$status."'";
        $restricted ? $where .= " AND date_start<=CURDATE() AND (date_end='0000-00-00' OR date_end>CURDATE())" : '';
		(int)$libTypeId ? $where .= " AND tl.library_type_id = '$libTypeId'" : '';

		if( !is_array($libid) && (int)$libid ) {
			$where .= " AND tl.library_id = '".$libid."'";
		}
		else if( is_array($libid) ) { // To fetch the related library contents //
			$where .= " AND tl.library_id IN ('".implode("','",$libid)."')";
		}
		
		if( isset($_GET['search_libtext']) && $_GET['search_libtext'] ) {
			$where .= " AND tl.title LIKE '%".$_GET['search_libtext']."%'";
		}
            
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER"){
            foreach($_POST as $key=>$value)
                if(!empty($value) && $key!="action" && $key!="language" && $key!="status"){
                    if(strpos($key, '_id')){
                        $row = $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);
                        $value = $row[substr($key, 0, -3).'name'];
                    }
					$where .= " AND ($key LIKE '%".$this->common->escapeStr($value)."%' OR $key LIKE '%all%')";
					// $where .= " AND ($key LIKE '%".$this->common->escapeStr($value)."%')";
                }
        }
        $sql = "SELECT tl.*, tlt.* FROM tbl_library AS tl 
				LEFT JOIN tbl_library_types AS tlt ON tl.library_type_id = tlt.id
				".$where;
		$this->db->query("SET NAMES UTF8");
        $query = $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$total_rows = ceil( $query->num_rows()/$rows );
			return $total_rows;
		}
    }

	function checkLibraryBought($libid='', $libType='') 
	{
		$sql = "SELECT id FROM tbl_my_library WHERE lib_id='".$libid."'";
		($libType) ? $sql .= " AND st_libtype_bought='".$libType."'" : ""; 
		$sql .= " AND user_id = '".$this->sess_userid."'";
		$sql .= " LIMIT 1";

		$query = $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			return ($query->num_rows()>0) ? 1 : 0;
		}
	}
	
	function hasRelatedContentsOnLibType( $libTypeId='' ) 
	{
		if( (int)$libTypeId ) {
			$sql 	= "SELECT library_id FROM tbl_library WHERE library_type_id='".$libTypeId."' AND status=1 LIMIT 1";
			$query = $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows()>0) ? 1 : 0;
			}
		}
	}
	
    function getLibraryStatusByID($lid)
	{
        $sql 	= "SELECT id FROM tbl_assignments WHERE library_id=$lid LIMIT 1";
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			if($query->num_rows()>0) {
				return 1;
			}
			else {
				$sql 	= "SELECT id FROM tbl_my_library WHERE lib_id=$lid LIMIT 1";
				$query 	= $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					return ($query->num_rows()>0) ? 1 : 0;
				}
			}
		}
    }    
    
    function updatePageNumbersByLibraryID($lid)
	{
        $sql 	= "SELECT page_id FROM tbl_library_pages WHERE library_id=$lid ORDER BY page_id";
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$pages = $query->result_array();
			$pn = 1;
			foreach($pages as $page){
				$arr_upd_libpages 	= array( 'pn' => $pn );
				$arr_where_libpages	= array('page_id' => $page['page_id']);
				$this->parentdb->manageDatabaseEntry( 'tbl_library_pages', 'UPDATE', $arr_upd_libpages, $arr_where_libpages );
				$pn ++;
			}
		}
    }
    
    function updateLibraryType()
	{
		$librarytypename= isset($_POST['librarytypename']) ? $_POST['librarytypename'] : '';
		$parent_libtype = ("s1"==$_POST['rdb_parent_libtype']) ? $_POST['cmb_parent_s1_libtype'] : $_POST['cmb_parent_union_libtype'];
	
		if( is_array($parent_libtype) ) {
			foreach( $parent_libtype AS $union_id ) {
				// Get Union Training Centres //
					$rows_training_centre = $this->users->getUserConnc($union_id);
					$utc = isset($rows_training_centre[0]['user_id']) ? trim($rows_training_centre[0]['user_id']) : '';
				
				($utc) ? array_push($parent_libtype, $utc) : '';
			}
			$parent_libtype = array_unique($parent_libtype);
			$parent_libtype =  is_array($parent_libtype) ? implode(",", $parent_libtype) : '';
		}

		$id				= isset($_POST['id']) ? $_POST['id'] : '';
		$status			= isset($_POST['status']) ? $_POST['status'] : '';
		$arr_upd_libtypes 	= array( 'library_type'=>$librarytypename, 'parent_library_type'=>$parent_libtype, 'library_type_status'=>$status );
		$arr_where_libtypes	= array( 'id'=>$id );
		return $this->parentdb->manageDatabaseEntry( 'tbl_library_types', 'UPDATE', $arr_upd_libtypes, $arr_where_libtypes );
    }
	
	function updateLibraryByID($lid)
	{
		$arr_related_library = array();
        foreach($_POST as $key_post=>$value_post) {
			if( "cmb_related_items" == $key_post ) {
				foreach($value_post as $key => $value) {
					$arr_related_library[$key] = array( implode(",", $value) );
				}
			}
			if( !is_array($value_post) ) {
				$$key_post = $this->common->escapeStr($value_post);
			}
		}
		
		$library_related_items = json_encode($arr_related_library);

        $date_start = date("Y-m-d", strtotime($date_start));
        $date_end = empty($date_end)?'0000-00-00':date("Y-m-d", strtotime($date_end));
		$status = isset($status) ? $status : 0;

		$arr_upd_library = array( 'country_id'=>$country_id, 'province_id'=>$province_id, 'industry_id'=>$industry_id, 'section_id'=>$section_id, 'trade_id'=>$trade_id, 
								'language'=>$language, 'title'=>$title, 'description'=>nl2br($shortdesc), 'keywords'=>$keywords, 'library_type_id'=>$type, 
								'library_related_items'=>$library_related_items, 'price'=>$price, 'credits'=>$credits, 'creditsbuy'=>$creditsbuy, 
								'is_gov_required'=>$is_gov_required, 'is_printable'=>$is_printable, 'is_sendable'=>$is_sendable, 'date_start'=>$date_start, 
								'date_end'=>$date_end, 'status'=>$status );
		$arr_where_library	= array( 'library_id'=>$lid );
		return $this->parentdb->manageDatabaseEntry( 'tbl_library', 'UPDATE', $arr_upd_library, $arr_where_library );
    }
    
    function getPageByPageNumber($lid, $pn='')
	{
        $sql = "SELECT tbp.pn, tbp.page_id, tbp.library_id, tbpr.paragraph_id, tbpr.paragraph_title, tbpr.paragraph_subtitle, tbpr.paragraph_description
				FROM tbl_library_pages AS tbp
				LEFT JOIN tbl_library_paragraph AS tbpr ON tbp.page_id = tbpr.page_id";
		if( $pn ) {
			$sql .= " WHERE tbp.library_id=$lid AND tbp.pn = '$pn'";
		}
		else {
			$sql .= " WHERE tbp.library_id=$lid";
		}
		$sql .= " ORDER BY pn";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

	function getParagraphsOfLibrary($lid)
	{
        $sql 	= "SELECT GROUP_CONCAT(tbpr.paragraph_description SEPARATOR '<br>\n') AS description FROM tbl_library_paragraph AS tbpr WHERE tbpr.library_id=$lid";
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$rows = $query->row_array();
			return $rows['description'];
		}
    }

	//function below created on Dec-13-2013 for new library display
    function getPagesbyLibraryId($lid)
	{
        $sql 	= "SELECT tbp.*, tbpr.* FROM tbl_library_pages AS tbp
					LEFT JOIN tbl_library_paragraph AS tbpr ON tbp.page_id = tbpr.page_id
					WHERE tbp.library_id='$lid'
					ORDER BY pn";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	     
    function getPageByPageID($pid='', $prid='')
	{
        $sql 	= "SELECT tbp.*, tbpr.* FROM tbl_library_pages AS tbp
					LEFT JOIN tbl_library_paragraph AS tbpr ON tbp.page_id = tbpr.page_id
					WHERE tbp.page_id='$pid'";
		(int)$prid ? $sql 	.= " AND tbpr.paragraph_id='$prid'" : '';
		
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function getPageQuestionByPageID($pid)
	{
        $sql = "SELECT question_id, question FROM tbl_page_questions WHERE page_id='$pid' ORDER BY question_id";
        $query = $this->db->query($sql);
  		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
	function getPageQuestionByParagraphPageID( $pageId='', $paragraphId='' )
	{
		if( (int)$paragraphId && (int)$pageId ) {
			$sql 	= "SELECT tbq.*, tbpr.* FROM tbl_library_paragraph AS tbpr
						RIGHT JOIN tbl_page_questions AS tbq ON tbpr.page_id = tbq.page_id AND tbpr.paragraph_id = tbq.paragraph_id
						WHERE tbpr.page_id = '".$pageId."' AND tbpr.paragraph_id = '".$paragraphId."'
						ORDER BY tbq.question_id";
			$query 	= $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->result_array();
		}
    }
	
	function getImagesByParagraphPageID( $pageId='', $paragraphId='', $libraryId='' )
	{
		$sql 	= "SELECT paragraph_image_id, image, image_description
					FROM tbl_library_images WHERE 1=1";		
		(int)$pageId ? $sql .= " AND page_id = '".$pageId."'" : '';
		(int)$paragraphId ? $sql .= " AND paragraph_id = '".$paragraphId."'" : '';
		(int)$libraryId ? $sql .= " AND library_id = '".$libraryId."'" : '';
		$sql .= " ORDER BY paragraph_id, page_id";

		$query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
	function getVideosByParagraphPageID( $pageId='', $paragraphId='', $libraryId='' )
	{
		$sql 	= "SELECT paragraph_video_id, video, video_description
					FROM tbl_library_videos WHERE 1=1";
		(int)$pageId ? $sql .= " AND page_id = '".$pageId."'" : '';
		(int)$paragraphId ? $sql .= " AND paragraph_id = '".$paragraphId."'" : '';
		(int)$libraryId ? $sql .= " AND library_id = '".$libraryId."'" : '';
		$sql .= " ORDER BY paragraph_id, page_id";
		
		$query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function getTotalPageNumber($lid='')
	{
        $sql = "SELECT tbp.pn FROM tbl_library_pages AS tbp
				LEFT JOIN tbl_library_paragraph AS tbpr ON tbp.page_id = tbpr.page_id
				WHERE tbp.library_id='".$lid."' 
				GROUP BY tbp.page_id";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }

    function updatePageByID( $lid='', $pid='', $pr_id='', $files='' ) 
	{
		// common::pr($files);// die;
		// common::pr($_POST);die;

		// Update paragraph title, subtitle and description //
			if( isset($_POST['description']) && $pr_id ) {
			foreach( $_POST['description'] AS $key_desc => $val_desc ) {
				$paragraph_title 		= $this->common->escapeStr( $_POST['paragraph_title'][$key_desc] );
				$paragraph_subtitle 	= $this->common->escapeStr( $_POST['paragraph_subtitle'][$key_desc] );
				$paragraph_description 	= $this->common->escapeStr( $val_desc );

				$arr_upd_libparagraph 	= array( 'paragraph_title'=>$paragraph_title, 'paragraph_subtitle'=>$paragraph_subtitle, 'paragraph_description'=>$paragraph_description );
				// common::pr($arr_upd_libparagraph);
				$arr_where_libparagraph	= array( 'paragraph_id'=>$pr_id );
				$paragraph_id = $this->parentdb->manageDatabaseEntry( 'tbl_library_paragraph', 'UPDATE', $arr_upd_libparagraph, $arr_where_libparagraph );
			}
			}
			// die;

		// Update paragraph Images //
			if( isset($files['userfile']) ) {
				foreach( $files['userfile']['name'][$key_desc] AS $key_img => $val_img ) {
					if( isset($key_img) && !empty($val_img) ) {
						if( "new" == $key_img ) {
							for($cnt_img=0; $cnt_img<sizeof($val_img); $cnt_img++ ) {
								if( $val_img[$cnt_img] ) {
									// Get last inserted paragraph image id //
										$next_image_id 	= $this->parentdb->getLastRowId('tbl_library_images');
										$ext_primg	 	= $this->common->getImagePathInfo( $this->common->escapeStr($val_img[$cnt_img]),'extension' );
										$full_imagename = "libpg_".$next_image_id.".".$ext_primg;

									$img_description	= isset($_POST['description_img'][$key_desc][$key_img][$cnt_img]) ? $_POST['description_img'][$key_desc][$key_img][$cnt_img] : '';
									$arr_ins_libimages 	= array('paragraph_id'=>$pr_id, 'page_id'=>$pid, 'library_id'=>$lid, 
																'image' => $full_imagename, 'image_description'=>$img_description, 'date_image_created' => date('Y-m-d h:i:s') );
									$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'INSERT', $arr_ins_libimages );
								}
							}
						}
						else {
							$ext_primg	 	= $this->common->getImagePathInfo( $this->common->escapeStr($val_img),'extension' );
							$full_imagename = "libpg_".$key_img.".".$ext_primg;
							$arr_upd_libimages 	= array( 'image'=>$full_imagename );
							$arr_where_libimages= array( 'paragraph_id'=>$pr_id, 'paragraph_image_id'=>$key_img );
							$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'UPDATE', $arr_upd_libimages, $arr_where_libimages );
						}
					}
				}
			}

			// Update image description //
				foreach( $_POST['description_img'][$key_desc] AS $key_img => $val_img ) {
					if( isset($key_img) ) {
						if( "new" != $key_img ) {
							$img_description= isset($_POST['description_img'][$key_desc][$key_img]) ? $_POST['description_img'][$key_desc][$key_img] : '';
							$arr_upd_libimages 	= array( 'image_description'=>$img_description );
							// common::pr( $arr_upd_libimages );
							$arr_where_libimages= array( 'paragraph_id'=>$pr_id, 'paragraph_image_id'=>$key_img );
							// common::pr($arr_where_libimages);
							$this->parentdb->manageDatabaseEntry( 'tbl_library_images', 'UPDATE', $arr_upd_libimages, $arr_where_libimages );
						}
					}
				}
				// die;
				

		// Update paragraph Videos //
			if( isset($_POST['paragraph_video']) ) {
				foreach( $_POST['paragraph_video'][$key_desc] AS $key_video => $val_video ) {
					if( !empty($val_video) ) {
						if( "new" != $key_video ) {
							$video 				= $this->common->escapeStr( $val_video );
							$video_description	= isset($_POST['description_vid'][$key_desc][$key_video]) ? $_POST['description_vid'][$key_desc][$key_video] : '';

							$arr_upd_libvideos 	= array( 'video'=>$video, 'video_description'=>$video_description );
							$arr_where_libvideos= array( 'paragraph_id'=>$key_desc, 'paragraph_video_id'=>$key_video );
							$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'UPDATE', $arr_upd_libvideos, $arr_where_libvideos );
						}
						else {
							for($vid=0; $vid<sizeof($val_video); $vid++ ) {
								if( $val_video[$vid] ) {
									$video 				= $this->common->escapeStr( $val_video[$vid] );
									$video_description	= isset($_POST['description_vid'][$key_desc][$key_video][$vid]) ? $_POST['description_vid'][$key_desc][$key_img][$vid] : '';
									$arr_ins_libvideos 	= array('paragraph_id'=>$pr_id, 'page_id'=>$pid, 'library_id'=>$lid, 
																'video' => $video, 'video_description'=>$video_description, 'date_video_created' => date('Y-m-d h:i:s') );
									$this->parentdb->manageDatabaseEntry( 'tbl_library_videos', 'INSERT', $arr_ins_libvideos );
								}
							}
						}
					}
				}
			}
		
		// Update paragraph Questions //
			if(isset($_POST['question'])){
				foreach( $_POST['question'][$key_desc] AS $qid => $question ){
					// common::pr($_POST['choice']);die;
					
					if( !empty($question) ) {
						if( "new" != $qid ) {
							$question = $this->common->escapeStr($question);
							
							if( isset($_POST['choice'][$key_desc]) ) {
								foreach($_POST['choice'][$key_desc] AS $idx => $val_choice) {
									if(isset($val_choice)){
										if( "new" != $idx ) {
											// Update question answers //
												$choice_val = $this->common->escapeStr($val_choice);
												if( !empty($choice_val) ) {
													$answer 	= $_POST['answer'][$key_desc][$idx];
													$arr_upd_libquesans		= array( 'choice'=>$choice_val, 'answer'=>$answer );
													$arr_where_libquesans	= array( 'answer_id'=>$idx );
													$this->parentdb->manageDatabaseEntry( 'tbl_library_question_answers', 'UPDATE', $arr_upd_libquesans, $arr_where_libquesans );
												}
										}
									}
								}
							}

							// Update questions //
								$arr_upd_questions	= array( 'question'=>$question );
								$arr_where_questions= array( 'question_id'=>$qid );
								$this->parentdb->manageDatabaseEntry( 'tbl_page_questions', 'UPDATE', $arr_upd_questions, $arr_where_questions );
						}
					}
				}
				
				// Insert question answers //
				foreach( $_POST['choice'] AS $key_newprchoice => $val_newprchoice ) {
					$cnt_newques=0;
					foreach( $val_newprchoice['new'] AS $key_newchoice => $val_newchoice ) {
						// common::pr( $val_newprchoice['new'] );die;
						$ques_val 	= $this->common->escapeStr($question[$cnt_newques]);
						
						if( $ques_val ) {
							$arr_ins_pageques = array( 'library_id' => $lid, 'page_id' => $pid, 'paragraph_id' => $pr_id, 'question' => $ques_val );
							$newques_id = $this->parentdb->manageDatabaseEntry( 'tbl_page_questions', 'INSERT', $arr_ins_pageques );

							for( $anscho=0; $anscho<sizeof($val_newchoice); $anscho++ ) {
								$choice_val = $this->common->escapeStr($val_newchoice[$anscho]);
								if( !empty($choice_val) ) {
									$answer 	= $_POST['answer'][$key_newprchoice]['new'][$key_newchoice][$anscho];
									$arr_ins_library_quesans = array( 'question_id' => $newques_id, 'choice' => $choice_val, 'answer' => $answer );
									// common::pr($arr_ins_library_quesans);die;
									$this->parentdb->manageDatabaseEntry( 'tbl_library_question_answers', 'INSERT', $arr_ins_library_quesans );
								}
							}
						}
						$cnt_newques++;
					}
				}
			}
    }

    function getQuestionAnswers($qid)
	{
        $sql 	= "SELECT answer_id, choice, answer FROM tbl_library_question_answers WHERE question_id=$qid ORDER BY answer_id";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function addItemInCartToMyLibrary($uid, $email, $item, $options, $transactionMsg='', $transactionResponseStr='')
	{
		$lib_type_id = $this->users->getMetaDataList('library', 'library_id="'.$item['libid'].'"', '', 'library_type_id');
		$lib_type_id = isset($lib_type_id[0]['library_type_id']) ? $lib_type_id[0]['library_type_id'] : '';

		$new_inv_form_id 	= '';
		$arr_ins_mylibrary 	= array();

		if( isset($item['rowid']) ) {
			$payment_option = isset($_POST['rdb_payment_option'][$item['rowid']]) ? $_POST['rdb_payment_option'][$item['rowid']] : '';
		}
		else {
			$payment_option = isset($_POST['rdb_payment_option']) ? $_POST['rdb_payment_option'] : '';
			$payment_option = isset($item['transaction_type']) ? $item['transaction_type'] : $payment_option;
		}

		$item_txn_num 	= isset($item['txn_num']) ? $item['txn_num'] : '';
		$txn_num 		= (isset($_POST['txn_num'])) ? $_POST['txn_num'] : $item_txn_num;
		$payment_option = ($payment_option=='') ? $item['payment_option'] : $payment_option;

		// common::pr($_POST);die;

		if( $lib_type_id == '6' ) {
			// Get Investigation Id from Library Id
				$rows_libinv = $this->users->getMetaDataList( 'inv_investigation', 'in_library_id="'.$item['libid'].'"', '', 'in_investigation_id' );
				(isset($rows_libinv) && isset($rows_libinv[0]['in_investigation_id'])) ? $inv_id = $rows_libinv[0]['in_investigation_id'] : '';

			// Generate the Investigation Form Number //
				for( $cnt_libqty=0;$cnt_libqty<$item['qty']; $cnt_libqty++ ) {
					$inv_form_no = $this->investigation->generateInvestigationNo();
					$arrInvForms = array('in_investigation_id' => $inv_id, 'in_library_id'	=> $item['libid'], 'st_inv_form_no'	=> $inv_form_no, 
										'in_inv_form_created_by' => $this->session->userdata("userid"));
					$new_inv_form_id = $this->parentdb->manageDatabaseEntry('tbl_inv_investigation_forms', 'INSERT', $arrInvForms);

					// 	Add Opened new library by consultant//
						$this->addConsultantPerformedLibrary($item['consultant_client_id'], $item['library_type'], $new_inv_form_id, 'opened' );

					$arr_ins_mylibrary = array( 'user_id'=>$uid, 'lib_id'=>$item['libid'], 'st_libtype_bought'=>$item['library_type'], 'in_inv_form_id'=>$new_inv_form_id, 
												'lib_title'=>$this->common->escapeStr($item['name']), 'qty_ordered'=>$item['qty'], 'unit_price'=>$item['price'], 
												'transaction_id'=>$txn_num, 'transaction_type'=>$payment_option, 'transaction_response_string'=>$transactionResponseStr, 
												'credits'=>$options['Credits'], 'creditsbuy' => $options['Creditsbuy'] );
					$this->parentdb->manageDatabaseEntry( 'tbl_my_library', 'INSERT', $arr_ins_mylibrary );
				}
		}
		else {
			$arr_ins_mylibrary = array( 'user_id'=>$uid, 'lib_id'=>$item['libid'], 'st_libtype_bought'=>$item['library_type'], 'in_inv_form_id'=>$new_inv_form_id, 
										'lib_title'=>$this->common->escapeStr($item['name']), 'qty_ordered'=>$item['qty'], 'unit_price'=>$item['price'], 
										'transaction_id'=>$txn_num, 'transaction_type'=>$payment_option, 'transaction_message'=>$transactionMsg, 'transaction_response_string'=>$transactionResponseStr, 'credits'=>$options['Credits'], 'creditsbuy'=>$options['Creditsbuy']);
			// common::pr($arr_ins_mylibrary);
			$this->parentdb->manageDatabaseEntry( 'tbl_my_library', 'INSERT', $arr_ins_mylibrary );
		}
		return true;
    }
	
	function addItemInCartToMyCredits($uid, $email, $item, $options)
	{
		if( isset($item['name']) ) {
			$arr_ins_mycredits = array( 'in_user_id'=>$uid, 'st_credits_package'=>$this->common->escapeStr($item['name']), 
										'in_credits_purchased'=>$options['credits'], 'in_qty_ordered'=>$item['qty'], 
										'in_credits_price'=>$item['price'], 'st_payment_response_string'=>'', 'dt_date_purchased'=>date('Y-m-d h:i:s') );
			$this->parentdb->manageDatabaseEntry( 'tbl_my_credits', 'INSERT', $arr_ins_mycredits );

			// Check total available credits of loggedin User and add/update the Credits //
				$total_available_credits= $this->users->get_user_meta($uid, 'total_credits');
				$total_available_credits= isset($total_available_credits['meta_value']) ? $total_available_credits['meta_value'] : '';
				if( $total_available_credits ) {
					$this->users->update_user_meta($uid, 'total_credits', ($total_available_credits+$options['credits']));
				}
				else {
					$this->users->add_user_meta($uid, 'total_credits', $options['credits']);
				}
		}
    }


	// START - Purchase Library Contents //
	function getMyInspectionInventories($email='', $uid, $whereString="", $limit='', $isGetTotal='')
	{
        $where 		= "WHERE tml.user_id='".$uid."' AND (tml.lib_id=tinsp.id OR tml.lib_id=tcustinsp.id)";
		(trim($whereString)) ? $where .= $whereString : '';

        $sql = "SELECT tml.lib_id, tml.credits, 
					(CASE WHEN tcustinsp.st_language IS NOT NULL THEN st_custom_inspection_name ELSE st_inspection_name END) AS lib_title, 
					(CASE WHEN tcustinsp.st_language IS NOT NULL THEN tcustinsp.st_language ELSE tinsp.st_language END) AS language, 
					3*(SUM(qty_ordered)) AS qty_ordered, 
					(CASE WHEN qty_assigned IS NULL THEN 0 ELSE 3*(qty_assigned) END) AS qty_assigned, 
					(CASE WHEN tcustinsp.st_language IS NOT NULL THEN 'custom_inspection' ELSE 'normal_inspection' END) AS libtype_section, 
					(CASE WHEN tcustinsp.st_icon_path IS NOT NULL THEN tcustinsp.st_icon_path ELSE tinsp.st_icon_path END) AS st_icon_path, 
					((3*(SUM(qty_ordered))) - (CASE WHEN 3*(qty_assigned) IS NULL THEN 0 ELSE 3*(qty_assigned) END) ) AS inventory, 
					tml.lib_title AS description, 
					(CASE WHEN tcustinsp.date_inspection_end IS NOT NULL THEN tcustinsp.date_inspection_end ELSE tinsp.date_inspection_end END) AS date_end,
					tml.date_bought, 
					(CASE WHEN tcustinsp.st_language IS NOT NULL THEN tcustinsp.in_price ELSE tinsp.in_price END) AS inspection_price,
					tml.unit_price, 
					'5' AS library_type_id,
					tml.transaction_type
				FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, owner_id, COUNT(id) AS qty_assigned FROM tbl_assignments AS tas 
						WHERE owner_id='".$uid."' AND (tas.st_libtype_assigned='normal_inspection' OR tas.st_libtype_assigned = 'custom_inspection') 
						GROUP BY library_id, owner_id) AS ta 
				ON tml.user_id=ta.owner_id AND tml.lib_id=ta.library_id 
				LEFT JOIN tbl_inspection AS tinsp ON tml.lib_id=tinsp.id 
						AND tinsp.status=1 AND (tinsp.date_inspection_start<=CURDATE() AND (tinsp.date_inspection_end='0000-00-00' OR tinsp.date_inspection_end>CURDATE()))
				LEFT JOIN tbl_custom_inspection AS tcustinsp ON tml.lib_id=tcustinsp.id 
						AND (tcustinsp.status=1 OR tcustinsp.status=2) AND (tcustinsp.date_inspection_start<=CURDATE() AND (tcustinsp.date_inspection_end='0000-00-00' OR tcustinsp.date_inspection_end>CURDATE()))
				".$where." 
				AND (tml.st_libtype_bought='normal_inspection' OR (tml.st_libtype_bought = 'custom_inspection' OR tml.st_libtype_bought = 'new_custom_inspection')) 
				GROUP BY tml.lib_id, tml.st_libtype_bought
				ORDER BY TRIM(tml.lib_title)";

        if( 1 == $isGetTotal ) {
			$query = $this->db->query($sql);
			return !($query) ? $this->common->dberror() : sizeof($query->result_array());
		}
		else {
			($limit) ? $sql .= " LIMIT ".$limit : '';
			$query = $this->db->query($sql);
			// common::pr($query->result_array());
			
			return !($query) ? $this->common->dberror() : $query->result_array();
		}
    }

	function getMySafetytalksInventories( $email='', $uid='', $whereString="", $limit='', $isGetTotal='')
	{
		$where = (trim($whereString)) ?  $whereString : '';
		
		$sql1 = "SELECT tml.lib_id, tml.credits, 
					tsafety.st_safetytalks_topic AS lib_title, 
					tsafety.st_language AS st_language, 
					tml.st_libtype_bought AS libtype_section, 
					tsafety.st_icon_path, 
					SUM(qty_ordered)-(CASE WHEN SUM(qty_assigned1) IS NULL THEN 0 ELSE (qty_assigned1) END) AS inventory, 
					tml.lib_title AS description, 
					tsafety.date_safetytalks_end AS date_end,
					tml.date_bought, 
					tml.unit_price, 
					'2' AS library_type_id
				FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, owner_id, COUNT(id) AS qty_assigned1 FROM tbl_assignments AS tas 
						WHERE owner_id='".$uid."' AND tas.st_libtype_assigned='normal_safetytalks' 
						GROUP BY library_id, owner_id) AS ta 
				ON tml.user_id=ta.owner_id AND tml.lib_id=ta.library_id 
				RIGHT JOIN tbl_safetytalks AS tsafety ON tml.lib_id=tsafety.id AND tsafety.status=1 
					AND tsafety.status=1 AND (tsafety.date_safetytalks_start<=CURDATE() AND (tsafety.date_safetytalks_end='0000-00-00' OR tsafety.date_safetytalks_end>CURDATE()))
				WHERE tml.user_id='".$uid."' AND (tml.st_libtype_bought='normal_safetytalks' OR tml.st_libtype_bought='new_normal_safetytalks')
				".$where." 
				GROUP BY tml.lib_id";

		$sql2	= "SELECT tml.lib_id, tml.credits, 
					tcustsafety.st_custom_safetytalks_name AS lib_title, 
					tcustsafety.st_language, 
					tml.st_libtype_bought AS libtype_section, 
					tcustsafety.st_language AS st_icon_path, 
					SUM(qty_ordered)-(CASE WHEN SUM(qty_assigned2) IS NULL THEN 0 ELSE (qty_assigned2) END)  AS inventory, 
					tml.lib_title AS description, 
					tcustsafety.date_safetytalks_end AS date_end,
					tml.date_bought,
					tml.unit_price, 
					'2' AS library_type_id
				FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, owner_id, COUNT(id) AS qty_assigned2 FROM tbl_assignments AS tas 
						WHERE owner_id='".$uid."' AND tas.st_libtype_assigned = 'custom_safetytalks' 
						GROUP BY library_id, owner_id) AS ta 
				ON tml.user_id=ta.owner_id AND tml.lib_id=ta.library_id 
				RIGHT JOIN tbl_custom_safetytalks AS tcustsafety ON tml.lib_id=tcustsafety.id AND tcustsafety.status=1 
					AND tcustsafety.status=1 AND (tcustsafety.date_safetytalks_start<=CURDATE() AND (tcustsafety.date_safetytalks_end='0000-00-00' OR tcustsafety.date_safetytalks_end>CURDATE()))
				WHERE tml.user_id='".$uid."' AND tml.st_libtype_bought = 'custom_safetytalks' 
				".$where."
				GROUP BY tml.lib_id ";

		$sql = "(".$sql1.") UNION (".$sql2.") ORDER BY TRIM(lib_title)";

        if( 1 == $isGetTotal ) {
			$query = $this->db->query($sql);
			return !($query) ? $this->common->dberror() : sizeof($query->result_array());
		}
		else {
			($limit) ? $sql .= " LIMIT ".$limit : '';
			$query = $this->db->query($sql);
			return !($query) ? $this->common->dberror() : $query->result_array();
		}
    }

	function getMyProceduresInventories( $email='', $uid='', $whereString="", $limit='', $isGetTotal='')
	{
		$where = (trim($whereString)) ?  $whereString : '';

		$sql	= "SELECT tml.lib_id, tml.credits, 
					tml.lib_title, 
					COUNT(tml.lib_id) AS total_newproc, 
					tproc.st_language AS language, 
					tml.st_libtype_bought AS libtype_section, 
					SUM(qty_ordered)-(CASE WHEN SUM(qty_assigned2) IS NULL THEN 0 ELSE (qty_assigned2) END) AS inventory, 
					tml.lib_title AS description, 
					tproc.dt_date_start AS date_start, 
					(CASE WHEN(tproc.dt_date_end IS NULL OR tproc.dt_date_end='0000-00-00' OR tproc.dt_date_end IS NULL) THEN DATE_ADD(CURRENT_DATE, INTERVAL 1 YEAR) ELSE tproc.dt_date_end END) AS date_end, 
					st_procedure_status,
					tml.date_bought,
					tml.unit_price,
					'4' AS library_type_id
				FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, owner_id, COUNT(id) AS qty_assigned2 FROM tbl_assignments AS tas 
						WHERE owner_id='".$uid."' AND (tas.st_libtype_assigned = 'new_procedure' || tas.st_libtype_assigned = 's1procedures') 
						GROUP BY library_id, owner_id) AS ta 
				ON tml.user_id=ta.owner_id AND tml.lib_id=ta.library_id 
				RIGHT JOIN tbl_procedures AS tproc ON tml.lib_id=tproc.id AND tproc.status = 1 
						AND (tproc.dt_date_start<=NOW() AND (tproc.dt_date_end='0000-00-00' OR tproc.dt_date_end IS NULL OR tproc.dt_date_end>NOW()))
				WHERE tml.user_id='".$uid."' AND (tml.st_libtype_bought = 's1procedures' OR tml.st_libtype_bought = 'new_procedure') 
				".$where." 
				GROUP BY (CASE WHEN tml.lib_title='NEW PROCEDURE' THEN tml.lib_title ELSE tml.lib_id END)
				HAVING inventory>0 ORDER BY st_libtype_bought, lib_title ASC";
        if( 1 == $isGetTotal ) {
			$query = $this->db->query($sql);
			return !($query) ? $this->common->dberror() : sizeof($query->result_array());
		}
		else {
			($limit) ? $sql .= " LIMIT ".$limit : '';
			// echo "<br>".$sql;
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			foreach( $result AS $key_purchase_proc => $val_purchase_proc ) {
				$purpose_title = $this->users->getMetaDataList('proc_purpose', 'in_procedure_id="'.$val_purchase_proc['lib_id'].'"', '', 'st_purpose_title');
				if( isset($purpose_title[0]['st_purpose_title']) && $purpose_title[0]['st_purpose_title'] ) {
					$result[$key_purchase_proc]['lib_title'] = $purpose_title[0]['st_purpose_title'];
				}
			}
			return !($query) ? $this->common->dberror() : $result;
		}
	}

    function getMyInventoriesByUserName($email, $uid, $assignable=0, $whereString="", $libraryTypeId='', $limit='', $isGetTotal='')
	{
        $where 		= "WHERE tlib.status=1 AND (tlib.date_start<=CURDATE() AND (tlib.date_end='0000-00-00' OR tlib.date_end>CURDATE())) AND user_id='".$uid."' 
						AND tml.lib_id=tlib.library_id AND (st_libtype_bought IN ('Training', 'Hazards', 'Investigations', 'Procedures') OR st_libtype_bought IS NULL)";
		$libraryTypeId ? $where .= " AND library_type_id = '".$libraryTypeId."'" : '';
        $having 	= '';

		if( "2" == $assignable ) {
			// $where .= " AND (progress<100 OR progress is NULL)";
			$having = " HAVING (qty_ordered>qty_assigned OR qty_assigned IS NULL)";
		}
		else {
			if($assignable < 1) {
				// $where .= " AND (progress<100 OR progress is NULL)";
			}
			else {
				$having = " HAVING (qty_ordered>qty_assigned OR qty_assigned IS NULL)";
			}
		}

		(trim($whereString)) ? $where .= $whereString : '';

        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER") {
            foreach( $_POST as $key=>$value ) {
                if(!empty($value) && $key!="action") {
                    if(strpos($key, '_id')) {
                        $row = $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);
                        $value = $row[substr($key, 0, -3).'name'];
                    }
                    $where .= " AND (tlib.$key LIKE '%".$this->common->escapeStr($value)."%' OR tlib.$key LIKE 'all')";
                }
			}
        }

        $sql = "SELECT tml.lib_id, tml.in_inv_form_id, library_type_id, tlib.credits, lib_title, language, 
					SUM(qty_ordered) AS qty_ordered, ta.qty_assigned, progress, date_end, description, 
					tlib.price, tml.st_libtype_bought AS libtype_section, tml.date_bought, tml.unit_price,
					(SELECT COUNT(trh1.library_id) FROM tbl_reading_history AS trh1 WHERE tml.lib_id=trh1.library_id AND trh1.uid = '".$uid."' AND trh1.progress=100) AS qty_completed
                FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, st_libtype_assigned, in_inv_form_id, owner_id, COUNT(id) AS qty_assigned 
							FROM tbl_assignments AS tas WHERE owner_id='".$uid."' 
							GROUP BY (CASE WHEN (tas.st_libtype_assigned='Investigations') THEN in_inv_form_id ELSE library_id END), owner_id, st_libtype_assigned) AS ta
				ON tml.user_id = ta.owner_id AND tml.st_libtype_bought = ta.st_libtype_assigned
						AND (CASE WHEN (ta.st_libtype_assigned='Investigations') THEN 
							tml.lib_id=ta.library_id AND (tml.in_inv_form_id=ta.in_inv_form_id AND ta.in_inv_form_id>0) 
							ELSE tml.lib_id=ta.library_id END)
				LEFT JOIN tbl_reading_history AS trh ON tml.user_id=trh.uid AND tml.lib_id=trh.library_id
				, tbl_library AS tlib ";

        $sql .= $where." GROUP BY (CASE WHEN(library_type_id=6) THEN tml.in_inv_form_id ELSE tml.lib_id END), 
						(CASE WHEN(library_type_id=6) THEN lib_id END) ".$having." ORDER BY TRIM(lib_title)";

		// echo "<br><br>".$sql;
		if( 1 == $isGetTotal ) {
			$query = $this->db->query($sql);
			return !($query) ? $this->common->dberror() : sizeof($query->result_array());
		}
		else {
			($limit) ? $sql .= " LIMIT ".$limit : '';
			$query = $this->db->query($sql);
			// common::pr($query->result_array());
		
			return !($query) ? $this->common->dberror() : $query->result_array();
		}
		
		
    }
	// END - Purchase Library Contents //



	// START - Assign Library Contents //
		function assignLibraryToUser($lib_id='', $user_id='', $owner_id='', $inv_form_id='', $libtype_section='')
		{
			if( trim($user_id) ) {
				if( "new_procedure" == $libtype_section || "Procedures" == $libtype_section ) {
					$arr_ins_assignments = array( 'uid'=>$user_id, 'library_id'=>$lib_id, 'st_libtype_assigned'=>$libtype_section, 'in_inv_form_id'=>$inv_form_id, 'owner_id'=>$owner_id );
					$return_msg = $this->parentdb->manageDatabaseEntry( 'tbl_assignments', 'INSERT', $arr_ins_assignments );
				}
				else {
					$sql 	= "SELECT id FROM tbl_assignments WHERE uid='".$user_id."' AND library_id='".$lib_id."' AND owner_id='".$owner_id."'";
					($inv_form_id) ? $sql .= " AND in_inv_form_id = '".$inv_form_id."'" : '';
					$sql 	.= " AND st_libtype_assigned = '".$libtype_section."'";
					$query 	= $this->db->query($sql);
					if(!$query) {
						return $this->common->dberror();
					}
					else {
						$num_assigned_rows = $query->num_rows();
						// For Inspection: 1 library can be assigned to any user for 3 times //
							$limit_assign_library = ("normal_inspection"==$libtype_section || "custom_inspection"==$libtype_section) ? (3-1) : 0;

						if( $num_assigned_rows > $limit_assign_library ) {
							$return_msg = false;
						}
						else {
							$arr_ins_assignments = array( 'uid'=>$user_id, 'library_id'=>$lib_id, 'st_libtype_assigned'=>$libtype_section, 
															'in_inv_form_id'=>$inv_form_id, 'owner_id'=>$owner_id );
							$return_msg = $this->parentdb->manageDatabaseEntry( 'tbl_assignments', 'INSERT', $arr_ins_assignments );
						}
					}
				}
				
				if( $return_msg != false ) {
					// Send Message to user of Library Assigned //
						$email_assign_to = $this->users->getMetaDataList( 'user', 'id="'.$user_id.'"', '', 'email_addr' );
						$email_assign_to = (isset($email_assign_to[0]['email_addr']) && $email_assign_to[0]['email_addr']) ? $email_assign_to[0]['email_addr'] : '';
						
						$subject = ucwords(str_replace("_"," ",$libtype_section))." has been assigned";
						
						if( "badge" == $libtype_section ) { // BADGE //
							// Get Badge Title //
								$badge_title = $this->users->getMetaDataList('badge', 'in_status=1 AND id="'.$lib_id.'"', '', 'st_badge_title');
								$badge_title = isset($badge_title[0]['st_badge_title']) ? $badge_title[0]['st_badge_title'] : '';

							$email_assign_message = $badge_title." ".ucwords(str_replace("_"," ",$libtype_section));
							$email_assign_message .= " has been assigned by ".$this->session->userdata("username")." on ".date('m-d-Y');
						}
						else {
							// Get library Title //
								$library_title = $this->users->getMetaDataList('library', 'status=1 
											AND date_start<=CURDATE() AND (date_end="0000-00-00" OR date_end>=CURDATE()) 
											AND library_id="'.$lib_id.'"', '', 'title');
								$library_title = isset($library_title[0]['title']) ? $library_title[0]['title'] : '';
								
							$email_assign_message = $library_title." ".ucwords(str_replace("_"," ",$libtype_section));
							$email_assign_message .= " has been assigned by ".$this->session->userdata("username")." on ".date('m-d-Y');
						}
						
						$arr_ins_message = array( 'send_to'=>$email_assign_to, 'send_from'=>$this->sess_useremail, 'subject'=>$subject, 'message'=>$email_assign_message );
						$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
						$this->users->sendEmailToS1user($email_assign_to, $this->sess_useremail, $subject, $email_assign_message );
				}
				return $return_msg;
			}
		}

		function getAssignedDocumentsByUserID($uid='', $libraryTypeId='', $limit='', $isGetTotal='')
		{
			$where = " WHERE tbl_assignments.uid='".$uid."' 
						AND tbl_assignments.library_id=tbl_library.library_id";
			($libraryTypeId) ? $where .= " AND library_type_id = '".$libraryTypeId."'" : '';

			if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER") {
				foreach($_POST as $key=>$value)
					if(!empty($value) && $key!="action"){
						if(strpos($key, '_id')){
							$row = $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);
							$value = $row[substr($key, 0, -3).'name'];
						}
						$where .= " AND (tbl_library.$key LIKE '%".$this->common->escapeStr($value)."%' OR tbl_library.$key LIKE 'all')";
					}
			}
			$sql = "SELECT * FROM tbl_assignments 
					LEFT JOIN tbl_reading_history ON tbl_assignments.uid=tbl_reading_history.uid AND tbl_assignments.library_id=tbl_reading_history.library_id 
					, tbl_library";
			$sql .= $where ." ORDER BY TRIM(title)";
			
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getAssignedInspectionsByUserID($uid='', $limit='', $isGetTotal='')
		{
			$where = " WHERE tas.uid='".$uid."' AND (tas.library_id=tinsp.id OR tas.library_id=tcustinsp.id)
						AND (tas.st_libtype_assigned='normal_inspection' OR tas.st_libtype_assigned = 'custom_inspection')";
			$sql = "SELECT tas.library_id AS lib_id, tas.uid, tas.st_libtype_assigned, 
						(CASE WHEN tcustinsp.st_language IS NOT NULL THEN tcustinsp.st_language ELSE tinsp.st_language END) AS language, 
						(CASE WHEN tcustinsp.st_language IS NOT NULL THEN 'custom_inspection' ELSE 'normal_inspection' END) AS libtype_section, 
						(CASE WHEN tcustinsp.st_custom_inspection_name IS NOT NULL THEN st_custom_inspection_name ELSE st_inspection_name END) AS title,
						(CASE WHEN tcustinsp.in_credits_buy IS NOT NULL THEN tcustinsp.in_credits_buy ELSE tinsp.in_credits_buy END) AS credits,
						(CASE WHEN tcustinsp.in_price IS NOT NULL THEN tcustinsp.in_price ELSE tinsp.in_price END) AS price,
						(CASE WHEN tcustinsp.st_icon_path IS NOT NULL THEN tcustinsp.st_icon_path ELSE tinsp.st_icon_path END) AS st_icon_path, 
						(CASE WHEN tcustinsp.date_inspection_end IS NOT NULL THEN tcustinsp.date_inspection_end ELSE tinsp.date_inspection_end END) AS date_end,
						tas.date_assign 
					FROM tbl_assignments AS tas 
					LEFT JOIN tbl_inspection AS tinsp ON tas.library_id=tinsp.id 
						AND tinsp.status=1 AND (tinsp.date_inspection_start<=CURDATE() AND (tinsp.date_inspection_end='0000-00-00' OR tinsp.date_inspection_end>CURDATE()))
					LEFT JOIN tbl_custom_inspection AS tcustinsp ON tas.library_id=tcustinsp.id 
						AND tcustinsp.status=1 AND (tcustinsp.date_inspection_start<=CURDATE() AND (tcustinsp.date_inspection_end='0000-00-00' OR tcustinsp.date_inspection_end>CURDATE()))";
			$sql .= $where." GROUP BY tas.library_id";
			
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getAssignedSafetytalksByUserID($uid='', $limit='', $isGetTotal='')
		{
			$where = " WHERE tas.uid='".$uid."' AND (tas.library_id=tsafety.id OR tas.library_id=tcustsafety.id)
						AND (tas.st_libtype_assigned='normal_safetytalks' OR tas.st_libtype_assigned = 'custom_safetytalks')";
			$sql = "SELECT tas.library_id AS lib_id, tas.uid, tas.st_libtype_assigned, 
						(CASE WHEN tcustsafety.st_language IS NOT NULL THEN 'custom_safetytalks' ELSE 'normal_safetytalks' END) AS libtype_section, 
						(CASE WHEN tcustsafety.st_custom_safetytalks_name IS NOT NULL THEN st_custom_safetytalks_name ELSE st_safetytalks_topic END) AS title,
						tsafety.st_icon_path, 
						(CASE WHEN tcustsafety.date_safetytalks_end IS NOT NULL THEN tcustsafety.date_safetytalks_end ELSE tsafety.date_safetytalks_end END) AS date_end,
						tas.date_assign
					FROM tbl_assignments AS tas 
					LEFT JOIN tbl_safetytalks AS tsafety ON tas.library_id=tsafety.id AND tsafety.status=1 
					AND tsafety.status=1 AND (tsafety.date_safetytalks_start<=CURDATE() AND (tsafety.date_safetytalks_end='0000-00-00' OR tsafety.date_safetytalks_end>CURDATE()))				
					LEFT JOIN tbl_custom_safetytalks AS tcustsafety ON tas.library_id=tcustsafety.id AND tcustsafety.status=1 
					AND tcustsafety.status=1 AND (tcustsafety.date_safetytalks_start<=CURDATE() AND (tcustsafety.date_safetytalks_end='0000-00-00' OR tcustsafety.date_safetytalks_end>CURDATE()))";
					
			$sql .= $where." GROUP BY tas.library_id";
			// echo "<br><br>".$sql;
			
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getAssignedProceduresByUserID($uid='', $limit='', $isGetTotal='')
		{
			$where = " WHERE tas.uid='".$uid."' AND tas.library_id = tp.id
						AND (tas.st_libtype_assigned='new_procedure' || tas.st_libtype_assigned='s1procedures') AND tp.status = 1";
						
			$sql = "SELECT tas.library_id AS lib_id, 
						tas.uid, 
						tp.st_procedure_name AS title, 
						tp.dt_date_start AS date_start, 
						tas.st_libtype_assigned AS libtype_section, 
						(CASE WHEN (tp.dt_date_end IS NULL OR tp.dt_date_end='0000-00-00 00:00:00') THEN DATE_ADD(CURRENT_DATE, INTERVAL 1 YEAR) ELSE tp.dt_date_end END) AS date_end, 
						tas.date_assign 
					FROM tbl_assignments AS tas 
					LEFT JOIN tbl_procedures AS tp ON tas.library_id=tp.id AND tp.status = 1 
						AND (tp.dt_date_start<=NOW() AND (tp.dt_date_end='0000-00-00 00:00:00' OR tp.dt_date_end IS NULL OR tp.dt_date_end>NOW()))";
					
			$sql .= $where." GROUP BY tas.library_id";
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query 	= $this->db->query($sql);			
				$result = $query->result_array();

				foreach( $result AS $key_purchase_proc => $val_purchase_proc ) {
					$purpose_title = $this->users->getMetaDataList('proc_purpose', 'in_procedure_id="'.$val_purchase_proc['lib_id'].'"', '', 'st_purpose_title');
					if( isset($purpose_title[0]['st_purpose_title']) && $purpose_title[0]['st_purpose_title'] ) {
						$result[$key_purchase_proc]['lib_title'] = $purpose_title[0]['st_purpose_title'];
					}
				}
				return !($query) ? $this->common->dberror() : $result;
			}
		}
	// END - Assign Library Contents //



	// START - Completed Library Contents //
		function getCompletedDocumentsByUserID($uid, $libraryTypeId='', $limit='', $isGetTotal='')
		{
			$where = "WHERE uid='".$uid."' AND progress>=100";
			($libraryTypeId ) ? $where .= " AND library_type_id = '".$libraryTypeId."'" : '';

			if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['action']) && $_POST['action']=="FILTER"){
				foreach($_POST as $key=>$value) {
					if(!empty($value) && $key!="action"){
						if(strpos($key, '_id')){
							$row 	= $this->users->getElementByID('tbl_'.substr($key, 0, -3), $value);
							$value 	= $row[substr($key, 0, -3).'name'];
						}
						$where .= " AND (tl.$key LIKE '%".$this->common->escapeStr($value)."%' OR tl.$key LIKE 'all')";
					}
				}
			}
			$sql = "SELECT trh.*, tl.credits, tl.date_end, tl.description, tl.title, tl.language 
					FROM tbl_reading_history AS trh
					LEFT JOIN tbl_library AS tl on trh.library_id=tl.library_id ";
			$sql .= $where." ORDER BY TRIM(title)";
			
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getCompletedInspections($limit='', $isGetTotal='')
		{
			$sql1 = "SELECT 
						id AS lib_id, st_inspection_name, 
						st_language AS st_language,
						'normal_inspection' AS libtype_section, 
						st_icon_path, 
						date_inspection_end AS date_end, 
						date_completed
					FROM tbl_inspection
					WHERE st_inspection_status = 'completed' AND in_user_id='".$this->sess_userid."'";
			$sql2	= "SELECT 
						id AS lib_id, st_custom_inspection_name, 
						st_language AS st_language, 
						'custom_inspection' AS libtype_section, 
						st_language AS st_icon_path, 
						date_inspection_end AS date_end,
						date_completed
					FROM tbl_custom_inspection 
					WHERE st_inspection_status = 'completed' AND in_user_id='".$this->sess_userid."'";
					
			$sql3 = "SELECT 
						in_library_id AS lib_id, 
						'New Advanced Inspection' AS title, 
						'EN' AS st_language, 
						'new_advanced_inspection' AS libtype_section, 
						'' AS st_icon_path, 
						dt_date_performed AS date_end, 
						dt_date_performed AS date_completed
					FROM tbl_librarytool_performed_by_consultant 
					WHERE st_library_perform_status = 'completed' AND st_library_section='new_inspection' 
							AND (in_client_id='".$this->sess_userid."' OR in_consultant_id='".$this->sess_userid."') 
					GROUP BY in_library_id";

			$sql = "(".$sql1.") UNION (".$sql2.") UNION (".$sql3.")";
			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getCompletedSafetytalks($userId='', $limit='', $isGetTotal='')
		{
			/*
			// Merge Safetytalks Attendees Users //
				$this->db->from('tbl_safetytalks_attendees AS t1');
				$this->db->select('t1.st_attendee_s1employer, t1.st_attendee_s1worker, t1.is_custom_safetytalks');
				$this->db->join('tbl_safetytalks AS t2','t1.in_safetytalks_id=t2.id','LEFT');
				$this->db->where('t2.st_safetytalks_status', "completed");
				// $this->db->where('t2.status', '0');
				$sel_safetytalks_attendees = $this->db->get();
				$rows_safetytalks_attendees= (!$sel_safetytalks_attendees) ? $this->common->dberror() : $sel_safetytalks_attendees->result();

				$arr_attendees = array();
				foreach( $rows_safetytalks_attendees AS $val_safetytalks_attendees ) {
					$arr_attendees['safetytalks_type'][$val_safetytalks_attendees->is_custom_safetytalks] = $val_safetytalks_attendees->st_attendee_s1employer;
					$arr_attendees['safetytalks_type'][$val_safetytalks_attendees->is_custom_safetytalks] = $val_safetytalks_attendees->st_attendee_s1worker;
				}
				$users_normal_safetytalks = $users_custom_safetytalks = $userId;
				if( isset($arr_attendees['safetytalks_type'][0])&&$arr_attendees['safetytalks_type'][0] ) {
					$users_normal_safetytalks = $userId.",".$arr_attendees['safetytalks_type'][0];
				}
				if( isset($arr_attendees['safetytalks_type'][1])&&$arr_attendees['safetytalks_type'][1] ) {
					$users_custom_safetytalks = $userId.",".$arr_attendees['safetytalks_type'][1];
				}
			*/
				
			$sql1 = "SELECT id AS lib_id, st_safetytalks_topic, st_language AS st_language, 'normal_safetytalks' AS libtype_section, 
						st_icon_path, date_safetytalks_end AS date_end, date_completed 
					FROM tbl_safetytalks AS tsafety 
					LEFT JOIN tbl_safetytalks_attendees AS t2 ON (tsafety.id=t2.in_safetytalks_id)
					WHERE st_safetytalks_status = 'completed' AND status=1 AND 
										(FIND_IN_SET('".$userId."',t2.st_attendee_s1worker) OR FIND_IN_SET('".$userId."',t2.st_attendee_s1employer) 
												OR tsafety.in_user_id='".$userId."')";

			$sql2 = "SELECT id AS lib_id, st_custom_safetytalks_name, st_language AS st_language, 'custom_safetytalks' AS libtype_section, 
						st_language AS st_icon_path, date_safetytalks_end AS date_end, date_completed
					FROM tbl_custom_safetytalks AS tcustomsafety
					LEFT JOIN tbl_safetytalks_attendees AS t2 ON (tcustomsafety.id=t2.in_safetytalks_id)
					WHERE st_safetytalks_status = 'completed' AND status=1 AND 
										(FIND_IN_SET('".$userId."',t2.st_attendee_s1worker) OR FIND_IN_SET('".$userId."',t2.st_attendee_s1employer) 
												OR tcustomsafety.in_user_id='".$userId."')";

			$sql3 = "SELECT 
						in_library_id AS lib_id, 'New Safetytalks' AS title, 
						'EN' AS st_language, 'normal_safetytalks' AS libtype_section, 
						'' AS st_icon_path, dt_date_performed AS date_end, dt_date_performed AS date_completed
					FROM tbl_librarytool_performed_by_consultant 
					WHERE st_library_perform_status = 'completed' AND st_library_section='normal_safetytalks' AND in_client_id='".$userId."'";

			$sql = "(".$sql1.") UNION (".$sql2.") UNION (".$sql3.")";
			// echo "<br>".$sql;

			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}

		function getCompletedProcedures($userId='', $limit='', $isGetTotal='')
		{
			$sql1 = "SELECT 
						tp.id AS lib_id, 
						(CASE WHEN (SELECT tpp1.st_purpose_title FROM tbl_proc_purpose AS tpp1 WHERE tpp1.in_procedure_id=tp.id AND tpp1.in_created_by = '".$userId."') IS NOT NULL THEN (SELECT tpp2.st_purpose_title FROM tbl_proc_purpose AS tpp2 WHERE tpp2.in_procedure_id=tp.id AND tpp2.in_created_by = '".$userId."') ELSE tp.st_procedure_name END) AS title, 
						tp.dt_date_start AS date_start, 
						tp.dt_date_end AS date_end, 
						'new_procedure' AS libtype_section, 
						tp.date_completed
					FROM tbl_procedures AS tp
					WHERE tp.st_procedure_status = 'completed' AND tp.in_created_by = '".$userId."'";

			$sql2 = "SELECT 
						tlpbc.in_library_id AS lib_id, 
						(CASE WHEN (SELECT tpp1.st_purpose_title FROM tbl_proc_purpose AS tpp1 WHERE tpp1.in_procedure_id=tlpbc.id) IS NOT NULL THEN (SELECT tpp2.st_purpose_title FROM tbl_proc_purpose AS tpp2 WHERE tpp2.in_procedure_id=tlpbc.id) ELSE 'My New Procedure' END) AS title, 
						tlpbc.dt_date_performed AS date_start, 
						tlpbc.dt_date_performed AS date_end, 
						'new_procedure' AS libtype_section, 
						'' AS date_completed 
					FROM tbl_librarytool_performed_by_consultant AS tlpbc
					WHERE tlpbc.st_library_perform_status = 'completed' AND tlpbc.st_library_section='new_procedure' AND tlpbc.in_client_id = '".$userId."'";

			$sql = "(".$sql1.") UNION (".$sql2.")";

			if( 1 == $isGetTotal ) {
				$query = $this->db->query($sql);
				// common::pr($query->result_array());die;
				
				return !($query) ? $this->common->dberror() : sizeof($query->result_array());
			}
			else {
				($limit) ? $sql .= " LIMIT ".$limit : '';
				$query = $this->db->query($sql);
		
				return !($query) ? $this->common->dberror() : $query->result_array();
			}
		}
    // END - Completed Library Contents //

	
	
    function getPagesRead($uid, $lid)
	{
        $sql 	= "SELECT pages_read FROM tbl_reading_history WHERE uid='".$uid."' AND library_id='".$lid."' LIMIT 1";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->row_array();
    }

	function resetReadingHistory($uid, $lid, $progress='')
	{
		$arr_upd_readhistory = array( 'progress'=>$progress );
		($progress==0) ? $arr_upd_readhistory['pages_read']='' : '';
		$arr_where_readhistory	= array( 'uid'=>$uid, 'library_id'=>$lid );
		
		$this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'UPDATE', $arr_upd_readhistory, $arr_where_readhistory );
	}

    function updateReadingHistory($uid='', $lid='', $pid='')
	{
        $sql 	= "SELECT history_id FROM tbl_reading_history WHERE uid='".$uid."' AND library_id='".$lid."' AND pages_read LIKE '%".$pid."%' LIMIT 1";
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
				$sql 	= "SELECT history_id FROM tbl_reading_history WHERE uid='".$uid."' AND library_id='".$lid."' LIMIT 1";
				$query 	= $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					if( $query->num_rows()<1 ) {
						$arr_ins_readhistory = array( 'uid'=>$uid, 'library_id'=>$lid, 'pages_read'=>'{'.$pid.'}' );
						$this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'INSERT', $arr_ins_readhistory );
					}
					else {
						$rows_pages_read	= $this->users->getMetaDataList('reading_history','uid="'.$uid.'" AND library_id="'.$lid.'"', '', 'pages_read');
						$current_id  		= "{".$pid."}";

						if( !in_array($current_id, explode(",", $rows_pages_read[0]['pages_read'])) ) {
							$rows_pages_read		= isset($rows_pages_read[0]['pages_read']) ? $rows_pages_read[0]['pages_read'].",{".$pid."}" : "{".$pid."}";

							$arr_upd_readhistory	= array( 'pages_read' => $rows_pages_read );
							$arr_where_readhistory 	= array( 'uid'=>$uid, 'library_id'=>$lid );
							$this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'UPDATE', $arr_upd_readhistory, $arr_where_readhistory );
						}
					}
					$totalpages 		= $this->getTotalPageNumber($lid);
					$pages_read 		= $this->getPagesRead($uid, $lid);
					$total_pages_read 	= count($pages_read)>0 ? explode(",", $pages_read['pages_read']) : 0;
					// echo "<br>".count($total_pages_read);

					$progress = (count($total_pages_read)/$totalpages*100);
					$progress = ($progress>100) ? 100 : $progress;
					$arr_upd_progress 	= array( 'progress' => $progress );
					$arr_where_progress 	= array('uid'=>$uid,'library_id'=>$lid);
					$upd_libhistory = $this->parentdb->manageDatabaseEntry( 'tbl_reading_history', 'UPDATE', $arr_upd_progress, $arr_where_progress );
					return $upd_libhistory;
				}
			}

    }

	function addProcedureFunctions($tblName='', $tblFieldsVals='', $where='' )
	{
		if( sizeof($tblFieldsVals) ) {
			$check_row = array();
			if($where) {
				$check_row = $this->users->getMetaDataList($tblName, $where, '', 'in_created_by');
			}
			$sql 		= (sizeof($check_row)) ? "UPDATE " : "INSERT ";
			$sql 		.= "tbl_".$tblName." SET ".$tblFieldsVals;
			(sizeof($check_row) && $where) ? $sql .= " WHERE ".$where : '';
			// echo $sql;
			$query 		= $this->db->query($sql);

			return (!$query) ? $this->common->dberror() : '';
		}
	}

	function checkIfLibraryPageValid($libType='')
	{
		// Get Union Library types //
			$parent_libtype = $this->users->getMetaDataList('library_types', 'id = "'.$libType.'"', '', 'parent_library_type');
			$parent_libtype = isset($parent_libtype[0]['parent_library_type']) ? $parent_libtype[0]['parent_library_type'] : '';

		if( !$parent_libtype|| (($this->sess_usertype != 7 && $this->s1_parent_libtype != $parent_libtype) || ($this->sess_usertype == 7 && $this->s1_parent_libtype == $parent_libtype)) ){
			redirect($this->base."admin/profile");die;
		}
	}
	
	function getMyBadges($userId='', $whereStr='')
	{
		$sql = "SELECT tb.id, COUNT(tml.qty_ordered) AS total_badge_purchased, st_badge_title, st_badge_description, st_badge_image, 
					in_industry_id, in_sector_id, in_trade_id, ta.total_badge_assigned, tml.st_libtype_bought
				FROM tbl_my_library AS tml 
				LEFT JOIN (SELECT library_id, st_libtype_assigned, owner_id, COUNT(id) AS total_badge_assigned 
						FROM tbl_assignments AS tas 
						WHERE owner_id='".$userId."' AND (tas.st_libtype_assigned='badge' OR tas.st_libtype_assigned='WAT_badge' OR tas.st_libtype_assigned='SAT_badge')
						GROUP BY library_id, owner_id, st_libtype_assigned) AS ta 
				ON tml.user_id = ta.owner_id AND tml.st_libtype_bought = ta.st_libtype_assigned AND tml.lib_id=ta.library_id
				LEFT JOIN tbl_badge AS tb ON tml.lib_id = tb.id AND tb.in_status=1
				WHERE tml.user_id = '".$userId."' AND (tml.st_libtype_bought='badge' OR tml.st_libtype_bought='WAT_badge' OR tml.st_libtype_bought='SAT_badge') ".$whereStr."
				GROUP BY tb.id";
        $query = $this->db->query($sql);
		// echo $sql;
		// Common::pr( $query->result_array() );
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	
	function getMyAssignedBadges($userId='', $whereStr='')
	{
		$sql = "SELECT tb.id, COUNT(tb.id) AS total_badge_assigned, st_badge_title, st_badge_description, 
					st_badge_image, in_industry_id, in_sector_id, in_trade_id, 
					tas.owner_id AS assigned_by, tas.st_libtype_assigned
				FROM tbl_assignments AS tas 
				RIGHT JOIN tbl_badge AS tb ON tb.id = tas.library_id AND tb.in_status=1
				WHERE tas.uid = '".$userId."' AND (st_libtype_assigned='badge' OR st_libtype_assigned='WAT_badge' OR st_libtype_assigned='SAT_badge') ".$whereStr."
				GROUP BY tb.id";
        $query = $this->db->query($sql);
		// echo $sql;
		// Common::pr( $query->result_array() );
		return !($query) ? $this->common->dberror() : $query->result_array();
	}
	
	function getBadgeProviderDetails( $badgeId='' )
	{
		$sql = "SELECT 
					(SELECT st_badge_title FROM tbl_badge WHERE id = in_badge_id) AS badge_title, 
					(SELECT st_badge_image FROM tbl_badge WHERE id = in_badge_id) AS badge_image, 
					st_badge_provider_name, 
					(SELECT st_badge_provider_type FROM tbl_badge_provider_types WHERE id = in_badge_provider_type_id) AS badge_provider_type, 
					st_badge_provider_location, st_instructor_name, dt_badge_attended
				FROM tbl_badge_provider_details AS tbpd
				WHERE tbpd.in_status = '1' AND tbpd.in_badge_id = '".$badgeId."'";
        $query = $this->db->query($sql);
		//echo $sql;
		//Common::pr( $query->result_array() );
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}

	// ADD/EDIT Consultant performed Information //
	function addConsultantPerformedLibrary($consultant_client_id='', $libSection='', $libId='', $libStatus='' )
	{
		if( isset($consultant_client_id) && (int)$consultant_client_id ) {
			$chk_libtool_consultant	= $this->users->getMetaDataList( 'librarytool_performed_by_consultant', 
									'in_client_id="'.$consultant_client_id.'" AND in_consultant_id="'.$this->sess_userid.'" 
								AND in_library_id = "'.$libId.'" AND st_library_section="'.$libSection.'"', '','id, dt_date_performed' );
			$sql_mode = sizeof($chk_libtool_consultant)>0 ? "UPDATE" : "INSERT";

			$arr_insupd = array( 'in_consultant_id' => $this->sess_userid, 'in_client_id' => $consultant_client_id, 'in_library_id' => $libId, 'st_library_section' => $libSection, 'st_library_perform_status' => $libStatus );
			
			if( "completed" == $libStatus && "UPDATE" == $sql_mode) {
				if( $_SERVER['SERVER_ADDR'] != "127.0.0.1" ) {
					date_default_timezone_set("America/New_York");
				}
				else {
					date_default_timezone_set("Asia/Kolkata");
				}
				$datetime_info 	= Common::getDatetimeDiff('1', date('Y-m-d h:i:s'), $chk_libtool_consultant[0]['dt_date_performed']);
				$hrs_spend 		= $datetime_info['hr'];
				$arr_insupd['in_hours_spend'] = $hrs_spend;
			}

			$arr_where = (sizeof($chk_libtool_consultant)>0) ? array('in_client_id'=>$consultant_client_id, 'in_consultant_id'=>$this->sess_userid, 'in_library_id' => $libId, 'st_library_section'=>$libSection) : array();
			$this->parentdb->manageDatabaseEntry( 'tbl_librarytool_performed_by_consultant', $sql_mode, $arr_insupd, $arr_where );
		}
	}

	function getConsultantOpenedLibrary($consultantId='', $clientId='', $libraryId='', $whereParams=array() )
	{
		$this->db->from('tbl_librarytool_performed_by_consultant AS tlib_consul');
		$this->db->select('tlib_consul.*', '"New" AS library_title');
		$this->db->where("tlib_consul.in_consultant_id", $consultantId);
		$this->db->where("tlib_consul.in_client_id", $clientId);
		$this->db->where("tlib_consul.st_library_perform_status", "completed");
		($libraryId) ? $this->db->where("tlib_consul.in_libary_id", $libraryId) : '';

		if( sizeof($whereParams) ) {
			($whereParams['summary_startdate']) ? $this->db->where("tlib_consul.dt_date_performed >=", $whereParams['summary_startdate']) : '';
			($whereParams['summary_enddate']) ? $this->db->where("tlib_consul.dt_date_performed <=", $whereParams['summary_enddate']) : '';
		}
		$sel_consultant_libs = $this->db->get();
		// common::pr( $sel_consultant_libs->result() );
		$rows_consultant_libs= (!$sel_consultant_libs) ? $this->common->dberror() : $sel_consultant_libs->result();

		return isset($rows_consultant_libs) ? $rows_consultant_libs : array();
	}

	function getQuizScore($page_id='', $paragraph_id='')
	{
		$questions = $this->libraries->getPageQuestionByParagraphPageID( $page_id, $paragraph_id );
		if( count($questions)>0 ) {
			$final_arr_quiz = array();
			$cnt_ques=0;
			foreach($questions as $question) {
				$ques_id= $question['question_id'];
				$page_id= $question['page_id'];
				$ques 	= $question['question'];
				$user_answer = isset($_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer']) 
								? $_SESSION['final_arr_quiz'][$page_id][$ques_id]['user_answer'] : 'na';
				$highlight_wrong_ans = ('1'!=$user_answer) ? 'bglightred' :'';
				$arr_quiz[$ques_id]['page_id'] 		= $question['page_id'];
				$arr_quiz[$ques_id]['question_id']	= $question['question_id'];
				$arr_quiz[$ques_id]['question'] 	= $ques;
				$choices = $this->libraries->getQuestionAnswers($ques_id);
				foreach( $choices as $ch ) {
					$answer_id 	= $ch['answer_id'];
					$answer 	= $ch['answer'];
					$choice 	= $ch['choice'];
					$sel_answer_id = isset($_SESSION['final_arr_quiz'][$page_id][$ques_id]['sel_answer_id']) 
									? $_SESSION['final_arr_quiz'][$page_id][$ques_id]['sel_answer_id']
									: '';
					$selected 	= ($sel_answer_id==$answer_id) ? 'checked="checked"' : '';
					$arr_quiz[$ques_id]['answer_id'] = $answer_id;
					($answer==1) ? $arr_quiz[$ques_id]['answer'] = $choice : '';
				}
				$cnt_ques++;
			}
			return $arr_quiz;
		}
	}
	
	function getCourseLocation($courseId='')
	{
		$this->db->from('tbl_library AS tlib');
		$this->db->select('tc.countryname, tp.provincename');
		$this->db->join('tbl_country AS tc', 'tlib.country_id=tc.id','LEFT');
		$this->db->join('tbl_province AS tp', 'tlib.province_id=tp.id','LEFT');
		$this->db->where('tlib.status', "1");
		$this->db->where('tlib.library_id',$courseId);
		$sel_course_locations = $this->db->get();

		$rows_course_locations= (!$sel_course_locations) ? $this->common->dberror() : $sel_course_locations->result();
		return $rows_course_locations;
	}
}?>