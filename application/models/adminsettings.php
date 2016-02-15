
<?php
class Adminsettings extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('upload');
	}

	// Add User Procedures //
		function addUserProcedures( $arrProcedures=array() )
		{
			if( sizeof($arrProcedures) ) {
				$arr_ins_userproc = array( 'st_procedure_name' => $arrProcedures['title'], 'in_created_by' => $arrProcedures['userid'], 
											'dt_date_end' => 'DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 YEAR)', 'st_procedure_status'	=> $arrProcedures['procedure_status'],
											'status' => $arrProcedures['status'] );
				// common::pr($arr_ins_userproc);die;

				return $this->parentdb->manageDatabaseEntry('tbl_procedures', 'INSERT', $arr_ins_userproc);
			}
		}

	function getHazardAlerts( $userId='', $paged='', $limit='', $postWhereArr=array() )
	{
		$this->db->from('tbl_alerts AS ta');
		$this->db->select('ta.id, st_title, st_summary, st_locations, st_legal_requirements, st_precautions, st_images, st_video, dt_hazard_alert_created,
							in_alert_sent_by, st_users_alerted, dt_date_created, 
							(CASE WHEN tu.firstname!="" THEN tu.firstname ELSE tadm.firstname END) AS firstname,
							(CASE WHEN tu.lastname!="" THEN tu.lastname ELSE tadm.lastname END) AS lastname,
							(CASE WHEN tu.nickname!="" THEN tu.nickname ELSE tadm.nickname END) AS nickname,
							(CASE WHEN tu.email_addr!="" THEN tu.email_addr ELSE tadm.email_addr END) AS email_addr,
							(CASE WHEN tu.type_id!="" THEN tu.type_id ELSE tadm.type_id END) AS type_id,
							(CASE WHEN tu.profile_image!="" THEN tu.profile_image ELSE tadm.profile_image END) AS profile_image');
		$this->db->join('tbl_alerts_criteria_users AS tacu','ta.id=tacu.in_alert_id AND tacu.in_status=1','LEFT');
		$this->db->join('tbl_user AS tu','tacu.in_alert_sent_by=tu.id AND tu.status=1', 'LEFT');
		$this->db->join('tbl_administrator AS tadm','tacu.in_alert_sent_by=tadm.id AND tadm.status=1', 'LEFT');

		isset($postWhereArr['alert_title']) ? $this->db->like('st_title', $postWhereArr['alert_title']) : '';
		
		if( isset($postWhereArr['alert_sender']) ) {
			$this->db->where('(
								(tu.firstname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tu.lastname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tu.nickname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tu.email_addr LIKE "%'.$postWhereArr['alert_sender'].'%"
								)
								OR
								(tadm.firstname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tadm.lastname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tadm.nickname LIKE "%'.$postWhereArr['alert_sender'].'%" OR tadm.email_addr LIKE "%'.$postWhereArr['alert_sender'].'%"
								)
							  )');
		}

		if( isset($postWhereArr['alert_sendby_usertype']) ) {
			$this->db->where('(tu.type_id="'.$postWhereArr['alert_sendby_usertype'].'" OR tadm.type_id="'.$postWhereArr['alert_sendby_usertype'].'")');
		}
		if( isset($postWhereArr['from_created_date'])) {
			$this->db->where('dt_hazard_alert_created >=', $postWhereArr['from_created_date']);
			isset($postWhereArr['to_created_date']) ? $this->db->where('dt_hazard_alert_created <=', $postWhereArr['to_created_date']) : '';
		}
		
		$this->db->where("ta.in_status", 1);
		$this->db->order_by("ta.dt_hazard_alert_created", "DESC");

		($limit) ? $this->db->limit($limit, $paged*$limit) : '';

		$sel_alerts = $this->db->get();
		$rows_alerts= (!$sel_alerts) ? $this->common->dberror() : $sel_alerts->result();

		// common::pr($rows_alerts);die;

		$users_alerts = array();
		if( (int)$userId ) {
			foreach( $rows_alerts AS $val_alert ) {
				// Check if alerts has been read by this user //
					$alert_id			= (isset($val_alert->id)&&$val_alert->id) ? $val_alert->id : '';
					$has_selected_byuser= $this->points->hasUserGotPointsOfPageSection( $this->sess_userid, $alert_id, 12);
					$has_selected_byuser= isset($has_selected_byuser['has_points']) ? $has_selected_byuser['has_points'] : "";
					if( $has_selected_byuser && $this->input->post('chk_alerts_unread') ) {
						continue;
					}
						
				$users_alerted = (isset($val_alert->st_users_alerted) && $val_alert->st_users_alerted) ? json_decode($val_alert->st_users_alerted) : array();
				if( in_array($this->sess_userid, $users_alerted) ) {
					$alert_sentby_firstname			= isset($val_alert->firstname) ? $val_alert->firstname : '';
					$alert_sentby_lastname			= isset($val_alert->lastname) ? $val_alert->lastname : '';					
					$val_alert->username_alert_sentby = $alert_sentby_firstname." ".$alert_sentby_lastname;
					
					$alert_sentby_usertype_id 		= isset($val_alert->type_id) ? $val_alert->type_id : '';
					$val_alert->alert_sentby_image	= isset($val_alert->profile_image) ? $val_alert->profile_image : '';
					
					$usertype_alert_sentby 			= $this->users->getMetaDataList('usertype', 'id="'.$alert_sentby_usertype_id.'"', '', 'typename');
					$usertype_alert_sentby 			= isset($usertype_alert_sentby[0]['typename']) ? $usertype_alert_sentby[0]['typename'] : '';
					$val_alert->usertype_alert_sentby = $usertype_alert_sentby;

					$users_alerts[] 				= $val_alert;
				}
			}
		}
		else {
			$users_alerts = $rows_alerts;
		}
		// Common::pr($users_alerts);die;
		
		return (!$sel_alerts) ? $this->common->dberror() : $users_alerts;
	}
	
	function addIndustry()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_industry = array('industryname' => $industryname, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		return $this->parentdb->manageDatabaseEntry('tbl_industry', 'INSERT', $arr_ins_industry);
    }   

    function addSector()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_sector = array('industry_id' => $industry_id, 'sectionname' => $sectionname, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		return $this->parentdb->manageDatabaseEntry('tbl_section', 'INSERT', $arr_ins_sector);
    }

    function addTrade()
	{
        foreach($_POST as $key=>$value) {
            if(!is_array($value)) {
                $$key = $this->common->escapeStr($value);
			}
		}
		$arr_ins_trade 	= array('tradename' => $tradename, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		$new_trade_id 	= $this->parentdb->manageDatabaseEntry('tbl_trade', 'INSERT', $arr_ins_trade);
		
        if( strtoupper($section_label)!='ALL' ) {
            foreach( $_POST['section_id'] as $sid ) {
				$arr_ins_section2trade 	= array( 'industry_id' => $industry_id, 'section_id' => $sid, 'trade_id' => $new_trade_id );
				$this->parentdb->manageDatabaseEntry( 'tbl_section2trade', 'INSERT', $arr_ins_section2trade );
            }
        }
		else {
			$arr_ins_section2trade 	= array( 'industry_id' => $industry_id, 'section_id' => '0', 'trade_id' => $new_trade_id );
			$this->parentdb->manageDatabaseEntry( 'tbl_section2trade', 'INSERT', $arr_ins_section2trade );
        }
        return true;
    }  
    
    function addCountry()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_country = array( 'countryname' => $countryname, 'abbreviation' => $abbreviation, 'date_start' => $startdate, 'date_end' => $enddate );
		return $this->parentdb->manageDatabaseEntry( 'tbl_country', 'INSERT', $arr_ins_country );
    }

    function addProvince()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
        $rate = (float)$rate;
		$arr_ins_province = array( 'country_id' => $country_id, 'provincename' => $provincename, 'abbreviation' => $abbreviation, 
									'tax_abbr' => $tax_abbr, 'rate' => $rate, 'date_start' => $startdate, 'date_end' => $enddate );
		return $this->parentdb->manageDatabaseEntry( 'tbl_province', 'INSERT', $arr_ins_province );
    } 
    
    function addCity()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_city = array( 'country_id' => $country_id, 'province_id' => $province_id, 'cityname' => $cityname, 'date_start' => $startdate, 'date_end' => $enddate );
		return $this->parentdb->manageDatabaseEntry( 'tbl_city', 'INSERT', $arr_ins_city );
    }
	
	function updateIndustry()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_industry 	= array('industryname' => $industryname, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		$arr_where_industry = array('id' => $id);
		return $this->parentdb->manageDatabaseEntry('tbl_industry', 'UPDATE', $arr_upd_industry, $arr_where_industry);
    }

    function updateSector()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_sector 	= array( 'industry_id' => $industry_id, 'sectionname'=>$sectionname, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		$arr_where_sector	= array('id' => $id);
		return $this->parentdb->manageDatabaseEntry('tbl_section', 'UPDATE', $arr_upd_sector, $arr_where_sector);
    }

    function updateTrade()
	{
        foreach($_POST as $key=>$value) {
            if(!is_array($value)) {
                $$key = $this->common->escapeStr($value);
			}
		}
		$arr_upd_trade 	= array( 'tradename' => $tradename, 'description' => nl2br($desc), 'date_start' => $startdate, 'date_end' => $enddate);
		$arr_where_trade= array('id' => $id);
		$this->parentdb->manageDatabaseEntry( 'tbl_trade', 'UPDATE', $arr_upd_trade, $arr_where_trade );
        
		$this->db->delete('tbl_section2trade', array('trade_id'=>$id));

        foreach($_POST['section_id'] as $sid) {
			$arr_ins_section2trade = array( 'industry_id' => $industry_id, 'section_id' => $sid, 'trade_id' => $id);
			$this->parentdb->manageDatabaseEntry( 'tbl_section2trade', 'INSERT', $arr_ins_section2trade );
        }
  		return true;        
    }
    
    function validateTrade($industry_id, $section_id, $trade){
        $sql = "SELECT trade_id FROM tbl_trade, tbl_section2trade 
				WHERE tbl_trade.id=tbl_section2trade.trade_id AND industry_id=$industry_id AND (section_id=$section_id OR section_id=0) AND tradename LIKE '$trade'";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
    
    function validateTradeUpdate($trade_id, $industry_id, $section_id, $trade){
        $sql = "SELECT trade_id FROM tbl_trade, tbl_section2trade 
                WHERE trade_id!=$trade_id AND tbl_trade.id=tbl_section2trade.trade_id AND industry_id=$industry_id AND (section_id=$section_id OR section_id=0) AND tradename LIKE '$trade'";
        $query = $this->db->query($sql);
        return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
    
    function updateCountry()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_country 	= array( 'countryname' => $countryname, 'abbreviation' => $abbreviation, 'date_start' => $startdate, 'date_end' => $enddate );
		$arr_where_country	= array('id' => $id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_country', 'UPDATE', $arr_upd_country, $arr_where_country );
    } 
    
    function updateProvince()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
        $rate = (float)$rate;
		$arr_upd_province 	= array( 'country_id' => $country_id, 'provincename' => $provincename, 'abbreviation' => $abbreviation, 
									'tax_abbr' => $tax_abbr, 'rate' => $rate, 'date_start' => $startdate, 'date_end' => $enddate );
		$arr_where_province	= array('id' => $id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_province', 'UPDATE', $arr_upd_province, $arr_where_province );
    }
    
    function updateCity()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_city 	= array( 'country_id' => $country_id, 'province_id' => $province_id, 'cityname' => $cityname, 'date_start' => $startdate, 'date_end' => $enddate );
		$arr_where_city	= array('id' => $id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_city', 'UPDATE', $arr_upd_city, $arr_where_city );
    }

	function getSectorListByIndustries($industries, $term){
        $industries = trim($industries);
        $term = $this->common->escapeStr($term);
        if(strtoupper($industries) != 'ALL'){
            $inds = explode(",", $industries);
            $tmp = array();
            foreach($inds as $in){
                $in = trim($in);
                (!empty($in)) ? array_push($tmp, "'".$this->common->escapeStr($in)."'") : '';
            }
            $str_industries = implode(",", $tmp);
            $sql = "SELECT DISTINCT sectionname, tbl_section.id FROM tbl_section, tbl_industry 
                    WHERE tbl_section.industry_id=tbl_industry.id AND industryname in ($str_industries) AND sectionname LIKE '%$term%'";            
        }else
            $sql = "SELECT DISTINCT sectionname, tbl_section.id FROM tbl_section, tbl_industry 
                    WHERE tbl_section.industry_id=tbl_industry.id AND sectionname LIKE '%$term%'";  

        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function getTradeListBySectors($industry, $sectors, $term)
	{
        $sectors= trim($sectors);
        $term 	= $this->common->escapeStr($term);
        if(strtoupper($sectors) != 'ALL'){
            $inds 	= explode(",", $sectors);
            $tmp 	= array();
            foreach($inds as $in){
                $in = trim($in);
                (!empty($in)) ? array_push($tmp, "'".$this->common->escapeStr($in)."'") : '';
            }
            $str_sectors = implode(",", $tmp);
            $sql = "SELECT DISTINCT tradename FROM tbl_section2trade_view WHERE (sectionname in ($str_sectors) OR section_id=0) AND tradename LIKE '%$term%'";
        }
		else{
            $sql = "SELECT DISTINCT tradename FROM tbl_section2trade_view WHERE tradename LIKE '%$term%'";
			
            if(strtoupper($industry)!="ALL"){
                $inds = explode(",", $industry);
                $tmp = array();
                foreach($inds as $in) {
                    $in = trim($in);
                    (!empty($in)) ? array_push($tmp, "'".$this->common->escapeStr($in)."'") : '';
                }
                $str_industries = implode(",", $tmp);
                $sql = "SELECT DISTINCT tradename FROM tbl_section2trade_view WHERE tradename LIKE '%$term%' AND industryname in ($str_industries)";
            }
        }
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
	function searchSectorsDataList(){
        if(!empty($_POST['industry_id'])) {
            $sql = "SELECT * FROM tbl_section WHERE industry_id={$_POST['industry_id']} AND sectionname LIKE '%".$this->common->escapeStr($_POST['sector'])."%'";
		}
        else {
            $sql = "SELECT * FROM tbl_section WHERE sectionname LIKE '%".$this->common->escapeStr($_POST['sector'])."%'";
		}
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }    
    
    function searchTradeDataList(){
        $sql = "SELECT * FROM tbl_trade_view WHERE tradename LIKE '%".$this->common->escapeStr($_POST['trade'])."%'";
        if(!empty($_POST['industry_id']))
            $sql .= " AND industry_id={$_POST['industry_id']}";
        if(!empty($_POST['section_id'])){
            $sector = $this->users->getElementByID('tbl_section', $_POST['section_id']);
            $sql .= " AND (sections LIKE '%{$sector['sectionname']}%' OR section_id=0)";
        }
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }    
    
    function searchCityDataList()
	{
        $sql = "SELECT * FROM tbl_city WHERE cityname LIKE '%".$this->common->escapeStr($_POST['city'])."%'";
        (!empty($_POST['country_id'])) ? $sql .= "AND country_id={$_POST['country_id']}" : '';
        (!empty($_POST['province_id'])) ? $sql .= " AND province_id={$_POST['province_id']}" : '';

        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    } 

    function searchProvinceDataList()
	{
        if(!empty($_POST['country_id'])) {
            $sql = "SELECT * FROM tbl_province WHERE country_id={$_POST['country_id']} AND provincename LIKE '%".$this->common->escapeStr($_POST['province'])."%'";
		}
        else {
            $sql = "SELECT * FROM tbl_province WHERE provincename LIKE '%".$this->common->escapeStr($_POST['province'])."%'";
		}
        $query = $this->db->query($sql);
        return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
	function getTaxRateByProvinceID($cid, $pid)
	{
        $sql 	= "SELECT * FROM tbl_tax WHERE country_id=$cid AND province_id=$pid LIMIT 1";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->row_array();
    }
}