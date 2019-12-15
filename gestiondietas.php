<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

$option = $_POST['option'];

if ($option == "plato") {

    $expression = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu";
    $nombre = $_POST['nombre'];
    $link = $_POST['link'];


    if (trim($nombre) == "") {
        $_SESSION['erroresplato']['nombre'] = "Nombre Incorrecto";
    } else {
        $_SESSION['insertplato']['nombre'] = $nombre;
    }

    if (trim($link) == "" || !preg_match($expression, $link)) {
        $_SESSION['erroresplato']['link'] = "Link Incorrecto";
    } else {
        $_SESSION['insertplato']['link'] = $link;
    }

    if (isset($_SESSION['erroresplato'])) {
        header('location: formNuevoPlato.php');
    } else {
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);

        if (!insertPlato($nombre, $link)) {
            headder('location: error.html');
        } else {
            header("location: admin.php");
        }
    }
} else if ($option == "comida") {

    $nombre = $_POST['nombre'];
    if (trim($nombre) == "") {
        $_SESSION['errorescomida']['nombre'] = "Nombre Incorrecto";
    } else {
        $_SESSION['insertcomida']['nombre'] = $nombre;
    }

    $platos = $_POST['plato'];

    
    if(count($platos) == 0){
        $_SESSION['errorescomida']['platos'] = "Seleccione al menos un plato";
    }
    else{
        foreach ($platos as $clave => $valor) {
            $_SESSION['insertcomida']['platos'][$valor] = "1";
        }
    }

    if (isset($_SESSION['errorescomida'])) {
        header('location: formNuevaComida.php');
    } else {
        unset($_SESSION['insertcomida']);
        unset($_SESSION['erroresplato']);

        $id = insertComida($nombre);
        if ($id==0) {
            headder('location: error.html');
        } else {
            
            foreach ($platos as $clave => $valor) {
                if(!bindComidaPlato($id, $valor)){
                    headder('location: error.html');
                }
            }
            header("location: admin.php");
        }
    }
}