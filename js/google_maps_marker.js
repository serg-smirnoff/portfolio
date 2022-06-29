$(document).ready(function(city_name, city_lat, city_lng){
    
    var myLatlng = new google.maps.LatLng(city_lat, city_lng);

    var myOptions = {
        zoom: 8,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById("map"), myOptions); 

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Заголовок',
        title: 'Вы здесь: ' + city_name
    });		

    var map = new google.maps.Map(document.getElementById("map"), myOptions); 
    var contentString = '<div id="content">' + city_name + '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });

});