
<?php require_once "../include.php";?>
<?php include ("header.php");?>

<form method="post" name="form1" action="addMajor.do.php">
  <div class="add">
      <ul>
        <li>
          学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;院：<select name="institute">
            <option value="计算机学院">计算机学院</option>
          </select>
        </li>
        <li>
          专业名称：<input type="text" name="major_name" placeholder="请填入专业名称" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')"
         onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))" required="required"/>
        </li>
        <li>
          专业编号：<input type="text" name="major_num" placeholder="请填入数字编号" onkeyup="value=value.replace(/[^\d]/g,'')"
               onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" required="required"/>
        </li>
      </ul>

  </div>

<div style="padding:10px 0px 0px 200px;">
  <input type="submit" value="添加"/>
  <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
</div>

</form>

<?php include ("../students/footer.php");?>