../daoMySQL<!DOCTYPE html>
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

                if ($plan != null && ($plan = "pro" || $plan = "entrenamiento")) {

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
                print("<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nuevo dia para la dieta</h3>
        <form action="gestiondietas.php" method="post">
            <label>Dia de la dieta:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="dia" placeholder="Dia de la dieta" value="<?php
            if (isset($_SESSION['insertdia']['dia'])) {
                print($_SESSION['insertdia']['dia']);
            }
            ?>" /><?php
                       if (isset($_SESSION['erroresdia']['dia'])) {
                           print($_SESSION['erroresdia']['dia']);
                       }
                       ?>
            </div>
            <label>Calorias del dia:</label>
            <div class="form-group">
                <input type="number" class="form-control" name="calorias" placeholder="Calorias del dia" value="<?php
            if (isset($_SESSION['insertdia']['calorias'])) {
                print($_SESSION['insertdia']['calorias']);
            }
            ?>" /><?php
                       if (isset($_SESSION['erroresdia']['calorias'])) {
                           print($_SESSION['erroresdia']['calorias']);
                       }
                       ?>
            </div>
            <label>Macronutrientes del dia:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="macros" placeholder="Macronutrientes del dia" value="<?php
            if (isset($_SESSION['insertdia']['macros'])) {
                print($_SESSION['insertdia']['macros']);
            }
            ?>" /><?php
                       if (isset($_SESSION['erroresdia']['macros'])) {
                           print($_SESSION['erroresdia']['macros']);
                       }
                       ?>
            </div>
            <label>Comidas:</label>
            
                <!-- MUESTRA TODOS LOS PLATOS DE LA BASE DE DATOS COMO OPTIONES DEL SELECT -->
                <!--<select class="selectpicker" multiple name="plato[]" > -->
                    <select multiple class="form-control" id="exampleFormControlSelect2" name="comida[]">
                    <?php 
                        $comidas = getComidas();
                    
                        foreach($comidas as $clave => $valor){
                            if (isset($_SESSION['insertdia']['comidas'][$clave])) {
                                print("<option value='$clave' selected>$valor</option>");
                                
                            }
                            else{
                                print("<option value='$clave'>$valor</option>");
                            }
                        }
                        if(isset($_SESSION['insertdia']['comidas'])){
                            unset($_SESSION['insertdia']['comidas']);
                        }
                    
                    ?>
                </select>
  
                <?php
                if (isset($_SESSION['erroresdia']['comidas'])) {
                    print($_SESSION['erroresdia']['comidas']);
                }
                ?>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar dia" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="dia" />
        </form>
        <?php
                if (isset($_SESSION['erroresdia'])) {
                    unset($_SESSION['erroresdia']);
                }
                ?>
    </body>
</html>