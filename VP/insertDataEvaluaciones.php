<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$grupo= $_GET["GP"];
$nombre = $_GET["NR"];
$porcentaje = $_GET["PJ"];
$otroquery="INSERT INTO evaluaciones(
            idgrupo, nombre, porcentaje)
    VALUES ('$grupo', '$nombre', $porcentaje)";
$result2 = pg_query($con, $otroquery)or die("Error");;
echo "INSERT INTO evaluaciones(
            idgrupo, nombre, porcentaje)
    VALUES ('$grupo', '$nombre', $porcentaje)";

