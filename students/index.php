﻿<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
	$notice = fetchAll("select * from total_table where type = 'notice'");
?>
<?php include('header.php');?>


				<!--   右部分主题内容 -->

<div class="notice">
  <div class="notice_body">
    <table width="99%" border="0" cellspacing="0" cellpadding="0">

      <?php
      if(!empty($notice)){
         foreach($notice as $result){
      ?>
      <tr>
        
        <td style="padding:0 0 0 40px;height:25px;">
          <a href="../home/noticeContent.php?id=<?=$result['id']?>">
            <?php echo $result['file_name'];?>
          </a>
        </td>
        <td>
          <?php echo $result['upload_time'];?>
        </td>
      </tr>
      <?php }
      }else echo "系统当前没有通知";?>
    </table>
  </div>
</div>

<!--    右边主题部分结束 -->
				
<?php include("footer.php");?>
