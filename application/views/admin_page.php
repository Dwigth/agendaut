<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adminitración AgendaUT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets\css\index.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->

    </head>

    <body>
        <header class="">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/logo.png" class="rounded-circle" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" id="login" href="#"></a>
                        </li>
                    </ul>
                    <!-- <span class="navbar-text">
          <a class="dropdown-item btn btn-light" id="login-btn" href="#" data-toggle="modal" data-target="#exampleModal">
            Iniciar sesión </a>
        </span> -->
                </div>
            </nav>

        </header>
        <h1 class="text-center">Administracion</h1>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Alumnos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Empresas</a>
                        </li>
                    </ul>

                    <ul class="list-group" style="height:20rem ;overflow-y: scroll">
                        <?php foreach ($citas as $cita):?>
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    <?php echo $cita["matricula"];?>
                                </h5>
                                <small><?php echo $cita["fecha_cita"];?></small>
                            </div>
                            <?php echo "Solicitud ID #". $cita["id_cita"];?>
                        </li>
                        <?php endforeach;?>
                    </ul>

                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Solicitud:</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nombre:</h6>
                        </div>

                        <div class="card-body">
                            Matricula (?):
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning">Confirmar reservación</button>
                            <button class="btn btn-danger">Cancelar reservación</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </body>

    </html>