<!-- Page Content -->
<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container" style="margin-top:120px;">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Contacto</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <div class="row">
            <!-- Contact -->
            <div class="col-md-8 col-sm-12 col-md-offset-2">
                <section id="agent-detail">
                    <section id="form">
                        <header><h2>Mandanos un mensaje</h2></header>
                        <form role="form" id="form-contact" name="form-contact" method="post" action="home/enviar_formulario" class="clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-contact-name">Nombre<em>*</em></label>
                                        <input type="text" class="form-control" id="form-contact-name" name="name" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-contact-email">E-mail<em>*</em></label>
                                        <input type="email" class="form-control" id="form-contact-email" name="email" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form-contact-message">Mensaje<em>*</em></label>
                                        <textarea class="form-control" id="form-contact-message" rows="8" name="message" required></textarea>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                            <div class="form-group clearfix">
                                <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">Enviar mensaje</button>
                            </div><!-- /.form-group -->
                            <div id="form-status"></div>
                        </form><!-- /#form-contact -->
                    </section>
                </section><!-- /#agent-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Contact -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->