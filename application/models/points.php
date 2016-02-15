<?php
class Points extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	
// START - POINTS //	
		function hasUserGainedPointsGetPoints( $pointPageId='', $pointPageSectionId='', $checkPointsGained='' )
		{
			if( (int)$pointPageSectionId ) {
				$get_pagesection_points = "";
				$points_assign_to = $this->sess_userid;
				
				// Check user has gained points // 
					if( $checkPointsGained ) {
						$get_pagesection_points = $this->getPagePointsByUserID( $points_assign_to, $pointPageSectionId, $pointPageId );
						$get_pagesection_points	= isset($get_pagesection_points['points']) ? $get_pagesection_points['points'] : "";
						
					}
				// Get Points //
					$rows_points= $this->getPagePointsByPageID( $pointPageId, $pointPageSectionId );
					$points 	= isset($rows_points[0]['in_credits']) ? $rows_points[0]['in_credits'] : '';

				return array( "has_points_gained"=>$get_pagesection_points, "page_points"=>$points );
			}
			else {
				return array( "has_points_gained"=>"", "page_points"=>"" );
			}
		}

		function hasUserGotPointsOfPageSection($uid='', $pageSectionId='', $pageId='', $pageSubSectionId='')
		{
			$sql 		= "SELECT COUNT(in_pointpage_section_id) AS has_points 
							FROM tbl_points_of_users AS tpou 
							WHERE in_user_id='".$uid."'";
			(int)$pageId ? $sql .= " AND tpou.in_page_id = '".$pageId."'" : '';
			$pageSectionId ? $sql .= " AND tpou.in_pointpage_section_id = '".$pageSectionId."'" : '';
			$pageSubSectionId ? $sql .= " AND tpou.in_pointpage_subsection_id = '".$pageSubSectionId."'" : '';
			$sql 		.= " GROUP BY in_user_id";
			// echo $sql;
			$query 		= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				$rows_points = $query->row_array();
				return isset($rows_points) ? $rows_points : 0;
			}
		}

		function getPagePointsByUserID( $uid='', $pageSectionId='', $pageId='' )
		{
			$sql = "SELECT tpsec.st_pointpage_section_name, SUM(tupgpnt.in_credits*tupgpnt.in_noof_page_occurance) AS points 
					FROM tbl_points_of_users AS tupgpnt"; 

			if( $pageId == 5 ) { // 5 = fatality video //
				$sql .= " LEFT JOIN tbl_fatality_videos AS tfv 
							ON tupgpnt.in_pointpage_section_id=tfv.id AND tupgpnt.in_page_id='5' AND tfv.in_fatality_video_status='1'
						  LEFT JOIN tbl_point_page_sections AS tpsec 
							ON tupgpnt.in_pointpage_section_id=tfv.id)";
			}
			else {
				$sql .= " LEFT JOIN tbl_point_page_sections AS tpsec 
							ON tupgpnt.in_page_id = tpsec.in_page_id AND tupgpnt.in_pointpage_section_id=tpsec.in_pointpage_section_id AND tpsec.in_status='1'";
			}
			$sql .= " WHERE in_user_id='".$uid."'";
			(int)$pageId ? $sql .= " AND tupgpnt.in_page_id = '".$pageId."'" : '';
			$pageSectionId ? $sql .= " AND tupgpnt.in_pointpage_section_id = '".$pageSectionId."'" : '';
			$sql .= " GROUP BY in_user_id";
			// echo "<br>".$sql;
			
			$query 		= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				$rows_points = $query->row_array();
				// common::pr($rows_points);
				return isset($rows_points) ? $rows_points : 0;
			}
		}
		
		function addPointPage()
		{
			$page_name 			= $this->common->escapeStr($_POST['st_point_pagename']);
			$arr_ins_pointpage 	= array( 'st_point_pagename' => $page_name, 'in_status' => '1' );
			$new_page_id 		= $this->parentdb->manageDatabaseEntry( 'tbl_point_page', 'INSERT', $arr_ins_pointpage );

			foreach( $_POST['point_id'] as $idx => $point_id) {
				if( (isset($point_id)&&$point_id) && (int)$_POST['credits'][$idx] > 0 ) {
					$arr_ins_pointpage_sections = array( 'in_page_id' => $new_page_id, 'st_pointpage_section_name' => $point_id, 
														'in_credits' => (int)$_POST['credits'][$idx], 'in_status' => '1' );
					$this->parentdb->manageDatabaseEntry( 'tbl_point_page_sections', 'INSERT', $arr_ins_pointpage_sections );
				}
			}
			return true;
		}

		function updatePagePoints()
		{
			$pageID 	= $_POST['id'];
			$page_name 	= $this->common->escapeStr($_POST['st_point_pagename']);
			$arr_upd_pointpage 		= array('st_point_pagename' => $page_name);
			$arr_where_pointpage 	= array('id' => $pageID);
			$this->parentdb->manageDatabaseEntry( 'tbl_point_page', 'UPDATE', $arr_upd_pointpage, $arr_where_pointpage );

			foreach($_POST['point_id'] AS $key_points => $val_points ) {
				if( "new" == $key_points ) {
					foreach($val_points AS $key_new_points => $val_new_points ) {
						$new_credits = (int)$_POST['credits'][$key_points][$key_new_points];
						if( isset($val_new_points) && $val_new_points && $new_credits ) {
							$arr_ins_pointpagesections = array('st_pointpage_section_name' => $val_new_points, 'in_page_id' => $pageID, 'in_credits' => $new_credits, 'in_status' => 1);
							$this->parentdb->manageDatabaseEntry( 'tbl_point_page_sections', 'INSERT', $arr_ins_pointpagesections );
						}
					}
				}
				else {
					$updated_credits = (int)$_POST['credits'][$key_points];
					if( (isset($val_points) && $val_points) && $updated_credits > 0 ) {
						$arr_upd_pointpagesections = array('st_pointpage_section_name' => $val_points, 'in_credits' => $updated_credits, 
															'dt_updated_date' => date('Y-m-d h:i:s'), 'in_status' => 1);
						$arr_where_pointpagesections = array('in_pointpage_section_id' => $key_points);
						$this->parentdb->manageDatabaseEntry( 'tbl_point_page_sections', 'UPDATE', $arr_upd_pointpagesections, $arr_where_pointpagesections );
					}
				}
			}
			return true;
		}
		
		// Get points Level
			function getPointsLevel($points='', $limit='')
			{
				$where = ($points>=0 && strlen($points)) ? 'AND in_points_of_level<="'.$points.'"' : '';
				$rows_points_level 	= $this->users->getMetaDataList('points_level', 'in_status_of_level=1 '.$where.'', 'ORDER BY in_points_of_level DESC', 'in_level, in_points_of_level, in_lifetime', '', $limit);
				return isset($rows_points_level) ? $rows_points_level : array();
			}


		function updateUsersPointsWithLevelHistory( $updateHistory='', $userId='', $points='' )
		{
			if( (int)$userId && $this->sess_usertype>1) {
				// Update points in the tbl_users_points_level //
					$rows_users_points_level = $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$userId.'"', '', 
												'COUNT(in_total_points_gained) AS has_points, dt_points_level_expires');
					$has_user_gained_pts_level = (isset($rows_users_points_level)&&$rows_users_points_level[0]['has_points']) ? $rows_users_points_level[0]['has_points'] : '';

					if( !$has_user_gained_pts_level ) {
						$rows_points_level = $this->getPointsLevel($points,1);
						$level 		= isset($rows_points_level[0]['in_level']) ? $rows_points_level[0]['in_level'] : 0;
						$lifetime 	= isset($rows_points_level[0]['in_lifetime']) ? $rows_points_level[0]['in_lifetime'] : 60;

						$arr_insert['in_user_id'] 				= $userId;
						($points) ? $arr_insert['in_total_points_gained'] = $points : '';
						$arr_insert['in_points_level']			= $level;
						$arr_insert['in_lifetime_remains'] 	 	= $lifetime;
						$arr_insert['dt_points_level_expires']	= date( "Y-m-d h:i:s", strtotime("+60 days",time()) );

						$this->parentdb->manageDatabaseEntry( 'tbl_users_points_level', 'INSERT', $arr_insert );
					}
					else {
						$date_points_level_expires = isset($rows_users_points_level[0]['dt_points_level_expires']) ? $rows_users_points_level[0]['dt_points_level_expires'] : '';
						$rows_points_level = $this->getPointsLevel($points,1);
						$level 		= isset($rows_points_level[0]['in_level']) ? $rows_points_level[0]['in_level'] : 0;

						$arr_update['in_total_points_gained'] 	= $points;
						$arr_update['in_points_level'] 			= $level;

						$arr_update['in_lifetime_remains'] = ceil( (strtotime($date_points_level_expires)-strtotime(date('Y-m-d h:i:s')))/(60*60*24) );
						($arr_update['in_lifetime_remains']<=0) ? $arr_update['in_total_points_gained']=0 : ''; // RESET poins to 0 if lifetime expires //

						$arr_where = array("in_user_id" => $userId);
						$this->parentdb->manageDatabaseEntry( 'tbl_users_points_level', 'UPDATE', $arr_update, $arr_where );
					}

				if( '1' == $updateHistory ) {
					// Update points in the tbl_users_points_level History //
						// $this->users->getMetaDataList('users_points_level_history', 'in_user_id', '', 'in_total_points_gained');
				}
			}
		}
		
		function addPagePoints($userId='', $pointPageId='', $pointPageSectionId='', $pointPageSubSectionId='')
		{
			$this->db->delete('tbl_points_of_users', array('in_user_id'=>$userId, 'in_page_id'=>$pointPageId, 'in_pointpage_section_id'=>$pointPageSectionId));

			// Get Points from page sections table //
				$sql = "SELECT in_credits FROM tbl_point_page_sections
						WHERE (CASE WHEN ((SELECT COUNT(in_page_id) FROM `tbl_point_page_sections` WHERE in_page_id='".$pointPageId."')>1) THEN (in_page_id='".$pointPageId."' AND in_pointpage_section_id='".$pointPageSectionId."') ELSE in_page_id='".$pointPageId."' END)";
				$query = $this->db->query($sql);
				if(!$query) {
					return $this->common->dberror();
				}
				else {
					$rows_points = $query->row_array();
				}
				$points = isset($rows_points['in_credits']) ? $rows_points['in_credits'] : '';

			$arr_ins_pointpage_users = array( 'in_user_id'=>$userId, 'in_page_id'=>$pointPageId, 'in_pointpage_section_id'=>$pointPageSectionId, 
												'in_pointpage_subsection_id'=>$pointPageSubSectionId, 'in_credits'=>$points, 'in_noof_page_occurance'=>'1' );
			$this->parentdb->manageDatabaseEntry( 'tbl_points_of_users', 'INSERT', $arr_ins_pointpage_users );
			return true;
		}

		function updateNoofInstanceForNewProcedure( $userId='', $pointPageId='', $pointPageSectionId='', $pointPageSubSectionId='' )
		{
			$arr_upd_pointofusers 	= array( 'in_noof_page_occurance' => '1' );
			$arr_where_pointofusers	= array( 'in_user_id'=>$userId, 'in_page_id'=>$pointPageId, 
											'in_pointpage_section_id'=>$pointPageSectionId, 'in_pointpage_subsection_id'=>$pointPageSubSectionId );
			$this->parentdb->manageDatabaseEntry( 'tbl_points_of_users', 'UPDATE', $arr_upd_pointofusers, $arr_where_pointofusers );
		}

		function getPagePointsByPageID( $pid='', $pageSectionId='' )
		{
			$sql = "SELECT in_page_id, in_pointpage_section_id, st_pointpage_section_name, in_credits 
					FROM tbl_point_page_sections AS tpps
					RIGHT JOIN tbl_point_page AS tpp ON tpp.id=tpps.in_page_id AND tpp.in_status=1
					WHERE tpps.in_status=1";
			(int)$pid ? $sql .= " AND in_page_id='".$pid."'" : '';
			$pageSectionId ? $sql .= " AND in_pointpage_section_id='".$pageSectionId."'" : '';
			$sql .= " ORDER BY in_pointpage_section_id";
			$query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				$rows 	= $query->result_array();
				return (isset($rows) && sizeof($rows)) ? $query->result_array() : array();
			}
		}
		
		function getPagePointSummaryByPageID($pid='')
		{
			$sql = "SELECT COUNT(in_pointpage_section_id) AS points, SUM(in_credits) AS credits 
					FROM tbl_point_page_sections 
					WHERE in_page_id='".$pid."'";
			$query = $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->row_array();
		}
		
		function getReadingPointsByUserID($uID, $type)
		{
			/* if(in_array($type, array(9,11))) { // 9=Worker, 11=Student //
				$sql = "SELECT SUM(IF(owner_id is NULL, credits, credits/2)) AS points 
						FROM (SELECT th.*, owner_id 
							  FROM tbl_reading_history th 
							  LEFT JOIN tbl_assignments AS ta ON th.uid=ta.uid AND th.library_id=ta.library_id 
							  WHERE th.uid='".$uID."') AS reading_history, 
						tbl_library 
						WHERE reading_history.library_id=tbl_library.library_id AND uid='".$uID."' AND progress=100 
						GROUP BY uid";
			}
			else {
				$sql = "SELECT SUM(credits/2) as points 
						FROM tbl_reading_history th, tbl_assignments ta, tbl_library lib  
						WHERE th.library_id=ta.library_id AND th.uid=ta.uid AND th.library_id=lib.library_id AND owner_id='".$uID."' AND progress>=100 
						GROUP BY owner_id";
			}
			*/
			
			if( in_array($type, array(9,11)) ) { // 9=Worker, 11=Student //
				$sql = "SELECT SUM(IF(owner_id is NULL, credits, credits/2)) AS points 
						FROM (SELECT th.*, owner_id 
							  FROM tbl_reading_history th 
							  LEFT JOIN tbl_assignments AS ta ON th.uid=ta.uid AND th.library_id=ta.library_id 
							  WHERE th.uid='".$uID."') AS reading_history, 
						tbl_library 
						WHERE reading_history.library_id=tbl_library.library_id AND uid='".$uID."' AND progress=100 
						GROUP BY uid";
			}
			else {
				$sql = "SELECT SUM(credits/2) as points 
						FROM tbl_reading_history th, tbl_assignments ta, tbl_library lib  
						WHERE th.library_id=ta.library_id AND th.uid=ta.uid AND th.library_id=lib.library_id AND owner_id='".$uID."' AND progress>=100 
						GROUP BY owner_id";
			}
			
			// echo "<br>".$sql;
			$query 	= $this->db->query($sql);
			if(!$query) { 
				return $this->common->dberror();
			}
			else {
				$points = $query->row_array();
				// common::pr($points);die;

				return isset($points['points'])?$points['points']:0;
			}
		}
	// END - POINTS // 
	
	function getS1Credits($creditType='', $userId='')
	{
		$userId = (!$userId) ? $this->sess_userid : $userId;
		
		$rows_credits_purchased = $this->users->getMetaDataList('my_credits', 'in_user_id="'.$userId.'"', '', 'SUM(in_credits_purchased*in_qty_ordered) AS in_credits_purchased');
		$total_purchased 		= isset($rows_credits_purchased[0]['in_credits_purchased']) ? $rows_credits_purchased[0]['in_credits_purchased'] : '0';
		
		$rows_credits_buy = $this->users->getMetaDataList('my_library', 'user_id="'.$userId.'" AND transaction_type="s1credits"', 
												'', 'SUM(creditsbuy) AS creditsbuy');
		$total_bought 			= isset($rows_credits_buy[0]['creditsbuy']) ? $rows_credits_buy[0]['creditsbuy'] : '0';
		
		$rows_credits_assigned 	= $this->users->getMetaDataList('credits_assign', 'in_credits_assign_to="'.$userId.'" AND st_credits_assign_status="assigned"', 
												'', 'SUM(in_credits_assigned) AS credits_assigned', 'in_credits_assign_to');
		$total_assigned 		= isset($rows_credits_assigned[0]['credits_assigned']) ? $rows_credits_assigned[0]['credits_assigned'] : '0';

		$rows_useremail 		= $this->users->getUserByID($userId,'email_addr');
		$useremail 				= isset($rows_useremail['email_addr']) ? $rows_useremail['email_addr'] : '0';
		
		$rows_reqcredits_approved = $this->users->getMetaDataList('credits_requests', 'st_credits_requested_by="'.$useremail.'" AND  st_credits_request_status="approved"', '', 'SUM(in_credits_requested) AS credits_requested', 'st_credits_requested_by');
		$total_approved 			= isset($rows_reqcredits_approved[0]['credits_requested']) ? $rows_reqcredits_approved[0]['credits_requested'] : '0';
		
		switch ($creditType) {
			case 'purchased': {
				return $total_purchased;
				break;
			}
			case 'bought': {
				return $total_bought;
				break;
			}
			case 'assgined': {
				return $total_assigned;
				break;
			}
			case 'requested': {
				return $total_approved;
				break;
			}
			default:{
				return (($total_purchased-$total_bought)+$total_assigned+$total_approved);
				break;
			}
		}
	}
	
	function getS1Points($userId='', $userTypeId='')
	{
		$points_page= 0;
		$userid 	= (!$userId) ? $this->sess_userid : $userId;

		// Get points of reading of the Library Page Contents //
			$points_reading = $this->getReadingPointsByUserID( $userid, $userTypeId );

		if( in_array($userTypeId, array(8,9,11)) ) { // 8=Employer, 9=Worker, 11=Student //
			$points_page = $this->getPagePointsByUserID( $userid );							
			$points_page = isset($points_page['points']) ? $points_page['points'] : 0;
		}
		
		$points = number_format( ((int)$points_reading+(int)$points_page), 0, '.', '');
		return $points;
	}
	
	function getHighestS1Points()
	{
		$rows_user_purchase = $this->users->getUserPurchase();
		$arr_highest_points['points'] = $arr_highest_points['userid'] = '';

		foreach($rows_user_purchase AS $val_user_purchase) {
			$userid 		= $val_user_purchase['userid'];
			$type_id 		= $val_user_purchase['type_id'];						
			$total_points 	= $this->points->getS1Points($userid, $type_id);
			if( $total_points > $arr_highest_points['points'] ) {
				$arr_highest_points['points'] = $total_points;
				$arr_highest_points['userid'] = $userid;
			}
		}
		if( (int)$arr_highest_points['userid'] ) {
			$rows_username 					= $this->users->getUserByID($arr_highest_points['userid'], 'CONCAT(firstname, " ", lastname) AS username');
			$arr_highest_points['username'] = isset($rows_username['username']) ? $rows_username['username'] : '';
		}
		return $arr_highest_points;
	}
	
	function getHighestS1Credits()
	{
		$rows_user_purchase = $this->users->getUserPurchase();
		$arr_highest_credits['credits'] = $arr_highest_credits['userid'] = '';

		foreach($rows_user_purchase AS $val_user_purchase) {
			$userid 		= $val_user_purchase['userid'];
			$total_available_credits= $this->points->getS1Credits('',$userid);
			
			if( $total_available_credits > $arr_highest_credits['credits'] ) {
				$arr_highest_credits['credits'] = $total_available_credits;
				$arr_highest_credits['userid'] = $userid;
			}
		}
		if( (int)$arr_highest_credits['userid'] ) {
			$rows_username 					= $this->users->getUserByID($arr_highest_credits['userid'], 'CONCAT(firstname, " ", lastname) AS username');
			$arr_highest_credits['username'] = isset($rows_username['username']) ? $rows_username['username'] : '';
		}
		return $arr_highest_credits;
	}

	function getQuizAnswersRatio($userId='', $quizSectionId='', $quizSection='')
	{
		if( 'instructor_library' == $quizSection ) {
			$quiz_correct_answered = $this->users->getMetaDataList('quiz_master','in_quiz_performed_by="'.$userId.'" 
											AND st_quiz_section_name = "'.$quizSection.'" 
											AND in_quiz_section_id="'.$quizSectionId.'" AND is_answer_correct=1', '', 
											'COUNT(in_user_quiz_id) AS total_correct_answered');
			// common::pr($quiz_correct_answered);
			$quiz_correct_answered = isset($quiz_correct_answered[0]['total_correct_answered']) ? $quiz_correct_answered[0]['total_correct_answered'] : '';
			
			$total_questions = $this->users->getMetaDataList('page_questions', 'library_id="'.$quizSectionId.'"', '', 'COUNT(question_id) AS total_questions');
			$total_questions = isset($total_questions[0]['total_questions']) ? $total_questions[0]['total_questions'] : '';
			
			$score = round( ($quiz_correct_answered/$total_questions)*100 ) ;
		}
		else {
			// // 
		}
		return $score;
	}
}?>
