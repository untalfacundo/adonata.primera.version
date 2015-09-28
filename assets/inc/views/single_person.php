<div class="agent <?php if( $_GET['page'] != 'tools-persons' ) echo 'equal-height' ?>">
    <a href="?page=person-detail&person=<?= $person[$i]['person_id'] ?>" class="agent-image"><img alt="" src="<?= $person[$i]['image'] ?>"></a>
    <div class="wrapper">
        <header>
            <a href="?page=person-detail&person=<?= $person[$i]['person_id'] ?>">
                <h2><?= $person[$i]['person_name'] ?></h2>
            </a>
            <?php if( $person[$i]['account_type'] == 'user' ) : ?>
                <span class="label label-default"><?=  ucfirst($person[$i]['account_type']) ?></span>
            <?php elseif( $person[$i]['account_type'] == 'agent' ) :?>
                <span class="label label-primary"><?=  ucfirst($person[$i]['account_type']) ?></span>
            <?php elseif( $person[$i]['account_type'] == 'admin' ) :?>
                <span class="label label-success"><?=  ucfirst($person[$i]['account_type']) ?></span>
            <?php endif ?>

            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                <div class="tools">
                    <?php if( $person[$i]['person_id'] == $_SESSION['user_id'] ) : ?>
                        <a href="?page=edit-person&person=<?= $person[$i]['person_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                    <?php else : ?>
                        <a href="?page=edit-person&person=<?= $person[$i]['person_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                        <span id="<?= $person[$i]['person_id'] ?>" class="delete" data-item-type="person"><i class="fa fa-trash-o"></i></span>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </header>
        <aside><?= $numberOfItems[$i] ?> Properties</aside>
        <dl>
            <?php if( $person[$i]['phone'] ) : ?>
                <dt>Phone:</dt>
                <dd><?= $person[$i]['phone'] ?></dd>
            <?php endif ?>
            <?php if( $person[$i]['mobile'] ) : ?>
                <dt>Mobile:</dt>
                <dd><?= $person[$i]['mobile'] ?></dd>
            <?php endif ?>
            <?php if( $person[$i]['email'] ) : ?>
                <dt>Email:</dt>
                <dd><a href="mailto:<?= $person[$i]['email'] ?>"><?= $person[$i]['email'] ?></a></dd>
            <?php endif ?>
            <?php if( $person[$i]['skype'] ) : ?>
                <dt>Skype:</dt>
                <dd><?= $person[$i]['skype'] ?></dd>
            <?php endif ?>
        </dl>
    </div>
</div><!-- /.agent -->

