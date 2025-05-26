<?php
class Equipo{
    // Zona de atributos
    private $nombre;
	private $capitan;
	private $cantJugadores;
	private $objCategoria;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($nombreIngresado,$capitanIngresado,$cantJugadoresIngresado,$objCategoriaIngresado){
		$this->nombre=$nombreIngresado;
		$this->capitan= $capitanIngresado;
		$this->cantJugadores=$cantJugadoresIngresado;
		$this->objCategoria=$objCategoriaIngresado;
	}
    // Metodos de acceso (get's)
    public function getNombre(){
        return $this->nombre;
    }
    public function getCapitan(){
        return $this->capitan;
    }
    public function getCantJugadores(){
        return $this->cantJugadores;
    }
    public function getObjCategoria(){
        return $this->objCategoria;
    }
    // Metodos de Modificacion (set's)
        public function setNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }
    public function setCapitan($nuevoCapitan){
        $this->capitan = $nuevoCapitan;
    }
    public function setCantJugadores($nuevaCantidad){
        $this->cantJugadores = $nuevaCantidad;
    }
    public function setObjCategoria($nuevoObj){
        $this->objCategoria = $nuevoObj;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\nNombre Equipo: ". $this->getNombre() . "\n");
        $cadena .= ("Capitan Equipo: " . $this->getCapitan() . "\n");
        $cadena .= ("Cantidad Jugadores: " . $this->getCantJugadores() . "\n");
        $cadena .= ("Categoria: " . $this->getObjCategoria() . "\n");
        return $cadena;
    }
    // Metodo _____
}
?>