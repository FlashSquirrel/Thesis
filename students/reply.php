<?php 
    require_once'../include.php';
    connect();
    mysql_query("set names 'utf-8'");

  $id=$_SESSION['id'];
  $quest = $_GET['question'];
  $question = fetchAll("select file_name,upload_time,file_data,file_type from total_table where upload_user_id='$id' and type='question' and file_name like '$quest'");
  $reply = fetchAll("select file_data,upload_time,file_type from total_table where file_name='$quest' and type='reply'");
?>
<?php include("header.php");?>

<style>
  .question{margin:0px 0 0 60px;}
  .question ul{margin-bottom:12px;}
  .question ul li{display:inline; padding-right:70px;height:28px; line-height:28px; font-size:16px;}
  form ul li{display:inline;}
</style>
<div class="question">
<?php if(!empty($question)){ 
    foreach($question as $result){
        foreach($reply as $answer){
?>
  <ul>
    <?php 
    if($answer['file_type']==$result['file_type']){
       $answer['file_type']=$result['file_type']=0;
    ?>
    <li>
      问：
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
  <?php }  if($result['file_type']!=0){?>
  <li style="display:inline;">
    问：
    <?php echo $result['file_data'];?>
  </li>
  <li style="font-size:13px;">
    <?php echo $result['upload_time'];?>
  </li>
  <?php }?>
  </ul>
  <?php } } ?>
</div>
<form method="post" action="reply.add.do.php?file_name=<?=$quest?>">
  <ul>
    <li style="padding-left:60px;">
      <textarea rows="7" cols="68" name="content"></textarea>
    </li>
  </ul>
  <div style="padding:10px 0px 0px 160px">
    <input type="submit" value="追问"/>
  </div>
</form>
  


<?php include ('footer.php');?>