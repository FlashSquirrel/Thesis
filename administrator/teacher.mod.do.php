<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

   for($i=0;$i<count($name);$i++)
  {
  $teacher_id = $_GET['id'];
   $name = $_POST['name'][$i];
  $sex = $_POST['sex'][$i];
  $institute = $_POST['institute'][$i];
  $major = $_POST['major'][$i];
  $number = $_POST['number'][$i];
  $position = $_POST['position'][$i];
  $birthday =$_POST['birthday'][$i]; 
  $political_status = $_POST['political_status'][$i];
  $national = $_POST['national'][$i];
  $email = $_POST['email'][$i];
  $phone = $_POST['phone'][$i];
  $time = date("Y-m-d H:i:s");

   $result = mysql_query("update user set number='$number',name='$name',sex='$sex',major='$major',position='$position',birthday='$birthday',political_status='$political_status',
                   national='$national',email='$email',phone='$phone',modified='$time' WHERE id='$teacher_id'");
				 
     if($result)
		echo "<script language=\"JavaScript\">alert(\"修改成功\");window.location.href='teacher.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"修改失败\");window.location.href='teacher.php';</script>";
}
 

?>