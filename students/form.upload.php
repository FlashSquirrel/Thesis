﻿<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf8'");

  //session_start();
  $id = $_SESSION['id'];
  $thesis_type = 'form';
  print_r($thesis_type);

//$_FILES:文件上传变量
//print_r($_FILES);打印上传文件的相关信息 
$filename=$_FILES['myFile']['name'];   //文件在客户端的名字
$type=$_FILES['myFile']['type'];   //文件类型
$tmp_name=$_FILES['myFile']['tmp_name'];   //文件上传到服务器上的临时名
$size=$_FILES['myFile']['size'];   //文件大小
$error=$_FILES['myFile']['error'];   //错误号

//将服务器上的临时文件移到指定目录下

if($error==UPLOAD_ERR_OK)
{
    if(move_uploaded_file($tmp_name,iconv("UTF-8","gb2312","../uploads/form/".$filename))){
		//存入数据库：mysql_query('insert into upload(filename) values('$filename')');
    $time = date("Y-m-d H:m:s");
    $file = array('file_name'=>"'$filename'",
                  'file_type'=>"'$type'",
                  'file_size'=>"'$size'",
                  'upload_time'=>"'$time'",
                  'type'=>"'$thesis_type'",
                  'status'=>"'3'",
				  'upload_user_id'=>"'$id'",
				  'upload_user_type'=>"'student'",
                  );
     $result = insert('total_table',$file);
     if(!$result)
		echo "<script language=\"JavaScript\">alert(\"文件.$filename.上传成功\");window.location.href='form.php';</script>";
    }
    else{
	    echo "<script language=\"JavaScript\">alert(\"文件.$filename.上传失败\");window.location.href='form.php';</script>";
	}
}else{
    echo "<script language=\"JavaScript\">alert(\"上传文件出错\");window.location.href='form.php';</script>";
}

?>