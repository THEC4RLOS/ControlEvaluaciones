<?php
$user = $_REQUEST["user"];

$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

/*$query = "select citasrevision.idcita, evaluaciones.idevaluacion, citasrevision.fecha, citasrevision.hora_inicio, citasrevision.hora_fin, evaluaciones.nombre, evaluaciones.porcentaje "
        . "from citasrevision_estudiantes "
        . "inner join citasrevision on citasrevision_estudiantes.idcita = citasrevision.idcita "
        . "inner join evaluaciones on citasrevision.idevaluacion = evaluaciones.idevaluacion "
        . "where citasrevision_estudiantes.cedula = '$user'";*/
$query = "select citasrevision.idcita, evaluaciones.idevaluacion, citasrevision.fecha, citasrevision.hora_inicio, citasrevision.hora_fin, evaluaciones.nombre, evaluaciones.porcentaje, cursos.nombre from citasrevision_estudiantes "
        . "inner join citasrevision 	on citasrevision_estudiantes.idcita = citasrevision.idcita "
        . "inner join evaluaciones 	on citasrevision.idevaluacion = evaluaciones.idevaluacion "
        . "inner join matriculas 	on matriculas.cedula = citasrevision_estudiantes.cedula "
        . "inner join gruposmatriculas 	on gruposmatriculas.idmatricula = matriculas.idmatricula "
        . "inner join grupos            on grupos.idgrupo=gruposmatriculas.idgrupos and grupos.idgrupo=evaluaciones.idgrupo "
        . "inner join cursos 		on cursos.codigo=grupos.codigo where citasrevision_estudiantes.cedula = '$user'";

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