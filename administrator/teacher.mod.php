
<?php 
    require_once '../include.php';
    connect();
	mysql_query("set names 'utf-8'");
	
	$teacher_id = $_GET['id'];
	$teacher = fetchAll("select * from user where id = '$teacher_id' ");	
?>
<?php include ("header.php");?>

<div class="addTeacher">
 <form method="post" action="teacher.mod.do.php?id=<?=$teacher_id?>">
    <table style="align:center">
      <tr>
        <th width="50px">工号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>学院</th>
        <th>专业</th>
        <th>职称</th>
        <th>生日</th>
        <th>政治面貌</th>
        <th>民族</th>
        <th>邮箱</th>
        <th>电话</th>
      </tr>
      <tr>
        <th>
          <input type="text" name="number[]" placeholder="请填入老师工号" onkeyup="value=value.replace(/[^\d]/g,'')"
                    onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required" value="<?php echo $teacher[0]['number'];?>"/>
        </th>
        <th>
          <input type="text" name="name[]" placeholder="请填入姓名" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
                   onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required" value="<?php echo $teacher[0]['name'];?>"/>
        </th>
        <th>
          <select name="sex[]">
		    <option value="<?php echo $teacher[0]['sex'];?>"><?php echo $teacher[0]['sex'];?></option>
            <option value="女">女</option>
            <option value="男">男</option>
          </select>
        </th>
        <th>
          <select name="institute[]">
            <option value="计算机学院">计算机学院</option>
          </select>
        </th>
        <th>
          <select name="major[]">
		  <option value="<?php echo $teacher[0]['major'];?>"><?php echo $teacher[0]['major'];?></option>
            <option value="软工">软件工程专业</option>
            <option value="网工">网络工程专业</option>
            <option value="计科">计算机科学与技术</option>
            <option value="信计">信息与技术专业</option>
          </select>
        </th>
        <th>
          <select name="position[]">
		  <option value="<?php echo $teacher[0]['position'];?>"><?php echo $teacher[0]['position'];?></option>
            <option value="教授">教授</option>
            <option value="副教授">副教授</option>
            <option value="讲师">讲师</option>
          </select>
        </th>
        <th>
          <input type="text" name="birthday[]" value="<?php echo $teacher[0]['birthday'];?>"/>
        </th>
        <th>
          <select name="political_status[]">
		  <option value="<?php echo $teacher[0]['political_status'];?>"><?php echo $teacher[0]['political_status'];?></option>
            <option value="群众">群众</option>
            <option value="共青团员">共青团员</option>
            <option value="预备党员">预备党员</option>
            <option value="党员">党员</option>
          </select>
        </th>
        <th>
          <select name="national[]">
		  <option value="<?php echo $teacher[0]['national'];?>"><?php echo $teacher[0]['national'];?></option>
            <option value="汉族">汉族</option>
            <option value="高山族">高山族</option>
            <option value="维吾尔族">维吾尔族</option>
            <option value="土家族">土家族</option>
            <option value="白族">白族</option>
          </select>
        </th>
        <th>
          <input type="email" name="email[]" value="<?php echo $teacher[0]['email'];?>"/>
        </th>
        <th>
          <input type="text" name="phone[]" maxlength="11" onblur="if(!(/13\d{9}|15[89]\d[8]|/18\d{9}/.test(this.value))){alert('电话输入出错，请重新输入');}" required="required" value="<?php echo $teacher[0]['phone'];?>" />
        </th>
      </tr>
    </table>

    <div style="padding:10px 0px 0px 200px;">
      <input type="submit" name="submit2" value="确定修改"/>
      <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
    </div>
  </form>
  </div>
<?php include ("../students/footer.php");?>