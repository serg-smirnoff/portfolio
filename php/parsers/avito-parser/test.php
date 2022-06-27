<form name="form1" method="get" action="">
  јдрес рубрики (список карточек): 
  <input type="text" name="urlik">
  <input type="submit" name="Submit" value="ќтправить">
</form>
<?php
set_time_limit(300);
 
//обнул€ем файл с данными
if ($_GET["dannie_del"]!="") {
$fp=fopen("dannie.txt","w");  
$data = "";
fwrite($fp, "$data");  
fclose($fp);
}
echo '<a href=?dannie_del=1>очистить файл с напарсенными данными</a><br>';
//обнул€ем файл с данными-----------------END
 
//читаем ссылки на объ€влени€ из файла в массив
$cache_file_obj="obj.txt";
$fp=fopen("$cache_file_obj","r");
$data = fread($fp, filesize($cache_file_obj));  
$linkOffer[1] = unserialize($data);
//fwrite($fp, "$data");  
fclose($fp);
echo "<br>ќбъ€влений в рубрике: ".count($linkOffer[1]);
echo "<br><br>";
if ($_GET["num_obj"]!="") {
$num_obj=$_GET["num_obj"];
echo $linkOffer[1][$num_obj];
if ($linkOffer[1][$num_obj]=="") {echo "<font color=red>кончились объ€влени€ на этой странице</font><br>";}
}
 
$headerMobile = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:max-age=0',
    'Connection:keep-alive',
    'Cookie:u=21vmd2no.n9j660.f6wvmteb71; _ym_uid=14714265131042248860; __gads=ID=abdce9bfb52a4f31:T=1471609884:S=ALNI_Man9QAeuZ6Tl3tkxrGSUGG6wcNWTA; dfp_group=16; weborama-viewed=1; f=4.b53ee41b77d9840ae5ba07059b0d202f6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc5b68b402642848be5b68b402642848bead33eaef55dd0da15b68b402642848be44620aa09dfab02de75a2b007093b89d05886bb864a616652f4891ba472e4f2618dc79c78ea31ba1ea48e2d99c5312aaffe65fd77b784b7bffe65fd77b784b7bb8a109ce707ef6137c6d6c44a42cb1c70176a16018517b5da399e993193588ae728b89f8cc435269728b89f8cc435269728b89f8cc435269728b89f8cc435269ffe65fd77b784b7b862357a052e106f23f601feec47f73646b10d486f2e98b94bbdd84537b03ad770afd39af11174777efa5660fd55a65b968eae11c327fbc017e3896e0dc5507a54fe26563f7e70342b3db510bee0b105f2878bfba0574374f5b68b402642848be5b68b402642848beec8be4370a6135b1dca1b47b9709106b31ad00aa0bbae7adb817e52b74497bd1; _ym_isad=1; nfh=2be1f7c16dcf4b7be36a84c5eded50d7; _ga=GA1.2.64612684.1471426513; _gid=GA1.2.56430582.1495885618; nps_sleep=1; __utmt=1; anid=removed; sessid=ba5227935cff55ff872b4e7e339801d6.1495906334; v=1495906269; crtg_rta=cravadb240%3D1%3B; __utma=99926606.64612684.1471426513.1495887691.1495906259.182; __utmb=99926606.7.9.1495906326960; __utmc=99926606; __utmz=99926606.1495216859.178.58.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)',
    'Host:m.avito.ru',
    'Referer:https://m.avito.ru/moskva/uslugi?p=17&sgtd=1&q=%D0%BC%D0%B0%D1%81%D1%82%D0%B5%D1%80+%D0%BC%D0%B0%D0%BD%D0%B8%D0%BA%D1%8E%D1%80%D0%B0+%D0%B8+%D0%BF%D0%B5%D0%B4%D0%B8%D0%BA%D1%8E%D1%80%D0%B0',
    'Upgrade-Insecure-Requests:1',
    'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'
);
 
