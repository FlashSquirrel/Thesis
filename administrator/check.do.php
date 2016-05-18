<?php
    require_once '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

	if(isset($_POST['submit']))
	{
	$check_id = $_GET['id'];
	$reviw = $_POST['review'];
	$submit = $_POST['submit'];

	if($submit=="通过审核")
	    $status = '1';
	else if($submit == "不通过审核")
	    $status = '2';
	
	$query = mysql_query("update thesis_title set review='$review',status='$status' WHERE id = '$check_id'");
	 if($query)
        echo "<script>alert('审核完毕');window.location.href='thesisTopic.php';</script>";
    else echo "<script>alert('审核信添加失败');window.location.href='thesisTopic.php';</script>";
	}
?>