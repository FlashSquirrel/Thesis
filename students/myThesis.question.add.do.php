<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $id = $_SESSION[id];
  //入库前进行校验
  if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
      echo "<script>alert('问题不能为空');window.location.href='myThesis.question.php'</script>";
  }
  $question_title = $_POST['title'];
  $time = date("Y-m-d H:i:s");
  $question = array('file_name'=>"'$question_title'",
                  'type'=>"'question'",
                  'file_type'=>"'1'",
                  'upload_time'=>"'$time'",
				          'upload_user_id'=>"'$id'",
				          'upload_user_type'=>"'student'",
                  );
  
	$query = insert('total_table',$question);
  if($query)
       echo "<script>alert('提交成功');window.location.href='myThesis.question.php'</script>";
    else echo "<script>alert('提交失败');window.location.href='myThesis.question.php'</script>";
?>