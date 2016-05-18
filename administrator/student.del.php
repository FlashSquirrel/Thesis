<?php
  require_once "../include.php";
  connect();
 mysql_query("SET NAMES 'utf-8'");
 
  $user_id = $_GET['id'];
  $sql="delete from user where id = '$user_id'";
  $delete=mysql_query($sql);
  //$delete = delete('user','id'==$reult['id']);
  if($delete){
      echo "<script>alert('学生信息删除成功');window.location.href='student.php';</script>;";
  }else{
      echo "<script>alert('学生信息删除失败');window.location.href='student.php';</script>";
  }
?>