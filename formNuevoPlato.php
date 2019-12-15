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
        
        <h2>Nueva comida</h2>
        <form action="insertPlato.php" method="POST">
            <p>Código de plato: <input type="text" name="codigoplato"/></p>
            <p>Nombre: <input type="text" name="nombreplato"/></p>
            <p>Link: <input type="text" name="linkplato"/></p>
            <p><input type="submit"/></p>
        </form>
        
    </body>
</html>
