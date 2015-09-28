<?php // Item Detail ------------------------------------------------------------------------------------------------ ?>

<?php if( isset($_GET['page']) ) if( $_GET['page'] == 'item-detail') : ?>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', initMap(
            <?= htmlspecialchars($lat)?>,
            <?= htmlspecialchars($lng)?>,
            <?= '"' . htmlspecialchars($type['type_img']) . '"'?>
        ));
    </script>
<?php endif; ?>

<?php // Contact Page ----------------------------------------------------------------------------------------------- ?>

<?php if( isset($_GET['page']) ) if( $_GET['page'] == 'contact') : ?>
    <script>
        _latitude = <?= $config['contact_latitude'] ?>;
        _longitude = <?= $config['contact_longitude'] ?>;
        google.maps.event.addDomListener(window, 'load', contactUsMap(_latitude,_longitude));
    </script>
<?php endif; ?>

<?php // Homepage --------------------------------------------------------------------------------------------------- ?>

<?php if( isset($_GET['map']) ) if( $_GET['map'] == 'google') : ?>
    <script>
        createBaseMap(<?= $config['map_latitude'] ?>, <?= $config['map_longitude'] ?>);
    </script>
<?php endif; ?>

<?php // Submit Page & Edit Item  Page ------------------------------------------------------------------------------ ?>

<?php if( isset($_GET['page']) ) if( $_GET['page'] == 'submit' || $_GET['page'] == 'edit-item')  : ?>
    <script>
        <?php if( $_GET['page'] == 'submit' ) : ?>
            var _latitude = <?= $config['map_latitude'] ?>;
            var _longitude = <?= $config['map_longitude'] ?>;
        <?php elseif( $_GET['page'] == 'edit-item' ) : ?>
        <?php
            $includePath = 'assets/inc/';
            include_once($includePath.'Db.php');
            include_once($includePath.'connect_db.php');
            $item = Db::queryOne('SELECT latitude, longitude FROM items_table WHERE item_id=?', $_GET['item']);
        ?>
            var _latitude = <?= $item['latitude'] ?>;
            var _longitude = <?= $item['longitude'] ?>;
        <?php endif ?>
        google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
        function initSubmitMap(_latitude,_longitude){
            var mapCenter = new google.maps.LatLng(_latitude,_longitude);
            var mapOptions = {
                zoom: 15,
                center: mapCenter,
                disableDefaultUI: false,
                //scrollwheel: false,
                styles: mapStyles
            };
            var mapElement = document.getElementById('submit-map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new MarkerWithLabel({
                position: mapCenter,
                map: map,
                icon: 'assets/img/marker.png',
                labelAnchor: new google.maps.Point(50, 0),
                draggable: true
            });
            $('#submit-map').removeClass('fade-map');

            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                marker.setPosition(center);
                $('#submit-map').removeClass('fade-map');
                $('#latitude').val( marker.position.lat() );
                $('#longitude').val( marker.position.lng() );
            }

            $('.geo-location').on("click", function() {
                if (navigator.geolocation) {
                    $('#submit-map').addClass('fade-map');
                    navigator.geolocation.getCurrentPosition(success);
                } else {
                    error('Geo Location is not supported');
                }
            });
            google.maps.event.addListener(marker, "mouseup", function (event) {
                var latitude = this.position.lat();
                var longitude = this.position.lng();
                $('#latitude').val( this.position.lat() );
                $('#longitude').val( this.position.lng() );
            });
        }
    </script>
<?php endif; ?>

<?php // Site Configuration ----------------------------------------------------------------------------------------- ?>

<?php if( isset($_GET['page']) ) if( $_GET['page'] == 'tools-site-configuration') : ?>
    <?php include_once($includePath.'views/configuration_maps.php'); ?>
<?php endif; ?>