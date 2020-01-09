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
    <body>
        <div class="container">

            <nav class='navbar navbar-light bg-light row'>
                <?php
                // put your code here
                session_start();
                include "daoMySQL.php";


                print(" 
                        <a class='navbar-brand' href='login.php'>LogIn</a>
                        <a class='navbar-brand' href='signupform.php'>SignUp</a>
                ");
                ?>
            </nav>


            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Signup Motofitness</h3>
                    <form action="signupinsert.php" method="post">
                        <label>DNI:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" placeholder="Tu DNI" value="<?php
                            if (isset($_SESSION['signup']['dni'])) {
                                print($_SESSION['signup']['dni']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroressign']['dni'])) {
                                       print($_SESSION['erroressign']['dni']);
                                   }
                            ?></p>
                        </div>
                        <label>Nombre:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" value="<?php
                                   if (isset($_SESSION['signup']['nombre'])) {
                                       print($_SESSION['signup']['nombre']);
                                   }
                            ?>" /><p style='color: #FF0000;'><?php
                            if (isset($_SESSION['erroressign']['nombre'])) {
                                print($_SESSION['erroressign']['nombre']);
                            }
                            ?></p>
                        </div>
                        <label>Email:</label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Tu Email" value="<?php
                            if (isset($_SESSION['signup']['email'])) {
                                print($_SESSION['signup']['email']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroressign']['email'])) {
                                       print($_SESSION['erroressign']['email']);
                                   }
                            ?></p>
                        </div>
                        <label>Direccion:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="direccion" placeholder="Tu direccion" value="<?php
                                   if (isset($_SESSION['signup']['direccion'])) {
                                       print($_SESSION['signup']['direccion']);
                                   }
                            ?>" /><p style='color: #FF0000;'><?php
                                if (isset($_SESSION['erroressign']['direccion'])) {
                                    print($_SESSION['erroressign']['direccion']);
                                }
                                ?></p>
                        </div>
                        <label>Telefono:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telef" placeholder="Tu telefono" value="<?php
                            if (isset($_SESSION['signup']['telef'])) {
                                print($_SESSION['signup']['telef']);
                            }
                            ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroressign']['telef'])) {
                                       print($_SESSION['erroressign']['telef']);
                                   }
                            ?></p>
                        </div>
                        <label>Objetivo:</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="objetivo" placeholder="Tu objetivo" value="" ><?php
                            if (isset($_SESSION['signup']['objetivo'])) {
                                print($_SESSION['signup']['objetivo']);
                            }
                            ?></textarea><p style='color: #FF0000;'><?php
                                    if (isset($_SESSION['erroressign']['objetivo'])) {
                                        print($_SESSION['erroressign']['objetivo']);
                                    }
                                    ?></p>
                        </div>
                        <label>Contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Tu clave" value="<?php
                                    if (isset($_SESSION['signup']['pwd'])) {
                                        print($_SESSION['signup']['pwd']);
                                    }
                                    ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroressign']['pwd'])) {
                                       print($_SESSION['erroressign']['pwd']);
                                   }
                                   ?></p>
                        </div>
                        <label>Repita la contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwdrep" placeholder="Tu clave" value="<?php
                                    if (isset($_SESSION['signup']['pwdrep'])) {
                                        print($_SESSION['signup']['pwdrep']);
                                    }
                                    ?>" /><p style='color: #FF0000;'><?php
                                   if (isset($_SESSION['erroressign']['pwdrep'])) {
                                       print($_SESSION['erroressign']['pwdrep']);
                                   }
                                   ?></p>
                        </div>
                        <label>Plan:</label>
                        <select name="plan" class="form-control" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Seleccione un plan</option>
                            <option value="nutricion" <?php
                                   if (isset($_SESSION['signup']['plan']) && $_SESSION['signup']['plan'] == "nutricion") {
                                       print('selected');
                                   }
                                   ?>>Nutricion</option>
                            <option value="entrenamiento" <?php
                                   if (isset($_SESSION['signup']['plan']) && $_SESSION['signup']['plan'] == "entrenamiento") {
                                       print('selected');
                                   }
                                   ?>>Nutricion+Entrenamiento</option>
                            <option value="pro" <?php
        if (isset($_SESSION['signup']['plan']) && $_SESSION['signup']['plan'] == "pro") {
            print('selected');
        }
        ?>>Pro</option>
                        </select>
                        <p style='color: #FF0000;'><?php
        if (isset($_SESSION['erroressign']['plan'])) {
            print($_SESSION['erroressign']['plan']);
        }
        ?></p>
                        <br>
                        <label>Disponibilidad:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dispo" placeholder="Numero de dias disponibles" value="<?php
        if (isset($_SESSION['signup']['dispo'])) {
            print($_SESSION['signup']['dispo']);
        }
        ?>" /><p style='color: #FF0000;'><?php
        if (isset($_SESSION['erroressign']['dispo'])) {
            print($_SESSION['erroressign']['dispo']);
        }
        ?></p>
                        </div>

                        <label>Observaciones (Alergias, lesiones, etc.):</label>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="observaciones" placeholder="Tu objetivo" value="" ><?php
        if (isset($_SESSION['signup']['observaciones'])) {
            print($_SESSION['signup']['observaciones']);
        }
        ?></textarea>
                        </div>

                        <br>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Signup" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
if (isset($_SESSION['erroressign'])) {
    unset($_SESSION['erroressign']);
}
?>


    </body>
</html>
