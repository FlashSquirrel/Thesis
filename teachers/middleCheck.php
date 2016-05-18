
<?php 
     require_once'../include.php';
     connect();
     mysql_query("set names 'utf-8'");
     
     //session_start();
  $id=$_SESSION['id'];
  
  $student = fetchAll("select user.id as student_id,user.name,user.number,thesis_title.title,students.thesis_report,students.thesis_literature,students.thesis_translation,students.thesis_summary,
  students.thesis_content,students.thesis_final from student_choose_thesis_title,thesis_title,user,students where thesis_title.teacher_id='$id'
  and student_choose_thesis_title.thesis_title_id=thesis_title.id and user.id=student_choose_thesis_title.student_id and students.student_id=user.id;");
  
  
?>
<?php include("header.php");?>
<style>table tr td{text-align:center;}</style>
<table width="100%" border="0" margin="0" padding="0">
  <tr>
    <th>序号</th>
    <th>学生</th>
    <th>学号</th>
    <th>论题</th>
    <th>开题报告</th>
    <th>文献综述</th>
    <th>外文翻译</th>
    <th>摘要</th>
    <th>正文</th>
    <th>论文终稿</th>
    <th>操作</th>
  </tr>
  
  <?php
  if(!empty($student))
  {
  $i=1;
  foreach($student as $result){
  ?>
  <tr>
    <td>
      <?php echo $i;?>
    </td>
    <td>
      <?php echo $result['name'];?>
    </td>
    <td>
      <?php echo $result['number'];?>
    </td>
    <td>
        <?php echo $result["title"];?>
    </td>
    <td>
      <?php if(!empty($result['thesis_report'])) echo "已上传"; else echo "未上传";?><!--开题报告-->
    </td>
    <td>
      <?php if(!empty($result['thesis_literature'])) echo "已上传"; else echo "未上传";?><!--文献综述-->
    </td>
    <td>
      <?php if(!empty($result['thesis_translation'])) echo "已上传"; else echo "未上传";?><!--外文翻译-->
    </td>
    <td>
      <?php if(!empty($result['thesis_summary'])) echo "已上传"; else echo "未上传";?><!--摘要-->
    </td>
    <td>
      <?php if(!empty($result['thesis_content'])) echo "已上传"; else echo "未上传";?><!--正文-->
    </td>
    <td>
      <?php if(!empty($result['thesis_final'])) echo "已上传"; else echo "未上传";?><!--完整论文-->
    </td>
    <td>
      <?php
          $review = fetchAll("select * from mid_term where student_id='$result[student_id]'");
          if(empty($review))
          {
      ?>
      <a href="review.php?id=<?=$result['student_id']?>">
            <input type="submit" name="submit" value="评论"/>
      </a>
      <?php }
          else {
      ?>
      <a href="review.php?id=<?=$result['student_id']?>">
        <input type="submit" name="submit" value="追加评论"/>
      </a>
      <?php } ?>
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>

<?php include("../students/footer.php");?>