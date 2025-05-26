<?php 
class Calculadora 
{
    // Definimos los atributos pincipales que vamos a utilizar
    private $num1Instancia;
    private $num2Instancia;

    // Metodo costruct
    public function __construct($num1,$num2) {
        $this->num1Instancia = $num1;
        $this->num2Instancia = $num2;
    }

    // Getters
    public function getnum1Instancia(){
        return $this->num1Instancia;
    }
    public function getnum2Instancia(){
        return $this->num2Instancia;
    }

    // Setters
    public function setnum1Instancia($nuevoNumero){
        $this->num1Instancia = $nuevoNumero;
    }
    public function setnum2Instancia($nuevoNumero){
        $this->num2Instancia = $nuevoNumero;
    }

    // Metodos (+,-./.*)
    public function sumar (){
        $num1 = $this->getnum1Instancia();
        $num2 = $this->getnum2Instancia();
        $nuevoValor = ($num1 + $num2);
        return $nuevoValor;
    }

    public function resta(){
        $num1 = $this->getnum1Instancia();
        $num2 = $this->getnum2Instancia();
        $nuevoValor = ($num1 - $num2);
        return $nuevoValor;
    }

    public function multiplicacion(){
        $num1 = $this->getnum1Instancia();
        $num2 = $this->getnum2Instancia();
        $nuevoValor = ($num1 * $num2);
        return $nuevoValor;
    }

    public function division(){
        $num1 = $this->getnum1Instancia();
        $num2 = $this->getnum2Instancia();
        if ($num2 == 0) {
            $nuevoValor = 0;
        } else {
            $nuevoValor = ($num1 / $num2);
        }
        return $nuevoValor;
    }

    // Metodo devolucion o tostring
    public function __toString() //\n
    {
        $cadena = "\n-----------------------------\n". 
        "Digito 1: ". $this->getnum1Instancia() . "\n". 
        "Digito 2: ". $this->getnum2Instancia(). "\n" . 
        "-----------------------------\n"; 
        return $cadena;
    }

}
?>