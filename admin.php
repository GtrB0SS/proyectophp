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
    <body>
        <div class="container">
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

                print(" <a class='navbar-brand' href='progreso.php'>Progreso</a>
                            <a class='navbar-brand' href='resumen.php'>Resumen</a>
                            
                            <a class='navbar-brand' href='dietas.php'>Dietas</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                if($_SESSION['resLogin'] == "empleado"){

                    print("<a class='navbar-brand' href='index.php'>Inicio</a>");

                }
                print("<a class='navbar-brand' href='logout.php'>Logout</a>");
 
            }
            ?>
            </nav>
        <?php
        
        // Añadir dieta si es nutricionista
        if($_SESSION["especialidad"] == "1" || $_SESSION["especialidad"] == "3"){
            print("<h2>Sección nutricionista:</h2>");
            print("<p><a href='dietas/formAsignarDieta.php'>Asignar Dieta a cliente</a></p>");
            print("<p><a href='dietas/formNuevaDieta.php'>Nueva dieta</a></p>");
            print("<p><a href='dietas/formNuevoDiaDieta.php'>Nuevo dia dieta</a></p>");
            print("<p><a href='dietas/formNuevaComida.php'>Nueva comida</a></p>");
            print("<p><a href='dietas/formNuevoPlato.php'>Nuevo plato</a></p>");
            


        }
        
        // Añadir entrenamiento si es entrenador
        if($_SESSION["especialidad"] == "2" || $_SESSION["especialidad"] == "3"){
            print("<h2>Sección entrenador:</h2>");
            print("<p><a href='formNuevoEjercicio.php'>Nuevo ejercicio</a></p>");
            print("<p><a href='formNuevaTabla.php'>Insertar nueva tabla</a></p>");
            print("<p><a href='#'>Insertar entrenamiento en sesión</a></p>");
            print("<p><a href='#'>Insertar sesión en tabla</a></p>");
        }
        
        ?>
        
            
            <form class="form-inline" action="admin.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="dniInsertado" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        
            <div class="row">
        <?php
        if(isset($_POST["dniInsertado"])){
            $dni = $_POST["dniInsertado"];
            $dietas = getDietas($dni);
            if($dietas != ""){
                print("<div class='col-xl-6 col-xs-6'><h2>Dietas de $dni</h2>");
                print($dietas."</div>");
            }
            
            $tablas = getTablas($dni);
            if($tablas != ""){
                print("<div class='col-xl-6 col-xs-6'><h2>Tablas de $dni</h2>");
                print($tablas."</div>");
            }
            
        }
        ?>
            </div>
        </div>
        
    </body>
</html>
