<?php
$includePath = '';
include_once('Db.php');
include_once('connect_db.php');
?>

<?php // Question --------------------------------------------------------------------------------------------------- ?>
    <?php if( $_POST['tool_type'] == 'question' ) : ?>
        <?php
        Db::query( '
                INSERT INTO faq_table
                SET faq_title=?, faq_description=?, counter=?, date_created=?
                ', '', '', 0, date("Y-m-d H:i:s")
        );
        $lastId = Db::getLastId();
        ?>

        <section class="faq-tools" id="<?= $lastId  ?>">
            <header>
                <h3>FAQ</h3>
                <div class="tools">
                    <span id="<?= $lastId ?>" class="delete" data-item-type="faq"><i class="fa fa-trash-o"></i></span>
                </div>
            </header>
            <div class="form-group">
                <label for="faq_title">Title</label>
                <input type="text" name="faq_title[]" id="faq_title" value="">
            </div><!-- /.form-group -->
            <div class="form-group">
                <label for="faq_description">Description</label>
                <textarea class="form-control" id="faq_description" rows="4" name="faq_description[]"></textarea>
            </div><!-- /.form-group -->
        </section>

<?php // Service ---------------------------------------------------------------------------------------------------- ?>

    <?php elseif( $_POST['tool_type'] == 'service' ) : ?>
        <?php
            Db::query( '
                INSERT INTO services_table
                SET service_title=?, service_description=?, service_icon=?, service_link=?, date_created=?
                ', '', '', '', '', date("Y-m-d H:i:s")
        );
        $lastId = Db::getLastId();
        ?>
        <section class="service" id="<?= $lastId ?>">
            <header>
                <h3>Service / Feature</h3>
                <div class="tools">
                    <span id="<?= $lastId ?>" class="delete" data-item-type="service"><i class="fa fa-trash-o"></i></span>
                </div>
            </header>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="service_title">Title</label>
                        <input type="text" name="service_title[]" id="service_title" value="">
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="service_icon">Icon</label>
                        <input type="text" name="service_icon[]" id="service_icon" value="">
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3">
                    <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank" class="more-icons">More Font Awesome icons <i class="fa fa-external-link"></i>  </a>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="service_description">Description</label>
                        <textarea class="form-control" id="service_description" rows="2" name="service_description[]"></textarea>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="service_link">Title of page link*</label>
                        <input type="text" name="service_link[]" id="service_link" value="">
                        <p class="help-block">*Leave empty to hide</p>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div>
        </section>

<?php // Testimonial ------------------------------------------------------------------------------------------------ ?>
    <?php elseif( $_POST['tool_type'] == 'testimonial' ) : ?>
        <?php
            Db::query( '
                INSERT INTO testimonials_table
                SET description=?, person_name=?, image=?, date_created=?
                ', '', '', '', date("Y-m-d H:i:s")
            );
        $lastId = Db::getLastId();
        ?>
        <section class="testimonial-tools" id="<?= $lastId ?>">
            <header>
                <h3>Testimonial</h3>
                <div class="tools">
                    <span id="<?= $lastId ?>" class="delete" data-item-type="testimonial"><i class="fa fa-trash-o"></i></span>
                </div>
            </header>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <label>Author's Image</label>
                    <img alt="" class="image" id="image<?= $lastId ?>" src="assets/img/person-default.png">
                    <div class="form-group upload-button">
                        <input type="file" name="image[]" id="<?= $lastId ?>" accept="image/*">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="description">Testimonial Text</label>
                        <textarea class="form-control" id="description" rows="4" name="description[]"></textarea>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="person_name">Author's Name</label>
                        <input type="text" name="person_name[]" id="person_name" value="" required="">
                    </div><!-- /.form-group -->
                </div>
            </div>
        </section>

