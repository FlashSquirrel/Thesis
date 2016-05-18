<?php
  require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  
  $id = $_SESSION['id'];
  
	$thesis = fetchAll("select * from thesis_title where status = '1'");
?>

<?php include("header.php");?>
<?php
    $thesis_choose = fetchAll("select * from student_choose_thesis_title where student_id = '$id'");   
?>
<p>
  <?php 
  if(!empty($thesis_choose))
    {
        echo "您的论文题目编号为：";
        echo $thesis_choose[0]['thesis_title_id']; 
    }
    else echo "您还没有选择论文题目";?>
</p>
<div style="float:right;padding:5px 60px 5px;">
  <form method="get" action="thesisTopic.search.php">
    <input type="text" name="key"/>
    <input type="submit" name="Submit" value="搜索"/>
  </form>
</div>
<style>table tr td{text-align:center;}</style>
					<div class="notice">
						<div class="notice_body">								
						<table width="100%" border="0" margin="0" padding="0">
              <tr>
                <th>序号</th>
                <th>论文题目</th>
                <th>老师</th>
                <th>发布时间</th>
                <th>状态</th>
                <th>选题</th>
                <th>查看</th>
              </tr>
              <?php 
              if(!empty($thesis))
              {
              $i=1;
                  foreach($thesis as $result){
              ?>
							<tr>
                <form action="choose.php?id=<?=$result['id']?>" method = "post">
                  <td><?php echo $i;?></td>
								   <td name="title"><?php echo $result["title"];?></td>
                   <td name="teacher_id">
                     <a href="teacherInfo.php?id=<?=$result['teacher_id']?>">
                     <?php
                         echo $result['teacher_id'];
                     ?>
                   </a></td>
                <td><?php echo $result["created"];?></td>
                <td><?php if($result["status"]==1) echo '可选';else echo '不可选';?></td>
                  <td>
                     <?php 
                     if($result['status']==1) {
                        if(empty($thesis_choose)){
                     ?>
                            <input type="submit" name="choose" value="选择" onclick="myconfirm();return false;"/>
                    <?php }
                        else echo "不可重复选择";
                    }?>
                  </td>
                </form>
                <td>
                  <a href="thesisTopic.more.php?id=<?=$result['id']?>">
                    <input type="submit" name="detail" value="查看详情"/>
                  </a>
                </td>
                
							</tr>
              <?php $i+=1; } }?>
							</table>	
					    </div>
           </div>

<?php include("footer.php");?>