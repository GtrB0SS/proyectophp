
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_unset();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Motofitness</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        if(isset($_SESSION['resLogin']) && $_SESSION['resLogin'] == "Usuario o clave incorrectos"){
            print("Usuario o clave incorrectos");
        }

        ?>
        
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Login Motofitness</h3>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" placeholder="Your user" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Your Password" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

