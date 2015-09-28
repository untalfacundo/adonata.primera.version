<?php
$getPage = '';
$getPage = $_GET['page'];

$formatPage = str_replace(array('-'), ' ' , $getPage);
$page = ucfirst($formatPage);
?>
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="?">Home</a></li>

        <?php if( $getPage == 'item-detail' ) : ?>
            <li><a href="?page=results">Properties</a></li>
        <?php endif ?>

        <?php if( $getPage == 'person-detail' ) : ?>
            <li><a href="?page=persons">Agents</a></li>
        <?php endif ?>

        <?php if( $getPage == 'company-detail' ) : ?>
            <li><a href="?page=companies">Agencies</a></li>
        <?php endif ?>

        <?php if( $getPage == 'person-detail' ) : $person = Db::queryOne('SELECT person_name FROM persons_table WHERE person_id=?', $_GET['person']); ?>
            <li class="active"><?= $person['person_name'] ?></li>
        <?php elseif( $getPage == 'persons' ) : ?>
            <li class="active">Agents</li>
        <?php elseif( $getPage == 'companies' ) : ?>
            <li class="active">Agencies</li>
        <?php elseif( $getPage == 'results' ) : ?>
            <li class="active">Properties</li>
        <?php elseif( $getPage == 'item-detail' ) : $item = Db::queryOne('SELECT title FROM items_table WHERE item_id=?', $_GET['item']); ?>
            <li class="active"><?= $item['title'] ?></li>
        <?php elseif( $getPage == 'company-detail' ) : $company = Db::queryOne('SELECT company_title FROM companies_table WHERE company_id=?', $_GET['company']); ?>
            <li class="active"><?= $company['company_title'] ?></li>
        <?php else : ?>
            <li class="active"><?= $page ?></li>
        <?php endif ?>

    </ol>

</div>
<!-- end Breadcrumb -->