
<?php require_once'../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
	$thesis_id = $_GET['id'];
	$result = fetchOne("select * from thesis_title where id = $thesis_id");
  //print_r($result);
?>
<?php include('header.php');?>
<form method="post" name="form1" action="topic.mod.do.php?id=<?=$result[0]['id']?>">

       <div class="shell">
			           <table width="100%">
                            <tr>
                                <td>
								      论文题目：<input type="text" name="title" style="width:595px;" value="<?php echo $result[0]['title'];?>"/><?php echo $result['title'];?>
								</td>
							</tr>
							<tr>
                                <td style="align:top;">
								      题目介绍（不超过300字）：<textarea name="title_content" cols="70" rows="5" ><?php echo $result[0]['title_content'];?></textarea><br/>
								</td>
							</tr>
							<tr>
                                <td style="padding-right:608px;">
								      课题来源：
									 <select name="original" value="">
									        <option value="<?php echo $result[0]['original'];?>"><?php echo $result[0]['original'];?></option>
                                            <option value="企业">来自企业</option>
                                            <option value="教师">来自教师</option>
                                     </select><br/>
								</td>
							</tr>
							<tr>
								<td style="padding-right:608px;">
								      类型：
									  <select name="type" value="">
									  <option value="<?php echo $result[0]['type'];?>"><?php echo $result[0]['type'];?></option>
                                            <option value="应用型">应用型</option>
                                            <option value="理论型">理论型</option>
                                            <option value="创新型">创新型</option>
                                     </select><br/>
								</td>
							</tr>
                   <tr>
                     <td style="padding-right:608px;">
                       难度：<select name="difficulty" value="">
					   <option value="<?php echo $result[0]['difficulty'];?>"><?php echo $result[0]['difficulty'];?></option>
                       <option value="A">A（难）</option>
                       <option value="B">B（中）</option>
                       <option value="C">C（易）</option>
                     </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <td style="padding-right:608px;">
                       份量（任务比重）：<select name="weight" value="<?php echo $result[0]['weight'];?>">
					   <option value="<?php echo $result[0]['weight'];?>"><?php echo $result[0]['weight'];?></option>
                         <option value="A">A</option>
                         <option value="B">B</option>
                         <option value="C">C</option>
                       </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <td style="padding-right:608px;">
                       综合训练程度：<select name="synthesis" value="<?php echo $result[0]['synthesis'];?>">
					    <option value="<?php echo $result[0]['synthesis'];?>"><?php echo $result[0]['synthesis'];?></option>
                         <option value="A">A</option>
                         <option value="B">B</option>
                         <option value="C">C</option>
                       </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <td style="padding-right:608px;">
                       是否属于科研项目：<select name="belong_to_science" value="">
					   <option value="<?php echo $result[0]['belong_to_science'];?>"><?php echo $result[0]['belong_to_science'];?></option>
                         <option value="是">是</option>
                         <option value="否">否</option>
                       </select><br/>
                     </td>
                   </tr>
							<tr>
								<td style="padding-right:608px;">
								      实习地点：<input type="text" name="train_place" value="<?php echo $result[0]['train_place'];?>"/><br/>
								</td>
							</tr>
							<tr>
								<td style="padding-right:608px;">
								      用机时数：<input type="text" name="use_computer_num" value="<?php echo $result[0]['use_computer_num'];?>"/><br/>
								</td>
							</tr>
                   <tr>
                     <td style="padding-right:608px;">
                       硬件设备：<input type="text" name="manchine" value="<?php echo $result[0]['manchine'];?>"/><br/>
                     </td>
                   </tr>
                   <tr>
                     <td style="padding-right:608px;">
                       编程环境（软件）：<input type="text" name="software" value="<?php echo $result[0]['software'];?>"/><br/>
                     </td>
                   </tr>
					  </table>
					  <div class="submit_b">
						<input type="submit" value=" 添加 "/>
              <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
			        </div>
		</div>
</form>


<?php include("footer.php");?>