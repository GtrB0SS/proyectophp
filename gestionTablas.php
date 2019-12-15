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
    
    if(count($ejercicios) == 0){
        print("<p>Error no hay ejercicios</p>");
    }
    else{
        foreach ($ejercicios as $clave => $valor) {
            print("<p>$clave -> $valor</p>");
        }
    }
    
    
}