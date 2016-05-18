<?php
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

  $major_name = $_POST['major_name'];
  $class_name = $_POST["class_name"];
  $class_id = $_POST['class_id'];
  $result = fetchOne("select * from major where major_name='$major_name'");
 // print_r($result);
  $major_id = $result[0]['id'];
	$class = array('id'=>"'$major_id$class_id'",'major_id'=>"'$major_id'",'class_name'=>"'$class_name'");
  print_r($class);
	$query = insert('class',$class);
  if(!$query)
        echo "<script>alert('班级添加成功');window.location.href='class.php';</script>";
    else echo "<script>alert('班级添加失败');window.location.href='class.php';</script>";
?>