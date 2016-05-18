
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

	$key = $_GET['key'];
	$teacher = fetchAll("select * from user where belong_to='teacher' and name like '%$key%' or position like '%$key%'");
?>
<?php include("header.php");?>


<div style="float:right;padding:5px 50px 5px;">
  <form method="get" action="teacherInfo.search.php">
    <input type="text" name="key"/>
    <input type="submit" name="Submit" value="搜索"/>
  </form>
</div>
<style>table tr td{text-align:center;}</style>
					<div class="table">
						<table width="100%" border="0" margin="0" padding="0">
              <div class="one">
                <tr>
                  <th>序号</th>
                  <th>姓名</th>
                  <th>职位</th>
                  <th>已选人数</th>
                  <th>联系电话</th>
                  <th>邮箱</th>
                </tr>
              </div>
							<?php 
              if(!empty($teacher))
              {
              $i=1;
              foreach($teacher as $result){ ?>
							<tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result["name"];?></td>
								<td><?php echo $result["position"];?></td>
						  	<td><?php echo 'student_num';?></td>
								<td><?php echo $result["phone"];?></td>
								<td><?php echo $result["email"];?></td>
							</tr>
							<?php $i+=1; } }?>
						</table>
						
					
		</div>    <!-- End shell -->		



<?php include("footer.php");?>