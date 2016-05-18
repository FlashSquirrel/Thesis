<?php
  require_once "../include.php";
  connect();
 mysql_query("SET NAMES 'utf-8'");
 
  $major_id = $_GET['id'];
  $sql="delete from major where id = '$major_id'";
  $delete=mysql_query($sql);

  if($delete){
      echo "<script>alert('专业信息删除成功');window.location.href='major.php';</script>;";
  }else{
      echo "<script>alert('专业信息删除失败');window.location.href='major.php';</script>";
  }
?>