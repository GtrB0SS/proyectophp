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

            if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                $plan = getPlan($_SESSION['dni']);

                if ($plan != null && $plan = "pro") {

                    $linktabla = "tablas.php";
                } else {
                    $linktabla = "ampliarplan.php";
                }

                print(" 
                            <a class='navbar-brand' href='index.php'>Inicio</a>
                            <a class='navbar-brand' href='progreso.php'>Progreso</a>
                            <a class='navbar-brand' href='dietas.php'>Dietas</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                if ($_SESSION['resLogin'] == "empleado") {

                    print("<a class='navbar-brand' href='admin.php'>Administracion</a>");
                }
                print("<a class='navbar-brand' href='logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nueva tabla</h3>
        <form action="gestiontablas.php" method="post">
            <label>Fecha de la tabla:</label>
            <div class="form-group">
                <input type="date" class="form-control" name="fecha" value="<?php
                if (isset($_SESSION['inserttabla']['fecha'])) {
                    print($_SESSION['inserttabla']['fecha']);
                }
                ?>" /><?php
                       if (isset($_SESSION['errorestabla']['fecha'])) {
                           print($_SESSION['errorestabla']['fecha']);
                       }
                       ?>
            </div>

            <label>Tipo de la tabla:</label>
            <div class="form-group">


                <select class="form-control" id="exampleFormControlSelect2" name="tipo" >
                    <?php
                    if (isset($_SESSION['inserttabla']['tipo'])) {
                        print("<option value='0' disabled>Seleccione un cliente</option>");
                    } else {
                        print("<option value='0' disabled selected>Seleccione un cliente</option>");
                    }

                    if (isset($_SESSION['inserttabla']['tipo']) && $_SESSION['inserttabla']['tipo'] == '1') {
                        print("<option value='1' selected>Cardio</option>");
                    } else {
                        print("<option value='1'>Cardio</option>");
                    }

                    if (isset($_SESSION['inserttabla']['tipo']) && $_SESSION['inserttabla']['tipo'] == '2') {
                        print("<option value='2' selected>Musculacion</option>");
                    } else {
                        print("<option value='2'>Musculacion</option>");
                    }


                    if (isset($_SESSION['inserttabla']['tipo'])) {
                        unset($_SESSION['inserttabla']['tipo']);
                    }
                    ?>
                </select>
                <?php
            if (isset($_SESSION['errorestabla']['tipo'])) {
                print($_SESSION['errorestabla']['tipo']);
            }
            ?>
            </div>
            
            <label>Sesiones:</label>

            <select multiple class="form-control" id="exampleFormControlSelect2" name="sesion[]">
                <?php
                $sesiones = getSesiones();

                foreach ($sesiones as $clave => $valor) {
                    if (isset($_SESSION['inserttabla']['sesion'][$clave])) {
                        print("<option value='$clave' selected>$valor</option>");
                    } else {
                        print("<option value='$clave'>$valor</option>");
                    }
                }
                if (isset($_SESSION['inserttabla']['sesion'])) {
                    unset($_SESSION['inserttabla']['sesion']);
                }
                ?>
            </select>

            <?php
            if (isset($_SESSION['errorestabla']['sesion'])) {
                print($_SESSION['errorestabla']['sesion']);
            }
            ?>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar sesion" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="tabla" />
        </form>

        <?php
        if (isset($_SESSION['errorestabla'])) {
            unset($_SESSION['errorestabla']);
        }
        ?>
    </body>
</html>
