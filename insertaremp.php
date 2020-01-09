<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

//Atributos
$nemp = $_POST['nemp']; //Comprobar si existe
$esp = $_POST['esp']; //Verificado
$nombre = $_POST['nombre']; //Verificado
$dni = $_POST['dni']; //Verificado
$telef = $_POST['telef']; //Verificado
$email = $_POST['email']; //Verificado
$direccion = $_POST['dir']; //Verificado
$pwd = $_POST['pwd']; //Verificado
$pwdrep = $_POST['pwdrep']; //Verificado
$privilegios = $_POST['privilegios']; //Verificado


if (strlen($dni) != 9 || preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $dni) !== 1) {

    $_SESSION['erroresemp']['dni'] = "DNI Incorrecto";
} else {
    $_SESSION['insertemp']['dni'] = $dni;
}

if (!preg_match('/^[a-zA-Z]+$/', $nombre) || trim($nombre) == "") {
    $_SESSION['erroresemp']['nombre'] = "Nombre Incorrecto";
} else {
    $_SESSION['insertemp']['nombre'] = $nombre;
}

if (!preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {

    $_SESSION['erroresemp']['email'] = "Email Incorrecto";
} else {
    $_SESSION['insertemp']['email'] = $email;
}

if (trim($direccion) == "") {
    $_SESSION['erroresemp']['dir'] = "Direccion Incorrecto";
} else {
    $_SESSION['insertemp']['dir'] = $direccion;
}


if (!preg_match('/^[9|6|7][0-9]{8}$/', $telef) || strlen($telef) != 9) {

    $_SESSION['erroresemp']['telef'] = "Telefono Incorrecto";
} else {
    $_SESSION['insertemp']['telef'] = $telef;
}

if (trim($pwd) == "") {
    $_SESSION['erroresemp']['pwd'] = "Contraseña Incorrecta";
} else {
    $_SESSION['insertemp']['pwd'] = $pwd;
}

if (trim($pwdrep) == "" || $pwdrep != $pwd) {
    $_SESSION['erroresemp']['pwdrep'] = "La contraseña no coincide con la anterior";
} else {
    $_SESSION['insertemp']['pwdrep'] = $pwdrep;
}


$_SESSION['insertemp']['privilegios'] = $privilegios;
$_SESSION['insertemp']['esp'] = $esp;

if (isset($_SESSION['erroresemp'])) {
    header('location: formNuevoEmpleado.php');
} else {

    //Hacer aqui insercion
    
}