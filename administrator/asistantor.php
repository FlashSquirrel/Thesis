
<?php
   require_once "../include.php";
   connect();
   MYSQL_QUERY("SET NAMES 'UTF-8'");
   
   $asistantor = fetchAll("select * from user where belong_to like 'asistantor'");
?>
<?php include ("header.php");?>

<a href="addAsistantor.php">
  <input type="submit" value="添加学科秘书"/>
</a>
	<div style="float:right;padding:5px 20px 5px;">
    <form method="get" action="asistantor.search.php">
	    <input type="text" name="key"/>
		<input type="submit" value="搜索"/>
  </form>
	</div>
<style>table tr td{text-align:center;}</style>
<table width="99%" border="0" margin="0" padding="0">
  <div class="one">
    <tr>
      <th>序号</th>
      <th>工号</th>
      <th>姓名</th>
      <th>性别</th>
      <th>电话</th>
      <th>邮箱</th>

      <th>操作</th>
    </tr>
  </div>
  <?php 
  if(!empty($asistantor))
  {
  $i = 1;
  foreach($asistantor as $result){ ?>
  <tr>
    <td>
      <?php echo $i;?>
    </td>
    <td><?php echo $result["number"];?></td>
    <td>
      <?php echo $result["name"];?>
    </td>
      <td>
      <?php echo $result["sex"];?>
    </td>
    <td>
      <?php echo $result["phone"];?>
    </td>
    <td>
      <?php echo $result["email"];?>
    </td>
    <td>
      <a href="asistantor.mod.php?id=<?=$result['id']?>"><input type="submit" value="修改"/></a>
      <a href="asistantor.del.php?id=<?=$result['id']?>"><input type="submit" value="删除" onclick="javaScript:myconfirm();return false;"/></a>
    </td>
  </tr>
  <?php $i += 1; } }?>
</table>


<?php include ("../students/footer.php");?>