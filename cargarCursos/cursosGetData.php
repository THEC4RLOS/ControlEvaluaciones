<?php
$user = $_REQUEST["user"];
$strconn = "host=172.24.28.21 port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

$query = "SELECT nombre, c.codigo, g.numgrupo from matriculas as m INNER JOIN gruposmatriculas AS gm ON m.idmatricula = gm.idmatricula 
        INNER JOIN grupos AS g ON gm.idgrupos = g.idgrupo
INNER JOIN cursos AS c ON g.codigo = c.codigo WHERE cedula = '$user'";
$result = pg_query($conn, $query) or die("<strong>Error durante la consulta.</strong>");
$myJson = array();
while ($row = pg_fetch_row($result)) {
    $myJson[] = array(
        'nombre' => $row[0],
        'codigo' => $row[1],
        'numero' => $row[2]
    );    
}
echo json_encode($myJson);
