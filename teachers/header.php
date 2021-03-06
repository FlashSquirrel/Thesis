﻿<?php
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>本科毕业论文（设计）信息化管理平台</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" />
	<link type="text/css" rel="stylesheet" href="css/addTopic.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
  </head>
  <body>
    <div class="top"></div>
    <div id="header" style="background-image:url(images/bg.jpg);">
      <div class="logo">计算机学院毕业论文（设计）信息化管理平台</div>
      <div class="navigation">
        <ul>
		  <li style="color:#005ab5"><?php echo $user[0]['name'];?></li>
          <li>
            <a href="password_change.php">修改密码</a>
          </li>
          <li>
            <a href="information.php">个人信息设置</a>
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
              学生
            </h4>
            <div class="list-item none">
              <a href='studentsList.php'>学生列表</a>
            </div>
          </li>
          <li>
            <h4 class="M2">
              <span></span>
              论文题目管理
            </h4>
            <div class="list-item none">
              <a href='thesisTopic.php'>我的论文题目</a>
            </div>
          </li>
          <li>
            <h4 class="M3">
              <span></span>
              <a href='instruct.php'>指导论文</a>
            </h4>
          </li>
          <li>
            <h4 class="M8">
              <span></span>
              <a href="middleCheck.php">中期检查论文</a>
            </h4>
          </li>
          <li>
            <h4 class="M9">
              <span></span>
                表格
            </h4>
			<div class="list-item none">
              <a href="form.php">表格填写</a>
            </div>
          </li>
          <li>
            <h4 class="M4">
              <span></span>
              学生论文下载
            </h4>
			 <div class="list-item none">
			 <a href="thesisReport.download.php">开题报告下载</a>
			 <a href="thesisLiterature.download.php">文献综述下载</a>
			 <a href="thesisTranslation.download.php">外文翻译下载</a>
			 <a href="thesisSummary.download.php">论文摘要下载</a>
              <a href="thesisContent.download.php">论文终稿下载</a>
            </div>
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