
<?php require_once "../include.php";?>
<?php include ("header.php");?>

<form method="post" name="form" action="addClass.do.php">
<div class="add">

    <ul>
      
      <li>
        专业名称：<input type="text" name="major_name" placeholder="请填入专业名称" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
              onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required"/>
      </li>
      <li>
        班级代码：<input type="text" name="class_id" placeholder="请填入数字代码" onkeyup="value=value.replace(/[^\d]/g,'')"
               onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required"/>&nbsp;例如：1201
      </li>
      <li>
        班级名称：<input type="text" name="class_name" placeholder="请填入班级名称" required="required"/>&nbsp;例如：1201班
    </li>
    </ul>
</div>

<div style="padding:10px 0px 0px 200px;">
  <input type="submit" value="添加"/>
  <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
</div>

</form>

<?php include ("../students/footer.php");?>