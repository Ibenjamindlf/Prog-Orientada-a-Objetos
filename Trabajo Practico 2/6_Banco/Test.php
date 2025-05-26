<?php
include_once '3_Cliente.php';
include_once '4_Tramite.php';
include_once '5_Persona.php';

$test1 = new persona("Pedo","Alvarez","DNI","123456");
$test2 = new Tramite("Deposito","12:00");
$test3 = new cliente($test1,$test2);

?>