<div class="property big">
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
