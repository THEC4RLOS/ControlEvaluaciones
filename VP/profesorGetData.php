<?php

$user = 'usrSegundoProyecto';
$passwd = '12345';
$db = 'SegundoProyecto';
$port = 5433;
$host = '172.24.28.21';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$con = pg_connect($strCnx) or die("Error de conexion." . pg_last_error());

$user= $_GET["usuario"];
$contra = $_GET["Contra"];

$query = "select personas.nombre,personas.apellido1,personas.apellido2,personas.sexo,funcionarios.cedula,cursos.nombre,horas,creditos,cursos.codigo,semestre,anno,cupo,grupos.idgrupo 
from gruposfuncionarios inner join funcionarios on gruposfuncionarios.cedula=funcionarios.cedula
inner join grupos on gruposfuncionarios.idgrupo=grupos.idgrupo inner join cursos on grupos.codigo=cursos.codigo
inner join personas on funcionarios.cedula=personas.cedula inner join usuarios on usuarios.cedula=funcionarios.cedula where usuarios.contraseña='$contra' and usuarios.cedula='$user'";
$result = pg_query($con, $query) or die("Error durante la consulta de cursos de un profesor.  '$user'");
$rawdata = array();
$i=0;

while ($registro = pg_fetch_array($result)){
        $rawdata[$i] = $registro;
       // echo json_encode($registro);
        $i++;
}

echo json_encode($rawdata);

    