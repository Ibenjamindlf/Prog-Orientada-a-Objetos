<?php 
/* Diseñar e implementar la clase Reloj que simule el comportamiento de un cronómetro digital
(con los comportamientos: puesta_a_cero, incremento, etc.). Cuando el contador llegue a 23:59:59 y
reciba el mensaje de incremento deberá pasar a 00:00:00. */

// Atributos o Caracteristicas: Horas.Minutos y Segundos.
// Acciones o Metodos: puesta_a_cero, incremeto,


class Reloj {

    private $horasInstancia;
    private $minutosInstancia;
    private $segundosInstancia;

    public function __construct($horas,$minutos,$segundos) {
    $this->horasInstancia = $horas;
    $this->minutosInstancia = $minutos;
    $this->segundosInstancia = $segundos;
}

    public function gethorasInstancia() {
        return sprintf("%02d", $this->horasInstancia);
}
    public function getminutosInstancia(){
        return sprintf("%02d", $this->minutosInstancia);
}
    public function getsegundosInstancia(){
        return sprintf("%02d", $this->segundosInstancia);
}

 // Método para poner el reloj a 00:00:00
    public function puesta_a_cero() {
        $this->horasInstancia = 0;
        $this->minutosInstancia = 0;
        $this->segundosInstancia = 0;
}

// Método para incrementar el reloj en 1 segundo
public function incrementar() {
    $this->segundosInstancia++;

    if ($this->segundosInstancia == 60) { 
        $this->segundosInstancia = 0;
        $this->minutosInstancia++;

        if ($this->minutosInstancia == 60) {
            $this->minutosInstancia = 0;
            $this->horasInstancia++;

            if ($this->horasInstancia >= 24) {
                $this->puesta_a_cero();  // Llamamos al método para resetear el reloj
            }
        }
    }
}
 // Método __toString para devolver la hora formateada
 public function __toString() {
    return "Horas:" . $this->gethorasInstancia() . " Minutos:" . $this->getminutosInstancia() . " Segundos:" . $this->getsegundosInstancia() . "\n";
    // return "Numero 1: " . $this->getnumero1Inst() . "\nNumero 2: " . $this->getnumero2Inst() . "\n";
}
}

// 🌟 Prueba del reloj
$reloj = new Reloj(23, 59, 59);

echo $reloj . "\n";  // 23:59:58
$reloj->incrementar();
echo $reloj . "\n";  // 23:59:59
$reloj->incrementar();
echo $reloj . "\n";  // 00:00:00 ✅


?>