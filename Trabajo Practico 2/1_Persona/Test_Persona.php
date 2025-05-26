<?php 
include_once 'persona.php';

echo "Ingrese el nombre de la persona: ";
$nombrePersona = trim(fgets(STDIN));

echo "Ingrese el apellido de la persona: ";
$apellidoPersona = trim(fgets(STDIN));

echo "Ingrese el tipo de documento de la persona: ";
$tipoDocPersona = trim(fgets(STDIN));

echo "Ingrese el numero de documento de la persona: ";
$numeroDocPersona = trim(fgets(STDIN));

$testPersona = new persona($nombrePersona,$apellidoPersona,$tipoDocPersona,$numeroDocPersona);
echo $testPersona;
?>