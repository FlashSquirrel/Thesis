<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $user_id = $_SESSION['id'];
  //入库前进行校验
  if(!(isset($_POST['notice_title'])&&(!empty($_POST['notice_title'])))){
      echo "<script>alert('标题不能为空');window.location.href='notice.php'</script>";
  }
  if(!(isset($_POST['notice_content'])&&(!empty($_POST['notice_content'])))){
      echo "<script>alert('内容不能为空');window.location.href='notice.php'</script>";
  }
  $notice_title = $_POST['notice_title'];
  $notice_content = $_POST['notice_content'];
  $time = date("Y-m-d H:i:s");
  $notice = array('file_name'=>"'$notice_title'",
                  'file_data'=>"'$notice_content'",
                  'type'=>"'notice'",
                  'upload_time'=>"'$time'",
                  'upload_usre_id'=>"'$user_id'",
                  'upload_user_type'=>"'administrator'",
                  );
  
	$query = insert('total_table',$notice);
  if($query)
       echo "<script>alert('发布成功');window.location.href='notice.php'</script>";
    else echo "<script>alert('发布失败');window.location.href='notice.php'</script>";
?>