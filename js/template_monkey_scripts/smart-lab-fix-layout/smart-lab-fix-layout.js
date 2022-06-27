// ==UserScript==
// @name        smart-lab.ru в виде ленты новостей
// @namespace   Violentmonkey Scripts
// @require     https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js
// @match       https://smart-lab.ru/*
// @grant       none
// @version     1.0
// @author      -
// @description 05.05.2020, 00:24:10
// ==/UserScript==

$(document).ready(function(){
    $('table.trades').before('<div class="hide_info">Скрыть индикаторы</div>');
    $('.hide_info').css({'background':'#F59300','cursor':'pointer','color':'#fff','height':'30px','line-height':'30px','width':'200px','text-align':'center','margin':'10px auto','border-radius':'5px'});
    $('.hide_info').click(function(){
        if ($('.hide_info').text() == 'Скрыть индикаторы')
            $('.hide_info').text('Показать индикаторы');
        else 
            $('.hide_info').text('Скрыть индикаторы');

        $('table.trades').toggle('slow');
    });
    $('.sidebar_left, .sidebar_right, #inindex, .content_desc, #mood, .console').hide();
    $('#content').css("width","100%");
    $('#content_box').css({"width":"70%", "margin-left": "auto", "margin-right": "auto", "float": "unset"});
    $('#header .h1 a').css({"font-size": "29px", "line-height": "32px"});
    $('.topic .content img').css("width","98%");
    $('.topic .voting').css('display','none');
})