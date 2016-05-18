
<?php 
    require_once'../include.php';
    connect();
    mysql_query("set names 'utf-8'");
    
    //session_start();
  $id=$_SESSION['id'];
  $question = fetchAll("select file_name,status from total_table where upload_user_id='$id' and type='question' and file_type='1'");
?>
<?php include("header.php");?>
<a href="myThesis.question.add.php"><input type="button" value="提问"/></a>
<style>table tr td{text-align:center;}</style>
<table width="100%" border="0" margin="0" padding="0">
  <tr>
    <th>序号</th>
    <th>问题</th>
    <th>状态</th>
    <th>查看</th>
  </tr>
  <?php
  if(!empty($question))
  {
  $i=1;
  foreach($question as $result){?>
  <tr>
    <td>
      <?php echo $i;?>
    </td>
    <td>
        <?php echo $result["file_name"];?>
    </td>
    <td>
        <?php if($result["status"]==0) echo "未回复";
		      else echo "已回复";
		?>
    </td>
    <td>
	<?php if($result["status"]==0) echo "";
	else{
	?>
      <a href="reply.php?question=<?=$result['file_name']?>">
	      查看详情
	  </a>
	  <?php }?>
    </td>
  </tr>
  <?php $i+=1; } }?>
</table>

<?php include("../students/footer.php");?>