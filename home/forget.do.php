<?php 
    require_once ('../lib/mysql.func.php');
	connect();
	mysql_query("set names 'utf-8'");

	if(isset($_POST['submit']))
	{
	   $name = $_POST['name'];
	   $number = $_POST['number'];

	   $result = fetchAll("select * from user where name='$name' and number = '$number'");

	   if(!empty($result))
	   {
	      echo "<script>alert('你的新密码是：000000，登录后请及时修改密码' );</script>";
		  $result = mysql_query("update user set password='000000' where name='$name' and number = '$number'");
	   }
	   else echo "<script>alert('信息出错，找回失败');</script>";
	}
?>