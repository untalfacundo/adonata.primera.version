    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li><a href="http://adonata.dev/">Home</a></li>
                <li class="active"><?php echo $this->input->get('busqueda'); ?></li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-12 col-sm-12">
                    <section id="results">
                            <header><h2><?php if ($sinNegocio == TRUE) {
                                echo "No existen resultados para: ".$this->input->get('busqueda');
                            }
                            else
                                echo "Resultados para: ".$this->input->get('busqueda'); ?></h2></header>

                        <section id="properties" class="display-lines">
                            <?php foreach ($getNegocio as $data): ?>
                                <div class="property">
                                    <div class="property-image">
                                        <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                            <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <header>
                                            <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>"><h3><?php echo $data['nombre'] ?></h3></a>
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
                                        <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>" class="link-arrow">Más información y comentarios</a>
                                    </div>
                                </div><!-- /.property -->
                            <?php endforeach ?>
                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->