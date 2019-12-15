<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Motofitness</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body class="container">
        <?php
        // put your code here
        ?>
        <nav class='navbar navbar-light bg-light row'>
            <?php
            // put your code here
            session_start();
            include "../daoMySQL.php";


            //$_SESSION['dni'] = $_POST['user'];

            if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                $plan = getPlan($_SESSION['dni']);

                if ($plan != null && ($plan = "pro" || $plan = "entrenamiento")) {

                    $linktabla = "../tablas.php";
                } else {
                    $linktabla = "../ampliarplan.php";
                }

                print(" 
                            <a class='navbar-brand' href='../index.php'>Inicio</a>
                            <a class='navbar-brand' href='../progreso.php'>Progreso</a>
                            <a class='navbar-brand' href='../dietas.php'>Dietas</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                if ($_SESSION['resLogin'] == "empleado") {

                    print("<a class='navbar-brand' href='../admin.php'>Administracion</a>");
                }
                print("<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nueva sesion</h3>
        <form action="gestiontablas.php" method="post">
            <label>Dia de la sesion:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="dia" placeholder="Nombre del ejercicio" value="<?php
                if (isset($_SESSION['insertsesion']['dia'])) {
                    print($_SESSION['insertsesion']['dia']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroressesion']['dia'])) {
                           print($_SESSION['erroressesion']['dia']);
                       }
                       ?>
            </div>

            <label>Ejercicios:</label>

            <select multiple class="form-control" id="exampleFormControlSelect2" name="ejercicio[]">
                <?php
                $ejercicios1 = getEjercicios();

                foreach ($ejercicios1 as $clave => $valor) {
                    if (isset($_SESSION['insertsesion']['ejercicios'][$clave])) {
                        print("<option value='$clave' selected>$valor</option>");
                    } else {
                        print("<option value='$clave'>$valor</option>");
                    }
                }
                if (isset($_SESSION['insertsesion']['ejercicios'])) {
                    unset($_SESSION['insertsesion']['ejercicios']);
                }
                ?>
            </select>

            <?php
            if (isset($_SESSION['erroressesion']['ejercicios'])) {
                print($_SESSION['erroressesion']['ejercicios']);
            }
            ?>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar sesion" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="sesion" />
        </form>

        <?php
        if (isset($_SESSION['erroressesion'])) {
            unset($_SESSION['erroressesion']);
        }
        ?>
    </body>
</html>
