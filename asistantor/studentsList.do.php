<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'gb2312'");
	$student = fetchAll("select * from user ");
?>