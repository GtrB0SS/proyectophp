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
}else if ($option == "dia") {
    $dia = $_POST['dia'];
    
    if(trim($dia) == "" || !preg_match("(lunes|martes|miercoles|jueves|viernes|sabado|domingo)", strtolower($dia))){
        
        $_SESSION['erroresdia']['dia'] = "Dia erroneo";
    }
    else {
        $_SESSION['insertdia']['dia'] = $dia;
    }
    
    $calorias = $_POST['calorias'];
    if(trim($calorias) == "" || !is_numeric($calorias) || strlen($calorias)>4){
        
        $_SESSION['erroresdia']['calorias'] = "Las calorias deben ser un numero como maximo de 4 cifras";
    }
    else {
        $_SESSION['insertdia']['calorias'] = $calorias;
    }
    
    $macros = $_POST['macros'];
    if(trim($macros) == "" ){
        
        $_SESSION['erroresdia']['macros'] = "Macronutrientes erroneos";
    }
    else {
        $_SESSION['insertdia']['macros'] = $macros;
    }
    
    
    //Select verificacion
    
    
    if (isset($_SESSION['erroresdia'])) {
        header('location: formNuevoDiaDieta.php');
    } else {
        unset($_SESSION['insertdia']);
        unset($_SESSION['erroresdia']);
        print("HOLÑA");
//        $id = insertComida($nombre);
//        if ($id==0) {
//            headder('location: error.html');
//        } else {
//            
//            foreach ($platos as $clave => $valor) {
//                if(!bindComidaPlato($id, $valor)){
//                    headder('location: error.html');
//                }
//            }
//            header("location: admin.php");
//        }
    }
}