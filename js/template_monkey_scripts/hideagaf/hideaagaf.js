// ==UserScript==
// @name Hide Агафангел 
// @namespace Violentmonkey Scripts
// @description Скрываем Агафангела
// @grant none
// @author Sergey Smirnov
// @license MIT
// @version 1.0
// @include https://www.schekino.net/forum/*
// @match https://www.schekino.ru/forum/*
// @require  https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js
// ==/UserScript==
(function (window, undefined) {
    
  var w;

  if (typeof unsafeWindow != undefined) {
      w = unsafeWindow
  } else {
      w = window;
  }

  if (w.self != w.top) {
      return;
  }

  jQuery(document).ready(function() {
      jQuery("#chat .chat-postbody").each(function() {
          var nickname = jQuery(this).find(".chat-usernames a.username").text();
          if (nickname == 'Агафангел'){
            jQuery(this).css('display', 'none');
          }
      }); 
  });
  
  if (/http:\/\/userscripts.org/.test(w.location.href)) {
    alert('1');
  }
  
})(window);