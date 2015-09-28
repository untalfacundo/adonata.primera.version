<?php
if(!$config['contact_latitude']){
    $config['contact_latitude'] = 48.87;
}
if(!$config['contact_longitude']){
    $config['contact_longitude'] = 2.29;
}
?>
<script>
    // Configuration for contact map -----------------------------------------------------------------------------------
    var contact_latitude = <?= $config['contact_latitude'] ?>;
    var contact_longitude = <?= $config['contact_longitude'] ?>;
    google.maps.event.addDomListener(window, 'load', initConfigContactMap(contact_latitude,contact_longitude));
    function initConfigContactMap(contact_latitude,contact_longitude){
        var mapCenter = new google.maps.LatLng(contact_latitude,contact_longitude);
        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('config-map-contact');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: 'assets/img/marker.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#config-map-contact').removeClass('fade-map');

        function success(position) {
            var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.panTo(center);
            marker.setPosition(center);
            $('#config-map-contact').removeClass('fade-map');
        }

        $('#geo-location-contact').on("click", function() {
            if (navigator.geolocation) {
                $('#config-map-contact').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#contact_latitude').val( this.position.lat() );
            $('#contact_longitude').val( this.position.lng() );
        });
    }

    // Configuration for homepage map ----------------------------------------------------------------------------------
    var map_latitude = <?= $config['map_latitude'] ?>;
    var map_longitude= <?= $config['map_longitude'] ?>;
    google.maps.event.addDomListener(window, 'load', initConfigHomepageMap(map_latitude,map_longitude));
    function initConfigHomepageMap(map_latitude,map_longitude){
        var mapCenter = new google.maps.LatLng(map_latitude,map_longitude);
        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('config-map-homepage');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: 'assets/img/marker.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#config-map-homepage').removeClass('fade-map');

        function success(position) {
            var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.panTo(center);
            marker.setPosition(center);
            $('#config-map-homepage').removeClass('fade-map');
        }

        $('#geo-location-homepage').on("click", function() {
            if (navigator.geolocation) {
                $('#config-map-homepage').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#map_latitude').val( this.position.lat() );
            $('#map_longitude').val( this.position.lng() );
        });
    }

</script>