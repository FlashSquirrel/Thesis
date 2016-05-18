<?php include('header.php');?>
<?php 
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");

	$thesis_id = $_GET['id'];
	$result = fetchAll("select * from thesis_title where id = '$thesis_id'");
	
;?>
<style>
  table tr th{ width:17%; height:25px;text-align:right;}
  table tr td{padding:0 0 0 10px;}
</style>
			           <table width="99%">
					   <?php if(!empty($result)) foreach($result as $thesis){?>
                            <tr>
                              <th>论文题目：</th>   
								      <td><?php echo $thesis['title'];?><br/>
								</td>
							</tr>
							<tr>
                <th>课题内容：</th>
                <td style="align:top;">
                  
                    <?php echo $thesis['title_content'];?>
                 <br/>
								</td>
							</tr>
							<tr>
                <th>课题来源：</th>
                  <td>
									 <?php echo $thesis['original'];?><br/>
								</td>
							</tr>
							<tr>
                <th>类型：</th>
								<td>
									  <?php echo $thesis['type'];?><br/>
								</td>
							</tr>
                   <tr>
                     <th>难度：</th>
                     <td>
                       <?php if($thesis['difficalty']=='A') echo "难";
                             else if($thesis['difficalty']=='B') echo "中等";
                             else echo "易";?><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>份量（任务比重）：</th>
                     <td>
                       <?php if($thesis['weight']=='A') echo "难";
                             else if($thesis['weight']=='B') echo "中等";
                             else echo "易";?><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>综合训练程度：</th>
                     <td>
                       <?php if($thesis['synthesis']=='A') echo "难";
                             else if($thesis['synthesis']=='B') echo "中等";
                             else echo "易";?>
                     <br/>
                     </td>
                   </tr>
                   <tr>
                     <th>是否属于科研项目：</th>
                     <td>
                       <?php echo $thesis['belong_to_science'];?><br/>
                     </td>
                   </tr>
							<tr>
                <th>实习地点：</th>
								<td>
								      <?php echo $thesis['train_place'];?><br/>
								</td>
							</tr>
							<tr>
                <th>用机时数：</th>
								<td>
								      <?php echo $thesis['use_computer_num'];?><br/>
								</td>
							</tr>
                   <tr>
                     <th>硬件设备：</th>
                     <td>
                       <?php echo $thesis['marchine'];?><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>编程环境（软件）：</th>
                     <td>
                       <?php echo $thesis['software'];?><br/>
                     </td>
                   </tr>
				   <?php }?>
					  </table>
<div style="padding:10 0 0 25%">
<input type="submit" value="返回" onclick="javaScript:history.back(-1)"/>
</div>

<?php include("footer.php");?>