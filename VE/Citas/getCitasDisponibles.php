<?php

$user = $_REQUEST["user"];

$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "select citasrevision.idcita, evaluaciones.idevaluacion, citasrevision.fecha, citasrevision.hora_inicio, citasrevision.hora_fin, evaluaciones.nombre, evaluaciones.porcentaje, cursos.nombre from cursos "
        . "inner join grupos on cursos.codigo = grupos.codigo "
        . "inner join gruposmatriculas on grupos.idgrupo = gruposmatriculas.idgrupos "
        . "inner join matriculas on gruposmatriculas.idmatricula = matriculas.idmatricula "
        . "inner join estudiantes on matriculas.cedula = estudiantes.cedula "
        . "inner join evaluaciones on grupos.idgrupo = evaluaciones.idgrupo "
        . "inner join citasrevision on evaluaciones.idevaluacion = citasrevision.idevaluacion "
        . "where estudiantes.cedula = '$user' and cursos.codigo in "
        . "(select cursos.codigo from cursos "
        . "inner join grupos on cursos.codigo = grupos.codigo "
        . "inner join gruposmatriculas on grupos.idgrupo = gruposmatriculas.idgrupos "
        . "inner join matriculas on gruposmatriculas.idmatricula = matriculas.idmatricula "
        . "inner join estudiantes on matriculas.cedula = estudiantes.cedula "
        . "where estudiantes.cedula = '$user') and evaluaciones.nombre not in "
        . "(select evaluaciones.nombre from evaluaciones "
        . "inner join citasrevision on citasrevision.idevaluacion = evaluaciones.idevaluacion "
        . "inner join citasrevision_estudiantes on citasrevision.idcita = citasrevision_estudiantes.idcita "
        . "inner join estudiantes on citasrevision_estudiantes.cedula = estudiantes.cedula "
        . "where citasrevision_estudiantes.cedula = '$user')";

$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");

$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'idcita' => $row[0],
        'idevaluacion' => $row[1],
        'fecha' => $row[2],
        'hora_inicio' => $row[3],
        'hora_fin' => $row[4],
        'nombre' => $row[5],
        'porcentaje' => $row[6],
        'curso' => $row[7]        
    );    
}
echo json_encode($myJson);