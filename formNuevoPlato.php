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
        <h2>Nueva comida</h2>
        <form action="formNuevoPlato.php" method="?">
            <p>Código de plato: <input type="text" name="codigoplato"/></p>
            <p>Nombre: <input type="text" name="nombreplato"/></p>
            <p>Link: <input type="text" name="linkplato"/></p>
            <p><input type="submit"/></p>
        </form>
        <?php
        session_start();
        include "daoMySQL.php";
        
        if(isset($_POST["codigoplato"])){
            $nombre = $_POST["nombreplato"];
            $codigoplato = $_POST["codigoplato"];
            $link = $_POST["linkplato"];
            $resultado = insertPlato($codigoplato, $nombre, $link);
            print($resultado);
        }
        ?>
    </body>
</html>
