<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "../daoMySQL.php";
if (!isset($_SESSION['nombreDieta'])) {
    $nombreDieta = $_POST['nombreDieta'];

    if (trim($nombreDieta) == "") {
        $_SESSION['erroresdieta']['nombre'] = "Nombre Incorrecto";
    } else {
        $_SESSION['insertdieta']['nombre'] = $nombreDieta;
        $_SESSION['nombreDieta'] = $nombreDieta;
    }
    if (isset($_SESSION['erroresdieta'])) {
        header('location: formNuevaDieta.php');
    }
}


$expression = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu";

$nombre = $_POST['nombre'];
$link = $_POST['link'];
$cal = $_POST['cal'];


if (trim($nombre) == "") {
    $_SESSION['erroresplato']['nombre'] = "Nombre Incorrecto";
} else {
    $_SESSION['insertplato']['nombre'] = $nombre;
}

if (trim($link) == "" || !preg_match($expression, $link)) {
    $_SESSION['erroresplato']['link'] = "Link Incorrecto";
} else {
    $_SESSION['insertplato']['link'] = $link;
}
if (trim($cal) == "") {
    $_SESSION['erroresplato']['cal'] = "Calorias Incorrectas";
} else {
    $_SESSION['insertplato']['cal'] = $cal;
}

if (isset($_POST['plato'])) {
    if (trim($_POST['plato']) == "") {
        unset($_POST['plato']);
    }
}

