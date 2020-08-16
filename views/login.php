<div class="row align-items-center justify-content-center" style="height: 100vh;">
    <div class="col-md-6 align-self-center">
        <div class="card">
            <div class="card-header">Iniciar sesión</div>

            <div class="card-body">
                <div class="row justify-content-center mt-3">
                    <i style="font-size: 3rem" class="fas fa-spider"></i>
                </div>
                <div class="row justify-content-center mb-3 mt-3 text-secondary" style="font-family: 'Nunito', sans-serif;font-size: 2rem">
                    Bug Tracker
                </div>
                <form method="post">
                    <div class="form-row mb-3">
                        <div class="input-group col-md-8 offset-md-2">
                            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus placeholder="Correo electrónico">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="input-group col-md-8 offset-md-2">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Contraseña">

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-row justify-content-center mt-3">
                    <div>
                        No tienes cuenta?&nbsp;<a href="/register">Registrate</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>