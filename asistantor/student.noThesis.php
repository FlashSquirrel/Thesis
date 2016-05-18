
<?php 
    require_once '../include.php';
    connect();
	mysql_query("set names 'utf-8'");

	$student = fetchAll("select id,name,major,number from user where id not in (select student_id from student_choose_thesis_title) and belong_to='student'");
?>
<?php include 'header.php';?>
<style>table tr td{text-align:center;}</style>
<table width="100%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th> 
                                <th>学生姓名</th>
                                <th>学生专业</th>
								<th>学生学号</th>
								<th>操作</th>
                            </tr>
                            </div>
							<?php 
              if(!empty($student))
              {
              $i=1;
              foreach($student as $result){ ?>
							<tr>
                <td><?php echo $i;?></td>
								<td><?php echo $result["name"];?></td>
								<td><?php echo $result["major"];?></td>
                <td><?php echo $result["number"];?></td>
								<td>
                                   <a href="thesis.distribute.php?id=<?=$result['id']?>">
                                        <input type="submit" name="Submit" value="分配论题"/>
                                   </a>
                                </td>
							</tr>
							<?php $i+=1; } }?>
	</table>

	<div style="padding:10px 0 0 10%;"><a href="teacherDistribute.php"><input type="submit" value="返回"/></a></div>

<?php include '../students/footer.php';?>