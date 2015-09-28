
    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Detalles del negocio</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="property-detail">
                            <div class="row">                                
                                <div class="col-md-4 col-sm-12">
                                    <?php foreach ($getNegocio as $data): ?>
                                        <section id="quick-summary" class="clearfix">
                                            <header class="property-title" style="margin-bottom: 25px;">
                                                <h2 style="color: green;"><?php echo $data['nombre'] ?></h2>                                                
                                            </header>
                                            <dl>
                                                <dt>Provincia:</dt>
                                                    <dd><?php echo $data['provincia'] ?></dd>
                                                <dt>Localidad:</dt>
                                                    <dd><?php echo $data['localidad'] ?></dd>
                                                <dt>Dirección:</dt>
                                                    <dd><?php echo $data['direccion'] ?></dd>
                                                <dt>Web:</dt>
                                                    <dd> <?php
                                                        if ($data['web'] == "") 
                                                            echo "No disponible";
                                                        else
                                                            echo '<a target="_blank" href="http://'.$data['web'].'">'.$data['web'].'</a>'; 
                                                        ?>
                                                    </dd>    
                                                <dt>Teléfono:</dt>
                                                    <dd><?php
                                                            $digitos = (strlen($data['caracteristica'].'-'.$data['telefono']));
                                                            if ($digitos <= "30") {
                                                                echo $data['caracteristica'] ?> - <?php echo $data['telefono'];
                                                            }     
                                                            else     
                                                                echo '</br><center>'.$data['caracteristica'].'-'.$data['telefono'].'</center>'; 
                                                        ?>
                                                    </dd>
                                                <dt>Servicios:</dt>
                                                    <dd><?php 
                                                        if ($data['servicios'] == "") {
                                                            echo "No disponible";
                                                        }
                                                        $digitos = (strlen($data['servicios']));
                                                        if ($digitos <= "22") 
                                                            echo $data['servicios'];
                                                        else
                                                            echo "</br>", "<center>", $data['servicios'], "</center>";    
                                                        ?>
                                                    </dd>
                                            </dl>
                                        </section><!-- /#quick-summary --> 
                                    <!--<section id="property-features">
                                        <header><h2>Horarios</h2></header>
                                        <dl>
                                            <dt>Lunes:</dt>
                                                <dd>07:00 a 22:00 hs</dd>
                                            <dt>Martes:</dt>
                                                <dd>07:00 a 22:00 hs</dd>
                                            <dt>Miércoles:</dt>
                                                <dd>07:00 a 22:00 hs</dd>
                                            <dt>Jueves:</dt>
                                                <dd>07:00 a 22:00 hs</dd>
                                            <dt>Viernes:</dt>
                                                <dd>07:00 a 22:00 hs</dd>
                                            <dt>Sábado:</dt>
                                                <dd>05:00 a 22:00 hs</dd>
                                            <dt>Domingo:</dt>
                                                <dd>05:00 a 22:00 hs</dd>
                                        </dl>
                                    </section>--><!-- /#property-features -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-12">
                                    <section id="description">
                                        <header class="property-title"><h2>Descripción</h2>                                           
                                        </header>
                                        <p>
                                            <?php echo $data['infoGral'] ?>
                                        </p>
                                    </section><!-- /#description -->
                                     <section id="property-gallery">
                                        <div class="owl-carousel property-carousel">
                                            <div class="property-slide">
                                                <a href="#" class="image-popup">
                                                    <div class="overlay"><h3><?php echo $data['nombre'] ?></h3></div>
                                                    <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                                </a>
                                            </div><!-- /.property-slide -->
                                        </div><!-- /.property-carousel -->
                                    </section>
                                    <?php endforeach ?>
                                </div><!-- /.col-md-8 -->
                                <!--BANNER-->
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <center><ins class="adsbygoogle"
                                    style="display:inline-block;width:728px;height:90px"
                                    data-ad-client="ca-pub-6793681896930981"
                                    data-ad-slot="1676380557"></ins></center>
                                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                                <!--BANNER--> 
                                <div class="col-md-12 col-sm-12">
                                    <?php foreach ($getNegocio as $data): ?>
                                        <section id="property-map">                                            
                                            <?php   
                                            $longitud   = $data['lng'];
                                            $latitud    = $data['lat'];

                                            if ($longitud == 0) {
                                                echo " ";
                                            }
                                            else
                                                echo '<header><h2>Mapa</h2></header><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6569.641884622113!2d'.$longitud.'!3d'.$latitud.'!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1412875785982" width="100%" height="450" frameborder="0" style="border:0"></iframe>';
                                            ?>
                                        </section><!-- /#property-map -->
                                    <?php endforeach ?>                                    
                                </div><!-- /.col-md-12 -->
                                <!--BANNER-->
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>                             
                                <center><ins class="adsbygoogle"
                                     style="display:inline-block;width:728px;height:15px"
                                     data-ad-client="ca-pub-6793681896930981"
                                     data-ad-slot="4629846959"></ins></center>
                                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                                <!--BANNER-->
                            </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->
                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="otros-negocios">
                            <header><h2>Otros negocios</h2></header>
                            <!--BANNER-->
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <center><ins class="adsbygoogle"
                             style="display:inline-block;width:300px;height:250px; margin-bottom:30px;"
                             data-ad-client="ca-pub-6793681896930981"
                             data-ad-slot="1536779757"></ins></center>
                             <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                             <!--BANNER--> 
                                <?php foreach ($anunciosLimitados as $data): ?>
                                    <div class="property small">
                                        <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                            <div class="property-image">
                                                <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                            </div>
                                        </a>
                                        <div class="info">
                                            <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                                <h4>
                                                    <?php if (strlen($data['nombre']) >= 19) 
                                                        {
                                                            echo substr($data['nombre'], 0, 17)."...";
                                                        }
                                                        else
                                                            echo $data['nombre'];
                                                    ?>
                                                </h4>
                                            </a>
                                            <figure><?php echo $data['direccion'] ?></figure>
                                            <div class="tag price" style="background-color:green;">
                                                <?php if (strlen($data['categoria']) >= 20)
                                                    {
                                                        echo substr($data['categoria'], 0, 17)."...";
                                                    }
                                                    else
                                                        echo $data['categoria']; 
                                                ?>
                                            </div>
                                        </div>
                                    </div><!-- /.property -->                                    
                                <?php endforeach ?>                                
                        </aside><!-- /#featured-properties -->                        
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->