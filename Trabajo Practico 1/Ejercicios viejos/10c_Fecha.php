<?php 
/* 
Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y
necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función
incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado
de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.
*/

// Atributos o caracteristicas: dia,mes,año
// Metodos: incremento


class Fecha{

    private $diaInstancia;
    private $mesInstancia;
    private $añoInstancia;

    public function __construct($dia,$mes,$año) {
        $this->diaInstancia = $dia;
        $this->mesInstancia = $mes;
        $this->añoInstancia = $año;
    }
    public function getdiaInstancia(){
        return $this->diaInstancia;
    }
    public function getmesInstancia(){
        return $this->mesInstancia;
    }
    public function getañoInstancia(){
        return $this->añoInstancia;
    }
    
    public function getFechaAbreviada() {
        return sprintf("%02d/%02d/%04d", $this->diaInstancia, $this->mesInstancia, $this->añoInstancia);
    }
    
    public function getFechaExtendida() {
        $nombresMeses = [1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril", 5 => "mayo", 
                        6 => "junio", 7 => "julio", 8 => "agosto", 9 => "septiembre", 
                        10 => "octubre", 11 => "noviembre", 12 => "diciembre"];
        
        return sprintf("%02d de %s de %04d", $this->diaInstancia, $nombresMeses[$this->mesInstancia], $this->añoInstancia);
    }
    
    public function esBisiesto() {
        return ($this->añoInstancia % 4 == 0 && $this->añoInstancia % 100 != 0) || ($this->añoInstancia % 400 == 0);
    }
    
    public function diasEnMes($mes) {
        $diasPorMes = [1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 
                        7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];
    
        if ($mes == 2 && $this->esBisiesto()) {
            return 29;
        }
    
        return $diasPorMes[$mes];
    }
    
    public function incremento($dias) {
        while ($dias > 0) {
            $diasDelMes = $this->diasEnMes($this->mesInstancia); // Cuántos días tiene el mes actual
    
            if ($this->diaInstancia + $dias > $diasDelMes) { 
                // Si al sumar los días nos pasamos del mes actual
                $dias -= ($diasDelMes - $this->diaInstancia + 1); // Restamos los días que faltan para el próximo mes
                $this->diaInstancia = 1; // Pasamos al primer día del siguiente mes
                $this->mesInstancia++; // Aumentamos el mes
    
                if ($this->mesInstancia > 12) { // Si pasamos diciembre, avanzamos al próximo año
                    $this->mesInstancia = 1;
                    $this->añoInstancia++;
                }
            } else {
                // Si todavía estamos dentro del mismo mes
                $this->diaInstancia += $dias;
                $dias = 0;
            }
        }
    }
    public function __toString() {
        return "Fecha ingresada formato abreviado: " . $this->getFechaAbreviada() . "\nFecha Ingresada formato Extendido: " . $this->getFechaExtendida() . "\n";
    }


}

$fecha = new Fecha(24, 6, 2024); // 28 de febrero de 2024 (año bisiesto)
echo $fecha; // Siempre se llama un eco con la devolucion del objeto

$fecha->incremento(5); // llamamos al metodo que queramos emplear
echo "Fecha con aumento de dias:\n" . $fecha;
?>