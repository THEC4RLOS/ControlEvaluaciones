<?php

$user = $_REQUEST["user"];
$idcita = $_REQUEST["idcita"];


$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";

// Create connection
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

// Check connection
/*if ($conn->connect_error) {
    die("<strong>Ha ocurrido un error con la coneccion la base de datos.</strong><br>Error: ". $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}*/

$query = "insert into citasrevision_estudiantes values ('$user', '$idcita')";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");

if (!$result) {
    echo "false"; //no agrego
} elseif ($result) {
    echo "true"; //usuario agregado
}