<?php
include_once 'Persona.php';
include_once 'Disquera.php';

$persona = new persona("Pablo","Fernandez","DNI","44628595");
$testDisq = new disquera(12,00,18,00,"","Calle falsa 123",$persona); 
# Yo doy por hecho que tanto horas como minutos van a ser valores reales y validos, este test no valida si por ejemplo ingresan 99 horas sea valido o no
# En testDisq inicio la varibale estado como vacia ya que aun no abri, ni cerre la disquera
echo $testDisq; 
# en echo $testDisq; estoy "escribiendo" el objeto que cree, en este punto estado esta en vacio, por eso es que en la terminal aparece Estado de la disquera: (sin nada a continuacion) 
$disqueraAbierta = $testDisq->abrirDisquera(12,30);
# en $disqueraAbierta = $testDisq->abrirDisquera(12,30); llamo al metodo que creamos para abrir la disquera
echo ("\n" ."+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" . "\n" . $testDisq);
# como anteriormente llame al metodo abrirDisquera, ahora Estado de la disquera: Abierta, dado a que se actualizo el estado de estado 
$disqueraCerrada = $testDisq->cerrarDisquera(18,30);
# en $disqueraCerrada = $testDisq->cerrarDisquera(18,30); llamo al metodo pero esta vez para cerrar la disquera
echo ("\n" ."+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" . "\n" . $testDisq);
# como anteriormente llame al metodo cerrarDisquera, ahora Estado de la disquera: Cerrada, dado a que se actualizo el estado de estado 

?>