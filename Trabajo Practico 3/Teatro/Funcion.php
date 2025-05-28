<?php
# las funciones sean un objeto que tenga las
# variables nombre, horario de inicio, duración de la obra y precio
# nombre, horario de inicio,duración y precio.
class Actividad{
    // Zona de atributos
    private $nombre;
    private $horaInicio;
    private $duracionObra;
    private $precio;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($nombreIng,$horaInicioIng,$duracionObraIng,$precioIng) {
        $this->nombre = $nombreIng;
        $this->horaInicio = $horaInicioIng;
        $this->duracionObra = $duracionObraIng;
        $this->precio = $precioIng;
    }
    // Metodos de modificacion (Get's)
    public function getNombre() {
        return $this->nombre;
    }
    public function getHoraInicio() {
        return $this->horaInicio;
    }
    public function getDuracionObra() {
        return $this->duracionObra;
    }
    public function getPrecio() {
        return $this->precio;
    }
    // Metodos de modificacion (Set's)
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }
    public function setDuracionObra($duracionObra) {
        $this->duracionObra = $duracionObra;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = "\nNombre de la actividad: " . $this->getNombre() . "\n";
        $cadena .= "Hora de inicio de la actividad: " . $this->getHoraInicio() . "\n";
        $cadena .= "Duracion de la actividad: " . $this->getDuracionObra() . "\n";
        $cadena .= "Precio de la actividad: " . $this->getPrecio() . "\n";
        return $cadena;
    }
}
?>