<?php
require("config.php");
?>
<html>

<head>

<title><?=$Title_name?></title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">

</head>
<frameset rows="80%,80" frameborder="YES" border="0" framespacing="0"> 
  <frameset rows="104,*" frameborder="YES" border="0" framespacing="0" cols="*"> 
    <frame name="graf" scrolling="NO" noresize src="graf.php" >
    <frame name="input" src="input.php">
  </frameset>
  <frame name="bootom" src="bootom.php">
</frameset>

<noframes> 

<body bgcolor="#FFFFFF" text="#000000">

</body>

</noframes> 

</html>

