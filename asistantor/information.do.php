<?php
    require_once '../configs/config.php';
    require_once '../lib/mysql.func.php';
	connect();
	mysql_query("set names 'utf-8'");
	
	session_start();
	$id = $_SESSION['id'];
	$name = $_SESSION['name'];
	
	//ȷ���ύ�˱�
	if(isset($_POST['submit']))
	{
	    $name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$time = date("Y-m-d H:m:s");

		$user = fetchAll("select * from user where name = '$name' and id='$id'");
		print_r($user);
		if($user)
		{

			    $result = mysql_query("update user set name='$name',email='$email',phone='$phone',modified = '$time' where name = '$name' and id='$id'");
				if($result) echo "<script>alert('������Ϣ�޸ĳɹ�');window.location.href='index.php';</script>";
				    else echo "<script>alert('������Ϣ�޸�ʧ��');window.location.href='index.php';</script>";
		}
	}
?>
