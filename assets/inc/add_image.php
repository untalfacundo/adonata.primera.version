<?php if( isset($_POST['action']) ) : ?>
    <?php if( $_POST['action'] == 'add_image_field' ) : ?>
        <?php
        $includePath = '';
        include_once('Db.php');
        include_once('connect_db.php');
        Db::query( '
            INSERT INTO galleries_table SET url=?, description=?, item_id=?, date_created=?', '', '', $_POST['item_id'], date("Y-m-d H:i:s")
        );
        $lastId = Db::getLastId();
        ?>
        <div class="file-input" id="file-input<?= $lastId ?>">
            <div class="row">
                <div class="col-md-4"><img src="assets/img/item-default.png" id="image<?= $lastId ?>" ></div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="tools">
                            <span id="<?= $lastId ?>" class="delete" data-item-type="gallery"><i class="fa fa-trash-o"></i></span>
                        </div>
                        <label for="">Description</label>
                        <input id="" type="text" name="image_description[]" value="">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <input type="file" id="<?= $lastId ?>" accept="image/*" class="file-upload" name="image[]">
                    </div>
                </div>
            </div>
        </div>

    <?php elseif( $_POST['action'] == 'add_image_field_submit' ) : ?>
        <div class="file-input" id="file-input<?= $_POST['item_id'] ?>">
            <div class="row">
                <div class="col-md-4"><img src="assets/img/item-default.png" id="image<?= $_POST['item_id'] ?>" ></div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="tools">
                            <span id="<?= $_POST['item_id'] ?>" class="delete" data-item-type="gallery-submit"><i class="fa fa-trash-o"></i></span>
                        </div>
                        <label for="">Description</label>
                        <input id="" type="text" name="image_description[]" value="">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <input type="file" id="<?= $_POST['item_id'] ?>" accept="image/*" class="file-upload" name="image[]">
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

<?php else :?>
    <div class="file-input" id="file-input<?= $gallery[$i]['item_image_id']?>" >
        <div class="row">
            <div class="col-md-4"><img src="<?= $gallery[$i]['url'] ?>"id="image<?= $gallery[$i]['item_image_id'] ?>" ></div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="tools">
                        <span id="<?= $gallery[$i]['item_image_id'] ?>" class="delete" data-item-type="gallery"><i class="fa fa-trash-o"></i></span>
                    </div>
                    <label for="">Description</label>
                    <input id="" type="text" name="image_description[]" value="<?= $gallery[$i]['description'] ?>">
                </div><!-- /.form-group -->
                <div class="form-group">
                    <input type="file" id="<?= $gallery[$i]['item_image_id'] ?>" accept="image/*" class="file-upload" name="image[]">
                </div>
            </div>
        </div>
    </div>
<?php endif ?>