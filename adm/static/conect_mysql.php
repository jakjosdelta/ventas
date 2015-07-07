<?php
include('site_config.php');
$link = mysql_connect($db_host,$db_user,$db_password);
mysql_select_db($db_name, $link);
?>