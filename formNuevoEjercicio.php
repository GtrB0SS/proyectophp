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
        
        ?>
        <form action="insertEjercicio.php" action="POST">
            <p>Nombre: <input type="text" name="nombreEj"/></p>
            <p>Series: <input type="number" name="seriesEj"/></p>
            <p>Repeticiones: <input type="number" name="repeticionesEj"/></p>
            <p>Peso: <input type="number" name="pesoEj"/></p>
            <p>Link: <input type="text" name="linkEj"/></p>
            <p><input type="submit"/></p>
        </form>
        
    </body>
</html>
