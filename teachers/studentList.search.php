
<?php 
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  //session_start();
  $id=$_SESSION['id'];
  
  $key = $_GET['key'];
  $student = fetchAll("select student_choose_thesis_title.id as id,name,major,number,title,phone from student_choose_thesis_title,thesis_title,user where student_choose_thesis_title.student_id = user.id and student_choose_thesis_title.thesis_title_id=thesis_title.id and thesis_title.teacher_id='$id' and (name like '$key' or major like '$key' or title like '%$key%')");
?>
<?php include('header.php');?>

       <div style="float:right;padding:5px 20px 5px;">
         <form method="get" action="search.php">
	         输入关键词：<input type="text" name="key"/>
			 <input type="submit" name="Submit" value="搜索"/>
         </form>
	   </div>
<style>table tr td{text-align:center;}</style>
		       <div class="table">
			           <table width="100%" border="0" margin="0" padding="0">
                     <div class="one">
                       <tr>
                         <th>序号</th>
                         <th>学生姓名</th>
                         <th>学生专业</th>
                         <th>学号</th>
                         <th>论文题目</th>
                         <th>电话</th>
                       </tr>
                     </div>
                     <?php
                     if(!empty($student))
                     {
                     $i=1;
                  foreach($student as $result){ 
                     
              ?>
                     <tr>
                       <td><?php echo $i;?></td>
                       <td>
                         <?php echo $result["name"];?>
                       </td>
                       <td>
                         <?php echo $result['major'];?>
                       </td>
                       <td>
                         <?php echo $result['number'];?>
                       </td>
                       <td>
                         <?php echo $result["title"];?>
                       </td>
                       <td>
                         <?php echo $result["phone"];?>
                       </td>
                     </tr>
                     <?php $i+=1; } }?>
					  </table>
						
				
			   </div>     <!-- Table -->		


<?php include('footer.php');?>