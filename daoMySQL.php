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
            $_SESSION['resLogin'] = "Usuario o clave incorrectos";
            header('location: login.php');

        }
        else
        {
            $reg_usuario=mysqli_fetch_array($res_valid);
            $_SESSION['numeroempleado'] = $reg_usuario['numeroempleado'];
            $_SESSION['especialidad'] = $reg_usuario['especialidad'];
            $_SESSION['resLogin'] = "empleado";
            mysqli_close($conex);
            return;

        }

    }
    else
    {
        $reg_usuario=mysqli_fetch_array($res_valid);
        $_SESSION['dni'] = $reg_usuario['dni'];
        $_SESSION['resLogin'] = "cliente";
        mysqli_close($conex);
        return;

    }
    
    
}

function getPlan($user){
    $conex = getConnection();


    $query="SELECT tipoplan
            FROM plan 
            WHERE (dni LIKE '$user')";
    
    $res_valid=mysqli_query($conex,$query) 
            or die (mysqli_error($conex));
    if ((mysqli_num_rows ($res_valid)!=0))
    {
        $plan=mysqli_fetch_array($res_valid);
        mysqli_close($conex);
        return $plan['tipoplan'];
        
    }
    else{
        mysqli_close($conex);
        return null;}
    
}

function getProgreso($dni){
    
    $conex = getConnection();


    $query="SELECT fecha, peso, medidas, imagen
            FROM `progreso` 
            WHERE dni = $dni
            ORDER BY `progreso`.`fecha` DESC ";
    
    $result=mysqli_query($conex,$query) 
            or die (mysqli_error($conex));
    if ((mysqli_num_rows ($result)!=0))
    {
        //$plan=mysqli_fetch_array($res_valid);
        
        $tabla="";
        
        /*<tr>
            <th>1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>*/
         while ($fila = mysqli_fetch_array($result)){

             $tabla = $tabla . "<tr>
            <th>".$fila['fecha']."</th>
            <td>".$fila['peso']."</td>
            <td>".$fila['medidas']."</td>
            <td><img src='".$fila['imagen']."' width='256' height='200' /></td>
          </tr>";

        }
        mysqli_close($conex);
        return $tabla;
        
    }
    else{
        mysqli_close($conex);
        return "";
        
    }
    
}