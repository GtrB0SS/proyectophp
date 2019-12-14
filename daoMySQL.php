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


function login($user, $pwd){
    $conex = getConnection();


    $query="SELECT dni, clave
            FROM cliente 
            WHERE (dni LIKE '$user') and 
                (clave LIKE '$pwd')";
    $res_valid=mysqli_query($conex,$query) 
            or die (mysqli_error($conex));
    if ((mysqli_num_rows ($res_valid)==0) || !$user || !$pwd)
    {
        $query="SELECT numeroempleado, clave, especialidad
        FROM empleado 
        WHERE (numeroempleado LIKE '$user') and 
            (clave LIKE '$pwd')";
        $res_valid=mysqli_query($conex,$query) 
                or die (mysqli_error($conex));
        if ((mysqli_num_rows ($res_valid)==0) || !$user || !$pwd)
        {
            print_r("clave o usuario erroneo");

        }
        else
        {
            $reg_usuario=mysqli_fetch_array($res_valid);
            $_SESSION['numeroempleado'] = $reg_usuario['numeroempleado'];
            $_SESSION['especialidad'] = $reg_usuario['especialidad'];
            return;

        }

    }
    else
    {
        $reg_usuario=mysqli_fetch_array($res_valid);
        $_SESSION['dni'] = $reg_usuario['dni'];
        return;

    }
    
    
}