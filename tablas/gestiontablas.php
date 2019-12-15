<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "../daoMySQL.php";

$option = $_REQUEST['option'];

if ($option == "ejercicio") {
    $expression = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu";
    $nombre = $_POST['nombre'];
    $link = $_POST['link'];
    $series = $_POST['series'];
    $repeticiones = $_POST['repeticiones'];
    $peso = $_POST['peso'];

    if (trim($nombre) == "") {
        $_SESSION['erroresejercicio']['nombre'] = "Nombre Incorrecto";
    } else {
        $_SESSION['insertejercicio']['nombre'] = $nombre;
    }

    if (!is_numeric($series) || strlen($series) > 3) {
        $_SESSION['erroresejercicio']['series'] = "Series Incorrectas, tiene que tener como maximo 3 cifras";
    } else {
        $_SESSION['insertejercicio']['series'] = $series;
    }

    if (!is_numeric($repeticiones) || strlen($repeticiones) > 3) {
        $_SESSION['erroresejercicio']['repeticiones'] = "Repeticiones Incorrecto, tiene que tener como maximo 3 cifras";
    } else {
        $_SESSION['insertejercicio']['repeticiones'] = $repeticiones;
    }

    if (!is_numeric($peso)) {
        $_SESSION['erroresejercicio']['peso'] = "Peso Incorrecto, tiene que tener como maximo 3 cifras";
    } else {
        $_SESSION['insertejercicio']['peso'] = $peso;
    }



    if (trim($link) == "" || !preg_match($expression, $link)) {
        $_SESSION['erroresejercicio']['link'] = "Link Incorrecto";
    } else {
        $_SESSION['insertejercicio']['link'] = $link;
    }




    if (isset($_SESSION['erroresejercicio'])) {
        header('location: formNuevoEjercicio.php');
    } else {
        unset($_SESSION['insertejercicio']);
        unset($_SESSION['erroresejercicio']);
        if (!insertEjercicio($nombre, $series, $repeticiones, $peso, $link)) {
            header('location: ../error.html');
        } else {
            header("location: ../admin.php");
        }
    }
} else if ($option == "sesion") {

    $dia = $_POST['dia'];

    if (trim($dia) == "" || !preg_match("/^(lunes|martes|miercoles|jueves|viernes|sabado|domingo)([^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*)?/", strtolower($dia))) {

        $_SESSION['erroressesion']['dia'] = "Dia erroneo";
    } else {
        $_SESSION['insertsesion']['dia'] = $dia;
    }

    $ejercicios = $_POST['ejercicio'];


    if (count($ejercicios) == 0) {
        $_SESSION['erroressesion']['ejercicios'] = "Seleccione al menos un ejercicio";
    } else {
        foreach ($ejercicios as $clave => $valor) {
            $_SESSION['insertsesion']['ejercicios'][$valor] = "1";
        }
    }

    if (isset($_SESSION['erroressesion'])) {
        header('location: formNuevaSesion.php');
    } else {
        unset($_SESSION['insertsesion']);
        unset($_SESSION['erroressesion']);

        $idsesion = insertSesion($dia);
        if ($idsesion == 0) {
            header('location: ../error.html');
        } else {

            foreach ($ejercicios as $clave => $valor) {
                if (!bindEntrenamientoSesion($idsesion, $valor)) {
                    header('location: ../error.html');
                }
            }

            header("location: ../admin.php");
        }
    }
} else if ($option == "tabla") {
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];

    if (trim($fecha) != "") {
        
        $_SESSION['inserttabla']['fecha'] = $fecha;
    } else {
        $_SESSION['errorestabla']['fecha'] = "Inserte una fecha valida";
    }
    
    if(!isset($_POST['tipo'])){
        
        $_SESSION['errorestabla']['tipo'] = "Seleccione un tipo de entrenamiento";
    }
    else{
        $_SESSION['inserttabla']['tipo'] = $tipo;
    }
    
    $sesiones = $_POST['sesion'];


    if (count($sesiones) == 0) {
        $_SESSION['errorestabla']['sesion'] = "Seleccione al menos una sesion";
    } else {
        foreach ($sesiones as $clave => $valor) {
            $_SESSION['inserttabla']['sesion'][$valor] = "1";
        }
    }
    

    if (isset($_SESSION['errorestabla'])) {
        header('location: formNuevaTabla.php');
    } else {
        unset($_SESSION['inserttabla']);
        unset($_SESSION['errorestabla']);
        
        if($tipo == "1"){$tipo = "Cardio";}
        else{$tipo = "Musculacion";}
        
        $id = insertTabla($fecha, $tipo);
        
        if($id == 0){
            header("location: ../error.html");
        }
        else{
            foreach ($sesiones as $clave => $valor) {
                if (!bindSesionesTabla($id, $valor)) {
                    header('location: ../error.html');
                }
            }
            
            header("location: ../admin.php");
        }
        
    }
}else if ($option == "asignar") {
    $cliente = $_POST['cliente'];
    
    if($cliente == "0" || !isset($_POST['cliente'])){
        
        $_SESSION['erroresasignar']['cliente'] = "Seleccione un cliente";
        
    }
    else{
        $_SESSION['asignar']['cliente'][$cliente] = "1";
        
        
    }
    $tabla = $_POST['tabla'];
    
    if($tabla == "0" || !isset($_POST['tabla'])){
        
        $_SESSION['erroresasignar']['tablas'] = "Seleccione una tabla";
        
    }
    else{
        $_SESSION['asignar']['tabla'][$tabla] = "1";
        
        
    }
    
    if (isset($_SESSION['erroresasignar'])) {
        header('location: formAsignarTabla.php');
    } else {
        unset($_SESSION['asignar']);
        unset($_SESSION['erroresasignar']);

        if(!bindTablaCliente($cliente, $tabla)){
            header('location: ../error.html');
        }
        else{
            header("location: ../admin.php");
        }
    }
}

