<?php 
function validateMetaData($table, $field, $value, $where='')
{
	global $db;
	if( !empty($value) ) {
		// $value = $this->common->escapeStr($value);

		$sql 		= "SELECT id FROM $table WHERE $field = '$value'";
		$where ? $sql .= " AND ".$where : '';
		$sql 		.= " LIMIT 1";
		$query 		= mysql_query($sql);	
		$num_rows 	= mysql_num_rows($query);

		return ($num_rows > 0) ? 'false' : 'true';
	}
	else {
		return 'false'; // Invalid post value
	}
}

function blockAccount($email)
{
	$sql = "UPDATE tbl_user SET status = -1 WHERE email_addr='".$email."' LIMIT 1";
	return mysql_query($sql);
}

function userCheck($email, $password)
{
	// $email = $this->common->escapeStr($email);
	// $password = $this->common->escapeStr($password);  
	$sql 	= "SELECT * FROM tbl_login_users WHERE email_addr='$email' AND password='".md5($password)."' LIMIT 1";
	$query 	= mysql_query($sql);
	$rows = mysql_fetch_assoc($query);
	return $rows;
}
?>