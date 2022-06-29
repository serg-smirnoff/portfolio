<?php
 /* Здесь проверяется существование переменных */
 if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
 if (isset($_POST['name'])) {$name = $_POST['name'];}
 if (isset($_POST['other'])) {$other = $_POST['other'];}

/* Сюда впишите свою эл. почту */
$address = "peter_19@mail.ru";

/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = "Тема: Заказ обратного звонка!\nИмя: $name\nТелефон: $phone\nДополнительно: $other";

/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub='Заказ с сайта muznachas-org'; //сабж
$email='info@muznachas.org'; // от кого
$headers = 'From: info@muznachas.org' . "\r\n" .'Reply-To: info@muznachas.org' . "\r\n" .'X-Mailer: PHP/' . phpversion();
$send = mail ($address,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");
header('Refresh: 3; URL=http://muznachas.org/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="http://muznachas.org/">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="description" content="Качественные и недорогие услуги по сантехнике, электрике и ремонту в Москве.">
  <meta name="generator" content="Joomla! - Open Source Content Management">
  <title>Главная</title>
  <link href="http://muznachas.org/?view=featured" rel="canonical">
  <link href="/?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0">
  <link href="/?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0">
  <link href="/templates/vt_marketing/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="/media/system/css/modal.css" type="text/css">
  <link rel="stylesheet" href="/components/com_k2/css/k2.css" type="text/css">
  <link rel="stylesheet" href="http://muznachas.org/plugins/system/shadowbox/shadowbox/examples/build/shadowbox.css" type="text/css">
  <link rel="stylesheet" href="/templates/vt_marketing/vtemtools/menus/css/style.css" type="text/css">
  <link rel="stylesheet" href="http://muznachas.org/modules/mod_vtem_imageshow/css/styles.css" type="text/css">
  <style type="text/css">
.floatleft{float:left;}.floatright{float:right;}.none{display:none !important; visibility:hidden !important;}.navleft,.navleft1{width:30% !important;}.navright,.navright1{width:30% !important;}.contentwidthr{width:70% !important;}.contentwidthl{width:70% !important;}.contentwidth{width:40% !important;}.vt_section{width:980px !important}body#vtem{font-family:PT Sans Narrow, Helvetica, sans-serif !important; font-size:17px !important;}h1,h2,h3,h4,#vtem_menu, .label_skitter, .nspArt h4, div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle{font-family:'PT Sans Narrow', sans-serif;}
.vt_width50{width:50% !important;}
.headermanual1{width:25% !important;}.headermanual2{width:75% !important;}.headermanual3{width:0% !important;}.headermanual4{width:0% !important;}.headermanual5{width:0% !important;}.headermanual6{width:0% !important;}.vt_width50{width:50% !important;}
.vt_width100{width:100% !important;}
.vt_width100{width:100% !important;}
.vt_width100{width:100% !important;}
.vt_width100{width:100% !important;}
.vt_width100{width:100% !important;}
#imageshowid100 .container_skitter img,#imageshowid100 .container_skitter .image,#imageshowid100 .container_skitter .image a{width:100%;height:100%;display: block;}
  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript" async=""></script><script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/system/js/mootools-more.js" type="text/javascript"></script>
  <script src="/media/system/js/modal.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery.min.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="/media/k2/assets/js/k2.noconflict.js" type="text/javascript"></script>
  <script src="/components/com_k2/js/k2.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="http://muznachas.org/plugins/system/shadowbox/shadowbox/min/index.php?g=sb&amp;ad=base&amp;lan=en&amp;play=img-swf-flv-qt-wmp-iframe-html" type="text/javascript"></script>
  <script src="/templates/vt_marketing/vtemtools/menus/vtem_menu.js" type="text/javascript"></script>
  <script type="text/javascript">

    window.addEvent('domready', function() {

      SqueezeBox.initialize({});
      SqueezeBox.assign($$('a.modal'), {
        parse: 'rel'
      });
    });
var K2SitePath = '/';
window.addEvent('load', function() {
        new JCaption('img.caption');
      });
  </script>
  <script type="text/javascript">Shadowbox.init({ autoDimensions: true });</script>

<link rel="stylesheet" href="/templates/system/css/system.css" type="text/css">
<link rel="stylesheet" href="/templates/system/css/general.css" type="text/css">
<link rel="stylesheet" href="/templates/vt_marketing/css/template.css" type="text/css">
<link rel="stylesheet" href="/templates/vt_marketing/css/styles/style1.css" type="text/css">
  <!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen">
<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen">
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen">
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <!-- Add jQuery library -->
<link rel="stylesheet" href="/templates/vt_marketing/css/responsive.css" type="text/css"><!--[if lte IE 6]>
<script src="/templates/vt_marketing/vtemtools/warning.js"></script>
<script>window.onload=function(){e("/templates/vt_marketing/vtemtools/ie6_warning/")}</script>
<![endif]-->
<script type="text/javascript">
      WebFontConfig = {
        google: { families: ["PT Sans Narrow:400,300:latin"] }
      };
      (function() {
        var wf = document.createElement("script");
        wf.src = ("https:" == document.location.protocol ? "https" : "http") +
            "://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js";
        wf.type = "text/javascript";
        wf.async = "true";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script><!--[if lt IE 9]>
    <script src="/media/jui/js/html5.js"></script>
<![endif]--><link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,300&amp;subset=latin">
<style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>
<body>
<div id="vt_drawer_head" class="vt_drawer_head clearfix">  
                                       <div class="vt_wrapper_drawer clearfix">
                      <div class="vt_section clearfix">
                         <div id="vt_drawer" class="vt_drawer clearfix">
                              <div class="vt_width50  floatleft"><div class="vt_module_inside">    <div class="vt_moduletable clearfix moduletable_callphone">
        <div class="vt_box clearfix">
          

<div class="custom_callphone">
  <ul class="call_phone" style="font-size: 20px;font-family: PT Sans Narrow, Helvetica, sans-serif !important;">
<li>ЕЖЕДНЕВНО С 9 ДО 22</li>
<li class="call"><a style="color:#fff !important;text-decoration: none;">+7 (495) 729-83-99<a></li>
<!-- <li class="phone">mail@marketing.com</li> -->
</ul></div>
         </div>   
    </div>
  </div></div><div class="vt_width50 separator_drawer floatleft"><div class="vt_module_inside">    <div class="vt_moduletable clearfix moduletable">
        <div class="vt_box clearfix">
          

<div class="custom">
  <script type="text/javascript">
$(".various").fancybox({
    helpers : {
        overlay : {
            locked : false // try changing to true and scrolling around the page
        }
    }
});
</script>
<div style="text-align: right;"><p><a class="various" href="#inline" style="color: #fff; font-size: 20px;border-style: solid;border-width: 2px;border-top-color: #fff;padding: 5px;font-family: PT Sans Narrow, Helvetica, sans-serif !important;">ЗАКАЗАТЬ ЗВОНОК</a></p></div>
<div class="highslide-html-content" id="inline" style="width: 280px;display:none;">
<script type="text/javascript">
$(document).ready(function(){

$("#clicker").click( function(){
$("#userfile").show("slow");
$("#clicker").hide("slow");
});
});

</script> 
<form action="mail.php" method="POST" style="text-align: center;">

<div class="td" style="border-radius: 4px 4px 0px 0px; background: #e21f26; color: #fff;"><strong style="font-size: 22px;">ОСТАВЬТЕ ЗАЯВКУ</strong><br>
</div>
<br>
<input type="text" name="name" placeholder="Ваше имя" style="background-color: #FFFFFF;background-image: none;border: 1px solid #CCCCCC;border-radius: 4px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;color: #555555;display: inline-block;font-size: 16px;width: 230px;height: 20px;line-height: normal;padding: 6px 12px;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;vertical-align: middle;text-align:center">
<br>
<input name="phone" type="text" placeholder="Ваш телефон или E-mail" style="background-color: #FFFFFF;background-image: none;border: 1px solid #CCCCCC;border-radius: 4px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;color: #555555;display: inline-block;font-size: 16px;width: 230px;height: 20px;line-height: normal;padding: 6px 12px;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;vertical-align: middle;text-align:center;margin-top: 25px;">
<br>
<textarea  name="other" cols="40" rows="3"  placeholder="Краткое описание Вашей проблемы" style="background-color: #FFFFFF;background-image: none;border: 1px solid #CCCCCC;border-radius: 4px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;color: #555555;display: inline-block;font-size: 16px;width: 230px;line-height: normal;padding: 6px 12px;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;vertical-align: middle;text-align:center;margin-top: 25px;font-family: arial;"></textarea>
<br>
<div class="td"><p style="font-size: 18px;margin-top: 20px;">Ваши данные в безопасности, и не будут переданы третьим лицам</p></div>
<div class="form-validate" align="center"><button type="submit" class="button validate">Заказать звонок</button></div>
</form>
 </div></div>
         </div>   
    </div>
  </div></div>                         </div>
                       </div>  
                      </div>
                    
                 
                    <div class="vt_wrapper_header clearfix">
                    <div class="vt_section clearfix">      
                         <div id="vt_header" class="vt_header clearfix">
                              <div class="headermanual1  floatleft"><div class="vt_module_inside"><a id="vt_logo" href="http://muznachas.org/"><img src="/templates/vt_marketing/css/styles/vt_logo_style1.png" alt="VTEM Logo"></a></div></div><div class="headermanual2 separator_header floatleft"><div class="vt_module_inside defaultmenu"><div id="vt_main_menu" class="vt_menufix clearfix"><div id="vtem_menu" class="mlmenujs menu_vtem_nav plus blindv"><ul class="mlmenujs menu_vtem_nav plus blindv">
<li id="item-482" class="current active pixelfix"><a href="/" class="first  "> <span> Главная</span></a></li><li id="item-543" class="parent haschild hide"><a href="javascript:void(0);" class=""><span>Услуги</span><span class="vtem_menu_plus">+</span></a><ul class="blindv" style="z-index: 100; display: none; height: auto;"><li id="item-547"><a href="/услуги/сантехника.html" class="first"> <span> Сантехника</span></a></li><li id="item-548"><a href="/услуги/электрика.html" class=""> <span> Электрика</span></a></li><li id="item-549"><a href="/услуги/ремонт-под-ключ.html" class=""> <span> Ремонт под ключ</span></a></li><li id="item-550"><a href="/услуги/кухня-под-ключ.html" class=""> <span> Кухня под ключ</span></a></li><li id="item-551"><a href="/услуги/сборка-мебели.html" class=""> <span> Сборка мебели</span></a></li><li class="vtem_ul_arrow last"> &nbsp; </li></ul></li><li id="item-544" class="parent haschild"><a href="javascript:void(0);"><span>Расценки</span><span class="vtem_menu_plus">+</span></a><ul class="blindv" style="z-index: 100; display: none;"><li id="item-564"><a href="/расценки/сантехника.html" class="first"> <span> Сантехника</span></a></li><li id="item-565"><a href="/расценки/электрика.html"> <span> Электрика</span></a></li><li id="item-566"><a href="/расценки/все-расценки.html"> <span> Все расценки</span></a></li><li class="vtem_ul_arrow last"> &nbsp; </li></ul></li><li id="item-552" class="parent haschild"><a href="javascript:void(0);"><span>Советы по ремонту</span><span class="vtem_menu_plus">+</span></a><ul class="blindv" style="z-index: 100; display: none;"><li id="item-557"><a href="/советы-по-ремонту/как-повесить-люстру.html" class="first"> <span> Как повесить люстру</span></a></li><li id="item-558"><a href="/советы-по-ремонту/вешаем-карниз.html"> <span> Вешаем карниз</span></a></li><li id="item-555"><a href="/советы-по-ремонту/установка-унитаза.html"> <span> Установка унитаза</span></a></li><li id="item-559"><a href="/советы-по-ремонту/ремонт-в-квартире.html"> <span> Ремонт в квартире</span></a></li><li id="item-556"><a href="/советы-по-ремонту/выравнивание-пола.html"> <span> Выравнивание пола</span></a></li><li id="item-560"><a href="/советы-по-ремонту/установка-пластиковых-окон.html"> <span> Установка пластиковых окон</span></a></li><li class="vtem_ul_arrow last"> &nbsp; </li></ul></li><li id="item-553" class="parent haschild"><a href="javascript:void(0);"><span>О компании</span><span class="vtem_menu_plus">+</span></a><ul class="blindv" style="z-index: 100; display: none;"><li id="item-545"><a href="/о-компании/о-нас.html" class="first"> <span> О нас</span></a></li><li id="item-562"><a href="/о-компании/наши-профессионалы.html"> <span> Наши профессионалы</span></a></li><li id="item-546"><a href="/о-компании/вакансии.html"> <span> Вакансии</span></a></li><li id="item-563"><a href="/о-компании/контакты.html"> <span> Контакты</span></a></li><li class="vtem_ul_arrow last"> &nbsp; </li></ul></li><li id="item-561" class=" last"><a href="http://www.xn--80aackwvjedrz4c.net/" target="_blank" class=""><span>"Жена на час"</span></a></li></ul></div><a href="#vtem_menu_mobile" class="vtemdrildown vtemdrillround" id="vtflatmenu">Mobile menu</a><div id="vtem_menu_mobile" class="hidden vt_drilldown_menu" style="display:none;"><ul class="menu-mobi">
<li id="item-482" class="current active"><a href="/"> <span> Главная</span></a></li><li id="item-543" class="parent"><a href="javascript:void(0);"><span>Услуги</span></a><ul><li id="item-547"><a href="/услуги/сантехника.html"> <span> Сантехника</span></a></li><li id="item-548"><a href="/услуги/электрика.html"> <span> Электрика</span></a></li><li id="item-549"><a href="/услуги/ремонт-под-ключ.html"> <span> Ремонт под ключ</span></a></li><li id="item-550"><a href="/услуги/кухня-под-ключ.html"> <span> Кухня под ключ</span></a></li><li id="item-551"><a href="/услуги/сборка-мебели.html"> <span> Сборка мебели</span></a></li></ul></li><li id="item-544" class="parent"><a href="javascript:void(0);"><span>Расценки</span></a><ul><li id="item-564"><a href="/расценки/сантехника.html"> <span> Сантехника</span></a></li><li id="item-565"><a href="/расценки/электрика.html"> <span> Электрика</span></a></li><li id="item-566"><a href="/расценки/все-расценки.html"> <span> Все расценки</span></a></li></ul></li><li id="item-552" class="parent"><a href="javascript:void(0);"><span>Советы по ремонту</span></a><ul><li id="item-557"><a href="/советы-по-ремонту/как-повесить-люстру.html"> <span> Как повесить люстру</span></a></li><li id="item-558"><a href="/советы-по-ремонту/вешаем-карниз.html"> <span> Вешаем карниз</span></a></li><li id="item-555"><a href="/советы-по-ремонту/установка-унитаза.html"> <span> Установка унитаза</span></a></li><li id="item-559"><a href="/советы-по-ремонту/ремонт-в-квартире.html"> <span> Ремонт в квартире</span></a></li><li id="item-556"><a href="/советы-по-ремонту/выравнивание-пола.html"> <span> Выравнивание пола</span></a></li><li id="item-560"><a href="/советы-по-ремонту/установка-пластиковых-окон.html"> <span> Установка пластиковых окон</span></a></li></ul></li><li id="item-553" class="parent"><a href="javascript:void(0);"><span>О компании</span></a><ul><li id="item-545"><a href="/о-компании/о-нас.html"> <span> О нас</span></a></li><li id="item-562"><a href="/о-компании/наши-профессионалы.html"> <span> Наши профессионалы</span></a></li><li id="item-546"><a href="/о-компании/вакансии.html"> <span> Вакансии</span></a></li><li id="item-563"><a href="/о-компании/контакты.html"> <span> Контакты</span></a></li></ul></li><li id="item-561"><a href="http://www.xn--80aackwvjedrz4c.net/" target="_blank"><span>"Жена на час"</span></a></li></ul></div></div></div></div>                         </div>
                     </div>
                  </div>
<div class="vt_moduletable" style="text-align: center;padding-top: 50px;"><h3><span class="vt_heading1"><span class="vt_heading2" style="font-size: 45px;">Спасибо за заявку!<br>Сейчас вы будете перемещены на главную страницу </span></span></h3>
</div>
</body>
</html>
