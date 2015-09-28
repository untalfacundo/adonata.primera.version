<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">
    
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-39195125-1', 'auto');ga('send', 'pageview');</script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">

    <title>Adonata</title>

</head>

<body class="page-homepage navigation-fixed-top page-slider horizontal-search-float" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
<div class="wrapper">

    <div class="navigation">
       <!--<div class="secondary-navigation">
            <div class="container">
                <div class="contact">
                </div>
                <div class="user-area">
                    <a href="<?php echo base_url(); ?>crearcuenta" class="promoted">Crear cuenta</a>
                    <a href="<?php echo base_url(); ?>singin" class="promoted">Ingresar</a>
                </div>
            </div>
        </div>-->
        <div class="container">
            <header class="navbar" id="top" role="banner" style="padding-top: 15px; padding-bottom: 15px;">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="brand"></a>                        
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="has-child" style="padding-right: 10px;"><a href="#">Categorias</a>
                            <ul class="child-navigation">
                                <?php foreach ($getCategorias as $data): ?>
                                <?php
                                    if (strlen($data['categoria']) >= 33) {
                                        echo '<li><a class="has-child" href="'.base_url().$data['slug'].'?pagina=1">'.substr($data['categoria'], 0, 30)."...".'</a></li>';
                                    }
                                    else   
                                        echo '<li><a href="'.base_url().$data['slug'].'?pagina=1">'.$data['categoria'].'</a></li>';
                                ?>    
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <!--<li><a href="<?php echo base_url(); ?>cuenta">Usuario</a></li>-->
                        <!--<li><a href="<?php echo base_url(); ?>contacto">Contacto</a></li>-->
                    </ul>
                </nav><!-- /.navbar collapse-->
                <div class="add-your-property">
                    <a href="https://twitter.com/adonataARG" target="_blank" class="fa fa-twitter btn btn-grey-dark"></a> <!--style="background-color: #55acee"-->
                    <a href="https://www.facebook.com/adonataARG?fref=ts" target="_blank" class="fa fa-facebook btn btn-grey-dark"></a> <!-- style="background-color: #2372a3" -->
                    <a href="<?php echo base_url(); ?>" class="btn btn-default"><i class="fa fa-plus"></i><!--<span class="text">Agregar un negocio</span>--></a>
                </div>
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->
