<?php
$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "SELECT personas.cedula,contraseña,tipo,nombre,apellido1,apellido2 FROM usuarios INNER JOIN personas on usuarios.cedula = personas.cedula where usuarios.cedula = '$user' AND usuarios.\"contraseña\" = '$pass';";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");
$myJson = array();
if ($row = pg_fetch_row($result)) {
    $myJson[] = array(
    'user' => $row[0],
    'pass' => $row[1],
    'type' => $row[2],
    'nombreCompleto' => $row[3]." ".$row[4]." ".$row[5]
    );
    echo json_encode($myJson[0]);
}
else{
    echo "false";
}