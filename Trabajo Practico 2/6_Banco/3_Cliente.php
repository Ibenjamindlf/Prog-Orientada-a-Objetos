<?php
class cliente{
    // Definimos los atributos
    private $personaInstanica; # Delegacion en la clase persona
    private $tramiteInstanica; # Delegacion en la clase tramite 
    // Definimos los metodos
    # Metodo construct
    public function __construct($persona,$tramite) {
        $this->personaInstanica = $persona;
        $this->tramiteInstanica = $tramite;
    }
    # Metodos Getters (Acceso)
    public function getpersonaInstancia(){
        return $this->personaInstanica;
    }
    public function gettramiteInstanica(){
        return $this->tramiteInstanica;
    }
    # Metodos Setters (Modificacion)
    public function setpersonaInstanica($nuevaPersona){
        $this->personaInstanica = $nuevaPersona;
    }
    public function settramiteInstanica($nuevoTramite){
        $this->tramiteInstanica = $nuevoTramite;
    }
    # Metodo toString re-definido
    public function __toString() //\n
    {
        $cadena = ($this->getpersonaInstancia() . "\n" .
        "Tramite: " . $this->gettramiteInstanica(). "\n");
        return $cadena;
        
        // $cadena = "-----Datos de la persona ingresada-----\n" .
        // "Nombre: " . $this->getnombreInstancia() . "\n" .
        // "Apellido: " . $this->getapellidoInstancia() . "\n" .
        // "Tipo Documento: " . $this->gettipoDocInstancia() . "\n" .
        // "Numero de documento: " . $this->getnumeroDocInstancia(). "\n";
        // return $cadena;
    }
}
?>