<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/ref/ref.php");
	$referrer = $_SERVER["HTTP_REFERER"];
	if (!$referrer) $referrer = "typeIn";
	$referrersList = "http://www.cdoors.ru/ref/ref.txt";
	if ($_GET["yd"] == 1) {
		if (!isset($_COOKIE['source'])) setcookie("source","ßÄ",0x6FFFFFFF);
			$res = $_COOKIE['source'];
		if (!isset($_COOKIE['phone'])) setcookie("phone","(812) 401-01-30",0x6FFFFFFF);
			$phone = $_COOKIE["phone"];
	}
	else
		echo checkReferrer($referrer,$referrersList);
?>