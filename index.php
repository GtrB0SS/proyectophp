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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <nav class='navbar navbar-light bg-light row'>
                <?php
                // put your code here
                session_start();
                include "daoMySQL.php";

                if (isset($_POST['user']) && isset($_POST['pwd'])) {

                    login($_POST['user'], $_POST['pwd']);
                    $_SESSION['dni'] = $_POST['user'];

                    if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                        $plan = getPlan($_POST['user']);

                        if ($plan != null && ($plan == "pro" || $plan == "entrenamiento")) {

                            $linktabla = "<a class='navbar-brand' href='tablas.php'>Tabla de ejercicios</a>";
                        } else {
                            $linktabla = "";
                        }

                        if ($_SESSION['resLogin'] == "cliente") {
                            print("<a class='navbar-brand' href='progreso.php'>Progreso</a>");
                        }

                        print(" 
                                
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
                } else if (isset($_SESSION['dni'])) {
                    if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                        $plan = getPlan($_SESSION['dni']);

                        if ($plan != null && ($plan == "pro" || $plan == "entrenamiento")) {

                            $linktabla = "<a class='navbar-brand' href='tablas.php'>Tabla de ejercicios</a>";
                        } else {
                            $linktabla = "";
                        }

                        if ($_SESSION['resLogin'] == "cliente") {
                            print("<a class='navbar-brand' href='progreso.php'>Progreso</a>");
                        }
                        print(" 
                            
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
                } else {
                    print("
                        <a class='navbar-brand' href='login.php'>LogIn</a>
                        <a class='navbar-brand' href='signupform.php'>SignUp</a>
                ");
                }
                ?>
            </nav>
            <br>
            <br>
            <div class="row">

                <?php
                if (isset($_SESSION['dni'])) {
                    if($_SESSION['resLogin'] == "cliente") {
                        $preparadores = getPreparadores($_SESSION['dni']);
                        if ($preparadores['fisico'] == $preparadores['nutricional']) {
                            print("<h4>Tu preparador es " . getDatosEmp($preparadores['fisico']) . "</h4>");
                        } else if (getPlan($_SESSION['dni']) == 'entrenamiento' || getPlan($_SESSION['dni']) == 'pro') {
                            print("<h4>Tu preparador fisico es " . getDatosEmp($preparadores['fisico']) . "</h4>");
                        }
                        if ($preparadores['fisico'] != $preparadores['nutricional']) {
                            print("<h4>Tu preparador nutricional es " . getDatosEmp($preparadores['nutricional']) . "</h4>");
                        }
                    }
                }
                ?>

            </div>

        </div>

    </body>
</html>
