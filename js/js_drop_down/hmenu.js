var d = document;
var is_ie = (/msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent));
var hmVertShift = 0;
function GEByID(id) { return (is_ie) ? document.all[id] : document.getElementById(id); }
function hmDivOn(id) { id.style.visibility = 'visible'; }
function hmDivOff(id) { id.style.visibility = 'hidden'; }
function hmx(e) { return e.offsetLeft+(e.offsetParent!=null&&e.tagName!='BODY'?hmx(e.offsetParent):0); }
function hmy(e) { return e.offsetTop+(e.offsetParent!=null&&e.tagName!='BODY'?hmy(e.offsetParent):0); }
function hmOff(id,parent) { e = GEByID(id); e.style.visibility = 'hidden'; }
function hmOn(id,parent) { e = GEByID(id); e.style.left = hmx(parent); e.style.top = hmy(parent)+hmVertShift; e.style.visibility = 'visible'; }