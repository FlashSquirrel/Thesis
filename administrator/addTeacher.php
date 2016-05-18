
<?php
  require_once "../include.php";
  mysql_query("SET NAMES 'utf-8'");
?>
<?php include ("header.php");?>

<form method="post" action="addTeacher.upload.php" enctype="multipart/form-data">
  <input type="file" name="myFile" id="file" multiple=""/>
  <input type="submit" name="submit1" value="导入excel表格" accept=""/>
</form>

<div class="addTeacher">
  <form method="post" action="addTeacher.do.php">
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
          <input type="text" name="number[]" placeholder="请填入工号" onkeyup="value=value.replace(/[^\d]/g,'')"
                    onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required"/>
        </th>
        <th>
          <input type="text" name="name[]" placeholder="请填入姓名" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
              onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required"/>
        </th>
        <th>
          <select name="sex[]">
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
            <option value="软件工程专业">软件工程专业</option>
            <option value="网络工程专业">网络工程专业</option>
            <option value="计算机科学与技术">计算机科学与技术</option>
            <option value="信息与技术专业">信息与技术专业</option>
          </select>
        </th>
        <th>
          <select name="position[]">
            <option value="教授">教授</option>
            <option value="副教授">副教授</option>
            <option value="讲师">讲师</option>
          </select>
        </th>
        <th>
          <input type="date" name="birthday[]" required="required"/>
        </th>
        <th>
          <select name="political_status[]">
            <option value="群众">群众</option>
            <option value="共青团员">共青团员</option>
            <option value="预备党员">预备党员</option>
            <option value="党员">党员</option>
          </select>
        </th>
        <th>
          <select name="national[]">
            <option value="汉族">汉族</option>
            <option value="高山族">高山族</option>
            <option value="维吾尔族">维吾尔族</option>
            <option value="土家族">土家族</option>
            <option value="白族">白族</option>
          </select>
        </th>
        <th>
          <input type="email" name="email[]" required="required"/>
        </th>
        <th>
          <input type="text" name="phone[]" maxlength="11" onblur="if(!(/13\d{9}|15[89]\d[8]|/18\d{9}/.test(this.value))){alert('电话输入出错，请重新输入');}" required="required"/>
        </th>
      </tr>
    </table>

    <div style="padding:10px 0px 0px 200px;">
      <input type="submit" name="submit2" value="确定添加"/>
      <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
    </div>
  </form>
</div>
<?php include ("../students/footer.php");?>
