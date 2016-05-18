
<?php
  require_once "../include.php";
  connect();
  
  $key = $_GET['key'];
  $teacher = fetchAll("select * from user where belong_to = 'teacher' and name like '$key%' or major like '%$key%'");
?>
<?php include ("header.php");?>

<a href="addTeacher.php">
  <input type="submit" value="添加导师信息"/>
</a>
	<div style="float:right;padding:5px 100px 5px;">
    <form method="get" action="teacher.search.php">
	    <input type="text" name="key"/>
		<input type="submit" value="搜索"/>
    </form>
	</div>
<style>table tr td{text-align:center;}</style>
<table width="99%" border="0" margin="0" padding="0">
  <div class="one">
    <tr>
      <th>序号</th>
      <th>姓名</th>
      <th>专业</th>
      <th>电话</th>
      <th>邮箱</th>

      <th>操作</th>
    </tr>
  </div>
  <?php
  if(!empty($teacher))
  {
  $i = 1;
  foreach($teacher as $result){ ?>
  <tr>
    <td>
      <?php echo $i;?>
    </td>
    <td name="name">
      <?php echo $result["name"];?>
    </td>
    <td name="major">
      <?php echo $result["major"];?>
    </td>
    <td name="phone">
      <?php echo $result["phone"];?>
    </td>
    <td name="email">
      <?php echo $result["email"];?>
    </td>

    <td>
      <a href="teacher.mod.php?id=<?=$result['id']?>"><input type="submit" value="编辑"/></a>
      <a href="teacher.del.php?id=<?=$result['id']?>">
        <input type="submit" value="删除" onclick="javaScript:myconfirm();return false;"/>
      </a>
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>


<?php include ("../students/footer.php");?>