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

                if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {


                    if ($_SESSION['resLogin'] == "cliente") {
                        print("<a class='navbar-brand' href='progreso.php'>Progreso</a>");
                    }
                    print("
                            <a class='navbar-brand' href='resumen.php'>Resumen</a>");
                        if ($_SESSION['resLogin'] == "cliente") {
                            print("<a class='navbar-brand' href='dietas.php'>Dietas</a>");
                        }
                            
                           print(" <a class='navbar-brand' href='index.php'>Inicio</a>
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
                // put your code here


                print(getTablas($_SESSION['dni']));
                ?>
        </div>
    </body>
</html>
