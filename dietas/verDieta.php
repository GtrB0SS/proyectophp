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

        <div class="row">
            <?php
            $dietas = $_SESSION['dietaAVer'];
            $nom = $_SESSION['nomDietaAVer'];
            print("<div class='col-xl-6 col-xs-6'><h2>$nom</h2>");
            print($dietas . "</div>");
            
            unset($_SESSION['dietaAVer']);
            unset($_SESSION['nomDietaAVer']);
            ?>
        </div>
    </body>
</html>