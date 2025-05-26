<?php
include '14_CuentaBancaria.php';
$testeCuentaBancaria = new CuentaBancaria(77,446,10,10);
echo $testeCuentaBancaria;

$nuevoSaldo = $testeCuentaBancaria->actualizarSaldo(3);
echo ("\nEl saldo se actualizo de manera correcta\n\n") . $testeCuentaBancaria;

$nuevoSaldo = $testeCuentaBancaria->depositar(10);
echo ("\nEl saldo se deposito de manera correcta\n\n") . $testeCuentaBancaria;

$respuesta = $testeCuentaBancaria->retirar(3);
if ($respuesta){
    echo ("\nEl saldo se retiro de manera correcta\n\n") . $testeCuentaBancaria;
} else {
    echo ("Error: No se puede retirar por que la cuenta no dispone de saldo suficiente");
}

?>