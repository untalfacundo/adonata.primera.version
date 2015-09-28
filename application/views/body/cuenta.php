<!-- Page Content -->
<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container" style="margin-top:120px;">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="crearcuenta">Crear Cuenta</a></li>
            <li class="active">Cuenta</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <div class="row">
        <!-- sidebar -->
        <div class="col-md-3 col-sm-2">
            <section id="sidebar">
                <h2>Cuenta</h2>
                <aside>
                    <ul class="sidebar-navigation">
                        <li class="active"><a href="cuenta"><i class="fa fa-user"></i><span>Usuario</span></a></li>
                        <li><a href="misnegocios"><i class="fa fa-home"></i><span>Mis negocios</span></a></li>
                    </ul>
                </aside>
            </section><!-- /#sidebar -->
            <section id="about-me">
            <h2>Sobre la cuenta</h2>
            <div class="form-group">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus.
                    Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum.
                </p>
            </div><!-- /.form-group -->
            </section>
        </div><!-- /.col-md-3 -->
        <!-- end Sidebar -->
            <!-- My Properties -->
            <div class="col-md-9 col-sm-10">
                <section id="profile">
                    <header><h2>Perfil</h2></header>
                    <div class="account-profile">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <img alt="" class="image" src="assets/img/Subway.jpg">
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <form role="form" id="form-account-profile" method="post" action="">
                                    <div class="checkbox switch" id="agent-switch" data-agent-state="is-agent">
                                        <label>
                                            Modificar categoría<input type="checkbox">
                                        </label>
                                    </div>
                                    <section id="agency">
                                        <h2>Categoria del negocio</h2>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="account-agency">Seleccione categorías:</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <select name="account-agency" id="account-agency">
                                                        <option value="">Categoria principal</option>
                                                        <option value="1">Alimentación</option>
                                                        <option value="2">Alimentación</option>
                                                        <option value="3">Alimentación</option>
                                                        <option value="4">Alimentación</option>
                                                        <option value="5">Alimentación</option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                    <select name="account-agency" id="account-agency">
                                                        <option value="">Categoria secundaria</option>
                                                        <option value="1">Gastronomia</option>
                                                        <option value="2">Gastronomia</option>
                                                        <option value="3">Gastronomia</option>
                                                        <option value="4">Gastronomia</option>
                                                        <option value="5">Gastronomia</option>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div>
                                    </section>
                                    <section id="contact">
                                        <h2>Información</h2>
                                        <dl class="contact-fields">
                                            <dt><label for="form-account-name">Nombre:</label></dt>
                                            <dd><div class="form-group">
                                                <input type="text" class="form-control" id="form-account-name" name="form-account-name" required value="Jeffrey Scott">
                                            </div><!-- /.form-group --></dd>
                                            <dt><label for="form-account-phone">Teléfono:</label></dt>
                                            <dd><div class="form-group">
                                                <input type="text" class="form-control" id="form-account-phone" name="form-account-phone" value="(123) 456 789">
                                            </div><!-- /.form-group --></dd>
                                            <dt><label for="form-account-email">Email:</label></dt>
                                            <dd><div class="form-group">
                                                <input type="text" class="form-control" id="form-account-email" name="form-account-phone" value="jeffrey.scott@example.com">
                                            </div><!-- /.form-group --></dd>
                                            <dt><label for="form-account-skype">Skype:</label></dt>
                                            <dd><div class="form-group">
                                                <input type="text" class="form-control" id="form-account-skype" name="form-account-skype" value="jeffrey.scott">
                                            </div><!-- /.form-group --></dd>
                                        </dl>
                                    </section>
                                    <section id="about-me">
                                        <h2>Descripción</h2>
                                        <div class="form-group">
                                            <textarea class="form-control" id="form-contact-agent-message" rows="5" name="form-contact-agent-message">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus.
Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum.
                                            </textarea>
                                        </div><!-- /.form-group -->
                                    </section>
                                    <section id="social">
                                        <h2>Redes Sociales</h2>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                                <input type="text" class="form-control" id="account-social-twitter" name="account-social-twitter">
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                                <input type="text" class="form-control" id="account-social-facebook" name="account-social-facebook" >
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group clearfix">
                                            <button type="submit" class="btn pull-right btn-default" id="account-submit">Guardar cambios</button>
                                        </div><!-- /.form-group -->
                                    </section>
                                </form><!-- /#form-contact -->
                                <section id="change-password">
                                    <header><h2>Cambiar contraseña</h2></header>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <form role="form" id="form-account-password" method="post" action="">
                                                <div class="form-group">
                                                    <label for="form-account-password-current">Contraseña actual</label>
                                                    <input type="password" class="form-control" id="form-account-password-current" name="form-account-password-current">
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                    <label for="form-account-password-new">Nueva contraseña</label>
                                                    <input type="password" class="form-control" id="form-account-password-new" name="form-account-password-new">
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                    <label for="form-account-password-confirm-new">Confirmar nueva contraseña</label>
                                                    <input type="password" class="form-control" id="form-account-password-confirm-new" name="form-account-password-confirm-new">
                                                </div><!-- /.form-group -->
                                                <div class="form-group clearfix">
                                                    <button type="submit" class="btn btn-default" id="form-account-password-submit">Cambiar</button>
                                                </div><!-- /.form-group -->
                                            </form><!-- /#form-account-password -->
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <strong>Hint:</strong>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui
                                                vestibulum, bibendum purus sit amet, vulputate mauris.
                                            </p>
                                        </div>
                                    </div>
                                </section>
                            </div><!-- /.col-md-9 -->
                        </div><!-- /.row -->
                    </div><!-- /.account-profile -->
                </section><!-- /#profile -->
            </div><!-- /.col-md-9 -->
            <!-- end My Properties -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->