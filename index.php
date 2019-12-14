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
        
        if(isset($_POST['user']) && isset($_POST['pwd'])){
            
            
            login($_POST['user'], $_POST['pwd']);
            
            if($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado"){
                
                
                
            }
            
            if($_SESSION['resLogin'] == "empleado"){
                
                
                
            }
            
        }
        
        ?>
    </body>
</html>
