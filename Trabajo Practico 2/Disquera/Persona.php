<?php
class Persona{
    // Zona de atributos
    private $nombreInstancia;
    private $apellidoInstancia;
    private $tipoDocInstancia;
    private $numeroDocInstancia;
    // Zona de metodos
    // Metodo __construct
    public function __construct($nombre,$apellido,$tipoDoc,$numeroDoc) {
        $this->nombreInstancia = $nombre;
        $this->apellidoInstancia = $apellido;
        $this->tipoDocInstancia = $tipoDoc;
        $this->numeroDocInstancia = $numeroDoc;
    }
    // Metodos get´s 
    public function getnombreInstancia(){
        return $this->nombreInstancia;
    }
    public function getapellidoInstancia(){
        return $this->apellidoInstancia;
    }
    public function gettipoDocInstancia(){
        return $this->tipoDocInstancia;
    }
    public function getnumeroDocInstancia(){
        return $this->numeroDocInstancia;
    }
    // Metodos Set´s
    public function setNombreInstancia($nuevoNombre){
        $this->nombreInstancia = $nuevoNombre;
    }
    public function setApellidoInstancia($nuevoApellido){
        $this->apellidoInstancia = $nuevoApellido;
    }
    public function setTipoDocInstancia($nuevoTipoDoc){
        $this->tipoDocInstancia = $nuevoTipoDoc;
    }
    public function setNumeroDocInstancia($nuevoNumeroDoc){
        $this->numeroDocInstancia = $nuevoNumeroDoc;
    }
    // Metodo __toString redefinido 
    public function __toString() //\n
    {
        $cadena = (
            "-----Dueño de la disquera-----\n" .
            "Nombre: " . $this->getnombreInstancia() . "\n" .
            "Apellido: " . $this->getapellidoInstancia() . "\n" .
            "Tipo Documento: " . $this->gettipoDocInstancia() . "\n" .
            "Numero de documento: " . $this->getnumeroDocInstancia()
        );
        return $cadena;
    }
}
?>