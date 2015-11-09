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

$cedula= $_GET["cedula"];
$nota = $_GET["nota"];
$eval = $_GET["evaluacion"];

$query = "UPDATE evaluaciones_estudiantes SET nota = '$nota' WHERE cedula = '$cedula' and idevaluacion='$eval'";
$result = pg_query($con, $query) or die("Error durante la actualizacion de una nota");
echo "UPDATE evaluaciones_estudiantes SET nota = '$nota' WHERE cedula = '$cedula' and idevaluacion='$eval'";