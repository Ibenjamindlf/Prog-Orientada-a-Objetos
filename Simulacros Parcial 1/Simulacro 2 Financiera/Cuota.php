<?php
class Cuota{
    // Zona de atributos
    private $numeroInst; # Siendo Inst una abreviacion de Instancia
    private $montoCoutaInst;
    private $montoInteresInst;
    private $canceladaInst; # Variable que contiene un bool
    // Zona de Metodos
    # Metodo __construct
    public function __construct($numero,$montoCouta,$montoInteres,$cancelada) {
        $this->numeroInst = $numero;
        $this->montoCoutaInst = $montoCouta;
        $this->montoInteresInst = $montoInteres;
        $this->canceladaInst = $cancelada;
    }
    # Metodos get's (Acceso)
    public function getNumeroInst(){
        return $this->numeroInst;
    }
    public function getMontoCoutaInst(){
        return $this->montoCoutaInst;
    }
    public function getMontoInteresInst(){
        return $this->montoInteresInst;
    }
    public function getCanceladaInst(){
        return $this->canceladaInst;
    }
    # Metodos Set's (Modificacion) 
    public function setNumeroInst($nuevoNum){
        $this->numeroInst = $nuevoNum;
    }
    public function setMontoCoutaInst($nuevoMontoCouta){
        $this->montoCoutaInst = $nuevoMontoCouta;
    }
    public function setMontoInteresInst($nuevoMontoInteres){
        $this->montoInteresInst = $nuevoMontoInteres;
    }
    public function setCanceladaInst($nuevaCancelada){
        $this->canceladaInst = $nuevaCancelada;
    }
    # Metodo __toString redefinido . "\n" .
    public function __toString()
    {
        $cadena = (
            "Numero: " . $this->getNumeroInst() . "\n" .
            "Monto Cuota: " . $this->getMontoCoutaInst() . "\n" .
            "Monto Interes: " . $this->getMontoInteresInst() . "\n" .
            "Cancelada: " . $this->getCanceladaInst() . "\n" 
        );
        return $cadena;
    }
    # Metodo darMontoFinalCuota()
    public function darMontoFinalCuota(){
        $montoFinalCuota = 0; # Inicio la variable que se va a retornar en 0
        $valorCuota = $this->getMontoCoutaInst(); # Obtengo el valor de la couta
        $Intereses = $this->getMontoInteresInst(); # Obtengo los intereses 
        $montoFinalCuota = ($valorCuota + ($valorCuota * ($Intereses/100))); #Hago el calculo con los valores obtenidos
        return $montoFinalCuota; # Retorno el monto final
    }
}
?>