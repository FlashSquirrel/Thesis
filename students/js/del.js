 function myconfirm()
{
     var r=confirm("ȷ��ɾ����")
     if(r==true)
    {
         method = "post";
         action = "choose.php?id=" + $result['id'];
         submit();
    }
}