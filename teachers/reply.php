
<?php 
    require_once '../include.php';
    connect();
    mysql_query("set names 'utf-8'");
	
   $id=$_SESSION['id'];
   $quest = $_GET['question'];
   $question = fetchAll("select file_name,file_type,file_data,upload_time,type from total_table where file_name='$quest' and type='question'");
   $reply = fetchAll("select file_name,file_type,file_data,upload_time,type from total_table where file_name='$quest' and type='reply'");
?>
<?php include("header.php");?>

<style>
  .question{margin:0px 0 0 60px;}
  .question ul{margin-bottom:12px;}
  .question ul li{display:inline; padding-right:70px;height:24px; line-height:24px; font-size:16px;}
  form ul li{display:inline;}
</style>
<div class="question">
<?php if(!empty($question)){ 

    foreach($question as $result){
	if(!empty($reply))
	   foreach($reply as $answer){
?>
  <ul>
   <?php 
   if($answer['file_type']==$result['file_type']){ 
      $answer['file_type']=$result['file_type']=0;
   ?>
    <li>问：
      <?php echo $result['file_data'];?>
    </li>
    <li style="font-size:13px;">
      <?php echo $result['upload_time'];?>
    </li>
  <br/>
    <li>答：
      <?php echo $answer['file_data'];?>
    </li>
    <li style="font-size:13px;">
      <?php echo $answer['upload_time'];?>
    </li>
    <?php }?>
  </ul>
  <ul>
  <?php } if($result['file_type']!=0){?>
  <li>问：
      <?php echo $result['file_data'];?>
    </li>
    <li style="font-size:13px;">
      <?php echo $result['upload_time'];?>
    </li>
	<?php }?>
	</ul>
  <?php } } ?>
</div>
<form method="post" action="reply.do.php?file_name=<?=$quest?>">
  <ul>
    <li style="padding-left:60px;">
      <textarea rows="4" cols="61" name="content"></textarea>
    </li>
  </ul>
  <div style="padding:10px 0px 0px 160px">
    <input type="submit" value="回答"/>
  </div>
</form>
  


<?php include ('footer.php');?>