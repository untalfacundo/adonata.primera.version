<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');
?>

<?php // State -------------------------------------------------------------------------------------------------------?>
<?php if( $_POST['action'] == 'state' ) : ?>

    <?php $tempCountry = Db::queryAll('SELECT * FROM search_countries_table WHERE parent=?', $_POST['id']); ?>

    <?php //if( $config['show_country'] == 1 ) : ?>
        <select name="country_id" id="country" class="selectpicker">
            <option value="">Country</option>
            <?php for($i=0; $i<count($tempCountry); $i++) : ?>
                <option value="<?= $tempCountry[$i]['country_id'] ?>"><?= $tempCountry[$i]['country_title'] ?></option>
            <?php endfor ?>
        </select>
    <?php //endif ?>

<?php endif ?>

<?php // Country -----------------------------------------------------------------------------------------------------?>
<?php if( $_POST['action'] == 'country' ) : ?>

    <?php $tempCity = Db::queryAll('SELECT * FROM search_cities_table WHERE parent=?', $_POST['id']); ?>

    <?php //if( $config['show_city'] == 1 ) : ?>
    <select name="city_id" id="city" class="selectpicker">
        <option value="">City</option>
        <?php for($i=0; $i<count($tempCity); $i++) : ?>
            <option value="<?= $tempCity[$i]['city_id'] ?>"><?= $tempCity[$i]['city_title'] ?></option>
        <?php endfor ?>
    </select>
    <?php //endif ?>

<?php endif ?>

<?php // City --------------------------------------------------------------------------------------------------------?>
<?php if( $_POST['action'] == 'city' ) : ?>

    <?php $tempDistrict = Db::queryAll('SELECT * FROM search_districts_table WHERE parent=?', $_POST['id']); ?>

    <?php //if( $config['show_city'] == 1 ) : ?>
    <select name="district_id" id="district" class="selectpicker">
        <option value="">District</option>
        <?php for($i=0; $i<count($tempDistrict); $i++) : ?>
            <option value="<?= $tempDistrict[$i]['district_id'] ?>"><?= $tempDistrict[$i]['district_title'] ?></option>
        <?php endfor ?>
    </select>
    <?php //endif ?>

<?php endif ?>