<?php
    require_once '../configs/config.php';
    require_once '../lib/mysql.func.php';
	connect();
	mysql_query("set names 'utf-8'");
	
	session_start();
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];
	
	//确认提交了表单
	if(isset($_POST['submit']))
	{
	    $name = $_POST['name'];
		$number = $_POST['number'];
    $grade = $_POST['grade'];
    $institute = $_POST['institute'];
    $major = $_POST['major'];
    //$class_id = $_POST['class'];
		$phone = $_POST['phone'];
		$time = date("Y-m-d H:m:s");
    

		$user = fetchAll("select * from user where name = '$name' and id='$id'");
		print_r($user);
		if($user)
		{

			    $result = mysql_query("update user set name='$name',number='$number',grade='$grade',institute='$institute',major='$major',class_id='$class_id',phone='$phone',modified = '$time' where name = '$name' and id='$id'");
				if($result) echo "<script>alert('个人信息修改成功');window.location.href='index.php';</script>";
				    else echo "<script>alert('个人信息修改失败');window.location.href='index.php';</script>";
		}
	}
?>
