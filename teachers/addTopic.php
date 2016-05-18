<?php require_once '../include.php';?>
<?php include('header.php');?>

<form method="post" name="form1" action="addTopic.do.php">
       <div class="shell">
			           <table width="100%">
                            <tr>
                              <th>论文题目：</th>   
								      <td><input type="text" name="title" style="width:595px;"/><br/>
								</td>
							</tr>
							<tr>
                <th>题目介绍（不超过300字）：</th>
                <td style="align:top;">
								      <textarea name="title_content" cols="70" rows="5"></textarea><br/>
								</td>
							</tr>
							<tr>
                <th>课题来源：</th>
                  <td>
									 <select name="original">
                                            <option value="business">来自企业</option>
                                            <option value="teacher">来自教师</option>
                                     </select><br/>
								</td>
							</tr>
							<tr>
                <th>类型：</th>
								<td>
									  <select name="type">
                                            <option value="应用型">应用型</option>
                                            <option value="理论型">理论型</option>
                                            <option value="创新型">创新型</option>
                                     </select><br/>
								</td>
							</tr>
                   <tr>
                     <th>难度：</th>
                     <td>
                       <select name="difficulty">
                       <option value="A">A（难）</option>
                       <option value="B">B（中）</option>
                       <option value="C">C（易）</option>
                     </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>份量（任务比重）：</th>
                     <td>
                       <select name="weight">
                         <option value="A">A</option>
                         <option value="B">B</option>
                         <option value="C">C</option>
                       </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>综合训练程度：</th>
                     <td>
                       <select name="synthesis">
                         <option value="A">A</option>
                         <option value="B">B</option>
                         <option value="C">C</option>
                       </select><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>是否属于科研项目：</th>
                     <td>
                       <select name="belong_to_science">
                         <option value="yes">是</option>
                         <option value="no">否</option>
                       </select><br/>
                     </td>
                   </tr>
							<tr>
                <th>实习地点：</th>
								<td>
								      <input type="text" name="train_place"/><br/>
								</td>
							</tr>
							<tr>
                <th>用机时数：</th>
								<td>
								      <input type="text" name="use_computer_num"/><br/>
								</td>
							</tr>
                   <tr>
                     <th>硬件设备：</th>
                     <td>
                       <input type="text" name="manchine"/><br/>
                     </td>
                   </tr>
                   <tr>
                     <th>编程环境（软件）：</th>
                     <td>
                       <input type="text" name="software"/><br/>
                     </td>
                   </tr>
					  </table>
					  <div class="submit_b">
						<input type="submit" name="submit" value=" 添加 "/>
              <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
			        </div>
		</div>
</form>


<?php include("footer.php");?>