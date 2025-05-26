<?php
class moto{
    // Zona de atributos
    private $codigoInstancia; 
    private $costoInstancia;
    private $anioFabricacionInstancia;
    private $descripcionInstancia;
    private $porcentajeIncAnualInstancia;
    private $activaInstancia; # variable que contiene un booleano
    // Zona de metodos
    # Metodo __construct
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activa) {
        $this->codigoInstancia = $codigo;
        $this->costoInstancia = $costo;
        $this->anioFabricacionInstancia = $anioFabricacion;
        $this->descripcionInstancia = $descripcion;
        $this->porcentajeIncAnualInstancia = $porcentaje;
        $this->activaInstancia = $activa;
    }
    # Metodos get's (acceso)
    public function getCodigoInstancia(){
        return $this->codigoInstancia;
    }
    public function getCostoInstancia(){
        return $this->costoInstancia;
    }
    public function getAnioFabricacionInstancia(){
        return $this->anioFabricacionInstancia;
    }
    public function getDescripcionInstancia(){
        return $this->descripcionInstancia;
    }
    public function getPorcentajeIncAnualInstancia(){
        return $this->porcentajeIncAnualInstancia;
    }
    public function getActivaInstancia(){
        return $this->activaInstancia;
    }
    # Metodos set's (Modificacion)
    public function setCodigoInstancia($nuevoCodigo){
        $this->codigoInstancia = $nuevoCodigo;
    }
    public function setCostoInstancia($nuevoCosto){
        $this->costoInstancia = $nuevoCosto;
    }
    public function setAnioFabricacionInstancia($nuevoAnioFabricacion){
        $this->anioFabricacionInstancia = $nuevoAnioFabricacion;
    }
    public function setDescripcionInstancia($nuevaDescripcion){
        $this->descripcionInstancia = $nuevaDescripcion;
    }
    public function setPorcentajeIncAnualInstancia($nuevoPorcentajeAnual){
        $this->porcentajeIncAnualInstancia = $nuevoPorcentajeAnual;
    }
    public function setActivaInstancia($nuevaActiva){
        $this->activaInstancia = $nuevaActiva;
    }
    # Metodo __toString redefinido "\n"
    public function __toString(){
        $cadena = (
            "Codigo: " . $this->getCodigoInstancia() . "\n" .
            "Costo: " . $this->getCostoInstancia() . "\n" . 
            "Año fabricacion: " . $this->getAnioFabricacionInstancia() . "\n" .
            "Descripcion: " . $this->getDescripcionInstancia() . "\n" . 
            "Porcentaje de incremento anual: " . $this->getPorcentajeIncAnualInstancia() . "\n" . 
            "Activa: " . $this->getActivaInstancia() . "\n"
        );
        return $cadena;
    }
    # Metodo darPrecioVenta 
    public function darPrecioVenta(){
        $venta = 0; // Inicializo en 0 la variable retornable 
        $disponibilidad = $this->getActivaInstancia();
        $costoMoto = $this->getCostoInstancia();
        $anioFabricacion = $this->getAnioFabricacionInstancia();
        $porIncAnual = $this->getPorcentajeIncAnualInstancia();
        $anioActual = 2025;
        $aniosTranscurridos = $anioActual - $anioFabricacion;
        if ($disponibilidad) {
            $venta = ($costoMoto+$costoMoto*($aniosTranscurridos* $porIncAnual));
        } else {
            $venta = -1;
        }
    return $venta;}
}
?>