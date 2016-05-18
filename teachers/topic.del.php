<?php
  session_start();
  require_once '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
	

  $user_id = $_SESSION['id'];
	$thesis_id = $_GET['id'];
  
  $sql="delete from thesis_title where id = '$thesis_id'";
  $delete=mysql_query($sql);
  
	if($delete){
	    echo "<script>alert('删除成功');window.location.href='thesisTopic.php';</script>";
	}else{
	    echo "<script>alert('删除失败');window.location.href='thesisTopic.php';</script>";
	}


?>