<?php
$states = Db::queryAll('SELECT * FROM search_states_table ORDER BY state_title');
$countries = Db::queryAll('SELECT * FROM search_countries_table ORDER BY country_title');
$cities = Db::queryAll('SELECT * FROM search_cities_table ORDER BY city_title');
$districts = Db::queryAll('SELECT * FROM search_districts_table ORDER BY district_title');
$types = Db::queryAll('SELECT type FROM search_types_table ORDER BY type');
$price = Db::queryAll('SELECT price, MIN(price), MAX(price) FROM items_table');
$statuses = Db::queryAll('SELECT status_title FROM search_statuses_table GROUP BY status_title ORDER BY status_title');
if( isset($_GET['price']) ){
    $priceArray = explode( ';', $_GET['price'] );
}

?>
<?php if( isset($_GET['map']) ) : ?>
    <form role="form" id="form-map" class="form-map form-search" action="search.php" method="post">
    <h2>Search Your Property</h2>
<?php else : ?>
    <form role="form" id="form-search" class="form-search" action="search.php" method="post">
<?php endif ?>

    <?php // Status --------------------------------------------------------------------------------------------------?>
    <?php if( $config['show_status'] == 1 ) : ?>
        <div class="form-group">
            <select name="status_title">
                <?php if(isset($_GET['status_title'])) : ?>
                    <option value="<?= $_GET['status_title'] ?>"><?= $_GET['status_title'] ?></option>
                    <option value="">- Status -</option>
                    <?php for($i=0; $i<count($statuses); $i++) : ?>
                        <?php if($statuses[$i]['status_title'] != $_GET['status_title']) : ?>
                            <option value="<?= $statuses[$i]['status_title'] ?>"><?= $statuses[$i]['status_title'] ?></option>
                        <?php endif ?>
                    <?php endfor ?>
                <?php else : ?>
                    <option value="">Status</option>
                    <?php for($i=0; $i<count($statuses); $i++) : ?>
                        <option value="<?= $statuses[$i]['status_title'] ?>"><?= $statuses[$i]['status_title'] ?></option>
                    <?php endfor ?>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // State ----------------------------------------------------------------------------------------------------?>
    <?php if( $config['show_state'] == 1 ) : ?>
        <div class="form-group">
            <select name="state_id" id="state">
                <?php if(isset( $_GET['state_id']) ) : ?>
                    <option value="<?= $_GET['state_id'] ?>"><?= Db::querySingle('SELECT state_title FROM search_states_table WHERE state_id=?', $_GET['state_id']) ?></option>
                    <option value="">- State -</option>
                    <?php for($i=0; $i<count($states); $i++) : ?>
                        <?php if($states[$i]['state_id'] != $_GET['state_id']) : ?>
                            <option value="<?= $states[$i]['state_id'] ?>"><?= $states[$i]['state_title'] ?></option>
                        <?php endif ?>
                    <?php endfor ?>
                <?php else : ?>
                    <option value="">State</option>
                    <?php for($i=0; $i<count($states); $i++) : ?>
                        <option value="<?= $states[$i]['state_id'] ?>"><?= $states[$i]['state_title'] ?></option>
                    <?php endfor ?>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // Country -------------------------------------------------------------------------------------------------?>
    <?php //if( $config['show_country'] == 1 ) : ?>
        <div class="form-group <?php if( $config['show_state'] != 0 ) if( !isset( $_GET['country_id']) ) echo 'is-chained' ?> ">
            <select name="country_id" id="country">
                <?php if( isset( $_GET['country_id']) ) : ?>
                    <option value="<?= $_GET['country_id'] ?>"><?= Db::querySingle('SELECT country_title FROM search_countries_table WHERE country_id=?', $_GET['country_id']) ?></option>
                    <option value="">- Country -</option>
                    <?php if( $config['show_state'] != 0 ) : ?>
                        <?php $countries = Db::queryAll('SELECT * FROM search_countries_table WHERE parent=?', $_GET['state_id'])  ?>
                    <?php endif ?>
                    <?php for($i=0; $i<count($countries); $i++) : ?>
                        <?php if($countries[$i]['country_id'] != $_GET['country_id']) : ?>
                            <option value="<?= $countries[$i]['country_id'] ?>"><?= $countries[$i]['country_title'] ?></option>
                        <?php endif ?>
                    <?php endfor ?>
                <?php else : ?>
                    <option value="">Country</option>
                    <?php for($i=0; $i<count($countries); $i++) : ?>
                        <option value="<?= $countries[$i]['country_id'] ?>"><?= $countries[$i]['country_title'] ?></option>
                    <?php endfor ?>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php //endif ?>

    <?php // City ----------------------------------------------------------------------------------------------------?>
    <?php //if( $config['show_city'] == 1 ) : ?>
        <div class="form-group <?php if( !isset( $_GET['city_id']) ) echo 'is-chained' ?> ">
            <select name="city_id" id="city">
                <?php if( isset( $_GET['city_id']) ) : ?>
                    <option value="<?= $_GET['city_id'] ?>"><?= Db::querySingle('SELECT city_title FROM search_cities_table WHERE city_id=?', $_GET['city_id']) ?></option>
                    <option value="">- City -</option>
                    <?php $cities = Db::queryAll('SELECT * FROM search_cities_table WHERE parent=?', $_GET['country_id'])  ?>
                    <?php for($i=0; $i<count($cities); $i++) : ?>
                        <?php if($cities[$i]['city_id'] != $_GET['city_id']) : ?>
                            <option value="<?= $cities[$i]['city_id'] ?>"><?= $cities[$i]['city_title'] ?></option>
                        <?php endif ?>
                    <?php endfor ?>
                <?php else : ?>
                    <option value="">City</option>
                    <?php for($i=0; $i<count($cities); $i++) : ?>
                        <option value="<?= $cities[$i]['city_id'] ?>"><?= $cities[$i]['city_title'] ?></option>
                    <?php endfor ?>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php //endif ?>

    <?php // District ------------------------------------------------------------------------------------------------?>
    <?php //if( $config['show_country'] == 1 ) : ?>
    <div class="form-group <?php if( !isset( $_GET['district_id']) ) echo 'is-chained' ?> ">
        <select name="district_id" id="district">
            <?php if(isset( $_GET['district_id']) ) : ?>
                <option value="<?= $_GET['district_id'] ?>"><?= Db::querySingle('SELECT district_title FROM search_districts_table WHERE district_id=?', $_GET['district_id']) ?></option>
                <option value="">- District -</option>
                <?php $districts = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?', $_GET['city_id'])  ?>
                <?php for($i=0; $i<count($districts); $i++) : ?>
                    <?php if($districts[$i]['district_id'] != $_GET['district_id']) : ?>
                        <option value="<?= $districts[$i]['district_id'] ?>"><?= $districts[$i]['district_title'] ?></option>
                    <?php endif ?>
                <?php endfor ?>
            <?php else : ?>
                <option value="">District</option>
                <?php for($i=0; $i<count($districts); $i++) : ?>
                    <option value="<?= $districts[$i]['district_id'] ?>"><?= $districts[$i]['district_title'] ?></option>
                <?php endfor ?>
            <?php endif ?>
        </select>
    </div><!-- /.form-group -->
    <?php //endif ?>


    <?php // Bedrooms ------------------------------------------------------------------------------------------------?>
    <?php if( $config['show_bedrooms'] == 1 ) : ?>
        <div class="form-group">
            <select name="bedrooms" data-show-subtext="true">
                <?php if(isset($_GET['bedrooms'])) : ?>
                    <option value="<?= $_GET['bedrooms'] ?>"><?= $_GET['bedrooms'] ?></option>
                    <option value="">- Bedrooms -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php else : ?>
                    <option value="">Bedrooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // Bathrooms -----------------------------------------------------------------------------------------------?>
    <?php if( $config['show_bathrooms'] == 1 ) : ?>
        <div class="form-group">
            <select name="bathrooms" data-show-subtext="true">
                <?php if(isset($_GET['bathrooms'])) : ?>
                    <option value="<?= $_GET['bathrooms'] ?>"><?= $_GET['bathrooms'] ?></option>
                    <option value="">- Bathrooms -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php else : ?>
                    <option value="">Bathrooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // Type ----------------------------------------------------------------------------------------------------?>
    <?php if( $config['show_type'] == 1 ) : ?>
        <div class="form-group">
            <select name="type">
                <?php if(isset($_GET['type'])) : ?>
                    <option value="<?= $_GET['type'] ?>"><?= $_GET['type'] ?></option>
                    <option value="">- Type -</option>
                    <?php for($i=0; $i<count($types); $i++) : ?>
                        <?php if($types[$i]['type'] != $_GET['type']) : ?>
                            <option value="<?= $types[$i]['type'] ?>"><?= $types[$i]['type'] ?></option>
                        <?php endif ?>
                    <?php endfor ?>
                <?php else : ?>
                    <option value="">Type</option>
                    <?php for($i=0; $i<count($types); $i++) : ?>
                        <option value="<?= $types[$i]['type'] ?>"><?= $types[$i]['type'] ?></option>
                    <?php endfor ?>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // Rooms ---------------------------------------------------------------------------------------------------?>
    <?php if( $config['show_rooms'] == 1 ) : ?>
        <div class="form-group">
            <select name="rooms">
                <?php if(isset($_GET['rooms'])) : ?>
                    <option value="<?= $_GET['rooms'] ?>"><?= $_GET['rooms'] ?></option>
                    <option value="">- Rooms -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php else : ?>
                    <option value="">Rooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                <?php endif ?>
            </select>
        </div><!-- /.form-group -->
    <?php endif ?>

    <?php // Price Slider --------------------------------------------------------------------------------------------?>
    <?php if( $config['show_price_slider'] == 1 ) : ?>
        <div class="form-group">
            <div class="price-range">
                <?php if( isset($_GET['price']) ) : ?>
                    <?php if( $priceArray[0] == $price[0]['MIN(price)'] && $priceArray[1] == $price[0]['MAX(price)'] ) : ?>
                        <input id="price-input" type="text" name="price" value="<?= $price[0]['MIN(price)'] ?>;<?= $price[0]['MAX(price)'] ?>" data-currency="<?= $config['currency'] ?>" data-min-price="<?= $price[0]['MIN(price)'] ?>" data-max-price="<?= $price[0]['MAX(price)'] ?>" data-locale="<?= $config['locale'] ?>">
                    <?php else : ?>
                        <input id="price-input" type="text" name="price" value="<?= $priceArray[0] ?>;<?= $priceArray[1] ?>" data-currency="<?= $config['currency'] ?>" data-min-price="<?= $price[0]['MIN(price)'] ?>" data-max-price="<?= $price[0]['MAX(price)'] ?>" data-price-changed="1" data-locale="<?= $config['locale'] ?>">
                    <?php endif ?>
                <?php else : ?>
                    <input id="price-input" type="text" name="price" value="<?= $price[0]['MIN(price)'] ?>;<?= $price[0]['MAX(price)'] ?>" data-currency="<?= $config['currency'] ?>" data-min-price="<?= $price[0]['MIN(price)'] ?>" data-max-price="<?= $price[0]['MAX(price)'] ?>" data-locale="<?= $config['locale'] ?>">
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>

    <div class="form-group">
        <button type="submit" id="form-search-submit" class="btn btn-default">Search Now</button>
    </div><!-- /.form-group -->
</form><!-- /#form -->