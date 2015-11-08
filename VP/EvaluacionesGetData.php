<?php

$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$grupoID= $_GET["IG"];


$query = "select * from evaluaciones where evaluaciones.idgrupo='$grupoID' order by idevaluacion asc";
$result = pg_query($con, $query) or die("Error durante la consulta de cursos de un profesor.  '$grupoID'");
$rawdata = array();
$i=0;
while ($registro = pg_fetch_array($result)){

        $rawdata[$i] = $registro;
       // echo json_encode($registro);
        $i++;

}


echo json_encode($rawdata);

    