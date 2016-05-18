<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $student_id = $_SESSION[id];
  $question_title = $_GET['file_name'];
  //入库前进行校验
  $result = fetchAll("select * from total_table where file_name='$question_title' and type='question'");
  $num = count($result)+1;
  $question_content = $_POST['content'];
  $time = date("Y-m-d H:i:s");
  $question = array('file_name'=>"'$question_title'",
                  'file_data'=>"'$question_content'",
                  'type'=>"'question'",
				  'file_type'=>"'$num'",
                  'upload_time'=>"'$time'",
				  'upload_user_id'=>"'$student_id'",
				  'upload_user_type'=>"'student'",
                  );
  
	$query = insert('total_table',$question);
  if($query)
       echo "<script>alert('追问成功');window.location.href='myThesis.question.php';</script>";
    else echo "<script>alert('追问失败');window.location.href='myThesis.question.php';</script>";
?>