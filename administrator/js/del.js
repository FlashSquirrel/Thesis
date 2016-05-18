  function myconfirm()
  {
      var r=confirm("确定要删除？");
      if(r){
          method="post";
          action="asistantor.mod.php?id="+$result['id'];
      }
  }