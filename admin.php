<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        include "daoMySQL.php";
        
        // Añadir dieta si es nutricionista
        if($_SESSION["especialidad"] == "1" || $_SESSION["especialidad"] == "3"){
            print("<h2>Sección nutricionista:</h2>");
            print("<p><a href='dietaForm.php'>Nueva dieta</a></p>");
        }
        
        // Añadir entrenamiento si es entrenador
        if($_SESSION["especialidad"] == "2" || $_SESSION["especialidad"] == "3"){
            print("<h2>Sección entrenador:</h2>");
            print("<p><a href='formNuevoEjercicio.php'>Nuevo ejercicio</a></p>");
            print("<p><a href='#'>Insertar ejercicio en entrenamiento</a></p>");
            print("<p><a href='#'>Insertar entrenamiento en sesión</a></p>");
            print("<p><a href='#'>Insertar sesión en tabla</a></p>");
        }
        
        ?>
        
        <form action="admin.php" method="POST">
            <p>DNI de cliente: <input type="text" name="dniInsertado"/></p>
            <p><input type="submit"/></p>
        </form>
        
        <?php
        if(isset($_POST["dniInsertado"])){
            $dni = $_POST["dniInsertado"];
            $dietas = getDietas($dni);
            if($dietas != ""){
                print("<h2>Dietas</h2>");
                print($dietas);
            }
        }
        ?>
        
    </body>
</html>
