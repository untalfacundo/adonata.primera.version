<div class="property small">
    <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>">
        <div class="property-image">
            <img alt="" src="<?= $item[$i]['image'] ?>">
        </div>
    </a>
    <div class="info">
        <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>"><h4><?= $item[$i]['title'] ?></h4></a>
        <figure><?= Db::querySingle('SELECT city_title FROM search_cities_table WHERE city_id=?', $item[$i]['city']) ?></figure>
        <div class="tag price"><?php formatPrice($config['currency'], $item[$i]['price'], $config['locale']); ?></div>
    </div>
</div><!-- /.property -->