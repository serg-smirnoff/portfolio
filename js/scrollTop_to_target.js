$(".class_name").click(function (){
    var id = $(this).data("id");
    var traget = $(".block_name").offset().top;
    $("html").animate({ scrollTop: target }, 500);
});