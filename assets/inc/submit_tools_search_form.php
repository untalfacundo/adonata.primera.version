<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');

if( isset($_POST['show_status']) ) {
    Db::query('UPDATE configuration_table SET show_status=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_status=?', 0);
}

if( isset($_POST['show_city']) ) {
    Db::query('UPDATE configuration_table SET show_city=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_city=?', 0);
}

if( isset($_POST['show_bedrooms']) ) {
    Db::query('UPDATE configuration_table SET show_bedrooms=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_bedrooms=?', 0);
}

if( isset($_POST['show_bathrooms']) ) {
    Db::query('UPDATE configuration_table SET show_bathrooms=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_bathrooms=?', 0);
}

if( isset($_POST['show_type']) ) {
    Db::query('UPDATE configuration_table SET show_type=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_type=?', 0);
}

if( isset($_POST['show_price_slider']) ) {
    Db::query('UPDATE configuration_table SET show_price_slider=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_price_slider=?', 0);
}

if( isset($_POST['show_rooms']) ) {
    Db::query('UPDATE configuration_table SET show_rooms=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_rooms=?', 0);
}
if( isset($_POST['show_state']) ) {
    Db::query('UPDATE configuration_table SET show_state=?', 1);
}
else {
    Db::query('UPDATE configuration_table SET show_state=?', 0);
}

$searchStates = Db::queryAll('SELECT * FROM search_states_table');

$tempCountryVar = -1;
$tempCityVar = -1;
$tempDistrictVar = -1;
for ( $s=0; $s<count( $_POST['state_title'] ); $s++ ){
//    echo '<br><br>';
//    echo $searchStates[$s]['state_title'] . ' ';
//    echo '<br>';

    Db::query( 'UPDATE search_states_table SET state_title=? WHERE state_id=?', $_POST['state_title'][$s], $searchStates[$s]['state_id'] );
    $searchCountries = Db::queryAll('SELECT * FROM search_countries_table WHERE parent=?', $searchStates[$s]['state_id'] );


    for( $c=0; $c<count($searchCountries); $c++ ){
        $tempCountryVar++;
//        echo '<br>';
//        echo '- ' . $searchCountries[$c]['country_title'] . ' ' . $searchCountries[$c]['country_id'] . ' / '. $_POST['country_title'][$tempCountryVar];
//        echo '<br>';

        Db::query( 'UPDATE search_countries_table SET country_title=? WHERE country_id=?', $_POST['country_title'][$tempCountryVar], $searchCountries[$c]['country_id'] );
        $searchCities = Db::queryAll('SELECT * FROM search_cities_table WHERE parent=?', $searchCountries[$c]['country_id'] );

        for( $ct=0; $ct<count($searchCities); $ct++ ){
//            echo '--- ' . $searchCities[$ct]['city_title'] . ' ';
//            echo '<br>';

            $tempCityVar++;
            Db::query( 'UPDATE search_cities_table SET city_title=? WHERE city_id=?', $_POST['city_title'][$tempCityVar], $searchCities[$ct]['city_id'] );
            $searchDistricts = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?', $searchCities[$ct]['city_id'] );

            for( $d=0; $d<count($searchDistricts); $d++ ){
//                echo '------- ' . $searchDistricts[$d]['district_title'] . ' ';
//                echo '<br>';

                $tempDistrictVar++;
                Db::query( 'UPDATE search_districts_table SET district_title=? WHERE district_id=?', $_POST['district_title'][$tempDistrictVar], $searchDistricts[$d]['district_id'] );
            }
        }
    }
}