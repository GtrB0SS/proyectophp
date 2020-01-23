<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
include "../daoMySQL.php";

$option = $_POST['option'];

if ($option == "asignar") {
    $cliente = $_POST['cliente'];

    if ($cliente == "0" || !isset($_POST['cliente'])) {

        $_SESSION['erroresasignar']['cliente'] = "Seleccione un cliente";
    } else {
        $_SESSION['asignar']['cliente'][$cliente] = "1";
    }
    $dieta = $_POST['dieta'];

    if ($dieta == "0" || !isset($_POST['dieta'])) {

        $_SESSION['erroresasignar']['dieta'] = "Seleccione una dieta";
    } else {
        $_SESSION['asignar']['dieta'][$dieta] = "1";
    }

    if (isset($_SESSION['erroresasignar'])) {
        header('location: formAsignarDieta.php');
    } else {
        unset($_SESSION['asignar']);
        unset($_SESSION['erroresasignar']);

        if (!bindDietaCliente($cliente, $dieta)) {
            headder('location: ../error.html');
        } else {
            $_SESSION['dietaAsignadaExito'] = true;
            header("location: ../admin.php");
        }
    }
} else if ($option == "visualizar") {

    $dieta = $_POST['dieta'];

    if ($dieta == "0" || !isset($_POST['dieta'])) {

        $_SESSION['erroresasignar']['dieta'] = "Seleccione una dieta";
    } else {
        $_SESSION['asignar']['dieta'][$dieta] = "1";
    }

    if (isset($_SESSION['erroresasignar'])) {
        header('location: formSelectDietaVisualizar.php');
    } else {
        unset($_SESSION['asignar']);
        unset($_SESSION['erroresasignar']);

        $_SESSION['dietaAVer'] = getDieta($dieta);
        $_SESSION['nomDietaAVer'] = getNomDietas($dieta);
        
        header("location: verDieta.php");
    }
}