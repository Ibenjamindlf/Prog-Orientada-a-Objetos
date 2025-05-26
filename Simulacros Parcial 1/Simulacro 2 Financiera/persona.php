<?php
class Persona{
    // Zona de atributos
    private $nombreInst; # Siendo Inst una abreviacion de Instancia
    private $apellidoInst;
    private $dniInst;
    private $direccionInst;
    private $mailInst;
    private $telefonoInst;
    private $netoInst; 
    // Zona de metodos
    # Metodo Construct
    public function __construct($nombre,$apellido,$dni,$direccion,$mail,$telefono,$neto) {
        $this->nombreInst = $nombre;
        $this->apellidoInst = $apellido;
        $this->dniInst = $dni;
        $this->direccionInst = $direccion;
        $this->mailInst = $mail;
        $this->telefonoInst = $telefono;
        $this->netoInst = $neto;
    }
    # Metodos get's (Acceso)
    public function getNombreInst(){
        return $this->nombreInst;
    }
    public function getApellidoInst(){
        return $this->apellidoInst;
    }
    public function getDniInst(){
        return $this->dniInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getMailInst(){
        return $this->mailInst;
    }
    public function getTelefonoInst(){
        return $this->telefonoInst;
    }
    public function getNetoInst(){
        return $this->netoInst;
    }
    # Metodos set's (Modificacion)
    public function setNombreInst($nuevoNombre){
        $this->nombreInst = $nuevoNombre;
    }
    public function setApellidoInst($nuevoApellido){
        $this->apellidoInst = $nuevoApellido;
    }
    public function setDniInst($nuevoDni){
        $this->dniInst = $nuevoDni;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setMailInst($nuevoMail){
        $this->mailInst = $nuevoMail;
    }
    public function setTelefonoInst($nuevoTelefono){
        $this->telefonoInst = $nuevoTelefono;
    }
    public function setNetoInst($nuevoNeto){
        $this->netoInst = $nuevoNeto;
    }
    # Metodo __toString redefinido . "\n" .
    public function __toString()
    {
        $cadena = (
            "Nombre: " . $this->getNombreInst() . "\n" .
            "Apellido: " . $this->getApellidoInst() . "\n" .
            "DNI: " . $this->getDniInst() . "\n" .
            "Direccion: " . $this->getDireccionInst() . "\n" .
            "Mail: " . $this->getMailInst() . "\n" .
            "Telefono: " . $this->getTelefonoInst() . "\n" .
            "Neto: " . $this->getNetoInst() . "\n" 
        );
    return $cadena;}
}
?>