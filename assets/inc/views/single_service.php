<div class="feature-box equal-height">
    <figure class="icon"><i class="fa <?= $service[$i]['service_icon'] ?>"></i></figure>
    <aside class="description">
        <header>
            <h3><?= $service[$i]['service_title'] ?></h3>
            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                <div class="tools">
                    <a href="?page=tools-services"><i class="fa fa-edit"></i>Edit</a>
                    <span id="<?= $service[$i]['service_id'] ?>" class="delete" data-item-type="service"><i class="fa fa-trash-o"></i></span>
                </div>
            <?php endif ?>
        </header>
        <p><?= $service[$i]['service_description'] ?></p>
        <?php if( !empty($service[$i]['service_link'] ) ) : ?>
            <a href="?page=<?= $service[$i]['service_link'] ?>" class="link-arrow">Read More</a>
        <?php endif ?>
    </aside>
</div><!-- /.feature-box -->
