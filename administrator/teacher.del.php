<?php
  require_once "../include.php";
  connect();
 
  $teacher_id = $_GET['id'];
  //print_r($id);
  $sql="delete from user where id = '$teacher_id'";
  $delete=mysql_query($sql);
  //$delete = delete('user','id'==$id);
  if($delete){
      echo "<script>alert('教师信息删除成功');window.location.href='teacher.php';</script>";
  }else{
      echo "<script>alert('教师信息删除失败');window.location.href='teacher.php';</script>";
  }
?>