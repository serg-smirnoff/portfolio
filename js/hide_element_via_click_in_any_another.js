// скрыть элемент при клике на любой кроме него
$(document).mouseup(function (e){
    var div = $(".header-global-search__block");
    console.log(e.target);
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        div.hide();
    }
});