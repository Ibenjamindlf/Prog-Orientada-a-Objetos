<?php
include_once 'Teatro.php';
include_once 'Funcion.php';

// $funciones = [
//     ['nombre' => 'Obra 1', 'precio' => 1000],
//     ['nombre' => 'Obra 2', 'precio' => 1200],
//     ['nombre' => 'Obra 3', 'precio' => 900],
//     ['nombre' => 'Obra 4', 'precio' => 1100],
// ];

// $teatro = new Teatro('Teatro Colón', 'Calle Falsa 123', $funciones);
// echo $teatro;
// // Cambiar nombre del teatro
// $teatro->setNombre('Nuevo Teatro Colón');

// // Cambiar precio de la función 2
// $teatro->setPrecioFuncion(1, 1500);

$funcion1 = new Funcion("Pinocho","11:00","60",50);
$funcion2 = new Funcion("Cars","14:00","60",10);
$funcion3 = new Funcion("Shek","16:00","120",25);

$teatro = new Teatro("Centro culturar Cipolletti","Avenida X",[$funcion1,$funcion2,$funcion3]);
echo $teatro;

$nuevaFuncion = new Funcion("Aviones","11:30","60",80);
$teatro->cargarFuncion($nuevaFuncion);
echo $teatro;

?>