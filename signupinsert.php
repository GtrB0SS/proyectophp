<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telef = $_POST['telef'];
$objetivo = $_POST['objetivo'];
$pwd = $_POST['pwd'];
$plan = $_POST['plan'];
$dispo = $_POST['dispo'];
$observaciones = $_POST['observaciones'];

if (strlen($dni) != 9 || preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $dni) !== 1) {
    
    $_SESSION['erroressign']['dni'] = "DNI Incorrecto";
}
else{$_SESSION['signup']['dni'] = $dni;}

if(trim($nombre) == ""){
    $_SESSION['erroressign']['nombre'] = "Nombre Incorrecto";
    
}
else{$_SESSION['signup']['nombre'] = $nombre;}

if(!preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)){
    
    $_SESSION['erroressign']['email'] = "Email Incorrecto";
}
else{$_SESSION['signup']['email'] = $email;}

if(trim($direccion) == ""){
    $_SESSION['erroressign']['direccion'] = "Direccion Incorrecto";
    
}
else{$_SESSION['signup']['direccion'] = $direccion;}


if(!preg_match('/^[9|6|7][0-9]{8}$/', $telef) || strlen($telef) != 9){
    
    $_SESSION['erroressign']['telef'] = "Telefono Incorrecto";
}
else{$_SESSION['signup']['telef'] = $telef;}

if(trim($objetivo) == ""){
    $_SESSION['erroressign']['objetivo'] = "Objetivo Incorrecto";
    
}
else{$_SESSION['signup']['objetivo'] = $objetivo;}

if(trim($pwd) == ""){
    $_SESSION['erroressign']['pwd'] = "Contraseña Incorrecto";
    
}
else{$_SESSION['signup']['pwd'] = $pwd;}

if(trim($plan) == ""){
    $_SESSION['erroressign']['plan'] = "Plan Incorrecto";
    
}
else{$_SESSION['signup']['plan'] = $plan;}

if(trim($dispo) == ""){
    $_SESSION['erroressign']['dispo'] = "Disponibilidad Incorrecta";
    
}
else{$_SESSION['signup']['dispo'] = $dispo;}


$_SESSION['signup']['observaciones'] = $observaciones;

if(isset($_SESSION['erroressign'])){
    header('location: signupform.php');
    
    
}

else{
    
    if($plan == "nutricion"){
        $especialidad = "1";
    }
    if($plan == "entrenamiento"){
        $especialidad = "2";
    }
    else{
        $especialidad = "3";
    }
    
    
    $preparador = selectpreparador($especialidad);
    
    if(!insertCliente($dni, $nombre, $email, $direccion, $telef, $objetivo, $pwd)){
        header('location: error.html');
    }
    
    if(asignarprep($dni, $preparador)){
        
        header('location: error.html');
    }
    
    if(insertPlan($dni, $plan, $dispo, $observaciones)){
        $_SESSION['dni'] = $dni;
        $_SESSION['resLogin'] = "cliente";
        unset($_SESSION['signup']);
        
        header('location: index.php');
    }
    
}