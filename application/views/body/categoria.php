    <!-- Page Content -->
    <div id="page-content">
        <?php
            $categoria = $this->uri->segment(1);

            foreach ($anunciosCategoria as $key => $data)
                if ($data['slugC'] == $categoria) $nombre = $data['categoria'];

            $pedazos = explode('-', $categoria);
            unset($pedazos[0]);
            $categoria = implode(' ', $pedazos);
        ?> 
        <!-- Breadcrumb -->
        <div class="container" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active"><?php echo $nombre ?></li>
            </ol>
        </div>
        <!-- end Breadcrumb -->
        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                            <header><h2><?php echo $nombre ?></h2></header>                        
                        <section id="properties" class="display-lines">
                            <?php foreach ($anunciosCategoria as $data): ?>
                                <div class="property">
                                    <div class="property-image">
                                        <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                            <img alt="" src="<?php echo base_url(); ?>assets/img/Subway.jpg">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <header>
                                            <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>"><h3><?php
                                            if (strlen($data['nombre']) >= 40) {
                                                echo substr($data['nombre'], 0, 35)."...";
                                            }
                                            else
                                                echo $data['nombre'] ?></h3></a>
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
                                        <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>" class="link-arrow" style="padding-right: 5px;">Más información y comentarios</a>
                                    </div>
                                </div><!-- /.property -->
                            <?php endforeach ?>
                                <div class="center">
                                    <ul class="pagination">
                                        <?php 
                                            $categoria = $this->uri->segment(1);

                                            if($num_paginas > 1){
                                                for($i=$min; $i<=$max; $i++){
                                                    if($pagina == $i)

                                                        echo '<li class="active"><a href="'.$url.'?pagina='.$i.'"> '.$i.' </a></li>';

                                                    else    
                                                        echo '<li><a href="'.$url.'?pagina='.$i.'"> '.$i.' </a></li>';
                                                }
                                            } 
                                        ?>
                                    </ul>
                                </div>   
                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->
                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h2>Más subcategorías</h2></header>
                            <form role="form" id="form-sidebar" class="form-search" action="<?php echo base_url() ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>?pagina=1" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                                    <select name="subcategoria">
                                        <option value="">Subcategoria</option>
                                        <?php foreach ($getSubcategoria as $key => $opcio): ?>
                                            <option value="<?php echo $opcio['slug'] ?>" ><?php echo $opcio['subcategoria'] ?></option>
                                        <?php endforeach ?>
                                        <!-- CREAR EL MODELO PARA LA SUBCATEGORIA-->
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                        <aside id="otros-negocios">
                            <header><h2>Otros negocios</h2></header>
                            <?php foreach ($anunciosLimitados as $data): ?>
                            <div class="property small">
                                <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/Subway.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="<?php echo base_url(); ?><?php echo $data['slugC'] ?>/<?php echo $data['slugS'] ?>/<?php echo $data['slugA']; ?>"><h4>
                                        <?php 
                                            if (strlen($data['nombre']) >= 25) {                                                
                                            echo substr($data['nombre'], 0, 19)."...";
                                            }
                                            else 
                                            echo $data['nombre'] 
                                        ?></h4></a>
                                    <figure><?php echo $data['direccion'] ?></figure>
                                    <div class="tag price" style="background-color:green;">
                                        <?php 
                                            if (strlen($data['categoria']) >= 20) {
                                            echo substr($data['categoria'], 0, 19)."...";
                                            }
                                            else
                                            echo $data['categoria']    
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
