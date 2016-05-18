<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
 
 // if(isset($submit))
 // {

      $major = $_POST['type'];
      $class = $_POST['ctype'];
      $student_id = $_POST['dtype'];
      $thesis_title = $_POST['thesis'];
      $time = date("Y-m-d H:m:s");
    
	$array = array('student_id'=>"'$student_id'",
                 'thesis_title_id'=>"'$thesis_title'",
                 'created'=>"'$time'",
                 );
     // print_r($array);
	  $query = insert('student_choose_thesis_title',$array);
    if(!$query)
        echo "<script>alert('分配成功');window.location.href='teacherDistribute.php';</script>";
    else echo "<script>alert('分配失败');window.location.href='teacherDistribute.php';</script>";
   // }
?>