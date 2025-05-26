<?php
class Bicicleta{
    // Zona de atributos
    private $codigoInst; # Siendo inst una abreviacion de instancia
    private $costoInst;
    private $anioFabricacionInst;
    private $descripcionInst;
    private $porcentajeInst;
    private $incAnualInst;
    private $activaInst; # Variable instancia de contenido bool
    // Zona de metodos
    # Metodo __construct
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$incAnual,$activa) {
        $this->codigoInst = $codigo;
        $this->costoInst = $costo;
        $this->anioFabricacionInst = $anioFabricacion;
        $this->descripcionInst = $descripcion;
        $this->porcentajeInst = $porcentaje;
        $this->incAnualInst = $incAnual;
        $this->activaInst = $activa;
    }
    # Metodos get's (Acceso)
    public function getCodigoInst(){
        return $this->codigoInst;
    }
    public function getCostoInst(){
        return $this->costoInst;
    }
    public function getAnioFabricacionInst(){
        return $this->anioFabricacionInst;
    }
    public function getDescripcionInst(){
        return $this->descripcionInst;
    }
    public function getPorcentajeInst(){
        return $this->porcentajeInst;
    }
    public function getIncAnualInst(){
        return $this->incAnualInst;
    }
    public function getActivaInst(){
        return $this->activaInst;
    }
    # Metodos set's (Modificacion)
    public function setCodigoInst($nuevoCodigo){
        $this->codigoInst = $nuevoCodigo;
    }
    public function setCostoInst($nuevoCosto){
        $this->costoInst = $nuevoCosto;
    }
    public function setAnioFabricacionInst($nuevoAnio){
        $this->anioFabricacionInst = $nuevoAnio;
    }
    public function setDescripcionInst($nuevaDescripcion){
        $this->descripcionInst = $nuevaDescripcion;
    }
    public function setPorcentajeInst($nuevoPorcentaje){
        $this->porcentajeInst = $nuevoPorcentaje;
    }
    public function setIncAnualInst($nuevoIncAnual){
        $this->incAnualInst = $nuevoIncAnual;
    }
    public function setActivaInst($nuevoValor){
        $this->activaInst = $nuevoValor;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            "Codigo: " . $this->getCodigoInst() . "\n" .
            "Costo: " . $this->getCostoInst() . "\n" .
            "Año Fabricacion: " . $this->getAnioFabricacionInst() . "\n" .
            "Decripcion: " . $this->getDescripcionInst() . "\n" .
            "Porcentaje: " . $this->getPorcentajeInst() . "\n" .
            "Incremento Anual: " . $this->getIncAnualInst() . "\n" .
            "Activa: " . $this->getActivaInst() . "\n" 
        );
        return $cadena;
    }
    # Metodo darPrecioVenta
    /*
    Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una bici. Si
    la bici no se encuentra disponible para la venta retorna un valor < 0. Si la bici está disponible para la
    venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la bici.
    anio: cantidad de años transcurridos desde que se fabricó la bici.
    por_inc_anual: porcentaje de incremento anual de la bici.
    */
    public function darPrecioVenta(){
        $estaDisponible = $this->getActivaInst(); # Obtengo la variable condicion
        $costoBicicleta = $this->getCostoInst(); # Obtengo el costo de la bicicleta
        $porcentajeIncrementoAnual = $this->getPorcentajeInst(); # Obtengo el procentaje de incremento
        $anioDeFabricacion = $this->getAnioFabricacionInst(); # Obtengo el año de fabricacion
        $anioActual = date("Y"); # Obtengo el año actual
        $cantAniosTranscurridos = ($anioDeFabricacion - $anioActual); # Cantidad de años transcurridos desde que se fabricó la bici.

        $precioVenta = 0; # Inicio la variable retorno en 0
        if ($estaDisponible){
            $precioVenta = ($costoBicicleta+$costoBicicleta*($cantAniosTranscurridos*$porcentajeIncrementoAnual));
        } else {
            $precioVenta = -1; # Establezco la variable retorno en $n < 0
        }
        return $precioVenta;
    }
}
?>