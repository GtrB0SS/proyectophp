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

                    $linktabla = "<a class='navbar-brand' href='../tablas.php'>Tabla de ejercicios</a>";
                } else {
                    $linktabla = "";
                }

                print(" 
                            <a class='navbar-brand' href='../index.php'>Inicio</a>
                            
                            $linktabla
                        ");
                if ($_SESSION['resLogin'] == "empleado") {

                    print("<a class='navbar-brand' href='../admin.php'>Administracion</a>");
                }
                print("<a class='navbar-brand' href='../logout.php'>Logout</a>");
            }
            ?>
        </nav>

        <h3>Asignar dieta a cliente</h3>
        <form action="gestionVisualizarBindearDieta.php" method="post">
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

                <p style='color: #FF0000;'> <?php
                    if (isset($_SESSION['erroresasignar']['cliente'])) {
                        print($_SESSION['erroresasignar']['cliente']);
                    }
                    ?></p>
            </div>

            <label>Dietas disponibles:</label>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect2" name="dieta">
                    <?php
                    $dietas = getTodasDietas();
                    if (isset($_SESSION['asignar']['dieta']["0"])) {
                        print("<option value='0' disabled>Seleccione una dieta</option>");
                    } else {
                        print("<option value='0' disabled selected>Seleccione una dieta</option>");
                    }

                    foreach ($dietas as $clave => $valor) {
                        if (isset($_SESSION['asignar']['dieta'][$clave])) {
                            print("<option value='$clave' selected>$valor</option>");
                        } else {
                            print("<option value='$clave'>$valor</option>");
                        }
                    }


                    if (isset($_SESSION['asignar']['dieta'])) {
                        unset($_SESSION['asignar']['dieta']);
                    }
                    ?>
                </select>
                <p style='color: #FF0000;'>
                    <?php
                    if (isset($_SESSION['erroresasignar']['dieta'])) {
                        print($_SESSION['erroresasignar']['dieta']);
                    }
                    ?></p>
            </div>


            <br>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Asignar dieta" />
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