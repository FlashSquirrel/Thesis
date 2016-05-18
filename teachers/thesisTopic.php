<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  //session_start();
  $id = $_SESSION['id'];
	$thesis = fetchAll("select * from thesis_title where teacher_id = '$id'");
 // print_r($thesis);
?>
<?php include('header.php');?>

	         <a href="addTopic.php"><input type="submit" name="Submit" value="新增论题"/></a>
			 顺序：新增论题-分配论题-修改-生成申报表-生成任务书
       
	 <style>table tr td{text-align:center;}</style>
       <div class="shell">
		       <div class="table">
			           <table width="100%" border="0" margin="0" padding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>论文题目</th>
                                <th>创建时间</th>
                                <th>上次修改时间</th>
                                <th>状态</th>
								                <th>上传</th>
                              <th>操作</th>
                            </tr>
                            </div>
							<?php 
              if(!empty($thesis))
              {
              $i=1;
              foreach($thesis as $result){ 
              ?>
							<tr>
                <td><?php echo $i;?></td>
								<td><?php echo $result["title"];?></td>
                <td><?php echo $result["created"];?></td>
						    <td><?php echo $result["modified"];?></td>
								<td>
                        <?php 
                      if($result["status"]==1) echo '通过审核';
                      else if($result['status']=='0') echo "正在审核";
                      else if($result['status']=='2') echo "未通过审核";
                     ?></td>
                <td>
                  <?php if(empty($result['create_ask_table'])) {?>
                  <a href="thesisTopic.do.php?submit=申报表& id=<?=$result['id']?>">
                    <input type="submit" value="申报表" name="submit"/>
                  </a>
                  <?php }else echo "已上传";?>
                  <br/>
                  <?php if(empty($result['create_task_book'])) {?>
                  <a href="thesisTopic.do.php?submit=任务书& id=<?=$result['id']?>">
                    <input type="submit" value="任务书" name="submit"/>
                  </a>
                  <?php }else echo "已上传";?>
                </td>
                <script type="text/javascript">
                  function thisconfirm()
                  {
                  var r=confirm("你确定选择此论题？选择后不可更改")
                  if(r==true)
                  {
                  method = "post";
                  action = "choose.php?id=" + $result['id'];
                  submit();
                  }
                  }
                </script>
								<td>
                  <a href="topic.mod.php?id=<?php echo $result['id'];?>">修改</a>
                  <a href="topic.del.php?id=<?php echo $result['id'];?>" onclick="javaScript:thisconfirm(); return false;">删除</a>
                </td>
							</tr>
							<?php $i+=1; } }?>
					  </table>
						    
			   </div>     	
		</div>    		


<?php include('footer.php');?>