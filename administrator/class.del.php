<?php
  require_once "../include.php";
  connect();
 mysql_query("SET NAMES 'utf-8'");
 
  $class_id = $_GET['id'];
  $sql="delete from class where id = '$class_id'";
  $delete=mysql_query($sql);
  //$delete = delete('class','id'==$reult['id']);
  if($delete){
      echo "<script>alert('班级信息删除成功');window.location.href='class.php';</script>;";
  }else{
      echo "<script>alert('班级信息删除失败');window.location.href='class.php';</script>";
  }
?>