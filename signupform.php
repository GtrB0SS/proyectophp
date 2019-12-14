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
                    <form action="signupinsert.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" placeholder="Tu DNI" value="<?php if(isset($_SESSION['signup']['dni'])){print($_SESSION['signup']['dni']);} ?>" /><?php if(isset($_SESSION['erroressign']['dni'])){print($_SESSION['erroressign']['dni']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" value="<?php if(isset($_SESSION['signup']['nombre'])){print($_SESSION['signup']['nombre']);} ?>" /><?php if(isset($_SESSION['erroressign']['nombre'])){print($_SESSION['erroressign']['nombre']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Tu Email" value="<?php if(isset($_SESSION['signup']['email'])){print($_SESSION['signup']['email']);} ?>" /><?php if(isset($_SESSION['erroressign']['email'])){print($_SESSION['erroressign']['email']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="direccion" placeholder="Tu direccion" value="<?php if(isset($_SESSION['signup']['direccion'])){print($_SESSION['signup']['direccion']);} ?>" /><?php if(isset($_SESSION['erroressign']['direccion'])){print($_SESSION['erroressign']['direccion']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telef" placeholder="Tu telefono" value="<?php if(isset($_SESSION['signup']['telef'])){print($_SESSION['signup']['telef']);} ?>" /><?php if(isset($_SESSION['erroressign']['telef'])){print($_SESSION['erroressign']['telef']);} ?>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="objetivo" placeholder="Tu objetivo" value="" ><?php if(isset($_SESSION['signup']['objetivo'])){print($_SESSION['signup']['objetivo']);} ?></textarea><?php if(isset($_SESSION['erroressign']['objetivo'])){print($_SESSION['erroressign']['objetivo']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Tu clave" value="<?php if(isset($_SESSION['signup']['pwd'])){print($_SESSION['signup']['pwd']);} ?>" /><?php if(isset($_SESSION['erroressign']['pwd'])){print($_SESSION['erroressign']['pwd']);} ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Signup" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['erroressign'])){unset($_SESSION['erroressign']);} ?>
    </body>
</html>