<?php // Type ------------------------------------------------------------------------------------------------------- ?>
    <?php elseif( $_POST['tool_type'] == 'type' ) : ?>
        <?php
            Db::query( '
                INSERT INTO search_types_table
                SET type=?, type_img=?
                ', '', ''
            );
        $lastId = Db::getLastId();
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input name="type[]" type="text" value="">
                </div><!-- /.form-group -->
            </div>
            <div class="col-md-6" id="types">
                <div class="form-group">
                    <input name="type_img[]" type="text" value="">
                    <div class="tools">
                        <span id="<?= $lastId = Db::getLastId(); ?>" class="delete" data-item-type="type"><i class="fa fa-trash-o"></i></span>
                    </div>
                </div><!-- /.form-group -->
            </div>
        </div>

<?php // State ------------------------------------------------------------------------------------------------------ ?>
    <?php elseif( $_POST['tool_type'] == 'state' ) : ?>
    <?php
        Db::query( '
            INSERT INTO search_states_table
            SET state_title=?
            ', ''
        );
    $lastId = Db::getLastId();
    ?>
        <aside class="state" id="state<?= $lastId ?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input name="state_title[]" type="text" value="">
                        <div class="tools">
                            <span id="<?= $lastId ?>" class="delete" data-item-type="state"><i class="fa fa-trash-o"></i></span>
                        </div>
                    </div><!-- /.form-group -->
                </div>
                <?php // Countries -------------------------------------------------- ?>
                <div class="col-md-9">
                    <aside id="countries-for-<?= $lastId ?>">
                        <?php // Generated country goes here ?>
                    </aside>
                    <!-- Add Button -->
                    <div class="btn tool-add" id="<?= $lastId ?>" data-tool-type="country"><i class="fa fa-plus"></i> Add Country</div>
                </div>
            </div>
        </aside>

<?php // Country ---------------------------------------------------------------------------------------------------- ?>
    <?php elseif( $_POST['tool_type'] == 'country' ) : ?>
    <?php
        Db::query( '
            INSERT INTO search_countries_table
            SET country_title=?, parent=?
            ', '', $_POST['id']
        );
        $lastId = Db::getLastId();
    ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input name="country_title[]" type="text" value="">
                    <div class="tools">
                        <span id="<?= $lastId ?>" class="delete" data-item-type="country"><i class="fa fa-trash-o"></i></span>
                    </div>
                </div><!-- /.form-group -->
            </div>
            <?php // Cities ----------------------------------------- ?>
            <div class="col-md-8">
                <aside id="cities-for-<?= $lastId ?>">
                    <?php // Generated city goes here ?>
                </aside>
                <!-- Add Button -->
                <div class="btn tool-add" id="<?= $lastId ?>" data-tool-type="city"><i class="fa fa-plus"></i> Add City</div>
            </div>
        </div>

<?php // City ------------------------------------------------------------------------------------------------------- ?>
    <?php elseif( $_POST['tool_type'] == 'city' ) : ?>
    <?php
        Db::query( '
            INSERT INTO search_cities_table
            SET city_title=?, parent=?
            ', '', $_POST['id']
        );
        $lastId = Db::getLastId();
    ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input name="city_title[]" type="text" value="">
                    <div class="tools">
                        <span id="<?= $lastId ?>" class="delete" data-item-type="city"><i class="fa fa-trash-o"></i></span>
                    </div>
                </div><!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <aside id="districts-for-<?= $lastId ?>">
                    <?php // Generated district goes here ?>
                </aside>
                <!-- Add Button -->
                <div class="btn tool-add" id="<?= $lastId ?>" data-tool-type="district"><i class="fa fa-plus"></i> Add District</div>
            </div>
        </div>

