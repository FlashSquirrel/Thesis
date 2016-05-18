<?php
  require_once  '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
 
 if(isset($_POST['submit']))
 {
 
      $student_id = $_GET['id'];
      $thesis_title = $_POST['thesis'];
      $time = date("Y-m-d H:m:s");

	$array = array('student_id'=>"'$student_id'",
                 'thesis_title_id'=>"'$thesis_title'",
                 'created'=>"'$time'",
                 );
	  $query = insert('student_choose_thesis_title',$array);
    if($query)
        echo "<script>alert('分配成功');window.location.href='student.noThesis.php';</script>";
    else echo "<script>alert('分配失败');window.location.href='student.noThesis.php';</script>";
   }
?>