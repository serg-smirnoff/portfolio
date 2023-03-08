(function(){
    function addFont() {
        var style = document.createElement('style');
        style.rel = 'stylesheet';
        document.head.appendChild(style);
        style.textContent = localStorage.fonts;
    }
    try {
        if (localStorage.fonts) {
            addFont();
        } else {
            var request = new XMLHttpRequest();
            request.open('GET', '/wp-content/themes/iconic-one/css/fonts.css', true);
            request.onload = function() {
                if (request.status >= 200 && request.status < 400) {
                localStorage.fonts = request.responseText;
                    addFont();
                }
            }
            request.send();
        }
    } catch(ex) {
        // maybe load the font synchronously for woff-capable browsers
        // to avoid blinking on every request when localStorage is not available
    }
}());
