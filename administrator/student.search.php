
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'UTF-8'");
  
    $key = $_GET['key'];
    if($key)
	$student = fetchAll("select * from user where belong_to like 'student' and name like '$key%' or major like '%$key%'");
?>
<?php include ("header.php");?>

<a href="addStudent.php">
  <input type="submit" value="添加学生信息"/>
</a>
	<div style="float:right;padding:5px 20px 5px;">
    <form method="get" action="student.search.php">
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
      <th>性别</th>
      <th>电话</th>
      <th>操作</th>
    </tr>
  </div>
  <?php 
  if(!empty($student))
  {
  $i =1;
  foreach($student as $result){ ?>
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
    <td name="sex">
      <?php echo $result['sex'];?>
    </td>
    <td name="phone">
      <?php echo $result["phone"];?>
    </td>
    <td>
      <a href="student.mod.php?id=<?=$result['id']?>"><input type="submit" value="编辑"/></a>
      <a href="student.del.php?id=<?=$result['id']?>"><input type="submit" value="删除" onclick="javaScript:myconfirm();return false;"/></a>
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>


<?php include ("../students/footer.php");?>