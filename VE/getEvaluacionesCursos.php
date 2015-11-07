<?php
$user = $_REQUEST["user"];

$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "select evaluaciones.nombre, evaluaciones_estudiantes.nota, cursos.nombre from personas "
        . "inner join estudiantes on estudiantes.cedula = personas.cedula "
        . "inner join evaluaciones_estudiantes 	on evaluaciones_estudiantes.cedula=personas.cedula "
        . "inner join evaluaciones on evaluaciones.idevaluacion=evaluaciones_estudiantes.idevaluacion "
        . "inner join matriculas on matriculas.cedula = estudiantes.cedula "
        . "inner join gruposmatriculas on gruposmatriculas.idmatricula = matriculas.idmatricula "
        . "inner join grupos on grupos.idgrupo=gruposmatriculas.idgrupos and grupos.idgrupo=evaluaciones.idgrupo "
        . "inner join cursos on cursos.codigo=grupos.codigo where personas.cedula='$user'";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");
/*$rawdata = array();
$i=0;
while ($registro = pg_fetch_array($result)){
        $rawdata[$i] = $registro;
       // echo json_encode($registro);
        $i++;
}echo json_encode($rawdata);*/

$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'nombre' => $row[0],
        'nota' => $row[1],
        'curso' => $row[2]
    );    
}
echo json_encode($myJson);