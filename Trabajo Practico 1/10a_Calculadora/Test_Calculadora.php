<?php 
include 'Calculadora.php';

echo "Ingrese el primer digito: ";
$digito1 = trim(fgets(STDIN));
echo "Ingrese el segundo digito: ";
$digito2 = trim(fgets(STDIN));

$testeCalculadora = new Calculadora($digito1,$digito2);
echo $testeCalculadora;

$sumar = $testeCalculadora->sumar();
echo ("\nLa suma de ambos digitos da como resultado: " . $sumar);

$restar = $testeCalculadora->resta();
echo ("\nLa resta de ambos digitos da como resultado: " . $restar);

$multiplicacion = $testeCalculadora->multiplicacion();
echo ("\nLa multiplicacion de ambos digitos da como resultado: " . $multiplicacion);

$division = $testeCalculadora->division();
if ($digito2 == 0) {
    echo ("\nNo se puede realizar esta division por que el segundo digito es igual a 0.");
} else {
    echo ("\nLa division de ambos digitos da como resultado: " . $division);
}
?>