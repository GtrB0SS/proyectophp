<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MotoFitness</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class='navbar navbar-light bg-light row'>
                <?php
                session_start();
                include "daoMySQL.php";
                if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                    $plan = getPlan($_SESSION['dni']);

                    if ($plan != null && $plan = "pro") {

                        $linktabla = "tablas.php";
                    } else {
                        $linktabla = "ampliarplan.php";
                    }

                    print(" 
                            <a class='navbar-brand' href='index.php'>Inicio</a>
                            <a class='navbar-brand' href='resumen.php'>Resumen</a>
                            <a class='navbar-brand' href='dietas.php'>Dieta</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                    if ($_SESSION['resLogin'] == "empleado") {

                        print("<a class='navbar-brand' href='admin.php'>Administracion</a>");
                    }
                }
                ?>
            </nav>
                <?php
                if (isset($_SESSION['resProgreso']) && $_SESSION['resProgreso'] == "Error en la insercion") {
                    print("Error en la insercion");
                }
                ?>

            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Inserte progreso</h3>
                    <form action="insertprogreso.php" method="post">
                        <div class="form-group">
                            <input type="number" class="form-control" name="peso" placeholder="Tu peso" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="medidas" placeholder="Tus medidas" value="" />
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="fecha" placeholder="Fecha" value="" />
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="img" placeholder="Tu foto" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
