<?php if( isset($_GET['page']) ) : ?>
    <div class="col-md-4 col-sm-4">
<?php else : ?>
    <div class="col-md-3 col-sm-6">
<?php endif ?>
    <div class="property">
        <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
            <div class="tools">
                <a href="?page=edit-item&item=<?= $item[$i]['item_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                <span id="<?= $item[$i]['item_id'] ?>" class="delete" data-item-type="item"><i class="fa fa-trash-o"></i></span>
            </div>
        <?php endif ?>

        <?php if($item[$i]['item_status']) : ?>
            <figure class="tag status"><?= htmlspecialchars($item[$i]['item_status']) ?></figure>
        <?php endif ?>

        <?php if($item[$i]['item_type']) : ?>
            <figure class="type" title="<?= htmlspecialchars($item[$i]['item_type']) ?>"><img src="<?= $type[ $item[$i]['item_type'] - 1 ]['type_img']; ?>"></figure>
        <?php endif ?>

        <?php if($item[$i]['item_status_ribbon']) : ?>
            <figure class="ribbon"><?= htmlspecialchars($item[$i]['item_status_ribbon']) ?></figure>
        <?php endif ?>

        <a href="?page=item-detail&item=<?= htmlspecialchars($item[$i]['item_id']) ?>">
            <div class="property-image">
                <img alt="" src="<?php
                if(!$item[$i]['image']){
                    echo('assets/img/item-default.png');
                } else {
                    echo($item[$i]['image']);
                }
                ?>">
            </div>
            <div class="overlay">
                <div class="info">
                    <div class="tag price"><?php formatPrice($config['currency'], $item[$i]['price'], $config['locale']); ?></div>
                    <h3><?= htmlspecialchars($item[$i]['title']) ?></h3>
                    <figure><?= htmlspecialchars( Db::querySingle('SELECT city_title FROM search_cities_table WHERE city_id=?', $item[$i]['city']) ) ?></figure>
                </div>
                <ul class="additional-info">
                    <li>
                        <header>Area:</header>
                        <figure><?= htmlspecialchars($item[$i]['area']) . $config['unit'] ?></figure>
                    </li>
                    <li>
                        <header>Beds:</header>
                        <figure><?= htmlspecialchars($item[$i]['bedrooms']) ?></figure>
                    </li>
                    <li>
                        <header>Baths:</header>
                        <figure><?= htmlspecialchars($item[$i]['bathrooms']) ?></figure>
                    </li>
                    <li>
                        <header>Garages:</header>
                        <figure><?= htmlspecialchars($item[$i]['garages']) ?></figure>
                    </li>
                </ul>
            </div>
        </a>
    </div><!-- /.property -->
</div><!-- /.col-md-3 -->