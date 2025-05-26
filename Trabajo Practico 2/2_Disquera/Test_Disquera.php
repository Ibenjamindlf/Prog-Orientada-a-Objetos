<?php
include_once 'disquera.php';
include_once 'persona.php';

$persona = new persona("paco","fernandez","DNI","44628595");
$testDisq = new disquera(12,00,18,00,true,"Calle falsa 123",$persona);

echo ("¿A que hora desea ingresar a nuestra disquera?\n");

echo ("Hora: ");
$horaUsuarioString = trim(fgets(STDIN));
echo ("Minutos: ");
$minutosUsuarioString = trim(fgets(STDIN));

$horaUsuarioEntero = (int) $horaUsuarioString;
$minutosUsuarioEntero = (int) $minutosUsuarioString;

$testHorarioAtencion = $testDisq->dentroHorarioAtencion($horaUsuarioEntero,$minutosUsuarioEntero);

if ($testHorarioAtencion){
    $testdisqAbierta = $testDisq->abrirDisquera($horaUsuarioEntero,$minutosUsuarioEntero);
    echo $testDisq;
} else {
    $testdisqCerrada = $testDisq->cerrarDisquera($horaUsuarioEntero,$minutosUsuarioEntero);
    echo $testDisq;
}

?>