 function myconfirm()
{
     var r=confirm("È·¶¨É¾³ýÂð£¿")
     if(r==true)
    {
         method = "post";
         action = "choose.php?id=" + $result['id'];
         submit();
    }
}