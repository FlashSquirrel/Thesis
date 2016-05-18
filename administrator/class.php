
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'UTF-8'");
  
	$class = fetchAll("select * from class");
?>
<?php include ("header.php");?>

<a href="addClass.php">
  <input type="submit" value="添加班级信息"/>
</a>
<style>table tr td{text-align:center;}</style>
<table width="99%" border="0" margin="0" padding="0">
  <div class="one">
    <tr>
      <th>序号</th>
	    <th>专业编号</th>
      <th>班级名称</th>
      <th>班级编码</th>
      <th>操作</th>
    </tr>
  </div>
  <?php 
  if(!empty($class))
  {
  $i = 1;
  foreach($class as $result){ 
  ?>
  <tr>
    <td name="id">
      <?php echo $i;?>
    </td>
	 <td name="major_num">
      <?php echo $result["major_id"];?>
    </td>
    <td name="major_name">
      <?php echo $result["class_name"];?>
    </td>
    <td name="class_id">
      <?php echo $result["id"];?>
    </td>
    <td>
      <a href="class.del.php?id=<?=$result['id']?>">
        <input type="submit" value="删除" onclick="javaScript:myconfirm();return false;"/>
      </a> 
    </td>
  </tr>
  <?php $i += 1; } }?>
</table>

<?php include ("../students/footer.php");?>