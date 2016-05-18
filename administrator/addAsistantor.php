
<?php require_once '../include.php';?>
<?php include ("header.php");?>

<form method="post" name="myform" action="addAsistantor.do.php">
  <div class="add">
      <ul>
        <li>
          工号：<input type="text" name="number"  placeholder="请填入老师工号" onkeyup="value=value.replace(/[^\d]/g,'')" 
                    onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required" />
        </li>
        <li>
          姓名：<input type="text" name="name" placeholder="请填入姓名" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
                   onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required"/>
        </li>
        <li>
          性别：<select name="sex">
            <option value="男">男</option>
            <option value="女">女</option>
          </select>
        </li>
        <li>
          邮箱：<input type="email" name="email" required="required"/>
        </li>
        <li>
          电话：<input type="tel" name="phone" maxlength="11" onblur="if(!(/13\d{9}|15[89]\d[8]|/18\d{9}/.test(this.value))){alert('电话输入出错，请重新输入');}" required="required"/>
        </li>
      </ul>
  </div>

  <div style="padding:10px 0px 0px 200px;">
    <input type="submit" name="submit" value="添加"/>
    <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
  </div>
</form>
  
<?php include ("../students/footer.php");?>