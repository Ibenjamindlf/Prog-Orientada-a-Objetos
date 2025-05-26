<?php
include_once 'Persona.php';
include_once 'CuentaBancaria.php';

// Crear un objeto Persona
$persona = new Persona("Juan", "Pérez", "DNI", "12345678");

// Crear una cuenta bancaria con la persona asociada
$cuenta = new CuentaBancaria(1001, $persona, 5000, 5);

// Mostrar la información de la cuenta bancaria
echo $cuenta;
?>
