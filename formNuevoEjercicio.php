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
        <form action="formNuevoEjercicio.php" action="POST">
            <p>Código: <input type="text" name="codigo"/></p>
            <p>Nombre: <input type="text" name="nombre"/></p>
            <p>Series: <input type="number" name="series"/></p>
            <p>Repeticiones: <input type="number" name="repeticiones"/></p>
            <p>Peso: <input type="number" name="peso"/></p>
            <p>Link: <input type="text" name="link"/></p>
            <p><input type="submit"/></p>
        </form>
        <?php
        if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["series"]) && isset($_POST["repeticiones"]) && isset($_POST["peso"]) && isset($_POST["link"])){
            
        }
        ?>
    </body>
</html>