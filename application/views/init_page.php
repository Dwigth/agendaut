<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/index.css">
  <!-- <link rel="stylesheet" href="./css/bootstrap-grid.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <title>Agenda UT</title>
</head>

<body>
  <header class="">
    <!-- <img src="img/logo.png" alt=""> -->
    <div class="btn_login">
      <a id="login" href="#">
      Iniciar sesión 
      </a>
    </div>

    <div class=""></div>
  </header>
  <br>
  <div class="container">
    <div id="form_container">
      <form id="date_picker" action="http://localhost/agendaut/index.php/welcome/create">
          <div>
              <label for="">Lugar</label>
              <select name="" id="">
                  <option value="">Escoga un edificio</option>
                  <option value="">Edificio 1</option>
              </select>
          </div>
          <div>
              <label for="">Espacio</label>
              <select name="" id="">
                  <option value="">Escoga un espacio</option>
                  <option value="">Sala de usos multiples</option>
              </select>
          </div>
        <div>
            <label>Fecha de cita</label>
            <input type="date" name="" id="date">
        </div>
        <div>
          <label for="">Hora inicial de la cita</label>
          <input type="time" id="datetime">
        </div>
        <div>
            <label for="">Tiempo aproximado</label>
            <input id="time" type="number" step="0.5" min="0" placeholder="Expresa la cantidad de tiempo con decimales.">
            <small style="color:rgb(170, 170, 170);"> <i> Ej. 2 1/2 horas (dos horas y media) = 2.5 </i></small>
        </div>
        
        <br>
        <button id="btn" type="button">Enviar</button>
        <br>
        <small id="message"></small>
      </form>
    </div>
    <br>
    <div id="spaces_container">
        <!-- contenedor de fotos -->
        <img width="100%"  src="http://www.uttab.edu.mx/img/actividades_uni/821_1.png" alt="">
    </div>
  </div>

  <br>
  </div>
  </div>

<!-- <br>
<div class="row">    
<div class="column">
<img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
<img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
<img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
      <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    </div>
    <div class="column">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
      <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    </div>
    <div class="column">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
      <img  src="https://i2.wp.com/thehappening.com/wp-content/uploads/2015/10/catrina-maquillaje.jpg?fit=1024%2C694&ssl=1">
    </div>
</div> -->

  <script src="./assets/js/app.js"></script>
</body>

</html>