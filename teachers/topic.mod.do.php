<?php
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

	$thesis_id=$_GET['id'];
	$title=$_POST['title'];
	$title_content=$_POST['title_content'];
	$original=$_POST['original'];
	$type=$_POST['type'];
	$difficulty=$_POST['difficulty'];
	$weight=$_POST['weight'];
	$synthesis=$_POST['synthesis'];
	$science=$_POST['belong_to_science'];
	$train_place=$_POST['train_place'];
	$use_computer_num=$_POST['use_computer_num'];
	$manchine=$_POST['manchine'];
	$software=$_POST['software'];
	$time=date("Y-m-d H:i:s");//时间戳
  


	$thesis_title = array('title'=>"$title",
	               'title_content'=>"$title_content",
				   'original'=>"$original",
				   'type'=>"$type",
				   'difficulty'=>"$difficulty",
				   'weight'=>"$weight",
				   'synthesis'=>"$synthesis",
				   'belong_to_science'=>"$science",
				   'train_place'=>"$train_place",
				   'use_computer_num'=>"$use_computer_num",
				   'manchine'=>"$manchine",
				   'software'=>"$software",
           'modified'=>"$time",
           );

  $query = mysql_query("update thesis_title set title='$title',title_content='$thesis_content',original='$original',type='$type',difficulty='$difficulty',weight='$weight',
  synthesis='$synthesis',belong_to_science='$science',train_place='$train_place',use_computer_num='$use_computer_num',manchine='$manchine',software='$software',modified='$time' where id='$thesis_id'");
    if($query)
        echo "<script>alert('修改成功');window.location.href='thesisTopic.php';</script>";
    else echo "<script>alert('修改失败');window.location.href='thesisTopic.php';</script>";
?>