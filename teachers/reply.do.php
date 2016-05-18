<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $teacher_id = $_SESSION['id'];
  $file_name = $_GET['file_name'];
  $question_content = $_POST['content'];

  //入库前进行校验
  if(!(isset($_POST['content'])&&(!empty($_POST['content'])))){
      echo "<script>alert('回答不能为空');window.location.href='reply.php?question=$file_name';</script>";
      exit();
  }
  
  
  $time = date("Y-m-d H:i:s");
  $sum = fetchAll("select * from total_table where file_name='$file_name' and type='reply'");
  $num = count($sum)+1;
  $question = array('file_name'=>"'$file_name'",
                    'file_data'=>"'$question_content'",
                    'type'=>"'reply'",
                    'file_type'=>"'$num'",
                    'upload_time'=>"'$time'",
                    'upload_user_id'=>"'$teacher_id'",
				            'upload_user_type'=>"'teacher'",
                    );
  $result = mysql_query("update total_table set status='1' where file_name='$file_name' and type='question'");
	$query = insert('total_table',$question);
  if($query && $result)
       echo "<script>alert('回答成功');window.location.href='instruct.php'</script>";
    else echo "<script>alert('回答失败');window.location.href='instruct.php'</script>";
?>