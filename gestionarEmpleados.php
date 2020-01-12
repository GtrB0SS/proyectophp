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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        include "daoMySQL.php";
        $empleados = getEmpleados();
        ?>
        <div class="container">
            <nav class='navbar navbar-light bg-light row'>
                <?php
                if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {
                    $resumen = "";
                    if ($_SESSION['resLogin'] == "empleado") {
                        $resumen = "de mis clientes";
                    }

                    print("
                            <a class='navbar-brand' href='resumen.php'>Resumen $resumen</a>
                            
                        ");
                    if ($_SESSION['resLogin'] == "empleado") {

                        print("<a class='navbar-brand' href='index.php'>Inicio</a>");
                    }
                    print("<a class='navbar-brand' href='logout.php'>Logout</a>");
                }
                ?>
            </nav>
            <h3>Administración de empleados existentes</h3>
            <form action="formNuevoEmpleado.php" method="post">
                <label>Empleados:</label>
                <div class="form-group">
                    <select required class="form-control" id="exampleFormControlSelect2" name="numeroempleadomod" >
                        <?php
                        print("<option value='-1' disabled selected>Seleccione un empleado</option>");

                        foreach ($empleados as $clave => $valor) {

                            print("<option value='$clave'>$valor</option>");
                        }
                        ?>
                    </select>

                    
                </div>

                <br>
                <label>Acciones:</label>
                <div class="form-group">
                    <select required class="form-control" id="exampleFormControlSelect2" name="accionEmp" >

                        <option value='-1' selected disabled>Seleccione una accion</option>
                        <option value='mod' >Modificar datos del empleado</option>
                        <option value='eliminar' >Eliminar empleado</option>

                    </select>
                </div>

                <br>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Realizar accion" />
                </div>

            </form>
            <p>*Si seleccionas eliminarte, no podras</p>
        </div>
    </body>
</html>
