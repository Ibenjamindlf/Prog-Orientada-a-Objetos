<?php
class Cliente{
    // Zona de atributos
    private $nombreInst; # Siendo Inst una abreviacion de instancia
    private $apellidoInst;
    private $esBajaInst;
    private $tipoDocInst;
    private $numeroDocInst;
    // Zona de metodos
    # Metodo __construct
    public function __construct($nombre,$apellido,$esBaja,$tipoDoc,$numeroDoc) {
        $this->nombreInst = $nombre;
        $this->apellidoInst = $apellido;
        $this->esBajaInst = $esBaja;
        $this->tipoDocInst = $tipoDoc;
        $this->numeroDocInst = $numeroDoc;
    }
    # Metodos get's (acceso)
    public function getNombreInst(){
        return $this->nombreInst;
    }
    public function getApellidoInst(){
        return $this->apellidoInst;
    }
    public function getEsBaja(){
        return $this->esBajaInst;
    }
    public function getTipoDoc(){
        return $this->tipoDocInst;
    }
    public function getNumeroDocInst(){
        return $this->numeroDocInst;
    }
    # Metodos set's (Modificacion)
    public function setNombreInst($nuevoNombre){
        $this->nombreInst = $nuevoNombre;
    }
    public function setApellidoInst($nuevoApellido){
        $this->apellidoInst = $nuevoApellido;
    }
    public function setEsBaja($nuevoValor){
        $this->esBajaInst = $nuevoValor;
    }
    public function setTipoDoc($nuevoTipoDoc){
        $this->tipoDocInst = $nuevoTipoDoc;
    }
    public function setNumeroDocInst($nuevoNum){
        $this->numeroDocInst = $nuevoNum;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            "Nombre: " . $this->getNombreInst() . "\n" .
            "Apellido: " . $this->getApellidoInst() . "\n" .
            "Es baja: " . $this->getEsBaja() . "\n" .
            "Tipo documento: " . $this->getTipoDoc() . "\n" .
            "Numero de documento :" . $this->getNumeroDocInst() . "\n" 
        );
        return $cadena;
    }
}
?>