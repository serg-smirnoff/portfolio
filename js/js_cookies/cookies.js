// Функция установки значения cookie.
// name      - имя cookie
// value     - значение cookie
// [path]    - путь, для которого cookie действительно (по умолчанию - /)
// [expires] - дата окончания действия cookie (по умолчанию - до конца сессии)
// [domain]  - домен, для которого cookie действительно (по умолчанию - домен,
//             в котором значение было установлено)
// [secure]  - логическое значение, показывающее требуется ли защищенная
//             передача значения cookie
function setCookie(name, value, path, expires, domain, secure) {
  var curCookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires.toGMTString() : "") +
    ((path) ? "; path=" + path : "; path=/") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
  document.cookie = curCookie;
}

// Функция чтения значения cookie.
// name - имя считываемого cookie
function getCookie(name) {
  var prefix = name + "=";
  var cookieStartIndex = document.cookie.indexOf(prefix);
  if(cookieStartIndex == -1) return null;
  var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length);
  if(cookieEndIndex == -1) cookieEndIndex = document.cookie.length;
  return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex));
}

// Функция удаления значения cookie
// name - имя cookie
// [path] - путь, для которого cookie действительно
// [domain] - домен, для которого cookie действительно
function delCookie(name, path, domain) {
  if(getCookie(name)) {
    document.cookie = name + "=" +
    ((path) ? "; path=" + path : "; path=/") +
    ((domain) ? "; domain=" + domain : "") +
    "; expires=Thu, 01-Jan-70 00:00:01 GMT";
  }
}

// Устанавливает Cookie сложной структуры.
function setCookieEx(name, value, path, expires, domain, secure)
{ value=Serialize(value);
//  alert(value);
  return setCookie(name, value, path, expires, domain, secure);
}

// Читает Cookie сложной структуры.
function getCookieEx(name)
{ var v=getCookie(name);
  return Unserialize(v);
}