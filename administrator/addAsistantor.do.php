<?php
  session_start();
  require_once '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $created = $_SESSION['name'];
  if(isset($_POST['submit']))
  {
  $number = $_POST['number'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $time = date("Y-m-d H:i:s");
	$asistantor = array(
                 'number'=>"'$number'",
                 'name'=>"'$name'",
                 'sex'=>"'$sex'",
                 'email'=>"'$email'",
                 'phone'=>"'$phone'",
                 'belong_to'=>"'asistantor'",
                 'created'=>"'$time'",
                 'password'=>"'$number'",
                 'created_by'=>"'$created'",
                 );

	$query = insert('user',$asistantor);

    if($query)
        echo "<script>alert('成功添加学科秘书');window.location.href='asistantor.php';</script>";
    else echo "<script>alert('学科秘书添加失败');window.location.href='asistantor.php';</script>";
    }

?>