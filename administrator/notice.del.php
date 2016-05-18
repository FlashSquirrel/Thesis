<?php
  require_once "../include.php";
  connect();
 
  $notice_id = $_GET['id'];
  //print_r($id);
  $sql="delete from total_table where id = '$notice_id'";
  $delete=mysql_query($sql);

  if($delete){
      echo "<script>alert('文件删除成功');window.location.href='notice.php';</script>";
  }else{
      echo "<script>alert('文件删除失败');window.location.href='notice.php';</script>";
  }
?>