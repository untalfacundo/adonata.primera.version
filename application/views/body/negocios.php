    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li><a href="http://adonata.dev/">Home</a></li>
                <li class="active">Todos los negocios</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->
        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-12 col-sm-12">
                    <section id="results">
                        <header><h2>Todos los negocios</h2></header>
                        <section id="properties" class="display-lines">
                            <?php foreach ($negocios as $data): ?>
                                <div class="property">
                                    <div class="property-image">
                                        <a href="<?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                            <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <header>
                                            <a href="negocio"><h3><?php echo $data['nombre'] ?></h3></a>
                                            <figure><?php echo $data['direccion'] ?></figure>
                                        </header>
                                            <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>?pagina=1"><div class="tag price" style="background-color:green"><?php echo $data['categoria'] ?></div></a>&nbsp;<a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>?pagina=1"><div class="tag price"><?php echo $data['subcategoria'] ?></div></a>
                                        <aside>
                                            <p><?php 
                                            if ($data['infoGral'] == "") {
                                                echo "Sin descripción";
                                            }
                                            else if (strlen($data['infoGral']) >= 59){
                                                echo substr($data['infoGral'], 0, 45)."...";
                                            }
                                            else
                                                echo $data['infoGral']; 
                                                echo "<p></p>";
                                            ?> 
                                            
                                        </aside>
                                        <a href="negocio" class="link-arrow" style="padding-right: 5px;">Más información y comentarios</a>
                                    </div>
                                </div><!-- /.property -->
                            <?php endforeach ?>
                            <!-- Pagination -->
                            <div class="center">
                                <ul class="pagination">
                                    <?php   
                                    if($num_paginas > 1){
                                        for($i=$min; $i<=$max; $i++){
                                            if($pagina == $i)

                                                echo '<li class="active"><a href="'.$url.'?pagina='.$i.'"> '.$i.' </a></li>';

                                            else
                                                echo '<li><a href="'.$url.'?pagina='.$i.'"> '.$i.' </a></li>';
                                        }
                                    } 
                                    ?>
                                </ul><!-- /.pagination-->                                  
                            </div><!-- /.center-->
                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->