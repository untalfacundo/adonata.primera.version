<!-- Page Content -->
<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container" style="margin-top:120px;">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Crear Cuenta</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <header><h1>Crear Cuenta</h1></header>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <h2>Imágen</h2>
                <img src="assets/img/Subway.jpg" style="width: 354px;">
            </div>
            <div class="col-md-4 col-sm-6">
                <h2>Datos</h2>
                <form role="form" id="form-create-account" method="post" action="">
                    <div class="form-group">
                        <label for="form-create-account-full-name">Nombre:</label>
                        <input type="text" class="form-control" id="form-create-account-full-name" required>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="form-create-account-email">Email:</label>
                        <input type="email" class="form-control" id="form-create-account-email" required>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="form-create-account-password">Contraseña:</label>
                        <input type="password" class="form-control" id="form-create-account-password" required>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="form-create-account-confirm-password">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="form-create-account-confirm-password" required>
                    </div><!-- /.form-group -->
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" id="account-type-newsletter" name="account-newsletter">Recibir información
                        </label>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Crear cuenta</button>
                    </div><!-- /.form-group -->
                </form>
                <hr>
                <div class="center">
                    <figure class="note">Haciendo clic en "Crear cuenta" usted esta de acuerdo con los <a href="terms-conditions.html">Términos y condiciones</a></figure>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->