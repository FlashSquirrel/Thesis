<?php
  require_once "../include.php";
  connect();
 
  $asistantor_id = $_GET['id'];
  $sql="delete from user where id = '$asistantor_id'";
  $delete=mysql_query($sql);
  if($delete){
      echo "<script>alert('学科秘书删除成功');window.location.href='asistantor.php';</script>";
  }else{
      echo "<script>alert('学科秘书删除失败');window.location.href='asistantor.php';</script>";
  }
?>