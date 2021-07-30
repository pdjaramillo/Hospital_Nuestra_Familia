<!DOCTYPE html>
<html lang="es-419">

<!-- Aqui se extiende una plantilla que carga los estilos que necesita la página -->

@extends('plantillaprincipalsuperior')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.5/sweetalert2.min.css" integrity="sha512-iuMkf48pM/TdH5DQkNPLWPLIUsVCncQEpuxgcMq/oDmJepdFcu48Wy4MwXggN9WFb4L6rpXQf5YJE/+OXkM1Lw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <i class="fas fa-ambulance fa-3x"></i>
        <div class="container"><a class="navbar-brand logo" href="#">Hospital Nuestra Familia</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{url('inicio')}}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('servicios')}}">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('contacto')}}">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('login')}}">Acceder</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('register')}}">Registro</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info display-4">Inicio de Sesión</h2>
                    <p>Por favor coloque sus credenciales a continuación.</p>
                </div>
                <div id="login-box" class="col-md-12 bg-light">
                    <form id="formlogin" class="form" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input class="form-control item" type="text" name="usuario" id="usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="submit" >Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!--main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Inicio de Sesión</h2>
                    <p>Por favor coloque sus credenciales a continuación.</p>
                </div>
                <form id="formlogin" class="form">
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email"></div>
                    <div class="form-group"><label for="password">Contraseña</label><input class="form-control" type="password" id="password"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Recuerdame</label></div>
                    </div><button class="btn btn-primary btn-block" type="submit">Inicio</button>
                </form>
            </div>
        </section>
    </main-->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <!-- Scripts para el formulario -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.5/sweetalert2.all.min.js" integrity="sha512-APLfsKSrS7+Z8R47XH9lxet67CHYq3S9T6mvFCRhpI4Wpp6sqzopVkk6tOcZVl0VqqumjF15Mzv4U0kl3mtAxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/codigologin.js') }}"></script>
</body>

</html>