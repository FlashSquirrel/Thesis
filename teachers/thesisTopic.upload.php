<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

  $thesis_id = $_GET['id'];
  $submit = $_GET['submit'];
  


//$_FILES:文件上传变量
//print_r($_FILES);打印上传文件的相关信息 
$filename=$_FILES['myFile']['name'];   //文件在客户端的名字
$type=$_FILES['myFile']['type'];   //文件类型
$tmp_name=$_FILES['myFile']['tmp_name'];   //文件上传到服务器上的临时名
$size=$_FILES['myFile']['size'];   //文件大小
$error=$_FILES['myFile']['error'];   //错误号

if(empty($filename)){
   echo "<script language=\"JavaScript\">alert(\"请先选择要上传的文件\");window.location.href='thesisTopic.php';</script>";
}
//将服务器上的临时文件移到指定目录下

if($error==UPLOAD_ERR_OK)
{
    if(move_uploaded_file($tmp_name,iconv("UTF-8","gb2312","../uploads/teacher/".$filename)))
	{
		//存入数据库：mysql_query('insert into upload(filename) values('$filename')');
    $time = date("Y-m-d H:i:s");
	
	if($submit=="申报表")
        $result = mysql_query("update thesis_title set create_ask_table='$filename',created='$time' where id='$thesis_id'");
	else if($submit=="任务书")
	    $result = mysql_query("update thesis_title set create_task_book='$filename',created='$time' where id='$thesis_id'");
     if($result)
		echo "<script language=\"JavaScript\">alert(\"上传成功\");window.location.href='thesisTopic.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"上传失败\");window.location.href='thesisTopic.php';</script>";
}else{
    echo "<script language=\"JavaScript\">alert(\"上传文件出错\");window.location.href='thesisTopic.php';</script>";
}
}
?>