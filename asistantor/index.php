<?php include ("header.php");?>
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
	$notice = fetchAll("select * from total_table where type = 'notice' ");
?>

<style>
  table tr td{padding:0 0 0 40px;height:25px;}
</style>
<div class="notice">
  <div class="notice_body">
    <table width="99%" border="0" cellspacing="0" cellpadding="0">

      <?php
      if(!empty($notice)){
         foreach($notice as $result){
      ?>
      <tr>
        <td>
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

<?php include ('../students/footer.php');?>