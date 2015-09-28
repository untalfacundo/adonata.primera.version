<?php
$item = Db::queryAll('SELECT item_id, title, city, price, image FROM items_table ORDER BY date_created DESC LIMIT 3');
?>
<!-- sidebar -->
<div class="col-md-3 col-sm-3">
    <section id="sidebar">
        <aside id="edit-search">
            <header><h3>Search Properties</h3></header>
            <?php include_once($includePath.'views/search_form.php'); ?>
        </aside><!-- /#edit-search -->
            <aside id="recent-properties">
            <header><h3>Recent Properties</h3></header>
            <?php for($i=0; $i<$config['sidebar_items_number']; $i++) : ?>
                <?php if( $item ) : ?>
                    <?php include($includePath.'views/single_item_small.php'); ?>
                <?php endif ?>
            <?php endfor ?>
        </aside><!-- /#featured-properties -->
    </section><!-- /#sidebar -->
</div><!-- /.col-md-3 -->
<!-- end Sidebar -->