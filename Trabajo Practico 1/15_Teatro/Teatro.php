<?php
class Teatro {
    // Zona de atributos
    private $nombre;
    private $direccion;
    private $funciones; // Array de 4 funciones, cada una es un array asociativo
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($nombre, $direccion, $funciones) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->funciones = $funciones; // Esperamos un array de 4 arrays asociativos
    }
    // Metodo de acceso (get's)
    public function getNombre() {
        return $this->nombre;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getFunciones() {
        return $this->funciones;
    }
    // Metodos de modificacion (set's)
    public function setNombre($nuevoNombre) {
        $this->nombre = $nuevoNombre;
    }
    public function setDireccion($nuevaDireccion) {
        $this->direccion = $nuevaDireccion;
    }
    public function setNombreFuncion($indice,$nuevoNombre) {
        if ($indice >= 0 && $indice < 4) {
            $indice = ($indice-1);
            $this->funciones[$indice]['nombre'] = $nuevoNombre;
        }
    }
    public function setPrecioFuncion($indice,$nuevoPrecio) {
        if ($indice >= 0 && $indice < 4) {
            $indice = ($indice-1);
            $this->funciones[$indice]['precio'] = $nuevoPrecio;
        }
    }
    // Metodo de caracteres (__toString)
    public function __toString(){
    $cadena = "Nombre del teatro: " . $this->getNombre() . "\n";
    $cadena .= "Dirección del teatro: " . $this->getDireccion() . "\n";
    $cadena .= "Funciones del teatro:\n";
    foreach ($this->getFunciones() as $indice => $funcion) {
        $cadena .= "  Función " . ($indice + 1) . ": " . $funcion['nombre'] . " - $" . $funcion['precio'] . "\n";
    }
    return $cadena;
}

}


?>