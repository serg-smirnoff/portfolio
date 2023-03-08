function getClientWidth(){
    return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientWidth:document.body.clientWidth;
}
function getClientHeight(){
    return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
}

getClientWidth() + ' ' + getClientHeight();