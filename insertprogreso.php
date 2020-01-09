<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

$peso = $_POST['peso'];
$medidas = $_POST['medidas'];
$fecha = date("Y-m-d");
//
if (!isset($peso) || trim($peso) == "" || $peso<=10 || $peso >=400) {

    $_SESSION['erroresProgreso']['peso'] = "El peso no es correcto";
}else{
    $_SESSION['insertProgreso']['peso'] = $medidas;
}


if (!isset($medidas) || trim($medidas) == "" || !preg_match('/^[0-9][0-9][0-9]?\/[0-9][0-9][0-9]?(\/[0-9][0-9]?[0-9]?)?$/', $medidas)) {

    $_SESSION['erroresProgreso']['medidas'] = "Las medidas no son correctas";
}else{
    $_SESSION['insertProgreso']['medidas'] = $medidas;
}

if (isset($_SESSION['erroresProgreso']))
    header("location: progreso.php");
else {

    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $_FILES['img']['name'];

        move_uploaded_file($_FILES['img']['tmp_name'],
                $nombreDirectorio . $nombreFichero);
        $nombreFichero = $nombreDirectorio . $nombreFichero;
    } else
        $nombreFichero = "img/img.jpg"; //Imagen por defecto



    insertProgreso($nombreFichero, $peso, $medidas, $fecha, $_SESSION['dni']);

    header('location: resumen.php');
}
