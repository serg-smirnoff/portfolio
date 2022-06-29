<?php
function checkReferrer($referrer,$referrersList){

$referrers = file($referrersList);

if ($referrers){
   if (isset($_COOKIE['ref'])){

	foreach ($referrers as $item => $value) {
	 $search = array ("'([\r\n])[\s]+'");
	 $replace = array ("");
	 $value = preg_replace ($search, $replace, $value);
     if (substr_count($_COOKIE['ref'], $value) > 0){
			switch ($item) {
				case 0:
                        if (!isset($_COOKIE['source'])) setcookie("source","ТИ",0x6FFFFFFF);
						$res = $_COOKIE['source'];
						if (!isset($_COOKIE['phone'])) setcookie("phone","(812) 577-39-74",0x6FFFFFFF);
						$phone = $_COOKIE["phone"];
                        break;
				case 1:
						if ((!isset($_COOKIE['source'])) && (!isset($_GET['yd']))) setcookie("source","ЯО",0x6FFFFFFF);
                        $res = $_COOKIE['source'];
						if ((!isset($_COOKIE['phone'])) && (!isset($_GET['yd']))) setcookie("phone","(812) 577-39-74",0x6FFFFFFF);
						$phone = $_COOKIE["phone"];
						break;
				case 2:
						if (!isset($_COOKIE['source'])) setcookie("source","ГО",0x6FFFFFFF);
						$res = $_COOKIE['source'];
						if (!isset($_COOKIE['phone'])) setcookie("phone","(812) 577-39-74",0x6FFFFFFF);
						$phone = $_COOKIE["phone"];
						break;
				case 3:
						if (!isset($_COOKIE['source'])) setcookie("source","РА",0x6FFFFFFF);
						$res = $_COOKIE['source'];
						if (!isset($_COOKIE['phone'])) setcookie("phone","(812) 577-39-74",0x6FFFFFFF);
						$phone = $_COOKIE["phone"];
						break;
				case 4:
						if (!isset($_COOKIE['phone'])) setcookie("phone","(812) 577-39-74",0x6FFFFFFF);
						$phone = $_COOKIE["phone"];
						break;
	 }
	}


	}
    }


	foreach ($referrers as $item => $value) {	 $search = array ("'([\r\n])[\s]+'");
	 $replace = array ("");
	 $value = preg_replace ($search, $replace, $value);
     if (substr_count($referrer, $value) > 0){			switch ($item) {
				case 0:
						if (!isset($_COOKIE['ref'])) setcookie("ref",$referrer,0x6FFFFFFF);
						$ref = $_COOKIE['ref'];
						if ($ref == $referrer) {
							if (isset($_COOKIE['hits'])) $cnt=$_COOKIE['hits']+1;
							else $cnt=0;
							setcookie("hits",$cnt,0x6FFFFFFF);
							$resCookie = $_COOKIE['hits'];
							setcookie("Hit",2+$resCookie,0x6FFFFFFF);
						}
					break;
				case 1:
						if (!isset($_COOKIE['ref'])) setcookie("ref",$referrer,0x6FFFFFFF);
						$ref = $_COOKIE['ref'];
						if ($ref == $referrer) {
							if (isset($_COOKIE['hits'])) $cnt=$_COOKIE['hits']+1;
							else $cnt=0;
							setcookie("hits",$cnt,0x6FFFFFFF);
							$resCookie = $_COOKIE['hits'];
							setcookie("Hit",1+$resCookie,0x6FFFFFFF);
						}
					break;
				case 2:
						if (!isset($_COOKIE['ref'])) setcookie("ref",$referrer,0x6FFFFFFF);
						$ref = $_COOKIE['ref'];
						if ($ref == $referrer){
							if (isset($_COOKIE['hits'])) $cnt=$_COOKIE['hits']+1;
							else $cnt=0;
							setcookie("hits",$cnt,0x6FFFFFFF);
							$resCookie = $_COOKIE['hits'];
							setcookie("Hit",2+$resCookie,0x6FFFFFFF);
						}
					break;
				case 3:
						if (!isset($_COOKIE['ref'])) setcookie("ref",$referrer,0x6FFFFFFF);
						$ref = $_COOKIE['ref'];
						if ($ref == $referrer) {
							if (isset($_COOKIE['hits'])) $cnt=$_COOKIE['hits']+1;
							else $cnt=0;
							setcookie("hits",$cnt,0x6FFFFFFF);
							$resCookie = $_COOKIE['hits'];
							setcookie("Hit",2+$resCookie,0x6FFFFFFF);
						}
					break;
				case 4:
					$res = "";
	                    $resCookie = "";
					break;
			}     }
	}} else {	echo "Ошибка. Файл ref.txt не найден.";
	$res = "";
}

// Cookie All Visits
if (isset($_COOKIE['allHit'])) $cnt=$_COOKIE['allHit']+1;
else $cnt=0;
setcookie("allHit",$cnt,0x6FFFFFFF);
$allCookie = $_COOKIE['allHit'];
$resCookie = $_COOKIE['Hit'];
return $res.$allCookie."-A".$resCookie;
}
?>