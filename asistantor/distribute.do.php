<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'gb2312'");

  if($submit)
  {
      $major = $_POST['major'];
      $class = $_POST['class'];
      $student_name = $_POST['student'];
      $thesis_title = $_POST['thesis'];
  }
	$array = array('major'=>"$major",
                 'class'=>"$calss",
                 'student_name'=>"$student_name",
                 'thesis_title'=>"$thesis_title",
                 );
	$query = insert($student_choose_thesis_title,$array);
    if($query)
        echo "添加成功";
    else echo "添加失败";
?>