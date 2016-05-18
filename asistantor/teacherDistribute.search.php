<?php include ("header.php");?>
<?php 
   require_once "../include.php";
   connect();
   mysql_query("set names 'utf-8'");

   $key = $_GET['key'];
   //print_r($key);
   $array = fetchAll("select student_choose_thesis_title.id,user.id as user_id,name,major,number,title,teacher_id from user,student_choose_thesis_title,thesis_title where user.id=student_choose_thesis_title.student_id and thesis_title.id = student_choose_thesis_title.thesis_title_id and (name like '$key%' or major like '%$key%' or title like '%$key%')");
  // print_r($array);
?>

	<div style="float:right;padding:5px 20px 5px;">
    <form method="get" action="teacherDistribute.search.php">
	        <input type="text" name="key"/>
		      <input type="submit" value="搜索"/>
    </form>
	</div>
<style>table tr td{text-align:center;}</style>
	<table width="99%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                              <th>序号</th>
                              <th>学生姓名</th>
                              <th>学生专业</th>
                              <th>学生学号</th>
                              <th>论文题目</th>
                              <th>操作</th>
                            </tr>
                            </div>
							<?php 
              if(!empty($array))
              {
              $i =1;
              foreach($array as $result){ ?>
    <tr>
      <td>
        <?php echo $i;?>
      </td>
      <td>
        <?php echo $result["name"];?>
      </td>
      <td>
        <?php echo $result["major"];?>
      </td>
      <td>
        <?php echo $result["number"];?>
      </td>
      <td>
        <?php echo $result["title"];?>
      </td>
      <td>
        <a href="teacherDistribute.del.php?id=<?=$result['id']?>">
          <input type="submit" value="删除" onclick="javaScript:myconfirm();return false;" />
        </a>
        <a href="thesis.distribute.php?id=<?=$result['user_id']?>">
          <input type="submit" name="Submit" value="重新分配论题"/>
        </a>
      </td>
    </tr>
							<?php $i+=1; } }?>
	</table>


<?php include ('../students/footer.php');?>