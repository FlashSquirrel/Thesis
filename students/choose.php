<?php
    require_once ('../include.php');
	connect();
	mysql_query("set names 'utf-8'");
	//session_start();
	$user_id = $_SESSION['id'];
	$user = fetchAll("select * from user where id = '$user_id'");

	if(isset($_POST['choose']))
	{
      
	    	$thesis_title_id = $_GET['id'];
		    $student_id = $user[0]['id'];
		
	    	$time = date("Y-m-d H:m:s");
	    	$student_choose_result = array('student_id'=>"'$student_id'",
		                               'thesis_title_id'=>"'$thesis_title_id'",
									   'created'=>"'$time'",
									   );
        $student = array('student_id'=>"'$student_id'",
		                  'title_id'=>"'$thesis_title_id'",
									   'created'=>"'$time'",
									   );
	    	$query = insert('student_choose_thesis_title',$student_choose_result);
        $result = insert('students',$student);
	    	if(!$query && (result))
           echo "<script>alert('选择成功');window.location.href='thesisTopic.php';</script>";
        else echo "<script>alert('选择失败');window.location.href='thesisTopic.php';</script>";

	}
?>