if (isset($_SESSION['erroresplato']) && !isset($_POST['plato'])) {
    if ($_SESSION['comida'] == 'desayuno' and $_SESSION['ncomida'] == 0) {

        $_SESSION['ncomida'] = 1;
        unset($_SESSION['erroresplato']);

        header("location: formNuevoPlato.php");
    } else {
        header('location: formNuevoPlato.php');
    }
} else {


    if ($_SESSION['comida'] == 'desayuno' and $_SESSION['ncomida'] == 0) {

        $_SESSION['ncomida'] = 1;
        //No hay insercion
        unset($_SESSION['erroresplato']);
        header("location: gestiondietas.php");
    } else if ($_SESSION['comida'] == 'desayuno' and $_SESSION['ncomida'] == 1) {
        $_SESSION['comida'] = 'comida';
        $_SESSION['ncomida'] = 0;

        //Se inserta plato
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);

        if (isset($_POST['plato'])) {
            $platoInsertado = $_POST['plato'];
            $cal = getCalPlato($platoInsertado);
        } else {
            $platoInsertado = insertPlato($nombre, $link, $cal);
        }

        if ($platoInsertado == 0 || $platoInsertado == false) {
            header('location: ../error.html');
        } else {
            $_SESSION['calDia'] = $_SESSION['calDia'] + $cal;

            $id = insertComida('desayuno');

            if ($id == 0) {
                header('location: ../error.html');
            } else if (!bindComidaPlato($id, $platoInsertado)) {
                header('location: ../error.html');
            }

            $_SESSION['IdsComidas']['desayuno'] = $id;
        }

        header("location: formNuevoPlato.php");
    } else if ($_SESSION['comida'] == 'comida' and $_SESSION['ncomida'] == 0 and $_SESSION['ncomida'] < 1) {
        $_SESSION['ncomida'] = 1;

        //Se inserta plato
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);
        if (isset($_POST['plato'])) {
            $platoInsertado = $_POST['plato'];
            $cal = getCalPlato($platoInsertado);
        } else {
            $platoInsertado = insertPlato($nombre, $link, $cal);
        }

        if ($platoInsertado == 0 || $platoInsertado == false) {
            header('location: ../error.html');
        } else {
            $_SESSION['calDia'] = $_SESSION['calDia'] + $cal;
            $_SESSION['platoInsertado'] = $platoInsertado;
        }


        header("location: formNuevoPlato.php");
    } else if ($_SESSION['comida'] == 'comida' and $_SESSION['ncomida'] == 1) {
        $_SESSION['comida'] = 'cena';
        $_SESSION['ncomida'] = 0;

        //Se inserta plato
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);

        if (isset($_POST['plato'])) {
            $platoInsertado = $_POST['plato'];
            $cal = getCalPlato($platoInsertado);
        } else {
            $platoInsertado = insertPlato($nombre, $link, $cal);
        }

        if ($platoInsertado == 0 || $platoInsertado == false) {
            header('location: ../error.html');
        } else {
            $_SESSION['calDia'] = $_SESSION['calDia'] + $cal;

            $id = insertComida('comida');

            if ($id == 0) {
                header('location: ../error.html');
            } else if (!bindComidaPlato($id, $_SESSION['platoInsertado'])) {
                header('location: ../error.html');
            } else if (!bindComidaPlato($id, $platoInsertado)) {
                header('location: ../error.html');
            }

            $_SESSION['IdsComidas']['comida'] = $id;

            unset($_SESSION['platoInsertado']);
        }

        header("location: formNuevoPlato.php");
    } else if ($_SESSION['comida'] == 'cena' and $_SESSION['ncomida'] == 0 and $_SESSION['ncomida'] < 1) {
        $_SESSION['ncomida'] = 1;

        //Se inserta plato
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);
        if (isset($_POST['plato'])) {
            $platoInsertado = $_POST['plato'];
            $cal = getCalPlato($platoInsertado);
        } else {
            $platoInsertado = insertPlato($nombre, $link, $cal);
        }

        if ($platoInsertado == 0 || $platoInsertado == false) {
            header('location: ../error.html');
        } else {
            $_SESSION['calDia'] = $_SESSION['calDia'] + $cal;
            $_SESSION['platoInsertado'] = $platoInsertado;
        }

        header("location: formNuevoPlato.php");
    } else {
        $_SESSION['comida'] = 'desayuno';
        $_SESSION['ncomida'] = 1;

        //Se inserta plato
        unset($_SESSION['insertplato']);
        unset($_SESSION['erroresplato']);
        if (isset($_POST['plato'])) {
            $platoInsertado = $_POST['plato'];
            $cal = getCalPlato($platoInsertado);
        } else {
            $platoInsertado = insertPlato($nombre, $link, $cal);
        }

        if ($platoInsertado == 0 || $platoInsertado == false) {
            header('location: ../error.html');
        } else {
            $_SESSION['calDia'] = $_SESSION['calDia'] + $cal;

            $id = insertComida('cena');


            if ($id == 0) {
                header('location: ../error.html');
            } else if (!bindComidaPlato($id, $_SESSION['platoInsertado'])) {
                header('location: ../error.html');
            } else if (!bindComidaPlato($id, $platoInsertado)) {
                header('location: ../error.html');
            }

            $_SESSION['IdsComidas']['cena'] = $id;

            $idDia = insertDia($_SESSION['calDia'], '', $_SESSION['dia']);

            if ($idDia == 0) {
                header('location: ../error.html');
            } else {

                foreach ($_SESSION['IdsComidas'] as $clave => $valor) {
                    if (!bindDiaComida($idDia, $valor)) {
                        header('location: ../error.html');
                    }
                }
            }

            $_SESSION['IdsDias'][$_SESSION['dia']] = $idDia;

            $_SESSION['calDia'] = 0;
            unset($_SESSION['platoInsertado']);
        }

        if ($_SESSION['dia'] == 'lunes') {
            $_SESSION['dia'] = 'martes';
        } else if ($_SESSION['dia'] == 'martes') {
            $_SESSION['dia'] = 'miercoles';
        } else if ($_SESSION['dia'] == 'miercoles') {
            $_SESSION['dia'] = 'jueves';
        } else if ($_SESSION['dia'] == 'jueves') {
            $_SESSION['dia'] = 'viernes';
        } else if ($_SESSION['dia'] == 'viernes') {
            $_SESSION['dia'] = 'sabado';
        } else if ($_SESSION['dia'] == 'sabado') {
            $_SESSION['dia'] = 'domingo';
        } else if ($_SESSION['dia'] == 'domingo') {
            //Se acaba la insercion
            unset($_SESSION['insertdieta']);
            unset($_SESSION['erroresdieta']);

            $id = insertDieta($_SESSION['nombreDieta']);
            print($id);
            
            unset($_SESSION['nombreDieta']);
            
            if ($id == 0) {
                header('location: ../error.html');
            } else {

                foreach ($_SESSION['IdsDias'] as $clave => $valor) {
                    print($valor."----");
                    if (!bindDietaComida($id, $valor)) {
                        header('location: ../error.html');
                    }
                }
            }
            $_SESSION['dietaInsertadaExito'] = true;
            header("location: ../admin.php");
            die();
        }
        header("location: formNuevoPlato.php");
    }
}

