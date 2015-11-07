<?php
//este php realiza la consulta para obtener el nombre de la evaluacion, la nota obtenida y el porcentaje
// de la misma
$user = $_REQUEST["user"];//cedula del usuario
$code = $_REQUEST["code"];// codigo del curso que el usuario solicita ver
$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "select evaluaciones.nombre, evaluaciones_estudiantes.nota, evaluaciones.porcentaje

from personas

inner join estudiantes 			on estudiantes.cedula = personas.cedula
inner join evaluaciones_estudiantes 	on evaluaciones_estudiantes.cedula=personas.cedula
inner join evaluaciones 		on evaluaciones.idevaluacion=evaluaciones_estudiantes.idevaluacion
inner join matriculas 			on matriculas.cedula = estudiantes.cedula
inner join gruposmatriculas 		on gruposmatriculas.idmatricula = matriculas.idmatricula
inner join grupos 			on grupos.idgrupo=gruposmatriculas.idgrupos and grupos.idgrupo=evaluaciones.idgrupo
inner join cursos 			on cursos.codigo=grupos.codigo
where personas.cedula='$user' and cursos.codigo = '$code'";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");
$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'nombre' => $row[0],
        'nota' => $row[1],
        'porcentaje' => $row[2]
    );    
}
echo json_encode($myJson);


