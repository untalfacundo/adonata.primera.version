<section id="properties" class="display-lines">
    <?php for($i=0; $i<count($item); $i++) : ?>
        <div class="property">
            <?php if($item[$i]['item_status']) : ?>
                <figure class="tag status"><?= htmlspecialchars($item[$i]['item_status']) ?></figure>
            <?php endif ?>

            <?php if($item[$i]['item_type']) : ?>
                <figure class="type" title="<?= htmlspecialchars($item[$i]['item_type']) ?>"><img src="<?= $type[ $item[$i]['item_type'] - 1 ]['type_img']; ?>"></figure>
            <?php endif ?>

            <div class="property-image">
                <?php if($item[$i]['item_status_ribbon']) : ?>
                    <figure class="ribbon"><?= htmlspecialchars($item[$i]['item_status_ribbon']) ?></figure>
                <?php endif ?>
                <a href="?page=item-detail&item=<?= htmlspecialchars($item[$i]['item_id']) ?>">
                    <img alt="" src="<?php
                    if(!$item[$i]['image']){
                        echo('assets/img/item-default.png');
                    } else {
                        echo($item[$i]['image']);
                    }
                    ?>">
                </a>
            </div>
            <div class="info">
                <header>
                    <a href="?page=item-detail&item=<?= htmlspecialchars($item[$i]['item_id']) ?>"><h3><?= htmlspecialchars($item[$i]['title']) ?></h3></a>
                    <figure><?= htmlspecialchars($item[$i]['city']) ?></figure>
                </header>
                <div class="tag price"><?php formatPrice($config['currency'], $item[$i]['price'], $config['locale']); ?></div>
                <aside>
                    <p><?= $item[$i]['description'] ?></p>
                    <dl>
                        <?php if( $item[$i]['item_status'] ) : ?>
                            <dt>Status:</dt>
                                <dd><?= htmlspecialchars( $item[$i]['item_status'] ) ?></dd>
                        <?php endif ?>
                        <?php if( $item[$i]['area'] ) : ?>
                            <dt>Area:</dt>
                                <dd><?= htmlspecialchars( $item[$i]['area'] ) . $config['unit'] ?></dd>
                        <?php endif ?>
                        <?php if( $item[$i]['bedrooms'] ) : ?>
                            <dt>Beds:</dt>
                                <dd><?= htmlspecialchars( $item[$i]['bedrooms'] ) ?></dd>
                        <?php endif ?>
                        <?php if( $item[$i]['bathrooms'] ) : ?>
                            <dt>Baths:</dt>
                                <dd><?= htmlspecialchars( $item[$i]['bathrooms'] ) ?></dd>
                        <?php endif ?>
                    </dl>
                </aside>
                <a href="?page=item-detail&item=<?= htmlspecialchars($item[$i]['item_id']) ?>" class="link-arrow">Read More</a>
            </div>
        </div><!-- /.property -->
        <?php if($config['display_ad_after_row']) if($i == $config['display_ad_after_row']) : ?>
            <section id="advertising">
                <a href="submit.html">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">Do you want your property to be listed here?</span>
                            <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                        </div>
                    </div><!-- /.banner-->
                </a>
            </section><!-- /#adveritsing-->
        <?php endif ?>
    <?php endfor ?>
</section><!-- /#properties-->