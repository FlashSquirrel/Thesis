<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

  $form_id = $_GET['id'];
  $number = $_POST['number'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $time = date("Y-m-d H:i:s");
  $result = mysql_query("update user set number='$number',name='$name',sex='$sex',email='$email',phone='$phone',modified='$time' WHERE id='$form_id'");

     if($result)
		echo "<script language=\"JavaScript\">alert(\"修改成功\");window.location.href='asistantor.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"修改失败\");window.location.href='asistantor.php';</script>";

?>