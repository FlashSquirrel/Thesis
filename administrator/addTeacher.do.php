<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

    for($i=0;$i<count($name);$i++)
  {
   $teacher_name = $_POST['name'][$i];
  $sex = $_POST['sex'][$i];
  $institute = $_POST['institute'][$i];
  $major = $_POST['major'][$i];
  $number = $_POST['number'][$i];
  $position = $_POST['position'][$i];
  $birthday =$_POST['birthday'][$i]; 
  $political_status = $_POST['political_status'][$i];
  $national = $_POST['natinal'][$i];
  $email = $_POST['email'][$i];
  $phone = $_POST['phone'][$i];
  $time = date("Y-m-d H:i:s");
  $created = $_SESSION['name'];
  
	$array = array('number'=>"'$number'",
                 'name'=>"'$teacher_name'",
                 'sex'=>"'$sex'",
                 'institute'=>"'$institute'",
                 'major'=>"'$major'",
                 'position'=>"'$position'",
                 'birthday'=>"'$birthday'",
                 'political_status'=>"'political_status'",
                 'national'=>"'national'",
                 'email'=>"'$email'",
                 'phone'=>"'$phone'",
                 'belong_to'=>"'teacher'",
                 'created'=>"'$time'",
                 'created_by'=>"'$created'",
                 'password'=>"'$number'",
                 );

      $query = insert('user',$array);
  }
   if($query)
        echo "<script>alert('教师信息添加成功');window.location.href='teacher.php';</script>";
    else echo "<script>alert('教师信息添加失败');window.location.href='teacher.php';</script>";
?>