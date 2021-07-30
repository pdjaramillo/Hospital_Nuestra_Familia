<!DOCTYPE html>
<html lang="es-419">

<!-- Aqui se extiende una plantilla que carga los estilos que necesita la página -->

@extends('plantillaprincipalsuperior')

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
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contáctanos</h2>
                    <p>Tu opinión nos interesa. Déjanos saber cualquier inquietud</p>
                </div>
            </div>
            <form method="post">
                <h2 class="text-center">Deja tu opinión</h2>
                <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Nombres"></div>
                <div class="form-group"><input class="form-control is-invalid" type="email" name="email" placeholder="Email"><small class="form-text text-danger">Por favor ingresa un correo correcto.</small></div>
                <div class="form-group"><textarea class="form-control" name="message" placeholder="Mensajes" rows="14"></textarea></div>
                <div class="form-group"><button class="btn btn-primary" type="submit">Enviar</button></div>
            </form>
        </section>
    </main>
</body>
</html>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>