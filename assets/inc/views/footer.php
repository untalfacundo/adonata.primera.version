<?php
$item = Db::queryAll('SELECT item_id, title, city, price, image FROM items_table ORDER BY date_created DESC LIMIT ?', $config['footer_items_number']);
$footerLinks = Db::queryAll('SELECT url, title FROM footer_links_table');
?>
<!-- Page Footer -->
<footer id="page-footer">
    <div class="inner">
        <section id="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <article>
                            <h3>About Us</h3>
                            <p><?= $config['about_us'] ?></p>
                            <!--<hr>-->
                            <!--<a href="#" class="link-arrow">Read More</a>-->
                        </article>
                    </div><!-- /.col-sm-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article>
                            <h3>Recent Properties</h3>
                            <?php for($i=0; $i<count($item); $i++) : ?>
                                <?php if( !empty($item) ) : ?>
                                    <?php include($includePath.'views/single_item_small.php'); ?>
                                <?php endif ?>
                            <?php endfor ?>
                        </article>
                    </div><!-- /.col-sm-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article>
                            <h3>Contact</h3>
                            <address>
                                <strong><?= $config['site_title'] ?></strong><br>
                                <div><?= $config['address_street'] ?></div>
                                <div><?= $config['address_city'] ?>,<?= $config['address_zip'] ?></div>
                                <?php if( $config['address_state'] ) : ?>
                                    <div><?= $config['address_state'] ?></div>
                                <?php endif ?>
                                <?php if( $config['address_additional'] ) : ?>
                                    <div><?= $config['address_additional'] ?></div>
                                <?php endif ?>
                            </address>
                            <div><?= $config['phone'] ?></div>
                            <div><a href="<?= $config['email'] ?>"><?= $config['email'] ?></a></div>
                        </article>
                    </div><!-- /.col-sm-3 -->
                    <div class="col-md-3 col-sm-3">
                        <article>
                            <h3>Useful Links</h3>
                            <ul class="list-unstyled list-links">
                                <?php for($i=0; $i<count($footerLinks); $i++) : ?>
                                    <li><a href="?page=<?= $footerLinks[$i]['url'] ?>"><?= $footerLinks[$i]['title'] ?></a></li>
                                <?php endfor ?>
                            </ul>
                        </article>
                    </div><!-- /.col-sm-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#footer-main -->
        <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->

        <section id="footer-copyright">
            <div class="container">
                <span>Copyright © 2014. All Rights Reserved.</span>
                <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
            </div>
        </section>
    </div><!-- /.inner -->
</footer>
<!-- end Page Footer -->
</div>
<!-- end Wrapper -->

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="assets/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="assets/js/infobox.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/fileinput.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/scrollReveal.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.raty.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="assets/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="assets/js/tmpl.js"></script>
<script type="text/javascript" src="assets/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="assets/js/draggable-0.1.js"></script>
<script type="text/javascript" src="assets/js/jquery.slider.js"></script>
<script type="text/javascript" src="assets/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.nicefileinput.min.js"></script>
<script type="text/javascript" src="assets/js/custom-map.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/search-form.js"></script>

<?php include_once($includePath.'footer_map_scripts.php'); ?>

<?php // Footer Thumbnails ---------------------------------------------------------------------------------?>
<?php if( $config['show_footer_thumbnails'] == 1 ) : ?>
<script>
    var maxItems = 20; // Maximum items in the footer (enhances loading time)
        $.ajax({
            url: 'load_items.php',
            type: 'POST',
            data: { action: 'load_footer_items', limit: maxItems },
            dataType: 'json',
            cache: true,
            success: function(data) {
                drawFooterThumbnails(data);
            }
        });
</script>
<?php endif ?>

</body>
</html>