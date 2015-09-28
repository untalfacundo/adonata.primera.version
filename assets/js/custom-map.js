var mapStyles = [{featureType:'water',elementType:'all',stylers:[{hue:'#d7ebef'},{saturation:-5},{lightness:54},{visibility:'on'}]},{featureType:'landscape',elementType:'all',stylers:[{hue:'#eceae6'},{saturation:-49},{lightness:22},{visibility:'on'}]},{featureType:'poi.park',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'poi.medical',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-80},{lightness:-2},{visibility:'on'}]},{featureType:'poi.school',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-91},{lightness:-7},{visibility:'on'}]},{featureType:'landscape.natural',elementType:'all',stylers:[{hue:'#c8c6c3'},{saturation:-71},{lightness:-18},{visibility:'on'}]},{featureType:'road.highway',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:60},{visibility:'on'}]},{featureType:'poi',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-81},{lightness:34},{visibility:'on'}]},{featureType:'road.arterial',elementType:'all',stylers:[{hue:'#dddbd7'},{saturation:-92},{lightness:37},{visibility:'on'}]},{featureType:'transit',elementType:'geometry',stylers:[{hue:'#c8c6c3'},{saturation:4},{lightness:10},{visibility:'on'}]}];

$.ajaxSetup({
    cache: true
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createBaseMap(latitude,longitude){
    setMapHeight();
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        scrollwheel: false,
        center: new google.maps.LatLng(latitude,longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: mapStyles
    });
}

function createHomepageGoogleMap(data){
//    setMapHeight();
    if( document.getElementById('map') != null ){
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng(data['map_latitude'], data['map_longitude']),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: mapStyles
        });
        var i;
        var newMarkers = [];
        for (i = 0; i < data['item_data'].length; i++) {
            var pictureLabel = document.createElement("img");
            if( data['item_data'][i]['item_type'] ) {
                pictureLabel.src = data['type'][  ( data['item_data'][i]['item_type'] ) - 1  ] ['type_img'];
            }
            var boxText = document.createElement("div");
            infoboxOptions = {
                content: boxText,
                disableAutoPan: false,
                //maxWidth: 150,
                title: data['item_data'][i]['title'],
                pixelOffset: new google.maps.Size(-100, 0),
                zIndex: null,
                alignBottom: true,
                boxClass: "infobox-wrapper",
                enableEventPropagation: true,
                closeBoxMargin: "0px 0px -8px 0px",
                closeBoxURL: "assets/img/close-btn.png",
                infoBoxClearance: new google.maps.Size(1, 1)
            };
            var marker = new MarkerWithLabel({
                position: new google.maps.LatLng(data['item_data'][i]['latitude'], data['item_data'][i]['longitude']),
                map: map,
                icon: 'assets/img/marker.png',
                labelContent: pictureLabel,
                labelAnchor: new google.maps.Point(50, 0),
                labelClass: "marker-style"
            });

            newMarkers.push(marker);
            var city = '';
            if( data['item_data'][i]['city'] ){
                city = data['city'][  data['item_data'][i]['city'] -1  ]['city_title'];
            }

            if( data['locale'] == 'US' ) {
                boxText.innerHTML =
                '<div class="infobox-inner">' +
                    '<a href="?page=item-detail&item=' + data['item_data'][i]['item_id'] + '">' +
                    '<div class="infobox-image" style="position: relative">' +
                        '<img src="' + data['item_data'][i]['image'] + '">' + '<div><span class="infobox-price">' + data['currency'] + ' ' + data['item_data'][i]['price'] + ' ' + '</span></div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="infobox-description">' +
                        '<div class="infobox-title"><a href="?page=item-detail&item=' + data['item_data'][i]['item_id'] + '">' + data['item_data'][i]['title'] + '</a></div>' +
                        '<div class="infobox-location">' + city + '</div>' +
                    '</div>' +
                '</div>';
            } else if ( data['locale'] == 'EU' ) {
                boxText.innerHTML =
                '<div class="infobox-inner">' +
                    '<a href="?page=item-detail&item=' + data['item_data'][i]['item_id'] + '">' +
                    '<div class="infobox-image" style="position: relative">' +
                        '<img src="' + data['item_data'][i]['image'] + '">' + '<div><span class="infobox-price">' + data['item_data'][i]['price'] + ' ' + data['currency'] + '</span></div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="infobox-description">' +
                        '<div class="infobox-title"><a href="?page=item-detail&item=' + data['item_data'][i]['item_id'] + '">' + data['item_data'][i]['title'] + '</a></div>' +
                        '<div class="infobox-location">' + city + '</div>' +
                    '</div>' +
                '</div>';
            }

            //Define the infobox
            newMarkers[i].infobox = new InfoBox(infoboxOptions);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    for (h = 0; h < newMarkers.length; h++) {
                        newMarkers[h].infobox.close();
                    }
                    newMarkers[i].infobox.open(map, this);
                }
            })(marker, i));
        }

        var clusterStyles = [
            {
                url: 'assets/img/cluster.png',
                height: 37,
                width: 37
            }
        ];

        var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
        $('body').addClass('loaded');
        setTimeout(function() {
            $('body').removeClass('has-fullscreen-map');
        }, 1000);
        $('#map').removeClass('fade-map');

        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });


        function fadeMarker(i){
//            if( hiddenI.length > 0 ){
//                //alert(hiddenI);
//            }
            var a = 0;
//            if(hiddenI.length > 0){
//                alert(hiddenI);
//                var interval = setInterval(function update() {
//                    a = a + .05;
//                    newMarkers[hiddenI].set("opacity",a);
//                    if( a > 1 ){
//                        clearInterval(interval);
//                    }
//                }, 500);
//            }

        }



