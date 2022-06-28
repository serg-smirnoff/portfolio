// Clear spaces before and after search string
$('.class_name').keyup(function (e) {
    if (e.keyCode === 13) {
        $(this).val($.trim($(this).val()));
        $('.class_name').trigger("change");
    }
});

// Clear spaces before and after search string
$('.class_name').blur(function () {
    $(this).val($.trim($(this).val()));
});