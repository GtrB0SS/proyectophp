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
        <?php

        if ($_SESSION['ncomida'] == 0) {
            $numeroPlato = "primer";
        } else {
            $numeroPlato = "segundo";
        }
        ?> 

        <h3>Inserte el plato del dia <?php print($_SESSION['dia']); ?> para: <?php print($_SESSION['comida']); ?> <?php if ($_SESSION['comida'] != 'desayuno') {
            print("- $numeroPlato plato");
        } ?>  </h3>
        <form action="gestiondietas.php" method="post">
            <label>Nombre del plato:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del plato" value="<?php
                if (isset($_SESSION['insertplato']['nombre'])) {
                    print($_SESSION['insertplato']['nombre']);
                }
                ?>" /><p style='color: #FF0000;'><?php
                       if (isset($_SESSION['erroresplato']['nombre'])) {
                           print($_SESSION['erroresplato']['nombre']);
                       }
                       ?></p>
            </div>
            <label>Link del plato:</label>
            <div class="form-group">
                <input type="text" class="form-control" name="link" placeholder="Link del plato" value="<?php
                if (isset($_SESSION['insertplato']['link'])) {
                    print($_SESSION['insertplato']['link']);
                }
                ?>" /><p style='color: #FF0000;'><?php
                       if (isset($_SESSION['erroresplato']['link'])) {
                           print($_SESSION['erroresplato']['link']);
                       }
                       ?></p>
            </div>

            <label>Calorias del plato:</label>
            <div class="form-group">
                <input type="number" class="form-control" name="cal" placeholder="Calorias del plato" value="<?php
                if (isset($_SESSION['insertplato']['cal'])) {
                    print($_SESSION['insertplato']['cal']);
                }
                ?>" /><p style='color: #FF0000;'><?php
                       if (isset($_SESSION['erroresplato']['cal'])) {
                           print($_SESSION['erroresplato']['cal']);
                       }
                       ?></p>
            </div>
            <label>Platos ya creados:</label>

            <!-- MUESTRA TODOS LOS PLATOS DE LA BASE DE DATOS COMO OPTIONES DEL SELECT -->
            <!--<select class="selectpicker" multiple name="plato[]" > -->
            <select class="form-control" id="exampleFormControlSelect2" name="plato">
                <option value='' selected>Seleccione si desea un plato ya creado</option>
                <?php
                $platos = getPlatos();

                foreach ($platos as $clave => $valor) {

                    print("<option value='$clave'>$valor</option>");
                }
                ?>
            </select>

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Insertar plato" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="plato" />
        </form>

        <?php
        if (isset($_SESSION['erroresplato'])) {
            unset($_SESSION['erroresplato']);
        }
        ?>
    </body>
</html>