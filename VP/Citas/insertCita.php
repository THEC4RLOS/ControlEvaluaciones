<?php

$idevaluacion = $_REQUEST["idevaluacion"];
$fecha = $_REQUEST["fecha"];
$hora_inicio = $_REQUEST["hora_inicio"];
$hora_fin = $_REQUEST["hora_fin"];

$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";

$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "insert into citasrevision (idevaluacion, fecha, hora_inicio, hora_fin) values ($idevaluacion, '$fecha', '$hora_inicio', '$hora_fin')";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");

if (!$result) {
    echo "false";
} elseif ($result) {
    echo "true";
}