<section id="sidebar">
    <header><h3>Account</h3></header>
    <aside>
        <ul class="sidebar-navigation">
            <li class="<?php if( $_GET['page'] == 'profile' && !isset($_GET['edit-person']) ) echo 'active' ?>"><a href="?page=profile"><i class="fa fa-user"></i><span>Profile</span></a></li>
            <?php  if( isset($user['is_admin']) && $user['is_admin'] == 1 || isset($user['account_type']) && $user['account_type'] == 'agent' ) : ?>
                <li class="<?php if( $_GET['page'] == 'my-items' ) echo 'active' ?>"><a href="?page=my-items"><i class="fa fa-home"></i><span>My Properties</span></a></li>
            <?php endif ?>

            <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                <h3>Settings & Widgets</h3>
                <li class="<?php if( $_GET['page'] == 'tools-site-configuration' ) echo 'active' ?>"><a href="?page=tools-site-configuration"><i class="fa fa-wrench"></i><span>Site Configuration</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-search-form' ) echo 'active' ?>"><a href="?page=tools-search-form"><i class="fa fa-search"></i><span>Search Form</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-items' ) echo 'active' ?>"><a href="?page=tools-items"><i class="fa fa-home"></i><span>All Properties</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-item-features' ) echo 'active' ?>"><a href="?page=tools-item-features"><i class="fa fa-check-square-o"></i><span>Features/Amenities</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-persons' ) echo 'active' ?>"><a href="?page=tools-persons"><i class="fa fa-users"></i><span>Users & Agents</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-services' ) echo 'active' ?>"><a href="?page=tools-services"><i class="fa fa-folder"></i><span>Services/Features Blocks</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-testimonials' ) echo 'active' ?>"><a href="?page=tools-testimonials"><i class="fa fa-quote-right"></i><span>Testimonials</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-faq' ) echo 'active' ?>"><a href="?page=tools-faq"><i class="fa fa-question-circle"></i><span>FAQs</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-partners' ) echo 'active' ?>"><a href="?page=tools-partners"><i class="fa fa-male"></i><span>Partners</span></a></li>
                <li class="<?php if( $_GET['page'] == 'tools-text-banner' ) echo 'active' ?>"><a href="?page=tools-text-banner"><i class="fa fa-font"></i><span>Text Banner</span></a></li>
            <?php endif ?>
        </ul>
    </aside>
</section><!-- /#sidebar -->