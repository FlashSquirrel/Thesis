
<?php 
    require_once'../include.php';
    connect();
    mysql_query("set names 'utf-8'");
    
  $id=$_SESSION['id'];
?>
<?php include("header.php");?>

<form method="post" action="myThesis.question.add.do.php">
  <table style="padding:10px 0 0 70px">
    <tr>
      <td>问题：</td>
      <th>
        <textarea rows="10" cols="75" style="margin:10px" name="title"></textarea>
      </th>
    </tr>
  </table>
  <div style="padding:10px 0px 0px 260px">
    <input type="submit" value="提交"/>
    <input type="button" onclick="javascript:history.back(-1);" value="取消"/>
  </div>
</form>

<?php include ('footer.php');?>