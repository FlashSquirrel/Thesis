
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
	$notice_id =intval($_GET['id']);//intval()防sql注入
 // print_r($id);
	$notice = fetchAll("select * from total_table where type like 'notice' and id = '$notice_id'");
  //print_r($notice);
?>
<style>
  /* 通告显示*/
  .notice{width:80%;padding-left:10%;}
  .notice h2{text-align:center;padding:10px;}
  .notice_time{padding-left:75%;}
  .notice_data{padding:0 40px 0 40px;}
  footer{text-align:center;}
</style>
<div class="notice">
  <?php 
  if(!empty($notice))
  foreach($notice as $result){?>
<h2><?php echo $result['file_name'];?></h2>
<p class="notice_time">发布时间：<?php echo $result['upload_time'];?></p>
<hr/>
<p class="notice_data"><?php echo $result['file_data'];?></p>
<!--
  <p>附件：</p>
    <a href="../home/download.php?filename=../download/<?php echo $result['file_enclosure'];?>">
	    <?php echo $result['file_enclosure'];?>
    </a>
  -->
<?php }?>
</div>

<footer>
  <div class="bottom"></div>
  <div id="footer">
    <p>Copyright©2016.版权所有:西安科技大学</p>
  </div>
  <script>navList(12);</script>
</footer>