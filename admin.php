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
            print("<p><a href='dietaForm.php'>Nueva dieta</a></p>");
        }
        
        // Añadir entrenamiento si es entrenador
        if($_SESSION["especialidad"] == "2" || $_SESSION["especialidad"] == "3"){
            print("<p><a href='entrenForm.php'>Nuevo entrenamiento</a></p>");
        }
        
        
        ?>
    </body>
</html>