<?php // District --------------------------------------------------------------------------------------------------- ?>
    <?php elseif( $_POST['tool_type'] == 'district' ) : ?>
    <?php
        Db::query( '
            INSERT INTO search_districts_table
            SET district_title=?, parent=?
            ', '', $_POST['id']
        );
    $lastId = Db::getLastId();
    ?>
    <div class="form-group">
        <input name="district_title[]" type="text" value="">
        <div class="tools">
            <span id="<?= $lastId ?>" class="delete" data-item-type="district"><i class="fa fa-trash-o"></i></span>
        </div>
    </div><!-- /.form-group -->


<?php // Partners --------------------------------------------------------------------------------------------------- ?>

    <?php elseif( $_POST['tool_type'] == 'partner' ) : ?>
    <?php
        Db::query( '
            INSERT INTO partners_table
            SET partner_title=?, partner_url=?, partner_image=?, date_created=?
            ', '', '', '', date("Y-m-d H:i:s")
        );
    $lastId = Db::getLastId();
    ?>
    <section class="partner-tools">
        <header>
            <h3>Partner</h3>
            <div class="tools">
                <span id="<?= $lastId ?>" class="delete" data-item-type="partner"><i class="fa fa-trash-o"></i></span>
            </div>
        </header>

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <label>Partner Logo</label>
                <div class="file-input">
                    <img alt="" class="image" id="image<?= $lastId ?>" src="assets/img/partner-default.png">
                </div>
                <div class="form-group upload-button">
                    <input type="file" id="<?= $lastId ?>" name="image[]" id="image" accept="image/*">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="partner_title">Partner Tite</label>
                    <input type="text" name="partner_title[]" id="partner_title" value="" required="">
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label for="partner_url">Partner URL</label>
                    <input type="text" name="partner_url[]" id="partner_url" value="" required="">
                </div><!-- /.form-group -->
            </div>
        </div>
    </section>

<?php // Footer Link ------------------------------------------------------------------------------------------------ ?>

    <?php elseif( $_POST['tool_type'] == 'footer_link' ) : ?>
    <?php
        Db::query( '
            INSERT INTO footer_links_table
            SET title=?, url=?
            ', '', ''
        );
    $lastId = Db::getLastId();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="footer_link_title[]" id="title" value="">
            </div><!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="footer_link_url[]" id="url" value="">
                <div class="tools">
                    <span id="<?= $lastId ?>" class="delete" data-item-type="footer_link"><i class="fa fa-trash-o"></i></span>
                </div>
            </div><!-- /.form-group -->
        </div>
    </div>

<?php // Features / Amenities --------------------------------------------------------------------------------------- ?>

    <?php elseif( $_POST['tool_type'] == 'feature_amenity' ) : ?>
    <?php
        Db::query( '
            INSERT INTO features_table
            SET title=?
            ', ''
        );
    $lastId = Db::getLastId();
    ?>
    <div class="feature-tools" id="<?= $lastId ?>">
        <div class="form-group shorter-input">
            <input type="text" name="feature_title[]" id="feature_title" value="">
            <div class="tools">
                <span id="<?= $lastId ?>" class="delete" data-item-type="feature_amenity"><i class="fa fa-trash-o"></i></span>
            </div>
        </div><!-- /.form-group -->
    </div>


<?php // Text Slide ------------------------------------------------------------------------------------------------- ?>

    <?php elseif( $_POST['tool_type'] == 'text_slide' ) : ?>
    <?php
        Db::query( '
            INSERT INTO text_banner_table
            SET slide_content=?, date_created=?
            ', '', date("Y-m-d H:i:s")
        );
    $lastId = Db::getLastId();
    ?>
    <section class="text-banner-tools" id="<?= $lastId ?>">
        <header>
            <h3>Text Slide</h3>
            <div class="tools">
                <span id="<?= $lastId ?>" class="delete" data-item-type="text_slide"><i class="fa fa-trash-o"></i></span>
            </div>
        </header>
        <div class="form-group">
            <label for="slide_content">Slide Content</label>
            <input type="text" name="slide_content[]" id="" value="">
        </div><!-- /.form-group -->
    </section>

<?php endif ?>
