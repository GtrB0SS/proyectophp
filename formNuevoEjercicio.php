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
        session_start();
        include "daoMySQL.php";
        
        if(isset($_POST["nombre"]) /*&& isset($_POST["nombre"]) && isset($_POST["series"]) && isset($_POST["repeticiones"]) && isset($_POST["peso"]) && isset($_POST["link"])*/){
            
            $nombre = $_POST["nombre"];
            $series = (int)$_POST["series"];
            $repeticiones = (int)$_POST["repeticiones"];
            $peso = (int)$_POST["peso"];
            $link = $_POST["link"];
            
            $resultado = nuevoEjercicio($codigo, $nombre, $series, $repeticiones, $peso, $link);
            print($resultado);
        }
        
        ?>
        <form action="formNuevoEjercicio.php" action="?">
           <!-- <p>Código: <input type="text" name="codigo"/></p>-->
            <p>Nombre: <input type="text" name="nombre"/></p>
            <p>Series: <input type="number" name="series"/></p>
            <p>Repeticiones: <input type="number" name="repeticiones"/></p>
            <p>Peso: <input type="number" name="peso"/></p>
            <p>Link: <input type="text" name="link"/></p>
            <p><input type="submit"/></p>
        </form>
        
    </body>
</html>
