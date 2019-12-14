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

            if(isset($_POST['user']) && isset($_POST['pwd'])){

                login($_POST['user'], $_POST['pwd']);
                $_SESSION['dni'] = $_POST['user'];

                if($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado"){

                    $plan = getPlan($_POST['user']);

                    if($plan != null && $plan = "pro"){

                        $linktabla = "tablas.php";

                    }
                    else{$linktabla = "ampliarplan.php";}

                    print(" 
                                <a class='navbar-brand' href='progreso.php'>Progreso</a>
                                <a class='navbar-brand' href='resumen.php'>Resumen</a>
                                <a class='navbar-brand' href='dietas.php'>Dietas</a>
                                <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                            ");
                    if($_SESSION['resLogin'] == "empleado"){

                        print("<a class='navbar-brand' href='admin.php'>Administracion</a>");

                    }

                }
            }
            else{
                print(" <a class='navbar-brand' href='login.php'>Progreso</a>
                        <a class='navbar-brand' href='login.php'>Resumen</a>
                        <a class='navbar-brand' href='login.php'>LogIn</a>
                        <a class='navbar-brand' href='signup.php'>SignUp</a>
                ");
            }

            ?>
            </nav>
            
        </div>
        
    </body>
</html>
