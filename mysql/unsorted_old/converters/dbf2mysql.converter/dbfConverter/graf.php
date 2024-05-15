<?php
require("config.php");
?>
<html>
<head>
<!--
I get this script on http://www.js-examples.com
with a little changes ;-)
-->
<style type=text/css>
.d1 {     position: absolute;	 
     top:41;	 
     left:210;	 
     z-index:5;     
     color:black;     
     width:400;      
     heigth: 20; 	 
     clip:rect(0,400,21,0);	 
     background-color:red; 	 
     border-width:1;	 
     border-style:solid;
}
.d2 {
     position: absolute;
	 top:41;
	 left:210;
	 z-index:10;
     color:black;
     width:400; 
     heigth: 20; 
	 clip:rect(0,400,21,0); 
	 background-color:white; 
	 border-width:1;
	 border-style:solid;
	}
.d3 {
     position: absolute;
	 top:40;
	 left:10;
	 z-index:1;
     color:black;
     width:200; 
     heigth: 20; 
	 background-color:#DDE8FF; 
	 border-width:0;
	 border-style:solid;
	}
.d4 {
     position: absolute;
	 top:40;
	 left:609;
	 z-index:1;
     color:black;
     width:20; 
     heigth: 20; 
	 background-color:#DDE8FF; 
	 border-width:0;
	 border-style:solid;
	}
</style>
<title>loader place</title></head>
<body onLoad="javascript:startIt()" bgcolor="#DDE8FF">
<div class=d1 id=d1 name=d1></div>
<div class=d2 id=d2 name=d2></div>
<div class=d3 id=d3 name=d3>
<form name="f_enota" method="post" action="">
	<input type="text" name="enota" value="<?=$Title_name?>" size="30">
</form>
</div>
<div class=d4 id=d4 name=d4>
<form name="procent" method="post" action="">
  <input type="text" name="perc" value="0" size="2">%
</form>
</div>
<script>
var count=0;
var MAXcount=100; // number of intervals
var width=400; // width of status bar.
function incOneIE() {
  var count= parseInt(procent.perc.value);
  var _i = parseInt(width / MAXcount) * (count);
  document.all.d1.style.zIndex=20;
  document.all.d1.style.clip="rect(0,"+_i+",20,0)";
  document.all.d1.style.width=_i;
}
var doagain = null;
function stopIt() { if (doagain != null) clearInterval(doagain); }
function startIt() {
stopIt();
if (document.all)
  doagain = setInterval("incOneIE()",100); // 1/10 second interval
}
</script>
</body>
</html>
