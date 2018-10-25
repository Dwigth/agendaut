<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/hover-img.css">
  <link rel="stylesheet" href="./assets\css\index.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->

  <title>Agenda UT</title>
</head>

<body>
  <header class="">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo.png" class="rounded-circle" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link"  id="login" href="#"></a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="dropdown-item btn btn-light" id="login-btn" href="#" data-toggle="modal" data-target="#exampleModal">
            Iniciar sesión </a>
        </span>
      </div>
    </nav>

  </header>

  <br>
  <div class="container">

    <div class="card">
      <div class="card-body">
        <div id="form_container">
          <form id="date_picker" action="http://localhost/agendaut/index.php/welcome/create">
            <div class="form-group">
              <label for="">Lugar</label>
              <select class="form-control" name="" id="places">
                <option value="">Escoga un edificio</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Espacio</label>
              <select class="form-control" name="" id="spaces">
                <option value="">Escoga un espacio</option>
              </select>
            </div>
            <div class="form-group">
              <label>Fecha de cita</label>
              <input class="form-control" type="date" name="" id="date">
            </div>
            <div class="form-group">
              <label for="">Hora inicial de la cita</label>
              <input class="form-control" type="time" id="datetime">
            </div>
            <div class="form-group">
              <label for="">Tiempo aproximado</label>
              <input class="form-control" id="time" type="number" step="0.5" min="0" placeholder="Expresa la cantidad de tiempo con decimales.">
              <small style="color:rgb(170, 170, 170);"> <i> Ej. 2 1/2 horas (dos horas y media) = 2.5 </i></small>
            </div>
            <div id="invitado" class="form-group ">
              <label for="nombre-invitado">Nombre</label>
              <input class="form-control" id="nombre-invitado" type="text">
              <label for="apellido-invitado">Apellidos</label>
              <input class="form-control" id="apellido-invitado" type="text">
              <label for="asunto">Asunto</label>
              <input class="form-control" id="asunto" type="text">
              <label for="empresa">Empresa</label>
              <input class="form-control" id="empresa" type="text">
            </div>
            <br>
            <button class="btn btn-light btn-block" id="btn" type="button">Enviar</button>
            <br>
            <small id="message"></small>
          </form>
        </div>
        <br>
        <div id="spaces_container">
          <!-- contenedor de fotos -->
          <!-- <div id="imagenes" class="d-flex flex-column bd-highlight mb-3">
          </div> -->
          <div id="imagenes" class="d-flex align-content-stretch flex-wrapp">

          </div>
          <!-- <img width="100%" src="http://www.uttab.edu.mx/img/actividades_uni/821_1.png" alt=""> -->
        </div>
      </div>

      <br>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inicio de sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group">
              <label for="">Usuario</label>
              <input class="form-control" type="text" name="" id="user">
            </div>
            <div class="form-group">
              <label for="">Contraseña</label>
              <input class="form-control" type="password" name="" id="password">
            </div>
            <button class="btn btn-light btn-block" id="send" type="button">Login</button>
            <br>
            <small class="text-muted" id="msg"></small>
            <p  class="text-center" >
              <small >El inicio de sesión está habilitado para alumnos y maestros de la UTTAB.</small>
            </p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

  <script type="module" src="./assets/js/app.js"></script>
  <script src="assets\js\jquery-3.3.1.slim.min.js"></script>
  <script src="assets\js\popper.min.js"></script>
  <script src="assets\js\bootstrap.min.js"></script>
  <script src="assets\js\jspdf.min.js"></script>
</body>

</html>