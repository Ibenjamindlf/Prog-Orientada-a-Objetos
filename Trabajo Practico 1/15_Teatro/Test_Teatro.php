<?php
include_once 'Teatro.php';

$funciones = [
    ['nombre' => 'Obra 1', 'precio' => 1000],
    ['nombre' => 'Obra 2', 'precio' => 1200],
    ['nombre' => 'Obra 3', 'precio' => 900],
    ['nombre' => 'Obra 4', 'precio' => 1100],
];

$teatro = new Teatro('Teatro Colón', 'Calle Falsa 123', $funciones);
echo $teatro;
// Cambiar nombre del teatro
$teatro->setNombre('Nuevo Teatro Colón');

// Cambiar precio de la función 2
$teatro->setPrecioFuncion(1, 1500);

?>