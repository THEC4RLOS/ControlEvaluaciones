<?php

$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$grupoID= $_GET["IG"];
$persona= $_GET["CD"];

$query = "(select p.cedula,e.idevaluacion, (p.nombre||' '||apellido1||' '||apellido2) as nombre, 0 as nota 
from personas p inner join matriculas m
on p.cedula = m.cedula
inner join gruposmatriculas gm
on m.idmatricula = gm.idmatricula
inner join grupos g
on gm.idgrupos = g.idgrupo
inner join evaluaciones e
on g.idgrupo = e.idgrupo
where g.idgrupo = '$grupoID' and p.cedula='$persona')
except
(select p.cedula ,e.idevaluacion,(p.nombre||' '||apellido1||' '||apellido2) as nombre,0 as nota 
from personas p inner join evaluaciones_estudiantes ee
on p.cedula = ee.cedula
inner join evaluaciones e
on ee.idevaluacion = e. idevaluacion inner join grupos on grupos.idgrupo=e.idgrupo
where p.cedula='$persona' and  grupos.idgrupo='$grupoID')

union
select p.cedula, e.idevaluacion,(p.nombre||' '||apellido1||' '||apellido2) as nombre, ee.nota 
from personas p inner join evaluaciones_estudiantes ee
on p.cedula = ee.cedula
inner join evaluaciones e
on ee.idevaluacion = e. idevaluacion 
inner join grupos on grupos.idgrupo=e.idgrupo
where p.cedula='$persona' and  grupos.idgrupo='$grupoID' order by idevaluacion Asc
";
$result = pg_query($con, $query) or die("Error durante la consulta de cursos de un profesor.  '$grupoID'");
$rawdata = array();
$i=0;
while ($registro = pg_fetch_array($result)){

        $rawdata[$i] = $registro;
       // echo json_encode($registro);
        $i++;

}


echo json_encode($rawdata);

    