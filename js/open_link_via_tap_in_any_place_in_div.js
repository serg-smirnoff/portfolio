// open link from data="item-data" url via tap in any place in div
$('body').delegate('.class_name', 'click', function () {
    var link_name = $(this).data("item-data");
    var event = event || window.event;
    var t = event.target || event.srcElement;
    if (
        // exclude this classes
        $(t).hasClass('class_name_1') ||
        $(t).hasClass('class_name_2') ||
        $(t).hasClass('class_name_3') ||
    ){
        return true;
    }
    if (event.ctrlKey)
        window.open(link_name);
    else
        document.location.href=link_name;
});