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

                    if ($plan != null && ($plan == "pro" || $plan == "entrenamiento")) {

                        $linktabla = "<a class='navbar-brand' href='tablas.php'>Tabla de ejercicios</a>";
                    } else {
                        $linktabla = "";
                    }



                    print(" 
                            <a class='navbar-brand' href='index.php'>Inicio</a>
                            <a class='navbar-brand' href='resumen.php'>Resumen</a>");
                        if ($_SESSION['resLogin'] == "cliente") {
                            print("<a class='navbar-brand' href='dietas.php'>Dietas</a>");
                        }
                            
                           print(" $linktabla
                        ");
                    if ($_SESSION['resLogin'] == "empleado") {

                        print("<a class='navbar-brand' href='admin.php'>Administracion</a>");
                    }
                    if ($_SESSION['resLogin'] == "cliente") {
                        print("<a class='navbar-brand' href='ampliarplan.php'>Ampliar plan</a>"
                                . "<a class='navbar-brand' href='logout.php'>Logout</a>");
                    } else {
                        print("<a class='navbar-brand' href='logout.php'>Logout</a>");
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
                    <form action="insertprogreso.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="number" class="form-control" name="peso" placeholder="Tu peso" value="" /><?php if (isset($_SESSION['erroresProgreso']['peso'])) print("<p style='color: #FF0000;'>" . $_SESSION['erroresProgreso']['peso'] . "</p>"); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="medidas" placeholder="Tus medidas Cuello/Cadera/Cintura" value="" /><?php if (isset($_SESSION['erroresProgreso']['medidas'])) print("<p style='color: #FF0000;'>" . $_SESSION['erroresProgreso']['medidas'] . "</p>"); ?>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="img" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Subir progreso" />
                        </div>

                    </form>
                </div>
            </div>
            <?php
            if (isset($_SESSION['erroresProgreso'])) {
                unset($_SESSION['erroresProgreso']);
            }
            ?>
        </div>
    </body>
</html>
