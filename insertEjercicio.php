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
        
        $nombreEj = $_REQUEST["nombreEj"];
        $seriesEj = $_REQUEST["seriesEj"];
        $repeticionesEj = $_REQUEST["repeticionesEj"];
        $pesoEj = $_REQUEST["pesoEj"];
        $linkEj = $_REQUEST["linkEj"];
        
        $resultadoNuevoEj = nuevoEjercicio($nombreEj, (int)$seriesEj, (int)$repeticionesEj, (int)$pesoEj, $linkEj);
        
        if($resultadoNuevoEj == 1){
            print("<h4>Ejercicio insertado correctamente</h4>");
            print("<p><a href='index.php'>Volver a página principal</a></p>");
        }
        else{
            print("<p>Error al insertar</p>");
            print("<p><a href='index.php'>Volver a página principal</a></p>");
        }
        
        ?>
    </body>
</html>
