<?php

$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$Idgrupo= $_GET["IG"];

$query = "select personas.nombre,matriculas.cedula,gruposmatriculas.idmatricula,cursos.nombre,grupos.idgrupo,grupos.semestre,grupos.anno,grupos.cupo, gruposmatriculas.nota
from cursos inner join grupos on cursos.codigo=grupos.codigo inner join gruposmatriculas on gruposmatriculas.idgrupos=grupos.idgrupo inner join matriculas on gruposmatriculas.idmatricula=matriculas.idmatricula inner join personas on matriculas.cedula=personas.cedula
where grupos.idgrupo='$Idgrupo'";
$result = pg_query($con, $query) or die("Error durante la consulta de cursos de un profesor.  '$Idgrupo'");
$rawdata = array();
$i=0;
while ($registro = pg_fetch_array($result)){

        $rawdata[$i] = $registro;
       // echo json_encode($registro);
        $i++;

}


echo json_encode($rawdata);

    