<?php 
class Users extends CI_Model
{
	function __construct()	{
		parent::__construct();
		$this->load->library('common');
		$this->is_user_before_new_launch = 1;
	}

    function addAdministrator($attach){
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_admin = array( 'firstname'=>$firstname, 'lastname'=>$lastname, 'email_addr'=>$email, 'nickname'=>$nickname, 'password'=>md5($password), 
								'profile_image'=>$attach, 'date_start'=>$startdate, 'date_end'=>$enddate );
		return $this->parentdb->manageDatabaseEntry( 'tbl_administrator', 'INSERT', $arr_ins_admin );
    }
	
	function userProfileImageUpload($input_name='', $targetPath='', $imageLabel='')
	{
		!($input_name) ? $input_name = 'userfile' : '' ;
		!($targetPath) ? $targetPath = $this->path_upload_profiles : '' ;
		!($imageLabel) ? $imageLabel = "profile".$this->sess_userid : '' ;
		
		$files = $_FILES;
		$this->load->library('upload');
        if( isset($_FILES[$input_name]['size']) && $_FILES[$input_name]['size'] > 0 ) {
			$ext_image	= $this->common->getImagePathInfo( $this->common->escapeStr($_FILES[$input_name]['name']),'extension' );
			$image_name	= $imageLabel.".".$ext_image;

			// Delete user image physically //
				if( $current_primg = glob(FCPATH.$targetPath.$imageLabel.".*") ) {
					$arr_current_primg = explode("/", $current_primg[0]);
					$sizeof_current_primg = sizeof($arr_current_primg);
					isset($arr_current_primg[$sizeof_current_primg-1]) ? unlink( FCPATH.$targetPath.$arr_current_primg[$sizeof_current_primg-1] ) : '';
				}
			$this->upload->initialize( $this->common->setUploadOptions($targetPath, $image_name) );
			(!$this->upload->do_upload()) ? $upload_error = $this->upload->display_errors("<span class='error'>", "</span>") : '';		
			return $files;
        }
		else {
            return false;
        }
    }

	function updateUserLogin( $email='' )
	{
		$noof_userlogin = $this->users->getMetaDataList('user', 'email_addr="'.$email.'"', '', '(in_noof_login+1) AS in_noof_login');
		$noof_userlogin = (isset($noof_userlogin[0]['in_noof_login'])) ? $noof_userlogin[0]['in_noof_login'] : '1';
		
		$arr_upd_user 	= array( 'in_noof_login'=>$noof_userlogin );
		$arr_where_user	= array( 'email_addr'=>$email );
		$this->parentdb->manageDatabaseEntry( 'tbl_user', 'UPDATE', $arr_upd_user, $arr_where_user );

		$rows = $this->getMetaDataList("user", "email_addr='".$email."'", '', 'in_noof_login');
        return (isset($rows[0]['in_noof_login'])) ? $rows[0]['in_noof_login'] : '';
    }

    function addUser()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_ins_user = array( 'firstname'=>$firstname, 'lastname'=>$lastname, 'email_addr'=>$email, 'nickname'=>$nickname, 'password'=>md5($password), 
								'industry_id'=>$industry_id, 'type_id'=>$type_id, 'is_user_before_newlaunch'=>$this->is_user_before_new_launch );
		$userid = $this->parentdb->manageDatabaseEntry( 'tbl_user', 'INSERT', $arr_ins_user );
		
