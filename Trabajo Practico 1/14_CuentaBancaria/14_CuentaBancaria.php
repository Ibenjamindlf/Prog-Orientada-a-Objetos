<?php 
/*
14. Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
14.b. Los método de acceso de cada uno de los atributos de la clase.
14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
dividido entre 365 aplicado al saldo actual).
14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
14.g. Crear un script Test_CuentaBancari
*/

class CuentaBancaria{
    
    private $numeroDeCuentaInstancia;
    private $dniCuentaInstanica;
    private $saldoCuentaInstancia;
    private $interesAnualCuentaInstancia;

    public function __construct($numeroDeCuenta,$dniCuenta,$saldoCuenta,$interesAnualCuenta) {
        $this->numeroDeCuentaInstancia = $numeroDeCuenta;
        $this->dniCuentaInstanica = $dniCuenta;
        $this->saldoCuentaInstancia = $saldoCuenta;
        $this->interesAnualCuentaInstancia = $interesAnualCuenta;
    }

    // Getteres
    public function getNumeroDeCuentaInstancia(){
        return $this->numeroDeCuentaInstancia;
    }
    public function getDniCuentaInstancia(){
        return $this->dniCuentaInstanica;
    }
    public function getsaldoCuentaInstancia(){
        return $this->saldoCuentaInstancia;
    }
    public function getinteresAnualCuentaInstancia(){
        return $this->interesAnualCuentaInstancia;
    }

    // Setters
    public function setNumeroDeCuentaInstancia($nuevoNumero){
        $this->saldoCuentaInstancia = $nuevoNumero;
    }

    public function setDniCuentaInstancia($nuevoDNI){
        $this->dniCuentaInstanica = $nuevoDNI;
    }

    public function setsaldoCuentaInstancia($nuevoSaldo){
        $this->saldoCuentaInstancia = $nuevoSaldo;
    }

    public function setinteresAnualCuentaInstancia($nuevoInteres){
        $this->interesAnualCuentaInstancia = $nuevoInteres;
    }

    // Acciones & Metodos 
    public function actualizarSaldo() {
        // Obtener el interés anual usando el getter
        $interesAnual = $this->getinteresAnualCuentaInstancia();
        
        // Calcular el interés diario
        $interesDiario = $interesAnual / 365;
        
        // Aplicar el interés al saldo actual
        $saldoActual = $this->getsaldoCuentaInstancia();
        $nuevoSaldo = $saldoActual + ($saldoActual * ($interesDiario / 100)); 
        
        // Actualizar el saldo en la instancia
        $this->setSaldoCuentaInstancia($nuevoSaldo);
        return $nuevoSaldo;
    }
    
    public function depositar($saldoAdepositar){
        $saldoActual = $this->getsaldoCuentaInstancia();
        $nuevoSaldo = ($saldoActual + $saldoAdepositar);
        // Hay que setear el nuevo valor 
        $this->setSaldoCuentaInstancia($nuevoSaldo);
        // hay que retornar el nuevo valor, previamente seteado
        return $nuevoSaldo;
    }

    public function retirar($saldoAretirar){
        $respuesta = false;
        $saldoActual = $this->getsaldoCuentaInstancia();
        $nuevoSaldo = $saldoActual - $saldoAretirar;
        if ($nuevoSaldo >= 0) {
            $this->setsaldoCuentaInstancia($nuevoSaldo);//setear el valor de la cuenta
            $respuesta = true; 
        }
        return $respuesta;
    }

    public function __toString() //\n
    {
        $cadena = "-----Datos de la cuenta ingresada-----\n" .
        "Numero de cuenta: " . $this->getNumeroDeCuentaInstancia() . "\n" .
        "DNI de la cuenta: " . $this->getDniCuentaInstancia() . "\n" .
        "Saldo: " . $this->getsaldoCuentaInstancia() . "\n" .
        "Interes anual de la cuenta: " . $this->getinteresAnualCuentaInstancia(). "\n";
        return $cadena;
    }

}
?>
