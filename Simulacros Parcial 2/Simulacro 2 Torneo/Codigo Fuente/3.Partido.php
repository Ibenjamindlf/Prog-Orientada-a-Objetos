<?php
class Partido{ 
    // Zona de atributos
    private $idPartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($idpartidoIngresado,$fechaIngresado,$objEquipo1Ingresado,$cantGolesE1Ingresado,$objEquipo2Ingresado,$cantGolesE2Ingresado){
        $this->idPartido = $idpartidoIngresado;
        $this->fecha = $fechaIngresado;
        $this->objEquipo1 = $objEquipo1Ingresado;
        $this->cantGolesE1 = $cantGolesE1Ingresado;
        $this->objEquipo2 = $objEquipo2Ingresado;
        $this->cantGolesE2 = $cantGolesE2Ingresado;
        $this->coefBase = 0.5;
    }
    // Metodos de acceso (get's)
    public function getIdPartido(){
        return $this->idPartido;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }
    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }
    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }
    public function getCoefBase(){
        return $this->coefBase;
    }
    // Metodos de Modificacion (set's)
    public function setIdPartido($nuevoId){
        $this->idPartido = $nuevoId;
    }
    public function setFecha($nuevaFecha){
        $this->fecha = $nuevaFecha;
    }
    public function setObjEquipo1($nuevoObj){
        $this->objEquipo1 = $nuevoObj;
    }
    public function setCantGolesE1($nuevaCantidad){
        $this->cantGolesE1 = $nuevaCantidad;
    }
    public function setObjEquipo2($nuevoObj){
        $this->objEquipo2 = $nuevoObj;
    }
    public function setCantGolesE2($nuevaCantidad){
        $this->cantGolesE2 = $nuevaCantidad;
    }
    public function setCoefBase($nuevoCoef){
        $this->coefBase = $nuevoCoef;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\n". "Identificacion Partido: " . $this->getIdPartido() . "\n");
        $cadena .= ("Fecha: " . $this->getFecha() . "\n");
        $cadena .= ("Equipo 1: ". $this->getObjEquipo1() . "\n");
        $cadena .= ("Cantidad Goles Equipo 1: " . $this->getCantGolesE1() . "\n");
        $cadena .= ("Equipo 2: " . $this->getObjEquipo2() . "\n");
        $cadena .= ("Cantidad Goles Equipo 2: ". $this->getCantGolesE2() . "\n");
        $cadena .= ("Coeficiente Base: " . $this->getCoefBase() . "\n");
        return $cadena;
    }
    // Metodo darGanadores($deporte)
    /* que retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido)
    * en caso de empate debe retornar a los dos equipos.
    */
    public function darEquipoGanador() {
    $equipo1 = $this->getObjEquipo1();
    $equipo2 = $this->getObjEquipo2();
    $goles1 = $this->getCantGolesE1();
    $goles2 = $this->getCantGolesE2();
    $ganador = match (true) {
        $goles1 > $goles2 => $equipo1,
        $goles1 < $goles2 => $equipo2,
        default => [$equipo1, $equipo2]
    };
    return $ganador;
    }
    // Metodo darGanadores($deporte)
    public function darGanadores($deporte){
        $colEquiposEncontrados = null;
        return $colEquiposEncontrados;
    }
    // Metodo coeficientePartido()
    /* retorna el valor obtenido por el coeficiente base, 
    * multiplicado por la cantidad de goles y la cantidad de jugadores.
    */
    public function coeficientePartido(){
        $coeficientePartido = 0;
        $coeficienteBase = $this->getCoefBase();
        $equipo1 = $this->getObjEquipo1();
        $equipo2 = $this->getObjEquipo2();
        $cantJugadoresE1 = $equipo1->getCantJugadores();
        $cantJugadoresE2 = $equipo2->getCantJugadores();
        $cantJugadoresTotales = ($cantJugadoresE1+$cantJugadoresE2);
        $cantGolesE1 = $this->getCantGolesE1();
        $cantGolesE2 = $this->getCantGolesE2();
        $golesTotales = ($cantGolesE1+$cantGolesE2);
        $coeficientePartido = ($coeficienteBase*$golesTotales*$cantJugadoresTotales);
        return $coeficientePartido;
    }
}
?>