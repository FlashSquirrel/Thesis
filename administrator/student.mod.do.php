<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

   for($i=0;$i<count($name);$i++)
  {
  $student_id = $_GET['id'];
   $number = $_POST['number'][$i];
   $name = $_POST['name'][$i];
  $sex = $_POST['sex'][$i];
  $institute = $_POST['institute'][$i];
  $major = $_POST['major'][$i];
 $political_class = $_POST['political_class'][$i];
  $grade = $_POST['grade'][$i];
  $birthday =$_POST['birthday'][$i]; 
  $political_status = $_POST['political_status'][$i];
  $national = $_POST['national'][$i];
  $phone = $_POST['phone'][$i];
  $time = date("Y-m-d H:i:s");

   $result = mysql_query("update user set number='$number',name='$name',sex='$sex',major='$major',political_class='$political_class',grade='$grade',birthday='$birthday',
   political_status='$political_status',national='$national',phone='$phone',modified='$time' WHERE id='$student_id'");
				 
     if($result)
		echo "<script language=\"JavaScript\">alert(\"修改成功\");window.location.href='student.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"修改失败\");window.location.href='student.php';</script>";
}
 

?>