<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

  $user_id = $_SESSION['id'];
  $thesis_type = $_GET['type'];

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
    if(move_uploaded_file($tmp_name,iconv("UTF-8","gb2312","../uploads/thesis/".$filename)))
    {
		//存入数据库：mysql_query('insert into upload(filename) values('$filename')');

    $time = date("Y-m-d H:i:s");
    $file = array('file_name'=>"'$filename'",
                  'file_type'=>"'$type'",
                  'file_size'=>"'$size'",
                  'upload_time'=>"'$time'",
                  'type'=>"'$thesis_type'",
				          'upload_user_id'=>"'$user_id'",
				          'upload_user_type'=>"'student'",
                  );
     $result = insert('total_table',$file);
       if($thesis_type=='thesis_report')
       {
           $query = mysql_query("update students set thesis_report = '$filename' where student_id = '$id'");
       }
       else if($thesis_type=='thesis_literature')
       {
           $query = mysql_query("update students set thesis_literature = '$filename' where student_id = '$id'");
       }
       else if($thesis_type=='thesis_translation')
       {
           $query = mysql_query("update students set thesis_translation = '$filename' where student_id = '$id'");
       }
       else if($thesis_type=='thesis_content')
       {
           $query = mysql_query("update students set thesis_content = '$filename' where student_id = '$id'");
       }
       else if($thesis_type=='thesis_summary')
       {
           $query = mysql_query("update students set thesis_summary = '$filename' where student_id = '$id'");
       }
       else if($thesis_type=='thesis_final')
       {
           $query = mysql_query("update students set thesis_final = '$filename' where student_id = '$id'");
       }
     
     if($result && $query)
		     echo "<script language=\"JavaScript\">alert(\"文件.$filename.上传成功\");window.location.href='myThesis.php';</script>";
    else
	    echo "<script language=\"JavaScript\">alert(\"文件.$filename.上传失败\");window.location.href='myThesis.php';</script>";
   }
   else
       echo "<script language=\"JavaScript\">alert(\"上传文件出错\");window.location.href='myThesis.php';</script>";
}

?>