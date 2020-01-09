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

                if ($plan != null && ($plan == "pro" || $plan == "entrenamiento")) {

                            $linktabla = "<a class='navbar-brand' href='../tablas.php'>Tabla de ejercicios</a>";
                        } else {
                            $linktabla = "";
                        }

                print(" 
                            <a class='navbar-brand' href='../index.php'>Inicio</a>
                            
                             $linktabla 
                        ");
                if ($_SESSION['resLogin'] == "empleado") {

                    print("<a class='navbar-brand' href='../admin.php'>Administracion</a>");
                }
                print("<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nuevo Ejercicio</h3>
        <form action="gestiontablas.php" method="post">
            <label>Nombre del ejercicio:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del ejercicio" value="<?php
                if (isset($_SESSION['insertejercicio']['nombre'])) {
                    print($_SESSION['insertejercicio']['nombre']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroresejercicio']['nombre'])) {
                           print($_SESSION['erroresejercicio']['nombre']);
                       }
                       ?>
            </div>

            <label>Series:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="series" placeholder="Series del ejercicio" value="<?php
                if (isset($_SESSION['insertejercicio']['series'])) {
                    print($_SESSION['insertejercicio']['series']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroresejercicio']['series'])) {
                           print($_SESSION['erroresejercicio']['series']);
                       }
                       ?>
            </div>

            <label>Repeticiones:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="repeticiones" placeholder="Repeticiones del ejercicio" value="<?php
                if (isset($_SESSION['insertejercicio']['repeticiones'])) {
                    print($_SESSION['insertejercicio']['repeticiones']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroresejercicio']['repeticiones'])) {
                           print($_SESSION['erroresejercicio']['repeticiones']);
                       }
                       ?>
            </div>
            
            <label>Peso:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="peso" placeholder="Peso del ejercicio" value="<?php
                if (isset($_SESSION['insertejercicio']['peso'])) {
                    print($_SESSION['insertejercicio']['peso']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroresejercicio']['peso'])) {
                           print($_SESSION['erroresejercicio']['peso']);
                       }
                       ?>
            </div>

            <label>Link del ejercicio:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="link" placeholder="Link del ejercicio" value="<?php
                if (isset($_SESSION['insertejercicio']['link'])) {
                    print($_SESSION['insertejercicio']['link']);
                }
                ?>" /><?php
                       if (isset($_SESSION['erroresejercicio']['link'])) {
                           print($_SESSION['erroresejercicio']['link']);
                       }
                       ?>
            </div>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar ejercicio" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="ejercicio" />
        </form>

        <?php
        if (isset($_SESSION['erroresejercicio'])) {
            unset($_SESSION['erroresejercicio']);
        }
        ?>
    </body>
</html>
