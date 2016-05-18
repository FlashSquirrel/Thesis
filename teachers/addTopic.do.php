<?php
  session_start();
  require_once '../lib/mysql.func.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
 
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$title_content=$_POST['title_content'];
	$original=$_POST['original'];
	$type=$_POST['type'];
	$difficulty=$_POST['difficulty'];
	$weight=$_POST['weight'];
	$synthesis=$_POST['synthesis'];
	$scientific=$_POST['belong_to_science'];
	$train_place=$_POST['train_place'];
	$use_computer_num=$_POST['use_computer_num'];
	$manchine=$_POST['manchine'];
	$software=$_POST['software'];
	$time=date("Y-m-d H:i:s");//时间戳
  $teacher_id =$_SESSION['id'];
  
	$thesis = array('title'=>"'$title'",
                 'title_content'=>"'$title_content'",
                 'original'=>"'$original'",
                 'type'=>"'$type'",
                 'difficulty'=>"'$difficulty'",
                 'weight'=>"'$weight'",
                 'synthesis'=>"'$synthesis'",
                 'belong_to_science'=>"'$scientific'",
                 'train_place'=>"'$train_place'",
                 'use_computer_num'=>"'$use_computer_num'",
                 'manchine'=>"'$manchine'",
                 'software'=>"'$software'",
                 'created'=>"'$time'",
                 'teacher_id'=>"'$teacher_id'",
                 );
                 //print_r($thesis);
	$query = insert('thesis_title',$thesis);
    if($query)
        echo "<script>alert('新的论文题目添加成功');window.location.href='thesisTopic.php';</script>";
    else echo "<script>alert('论文题目添加失败');window.location.href='thesisTopic.php';</script>";
    

}
?>