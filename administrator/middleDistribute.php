
<?php require_once "../include.php";?>
<?php include ("header.php");?>

<a href="teacher.distribute.php">
  <input type="submit" name="Submit" value="分配中期检查老师"/>
</a>
	<form style="float:right;padding:5px 20px 5px;">
	    <input  type="text" name="key"/>
		<input type="submit" value="搜索"/>
	</form>
<style>table tr td{text-align:center;}</style>
	<table width="99%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>专业</th>
                                <th>导师姓名</th>
                                <th>学生专业</th>
                                <th>学生姓名</th>
								<th>学生学号</th>
								<th>操作</th>
                            </tr>
                            </div>
							<?php 
              if(!empty($topic))
              {
              $i=1;
              foreach($topic as $result){ ?>
							<tr>
                <td><?php echo $i;?></td>
								<td><?php echo $result["title"];?></td>
						  	<td><?php echo $result["created"];?></td>
								<td><?php echo $result["modified"];?></td>
								<td><?php echo $result["status"];?></td>
								<td></td>
								<td><input type="submit" value="删除"/></td>
							</tr>
							<?php $i+=1; } }?>
	</table>


<?php include ('../students/footer.php');?>