function getPhone ($ch, $link, $referer) {
global $proxi_ip, $proxi_port;
    $headerPhone = array(
        'Accept:application/json',
        'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
        'Connection:keep-alive',
        'Cookie:u=21vmd2no.n9j660.f6wvmteb71; _ym_uid=14714265131042248860; __gads=ID=abdce9bfb52a4f31:T=1471609884:S=ALNI_Man9QAeuZ6Tl3tkxrGSUGG6wcNWTA; dfp_group=16; weborama-viewed=1; f=4.b53ee41b77d9840ae5ba07059b0d202f6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc5b68b402642848be5b68b402642848bead33eaef55dd0da15b68b402642848be44620aa09dfab02de75a2b007093b89d05886bb864a616652f4891ba472e4f2618dc79c78ea31ba1ea48e2d99c5312aaffe65fd77b784b7bffe65fd77b784b7bb8a109ce707ef6137c6d6c44a42cb1c70176a16018517b5da399e993193588ae728b89f8cc435269728b89f8cc435269728b89f8cc435269728b89f8cc435269ffe65fd77b784b7b862357a052e106f23f601feec47f73646b10d486f2e98b94bbdd84537b03ad770afd39af11174777efa5660fd55a65b968eae11c327fbc017e3896e0dc5507a54fe26563f7e70342b3db510bee0b105f2878bfba0574374f5b68b402642848be5b68b402642848beec8be4370a6135b1dca1b47b9709106b31ad00aa0bbae7adb817e52b74497bd1; _ym_isad=1; anid=removed; sessid=af43614ec2d2387e2822cf0b5c2e7d86.1495907798; _mlocation=637640; nps_sleep=1; nfh=14fc4f6eb1638a2e3d85b8f244d7bfc4; __utmt=1; __utma=99926606.64612684.1471426513.1495906259.1495916735.183; __utmb=99926606.1.10.1495916736; __utmc=99926606; __utmz=99926606.1495216859.178.58.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); _ga=GA1.2.64612684.1471426513; _gid=GA1.2.56430582.1495885618; _gat=1; _ga=GA1.3.64612684.1471426513; _gid=GA1.3.56430582.1495885618; _gat_UA-20699421-1=1; crtg_rta=cravadb240%3D1%3B; v=1495915550',
        'Host:m.avito.ru',
        'Referer:'.$referer,
        'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
        'X-Requested-With:XMLHttpRequest',
    );
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerPhone);
    $result = curl_exec($ch);
    var_dump($result);
	return $result;
}
function replaceString ($string){
    $string = str_replace(";", ",", $string);
    $string = str_replace("&nbsp,", " ", $string);
    $string = str_replace("&quot,", " ", $string);
    $string = preg_replace("/\s+/", " ", $string);
    return $string;
}
 
///стартуем
echo "стартуем";
// ----------------------------------------
//парсим одну страницу - $url_odno_objavlenie
$url_odno_objavlenie = str_replace('https://m.avito.ru', '', $url_odno_objavlenie);
$url_odno_objavlenie = str_replace('https://www.avito.ru', '', $url_odno_objavlenie);
$link = $url_odno_objavlenie;
 
//---------------парсим объ€вление по одному
//переход к следующей записи - парсим объ€влени€ по одному
if ($_GET["num_obj"]!="") {
$num_obj=$_GET["num_obj"];
$link=$linkOffer[1][$num_obj];
echo "<br>≈сть номер объ€влени€, парсим объ€влени€ по одному<br>";
 
        $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_URL, 'https://m.avito.ru' . $link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerMobile);
        $card = curl_exec($ch);
        preg_match("/show-number\W+\"\W+href=\"([^\"]+)\"/siu", $card, $linkPhone);
        $linkPhone = 'https://m.avito.ru' . $linkPhone[1] . '?async';
        $referer = 'https://m.avito.ru' . $link;
        $urlOffer = 'https://www.avito.ru' . $link;
 
preg_match("/<header class=\"single-item-header b-with-padding\">(.*?)<\/header>/s", $card, $header);
$header = trim($header[1]);
echo $header;
 
//echo getPhone($ch, $linkPhone, $referer);
 
$phone = json_decode(getPhone($ch, $linkPhone, $referer), true);
$phone = (!empty($phone['phone'])) ? $phone['phone'] : 'нет данных';
echo "	$phone";
 
preg_match("/class=\"person-name person-name-link\">(.*?)<\/a>/s", $card, $name);
$name = trim($name[1]);
echo "	$name";
$dannie=$dannie."$header	$phone	$name
";
flush();
//записываем полученные данные в файл, каждый новый в новую строку
$cache_file_dannie="dannie.txt";
$fp=fopen("$cache_file_dannie","a");  
//fwrite($fp, "\r\n" . "$dannie");
fwrite($fp, "$dannie");  
fclose($fp);
curl_close($ch);
 