		if( "8" == $type_id ) { // 8=Employer //
			$this->add_user_meta($userid, 'company_name', $companyname );
			$this->add_user_meta($userid, 'company_full_address', $companyfulladdress );
		}
		return $userid;
    }

    function addUserType()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}

		$arr_ins_usertype = array( 'typename'=>$usertypename, 'date_start'=>$startdate, 'date_end'=>$enddate );
		$id = $this->parentdb->manageDatabaseEntry( 'tbl_usertype', 'INSERT', $arr_ins_usertype );
		
        $allowances = $this->getMetaDataList('function_allowances');
        $sql 		= "INSERT INTO tbl_usertypeallowance (usertype_id, allowance_id, allowance) VALUES ";
        $values 	= array();
        $allowance 	= (strtoupper($usertypename)=="SYSTEM ADMINISTRATOR")?1:0;
        foreach( $allowances as $al ){
            $values[] = "($id, {$al['id']}, $allowance)";
        }
        $sql .= implode(", ", $values);
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query;
    }
    
    function getElementByID( $table, $id, $fields='' )
	{
		$fields = ($fields) ? $fields : '*';
        if( $table != 'tbl_usertypeallowance' ) {
			if( $table != "tbl_trade" ) {
				$sql = "SELECT ".$fields." FROM $table WHERE id = '".$id."' LIMIT 1;";
			}
			else {
				$sql = "SELECT ".$fields." FROM tbl_trade_view WHERE trade_id = '".$id."' LIMIT 1;";
			}
			$query = $this->db->query($sql);
			
			if(!$query) {
				$this->common->dberror();
			}
			else {
				$result = $query->row_array();
				return (isset($result) && is_array($result)) ? $result : array();
			}
        }
		else {
           return $this->getMetaDataList('functions');
        }
    }
    
    function getFunctionAllowanceByUserTypeID($fid, $id){
        $sql = "SELECT tu.* , function_id, allowance_name, function_name 
                FROM tbl_usertypeallowance tu 
                    LEFT JOIN (SELECT tfa.* , function_name 
                               FROM tbl_function_allowances tfa 
                                    LEFT JOIN tbl_functions tf ON tfa.function_id=tf.id
                    ) AS fa 
                    ON tu.allowance_id=fa.id 
                WHERE function_id=$fid AND tu.usertype_id=$id";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function updateAdministrator($attach)
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_admin 		= array( 'firstname'=>$firstname, 'lastname'=>$lastname, 'nickname'=>$nickname, 'date_start'=>$startdate, 'date_end'=>$enddate );
		(!empty($password)) ? $arr_upd_admin['password'] = md5($password) : '';
		
		$ext_profileimg	 	= $this->common->getImagePathInfo( $this->common->escapeStr($attach),'extension' );
		$full_profileimage 	= "profile".$userid.".".$ext_profileimg;
		(!empty($attach)) ? $arr_upd_admin['profile_image'] = $full_profileimage : '';

		// common::pr($arr_upd_admin);die;

		$arr_where_admin	= array( 'id'=>$userid );
		$this->parentdb->manageDatabaseEntry( 'tbl_administrator', 'UPDATE', $arr_upd_admin, $arr_where_admin );
    }   
    
    function updateUserBasicInfoByID($userid='', $img='')
	{
        $type = $this->getElementByID('tbl_usertype', $this->session->userdata("usertype"));
		
		$arr_upd_user = array();
        if($type['typename'] != "Employer") {
			isset($_POST['firstname']) ? $arr_upd_user['firstname'] = $this->common->escapeStr($_POST['firstname']) : '';
			isset($_POST['lastname']) ? $arr_upd_user['lastname'] = $this->common->escapeStr($_POST['lastname']) : '';
			isset($_POST['nickname']) ? $arr_upd_user['nickname'] = $this->common->escapeStr($_POST['nickname']) : '';
        }
		
		( isset($_POST['txt_current_password'])&&trim($_POST['txt_current_password']) ) ? $arr_upd_user['password'] = $this->common->escapeStr( md5($_POST['txt_current_password']) ) : '';

		$ext_profileimg	 	= $this->common->getImagePathInfo( $this->common->escapeStr($img),'extension' );
		$full_profileimage 	= "profile".$userid.".".$ext_profileimg;
		(!empty($img)) ? $arr_upd_user['profile_image'] = $full_profileimage : '';
		// common::pr($arr_upd_user);die;

		if( isset($arr_upd_user) && sizeof($arr_upd_user) ) {
			$arr_where_user	= array( 'id'=>$userid );
			$this->parentdb->manageDatabaseEntry( 'tbl_user', 'UPDATE', $arr_upd_user, $arr_where_user );
		}	
  		return 1;          
    }
	
	function updateUserDetails( $arrUpdate='', $arrWhere='' )
	{
		$sizeof_update = sizeof( $arrUpdate );
		if( $sizeof_update && is_array($arrUpdate) ) {
			$cnt_update = 0;

			$sql = "UPDATE tbl_user SET ";
			foreach( $arrUpdate AS $key_update => $val_update ) {
				$sql .= $key_update.'="'.$val_update.'"';
				$sql .= ($cnt_update+1)<$sizeof_update ? ", " : '';
				$cnt_update++;
			}
		}

		$sizeof_where = sizeof( $arrWhere );
		if( $sizeof_where && is_array($arrWhere) ) {
			$cnt_where = 0;
			
			$sql .= " WHERE ";
			foreach( $arrWhere AS $key_where => $val_where ) {
				$sql .= $key_where.'='.$val_where;
				$sql .= ($cnt_where+1)<$sizeof_where ? " AND " : '';
				$cnt_where++;
			}
		}
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : true;
	}

    function updateUserType()
	{
        foreach($_POST as $key=>$value) {
            $$key = $this->common->escapeStr($value);
		}
		$arr_upd_usertype 	= array( 'typename'=>$usertypename, 'date_start'=>$startdate, 'date_end'=>$enddate );
		$arr_where_usertype = array('id'=>$id);
		return $this->parentdb->manageDatabaseEntry( 'tbl_usertype', 'UPDATE', $arr_upd_usertype, $arr_where_usertype );
    }

    function updateUserTypeAllowance()
	{
        foreach($_POST['allowance'] as $id=>$value){
			$arr_upd_usertypeallowance 	 = array( 'allowance'=>$value );
			$arr_where_usertypeallowance = array( 'id'=>$id );
			$this->parentdb->manageDatabaseEntry( 'tbl_usertypeallowance', 'UPDATE', $arr_upd_usertypeallowance, $arr_where_usertypeallowance, '1' );
        }
    }

    function getMetaDataList($type, $where="1", $orderBy="", $select='*', $groupBy='', $limit='')
	{
        ($type=='trade') ? $type = "trade_view" : '';
        $sql 	= "SELECT ".$select." FROM tbl_$type WHERE ".$where;
		($groupBy) ? $sql .=  " GROUP BY ".$groupBy : '';
		$sql 	.= " ".$orderBy;
		($limit) ? $sql .= " LIMIT ".$limit."" : '';
		// echo "<br>".$sql;
		
  		$query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$result = $query->result_array();
			return (isset($result) && is_array($result)) ? $result : array();
		}
    }
	function getMetaDataListMarcio($library)
	{    
        $sql = "SELECT a.pn, a.page_id, b.page_id, b.paragraph_description"; 
		$sql .= " FROM tbl_library_pages a, tbl_library_paragraph b"; 
		$sql .= " WHERE a.library_id=b.library_id and"; 
		$sql .= " a.page_id = b.page_id and"; 
		$sql .= " a.library_id=".$library; 
		$sql .= " ORDER BY a.pn ASC";
		$sql .= " LIMIT 0,4";		
	 //echo $sql;
		
  		$query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$result = $query->result_array();
			return (isset($result) && is_array($result)) ? $result : array();
		}
    }

    function searchMetaDataList($type, $field, $value)
	{
        if($field!='status') {
            $sql = "SELECT * FROM tbl_$type WHERE $field LIKE '%$value%'";
		}
        else if(strtoupper($value)=="ACTIVE") {
            $sql = "SELECT * FROM tbl_$type WHERE date_start<=CURDATE() AND (date_end='' OR date_end>=CURDATE())";
		}
        else {
            $sql = "SELECT * FROM tbl_$type WHERE NOT(date_start<=CURDATE() AND (date_end='' OR date_end>=CURDATE()))";
		}
  		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function validateMetaData($table, $field, $value, $where='')
	{
        if( !empty($value) ) {
            $value 	= $this->common->escapeStr($value);
            $sql 	= "SELECT id FROM $table WHERE $field = '$value'";
			($where) ? $sql .= " AND ".$where : '';
			$sql 	.= " LIMIT 1";
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
    
    function duplicateCheck($id, $type, $field)
	{
        if($type!='city') {
            $sql = "SELECT id FROM tbl_$type WHERE id!='".$id."' AND $field='".$this->common->escapeStr($_POST[$type.'name'])."'";
		}
        else {
            $sql = "SELECT id FROM tbl_city WHERE id!='".$id."' AND country_id='{$_POST['country_id']}' AND province_id='{$_POST['province_id']}' AND cityname='".$this->common->escapeStr($_POST[$type.'name'])."'";
		}
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
    
    function validateMetaDataRelated($table, $field, $value, $field_related, $value_related)
	{
        if(!empty($value) && !empty($value_related)){
            $value = $this->common->escapeStr($value);
            $value_related = $this->common->escapeStr($value_related);
            $sql 	= "SELECT id FROM $table WHERE $field = '$value' AND $field_related='$value_related' LIMIT 1;";
            $query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows() > 0) ? 'false' : 'true';
			}
        }
		else{
            return 'true';
        }            
    }
    
    function validateMetaDataRelatedTwo($table, $field, $value, $field_related1, $value_related1, $field_related2, $value_related2)
	{
		$value = $this->common->escapeStr($value);
		$value_related1 = $this->common->escapeStr($value_related1);
		$value_related2 = $this->common->escapeStr($value_related2);
		$sql = "SELECT id FROM $table WHERE $field = '$value' AND $field_related1='$value_related1' AND $field_related2='$value_related2' LIMIT 1;";
		$query = $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			return ($query->num_rows() > 0) ? 'false' : 'true';
		}
    }
    
    function getRelatedElement($table, $field, $value)
	{
        $sql 	= "SELECT * FROM $table WHERE $field='$value'";
		($table != "tbl_section2trade_view") ? $sql .= ' AND date_start<=CURDATE() AND (date_end="" OR date_end="0000-00-00 00:00:00" OR date_end>CURDATE())' : '';
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function getRelatedElementTwo($table, $field_related1, $value_related1, $field_related2, $value_related2)
	{
        $sql 	= "SELECT * FROM $table WHERE $field_related1='$value_related1' AND $field_related2='$value_related2'";
		($table != "tbl_section2trade_view") ? $sql .= ' AND date_start<=CURDATE() AND (date_end="" OR date_end="0000-00-00 00:00:00" OR date_end>CURDATE())' : '';
        $query 	= $this->db->query($sql);
		// common::pr($query->result_array());
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function getTableColumn($table, $field){
        $sql 	= "SELECT DISTINCT $field FROM $table WHERE 1 ORDER BY TRIM($field)";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function validateEmail($email)
	{
        if (!empty($email)){
            $email 	= $this->common->escapeStr($email);
            $sql 	= "SELECT id FROM tbl_administrator WHERE email_addr = '$email' LIMIT 1;";
            $query 	= $this->db->query($sql);
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
    
    function validateNickname($nick)
	{
        if (!empty($nick)){
            $nick = $this->common->escapeStr($nick);
            $sql = "SELECT id FROM tbl_administrator WHERE nickname like '$nick' LIMIT 1;";
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
    
    function validateTypename($name)
	{
        if (!empty($name)){
            $name 	= $this->common->escapeStr($name);
            $sql 	= "SELECT id FROM tbl_usertype WHERE typename like '$name' LIMIT 1;";
            $query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($query->num_rows() > 0) ? 'false' : 'true';
			}
        }
		else {
            return ''; //invalid post var
        }
    }

	function userCheck($email, $password='') 
	{
        $email 		= $this->common->escapeStr($email);
        $password 	= ($password) ? $this->common->escapeStr($password) : '';
	    $sql 		= "SELECT * FROM tbl_login_users WHERE email_addr='$email' ";
		($password) ? $sql .= " AND password='".md5($password)."'" : '';
		$sql .= " LIMIT 1";
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->row_array();
	}    
    
    function activeAccount($email)
	{
        $sql = "UPDATE tbl_user SET status = 1 WHERE email_addr='".trim($email)."' LIMIT 1";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $this->db->affected_rows();
    }
    
    function getUserByEmail($email)
	{
        /*
        create view tbl_login_users as
SELECT id,email_addr,nickname,firstname,lastname,password,profile_image,0 asindustry_id,type_id,status FROM tbl_administrator WHERE 1 UNION SELECT id,email_addr,nickname,firstname,lastname,password,profile_image,industry_id,type_id,status FROM tbl_user WHERE 1
        */
        $sql = "SELECT * FROM tbl_login_users WHERE email_addr='".trim($email)."' LIMIT 1";
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->row_array();
    }

    function getUserByID($uid, $select="*", $checkEmailAddr='')
	{
		if( $uid ) {
			$sql 	= "SELECT ".$select." FROM tbl_user ";
			$sql 	.= ($checkEmailAddr ) ? " WHERE email_addr IN(".$uid.")" : " WHERE id='".$uid."' LIMIT 1";
			$query 	= $this->db->query($sql);
			if(!$query) {
				return $this->common->dberror();
			}
			else {
				return ($checkEmailAddr) ? $query->result_array() : $query->row_array();
			}
		}
		else {
			return false;
		}
	}
	
	function getEmployersFromUserId($uid='', $select='*')
	{
		$sql = "SELECT ".$select." FROM tbl_connection AS tc 
				RIGHT JOIN tbl_user AS tu1 ON tc.employer_id = tu1.id AND tu1.type_id=8
				WHERE tc.worker_id = (SELECT tu.id FROM tbl_user AS tu WHERE tu.id = '".$uid."')";
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}	
    
    function getEmployers()
	{
        $sql = "SELECT * FROM tbl_user, tbl_usermeta 
                WHERE type_id =8 AND tbl_user.id=tbl_usermeta.user_id AND meta_key='company_name' AND status=1  
                ORDER BY TRIM(meta_value)";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function getUnions( $where='', $select='*' )
	{
        $sql = "SELECT ".$select." FROM tbl_user AS tu, tbl_usermeta AS tum WHERE type_id=7 AND tu.id=tum.user_id AND status=1 ";
		$sql .= (isset($where['section_id'])&&$where['section_id']) ? " AND meta_key='section_id'" : " AND meta_key='company_name'";

		if( $where ) {
			(isset($where['industry_id'])&&$where['industry_id']) ? $sql .= " AND industry_id = '".$where['industry_id']."'" :'';
			(isset($where['txt_union_text'])&&$where['txt_union_text']) ? $sql .= " AND (nickname like '%".$where['txt_union_text']."%'
													 OR firstname like '%".$where['txt_union_text']."%'
													 OR lastname like '%".$where['txt_union_text']."%')" : '';
		}
        $sql .= " ORDER BY meta_value";

        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function updatePasswordByUserID($id)
	{
		$arr_upd_user 	= array( 'status'=>'1' );
		$arr_where_user = array( 'id'=>$id, 'lessthan'=>array('status'=>'0') );
		$this->parentdb->manageDatabaseEntry( 'tbl_user', 'UPDATE', $arr_upd_user, $arr_where_user, '1' );
		
        $password = $this->common->escapeStr($_POST['password1']);
		$arr_upd_userpwd 	= array( 'password'=>md5($password) );
		$arr_where_userpwd 	= array( 'id'=>$id );
		return $this->parentdb->manageDatabaseEntry( 'tbl_user', 'UPDATE', $arr_upd_userpwd, $arr_where_userpwd, '1' );
    }

    function blockAccount($email){
		$arr_upd_userpwd 	= array( 'status'=>'-1' );
		$arr_where_userpwd 	= array( 'email_addr'=>$this->common->escapeStr($email) );
		return $this->parentdb->manageDatabaseEntry( 'tbl_user', 'UPDATE', $arr_upd_userpwd, $arr_where_userpwd, '1' );
    }

    function get_user_meta($user_id, $key, $single=true){
        $sql 	= "SELECT * FROM tbl_usermeta WHERE user_id='".$user_id."' AND meta_key = '".$key."'";
        $query 	= $this->db->query($sql);
		if(!$query) { 
			return $this->common->dberror();
		}
		else {
			return ($single) ? $query->row_array() : $query->result_array();
		}
    }

    function update_user_meta($user_id, $meta_key, $meta_value)
	{
		$meta_value = ($meta_key=='section_id'&&$meta_value=='') ? '17' : $meta_value;
		$meta_value = ($meta_key=='trade_id'&&$meta_value=='') ? '33' : $meta_value;

		$arr_upd_usermeta 	= array('user_id'=>$user_id, 'meta_key'=>$meta_key, 'meta_value'=>$meta_value);
		$arr_where_usermeta = array('user_id'=>$user_id, 'meta_key'=>$meta_key);
		
		return $this->parentdb->manageDatabaseEntry('tbl_usermeta', 'UPDATE', $arr_upd_usermeta, $arr_where_usermeta);
    }

    function add_user_meta($user_id, $meta_key, $meta_value)
	{
		$meta_value = ($meta_key=='section_id'&&$meta_value=='') ? '17' : $meta_value;
		$meta_value = ($meta_key=='trade_id'&&$meta_value=='') ? '33' : $meta_value;
		$arr_ins_usermeta = array('user_id'=>$user_id, 'meta_key'=>$meta_key, 'meta_value'=>$meta_value);
		// common::pr($arr_ins_usermeta);		
		
		return $this->parentdb->manageDatabaseEntry('tbl_usermeta', 'INSERT', $arr_ins_usermeta);
    }

    function getUserMetaByID($user_id='', $select='*')
	{
        $sql 	= "SELECT ".$select." FROM tbl_usermeta";
		($user_id) ? $sql 	.= " WHERE user_id='".$user_id."'" : '';
        $query 	= $this->db->query($sql);
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$rows 	= $query->result_array();
			$meta_data = array();
			foreach($rows AS $row) {
				$meta_data[$row['meta_key']] = $row['meta_value'];
			}
			return $meta_data;
		}
    }


    function updateUserMetaByID($user_id='', $type='', $postArr=array())
	{
		$postArr = (sizeof($postArr)>0) ? $postArr : $_POST;
		// common::pr($postArr);// die;

		if( isset($postArr['union']) && is_array($postArr['union']) ) { // My Unions module for Employer User //
			foreach( $postArr['union'] AS $myunion_key => $myunion_value ) {
				if( "new" === $myunion_key ) {
					foreach( $myunion_value AS $myunion_newkey => $myunion_newvalue ) {
						$union_id 		= $myunion_newvalue;
						$industry_id 	= $postArr['industry_id'][$myunion_key][$myunion_newkey];
						$sector_id 		= $postArr['section_id'][$myunion_key][$myunion_newkey];
						$trade_id 		= isset($postArr['trade_id'][$myunion_key][$myunion_newkey]) ? $postArr['trade_id'][$myunion_key][$myunion_newkey] : '';
						$union_number 	= isset($postArr['union_number'][$myunion_key][$myunion_newkey]) ? $postArr['union_number'][$myunion_key][$myunion_newkey] : '';

						$where_chkuser_union = 'in_user_id="'.$this->sess_userid.'" AND in_union_id="'.$union_id.'" AND st_union_number="'.$union_number.'" 
												AND in_industry_id="'.$industry_id.'" AND in_sector_id="'.$sector_id.'" AND in_trade_id="'.$trade_id.'"';
						$chk_user_union = $this->getMetaDataList('user_unions',$where_chkuser_union,'','COUNT(in_union_id) AS total_user_union');
						$chk_user_union = isset($chk_user_union[0]['total_user_union']) ? $chk_user_union[0]['total_user_union'] : '';
						if( $chk_user_union > 0 ) {
							$arr_upd_myunions 	= array( 'in_union_id'=>$union_id, 'in_industry_id'=>$industry_id, 'st_union_number'=>$union_number, 
														'in_sector_id'=>$sector_id, 'in_trade_id'=>$trade_id, 'dt_date_updated'=>date('Y-m-d h:i:s') );
							$arr_where_myunions = array( 'in_user_id'=>$this->sess_userid, 'in_union_id'=>$union_id, 'st_union_number'=>$union_number,
														'in_industry_id'=>$industry_id, 'in_sector_id'=>$sector_id, 'in_trade_id'=>$trade_id );
							$this->parentdb->manageDatabaseEntry( 'tbl_user_unions', 'UPDATE', $arr_upd_myunions, $arr_where_myunions );
						}
						else {
							$arr_ins_myunions 	= array( 'in_union_id'=>$union_id, 'in_user_id'=>$this->sess_userid, 
														'in_industry_id'=>$industry_id, 'in_sector_id'=>$sector_id, 'in_trade_id'=>$trade_id, 'st_union_number'=>$union_number );
							$this->parentdb->manageDatabaseEntry( 'tbl_user_unions', 'INSERT', $arr_ins_myunions );
						}
					}
				}
				else {
					$user_union_id 	= $postArr['user_union_id'][$myunion_key];
					$union_id 		= $myunion_value;
					$industry_id 	= $postArr['industry_id'][$myunion_key];
					$sector_id 		= $postArr['section_id'][$myunion_key];

					$arr_upd_myunions 	= array( 'in_union_id'=>$union_id, 'in_industry_id'=>$industry_id, 'in_sector_id'=>$sector_id, 'dt_date_updated'=>date('Y-m-d h:i:s') );
					$arr_where_myunions = array( 'in_user_id'=>$this->sess_userid, 'in_user_union_id'=>$user_union_id );
					$this->parentdb->manageDatabaseEntry( 'tbl_user_unions', 'UPDATE', $arr_upd_myunions, $arr_where_myunions );
				}
			}
		}
		else {
			if( $type == 7 ) {
				$rows_unions = $this->getUserMetaByID($user_id, 'meta_key, meta_value');
				if( isset($postArr['action']) && $postArr['action']=="ACCOUNT" ) {
					!isset($postArr['union_training_centre']) ? $postArr['union_training_centre'] = '' : '';
					!isset($postArr['parent_unions']) ? $postArr['parent_unions'] = '' : '';
				}
			}
			$arr_notin_usermeta = array('firstname', 'lastname', 'nickname', 'email', 'password', 'confirmpassword', 'submit', 'action', 
										'type_id', 'page', 'deleted_union', 'userid','instructor_key', 'confirm_instructor_key', 'page_redirect', 'page_design', 'connect_status', 'company_confirm_email');

			$val_designation = '';
			foreach($postArr AS $meta_key=>$meta_value) {
				if( !in_array($meta_key, $arr_notin_usermeta) ) {
					if( is_array($meta_value) ) {
						$$meta_key 	= $this->common->escapeStr( implode(",",$meta_value) );
						$meta 		= $this->get_user_meta($user_id, $meta_key);
					}
					else {
						$$meta_key 	= $this->common->escapeStr($meta_value);
						$meta 		= $this->get_user_meta($user_id, $meta_key);
					}

					$meta_value = (is_array($meta_value)) ? implode(",",$meta_value) : $meta_value;

					if( isset($postArr['page']) && ($postArr['page']=="register_union" || $postArr['page']=='professional' || $postArr['page']=='personal') ) {
						if(count($meta)>0) {
							$this->update_user_meta($user_id, $meta_key, $meta_value);
						}
						else {
							$this->add_user_meta($user_id, $meta_key, $meta_value);
						}
					}
					else {
						if($this->sess_usertype == 7) {
							$arrUnionInstructorData = array();
							$where_arr 			= array('st_designation'=>$meta_key, 'in_worker_id'=>$_POST['userid'], 'in_union_id'=> $this->sess_userid);
							$rows_designation 	= $this->users->getDesignationData("tbl_union_designations", $where_arr);
							$instructor_pwd 	= isset($_POST['instructor_pwd']) ? $_POST['instructor_pwd'] : '';
							
							if( $meta_key!="instructor_pwd" && $meta_key!="confirm_instructor_pwd" ) {
								if(count($rows_designation) > 0 ) {
									$arrUnionInstructorData['in_worker_id']		= $_POST['userid'];
									$arrUnionInstructorData['in_union_id']		= $this->sess_userid;
									$arrUnionInstructorData['st_password'] 		= ($meta_key=="union_instructor"&&$meta_value=="y") ? $instructor_pwd : '';
									$arrUnionInstructorData['st_status']		= $meta_value;
									$arrUnionInstructorData['dt_date_updated']	= date('Y-m-d h:i:s');

									$arrWhere = array('id'=>$rows_designation[0]['id'], 'st_designation'=>$meta_key);
									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'UPDATE', $arrUnionInstructorData,$arrWhere);
								}
								else {
									$arrUnionInstructorData['in_worker_id']		= $_POST['userid'];
									$arrUnionInstructorData['in_union_id']		= $this->sess_userid;
									$arrUnionInstructorData['st_designation']	= $meta_key;
									$arrUnionInstructorData['st_password'] 		= ($meta_key=="union_instructor"&&$meta_value=="y") ? $instructor_pwd : '';
									$arrUnionInstructorData['st_status']		= $meta_value;

									$this->parentdb->manageDatabaseEntry('tbl_union_designations', 'INSERT', $arrUnionInstructorData);
								}
							}
						}
						else {
							$arr_employee_designation = array();
							$where_arr 			= array('st_designation'=>$meta_key, 'in_worker_id'=>$_POST['userid'], 'in_user_id'=> $this->sess_userid);
							$rows_designation = $this->users->getDesignationData("tbl_employer_consultant_designations", $where_arr);
							$instructor_pwd 	= isset($_POST['instructor_pwd']) ? $_POST['instructor_pwd'] : '';
							
							if( $meta_key!="instructor_pwd" && $meta_key!="confirm_instructor_pwd" ) {
								if(count($rows_designation) > 0 ) {
									$arr_employee_designation['in_worker_id']	= $_POST['userid'];
									$arr_employee_designation['in_user_id']		= $this->sess_userid;
									$arr_employee_designation['st_password'] 	= ($meta_key=="consultant_instructor"&&$meta_value=="y") ? $instructor_pwd : '';
									$arr_employee_designation['st_status'] 		= $meta_value;
									$arr_employee_designation['dt_date_updated']= date('Y-m-d h:i:s');

									$arrWhere = array('id'=>$rows_designation[0]['id'], 'st_designation'=>$meta_key);

									$this->parentdb->manageDatabaseEntry('tbl_employer_consultant_designations', 'UPDATE', $arr_employee_designation,$arrWhere);
									
									if( 'supervisor'==$meta_key&&'n'==$meta_value ) {
										// Remove Supervisor in the Crew of Employer table //
											$arr_upd_supervisor 	= array('in_supervisor_id' => '');
											$arr_where_supervisor	= array('in_crew_employer_id' => $this->sess_userid, 'in_supervisor_id'=>$_POST['userid']);
											$this->parentdb->manageDatabaseEntry('tbl_crew_of_employers', 'UPDATE', $arr_upd_supervisor, $arr_where_supervisor);
									}
									
								}
								else {
									$arr_employee_designation['in_worker_id']	= isset($_POST['userid']) ? $_POST['userid'] : '';
									$arr_employee_designation['in_user_id']		= $this->sess_userid;
									$arr_employee_designation['st_designation']	= $meta_key;
									$arr_employee_designation['st_password'] 	= ($meta_key=="consultant_instructor"&&$meta_value=="y") ? $instructor_pwd : '';
									$arr_employee_designation['st_status'] 		= $meta_value;
									("12"==$this->sess_usertype) ? $arr_employee_designation['is_consultant'] = "1" : '';
								
									$this->parentdb->manageDatabaseEntry('tbl_employer_consultant_designations', 'INSERT', $arr_employee_designation);
								}
							}
						}
					}
				}
			}
		}
		

		if( isset($postArr['page']) ) {			
			if( $postArr['page']=='professional' && in_array($type, array(9, 11))){ // 9=Worker, 11=Student //
				// check if connect //
					$company = isset($company)&&$company ? $company : '';
					$company = isset($union['new'][0]) ? $union['new'][0] : $company;
					if($this->isConnected($company, $user_id)<1) {
						$this->connectRequest($company, $user_id);
					}
			}
			if($postArr['page']=='professional' && in_array($type, array(7))){ // 7=Union
				$this->db->delete('tbl_union_board', array('union_id'=>$user_id));
				foreach($postArr['title'] as $idx=>$title){
					$title = $this->common->escapeStr($title);
					$fname = $this->common->escapeStr($postArr['firstname'][$idx]);
					$lname = $this->common->escapeStr($postArr['lastname'][$idx]);
					if(!empty($title) && !empty($fname) && !empty($lname)){
						$arr_ins_unionboard = array( 'union_id'=>$user_id, 'title'=>$title, 'firstname'=>$fname, 'lastname'=>$lname );
						$this->parentdb->manageDatabaseEntry( 'tbl_union_board', 'INSERT', $arr_ins_unionboard );
					}
				}
			}
		}    
    }
    
    function getBoardMembersByUnionID($uID)
	{
        $sql 	= "SELECT id, title, firstname, lastname FROM tbl_union_board WHERE union_id='".$uID."' ORDER BY id ASC";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function isConnected($employer_id='', $worker_id='')
	{
        $sql 	= "SELECT connection_id FROM tbl_connection WHERE employer_id='".$employer_id."' AND worker_id='".$worker_id."' LIMIT 1";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }

	function sendEmailToS1user( $to='', $from='', $subject='', $message='')
	{
		$this->load->library('email');
		$config['mailtype'] 	= 'html'; // text
		$config['charset']  	= 'utf-8'; // iso-8859-1
		$config['wordwrap'] 	= TRUE;
		$config['priority'] 	= 1;
		$this->email->initialize($config);

		$this->email->from($from, 'S1');
		$to = ($to) ? $to : 'kreithster@gmail.com';
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);	
		$this->email->send();
	}
    
    function sendMessage()
	{
        foreach($_POST as $key=>$value) {
            (!is_array($value)) ? $$key = $this->common->escapeStr($value) : '';
		}
        if(isset($_POST['send_label']) && strtoupper($_POST['send_label'])=='ALL') {
            $connections = $this->getMyLinksByUserID($this->sess_userid, $this->session->userdata("usertype"), 1);
            foreach($connections as $cn) {
                $tos[] = $cn['email_addr'];
			}
        }
		else {
            $tos = explode(",", $_POST['send_to']);
        }

        foreach($tos as $to) {
            $to = trim($to);
            if( !empty($to) ) {
				if( "comply action" != strtolower($submit) ) {
					$action_id 		= isset($action_id) ? $action_id : '';
					$arr_ins_message= array( 'send_to'=>$to, 'send_from'=>$this->sess_useremail, 'subject'=>$subject, 'message'=>$message, 'in_corrective_action_id'=>$action_id );
					$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
					$this->sendEmailToS1user($to, $this->sess_useremail, $subject, $message);
				}
            }
        }
    }
    
    function deleteMessages($mids)
	{
        foreach($mids as $mid){
			return $this->db->delete('tbl_message', array('message_id'=>$mid));
        }
    }

    function getMyMessages($to, $paged, $limit='', $sectionsRestricted=array())
	{
        $sql = "SELECT * FROM tbl_message AS tmsg LEFT JOIN tbl_login_users AS tlu ON tmsg.send_from=tlu.email_addr WHERE send_to='".$to."'";
		if( isset($sectionsRestricted[0]) && $sectionsRestricted[0] ) {
			$sql .= " AND (( ";

			foreach( $sectionsRestricted AS $key_restrc_section => $val_restrc_section ) {
				$sql .= " subject NOT LIKE '%".$val_restrc_section."%'";
				if( ($key_restrc_section+1)<sizeof($sectionsRestricted) ) {
					$sql .= " AND ";
				}
			}
			$sql .= ") ";
			$sql .= " OR subject LIKE '%badge%'";
			$sql .= ") ";
		}
		$sql .= " ORDER BY read_status DESC, date_sent DESC ";

		($limit) ? $sql .= " LIMIT ".$paged*$limit.", $limit" : '';
        $query 	= $this->db->query($sql);

		// common::pr($query->result_array());die;
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function getMyTotalMessage($to)
	{
        $sql 	= "SELECT message_id FROM tbl_message WHERE send_to='$to'";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
    
    function getMyTotalSentMessage($from)
	{
        $sql 	= "SELECT message_id FROM tbl_message WHERE send_from='$from'";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
    
    function getMySentMessages($from, $paged, $limit='')
	{
        $sql = "SELECT * FROM tbl_message LEFT JOIN tbl_login_users ON tbl_message.send_to=tbl_login_users.email_addr 
                WHERE send_from='".$from."' ORDER BY date_sent DESC";
        ($limit) ? $sql .= " LIMIT ".$paged*$limit.", $limit" : '';

        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    
    function newMessageCount($to, $profileSubjNotification='', $sectionsRestricted=array())
	{
        $sql 	= "SELECT * FROM tbl_message WHERE send_to='".$to."' AND read_status=1";
		($profileSubjNotification) ? $sql 	.= " AND subject LIKE '%".$profileSubjNotification."%'" : '';

		if( isset($sectionsRestricted[0]) ) {
			foreach( $sectionsRestricted AS $key_restrc_section => $val_restrc_section ) {
				$sql .= " AND (subject NOT LIKE '%".$val_restrc_section."%')";
			}
		}
		
		$sql 	.= " ORDER BY date_sent DESC";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }
	
	function updateMessageReadStatus($msgSection='')
	{
		$arr_upd_message 	= array( 'read_status'=>'0' );
		$arr_where_message 	= array( 'like'=>array('subject'=>$msgSection), 'send_to' => $this->sess_useremail );
		$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', $arr_upd_message, $arr_where_message );
	}
    
    function getMessageByID($mid, $status='')
	{
        if($status == 'read') {
			$arr_upd_message 	= array( 'read_status'=>'0' );
			$arr_where_message 	= array( 'message_id'=>$mid );
			$this->parentdb->manageDatabaseEntry( 'tbl_message', 'UPDATE', $arr_upd_message, $arr_where_message );
        }
        $sql = "SELECT tmsg.*, tlu.* FROM tbl_message AS tmsg LEFT JOIN tbl_login_users AS tlu ON tmsg.send_from=tlu.email_addr 
				WHERE message_id='".$mid."' ORDER BY date_sent DESC";
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->row_array();
    }
    
    function getUsersForLinkByName($name, $type_id)
	{
        $type = $this->getElementByID('tbl_usertype', $type_id);
        switch($type['typename']){
            case 'Worker':
                $sql = "SELECT *, meta_value as company_name FROM tbl_user 
                            LEFT JOIN tbl_connection ON tbl_user.id=tbl_connection.employer_id AND worker_id=".$this->sess_userid.", tbl_usermeta 
                        WHERE tbl_user.id=tbl_usermeta.user_id 
                            AND meta_key ='company_name' 
                            AND (meta_value LIKE '%$name%' OR CONCAT(firstname, ' ', lastname) LIKE '%$name%') 
                            ORDER BY TRIM(firstname)";
                break;
            case 'Employer':
                $sql = "SELECT * FROM tbl_user LEFT JOIN tbl_connection ON tbl_user.id=tbl_connection.worker_id AND employer_id=".$this->sess_userid."   
                        WHERE CONCAT(firstname, ' ', lastname) LIKE '%$name%' OR nickname LIKE '%$name%' OR email_addr LIKE '%$name%' 
                        ORDER BY TRIM(firstname)";
                break;
            case 'Union':
                $sql = "SELECT * FROM tbl_user LEFT JOIN tbl_connection ON tbl_user.id=tbl_connection.worker_id AND employer_id=".$this->sess_userid."   
                        WHERE CONCAT(firstname, ' ', lastname) LIKE '%$name%' OR nickname LIKE '%$name%' OR email_addr LIKE '%$name%' 
                        ORDER BY TRIM(firstname)";
                break;
        }        
        $query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
    /// START - Consultant//
    function getEmployersByConsultant($whereStr)
    {
        $sql = "select * from tbl_user tu LEFT JOIN tbl_consultant_employers AS tc ON tu.id = tc.employer_id where type_id = 8 ".$whereStr." AND tu.status=1";
        $query = $this->db->query($sql);
        return (!$query) ? $this->common->dberror() : $query->result_array();                
    }
    //// End - Consultant///
    
	
	
	////// START - Connections for People or Organizations //////
		function getMyConnectionsByUserId( $connectionType='PEOPLE', $userId='', $status=NULL, $selectStr='*', $whereStr='' )
		{
			if( 'PEOPLE' == $connectionType )
			{
				$where = " AND (type_id=9 OR type_id=11 OR type_id=12)"; // 9=Worker, 11=Student //                                
				if( in_array($this->sess_usertype, array(9, 11)) ) {
					$str_leftjoin 	= ($whereStr) ? " AND worker_id='".$userId."'" : '';
					$str_where 		= (!$whereStr) ? " worker_id='".$userId."' AND" : '';
					$sql = "SELECT ".$selectStr." FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id = tc.employer_id ".$str_leftjoin."
							WHERE ".$str_where." tu.status=1 "; 
				}
				else {
					$str_leftjoin 	= ($whereStr) ? " AND employer_id='".$userId."'" : '';
					$str_where 		= (!$whereStr) ? " employer_id='".$userId."' AND" : '';
					$sql = "SELECT ".$selectStr." FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id = tc.worker_id ".$str_leftjoin."
							WHERE ".$str_where." tu.status=1";
				}
			}
			if( 'ORGANIZATION' == $connectionType )
			{
				$where = " AND (type_id=7 OR type_id=8)"; // 7=Union, 8=Employer //
				if( in_array($this->sess_usertype, array(8, 9, 11, 12)) ) {
					$str_leftjoin 	= ($whereStr) ? " AND worker_id='".$userId."'" : '';
					$str_where 		= (!$whereStr) ? " worker_id='".$userId."' AND" : '';
					$sql = "SELECT ".$selectStr." FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id = tc.employer_id ".$str_leftjoin." 
							WHERE ".$str_where." tu.status=1";
				}
				else {
					$str_leftjoin 	= ($whereStr) ? " AND employer_id='".$userId."'" : '';
					$str_where 		= (!$whereStr) ? " employer_id='".$userId."' AND" : '';
					$sql = "SELECT ".$selectStr." FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id = tc.worker_id ".$str_leftjoin."
							WHERE ".$str_where." tu.status=1";
				}
			}
			
			(!is_null($status)) ? $where .= ' AND link_status='.$status : '';
			($whereStr) ? $where .= $whereStr : '';
			$sql .= $where." GROUP BY tu.id ORDER BY TRIM(firstname)";

			//echo "<br>NewConnec: ".$sql;

			$query = $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->result_array();
		}

	
	
	
	//////// START - NOT IN USE ////////////////
		// My people links by user id
			function getMyPeopleLinksByUserID($uid, $type_id, $status=null, $select='*')
			{
				$where = "(type_id=9 OR type_id=11 OR type_id=12)"; // 9=Worker, 11=Student //
				(!is_null($status)) ? $where .= ' AND link_status='.$status : '';

				if(in_array($type_id, array(9, 11, 12))) { // 9=Worker, 11=Student //
					$sql = "SELECT ".$select." FROM tbl_connection, tbl_user 
							WHERE worker_id='".$uid."' AND tbl_connection.employer_id=tbl_user.id AND ".$where." 
							ORDER BY TRIM(firstname)";
				}
				else {
					$sql = "SELECT ".$select." FROM tbl_connection, tbl_user 
							WHERE employer_id='".$uid."' AND tbl_connection.worker_id=tbl_user.id AND ".$where." 
							ORDER BY TRIM(firstname)";
				}

				// echo "<br>ByIDPeople: ".$sql;
				
				$query = $this->db->query($sql);
				return (!$query) ? $this->common->dberror() : $query->result_array();
			}

		// My people links by user name
			function getPeopleForLinkByName($name='', $type_id='', $whereStr='')
			{
				if( (int)$type_id ) {
					switch( $type_id ) {
						case 8:
							$sql = "SELECT * FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id=tc.worker_id AND employer_id=".$this->sess_userid." 
									WHERE (CONCAT(firstname, ' ', lastname) LIKE '%".$name."%' OR nickname LIKE '%".$name."%' OR email_addr LIKE '%".$name."%') AND (type_id=9 OR type_id=11)";
							break;
						case 7:
							$sql = "SELECT * FROM tbl_user AS tu LEFT JOIN tbl_connection AS tc ON tu.id=tc.worker_id AND employer_id=".$this->sess_userid."   
									WHERE (CONCAT(firstname, ' ', lastname) LIKE '%".$name."%' OR nickname LIKE '%".$name."%' OR email_addr LIKE '%".$name."%') AND type_id=9";
							break;
					}
					if( isset($sql) ) {
						($whereStr) ? $sql .= " ".$whereStr : '';
						$sql .= " ORDER BY TRIM(tu.firstname)";
						echo "<br>ByNamePeople: ".$sql;
						
						$query = $this->db->query($sql);
						return (!$query) ? $this->common->dberror() : $query->result_array();
					}
					else {
						return array();
					}
				}
				else {
					return array();
				}
			}

		// My organizations links by user id
			function getMyOrganizationLinksByUserID($uid, $type_id, $status=null, $select='*', $whereStr='')
			{
				$where = "(type_id=7 OR type_id=8)"; // 7=Union, 8=Employer //
				(!is_null($status)) ? $where .= ' AND link_status='.$status : '';
				($whereStr) ? $where .= $whereStr : '';

				if(in_array($type_id, array(8, 9, 11))) { // 8=Employer, 9=Worker, 11=Student //
					$sql = "SELECT ".$select." FROM tbl_connection, tbl_user 
							WHERE worker_id='".$uid."' AND tbl_connection.employer_id=tbl_user.id AND ".$where." 
							ORDER BY TRIM(firstname)";
				}
				else {
					$sql = "SELECT ".$select." FROM tbl_connection, tbl_user 
							WHERE employer_id='".$uid."' AND tbl_connection.worker_id=tbl_user.id AND ".$where." 
							ORDER BY TRIM(firstname)";
				}
				// echo "<br>ByIDOrg: ".$sql;
				$query = $this->db->query($sql);
				return (!$query) ? $this->common->dberror() : $query->result_array();
			}
			
		// My organizations links by user name
			function getOrganizationsForLinkByName( $name='', $type_id='', $whereStr='' )
			{
				if( (int)$type_id ) {
					switch($type_id) {
						case 11: // 11=Student
							$sql = "SELECT * , meta_value AS company_name FROM tbl_user AS tu
										LEFT JOIN tbl_connection AS tc ON tu.id = tc.employer_id AND tc.worker_id =".$this->sess_userid." 
										LEFT JOIN tbl_usermeta AS tum ON tu.id = tum.user_id AND meta_key='company_name' 
									WHERE (type_id=8) AND CONCAT(firstname, ' ', lastname) LIKE '%".$name."%'";
							break;            
						case 9: // 9=Worker
							$sql = "SELECT * , meta_value AS company_name FROM tbl_user AS tu
										LEFT JOIN tbl_connection AS tc ON tu.id = tc.employer_id AND worker_id =".$this->sess_userid." 
										LEFT JOIN tbl_usermeta AS tum ON tu.id = tum.user_id AND meta_key='company_name' 
									WHERE (type_id=7 OR type_id=8) 
										AND (CONCAT(firstname, ' ', lastname) LIKE '%".$name."%' OR nickname LIKE '%".$name."%' OR email_addr LIKE '%".$name."%')";
							break;
						case 8: // 8=Employer
							$sql = "SELECT * FROM tbl_user AS tu
										LEFT JOIN tbl_connection AS tc ON tu.id=tc.employer_id AND worker_id=".$this->sess_userid."   
									WHERE (CONCAT(firstname, ' ', lastname) LIKE '%".$name."%' OR nickname LIKE '%".$name."%' OR email_addr LIKE '%".$name."%') AND type_id=7";
							break;
						case 7: // 7=Union
							$sql = "SELECT * FROM tbl_user AS tu
										LEFT JOIN tbl_connection AS tc ON tu.id=tc.worker_id AND employer_id=".$this->sess_userid."   
									WHERE (CONCAT(firstname, ' ', lastname) LIKE '%$name%' OR nickname LIKE '%".$name."%' OR email_addr LIKE '%".$name."%') AND type_id=8";
							break;
					}

					if( isset($sql) ) {
						($whereStr) ? $sql .= " ".$whereStr : '';
						$sql .= " ORDER BY firstname";
						// echo "<br>ByNameOrg: ".$sql;
						
						$query = $this->db->query($sql);
						return (!$query) ? $this->common->dberror() : $query->result_array();
					}
					else {
						return array();
					}
				}
				else {
					return array();
				}
			}
		
	//////// END - NOT IN USE ////////////////
	
	
	
	function getSimilarLinksByUserID($uid, $type_id, $status, $term='')
	{
		$term = $this->common->escapeStr($term);
		if( isset($term) && $term ) {
			$where = "(nickname LIKE '%".$term."%' OR firstname LIKE '%".$term."%') AND link_status=".$status;
		}
		else {
			$where = "link_status=".$status;
		}
		if(in_array($type_id, array(9, 11, 12))) { // 9=Worker, 11=Student, 12=Consultant //
			$sql = "SELECT firstname, lastname, nickname, email_addr, tu.id 
					FROM tbl_connection AS tc, tbl_user AS tu WHERE worker_id='".$uid."' AND tc.employer_id=tu.id AND ".$where." ORDER BY TRIM(firstname)";
		}
		else {
			$sql = "SELECT firstname, lastname, nickname, email_addr, tu.id 
					FROM tbl_connection AS tc, tbl_user AS tu WHERE employer_id='".$uid."' AND tc.worker_id=tu.id AND ".$where." ORDER BY TRIM(firstname)";
		}
		$this->db->query($sql);
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	function getMyLinksByUserID($uid, $type_id, $status=null, $whereStr='', $select='*')
	{
		$where 		= (is_null($status)) ? '1' : 'link_status="'.$status.'"';
		$whereStr 	= ($whereStr) ? $whereStr : '1';

		if(in_array($type_id, array(9, 11))) { // 9=Worker, 11=Student //
			$sql = "SELECT ".$select." FROM tbl_connection AS tc, tbl_user AS tu WHERE worker_id='".$uid."' AND tc.employer_id=tu.id AND ".$where." AND ".$whereStr." 
					ORDER BY TRIM(firstname)";
		}
		else {
			$sql = "SELECT ".$select." FROM tbl_connection AS tc, tbl_user AS tu WHERE employer_id='".$uid."' AND tc.worker_id=tu.id AND ".$where." AND ".$whereStr." 
					ORDER BY TRIM(firstname)";
		}

		$this->db->query($sql);
		$query = $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	////// END - Connections of People or Organizations //////
	
	
	
	
    function getUsersByName($name)
	{
        $name 	= $this->common->escapeStr($name);
        $sql 	= "SELECT *, id as worker_id FROM tbl_user WHERE CONCAT(firstname, ' ', lastname) LIKE '%$name%' OR nickname LIKE '%$name%'";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }
	
    function connectRequest($employer_id='', $worker_id='')
	{
        $to = ($employer_id) ? $this->getUserByID($employer_id) : '';
        if( isset($to) && is_array($to) ) {
			$arr_ins_message = array('send_to'=>$to['email_addr'], 'send_from'=>$this->sess_useremail, 'subject'=>'Connection Request', 
									'message'=>$this->sess_nickname." sent you an invitation to connect. " );
			$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
			$this->sendEmailToS1user($to['email_addr'], $this->sess_useremail, 'Connection Request', $this->sess_nickname." sent you an invitation to connect. " );
            $usertype = $this->sess_usertype;

            if( $usertype == 8 || $usertype == 12 ) { // 8=Employer, 12=Consultant //
				if(in_array($to['type_id'], array(9, 11, 12))) { // 9=Worker, 11=Student, 12=Consultant //
					list($employer_id, $worker_id) = array($worker_id,$employer_id);
				}
            }
			elseif( $usertype == 7 ){ // 7=Union //
                list($employer_id, $worker_id) = array($worker_id,$employer_id);
            }

			$rows_is_connected = $this->users->getMetaDataList( 'connection', 'employer_id="'.$employer_id.'" AND worker_id="'.$worker_id.'"', '', 'connection_id' );
			// common::pr($rows_is_connected);
			if( !isset($rows_is_connected[0]['connection_id']) ) {
				$arr_ins_connection = array( 'employer_id'=>$employer_id, 'worker_id'=>$worker_id, 'requester'=>$this->sess_userid );
				return $this->parentdb->manageDatabaseEntry( 'tbl_connection', 'INSERT', $arr_ins_connection );
			}
        }
    }
    
    function connectAccept($employer_id='', $worker_id='')
	{
        $to = ($employer_id) ? $this->getUserByID($employer_id) : '';
		
		if( isset($to) && is_array($to) ) {
			$arr_ins_message = array('send_to'=>$to['email_addr'], 'send_from'=>$this->sess_useremail, 'subject'=>'Connection Accept', 
									'message'=>$this->sess_nickname." has accepted your invitation to connect." );
			$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
			$this->sendEmailToS1user($to['email_addr'], $this->sess_useremail, 'Connection Accept', $this->sess_nickname." has accepted your invitation to connect." );

			$usertype = $this->session->userdata("usertype");
			if( $usertype == 8 || $usertype == 12 ) { // 8=Employer, 12=Consultant //
				if(in_array($to['type_id'], array(9, 11, 12))) { // 9=Worker, 11=Student, 12=Consultant //
					list($employer_id, $worker_id) = array($worker_id, $employer_id);
				}
			}
			elseif( $usertype == 7 ) { // 7=Union //
				list($employer_id, $worker_id) = array($worker_id,$employer_id);
			}

			$arr_upd_connection 	= array( 'link_status'=>'1' );
			$arr_where_connection 	= array( 'employer_id'=>$employer_id, 'worker_id'=>$worker_id );
			return $this->parentdb->manageDatabaseEntry( 'tbl_connection', 'UPDATE', $arr_upd_connection, $arr_where_connection );
		}
    }
    
    function connectIgnore($employer_id='', $worker_id='')
	{
		$to = ($employer_id) ? $this->getUserByID($employer_id) : '';
		
		if( isset($to) && is_array($to) ) {
			$arr_ins_message = array('send_to'=>$to['email_addr'], 'send_from'=>$this->sess_useremail, 'subject'=>'Connection Remove', 'message'=>$this->sess_nickname." has removed your invitation to connect." );
			$this->parentdb->manageDatabaseEntry( 'tbl_message', 'INSERT', $arr_ins_message );
			$this->sendEmailToS1user($to['email_addr'], $this->sess_useremail, 'Connection Remove', $this->sess_nickname." has removed your invitation to connect.");
		
			if( !in_array($this->session->userdata("usertype"), array(9, 11)) ) { // 9=Worker, 11=Student //
				if( !in_array($to['type_id'], array(7, 8)) ) { // 7=Union, 8=Employer //
					list($employer_id, $worker_id) = array($worker_id,$employer_id);
				}
			}
			// common::pr(array($employer_id,$worker_id));die;
			
			if( isset($employer_id) && $employer_id ) {
				$this->db->delete('tbl_connection', array('employer_id'=>$employer_id, 'worker_id'=>$worker_id));
				$this->db->limit(1);
			}
		}
    }

    function getMyWorkerByUserID($uid, $type_id, $status, $term='')
	{
        $term 	= ($term) ? $this->common->escapeStr($term) : '';
        $where 	= " link_status=".$status;
		($term) ? $where .=  " AND CONCAT(firstname, ' ', lastname) LIKE '%".$term."%'" : '';
        
        $sql 	= "SELECT tu.* FROM tbl_connection AS tc, tbl_user AS tu WHERE employer_id='".$uid."' AND tc.worker_id=tu.id AND ".$where."";
        $this->db->query($sql);
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
    }

    function getLinksNumberByUserID($uid)
	{
        $sql 	= "SELECT connection_id FROM tbl_connection WHERE (worker_id='".$uid."' OR employer_id='".$uid."') AND link_status=1";
        $query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->num_rows();
    }

	
	function getMyDataOfUser($userId='', $dataSection='')
	{
		$is_library_section = 0;

		if( "user_wallet" == $dataSection ) {
			// Get Credits, Points, Level, Language //
				if( $userId == '12' ) {
					$sql = "SELECT SUM(tmc.in_credits_purchased*tmc.in_qty_ordered) AS credits, in_total_points_gained AS points, tupl.in_points_level AS level, 
								firstname, lastname, profile_image, type_id, tu.id, 
								(SELECT abbr from tbl_language AS tlang WHERE tum_lang.meta_value=tlang.language) AS language, 
								(CASE WHEN(tu.type_id=9 OR tu.type_id=11) THEN CONCAT(firstname,'<br>',lastname)
								ELSE (SELECT meta_value FROM tbl_usermeta AS tum_comp WHERE meta_key='company_name' AND user_id='".$userId."')
								END) AS username, 
								(SELECT profile_image FROM tbl_user AS tu1 WHERE id=(SELECT meta_value from tbl_usermeta WHERE meta_key='union' AND user_id=tu.id)) AS union_profile_image
							FROM tbl_administrator AS tu 
							LEFT JOIN tbl_users_points_level AS tupl ON tu.id = tupl.in_user_id
							LEFT JOIN tbl_my_credits AS tmc ON tu.id = tmc.in_user_id
							LEFT JOIN tbl_usermeta AS tum_lang ON (tu.id = tum_lang.user_id AND tum_lang.meta_key='preferred_language')
							LEFT JOIN tbl_usermeta AS tum_trade ON (tu.id = tum_trade.user_id AND tum_trade.meta_key='trade_id')
							WHERE tu.id = '".$userId."'";
				}
				else {
				$sql = "SELECT SUM(tmc.in_credits_purchased*tmc.in_qty_ordered) AS credits, in_total_points_gained AS points, tupl.in_points_level AS level, 
							firstname, lastname, profile_image, type_id, tu.id, 
							(SELECT abbr from tbl_language AS tlang WHERE tum_lang.meta_value=tlang.language) AS language, 
							(CASE WHEN(tu.type_id=9 OR tu.type_id=11) THEN CONCAT(firstname,' ',lastname)
							ELSE (SELECT meta_value FROM tbl_usermeta AS tum_comp WHERE meta_key='company_name' AND user_id='".$userId."')
							END) AS username, 
							(SELECT profile_image FROM tbl_user AS tu1 WHERE id=(SELECT meta_value from tbl_usermeta WHERE meta_key='union' AND user_id=tu.id)) AS union_profile_image, 
							(SELECT industryname FROM tbl_industry WHERE id = tu.industry_id AND date_start<=CURDATE() AND (date_end='' OR date_end>CURDATE())) AS industry, 
							(SELECT tradename from tbl_trade AS tsect WHERE id = tum_trade.meta_value AND date_start<=CURDATE() AND (date_end='' OR date_end>CURDATE()) ) AS trade, 
							
							(CASE WHEN(tu.type_id=11) THEN (SELECT meta_value from tbl_usermeta WHERE meta_key = 'institution_name' AND user_id='".$userId."') ELSE '' END) AS institution_name 
						FROM tbl_user AS tu 
						LEFT JOIN tbl_users_points_level AS tupl ON tu.id = tupl.in_user_id
						LEFT JOIN tbl_my_credits AS tmc ON tu.id = tmc.in_user_id
						LEFT JOIN tbl_usermeta AS tum_lang ON (tu.id = tum_lang.user_id AND tum_lang.meta_key='preferred_language')
						LEFT JOIN tbl_usermeta AS tum_trade ON (tu.id = tum_trade.user_id AND tum_trade.meta_key='trade_id')
						WHERE tu.id = '".$userId."' AND status=1";
				}
				$query = $this->db->query($sql);
				(!$query) ? $this->common->dberror() : $arr_my_data['user_wallet'] = $query->row_array();
		}
		$user_typeid = isset($arr_my_data['user_wallet']['type_id']) ? $arr_my_data['user_wallet']['type_id'] : $this->sess_usertype;

		if( "user_connections" == $dataSection ) {
			// Get User connections //
				$user_connections = $this->getMyLinksByUserID( $userId, 9, 1, '', 'nickname, type_id' );
				$rows_connections = array();
				foreach($user_connections as $val_connections) {
					$rows_connections[$val_connections['type_id']][] = $val_connections;
				}
				$arr_my_data['user_connections'] = $rows_connections;
		}
		
		if( "badge" == $dataSection ) {
			// Get User Badges //
				$my_badges 			= $this->libraries->getMyBadges($userId);
				$assigned_badges 	= $this->libraries->getMyAssignedBadges($userId);
				$all_my_badges	= array_merge($my_badges, $assigned_badges);
				// Common::pr($all_my_badges);
				$arr_my_data['user_badges']	= (isset($all_my_badges) && is_array($all_my_badges)) ? $all_my_badges : array();
		}
		
		$user_libraries = array();
		if( "procedures" == $dataSection ) {
			$is_library_section 	= 1;
			$completed_libsection 	= $this->libraries->getCompletedProcedures($userId);
			$assigned_libsection 	= $this->libraries->getAssignedProceduresByUserID($userId);					
			$purchased_libsection 	= $this->libraries->getMyProceduresInventories($this->sess_useremail, $userId);					
		}
		if( "safetytalks" == $dataSection ) {
			$is_library_section 	= 1;
			$completed_libsection 	= $this->libraries->getCompletedSafetytalks($userId);
			$assigned_libsection 	= $this->libraries->getAssignedSafetytalksByUserID($userId);
			$purchased_libsection 	= $this->libraries->getMySafetytalksInventories($this->sess_useremail, $userId);
		}
		if( "inspections" == $dataSection ) {
			$is_library_section 	= 1;
			$completed_libsection 	= $this->libraries->getCompletedInspections();
			$assigned_libsection 	= $this->libraries->getAssignedInspectionsByUserID($userId);
			$purchased_libsection 	= $this->libraries->getMyInspectionInventories($this->sess_useremail, $userId);
		}
		if( "investigations" == $dataSection ) {
			$is_library_section = 1;
			$completed_libsection = $this->libraries->getCompletedDocumentsByUserID($userId, 6);
			$assigned_libsection = $this->libraries->getAssignedDocumentsByUserID($userId, 6);
			$purchased_libsection = $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $userId, '', '', 6);
		}
		if( "hazards" == $dataSection ) {
			$is_library_section = 1;
			$completed_libsection 		= $this->libraries->getCompletedDocumentsByUserID($userId, 3);
			$assigned_libsection 		= $this->libraries->getAssignedDocumentsByUserID($userId, 3);
			$purchased_libsection 		= $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $userId, '', '', 3);
		}
		if( "training" == $dataSection ) {
			$is_library_section = 1;
			$completed_libsection = $this->libraries->getCompletedDocumentsByUserID($userId, 1);
			$assigned_libsection = $this->libraries->getAssignedDocumentsByUserID($userId, 1);
			$purchased_libsection = $this->libraries->getMyInventoriesByUserName($this->sess_useremail, $userId, '', '', 1);
		}
		
		if( 1 == $is_library_section ) {
			$user_libraries[$dataSection]['completed']['total'] = sizeof($completed_libsection);
			foreach( $completed_libsection AS $key_completed => $val_completed ) {
				$user_libraries[$dataSection]['completed'][$key_completed]['lib_title'] 	= isset($val_completed['title']) ? $val_completed['title'] : '';
				$user_libraries[$dataSection]['completed'][$key_completed]['date_completed']= isset($val_completed['date_completed']) ? $val_completed['date_completed'] : '';
			}
			$user_libraries[$dataSection]['assigned']['total'] = sizeof($assigned_libsection);
			foreach( $assigned_libsection AS $key_assigned => $val_assigned ) {
				$user_libraries[$dataSection]['assigned'][$key_assigned]['lib_title'] 	= isset($val_assigned['title']) ? $val_assigned['title'] : '';
				$user_libraries[$dataSection]['assigned'][$key_assigned]['date_assign'] = isset($val_assigned['date_assign']) ? $val_assigned['date_assign'] : '';
			}
			$user_libraries[$dataSection]['purchased']['total'] = sizeof($purchased_libsection);
			foreach( $purchased_libsection AS $key_purchased => $val_purchased ) {
				$user_libraries[$dataSection]['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
				$user_libraries[$dataSection]['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
			}
		}

		// My workers, My employers and My members //
			("my_workers" == $dataSection) ? $my_users = $this->getMyWorkerByUserID($userId, $user_typeid, $status=1) : '';
			("my_employers" == $dataSection) ? $my_users = $this->getEmployersFromUserId($userId) : '';
			("my_members" == $dataSection) ? $my_users = $this->getMyWorkerByUserID($userId, $user_typeid, 1) : '';

			if( "my_designations" == $dataSection ) {
				if("7"==$user_typeid) {
					$where_arr['in_union_id'] 	= $this->sess_userid;
					$designations_tblname 		= "tbl_union_designations";
				}
				else {
					$where_arr['in_user_id'] 	= $this->sess_userid;
					$designations_tblname 		= "tbl_employer_consultant_designations";
				}
				$where_arr['in_worker_id'] 	= $userId;
				$where_arr['st_status'] 	= "y";
				$my_users = $this->getDesignationData( $designations_tblname, $where_arr );
			}

			if( "my_client_workers" == $dataSection ) {
				$where_arr['in_user_id'] 		= $userId;
				$where_arr['st_designation'] 	= "my_worker";
				$where_arr['st_status'] 		= "y";
				$my_users = $this->getDesignationData( "tbl_employer_consultant_designations", $where_arr );
			}

			if( isset($my_users) ) {
				$user_libraries[$dataSection] 			= $my_users;
				$user_libraries[$dataSection]['total'] 	= (sizeof($my_users)&&isset($my_users[0])) ? sizeof($my_users) : '0';
			}

		$arr_my_data['user_libraries'] = $user_libraries;
		return $arr_my_data;
	}

	function getDataCollection($dataType='', $whereArr='')
	{
		if( $dataType ) {
			$where_user_arr 	= isset($whereArr['user']) ? $whereArr['user'] : '';
			$where_library_arr 	= isset($whereArr['library']) ? $whereArr['library'] : '';
			
			$rows_active_users 	= $this->getMetaDataList('user', 'status=1 AND type_id>1 '.$where_user_arr.'', 'ORDER BY TRIM(concat(firstname, lastname))', 
															'id, type_id, email_addr, concat(firstname, lastname) AS username, industry_id');
			
			if( "library" == $dataType ) {
				$data_library = array();
				foreach( $rows_active_users AS $key_user => $val_user ) {
					$userid 	= $val_user['id'];
					$username 	= $val_user['username'];
					$user_email = $val_user['email_addr'];
					$user_typeid= $val_user['type_id'];
					
					$data_library[$key_user]['user']['username'] 	= $username;
					$data_library[$key_user]['user']['userid'] 		= $userid;
					$data_library[$key_user]['user']['user_email'] 	= $user_email;
					
					// Purchased Inspections
						$purchased_inspections 	= $this->libraries->getMyInspectionInventories($user_email, $userid, $where_library_arr);
						$data_library[$key_user]['inspections']['purchased']['total'] = sizeof($purchased_inspections);
						foreach( $purchased_inspections AS $key_purchased => $val_purchased ) {
							$data_library[$key_user]['inspections']['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
							$data_library[$key_user]['inspections']['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
						}
						
					// Purchased Safetytalks
						$purchased_safetytalks 	= $this->libraries->getMySafetytalksInventories($user_email, $userid, $where_library_arr);
						$data_library[$key_user]['safetytalks']['purchased']['total'] = sizeof($purchased_safetytalks);
						foreach( $purchased_safetytalks AS $key_purchased => $val_purchased ) {
							$data_library[$key_user]['safetytalks']['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
							$data_library[$key_user]['safetytalks']['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
						}
						
					// Purchased Procedures
						$purchased_procedures 	= $this->libraries->getMyProceduresInventories($user_email, $userid, $where_library_arr);
						$data_library[$key_user]['procedures']['purchased']['total'] = sizeof($purchased_procedures);
						foreach( $purchased_procedures AS $key_purchased => $val_purchased ) {
							$data_library[$key_user]['procedures']['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
							$data_library[$key_user]['procedures']['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
						}
					
					// Purchased Investigations
						$purchased_investigations = $this->libraries->getMyInventoriesByUserName($user_email, $userid, '', $where_library_arr, 6);
						$data_library[$key_user]['investigations']['purchased']['total'] = sizeof($purchased_investigations);
						foreach( $purchased_investigations AS $key_purchased => $val_purchased ) {
							$data_library[$key_user]['investigations']['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
							$data_library[$key_user]['investigations']['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
						}
						
					// Purchased Hazards
						$purchased_hazards 		= $this->libraries->getMyInventoriesByUserName($user_email, $userid, '', $where_library_arr, 3);
						$data_library[$key_user]['hazards']['purchased']['total'] = sizeof($purchased_hazards);
						foreach( $purchased_hazards AS $key_purchased => $val_purchased ) {
							$data_library[$key_user]['hazards']['purchased'][$key_purchased]['lib_title'] = isset($val_purchased['lib_title']) ? $val_purchased['lib_title'] : '';
							$data_library[$key_user]['hazards']['purchased'][$key_purchased]['date_bought'] = isset($val_purchased['date_bought']) ? $val_purchased['date_bought'] : '';
						}
				}
				return $data_library;
			}
			else if( "user" == $dataType ) {
				$data_users = array();
				foreach( $rows_active_users AS $key_user => $val_user ) {
					$user_typeid 	= $val_user['type_id'];
					$user_typename 	= $this->getMetaDataList('usertype', 'id="'.$user_typeid.'"', '', 'typename');
					$user_typename 	= isset($user_typename[0]['typename']) ? strtolower($user_typename[0]['typename']) : '';
					
					$user_industry 	= $this->getMetaDataList('industry', 'id="'.$val_user['industry_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'industryname');
					$user_industry 	= isset($user_industry[0]['industryname']) ? strtolower($user_industry[0]['industryname']) : '';
					$val_user['industry_name'] = $user_industry;
					
					$user_industry 	= $this->getMetaDataList('industry', 'id="'.$val_user['industry_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'industryname');
					$user_industry 	= isset($user_industry[0]['industryname']) ? strtolower($user_industry[0]['industryname']) : '';
					$val_user['industry_name'] = $user_industry;
					
					$data_users[$user_typename][] = $val_user;
				}
				return $data_users;
			}
		}
	}
	
	function getUserPurchase($userId='', $purchaseType='')
	{
			$sql = "SELECT firstname, lastname, type_id, tu.id AS userid, 
						SUM(tml.unit_price) AS total_purchase, 
						(SELECT SUM(in_credits_purchased) FROM tbl_my_credits AS tmc WHERE tmc.st_credits_package='Gold' AND tu.id=tmc.in_user_id) AS total_gold_pkg, 
						(SELECT SUM(in_credits_purchased) FROM tbl_my_credits AS tmc WHERE tmc.st_credits_package='Silver' AND tu.id=tmc.in_user_id) AS total_silver_pkg, 
						(SELECT SUM(in_credits_purchased) FROM tbl_my_credits AS tmc WHERE tmc.st_credits_package='Bronze' AND tu.id=tmc.in_user_id) AS total_bronze_pkg, 
						(SELECT industryname FROM tbl_industry WHERE id = tu.industry_id AND date_start<=CURDATE() AND (date_end='' OR date_end>CURDATE())) AS industry, 
						(SELECT sectionname from tbl_section AS tsect WHERE id = tum_sections.meta_value AND date_start<=CURDATE() AND (date_end='' OR date_end>CURDATE()) ) AS sector,
						(SELECT tradename from tbl_trade AS ttrade WHERE id = tum_trade.meta_value AND date_start<=CURDATE() AND (date_end='' OR date_end>CURDATE()) ) AS trade
					FROM tbl_user AS tu 
					LEFT JOIN tbl_my_library AS tml ON tu.id = tml.user_id AND (transaction_type='s1credits' OR transaction_type='moneris')
					LEFT JOIN tbl_usermeta AS tum_lang ON (tu.id = tum_lang.user_id AND tum_lang.meta_key='preferred_language')
					LEFT JOIN tbl_usermeta AS tum_sections ON (tu.id = tum_sections.user_id AND tum_sections.meta_key='section_id')
					LEFT JOIN tbl_usermeta AS tum_trade ON (tu.id = tum_trade.user_id AND tum_trade.meta_key='trade_id')
					WHERE status=1";
			($userId) ? $sql .= ' AND tu.id = "'.$userId.'"' : '';
			$sql .= ' GROUP BY tu.id ORDER BY tu.firstname,tu.lastname';

			$query = $this->db->query($sql);
			return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	
	function getGraphPurchaseAndPoints($userId='')
	{
		$sql = "SELECT SUM(tml.qty_ordered) AS noof_purchase, SUM(tml.credits) AS total_points, 
				DATE_FORMAT(date_bought, '%b') AS bought_month, YEAR(date_bought) AS bought_yr
				FROM tbl_my_library AS tml 
				LEFT JOIN tbl_user AS tu ON tml.user_id=tu.id AND tu.status=1
				WHERE (tml.transaction_type='s1credits' OR tml.transaction_type='moneris') AND tml.user_id != 12
				GROUP BY bought_month, bought_yr
				ORDER BY MONTH(date_bought) ASC";
		($userId) ? $sql .= ' AND tu.id = "'.$userId.'"' : '';
		$query = $this->db->query($sql);
		$result_array  = (!$query) ? $this->common->dberror() : $query->result_array();
		
		// common::pr($result_array);
		$arr_graph_purchase_points = array();
		foreach( $result_array AS $key_result_array => $val_result_array ) {
			$arr_graph_purchase_points[$val_result_array['bought_yr']][$val_result_array['bought_month']][] = $result_array[$key_result_array];
		}
		return $arr_graph_purchase_points;
	}
	
	function getUserIDsFromCrewID($crewID)
	{
		if($crewID != ""){
			$sql = "select st_crew_workers from tbl_crew_of_employers where in_crew_id = ".$crewID;                
			$query = $this->db->query($sql);                
			return (!$query) ? $this->common->dberror() : $query->row();
		}
	}

	function getUserConnc( $userId='', $checkTrainingCentre='' )
	{
		$sql 	= "SELECT user_id, meta_value FROM tbl_usermeta WHERE meta_key='parent_unions'";
		(!$checkTrainingCentre) ? $sql .= " AND FIND_IN_SET('".$userId."',meta_value)" : '';
		($checkTrainingCentre) ? $sql .= " AND user_id = '".$userId."'" : '';
		// echo $sql;
		$query 	= $this->db->query($sql);
		// common::pr($query->result_array());
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
	
	function getDesignateStatus($employer_id,$consultant_id)
	{
		$sql= "SELECT designate_status FROM tbl_consultant_employers WHERE employer_id=".$employer_id." and consultant_id=".$consultant_id;		
		$query 	= $this->db->query($sql);		
		return (!$query) ? $this->common->dberror() : $query->result_array();
	}
		
	function getUsersWithPublicPage($whereUsers,$utc='')
	{
		if($utc == ""){
			$sql= "SELECT tum.meta_value,id,firstname,lastname,email_addr,profile_image FROM tbl_user as tu LEFT JOIN tbl_usermeta AS tum "
				 . "ON (tu.id = tum.user_id AND tum.meta_key='s1_public_page') WHERE status = 1 ".$whereUsers;
		}
		else if($utc == "1"){
			$sql= "SELECT tum.meta_value,id,firstname,lastname,email_addr,profile_image FROM tbl_user as tu "
				 . " INNER JOIN tbl_usermeta AS tump ON (tu.id = tump.user_id AND tump.meta_key='union_training_centre') "
				 . " LEFT JOIN tbl_usermeta AS tum ON (tu.id = tum.user_id AND tum.meta_key='s1_public_page') WHERE status = 1 ".$whereUsers;
		}
		//echo $sql;die;
		$query 	= $this->db->query($sql);
		return (!$query) ? $this->common->dberror() : $query->result_array();
			//INNER JOIN tbl_usermeta AS tump ON (tu.id = tump.user_id AND tump.meta_key='union_training_centre')
			//LEFT JOIN tbl_usermeta AS tum ON (tu.id = tum.user_id AND tum.meta_key='s1_public_page') WHERE status = 1 AND type_id IN (7)   
	}
		
	function getDesignation($tblName='',$whereArr=array())
	{
		$sel_designationqry = 'SELECT dsg.st_designation as meta_key ,dsg.st_status as meta_value 
								FROM '.$tblName.' as dsg 
								LEFT JOIN tbl_user AS tu ON (dsg.in_worker_id = tu.id )
								WHERE tu.status = 1';
		if( $whereArr ) {
			foreach( $whereArr AS $key_where => $val_where ) {
				$sel_designationqry .= ' AND '.$key_where.' = "'.Common::escapeStr($val_where).'"';
			}
		}
		$query 	= $this->db->query($sel_designationqry);           
		if(!$query) {
			return $this->common->dberror();
		}
		else {
			$rows 	= $query->result_array();
			$meta_data = array();
			foreach($rows AS $row) {
				$meta_data[$row['meta_key']] = $row['meta_value'];
			}
			return $meta_data;
		}
	}

	function getDesignationData( $tblName='', $whereArr=array(), $groupBy='' )
	{
		$sel_designationqry = 'SELECT dsg.id AS id, dsg.st_designation AS meta_key ,dsg.st_status AS meta_value, in_worker_id, CONCAT(tu.firstname," ",tu.lastname) AS workername
								FROM '.$tblName.' As dsg 
								LEFT JOIN tbl_user AS tu ON (dsg.in_worker_id = tu.id )
								WHERE tu.status = 1 ';
		if( $whereArr ) {
			foreach( $whereArr AS $key_where => $val_where ) {
				$sel_designationqry .= ' AND '.$key_where.' = "'.Common::escapeStr($val_where).'"';
			}
		}
		($groupBy) ? $sel_designationqry .= " GROUP BY ".$groupBy : '';
		$sel_designation = $this->db->query($sel_designationqry);
		return (!$sel_designation) ? $this->common->dberror() : $sel_designation->result_array();
	}

        function getInstructorsFromConsultant($txt_username='')
		{
            $where_users = "";
            if($txt_username) {
                $where_users = " AND (CONCAT(firstname, ' ', lastname) LIKE '%".$txt_username."%' OR nickname LIKE '%".$txt_username."%' OR email_addr LIKE '%".$txt_username."%')";
			}
            $sql= "SELECT ec.in_worker_id,ec.in_employer_client_id,tu.firstname,tu.lastname 
					FROM tbl_employer_consultant_designations as ec
                    INNER JOIN tbl_user AS tu ON (ec.in_worker_id = tu.id)
                    WHERE ec.in_user_id=".$this->session->userdata("userid")." 
						AND (ec.st_designation = 'consultant_instructor' and ec.st_status='y')".$where_users;
						
            $query 	= $this->db->query($sql);            
            return (!$query) ? $this->common->dberror() : $query->result_array();
        }

		function getUnionLibraryCourses($whereArr=array())
		{
			$sel_unilibcourses_qry = 'SELECT tuc.id, tuc.in_instructor_id, tuc.in_library_id, tuc.st_campus_name, 
										tuc.in_course_code, tuc.dt_start_time, tlib.title, tlib.library_type_id, tlib.language 
										FROM tbl_union_courses AS tuc
										LEFT JOIN tbl_library AS tlib ON (tuc.in_library_id = tlib.library_id AND status=1)
										WHERE tuc.in_status = 1';
			if( $whereArr ) {
				foreach( $whereArr AS $key_where => $val_where ) {
					$sel_unilibcourses_qry .= ' AND '.$key_where.' = "'.Common::escapeStr($val_where).'"';
				}
			}
			$sel_unilibcourses_qry .= ' GROUP BY tuc.in_library_id';

			// echo $sel_unilibcourses_qry;
			$sel_unilibcourses = $this->db->query($sel_unilibcourses_qry);
			return (!$sel_unilibcourses) ? $this->common->dberror() : $sel_unilibcourses->result_array();
		}

		// Check id Selected Union from url, is Instructor's own union or included in his parent unions //
		function checkUnionIsInstructorsUnion($unionId='', $userId='')
		{
			// Get Union User ID of the Loggedin User //
				$access_for_training= '';
				$user_id = (int)$userId ? $userId : $this->sess_userid;
				$unions_of_user 	= $this->users->getMetaDataList("user_unions", "in_status=1 AND in_user_id='".$user_id."'", '', 'in_union_id' );

				if( isset($unions_of_user[0]['in_union_id']) ) {
					// common::pr($unions_of_user);
					foreach( $unions_of_user AS $key => $val ) {
						if( $unionId != $val['in_union_id'] && 'yes' != $access_for_training ) { // Union UserID of Loggedin User != Passed Union in url //
							$parent_unions_of_own_union	= $this->users->getUserMetaByID( $val['in_union_id'] );
							$parent_unions_of_own_union	= (isset($parent_unions_of_own_union['parent_unions']) && $parent_unions_of_own_union['parent_unions']) 
																? explode(",", $parent_unions_of_own_union['parent_unions']) : array();
							$access_for_training = (in_array($unionId, $parent_unions_of_own_union)) ? 'yes' : 'no';
						}
						else if( $unionId==$val['in_union_id'] && 'yes'!=$access_for_training ) { // Union UserID of Loggedin User == Passed Union in url //
							$access_for_training = 'yes';
						}
					}
				}
			return $access_for_training;
		}

		function checkIfMyUnion($unionId='', $userId='')
		{
			$user_id = (int)$userId ? $userId : '';
			$union_id = (int)$unionId ? $unionId : '';
			$unions_of_user = $this->users->getMetaDataList("user_unions", "in_status=1 AND in_user_id='".$user_id."' AND in_union_id='".$union_id."'", '', 'COUNT(in_user_union_id) AS is_my_union' );
			$is_my_union 		= isset($unions_of_user[0]['is_my_union']) ? $unions_of_user[0]['is_my_union'] : '';
			
			if( !$is_my_union ) {
				echo "Please update your profile";
			}
			else {
				echo "";
			}
		}
		
		function getSupervisorDetails($whereArr=array())
		{
			$this->db->from('tbl_crew_of_employers AS tcrewemp');
			$this->db->select('tu.firstname, tu.lastname, tcrewemp.in_supervisor_id AS id, tu.profile_image');
			$this->db->join('tbl_user AS tu','tcrewemp.in_supervisor_id=tu.id AND tcrewemp.in_crew_status=1', 'LEFT');

			isset($whereArr['crew_id']) ? $this->db->where('in_crew_id',$whereArr['crew_id']) : '';
			isset($whereArr['crew_employer_id']) ? $this->db->where('in_crew_employer_id',$whereArr['crew_employer_id']) : '';

			$sel_supervisor = $this->db->get();
			$rows_supervisor= (!$sel_supervisor) ? $this->common->dberror() : $sel_supervisor->result();

			return $rows_supervisor;
		}
		
		function checkAwarenessTrainingCompletedByUser($userType='')
		{
			if( trim($userType) ) {
				switch ($userType) {
					case "worker":
						$training_libraries = array(248,245,246,244);
						break;
					case "supervisor": 
						$training_libraries = array(365,368,369,370);	
						break;
					default:/*default bring awareness for workers*/
						$training_libraries = array(248,245,246,244);
				}
				$rows_training_progress = $this->users->getMetaDataList( 'reading_history', 'uid="'.$this->sess_userid.'" 
										AND library_id IN ('.implode(",",$training_libraries).')', '', 'progress,library_id' );
				foreach( $rows_training_progress AS $key_training_progress => $val_training_progress ) {
					$arr_training_progress[$rows_training_progress[$key_training_progress]['library_id']] =  $rows_training_progress[$key_training_progress]['progress'];
				}
				
				$arr_training_progress['training_libraries'] = $training_libraries;
				
				return $arr_training_progress;
			}
			else {
				return array();
			}
		}
}
?>