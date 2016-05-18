
<?php 
    require_once"../include.php";
    connect();
    mysql_query("SET NAMES 'utf-8'");

	$thesis_id = $_GET['id'];
    $thesis_title = fetchAll("select * from thesis_title where id = '$thesis_id'");
?>
<?php include ("header.php");?>

<form method="post" action="check.do.php?id=<?=$id?>">

    <h2 name="title" style="margin:20px 0 0 10%;"><?php echo $thesis_title[0]['create_ask_table'];?></h2>
    <h3 style="margin:20px 0 0 10%">添加评论：</h3>
    <p>
       <textarea rows="10" cols="75" style="margin:10px 0 0 10%" name="review"></textarea>
    </p>

	<div class='check_submit' style="margin:20px 0 0 15%">
	    <input type="submit" value="通过审核" name="submit"/>&nbsp;&nbsp;
		<input type="submit" value="不通过审核" name="submit"/>
	</div>
  </form>

<?php include ('../students/footer.php');?>