<?php
class PartidoFutbol extends Partido{
    // Zona de atributos
    private $coefVariable;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($idpartidoIngresado,$fechaIngresado,$objEquipo1Ingresado,$cantGolesE1Ingresado,$objEquipo2Ingresado,$cantGolesE2Ingresado){
        parent::__construct($idpartidoIngresado,$fechaIngresado,$objEquipo1Ingresado,$cantGolesE1Ingresado,$objEquipo2Ingresado,$cantGolesE2Ingresado);
        $this->coefVariable = 0; # Inicio en 0 por que si o si debe existir una categoria para modificar esta variable
    }
    // Metodos de acceso (get's)
    public function getCoefVariable(){
        return $this->coefVariable;
    }
    // Metodos de Modificacion (set's)
    public function setCoefVariable($nuevoCoeficiente){
        $this->coefVariable = $nuevoCoeficiente;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= ("\nCoeficiente Variable: " . $this->getCoefVariable() . "\n");
        return $cadena;
    }
    // Metodo coeficientePartido()
    public function coeficientePartido(){
        $coeficientePartidoFutbol = parent::coeficientePartido();
            $unEquipo = parent::getObjEquipo1();
            $nombreCategoria = $unEquipo->getObjCategoria()->getDescripcion();
            $coeficientePartidoFutbol = match (true) {
                $nombreCategoria == "Menores" => 0.13,
                $nombreCategoria == "Juveniles" => 0.19,
                $nombreCategoria == "Mayores" => 0.27,
                default => throw new Exception("Categoría desconocida: $nombreCategoria"),
            };
            parent::setCoefBase($coeficientePartidoFutbol);
        return $coeficientePartidoFutbol;
    }
}
?>