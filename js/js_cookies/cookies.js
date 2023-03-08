// ������� ��������� �������� cookie.
// name      - ��� cookie
// value     - �������� cookie
// [path]    - ����, ��� �������� cookie ������������� (�� ��������� - /)
// [expires] - ���� ��������� �������� cookie (�� ��������� - �� ����� ������)
// [domain]  - �����, ��� �������� cookie ������������� (�� ��������� - �����,
//             � ������� �������� ���� �����������)
// [secure]  - ���������� ��������, ������������ ��������� �� ����������
//             �������� �������� cookie
function setCookie(name, value, path, expires, domain, secure) {
  var curCookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires.toGMTString() : "") +
    ((path) ? "; path=" + path : "; path=/") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
  document.cookie = curCookie;
}

// ������� ������ �������� cookie.
// name - ��� ������������ cookie
function getCookie(name) {
  var prefix = name + "=";
  var cookieStartIndex = document.cookie.indexOf(prefix);
  if(cookieStartIndex == -1) return null;
  var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length);
  if(cookieEndIndex == -1) cookieEndIndex = document.cookie.length;
  return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex));
}

// ������� �������� �������� cookie
// name - ��� cookie
// [path] - ����, ��� �������� cookie �������������
// [domain] - �����, ��� �������� cookie �������������
function delCookie(name, path, domain) {
  if(getCookie(name)) {
    document.cookie = name + "=" +
    ((path) ? "; path=" + path : "; path=/") +
    ((domain) ? "; domain=" + domain : "") +
    "; expires=Thu, 01-Jan-70 00:00:01 GMT";
  }
}

// ������������� Cookie ������� ���������.
function setCookieEx(name, value, path, expires, domain, secure)
{ value=Serialize(value);
//  alert(value);
  return setCookie(name, value, path, expires, domain, secure);
}

// ������ Cookie ������� ���������.
function getCookieEx(name)
{ var v=getCookie(name);
  return Unserialize(v);
}