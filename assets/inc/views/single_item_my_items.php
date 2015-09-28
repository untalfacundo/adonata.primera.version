<tr>
    <td class="image">
        <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>"><img alt="" src="<?= $item[$i]['image'] ?>"></a>
    </td>
    <td><div class="inner">
            <a href="?page=item-detail&item=<?= $item[$i]['item_id'] ?>"><h2><?= $item[$i]['title'] ?></h2></a>
            <figure><?= Db::querySingle('SELECT city_title FROM search_cities_table WHERE city_id=?', $item[$i]['city']) ?></figure>
            <div class="tag price"><?php formatPrice($config['currency'], $item[$i]['price'], $config['locale']); ?></div>
            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 && $_GET['page'] == 'tools-items' ) : ?>
                <div class="assigned-person">Created by:
                    <a href="?page=edit-person&person=<?= $person[$i]['person_id']  ?>"><?= $person[$i]['person_name']  ?></a>
                    <?php if( $person[$i]['person_id'] == $_SESSION['user_id'] ) echo "(This is you)" ?>
                </div>
            <?php endif ?>
        </div>
    </td>
    <td><?= $item[$i]['date_created'] ?></td>
    <td class="actions">
        <a href="?page=edit-item&item=<?= $item[$i]['item_id'] ?>" class="edit"><i class="fa fa-pencil"></i>Edit</a>
        <span id="<?= $item[$i]['item_id'] ?>" class="delete" data-item-type="item"><i class="fa fa-trash-o"></i></span>
    </td>
</tr>