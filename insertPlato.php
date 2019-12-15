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
        
        $codigo = $_POST["codigoplato"];
        $nombre = $_POST["nombreplato"];
        $link = $_POST["linkplato"];
        
        $resultado = insertPlato((int)$codigo, $nombre, $link);
        
        if($resultado == 1){
            print("<h4>Plato insertado correctamente</h4>");
            print("<p><a href='index.php'>Volver a pagina principal</a></p>");
        }
        else{
            print("<h4>Error al insertar</h4>");
        }
        
        ?>
    </body>
</html>
