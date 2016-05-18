
<?php
    require_once "../include.php";
    connect();
    mysql_query("SET NAMES 'UTF-8'");
    
    $choose = fetchAll("select student_choose_thesis_title.id,name,major,number,title,teacher_id from user,student_choose_thesis_title,thesis_title where user.id=student_choose_thesis_title.student_id and thesis_title.id = student_choose_thesis_title.thesis_title_id");
    //print_r($choose);
?>
<?php include ("header.php");?>

<a href="thesis.distribute.php">
  <input type="submit" name="Submit" value="为学生分配论题"/>
</a>
<div style="float:right;padding:5px 20px 5px;">
  <form method="get" action="chooseResult.search.php">
    输入关键词：<input type="text" name="key"/>
    <input type="submit" name="Submit" value="搜索"/>
  </form>
</div>

<table width="99%" border="0" margin="0" padding="0">
  <div class="one">
    <tr>
      <th>序号</th>
      <th>学生专业</th>
      <th>学生姓名</th>
      <th>学生学号</th>
      <th>论文题目</th>
      <th>导师</th>
    </tr>
  </div>
  <?php
    if(!empty($choose))
                  foreach($choose as $result){ 
              ?>
  <tr>
    <th>
      <?php echo $result["id"];?>
    </th>
    <th>
      <?php echo $result["major"];?>
    </th>
    <th>
      <?php echo $result["name"];?>
    </th>
    <th>
      <?php echo $result["number"];?>
    </th>
    <th>
      <?php echo $result["title"];?>
    </th>
    <th>
      <a href="teacher.php?id=<?=$result['teacher_id']?>">
        <?php echo $result["teacher_id"];?>
      </a>
    </th>
  </tr>
  <?php }?>
</table>

<?php include ('../students/footer.php');?>