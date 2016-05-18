<?php include ("header.php");?>
<?php require_once "../include.php";?>
<script>
  function add()
  {
  var tb = document.getElementById("addtr");
  var oTr = tb.rows[1];
  var newTr = oTr.cloneNode(true);

  tb.getElementsByTagName("tbody")[0].insertBefore(newTr, tb.rows[tb.rows.length - 1]);

  newTr.cells[0].firstChild.value = newTr.rowIndex;
  document.getElementById("b1").disabled = newTr.rowIndex ==5 ;
  }
</script>
<div class="addStudent">
  
<form method="post" action="addStudent.upload.php" enctype="multipart/form-data">
  <input type="file" name="myFile"/>
  <input type="submit" name="submit1" value="导入excel表格" accept=""/>
</form>
<form method="post" name="form" action="addStudent.do.php">

<table id="addtr" magrin="0" padding="0" width="99%">
  <tr>
    <th width="50px">学号</th>
    <th>姓名</th>
    <th>性别</th>
    <th>学院</th>
    <th>专业</th>
    <th>行政班</th>
    <th>年级</th>
    <th>生日</th>
    <th>政治面貌</th>
    <th>民族</th>
    <th>电话</th>
  </tr>
  <tr>
    <th> 
      <input type="text" name="number[]" placeholder="只能填入数字" onkeyup="value=value.replace(/[^\d]/g,'')"
                    onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required"/>
    </th>
    <th>
      <input type="text" name="name[]" placeholder="请填入姓名" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
              onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required"/>
  </th>
    <th>
      <select name="sex[]" required="required">
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
        <option value="软工">软件工程专业</option>
        <option value="网工">网络工程专业</option>
        <option value="计科">计算机科学与技术</option>
        <option value="信计">信息与技术专业</option>
      </select>
    </th>
    <th>
      <input type="text" name="political_class[]" placeholder="请填入行政班级名称" required="required"/>
    </th>
    <th>
      <select name="grade[]" >
        <option value="2012">2012级</option>
        <option value="2013">2013级</option>
        <option value="2014">2014级</option>
      </select>
    </th>
    <th>
      <input type="date" name="birthday[]"/>
    </th>
    <th>
      <select name="political_status[]" >
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
      <input type="text" name="phone[]" maxlength="11" onblur="if(!(/13\d{9}|15[89]\d[8]|/18\d{9}/.test(this.value))){alert('电话输入出错，请重新输入');}" required="required"/>
    </th>
  </tr>
</table>


<div style="padding:10px 0px 0px 200px;">
  <!--<input type="button" value="添加下一行" onclick="add()"/> -->
   <input type="submit" name="submit2" value="确定添加"/>
  <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
</div>
</form>
</div>

<?php include ("../students/footer.php");?>