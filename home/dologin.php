<?php
//开启一个会话
if(!isset($_SESSION)){  
   session_start();  
} 

//require_once '../include.php';
require_once '../lib/mysql.func.php';
connect();
mysql_query("SET NAMES 'utf-8'");


/**
//如果用户未登录，即未设置$_SESSION['id']时，执行以下代码
if(!isset($_SESSION['id']))
{
    if(isset($_POST['submit']))
    {//用户提交登录表单时执行如下代码

         $username=$_POST['username'];
         $password=$_POST['password'];
	       $user_id=$_POST['user_id']; 
   
    
            $result=fetchAll("select * from user where name like '$username'");
            print_r($result);
       foreach($result as $colum)
      {
          print_r($colum);
         if(($colum['name']==$username)&&($colum['password']==$password))
         {
             $_SESSION['id']=$colum['id'];
             $_SESSION['name']=$colum['name'];
            if($user_id=="teacher")
                   echo "<script>location.href='../teachers/index.php';</script>";
               else if($user_id=="student")
                     echo "<script>location.href='../students/index.php';</script>";
               else if($user_id=="administrator")
                     echo "<script>location.href='../administrator/index.php';</script>";
               else if($user_id=="asistantor")
                     echo "<script>location.href='../asistantor/index.php';</script>";
                 else echo "<script>alert('请选择正确的身份信息');window.location.href='login.php';</script>";
            }
            else echo "<script>alert('密码错误');window.location.href='login.php';</script>";
           
       }
       }
      else echo "<script>alert('请重新核对信息');window.location.href='login.php';</script>";
      }
      else{//如果用户已经登录，则直接跳转到已经登录页面
    //$home_url = '../teachers/index.php';
     if($colum['belong_to']=="teacher")
                   $home_url = '../teachers/index.php';
               else if($colum['belong_to']="student")
                   $home_url = '../students/index.php';
               else if($colum['belong_to']=="administrator")
                   $home_url = '../administrator/index.php';
               else if($colum['belong_to']=="asistantor")
                   $home_url = '../asistantor/index.php';
    header('Location: '.$home_url);
}

**/

//如果用户未登录，即未设置$_SESSION['id']时，执行以下代码

 if(isset($_POST['submit']))
 {
 
    $username=$_POST['username'];
    $password=$_POST['password'];
	  $user_id=$_POST['user_id'];
   
    
    if($username=="")
    {
       echo "<script>alert('请填写用户名');window.location.href='login.php';</scriipt>";    
    }
    else if($password=="")
       echo "<script>alert('请输入密码');window.location.href='login.php';</scriipt>";
    else if($user_id=="")
       echo "<script>alert('请选择登录身份');window.location.href='login.php';</scriipt>";
   else
   {
      $result=fetchAll("select * from user where name like '$username'");
      if(!empty($result))
      {
        foreach($result as $colum)
        {
         if(($colum['name']==$username)&&($colum['password']==$password)&&($colum['belong_to']==$user_id))
         {
             $_SESSION['id']=$colum['id'];
             $_SESSION['name'] = $colum['name'];
            if($user_id=="teacher")
             {
                   echo "<script>location.href='../teachers/index.php';</script>";
             }else if($user_id=="student")
              {
                   echo "<script> location.href='../students/index.php';</script>";
               }else if($user_id=="administrator")
                   {
                        echo "<script>location.href='../administrator/index.php';</script>";
                   }else if($user_id=="asistantor")
                        {
                             echo "<script> location.href='../asistantor/index.php';</script>";
                        }
           }else echo "<script>alert('密码不正确，请认真核对');window.location.href='login.php';</script>";
         
         }//foreach结束
        } 
         else echo "<script>alert('该用户信息不存在，请认真核对');window.location.href='login.php';</script>";
      }
  
}

?>