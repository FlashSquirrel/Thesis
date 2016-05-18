<?php include('header.php');?>
<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
   //session_start();
  $id=$_SESSION['id'];
  $thesis = fetchAll("select name,number,file_name,total_table.type from student_choose_thesis_title,thesis_title,total_table,user where total_table.type='thesis_translation' and user.id=total_table.upload_user_id and student_choose_thesis_title.student_id=user.id and thesis_title.id = student_choose_thesis_title.thesis_title_id and thesis_title.teacher_id='$id'");
  //print_r($thesis);

?>
<!--
       <div style="float:right;padding:5px 20px 5px;">
         <form method="get" action="thesisDownload.search.php">
	           <input type="text" name="key"/>
			 <input type="submit" name="Submit" value="搜索"/>
         </form>
	   </div>
	   -->
		       <div class="table">
             <style>table tr td{text-align:center;}</style>
			           <table width="100%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>学生姓名</th>
                                <th>学号</th>
                                <th>外文翻译</th>
								                <th>点击下载</th>
                            </tr>
                            </div>
							              <?php 
                            if(!empty($thesis))
                            {
                            $i=1;
                            foreach($thesis as $result){ ?>
							              <tr>
                                <td><?php echo $i;?></td>
								                <td><?php echo $result['name'];?></td>
								                <td><?php echo $result['number'];?></td>
							                	<td><?php echo $result["file_name"];?></td>
								<td>
                 <a href="../home/download.php?filename=<?=$result['file_name']?>&type=<?=$result['type']?>"> 
                        <input type="submit" name="submit" value="下载"/>
                  </a>
                </td>
							</tr>
							<?php $i+=1; } }?>
					  </table>

			   </div>     <!-- Table -->	



<?php include('../students/footer.php');?>