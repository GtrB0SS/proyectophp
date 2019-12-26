<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Motofitness</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body class="container">
        <?php
        // put your code here
        ?>
        <nav class='navbar navbar-light bg-light row'>
            <?php
            // put your code here
            session_start();
            include "../daoMySQL.php";


            //$_SESSION['dni'] = $_POST['user'];

            if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {

                $plan = getPlan($_SESSION['dni']);

                if ($plan != null && ($plan == "pro" || $plan == "entrenamiento")) {

                    $linktabla = "../tablas.php";
                } else {
                    $linktabla = "../ampliarplan.php";
                }

                print(" 
                            <a class='navbar-brand' href='../index.php'>Inicio</a>
                            <a class='navbar-brand' href='../progreso.php'>Progreso</a>
                            <a class='navbar-brand' href='../dietas.php'>Dietas</a>
                            <a class='navbar-brand' href='$linktabla'>Tabla de ejercicios</a>
                        ");
                if ($_SESSION['resLogin'] == "empleado") {

                    print("<a class='navbar-brand' href='../admin.php'>Administracion</a>");
                }
                print("<a class='navbar-brand' href='../ampliarplan.php'>Ampliar plan</a>"
                        . "<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Nueva dieta</h3>
        <form action="gestiontablas.php" method="post">
            <label>Tus clientes asignados:</label>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="cliente" >
                    <?php
                    $numempleado = $_SESSION['dni'];
                    $clientes = getClientes($numempleado);
                    if (isset($_SESSION['asignar']['cliente'][$clave])) {
                        print("<option value='-1' disabled>Seleccione un cliente</option>");
                    } else {
                        print("<option value='-1' disabled selected>Seleccione un cliente</option>");
                    }
                    foreach ($clientes as $clave => $valor) {
                        if (isset($_SESSION['asignar']['cliente'][$clave])) {
                            print("<option value='$clave' selected>$valor</option>");
                        } else {
                            print("<option value='$clave'>$valor</option>");
                        }
                    }


                    if (isset($_SESSION['asignar']['cliente'])) {
                        unset($_SESSION['asignar']['cliente']);
                    }
                    ?>
                </select>

                    <?php
                    if (isset($_SESSION['erroresasignar']['cliente'])) {
                        print($_SESSION['erroresasignar']['cliente']);
                    }
                    ?>
            </div>
            
            <label>Tablas disponibles:</label>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="tabla">
                    <?php
                    
                    $tablas = getTodasTablas();
                    
                    if (isset($_SESSION['asignar']['tablas']["0"])) {
                        print("<option value='0' disabled>Seleccione una dieta</option>");
                    } else {
                        print("<option value='0' disabled selected>Seleccione una dieta</option>");
                    }
                    
                    foreach ($tablas as $clave => $valor) {
                        if (isset($_SESSION['asignar']['tablas'][$clave])) {
                            print("<option value='$clave' selected>$valor</option>");
                        } else {
                            print("<option value='$clave'>$valor</option>");
                        }
                    }


                    if (isset($_SESSION['asignar']['tablas'])) {
                        unset($_SESSION['asignar']['tablas']);
                    }
                    ?>
                </select>

                    <?php
                    if (isset($_SESSION['erroresasignar']['tablas'])) {
                        print($_SESSION['erroresasignar']['tablas']);
                    }
                    ?>
            </div>
            

            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Asignar tabla" />
            </div>

            <input type="hidden" class="form-control" name="option"  value="asignar" />
        </form>
<?php
if (isset($_SESSION['erroresasignar'])) {
    unset($_SESSION['erroresasignar']);
}
?>
    </body>
</html>