$("#id").change(function () {

    var url = window.location.href;
    var url_split = window.location.href.split('?')[0];
    var param = window.location.search.replace('?','').split('&')[0].split('=')[1];

    var delimiter = "?";

    if ($("#form").val()) {
        if ($("#form-from").datepicker('getDate') < $(this).datepicker('getDate')) {
            if (param) { 
                window.location = url_split  + delimiter + "mode=" + param + "&date-from=" + $("#form-from").val() + "&date-to=" + $(this).val();
            } else {
                window.location = url_split  + delimiter + "date-from=" + $("#form-from").val() + "&date-to=" + $(this).val();
            }
        } else {
            if (param) { 
                window.location = url_split  + delimiter + "mode=" + param + "date-from=" + $(this).val() + "&date-to=" + $("#form-from").val();
            } else {
                window.location = url_split  + delimiter + "date-from=" + $(this).val() + "&date-to=" + $("#form-from").val();
            }
        }
    }

});