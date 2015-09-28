    <!-- Slider -->
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <!--<div class="info">
                            <div class="tag price">Adonata.com</div>
                            <h3>Para buscar negocios</h3>
                            <figure>Para buscar negocios</figure>
                        </div>
                        <hr>
                        <a href="negocio" class="link-arrow">Más</a>-->
                    </div>
                </div>
                <img alt="" src="<?php echo base_url(); ?>assets/img/adonataimagen2.png">
            </div>
        </div>
    </div>
    <!-- end Slider -->
    <div class="search-box-wrapper" style="z-index: 98; top: 380px !important;">
        <div class="search-box-inner">
            <div class="container">
                <div class="search-box map" style="margin-bottom: 50px; margin-top: 50px;">
                    <form role="form" id="form-map-sale" class="form-map form-search clearfix" action="<?php echo base_url() ?>" method="GET">
                        <div class="row">
                            <div class="col-md-10 col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="form-imput" name="busqueda" placeholder="">
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </form><!-- /#form-map -->
                </div><!-- /.search-box -->
            </div><!-- /.container -->
        </div><!-- /.search-box-inner -->
        <div class="background-image"><img class="opacity-20" src="<?php echo base_url(); ?>assets/img/searchbox-bg.jpg"></div>
    </div>
    <!-- end Search Box -->

    <!-- Page Content -->
    <div id="page-content">
        <section id="banner">
            <div class="block has-dark-background background-color-default-darker center text-banner">
                <div class="container">
                    <h1 class="no-bottom-margin no-border">Adonata tiene cargados miles de negocios, nos falta el tuyo!</h1>
                </div>
            </div>
        </section><!-- /#banner -->
        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>Encontrá el negocio que buscás</h2>
                    <a href="negocios?pagina=1" class="link-arrow" style="padding-right: 5px;">Todos los negocios</a>
                </header>
                <div class="row">
                    <?php foreach ($sidebar as $data): ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="property">
                                <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                    <div class="property-image">
                                        <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                    </div>
                                    <div class="overlay">
                                        <div class="info">
                                            <div class="tag price"><?php 
                                            if (strlen($data['nombre']) >= 30) {

                                                echo substr($data['nombre'], 0, 28)."...";
                                            }
                                            else
                                                echo $data['nombre'] ?></div>
                                            <h3><?php echo $data['direccion'] ?></h3>
                                        </div>
                                        <ul class="additional-info">
                                            <li>
                                                <header>Sitio web:</header>
                                                <figure><?php 
                                                if ($data['web'] == "") {
                                                    echo "No disponible";
                                                }    
                                                else
                                                    echo $data['web'] ?></figure>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </div><!-- /.property -->
                        </div><!-- /.col-md-3 -->
                    <?php endforeach ?>    
                </div><!-- /.row-->
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
    </div>
    <!-- end Page Content -->