1 в head

<script language="JavaScript1.2">
var ie=document.all
var dom=document.getElementById
var ns4=document.layers
var calunits=document.layers? "" : "px"
var bouncelimit=32 //должно делиться на 8
var direction="up" //откуда падаем
function initbox(){
if (!dom&&!ie&&!ns4)
return
crossobj=(dom)?document.getElementById("dropin").style : ie? document.all.dropin :
document.dropin
scroll_top=(ie)? truebody().scrollTop : window.pageYOffset
crossobj.top=scroll_top-250+calunits
crossobj.visibility=(dom||ie)? "visible" : "show"
dropstart=setInterval("dropin()",50)
}
function dropin(){
scroll_top=(ie)? truebody().scrollTop : window.pageYOffset
if (parseInt(crossobj.top)<100+scroll_top)
crossobj.top=parseInt(crossobj.top)+40+calunits
else{
clearInterval(dropstart)
bouncestart=setInterval("bouncein()",50)
}
}
function bouncein(){
crossobj.top=parseInt(crossobj.top)-bouncelimit+calunits
if (bouncelimit<0)
bouncelimit+=8
bouncelimit=bouncelimit*-1
if (bouncelimit==0){
clearInterval(bouncestart)
}
}
function dismissbox(){
if (window.bouncestart) clearInterval(bouncestart)
crossobj.visibility="hidden"
}
function truebody(){
return (document.compatMode && document.compatMode!="BackCompat")?
document.documentElement : document.body
}
function get_cookie(Name) {
var search = Name + "="
var returnvalue = ""
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) {
offset += search.length
end = document.cookie.indexOf(";", offset)
if (end == -1)
end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function dropornot(){
if (get_cookie("droppedin")==""){
window.onload=initbox
document.cookie="droppedin=yes"
}
}
dropornot()
</script>

2 перед /body
<div id="dropin"
style="position:absolute;visibility:hidden;left:200px;top:100px;width:500px;height:300px;background-color:#F5F5F5">
<div align="right"><a href="#" onClick="dismissbox();return false">Закрыть</a></div>
Текст и картинки здесь
</div>
