<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getConnection(){
    $conex=mysqli_connect('localhost', 'root', '') or die (mysqli_error($conex));
    mysqli_select_db($conex,"motofitness") or die (mysqli_error($conex));
    
    return $conex;
}


function login(){
    
    
    
}