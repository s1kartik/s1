<?php
// $con = mysql_connect("ip-72-167-35-104.ip.secureserver.net", 'dbdevsafe', 'Safdev#1');
$con = mysql_connect("72.167.35.104", 'dbdevsafe', 'Safdev#1') or die(mysql_error());
$db = mysql_select_db("dbdevsafe", $con) or die(mysql_error());
mysql_query("update tbl_library set status=127 where status=1");
?>