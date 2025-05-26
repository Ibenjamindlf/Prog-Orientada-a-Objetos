<?php
class PartidoBasquet extends Partido{
    // Zona de atributos
    private $coefPenalizacion;
    private $cantInfracciones;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($idpartidoIngresado,$fechaIngresado,$objEquipo1Ingresado,$cantGolesE1Ingresado,$objEquipo2Ingresado,$cantGolesE2Ingresado,$cantInfraccionesIngresado){
        parent::__construct($idpartidoIngresado,$fechaIngresado,$objEquipo1Ingresado,$cantGolesE1Ingresado,$objEquipo2Ingresado,$cantGolesE2Ingresado);
        $this->coefPenalizacion = 0.75;
        $this->cantInfracciones = $cantInfraccionesIngresado;
    }
    // Metodos de acceso (get's)
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    // Metodos de Modificacion (set's)
    public function setCoefPenalizacion($nuevoCoef){
        $this->coefPenalizacion = $nuevoCoef;
    }
    public function setCantInfracciones($nuevaCantidad){
        $this->cantInfracciones = $nuevaCantidad;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= ("\nCoeficiente Penalizacion: " . $this->getCoefPenalizacion() . "\n");
        $cadena .= ("Cantidad de infracciones: " . $this->getCantInfracciones() . "\n");
        return $cadena;
    }
    // Metodo coeficientePartido()
    /* si se trata de un partido de basquetbol  se almacena la cantidad de infracciones 
    * de manera tal que al coeficiente base se debe restar un coeficiente de penalización, 
    * cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
    * coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
    */
    public function coeficientePartido(){
        $coeficientePartidoBasquet = 0;
            $coeficientePenalizacion = $this->getCoefPenalizacion();
            $cantidadInfracciones = $this->getCantInfracciones();
            $coeficienteBase = parent::coeficientePartido();
            $coeficientePartidoBasquet = ($coeficienteBase-($coeficientePenalizacion*$cantidadInfracciones));
        return $coeficientePartidoBasquet;
    }
}
?>