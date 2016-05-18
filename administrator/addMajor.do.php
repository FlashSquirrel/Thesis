<?php
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $institute = $_POST['institute'];
  $major_name = $_POST['major_name'];
  $major_num = $_POST['major_num'];
	$major = array('institute'=>"'$institute'",
                 'major_name'=>"'$major_name'",
                 'id'=>"'$major_num'",
                 );
	$query = insert('major',$major);
    if(!$query)
        echo "<script>alert('专业添加成功');window.location.href='major.php';</script>";
    else echo "<script>alert('专业添加失败');window.location.href='major.php';</script>";
?>