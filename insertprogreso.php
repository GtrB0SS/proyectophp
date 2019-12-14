<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (is_uploaded_file ($_FILES['img']['tmp_name']))
{
   $nombreDirectorio = "img/";
   $idUnico = time();
   $nombreFichero = $idUnico . "-" . $_FILES['img']['name'];

   move_uploaded_file ($_FILES['img']['tmp_name'],
      $nombreDirectorio . $nombreFichero);
}
else
   print ("No se ha podido subir el fichero\n");
