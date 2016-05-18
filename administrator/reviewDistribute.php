
<?php 
    require_once "../include.php";
    connect();
    mysql_query("set names 'utf-8'");
    
    $array = fetchAll("select student_choose_thesis_title.id,name,major,number,title,teacher_id from user,student_choose_thesis_title,thesis_title where user.id=student_choose_thesis_title.student_id and thesis_title.id = student_choose_thesis_title.thesis_title_id");

 ?>
<?php include ("header.php");?>

<a href="teacher.distribute.php">
  <input type="submit" name="Submit" value="分配评阅老师"/>
</a>
	<form style="float:right;padding:5px 20px 5px;">
	    <input  type="text" name="key"/>
		<input type="submit" value="搜索"/>
	</form>
<style>table tr td{text-align:center;}</style>
	<table width="100%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>导师编号</th>
                                <th>学生专业</th>
                                <th>学生姓名</th>
								<th>学生学号</th>
								<th>操作</th>
                            </tr>
                            </div>
							<?php
              if(!empty($array))
              {
              $i=1;
              foreach($array as $result){ ?>
							<tr>
                <td><?php echo $i;?></td>
						  	<td><?php echo $result["teacher_id"];?></td>
								<td><?php echo $result["major"];?></td>
								<td><?php echo $result["name"];?></td>
								<td>
                  <?php echo $result["number"];?>
                </td>
								<td><input type="submit" value="删除"/></td>
							</tr>
							<?php $i+=1; } }?>
	</table>


<?php include ('../students/footer.php');?>