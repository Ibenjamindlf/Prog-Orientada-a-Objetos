<?php 
class CuentaBancaria {
    private $numeroDeCuentaInstancia;
    private $personaCuentaInstancia; // Ahora almacena un objeto Persona
    private $saldoCuentaInstancia;
    private $interesAnualCuentaInstancia;

    public function __construct($numeroDeCuenta, $persona, $saldoCuenta, $interesAnualCuenta) {
        $this->numeroDeCuentaInstancia = $numeroDeCuenta;
        $this->personaCuentaInstancia = $persona; // Se recibe un objeto Persona
        $this->saldoCuentaInstancia = $saldoCuenta;
        $this->interesAnualCuentaInstancia = $interesAnualCuenta;
    }

    // Getters
    public function getNumeroDeCuentaInstancia() {
        return $this->numeroDeCuentaInstancia;
    }
    public function getPersonaCuentaInstancia() {
        return $this->personaCuentaInstancia; // Retorna el objeto Persona
    }
    public function getSaldoCuentaInstancia() {
        return $this->saldoCuentaInstancia;
    }
    public function getInteresAnualCuentaInstancia() {
        return $this->interesAnualCuentaInstancia;
    }

    // Setters
    public function setNumeroDeCuentaInstancia($nuevoNumero) {
        $this->numeroDeCuentaInstancia = $nuevoNumero;
    }
    public function setPersonaCuentaInstancia($nuevaPersona) {
        $this->personaCuentaInstancia = $nuevaPersona;
    }
    public function setSaldoCuentaInstancia($nuevoSaldo) {
        $this->saldoCuentaInstancia = $nuevoSaldo;
    }
    public function setInteresAnualCuentaInstancia($nuevoInteres) {
        $this->interesAnualCuentaInstancia = $nuevoInteres;
    }

    // Acciones & Métodos 
    public function actualizarSaldo() {
        $interesDiario = $this->interesAnualCuentaInstancia / 365;
        $this->saldoCuentaInstancia += $this->saldoCuentaInstancia * ($interesDiario / 100);
        return $this->saldoCuentaInstancia;
    }

    public function depositar($saldoAdepositar) {
        $this->saldoCuentaInstancia += $saldoAdepositar;
        return $this->saldoCuentaInstancia;
    }

    public function retirar($saldoAretirar) {
        if ($this->saldoCuentaInstancia >= $saldoAretirar) {
            $this->saldoCuentaInstancia -= $saldoAretirar;
            return true;
        }
        return false;
    }

    public function __toString() {
        return $this->personaCuentaInstancia . "\n" .
        "----- Datos de la cuenta -----\n" .
        "Número de cuenta: " . $this->numeroDeCuentaInstancia . "\n" .
        "Saldo: " . $this->saldoCuentaInstancia . "\n" .
        "Interés anual: " . $this->interesAnualCuentaInstancia . "%\n";

    }
}

?>