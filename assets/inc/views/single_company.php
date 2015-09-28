<div class="agency">
    <a href="?page=company-detail&company=<?= $company[$i]['company_id'] ?>" class="agency-image"><img alt="" src="<?= $company[$i]['logo'] ?>"></a>
    <div class="wrapper">
        <header>
            <a href="?page=company-detail&company=<?= $company[$i]['company_id'] ?>"><h2><?= $company[$i]['company_title'] ?></h2></a>
            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                <div class="tools">
                    <a href="?page=company&edit-company=<?= $company[$i]['company_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                    <span id="<?= $company[$i]['company_id'] ?>" class="delete" data-item-type="company"><i class="fa fa-trash-o"></i></span>
                </div>
            <?php endif ?>
        </header>
        <dl>
            <dt>Phone:</dt>
            <dd><?= $company[$i]['phone'] ?></dd>
            <dt>Mobile:</dt>
            <dd><?= $company[$i]['mobile'] ?></dd>
            <dt>Email:</dt>
            <dd><a href="mailto:<?= $company[$i]['email'] ?>"><?= $company[$i]['email'] ?></a></dd>
            <?php if( $company[$i]['skype'] ) : ?>
                <dt>Skype:</dt>
                <dd><?= $company[$i]['skype'] ?></dd>
            <?php endif ?>
        </dl>
        <address>
            <strong><?= $company[$i]['company_title'] ?></strong><br>
            <div><?= $company[$i]['address_street'] ?></div>
            <div><?= $company[$i]['address_city'] ?>,<?= $company[$i]['address_zip'] ?></div>
            <?php if( isset($company[$i]['address_state']) ) : ?>
                <div><?= $company[$i]['address_state'] ?></div>
            <?php endif ?>
            <?php if( isset($company[$i]['address_additional']) ) : ?>
                <div><?= $company[$i]['address_additional'] ?></div>
            <?php endif ?>
        </address>
    </div>
</div><!-- /.agency -->