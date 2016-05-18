<?php
    require_once ('../include.php');
	connect();
	mysql_query("set names 'utf-8'");
	//session_start();
	$id = $_SESSION['id'];
	
	$user = fetchAll("select * from user where id = '$id'");

	//$result = update('user',$user,'id'=='$id');
?>
<?php include ('header.php');?>

<div class="password" style="padding:7% 0 0 25%;">
<form method="post" name="form" action="password_change.do.php">
    <ul>
	    <li style="padding:0 0 10px 0;"><input type="password" name="pwd" placeholder="请输入旧密码" maxlength="16"/></li>
        <li style="padding:0 0 10px 0;"><input type="password" name="pwd1" placeholder="请输入新密码" maxlength="16"/></li>
	    <li style="padding:0 0 10px 0"><input type="password" name="pwd2" placeholder="请确认新密码" maxlength="16"/></li>
	    <li style="padding:0 0 10px 0">
		    <input type="submit" name="submit" value="确定">
			 <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
	    </li>
    </ul>
</form>
</div>

<?php include ("../students/footer.php");?>