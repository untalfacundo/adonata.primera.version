<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

if( $_POST ){
    if( $_POST['itemType'] == 'person' ){
        Db::query('DELETE FROM persons_table WHERE person_id=?', $_POST['id']);
        rrmdir('../../upload/persons/'.$_POST['id']);
    }
    elseif( $_POST['itemType'] == 'item' ){
        Db::query('DELETE FROM items_table WHERE item_id=?', $_POST['id']);
        rrmdir('../../upload/items/'.$_POST['id']);
    }
    elseif( $_POST['itemType'] == 'company' ){
        Db::query('DELETE FROM companies_table WHERE company_id=?', $_POST['id']);
        rrmdir('../../upload/companies/'.$_POST['id']);
    }
    elseif( $_POST['itemType'] == 'service' ){
        Db::query('DELETE FROM services_table WHERE service_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'faq' ){
        Db::query('DELETE FROM faq_table WHERE faq_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'testimonial' ){
        Db::query('DELETE FROM testimonials_table WHERE testimonial_id=?', $_POST['id']);
        rrmdir('../../upload/testimonials/'.$_POST['id']);
    }
    elseif( $_POST['itemType'] == 'gallery' ){
        Db::query('DELETE FROM galleries_table WHERE item_image_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'type' ){
        Db::query('DELETE FROM search_types_table WHERE type_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'partner' ){
        Db::query('DELETE FROM partners_table WHERE partner_id=?', $_POST['id']);
        rrmdir('../../upload/partners/'.$_POST['id']);
    }
    elseif( $_POST['itemType'] == 'footer_link' ){
        Db::query('DELETE FROM footer_links_table WHERE footer_link_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'feature_amenity' ){
        Db::query('DELETE FROM features_table WHERE feature_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'text_slide' ){
        Db::query('DELETE FROM text_banner_table WHERE text_slide_id=?', $_POST['id']);
    }
    elseif( $_POST['itemType'] == 'state' ){

        Db::query('DELETE FROM search_states_table WHERE state_id=?', $_POST['id']);
        $tempCountry = Db::queryAll('SELECT * FROM search_countries_table WHERE parent=?', $_POST['id']);

        for( $c=0; $c<count($tempCountry); $c++ ){
            Db::query('DELETE FROM search_countries_table WHERE country_id=?', $tempCountry[$c]['country_id'] );
            $tempCity = Db::queryAll('SELECT * FROM search_cities_table WHERE parent=?', $tempCountry[$c]['country_id'] );

            for( $ct=0; $ct<count($tempCity); $ct++ ){
                Db::query('DELETE FROM search_cities_table WHERE city_id=?', $tempCity[$ct]['city_id'] );
                $tempDistrict = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?',  $tempCity[$ct]['city_id'] );

                for( $d=0; $d<count($tempDistrict); $d++ ){
                    Db::query('DELETE FROM search_districts_table WHERE district_id=?', $tempDistrict[$d]['district_id'] );
                }
            }
        }
    }
    elseif( $_POST['itemType'] == 'country' ){

        Db::query('DELETE FROM search_countries_table WHERE country_id=?', $_POST['id'] );
        $tempCity = Db::queryAll('SELECT * FROM search_cities_table WHERE parent=?', $_POST['id'] );

        for( $ct=0; $ct<count($tempCity); $ct++ ){
            Db::query('DELETE FROM search_cities_table WHERE city_id=?', $tempCity[$ct]['city_id'] );
            $tempDistrict = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?',  $tempCity[$ct]['city_id'] );

            for( $d=0; $d<count($tempDistrict); $d++ ){
                Db::query('DELETE FROM search_districts_table WHERE district_id=?', $tempDistrict[$d]['district_id'] );
            }
        }
    }
    elseif( $_POST['itemType'] == 'city' ){

        Db::query('DELETE FROM search_cities_table WHERE city_id=?', $_POST['id'] );
        $tempDistrict = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?',  $_POST['id'] );

        for( $d=0; $d<count($tempDistrict); $d++ ){
            Db::query('DELETE FROM search_districts_table WHERE district_id=?', $tempDistrict[$d]['district_id'] );
        }

    }
    elseif( $_POST['itemType'] == 'district' ){
        Db::query('DELETE FROM search_districts_table WHERE district_id=?', $_POST['id']);
    }

}