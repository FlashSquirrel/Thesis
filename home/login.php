<?php 
    require_once ('../include.php');
	connect();
	mysql_query("set names 'utf-8'");

	$img = fetchAll("select * from total_table where type = 'img'");
?>

<!DOCTYPE HTML> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"> 
<title>毕业论文（设计）信息化管理平台</title> 
<link rel="stylesheet" href="css/login.css"> 
<script language="javascript" type="text/javascript" src=""../scripts/login.js"></script>
<script language="javascript" type="text/javascript">
function openfindpwd()
{window.open('forget.php', 'newwindow', 'height=200, width=400, top=100, left=100, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');}
</script>
<style>
.header{display:inline; margin:0;padding:0;line-height:90px;}
.header span{font-size:35px;color:#FFF;display: table-cell;vertical-align:middle;padding-left:13px;}
.header img{width:90px;height:90px;};
</style>
</head> 

<body> 
<div class="header">
<img src="img/header.jpg" />
<span>计算机学院毕业论文（设计）信息化管理平台</span>
</div>
<div class="wrap"> 
  <form action="dologin.php" method="post"> 
    <section class="loginForm"> 
      <div class="loginForm_content"> 
	  <fieldset class="filedest1">登录</fieldset>
        <fieldset> 
            <div class="inputWrap"> 
                   <input type="text" name="username" placeholder="请输入账号" required> 
            </div> 
            <div class="inputWrap"> 
                   <input type="password" name="password" placeholder="请输入密码" required> 
             </div> 
        </fieldset> 
        <fieldset> 
		<div class="radios">
           <input type="radio" name="user_id" value="student" />学生
	       <input type="radio" name="user_id" value="teacher"/>老师
		   <input type="radio" name="user_id" value="administrator"/>管理员
		   <input type="radio" name="user_id" value="asistantor"/>学科秘书
	    <br/>
              <input type="checkbox" checked="checked"><span>下次自动登录</span>&nbsp;
			  &nbsp;<a href="javascript:openfindpwd()" class="a1">忘记密码</a> &nbsp;<!--|&nbsp; <a href="#">注册</a> -->
              <input type="submit" name="submit" value="登录"> 
			  </div>
        </fieldset> 
      </div> 
    </section> 
  </form> 
</div> 

<div class="images">
<div id="gpic" style="overflow:hidden; width:90%; height:220px;">
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td id="gpic1" valign="top" align="center"><table width="974" border="0" align='center' cellpadding="0" cellspacing="0">
        <tr>
		<?php 
		    if(!empty($img))
		     foreach($img as $result){
		?>
          <td height="220" width="240" bgcolor="#FFFFFF"><img src="../uploads/img/<?php echo $result['file_name'];?>" height="220" width="240"/></td>
		  <?php }?>
        </tr>
      </table></td>
    <td id="gpic2" valign="top"></td>
  </tr>
</table>
</div>
<script>
var speed=30
gpic2.innerHTML=gpic1.innerHTML
function Marquee(){
if(gpic2.offsetWidth-gpic.scrollLeft<=0)
gpic.scrollLeft-=gpic1.offsetWidth
else{
gpic.scrollLeft++
}
}
var MyMar=setInterval(Marquee,speed)
gpic.onmouseover=function() {clearInterval(MyMar)}
gpic.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
</script>
</div>
</body> 
</html>