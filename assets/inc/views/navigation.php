<!-- Navigation -->
<div class="navigation">
    <div class="secondary-navigation">
        <div class="container">
            <div class="contact">
                <?php if( $config['phone'] ) : ?>
                    <figure><strong>Phone:</strong><?= $config['phone'] ?></figure>
                <?php endif ?>
                <?php if( $config['email'] ) : ?>
                    <figure><strong>Email:</strong><?= $config['email'] ?></figure>
                <?php endif ?>
            </div>
            <div class="user-area">
                <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 ) : ?>
                    <a href="?page=tools-site-configuration" class="promoted">Configuration</a>
                <?php endif ?>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <a href="?page=profile" class="account"><i class="fa fa-user"></i> <strong><?= $user['person_name'] ?></strong></a>
                <?php endif ?>
                <?php if(!isset($_SESSION['user_id'])) : ?>
                    <?php if( $config['enable_registration'] == 1 ) : ?>
                        <a href="?page=create-account" class="promoted"><strong>Register</strong></a>
                    <?php endif ?>
                    <a href="?page=sign-in">Sign In</a>
                <?php endif ?>
                <?php if( isset($user['is_admin']) && $user['is_admin'] == 1 || isset($user['account_type']) && $user['account_type'] == 'agent' ) : ?>
                    <a href="?page=my-items">My Properties</a>
                <?php endif ?>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <a href="?page=logout">Sign Out</a>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="container">
        <header class="navbar" id="top" role="banner">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand nav" id="brand">
                    <a href="?"><img src="assets/img/logo.png" alt="brand"></a>
                </div>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <li class="<?php if( $_GET['page'] == '' ) echo 'active' ?>" ><a href="?">Home</a></li>
                    <li class="<?php if( $_GET['page'] == 'results' ) echo 'active' ?>" ><a href="?page=results">Our Properties</a></li>
                    <li class="<?php if( $_GET['page'] == 'faq' ) echo 'active' ?>" ><a href="?page=faq">FAQ</a></li>
                    <li class="<?php if( $_GET['page'] == 'contact' ) echo 'active' ?>"><a href="?page=contact">Contact</a></li>
                </ul>
            </nav><!-- /.navbar collapse-->
            <?php  if( isset($user['is_admin']) && $user['is_admin'] == 1 || isset($user['account_type']) && $user['account_type'] == 'agent' ) : ?>
                <div class="add-your-property">
                    <a href="?page=submit" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Add Your Property</span></a>
                </div>
            <?php endif ?>
        </header><!-- /.navbar -->
    </div><!-- /.container -->
</div><!-- /.navigation -->
<!-- end Navigation -->