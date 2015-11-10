<?php

$codigo = $_REQUEST["codigo"];
$grupo = $_REQUEST["grupo"];
$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "select evaluaciones.idevaluacion, evaluaciones.idgrupo, evaluaciones.nombre, evaluaciones.porcentaje from cursos "
        . "inner join grupos on cursos.codigo = grupos.codigo "
        . "inner join evaluaciones on grupos.idgrupo = evaluaciones.idgrupo "
        . "where cursos.codigo = '$codigo' and grupos.idgrupo = '$grupo'";

$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");

$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'idevaluacion' => $row[0],
        'idgrupo' => $row[1],
        'nombre' => $row[2],
        'porcentaje' => $row[3]
    );
}
echo json_encode($myJson);
