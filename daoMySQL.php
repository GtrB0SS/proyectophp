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
            WHERE dni = '$dni'
            ORDER BY `progreso`.`fecha` DESC ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    if ((mysqli_num_rows($result) != 0)) {
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


            if ($fila['dia'] != $diaantit) {
                $dieta = $dieta . "
                                    <h3>" . $fila['dia'] . "</h3>
                                    <p>$tab Calorias:&nbsp;" . $fila['calorias'] . "</p>
                                    <p>$tab Macronutrientes:&nbsp;" . $fila['macronutrientes'] . "</p>";
                $diaantit = $fila['dia'];
                $comidaantit = "";
            }
            if ($fila['nombreco'] != $comidaantit) {
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

function insertProgreso($img, $peso, $medidas, $fecha, $dni) {



    $conex = getConnection();


    $query = "INSERT INTO `progreso` (`codProgreso`, `imagen`, `peso`, `medidas`, `fecha`, `dni`) "
            . "VALUES (NULL, '" . $img . "', '" . $peso . "', '" . $medidas . "', '" . $fecha . "', '" . $dni . "') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);
}

function selectpreparador() {


    $conex = getConnection();

    $query = "SELECT numeroempleado FROM empleado";


    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    $numeroempleado = "";
    $antit = 99999999999999999999;
    
    while ($fila = mysqli_fetch_array($result)) {
        $query2 = "SELECT COUNT(*) AS res FROM lineaempleado WHERE numeroempleado = '".$fila['numeroempleado']."' ";


        $result2 = mysqli_query($conex, $query2)
            or die(mysqli_error($conex));
        $fila2 = mysqli_fetch_array($result2);
        
        if($fila2['res']<$antit){
            
            $numeroempleado = $fila['numeroempleado'];
            $antit = $fila2['res'];
        }
    }

    mysqli_close($conex);
    return $numeroempleado;
}

function insertCliente($dni, $nombre, $email, $direccion, $telef, $objetivo, $pwd) {

    $conex = getConnection();
    $query = "INSERT INTO `cliente` (`dni`, `nombre`, `email`, `direccion`, `telefono`, `objetivo`, `clave`, `coddieta`, `codtabla`) 
                            VALUES ('$dni', '$nombre', '$email', '$direccion', '$telef', '$objetivo', '$pwd', NULL, NULL) ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);
    return $result;
}

function asignarprep($dni, $numempleado) {
    $conex = getConnection();
    $query = "INSERT INTO `lineaempleado` (`dni`, `numeroempleado`) 
                            VALUES ('$dni', '$numempleado') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);
    return $result;
}

function nuevoEjercicio($nombre, $series, $repeticiones, $peso, $link) {
    $conex = getConnection();

    //$query = "INSERT INTO `ejercicio` (`codejercicio`, `nombre`, `series`, `repeticiones`, `peso`, `link`) VALUES (NULL, '$nombre', '$series', '$repeticiones', '$peso', '$link')";

    $query = "INSERT INTO `ejercicio` (`codejercicio`, `nombre`, `series`, `repeticiones`, `peso`, `link`) VALUES (NULL, '$nombre', '$series', '$repeticiones', '$peso', '$link')";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    mysqli_close($conex);

    return $result;
}

function insertPlan($dni, $tipoplan, $dispo, $observaciones) {

    $fecha = date("d-m-Y", strtotime($fecha_actual . "+ 1 month"));

    $conex = getConnection();
    $query = "INSERT INTO `plan` (`codPlan`, `tipoplan`, `descripcion`, `disponibilidad`, `observaciones`, `vencimiento`, `dni`)
                VALUES (NULL, '$tipoplan', '$tipoplan', '$dispo', '$observaciones', '$fecha', '$dni') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);
    return $result;
}

function insertPlato($nombre, $link) {
    $conex = getConnection();

    $query = "INSERT INTO `plato` (`codplato`, `nombre`, `link`) VALUES (NULL, '$nombre', '$link')";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    mysqli_close($conex);

    return $result;
}

function getPlatos() {

    $conex = getConnection();

    $query = "SELECT * FROM `plato` ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    while ($fila = mysqli_fetch_array($result)) {

        $platos[$fila['codplato']] = $fila['nombre'];
    }

    return $platos;
}

function insertComida($nombre) {


    $conex = getConnection();

    $query = "INSERT INTO `comida` (`codcomida`, `nombre`) VALUES (NULL, '$nombre') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    $id = mysqli_insert_id($conex);

    return $id;
}

function bindComidaPlato($idComida, $idPlato) {

    $conex = getConnection();

    $query = "INSERT INTO `lineacomida` (`codcomida`, `codplato`) VALUES ('$idComida', '$idPlato')  ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    return $result;
}

function getComidas() {

    $conex = getConnection();

    $query = "SELECT * FROM `comida` ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    while ($fila = mysqli_fetch_array($result)) {

        $comidas[$fila['codcomida']] = $fila['nombre'];
    }

    return $comidas;
}

function insertDia($calorias, $macros, $dia) {


    $conex = getConnection();

    $query = "INSERT INTO `diadieta` (`coddia`, `calorias`, `macronutrientes`, `dia`) "
            . "VALUES (NULL, '$calorias', '$macros', '$dia') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    $id = mysqli_insert_id($conex);

    return $id;
}

