<div class="row align-items-center justify-content-center" style="height: 100vh;">
    <div class="col-md-6 align-self-center">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                Regístrate
                <a href="login">Iniciar sesión</a>
            </div>

            <div class="card-body">
                <div class="row justify-content-center mt-3">
                    <i style="font-size: 3rem" class="fas fa-spider"></i>
                </div>
                <div class="row justify-content-center mb-3 mt-3 text-secondary" style="font-family: 'Nunito', sans-serif;font-size: 2rem">
                    Bug Tracker
                </div>

                <?php $form = \app\core\form\Form::begin('', 'post') ?>
                <?php echo $form->field('name', 'fas fa-signature', $model, 'Nombre') ?>
                <?php echo $form->field('email', 'fas fa-at', $model, 'Correo Electrónico', 'email') ?>
                <?php echo $form->field('password', 'fas fa-key', $model, 'Contraseña', 'password') ?>
                <?php echo $form->field('password_confirmation', 'fas fa-key', $model, 'Confirmar contraseña', 'password') ?>
                <div class="form-group row mb-3">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            Registrarse
                        </button>
                    </div>
                </div>
                <?php echo \app\core\form\Form::end() ?>
            </div>
        </div>
    </div>
</div>