<section id="properties">
    <div class="grid">
        <?php for($i=0; $i<count($item); $i++) : ?>
            <div class="property masonry">
                <div class="inner" <?php if($i > 6) echo('data-scroll-reveal'); ?>>
                    <a href="?page=item-detail&item=<?= htmlspecialchars($item[$i]['item_id']) ?>">
                        <div class="property-image">
                            <?php if($item[$i]['item_status']) : ?>
                                <figure class="tag status"><?= htmlspecialchars($item[$i]['item_status']) ?></figure>
                            <?php endif ?>

                            <?php if($item[$i]['item_type']) : ?>
                                <figure class="type" title="<?= htmlspecialchars($item[$i]['item_type']) ?>"><img src="<?= $type[ $item[$i]['item_type'] - 1 ]['type_img']; ?>"></figure>
                            <?php endif ?>

                            <?php if($item[$i]['item_status_ribbon']) : ?>
                                <figure class="ribbon"><?= htmlspecialchars($item[$i]['item_status_ribbon']) ?></figure>
                            <?php endif ?>

                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price"><?php formatPrice($config['currency'], $item[$i]['price'], $config['locale']); ?></div>
                                </div>
                            </div>
                            <img alt="" src="<?php
                                if(!$item[$i]['image']){
                                    echo('assets/img/item-default.png');
                                } else {
                                    echo($item[$i]['image']);
                                }
                            ?>">
                        </div>
                    </a>
                    <aside>
                        <header>
                            <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>"><h3><?= $item[$i]['title'] ?></h3></a>
                            <figure><?= htmlspecialchars( Db::querySingle('SELECT city_title FROM search_cities_table WHERE city_id=?', $item[$i]['city']) ) ?></figure>
                        </header>
                        <p><?= $item[$i]['description'] ?></p>
                        <dl>
                            <dt>Status:</dt>
                                <dd><?= htmlspecialchars($item[$i]['item_status']) ?></dd>
                            <dt>Area:</dt>
                                <dd><?= htmlspecialchars($item[$i]['area']) . $config['unit'] ?></dd>
                            <dt>Beds:</dt>
                                <dd><?= htmlspecialchars($item[$i]['bedrooms']) ?></dd>
                                <dt>Baths:</dt>
                            <dd><?= htmlspecialchars($item[$i]['bathrooms']) ?></dd>
                        </dl>
                        <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>" class="link-arrow">Read More</a>
                    </aside>
                </div>
            </div><!-- /.property -->
        <?php endfor ?>
    </div><!-- /.grid-->
</section><!-- /#properties-->