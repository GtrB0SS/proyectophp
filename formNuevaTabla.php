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
        
        <h3>Nueva Tabla</h3>
        <form action="gestionTablas.php" method="POST">
            <!-- METER FECHA -->
            <label>Fecha (AAAA-MM-DD):</label>
            <input type="date" name="fecha"/>
            
            <label>Tipo:</label>
            <input type="text" name="tipo"/>
            
            <label>Código de sesión:</label>
            <input type="text" name="codigoSesion"/>
            
            <label>Ejercicios:</label>
            <select multiple class="form-control" id="exampleFormControlSelect2" name="listaEjercicios[]">
                <?php 
                        $ejercicios = getEjercicios();
                    
                        foreach($ejercicios as $clave => $valor){
                            print("<option value='$clave'>$valor</option>");
                        }
                    ?>
                <br>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Continuar" />
                </div>
                <input type="hidden" class="form-control" name="option"  value="ejercicios" />
            </select>
            
        </form>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
