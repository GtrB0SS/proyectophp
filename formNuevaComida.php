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
            include "daoMySQL.php";


            //$_SESSION['dni'] = $_POST['user'];

            if($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado"){

                $plan = getPlan($_SESSION['dni']);

                if($plan != null && $plan = "pro"){

                    $linktabla = "tablas.php";

                }
                else{$linktabla = "ampliarplan.php";}

                print(" 
                            <a class='navbar-brand' href='index.php'>Inicio</a>
                            <a class='navbar-brand' href='progreso.php'>Progreso</a>
                            <a class='navbar-brand' href='dietas.php'>Dietas</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                if($_SESSION['resLogin'] == "empleado"){

                    print("<a class='navbar-brand' href='admin.php'>Administracion</a>");

                }
                print("<a class='navbar-brand' href='logout.php'>Logout</a>");
 
            }
            ?>
            </nav>

        <h3>Nueva Comida</h3>
        <form action="gestiondietas.php" method="post">
            <label>Nombre de la comida:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre de la comida" value="<?php if (isset($_SESSION['insertcomida']['nombre'])) {
            print($_SESSION['insertcomida']['nombre']);
        } ?>" /><?php if (isset($_SESSION['erroresplato']['nombre'])) {
            print($_SESSION['errorescomida']['nombre']);
        } ?>
            </div>
            <label>Link del plato:</label>
            <div class="form-group">
                
                
                <!-- AQUI VA UN SELECT MULTIPLE -->
                
                <?php if (isset($_SESSION['errorescomida']['platos'])) {
            print($_SESSION['errorescomida']['platos']);
        } ?>
            </div>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Signup" />
            </div>
            
            <input type="hidden" class="form-control" name="option"  value="comida" />
        </form>
    </body>
</html>