﻿<?php include ("header.php");?>
<?php require_once '../include.php';?>

<form method="post" name="form" action="information.do.php">
  <div class="add" style="padding:15px 0 0 15%">

      <ul>
        <li>
          姓名：<input type="text" name="name"/>
        </li>
        <li>
          学号：<input type="text" name="number"/>
        </li>
        <li>
          年级：<input type="text" name="grade"/>
        </li>
        <li>
          学院：<input type="text" name="institute"/>
        </li>
		     <li>
          专业：<input type="text" name="major"/>
        </li>
        <li>
          电话：<input type="text" name="phone"/>
        </li>

      </ul>
  </div>

  <div style="padding:10px 0px 0px 200px;">
    <input type="submit" name="submit" value="确定修改"/>
    <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
  </div>
</form>
  
<?php include ("../students/footer.php");?>