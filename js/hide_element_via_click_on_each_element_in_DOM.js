// hide block via click in each element in DOM exclude itself
$(document).mouseup(function (e){
    var div = $(".element");
    var div_button = $(".element_button");
    if (!div.is(e.target) && div.has(e.target).length === 0 && !div_button.is(e.target) && div_button.has(e.target).length === 0)
        div.parent().find('.element').removeClass('show');
});
