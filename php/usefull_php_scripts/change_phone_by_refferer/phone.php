<?php
	if ($phone == "" && $_GET["yd"] == "1") echo "(812) 401-01-30";
	elseif  ($phone == "" && $_GET["yd"] != "1") echo "(812) 577-39-74";
	else echo $phone;
?>
