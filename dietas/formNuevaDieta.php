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
                print("<a class='navbar-brand' href='../ampliarplan.php'>Ampliar plan</a>"
                        . "<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nueva dieta</h3>
        <form action="gestiondietas.php" method="post">
            <label>Semana de la dieta:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="semana" placeholder="Semana de la dieta" value="<?php
            if (isset($_SESSION['insertdieta']['semana'])) {
                print($_SESSION['insertdieta']['semana']);
            }
            ?>" /><?php
                       if (isset($_SESSION['erroresdieta']['semana'])) {
                           print($_SESSION['erroresdieta']['semana']);
                       }
                       ?>
            </div>
            
            <label>Dias:</label>
            
                <!-- MUESTRA TODOS LOS PLATOS DE LA BASE DE DATOS COMO OPTIONES DEL SELECT -->
                <!--<select class="selectpicker" multiple name="plato[]" > -->
                    <select multiple class="form-control" id="exampleFormControlSelect2" name="dia[]">
                    <?php 
                        $dias = getDias();
                    
                        foreach($dias as $clave => $valor){
                            if (isset($_SESSION['insertdieta']['dias'][$clave])) {
                                print("<option value='$clave' selected>$valor</option>");
                                
                            }
                            else{
                                print("<option value='$clave'>$valor</option>");
                            }
                        }
                        if(isset($_SESSION['insertdieta']['dias'])){
                            unset($_SESSION['insertdieta']['dias']);
                        }
                    
                    ?>
                </select>
  
                <?php
                if (isset($_SESSION['erroresdieta']['dias'])) {
                    print($_SESSION['erroresdieta']['dias']);
                }
                ?>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar dieta" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="dieta" />
        </form>
        <?php
                if (isset($_SESSION['erroresdieta'])) {
                    unset($_SESSION['erroresdieta']);
                }
                ?>
    </body>
</html>