<?php
  require_once  '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
 
 if(isset($_POST['submit']))
 {
 
      $student_id = $_GET['id'];
      $thesis_title = $_POST['thesis'];
      $time = date("Y-m-d H:m:s");

	$query = mysql_query("update student_choose_thesis_title set thesis_title=$thesis_title where student_id=$student_id");
    if(!$query)
        echo "<script>alert('修改成功');window.location.href='teacherDistribute.php';</script>";
    else echo "<script>alert('修改失败');window.location.href='teacherDistribute.php';</script>";
   }
?>