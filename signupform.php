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
            <?php
            session_start();
//        if(isset($_SESSION['resLogin']) && $_SESSION['resLogin'] == "Usuario o clave incorrectos"){
//            print("Usuario o clave incorrectos");
//        }
            ?>

            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Signup Motofitness</h3>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" placeholder="Tu DNI" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Tu Email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="direccion" placeholder="Tu direccion" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telef" placeholder="Tu telefono" value="" />
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="objetivo" placeholder="Tu objetivo" value="" ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Tu clave" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Signup" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
