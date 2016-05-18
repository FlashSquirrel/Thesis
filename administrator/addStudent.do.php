<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'UTF-8'");

//将数据录入到数据库中
if($submit2==true){
  for($i=0;$i<count($name);$i++)
  {
     $number = $_POST['number'][$i];
     $name = $_POST['name'][$i];
     $sex = $_POST['sex'][$i];
     $institute = $_POST['institute'][$i];
     $major = $_POST['major'][$i];
     $political_class=$_POST['political_class'][$i];
     $grade = $_POST['grade'][$i];
     $birthday = $_POST['birthday'][$i];
     $political_status = $_POST['political_status'][$i];
     $national = $_POST['national'][$i];
     $school_day = $_POST['grade'][$i];
     $phone = $_POST['phone'][$i];
     $time = date("Y-m-d H:i:s");
     $created = $_SESSION['name'];
	$student = array('number'=>"'$number'",
                 'name'=>"'$name'",
                 'sex'=>"'$sex'",
                 'institute'=>"'$institute'",
                 'major'=>"'$major'",
                 'political_class'=>"'$political_class'",//行政班
                 'grade'=>"'$grade'",
                 'birthday'=>"'$birthday'",
                 'political_status'=>"'$political_status'",//政治面貌
                 'national'=>"'$national'",  //民族
					      // 'school_day'=>"$school_day",//入学日期
                 'phone'=>"$phone",
                 'password'=>"$number",
                 'belong_to'=>"'student'",
                 'created'=>"'$time'",
                 'created_by'=>"'$created'",
                 );
                 //print_r($student);
      $query = insert('user',$student);
  }
if(!$query)
        echo "<script>alert('学生添加成功');window.location.href='student.php';</script>";
    else echo "<script>alert('学生添加失败');window.location.href='student.php';</script>";
}
?>