function bindDiaComida($idDia, $idComida) {

    $conex = getConnection();

    $query = "INSERT INTO `lineadia` (`coddia`, `codcomida`) VALUES ('$idDia', '$idComida') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    return $result;
}

function getDias() {

    $conex = getConnection();

    $query = "SELECT * FROM `diadieta` ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    while ($fila = mysqli_fetch_array($result)) {

        $dias[$fila['coddia']] = "Codigo: " . $fila['coddia'] . " - " . $fila['dia'];
    }

    return $dias;
}

function insertDieta($semana) {


    $conex = getConnection();

    $query = "INSERT INTO `dieta` (`coddieta`, `semana`) VALUES (NULL, '$semana') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    $id = mysqli_insert_id($conex);

    return $id;
}

function bindDietaComida($idDieta, $idDia) {

    $conex = getConnection();

    $query = "INSERT INTO `lineadieta` (`coddieta`, `coddia`) VALUES ('$idDieta', '$idDia') ";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    return $result;
}

function getClientes($numempleado) {

    $conex = getConnection();

    $query = "SELECT * FROM `lineaempleado` WHERE numeroempleado = $numempleado ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    while ($fila = mysqli_fetch_array($result)) {

        $clientes[$fila['dni']] = $fila['dni'];
    }

    return $clientes;
}

function getTodasDietas() {

    $conex = getConnection();

    $query = "SELECT * FROM `dieta` ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    while ($fila = mysqli_fetch_array($result)) {

        $dietas[$fila['coddieta']] = "Codigo: " . $fila['coddieta'] . " Semana: " . $fila['semana'];
    }

    return $dietas;
}

function bindDietaCliente($cliente, $dieta) {

    $conex = getConnection();

    $query = "UPDATE `cliente` SET `coddieta` = '$dieta' WHERE `cliente`.`dni` = '$cliente'";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    return $result;
}

/*
  function insertDieta($codcomida, $nombre){
  $conex = getConnection();

  $query = "INSERT INTO `comida` (`codcomida`, `nombre`) VALUES ('$codcomida', '$nombre')";

  $result = mysqli_query($conex, $query)
  or die(mysqli_error($conex));
  mysqli_close($conex);

  return $result;
  }

 */

function getTablas($dni) {


    $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    $conex = getConnection();


    $query = "SELECT *
            FROM tablaejercicios t, lineatabla lt, sesion s, entrenamiento e, ejercicio ej, cliente c
            WHERE c.dni = '$dni'
            AND   c.codtabla = t.codtabla
            AND t.codtabla = lt.codtabla
            AND lt.codsesion = s.codsesion
            AND s.codsesion = e.codigosesion
            AND e.codigoejercicio = ej.codejercicio";
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    $tabla = "";
    $diaantit = "";
    $sesionantit = "";
    $primit = 1;
    while ($fila = mysqli_fetch_array($result)) {

        if ($primit == 1) {
            $tabla = $tabla . "
                                <h3>Tabla de &nbsp;" . $fila['tipo'] . "</h3>";
            $primit = 2;
        }

        if ($fila['dia'] != $diaantit) {
            $tabla = $tabla . "
                                <h3> $tab" . $fila['dia'] . "</h3>";

            $diaantit = $fila['dia'];
            $sesionantit = "";
        }

        $tabla = $tabla . "<p>$tab $tab <b>Nombre:</b>&nbsp;" . $fila['nombre'] . "</p>
                                <p>$tab $tab Series x Reps:&nbsp;" . $fila['series'] . "&nbsp;x&nbsp;" . $fila['repeticiones'] . "</p>"
                . "         <p>$tab $tab Link:" . $fila['link'] . " ";
    }

    return $tabla;
}

function getEjercicios() {
    $conex = getConnection();

    $query = "SELECT codejercicio, nombre FROM ejercicio ";

    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));

    /*
      if ((mysqli_num_rows($result) != 0)) {
      $fila = mysqli_fetch_array($result);
      }
      else{
      mysqli_close($conex);
      return 0;
      }
     */

    while ($fila = mysqli_fetch_array($result)) {

        $ejercicios[$fila['codejercicio']] = $fila['nombre'];
    }

    mysqli_close($conex);

    return $ejercicios;
}

function insertTabla($fecha, $tipo){
    $conex = getConnection();
    
    $query = "INSERT INTO `tablaejercicios` (`codtabla`, `fecha`, `tipo`) VALUES (NULL, '$fecha', '$tipo')";
    
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    
    $idNuevo = mysqli_insert_id();
    
    mysqli_close($conex);
    

    return mysqli_insert_id($conex);
}

function bindSesion($codSesion, $codTabla){
    $conex = getConnection();
    
    $query = "INSERT INTO `lineatabla` (`codtabla`, `codsesion`) VALUES ('$codTabla', '$codSesion')";
    
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    
    mysqli_close($conex);
    
    return $result;
}

function meterEjercicio($ejercicio, $codigoSesion){
    $conex = getConnection();
    
    $query = "INSERT INTO `entrenamiento` (`codigoejercicio`, `codigosesion`) VALUES ('$ejercicio', '$codigoSesion')";
    
    $result = mysqli_query($conex, $query)
            or die(mysqli_error($conex));
    
    mysqli_close($conex);
    
    return $result;
}
