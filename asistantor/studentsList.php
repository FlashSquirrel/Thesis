<?php include('header.php');?>
<?php require_once'../include.php';?>

       <div style="float:right;padding:5px 20px 5px;">
	         输入关键词：<input type="text" name="Text"/>
			     专业：
             <select>
               <option style="width:120px">1。。。。。。1</option>
               <option style="width:120px">2。。。。。。2</option>
               <option style="width:120px">3。。。。。。3</option>
               <option style="width:120px">4。。。。。。4</option>
               <option style="width:120px">5。。。。。。5</option>
             </select>
			 班级：<input type="text" name="Text2"/>
			 <input type="submit" name="Submit" value="搜索"/>
			 <input type="submit" name="Submit1" value="显示全部"/>
	   </div>
       <div class="shell">
		       <div class="table">
			           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>学生姓名</th>
                                <th>学生专业</th>
                                <th>学号</th>
                                <th>电话</th>
								<th>邮件</th>
                            </tr>
                            </div>
							<?php foreach($student as $result){ ?>
							<tr>
                                <th><?php echo $result["id"];?></th>
								<th><?php echo $result["username"];?></th>
						  	    <th><?php echo 'zhuanye';?></th>
								<th><?php echo 'xuehao';?></th>
								<th><?php echo $result["phone"];?></th>
								<th><?php echo $result["email"];?></th>
							</tr>
							<?php }?>
					  </table>
						
						<!-- Pagging -->
						<div class="pagging">
							<div class="right">
								<a href="#">首页</a>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">5</a>
								<span>...</span>
								<a href="#">下一页</a>
								<a href="#">最后一页</a>
							</div>
						</div>     <!-- End Pagging -->
			   </div>     <!-- Table -->	
		</div>    <!-- End shell -->		


<?php include('footer.php');?>