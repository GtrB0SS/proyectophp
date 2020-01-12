<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

//Atributos
$esp = $_POST['esp']; //Verificado
$nombre = $_POST['nombre']; //Verificado
$dni = $_POST['dni']; //Verificado
$telef = $_POST['telef']; //Verificado
$email = $_POST['email']; //Verificado
$direccion = $_POST['dir']; //Verificado
$pwd = $_POST['pwd']; //Verificado
$pwdrep = $_POST['pwdrep']; //Verificado

if (isset($_POST['privilegios'])) {
    $privilegios = $_POST['privilegios']; //Verificado
} else {
    $privilegios = "0";
}

if ($esp == "") {
    $_SESSION['erroresemp']['esp'] = "Debes seleccionar una especialidad";
} else {
    $_SESSION['insertemp']['esp'] = $esp;
}

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

if ($privilegios != "1") {
    $privilegios = "0";
}
if (isset($_SESSION['accionEmp'])) {
    $accion = $_SESSION['accionEmp'];
} else {
    $accion = "insertar";
}

if (isset($_SESSION['erroresemp'])) {
    header('location: formNuevoEmpleado.php');
} else if ($accion == "insertar") {

    if (!insertEmpleado($esp, $nombre, $dni, $telef, $email, $direccion, $pwd, $privilegios)) {
        header("location: error.html");
    }
    $_SESSION['nempinsertado'] = true;
    unset($_SESSION['insertemp']);
    unset($_SESSION['erroresemp']);
    unset($_SESSION['accionEmp']);

    header("location: admin.php");
} else {
    //Aqui se ejecuta la modificacion
    if ($accion == "mod") {
        $nemp = $_SESSION['insertemp']['nemp'];
        if (!updateEmpleado($nemp, $esp, $nombre, $dni, $telef, $email, $direccion, $pwd, $privilegios)) {
            header("location: error.html");
        }
    } 

    $_SESSION['nempmod'] = true;
    unset($_SESSION['insertemp']);
    unset($_SESSION['erroresemp']);
    unset($_SESSION['accionEmp']);

    header("location: admin.php");
}