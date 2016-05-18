
<?php 
   require_once ('../include.php');
   connect();
   mysql_query("set names 'utf-8'");
   
    $thesis_id = $_GET['id'];

    $thesis = fetchAll("select * from thesis_title where status ='1'");

    $student = fetchAll("select name,major,number,thesis_title.title from user,student_choose_thesis_title,thesis_title where user.id = $thesis_id and student_choose_thesis_title.student_id=user.id and thesis_title.id=student_choose_thesis_title.thesis_title_id");

?>
<?php include 'header.php';?>

<form method="post" name="myform" action="thesis.distribute.mod.do.php?id=<?=$thesis_id?>">
  <div class="distribute" style="margin:7% 0 0 200px;">
    
    专业：<?php echo $student[0]['major'];?>&nbsp;&nbsp;&nbsp;&nbsp;

    学号：<?php echo $student[0]['number'];?>&nbsp;&nbsp;&nbsp;&nbsp;
    学生：<?php echo $student[0]['name'];?><br/><br/>
	
	原来论题：<?php echo $student[0]['title']; ?>
    
    <div style="padding-top:15px;">
      选择论文题目：<select name="thesis">
        <option>选择论题</option>
        <?php
        if(!empty($thesis))
        foreach($thesis as $result){?>
        <option value="<?php echo $result['id'];?>">
          <?php echo $result["title"];?>
        </option>
        <?php } ?>
      </select>
    </div>
    
  </div>
  <div style="padding:10px 0px 0px 320px;">
    <input type="submit" name="submit" value="提交"/>
    <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
  </div>
</form>

  <?php include '../students/footer.php';?>