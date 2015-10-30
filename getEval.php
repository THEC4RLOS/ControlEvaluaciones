<?php

$user = 'usrSegundoProyecto';
$user2 = 'usrSegundoProyecto';

$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());


$query = "select * from evaluaciones";
$result = pg_query($con, $query) or die("<strong>Error durante la consultabusqueda perfil personas.</strong>");


$rawdata = array();
$i = 0;

while ($registro = pg_fetch_array($result)) {

    $rawdata[$i] = $registro;
    $i++;
}
echo json_encode($rawdata);
?>