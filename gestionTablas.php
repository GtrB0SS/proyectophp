<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

$option = $_REQUEST['option'];

if ($option == "ejercicios") {
    $ejercicios = $_POST['listaEjercicios'];
    $tipo = $_POST["tipo"];
    $fecha = $_POST["fecha"];
    $codigoSesion = $_POST["codigoSesion"];
    
    /*
    if(count($ejercicios) == 0){
        print("<p>Error no hay ejercicios</p>");
    }
    else{
        foreach ($ejercicios as $clave => $valor) {
            print("<p>$clave -> $valor</p>");
        }
    }
     */
    
    // nueva tabla
    $codNuevaTabla = insertTabla($fecha, $tipo);
    
    // bind lineatabla
    $resultBindSesion = bindSesion($codSesion, $codNuevaTabla);
    if($resultBindSesion != 1){
        print("<h2>Error al bindear la tabla y la sesión</h2>");
    }
    
    // insertar ejercicios en entrenamiento
    foreach ($ejercicios as $clave => $valor) {
        $resultInsertEntrenamiento = meterEjercicio($valor, $codigoSesion);
        if($resultInsertEntrenamiento != 1){
            print("<h2>Error al insertar entrenamiento.</h2>");
        }
    }
    
    print("<h2>Insertado correctamente</h2>");
    print("<p><a href='index.php'>Volver a inicio</a></p>");
    
}