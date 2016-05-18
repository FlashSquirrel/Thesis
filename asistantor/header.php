<?php
    require_once ('../include.php');
	if(!isset($_SESSION['id']))
	{
	    header("Location:../home/login.php");
		exit();
	}
	connect();
	mysql_query("set names 'utf-8'");
	//session_start();
	$id = $_SESSION['id'];
	$user = fetchAll("select * from user where id = '$id'");
	error_reporting( E_ALL&~E_NOTICE );

?>

<!DOCTYPE>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>本科毕业论文（设计）信息化管理平台</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
  </head>
  <body>
    <div class="top"></div>
    <div id="header" style="background-image:url(images/bg.jpg);">
      <div class="logo">毕业论文（设计）信息化管理平台</div>
      <div class="navigation">
        <ul>
		<li style="color:#005ab5">
		   <p><?php echo $user[0][name];?></p>
		</li>
          <li>
            <a href="password_change.php">修改密码</a>
          </li>
          <li>
            <a href="information.php">设置</a>
          </li>
          <li>
            <a href="../home/loginout.do.php?action=logout">退出</a>
          </li>
        </ul>
      </div>
    </div>
    <div id="content">
      <div class="left_menu">
        <ul id="nav_dot">
          <li>
            <h4 class="M1">
              <span></span>
              分配
            </h4>
            <div class="list-item none">
			  <a href='middleDistribute.php'>分配中期检查老师</a>
			  <a href='reviewDistribute.php'>分配评阅老师</a>
            </div>
          </li>
          <li>
            <h4 class="M2">
              <span></span>
              论文题目管理
            </h4>
            <div class="list-item none">
              <a href='thesisTopic.php'>论文题目</a>
              <a href='teacherDistribute.php'>学生论题选择结果</a>
            </div>
          </li>
          <li>
            <h4 class="M9">
              <span></span>
               <a href="form.php">查表</a>
            </h4>
          </li>
          <li>
            <h4 class="M5">
              <span></span>
              <a href="index.php">后台主页</a>
            </h4>
          </li>
          <li>
            <h4  class="M6">
              <span></span>
              <a href="../home/loginout.do.php?action=logout">退出登录</a>
            </h4>
          </li>
        </ul>
      </div>
      <div class="m-right">
        <div class="right-nav">
          <ul>
            <li>
              <img src="images/home.png">
            </li>
            <li style="margin-left:25px;">您当前的位置：</li>
            <li>
              <a href="#">系统公告</a>
            </li>
            <li></li>
            <li>
              <a href="#">最新公告</a>
            </li>
          </ul>
        </div>
        <div class="main">