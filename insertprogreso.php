<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$peso = $_POST['peso'];
$medidas = $_POST['medidas'];
$fecha = $_POST['fecha'];


if (is_uploaded_file ($_FILES['img']['tmp_name']))
{
   $nombreDirectorio = "img/";
   $idUnico = time();
   $nombreFichero = $idUnico . "-" . $_FILES['img']['name'];

   move_uploaded_file ($_FILES['img']['tmp_name'],
      $nombreDirectorio . $nombreFichero);
   $nombreFichero = $nombreDirectorio . $nombreFichero;
}
else
   $nombreFichero = "img/img.jpg"; //Imagen por defecto

