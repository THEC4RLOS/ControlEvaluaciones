<?php

$user = $_REQUEST["user"];
$codigo = $_REQUEST["codigo"];
$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "select cursos.nombre, evaluaciones.nombre, citasrevision.fecha, citasrevision.hora_inicio,citasrevision.hora_fin, CONCAT(personas.nombre,' ',personas.apellido1,' ',personas.apellido2) AS nombrecompleto, evaluaciones.idevaluacion from gruposfuncionarios "
        . "inner join grupos on gruposfuncionarios.idgrupo = grupos.idgrupo "
        . "inner join cursos on grupos.codigo = cursos.codigo "
        . "inner join evaluaciones on grupos.idgrupo = evaluaciones.idgrupo "
        . "inner join citasrevision on evaluaciones.idevaluacion = citasrevision.idevaluacion "
        . "inner join citasrevision_estudiantes on citasrevision.idcita = citasrevision_estudiantes.idcita "
        . "inner join personas on citasrevision_estudiantes.cedula = personas.cedula "
        . "where gruposfuncionarios.cedula = '$user' and cursos.codigo = '$codigo'";

$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");

$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'nombrecurso' => $row[0],
        'nombreevaluacion' => $row[1],
        'fecha' => $row[2],
        'hora_inicio' => $row[3],
        'hora_fin' => $row[4],
        'nombreestudiante' => $row[5],
        'idevaluacion' => $row[6]
    );
}
echo json_encode($myJson);
