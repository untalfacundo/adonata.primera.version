<section id="properties">
    <div class="row">
        <?php for($i=0; $i<count($item); $i++) : ?>
            <?php include('single_item_grid.php'); ?>
            <?php if( !isset($_GET['person']) ) if( !isset($_GET['company']) ) if($config['display_ad_after_row']) if($i == $config['display_ad_after_row']) : ?>
                <section id="advertising" class="col-md-12">
                    <a href="submit.html">
                        <div class="banner">
                            <div class="wrapper">
                                <span class="title">Do you want your property to be listed here?</span>
                                <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                            </div>
                        </div><!-- /.banner-->
                    </a>
                </section><!-- /#adveritsing-->
            <?php endif ?>
        <?php endfor ?>
    </div><!-- /.row-->
</section><!-- /#properties-->