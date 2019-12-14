<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getConnection() {
    $conex = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conex));
    mysqli_select_db($conex, "motofitness") or die(mysqli_error($conex));

    return $conex;
}

function login($user, $pwd) {
    $conex = getConnection();


    $query = "SELECT dni, clave
            FROM cliente 
            WHERE (dni LIKE '$user') and 
                (clave LIKE '$pwd')";
    $res_valid = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    if ((mysqli_num_rows($res_valid) == 0) || !$user || !$pwd) {
        $query = "SELECT numeroempleado, clave, especialidad
        FROM empleado 
        WHERE (numeroempleado LIKE '$user') and 
            (clave LIKE '$pwd')";
        $res_valid = mysqli_query($conex, $query)
                or die(mysqli_error($conex));
        if ((mysqli_num_rows($res_valid) == 0) || !$user || !$pwd) {
            $_SESSION['resLogin'] = "Usuario o clave incorrectos";
            header('location: login.php');
        } else {
            $reg_usuario = mysqli_fetch_array($res_valid);
            $_SESSION['numeroempleado'] = $reg_usuario['numeroempleado'];
            $_SESSION['especialidad'] = $reg_usuario['especialidad'];
            $_SESSION['resLogin'] = "empleado";
            mysqli_close($conex);
            return;
        }
    } else {
        $reg_usuario = mysqli_fetch_array($res_valid);
        $_SESSION['dni'] = $reg_usuario['dni'];
        $_SESSION['resLogin'] = "cliente";
        mysqli_close($conex);
        return;
    }
}

function getPlan($user) {
    $conex = getConnection();


    $query = "SELECT tipoplan
            FROM plan 
            WHERE (dni LIKE '$user')";

    $res_valid = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    if ((mysqli_num_rows($res_valid) != 0)) {
        $plan = mysqli_fetch_array($res_valid);
        mysqli_close($conex);
        return $plan['tipoplan'];
    } else {
        mysqli_close($conex);
        return null;
    }
}

function getProgreso($dni) {

    $conex = getConnection();


    $query = "SELECT fecha, peso, medidas, imagen
            FROM `progreso` 
            WHERE dni = $dni
            ORDER BY `progreso`.`fecha` DESC ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    if ((mysqli_num_rows($result) != 0)) {
        //$plan=mysqli_fetch_array($res_valid);

        $tabla = "";

        while ($fila = mysqli_fetch_array($result)) {

            $tabla = $tabla . "<tr>
            <th>" . $fila['fecha'] . "</th>
            <td>" . $fila['peso'] . "</td>
            <td>" . $fila['medidas'] . "</td>
            <td><img src='" . $fila['imagen'] . "' width='256' height='200' /></td>
          </tr>";
        }
        mysqli_close($conex);
        return $tabla;
    } else {
        mysqli_close($conex);
        return "";
    }
}

function getDietas($user) {
    $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    $conex = getConnection();


    $query = "SELECT c.dni, d.semana, dd.calorias, dd.macronutrientes, dd.dia, co.nombre as nombreco, p.nombre, p.link
            FROM dieta d, lineadieta ld, diadieta dd, lineadia ln, comida co, lineacomida lc, plato p, cliente c
            WHERE c.dni = '$user'
            AND   c.coddieta = d.coddieta
            AND   d.coddieta = ld.coddieta
            AND   ld.coddia = dd.coddia
            AND   dd.coddia = ln.coddia
            AND   ln.codcomida = co.codcomida
            AND   co.codcomida = lc.codcomida
            AND   lc.codplato = p.codplato
            ORDER BY dd.coddia, co.codcomida";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    if ((mysqli_num_rows($result) != 0)) {
        //$plan=mysqli_fetch_array($res_valid);

        $dieta = "";
        $diaantit = "";
        $comidaantit = "";
        $primit = 1;
        while ($fila = mysqli_fetch_array($result)) {

            
            if($fila['dia'] != $diaantit){
                $dieta = $dieta . "
                                    <h3>" . $fila['dia'] . "</h3>
                                    <p>$tab Calorias:&nbsp;" . $fila['calorias'] . "</p>
                                    <p>$tab Macronutrientes:&nbsp;" . $fila['macronutrientes'] . "</p>";
                $diaantit = $fila['dia'];
                $comidaantit = "";
            }
            if ($fila['nombreco'] != $comidaantit){
                $dieta = $dieta . "
                                    <h4>$tab" . $fila['nombreco'] . ":</h4>";
                $comidaantit = $fila['nombreco'];
            }
            
            $dieta = $dieta . "<p>$tab $tab Plato:&nbsp;" . $fila['nombre'] . "</p>
                                    <p>$tab $tab Link:&nbsp;" . $fila['link'] . "</p>";
        }
        mysqli_close($conex);
        return $dieta;
    } else {
        mysqli_close($conex);
        return "";
    }
}

function insertProgreso($img, $peso, $medidas, $fecha, $dni){
    
    
    
    $conex = getConnection();


    $query = "INSERT INTO `progreso` (`codProgreso`, `imagen`, `peso`, `medidas`, `fecha`, `dni`) "
            . "VALUES (NULL, '".$img."', '".$peso."', '".$medidas."', '".$fecha."', '".$dni."') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);
    
}