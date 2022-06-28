// lazy_load blocks with setTimeout function
$(window).scroll(function() {
    if ($("#some_id")){
        if($(window).scrollTop() + $(window).height() > $("#some_block").offset().top + 50) {
            setTimeout(function(){
                $("#some_block").trigger("click");
            }, 1500);
        if($(window).scrollTop() + $(window).height() >= $("#some_block").offset().top) {
            $("#some_block").trigger("click");
        }
    }
});