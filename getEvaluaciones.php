<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$strconn = "host=localhost port=5433 dbname=SegundoProyecto user=usrSegundoProyecto password=12345";
$conn = pg_connect($strconn) or die ("<strong>Ha ocurrido un error</strong>");

$query = "select * from evaluaciones";
$result = pg_query($conn,$query);


 