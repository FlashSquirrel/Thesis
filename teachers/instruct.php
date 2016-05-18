
<?php 
    require_once'../include.php';
    connect();
    mysql_query("set names 'utf-8'");
    
  $id=$_SESSION['id'];
  $question = fetchAll("select name,total_table.file_name,total_table.status from total_table,student_choose_thesis_title,thesis_title,user where thesis_title.teacher_id='$id' 
  and student_choose_thesis_title.thesis_title_id=thesis_title.id and total_table.upload_user_id=student_choose_thesis_title.student_id and user.id=upload_user_id and total_table.type='question' and total_table.file_type='1'");
?>
<?php include("header.php");?>
<style>table tr td{text-align:center;}</style>
<table width="100%" border="0" margin="0" padding="0">
  <tr>
    <th>序号</th>
    <th>学生</th>
    <th>问题</th>
    <th>状态</th>
    <th>操作</th>
  </tr>
  <?php
  if(!empty($question))
  {
  $i=1;
  foreach($question as $result){?>
  <tr>
    <td>
      <?php echo $i;?>
    </td>
    <td>
      <?php echo $result["name"];?>
    </td>
    <td>
        <?php echo $result["file_name"];?>
    </td>
    <td>
        <?php if($result["status"]==0) echo "未回答";
              else echo "已回答";?>
    </td>
    <td>
      <a href="reply.php?question=<?=$result['file_name']?>">
      查看详情
      </a>
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>

<?php include("footer.php");?>