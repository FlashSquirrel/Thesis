//为了让IE支持HTML5元素，做如下操作:
document.createElement("section"); 
document.createElement("header"); 
document.createElement("footer"); 

var speed=30
gpic2.innerHTML=gpic1.innerHTML
function Marquee(){
if(gpic2.offsetWidth-gpic.scrollLeft<=0)
gpic.scrollLeft-=gpic1.offsetWidth
else{
gpic.scrollLeft++
}
}
var MyMar=setInterval(Marquee,speed)
gpic.onmouseover=function() {clearInterval(MyMar)}
gpic.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
