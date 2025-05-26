<?php
class Calculadora {
    private $numero1Inst; // Creamos atributos privados para protegerlos y que solo se puedan modificar dentro del objeto
    private $numero2Inst;

    // inicializamos los atributos del objeto con valores específicos (Aclarados en $calc = new Calculadora()).
    // Asignamos los valores de $numero1 (creado con construct) a $numero1Inst (creado como atributo privado previamente).
    public function __construct($numero1 , $numero2) { //$numero1 y $numero2 → Son los valores que pasamos como parámetros al crear el objeto.
        $this->numero1Inst = $numero1; // El atributo numero1Inst del objeto toma el valor de $numero1 pasado en la creación.
        $this->numero2Inst = $numero2; //  El atributo numero2Inst del objeto toma el valor de $numero2 pasado en la creación.
    }

    // La funcion getter lo que nos permite es poder obtener el valor de un atributo privado
    public function getnumero1Inst(){
		return $this->numero1Inst;
	} // Como los atributos son privados no se pueden obtener fuera de la clase
    public function getnumero2Inst(){
		return $this->numero2Inst;
	}
    // A su vez, ayuda a mantener la privacidad del codigo y de los atributos 

    // Metodo para sumar dos valores
    public function sumar() {
        return $this->numero1Inst + $this->numero2Inst;
        // Retorna la suma de los numeros 
    }

    // Método para restar
    public function restar() {
        return $this->numero1Inst - $this->numero2Inst;
        // Retorna la resta de los numeros
    }

    // Método para multiplicar
    public function multiplicar() {
        return $this->numero1Inst * $this->numero2Inst;
        // Retorna la multiplicacion de los numeros 
    }

    // Método para dividir (con verificación de división por cero)
    public function dividir() {
        if ($this->numero2Inst == 0) {
            return "Error: No se puede dividir por cero. ❌";
        } // El return, lo que hace es retornar una cadena de caracteres, por es no va con un echo, ya que eso se establecer fuera del objeto
        return $this->numero1Inst / $this->numero2Inst;        
    } // Retorna la division de los numeros

    // Funcion para devolver una cadena de texto que representa al objeto.
    public function __toString() {
        return "Numero 1: " . $this->getnumero1Inst() . "\nNumero 2: " . $this->getnumero2Inst() . "\n";
    } // Se usa get para poder obtener los valores de los atributos, ya que son privados y los retorna en una cadena representativa para el usuario cuando se lo invoque
}

// Verificacion de la calculadora 
$calc = new Calculadora(10, 0);
echo $calc; // Muestra los números
echo "Suma: " . $calc->sumar() . "\n";
echo "Resta: " . $calc->restar() . "\n";
echo "Multiplicación: " . $calc->multiplicar() . "\n";
echo "División: " . $calc->dividir() . "\n";
?>