//  Dynamically show/hide markers --------------------------------------------------------------

        google.maps.event.addListener(map, 'idle', function() {
            for (var i=0; i < data['item_data'].length; i++) {
                if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                    //newMarkers[i].setMap(map);
                    newMarkers[i].setVisible(true);
                    //markerCluster.setMap(map);
                } else {
                    //newMarkers[i].setMap(null);
                    newMarkers[i].setVisible(false);
                    //markerCluster.setMap(null);
                }
            }
        });

        // Function which set marker to the user position
        function success(position) {
            var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.panTo(center);
            $('#map').removeClass('fade-map');
        }
    }
}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Property Detail
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function initMap(latitude,longitude,itemIcon) {
    //$.getScript("assets/js/locations.js", function(){
        var subtractPosition = 0;
        var mapWrapper = $('#property-detail-map.float');

        if (document.documentElement.clientWidth > 1200) {
            subtractPosition = 0.013;
        }
        if (document.documentElement.clientWidth < 1199) {
            subtractPosition = 0.006;
        }
        if (document.documentElement.clientWidth < 979) {
            subtractPosition = 0.001;
        }
        if (document.documentElement.clientWidth < 767) {
            subtractPosition = 0;
        }

        var mapCenter = new google.maps.LatLng(latitude,longitude);

        if ( $("#property-detail-map").hasClass("float") ) {
            mapCenter = new google.maps.LatLng(latitude,longitude - subtractPosition);
            mapWrapper.css('width', mapWrapper.width() + mapWrapper.offset().left )
        }

        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            scrollwheel: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('property-detail-map');
        var map = new google.maps.Map(mapElement, mapOptions);

        var pictureLabel = document.createElement("img");
        pictureLabel.src = itemIcon;
        var markerPosition = new google.maps.LatLng(latitude,longitude);
        var marker = new MarkerWithLabel({
            position: markerPosition,
            map: map,
            icon: 'assets/img/marker.png',
            labelContent: pictureLabel,
            labelAnchor: new google.maps.Point(50, 0),
            labelClass: "marker-style"
        });
    //});
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Contact
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function contactUsMap(){
    var mapCenter = new google.maps.LatLng(_latitude,_longitude);
    var mapOptions = {
        zoom: 15,
        center: mapCenter,
        disableDefaultUI: false,
        scrollwheel: false,
        styles: mapStyles
    };
    var mapElement = document.getElementById('contact-map');
    var map = new google.maps.Map(mapElement, mapOptions);

    var marker = new MarkerWithLabel({
        position: mapCenter,
        map: map,
        icon: 'assets/img/marker.png',
        //labelContent: pictureLabel,
        labelAnchor: new google.maps.Point(50, 0),
        labelClass: "marker-style"
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// OpenStreetMap - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createHomepageOSM(_latitude,_longitude){
    setMapHeight();
    if( document.getElementById('map') != null ){
        $.getScript("assets/js/locations.js", function(){
            var map = L.map('map', {
                center: [_latitude,_longitude],
                zoom: 14,
                scrollWheelZoom: false
            });
            L.tileLayer('http://openmapsurfer.uni-hd.de/tiles/roadsg/x={x}&y={y}&z={z}', {
                //L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                //subdomains: '0123',
                attribution: 'Imagery from <a href="http://giscience.uni-hd.de/">GIScience Research Group @ University of Heidelberg</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
            }).addTo(map);
            var markers = L.markerClusterGroup({
                showCoverageOnHover: false
            });
            for (var i = 0; i < locations.length; i++) {
                var _icon = L.divIcon({
                    html: '<img src="' + locations[i][7] +'">',
                    iconSize:     [40, 48],
                    iconAnchor:   [20, 48],
                    popupAnchor:  [0, -48]
                });
                var title = locations[i][0];
                var marker = L.marker(new L.LatLng(locations[i][3],locations[i][4]), {
                    title: title,
                    icon: _icon
                });
                marker.bindPopup(
                    '<div class="property">' +
                        '<a href="' + locations[i][5] + '">' +
                            '<div class="property-image">' +
                                '<img src="' + locations[i][6] + '">' +
                            '</div>' +
                            '<div class="overlay">' +
                                '<div class="info">' +
                                    '<div class="tag price"> ' + locations[i][2] + '</div>' +
                                    '<h3>' + locations[i][0] + '</h3>' +
                                    '<figure>' + locations[i][1] + '</figure>' +
                                '</div>' +
                            '</div>' +
                        '</a>' +
                    '</div>'
                );
                markers.addLayer(marker);
            }

            map.addLayer(markers);
            map.on('locationfound', onLocationFound);

            function locateUser() {
                $('#map').addClass('fade-map');
                map.locate({setView : true})
            }

            function onLocationFound(){
                $('#map').removeClass('fade-map');
            }

            $('.geo-location').on("click", function() {
                locateUser();
            });

            $('body').addClass('loaded');
            setTimeout(function() {
                $('body').removeClass('has-fullscreen-map');
            }, 1000);
            $('#map').removeClass('fade-map');
        });

    }
}