$num_obj_plus=$num_obj+1;
echo "<br><a href=\"?num_obj=$num_obj_plus\">к следующему объ€влению ($num_obj_plus)</a>";
      if ($linkOffer[1][$num_obj]!="") {
      echo "<meta http-equiv=\"refresh\" content=\"50;URL=?num_obj=$num_obj_plus\">";
      ?>
      <button id="buttton_timer">“аймер перехода к следующему объ€влению</button> 
      <script>
      var button = document.getElementById('buttton_timer');
      onload = function() {
        var time = 50;
        button.disabled = true;
        button.innerHTML = 'ѕереход к следующему объ€влению через ' + time;
        var interval_id = setInterval(function() {  /* запуск таймера */
          time--;
          if (time != 0) {
            button.innerHTML = 'ѕереход к следующему объ€влению через ' + time;
          } else {
            clearInterval(interval_id);  /* остановка таймера */
            button.disabled = false;
            button.innerHTML = 'ѕереходим дальше >>>';
          }
        }, 1000);
      };
      </script>
      <?
      }
}
else {
$num_obj="0";
echo "<a href=\"?num_obj=0\">к следующему объ€влению (1)</a>";
}
//переход к следующей записи - парсим объ€влени€ по одному------------------END
 
if ($_GET["urlik"]!="") {
$urlik=$_GET["urlik"];
 
    $mainUrl = $urlik; 
    echo " ---- ".$mainUrl.PHP_EOL;
    $header = array(
        'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
        'Cache-Control:max-age=0',
        'Connection:keep-alive',
        'Cookie:u=21vmd2no.n9j660.f6wvmteb71; _ym_uid=14714265131042248860; __gads=ID=abdce9bfb52a4f31:T=1471609884:S=ALNI_Man9QAeuZ6Tl3tkxrGSUGG6wcNWTA; dfp_group=16; weborama-viewed=1; f=4.b53ee41b77d9840ae5ba07059b0d202f6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc6e619f2005f5c6dc5b68b402642848be5b68b402642848bead33eaef55dd0da15b68b402642848be44620aa09dfab02de75a2b007093b89d05886bb864a616652f4891ba472e4f2618dc79c78ea31ba1ea48e2d99c5312aaffe65fd77b784b7bffe65fd77b784b7bb8a109ce707ef6137c6d6c44a42cb1c70176a16018517b5da399e993193588ae728b89f8cc435269728b89f8cc435269728b89f8cc435269728b89f8cc435269ffe65fd77b784b7b862357a052e106f23f601feec47f73646b10d486f2e98b94bbdd84537b03ad770afd39af11174777efa5660fd55a65b968eae11c327fbc017e3896e0dc5507a54fe26563f7e70342b3db510bee0b105f2878bfba0574374f5b68b402642848be5b68b402642848beec8be4370a6135b1dca1b47b9709106b31ad00aa0bbae7adb817e52b74497bd1; _ym_isad=1; nfh=2be1f7c16dcf4b7be36a84c5eded50d7; _ga=GA1.2.64612684.1471426513; _gid=GA1.2.56430582.1495885618; nps_sleep=1; __utmt=1; anid=removed; sessid=ba5227935cff55ff872b4e7e339801d6.1495906334; v=1495906269; crtg_rta=cravadb240%3D1%3B; __utma=99926606.64612684.1471426513.1495887691.1495906259.182; __utmb=99926606.7.9.1495906326960; __utmc=99926606; __utmz=99926606.1495216859.178.58.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)',
        'Host:www.avito.ru',
        'Referer:https://www.avito.ru/moskva/uslugi?p=17&sgtd=1&q=%D0%BC%D0%B0%D1%81%D1%82%D0%B5%D1%80+%D0%BC%D0%B0%D0%BD%D0%B8%D0%BA%D1%8E%D1%80%D0%B0+%D0%B8+%D0%BF%D0%B5%D0%B4%D0%B8%D0%BA%D1%8E%D1%80%D0%B0',
        'Upgrade-Insecure-Requests:1',
        'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $mainUrl);
    $result = curl_exec($ch);
    preg_match_all("/<a class=\"item-description-title-link\" href=\"(.*?)\"/", $result, $linkOffer);
    $count_anketa="0";   
 
//цикл ссылок на объ€влени€
//записываем ссылки на объ€влени€ из массива в файл
$cache_file_obj="obj.txt";
$fp=fopen("$cache_file_obj","w");  
$data = serialize($linkOffer[1]);
fwrite($fp, "$data");  
fclose($fp);
echo "<br><br>";
echo $linkOffer[1][0];
echo "<br><br>";
echo $linkOffer[1][2];
//die;
 
    curl_close($ch);
    //break;
}
 
echo ", выводим данные карточки:<br><br>";
echo "<textarea name=\"textfield\" cols=\"120\" rows=\"10\">";
echo file_get_contents("dannie.txt");
echo "</textarea>";    
 
?>