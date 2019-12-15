<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "daoMySQL.php";

$plan = $_POST['plan'];

if(trim($plan) == "" || !isset($_POST['plan'])){
    $_SESSION['erroresampliar']['plan'] = "Plan Incorrecto";
    
}
else{$_SESSION['ampliar']['plan'] = $plan;}

if(isset($_SESSION['erroresampliar'])){
    header('location: ampliarplan.php');
    
    
}
else{
    
    unset($_SESSION['ampliar']);
    unset($_SESSION['erroresampliar']);
    
    $dni = $_SESSION['dni'];
    
    if(!modificarPlan($dni, $plan)){
        header("location: error.html");
    }
    else{
        header("location: index.php");
    }
}