
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'UTF-8'");
  
	$major = fetchAll("select * from major");
?>
<?php include ("header.php");?>

<a href="addMajor.php">
  <input type="submit" value="添加专业信息"/>
</a>
<style>table tr td{text-align:center;}</style>
<table width="99%" border="0" margin="0" padding="0">
  <div class="one">
    <tr>
      <th>序号</th>
      <th>专业名称</th>
      <th>专业代码</th>
      <th>操作</th>
    </tr>
  </div>
  <?php 
  if(!empty($major))
  {
   $i = 1;
  foreach($major as $result){ ?>
  <tr>
    <td name="id">
      <?php echo $i;?>
    </td>
    <td name="major_name">
      <?php echo $result["major_name"];?>
    </td>
    <td name="major_num">
      <?php echo $result["id"];?>
    </td>
    <td>
      <a href="major.del.php?id=<?=$result['id']?>">
        <input type="submit" value="删除" onclick="javaScript:myconfirm();return false;"/>
      </a> 
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>

<?php include ("../students/footer.php");?>