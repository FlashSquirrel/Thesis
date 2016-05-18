<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

  $img_id = $_GET['id'];

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
    if(move_uploaded_file($tmp_name,"../uploads/img/".$filename))
	{
		//存入数据库：mysql_query('insert into upload(filename) values('$filename')');
       $time = date("Y-m-d H:i:s");
  //  $file = array('file_name'=>"'$filename'",
    //              'file_type'=>"'$type'",
      //            'file_size'=>"'$size'",
        //          'upload_time'=>"'$time'",
          //        );
    // $result = update('total_table',$file,'id'==$id);

	$result = mysql_query("update total_table set file_name='$filename',file_size='$size',upload_time='$time' WHERE id='$img_id'");

     if($result)
		echo "<script language=\"JavaScript\">alert(\"修改成功\");window.location.href='img.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"修改失败\");window.location.href='img.php';</script>";
   }else{
        echo "<script language=\"JavaScript\">alert(\"修改文件出错\");window.location.href='img.php';</script>";
   }
}

?>