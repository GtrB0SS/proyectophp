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
        <div class="container">
            <nav class='navbar navbar-light bg-light row'>
                <?php
                // put your code here
                session_start();
                include "daoMySQL.php";



                if ($_SESSION['resLogin'] == "cliente" || $_SESSION['resLogin'] == "empleado") {



                    print("
                            <a class='navbar-brand' href='resumen.php'>Resumen</a>
                            
                        ");
                    if ($_SESSION['resLogin'] == "empleado") {

                        print("<a class='navbar-brand' href='admin.php'>Administracion</a>");
                    }
                    print("<a class='navbar-brand' href='logout.php'>Logout</a>");
                }

                if (isset($_POST['accionEmp'])) {
                    $_SESSION['accionEmp'] = $_POST['accionEmp'];

                    $nEmp = $_POST['numeroempleadomod'];

                    if ($_SESSION['accionEmp'] == "eliminar") {

                        if ($nEmp == $_SESSION['dni']) {
                            $_SESSION['nempdelmismo'] = true;
                            header("location: admin.php");
                        }
                        
                        $clientes = getClientes($nEmp);
                        if (!deleteLineaEmp($nEmp)) {
                            header("location: error.html");
                        }

                        if (!deleteEmp($nEmp)) {
                            header("location: error.html");
                        }

                        foreach ($clientes as $dni) {
                            $plan = getPlan($dni);

                            if ($plan == "nutricion") {
                                $especialidad = "1";
                            }
                            if ($plan == "entrenamiento") {
                                $especialidad = "2";
                            } else {
                                $especialidad = "3";
                            }

                            if ($especialidad == "1") {
                                $preparador1 = selectpreparador(1);
                            }
                            if ($especialidad == "2" || $especialidad == "3") {
                                $preparador1 = selectpreparador(1);
                                $preparador2 = selectpreparador(2);

                                if (getEspecialidad($preparador1) == "3") {
                                    unset($preparador2);
                                } else if (getEspecialidad($preparador2) == "3") {
                                    $preparador1 = $preparador2;
                                    unset($preparador2);
                                }
                            }

                            if (isset($preparador2) && $preparador1 != $preparador2) {
                                if (!asignarprep($dni, $preparador1)) {

                                    header('location: error.html');
                                }
                                if (!asignarprep($dni, $preparador2)) {

                                    header('location: error.html');
                                }
                            } else if (!asignarprep($dni, $preparador1)) {

                                header('location: error.html');
                            }
                        }


                        

                        $_SESSION['nempdel'] = true;
                        unset($_SESSION['insertemp']);
                        unset($_SESSION['erroresemp']);
                        unset($_SESSION['accionEmp']);
                    }

                    $datos = getTodosDatosEmp($nEmp);

                    unset($_SESSION['insertemp']);
                    $_SESSION['insertemp']['nemp'] = $nEmp;
                    $_SESSION['insertemp']['nombre'] = $datos['nombre'];
                    $_SESSION['insertemp']['esp'] = $datos['especialidad'];
                    $_SESSION['insertemp']['dni'] = $datos['dni'];
                    $_SESSION['insertemp']['telef'] = $datos['telefono'];
                    $_SESSION['insertemp']['email'] = $datos['email'];
                    $_SESSION['insertemp']['dir'] = $datos['direccion'];
                    $_SESSION['insertemp']['pwd'] = $datos['clave'];
                    $_SESSION['insertemp']['pwdrep'] = $datos['clave'];
                    $_SESSION['insertemp']['privilegios'] = $datos['privilegios'];


                    //Recuperar datos user
                } else {
                    $_SESSION['accionEmp'] = "insertar";
                }
                ?>
            </nav>
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Insertar un empleado</h3>
                    <form action="insertaremp.php" method="post">
                        <label>Nombre del empleado:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['nombre'])) {
                                print($_SESSION['insertemp']['nombre']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['nombre'])) {
                                       print($_SESSION['erroresemp']['nombre']);
                                   }
                                   ?></p>
                        </div>


                        <label>Especialidad del empleado:</label>
                        <select name="esp" class="form-control" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Seleccione un plan</option>
                            <option value="1" <?php
                            if (isset($_SESSION['insertemp']['esp']) && $_SESSION['insertemp']['esp'] == "1") {
                                print('selected');
                            }
                            ?>>Preparador nutricional</option>
                            <option value="2" <?php
                            if (isset($_SESSION['insertemp']['esp']) && $_SESSION['insertemp']['esp'] == "2") {
                                print('selected');
                            }
                            ?>>Preparador fisico</option>
                            <option value="3" <?php
                            if (isset($_SESSION['insertemp']['esp']) && $_SESSION['insertemp']['esp'] == "3") {
                                print('selected');
                            }
                            ?>>Ambas</option>
                        </select>
                        <p style='color: #FF0000;'><?php
                            if (isset($_SESSION['erroresemp']['esp'])) {
                                print($_SESSION['erroresemp']['esp']);
                            }
                            ?></p>



                        <label>DNI del empleado:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" placeholder="DNI del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['dni'])) {
                                print($_SESSION['insertemp']['dni']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['dni'])) {
                                       print($_SESSION['erroresemp']['dni']);
                                   }
                                   ?></p>
                        </div>


                        <label>Telefono del empleado:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telef" placeholder="Telefono del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['telef'])) {
                                print($_SESSION['insertemp']['telef']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['telef'])) {
                                       print($_SESSION['erroresemp']['telef']);
                                   }
                                   ?></p>
                        </div>


                        <label>Email del empleado:</label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['email'])) {
                                print($_SESSION['insertemp']['email']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['email'])) {
                                       print($_SESSION['erroresemp']['email']);
                                   }
                                   ?></p>
                        </div>

                        <label>Direccion del empleado:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dir" placeholder="Direccion del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['dir'])) {
                                print($_SESSION['insertemp']['dir']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['dir'])) {
                                       print($_SESSION['erroresemp']['dir']);
                                   }
                                   ?></p>
                        </div>


                        <label>Contraseña del empleado:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Contraseña del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['pwd'])) {
                                print($_SESSION['insertemp']['pwd']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['pwd'])) {
                                       print($_SESSION['erroresemp']['pwd']);
                                   }
                                   ?></p>
                        </div>


                        <label>Repita la contraseña del empleado:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwdrep" placeholder="Contraseña del empleado" value="<?php
                            if (isset($_SESSION['insertemp']['pwdrep'])) {
                                print($_SESSION['insertemp']['pwdrep']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroresemp']['pwdrep'])) {
                                       print($_SESSION['erroresemp']['pwdrep']);
                                   }
                                   ?></p>
                        </div>


                        <label>Privilegios del empleado:</label>
                        <div class="checkbox">
                            <label><input type="checkbox" value="1" name="privilegios" <?php
                                if (isset($_SESSION['insertemp']['privilegios']) && $_SESSION['insertemp']['privilegios'] == "1") {
                                    print("checked");
                                }
                                ?>> Conceder privilegios de administrador del sistema (Podrá añadir a nuevos empleados)</label>
                        </div>




                        <br>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Guardar datos" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['erroresemp'])) {
            unset($_SESSION['erroresemp']);
        }
        ?>


    </body>
</html>
