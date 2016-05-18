<?php
    require_once ('../include.php');
	connect();
	mysql_query("set names 'utf-8'");
	
	$notice = fetchAll("select * from total_table where type = 'notice'");
?>

<?php include 'header.php';?>
<a href="notice.add.php"><input type="submit" value="发布新的通知"/></a>
<div class="show">
  <style>table tr td{text-align:center;}</style>
<table width="99%" margin="0" padding = "0">
    <tr>
	    <th>序号</th>
		<th>通告</th>
		<th>发布时间</th>
		<th>操作</th>
	</tr>
	<?php 
	    if(!empty($notice))
      {
      $i = 1;
		 foreach($notice as $result)
		 {
	?>
	<tr>
	    <td><?php echo $i;?></td>
		<td><?php echo $result['file_name']?></td>
		<td><?php echo $result['upload_time'];?></td>
		<td><a href="notice.del.php?id=<?=$result['id']?>"><input type="submit" value="删除" name="submit" onclick="javaScript:myconfirm();return false;"/></a></td>
	</tr>
	<?php $i += 1; } }?>
</table>
</div>

<?php include '../students/footer.php';?>