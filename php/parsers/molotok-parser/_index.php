<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// include ("lib/phpQuery/phpQuery/phpQuery.php");
// include ("lib/nokogiri.php");

include_once ("urls.inc.php");
      
// function getPageContent($url, $agent = false)
// {
//    $contentPage = '';
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $contentPage = curl_exec($ch);
//    curl_close($ch);
//    return trim($contentPage);
// }

function parse ($path, $url){

// $path = "images/europe/ukraine";    
// $url = "http://molotok.ru/evropa-ukraina-124465";

@header ("Content-Type: text/html; charset=UTF-8");
$html = file_get_contents($url);

// total pages

$start_str = '<li class="suffix">';
$stop_str = '<li class="next">';
$rule = "!".$start_str."(.*?)".$stop_str."!si";	
preg_match($rule,$html,$pages);

if (!empty($pages[0])){
    $start_str = '<span>';
    $stop_str = '</span>';
    $rule = "!".$start_str."(.*?)".$stop_str."!si";	
    preg_match_all($rule,$pages[0],$totalpages);

    $totalpages = $totalpages[1][1];

} else {    
    $totalpages = 1;
}

for ($i = 1; $i <= $totalpages; $i++){

    if ($i != 1){
        @header ("Content-Type: text/html; charset=UTF-8");
        $html = file_get_contents($url."?p=".$i);
    }
    
    $start_str = '<div class="photo"';
    $stop_str = '</div>';

    $rule = "!".$start_str."(.*?)".$stop_str."!si";	
    preg_match_all($rule,$html,$content);

    //print_r ($content[1]);
    
    foreach ($content[1] as $key => $img){
    
        $start_str = 'data-img=';
        $stop_str = ',';

        $rule = "!".$start_str."(.*?)".$stop_str."!si";	
        preg_match($rule,$img,$el);
    
    // img url
        
        $img_url = $el[1];

        $img_url = str_replace ("64x48","oryginal",$img_url);
        $img_url = str_replace ("\"","",$img_url);
        $img_url = str_replace ("'","",$img_url);
        $img_url = str_replace ("[","",$img_url);
        $img_url = str_replace ("[","",$img_url);

    // img name
        
        $start_str = '<a href="';
        $stop_str = '.html"><span';
        
        $rule = "!".$start_str."(.*?)".$stop_str."!si";	
        preg_match($rule,$img,$el);

        $title = $el[1];
        
        // copy image to folder  
        if(!is_dir($path)) mkdir($path) ; 
        copy($img_url,$path.$title.".jpg");
    }
}
echo "ok ";
}

foreach ($urls as $key => $value){
    $url = $value['url'];
    $path = $value['path'];
    parse($path,$url);
}

?>