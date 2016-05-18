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
	    $pwd = $_POST['pwd'];
		$pwd1 = $_POST['pwd1'];
		$pwd2 = $_POST['pwd2'];
		$time = date("Y-m-d H:m:s");

		$user = fetchAll("select * from user where password='$pwd' and name = '$name' and id='$id'");
		if($user)
		{
		    if($pwd1==$pwd2)
			{
			    $result = mysql_query("update user set password='$pwd2',modified = '$time' where name = '$name' and id='$id'");
				if($result) echo "<script>alert('密码修改成功');window.location.href='index.php';</script>";
				    else echo "<script>alert('密码修改失败');window.location.href='index.php';</script>";
			}
			else echo "<script>alert('两次输入的新密码不同，请重新输入！');window.location.href='password_change.php';</script>";
		}
		else echo "<script>alert('旧密码不正确，请重新输入！');window.location.href='password_change.php';</script>";
	}
?>
