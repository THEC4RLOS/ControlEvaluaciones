<?php

$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$idevaluacion = $_GET["idevaluacion"];
//$idgrupo = $_GET[""];
$idgrupo = 51;
$nombre = $_GET["nombre"];
$porcentaje = $_GET["porcentaje"];
// /home/estudiante/NetBeansProjects/Semana 15 - Angular&bootstrap

$query = "ISERT INTO evaluaciones VALUES('$idevaluacion','$idgrupo','$nombre','$porcentaje')";
$result = pg_query($con, $query) or die("<strong>Error durante la consulta de agregar.  '$idevaluacion','$idgrupo','$nombre','$porcentaje' $strCnx </strong>");

if (!$result){
    echo 'false';
}
elseif ($result) {
    echo 'true';
}
    