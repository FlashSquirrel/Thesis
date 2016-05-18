<?php
  require_once "../include.php";
  connect();
 mysql_query("SET NAMES 'utf-8'");
 
  $thesis_id = $_GET['id'];
  $sql="delete from student_choose_thesis_title where id = '$thesis_id'";
  $delete=mysql_query($sql);
  //$delete = delete('user','id'==$result['id']);
  if($delete){
      echo "<script>alert('删除成功');window.location.href='teacherDistribute.php';</script>;";
  }else{
      echo "<script>alert('删除失败');window.location.href='teacherDistribute.php';</script>";
  }
?>