<?php
class cliente{
    // Zona de atributos
    private $nombreClienteInstancia;
    private $apellidoClienteInstancia;
    private $estadoClienteInstancia;
    private $tipoDocClienteInstancia;
    private $nroDocClienteInstancia;
    // Zona de metodos
    # Metodo Construct
    public function __construct($nombreCliente,$apellidoCliente,$estadoCliente,$tipoDocCliente,$nroDocCliente) {
        $this->nombreClienteInstancia = $nombreCliente;
        $this->apellidoClienteInstancia = $apellidoCliente;
        $this->estadoClienteInstancia = $estadoCliente;
        $this->tipoDocClienteInstancia = $tipoDocCliente;
        $this->nroDocClienteInstancia = $nroDocCliente;
    }
    # Metodos Get´s (Acceso)
    public function getNombreClienteInstancia(){
        return $this->nombreClienteInstancia;
    }
    public function getApellidoClienteInstancia(){
        return $this->apellidoClienteInstancia;
    }
    public function getEstadoClienteInstancia(){
        return $this->estadoClienteInstancia;
    }
    public function getTipoDocClienteInstancia(){
        return $this->tipoDocClienteInstancia;
    }
    public function getNroDocClienteInstancia(){
        return $this->nroDocClienteInstancia;
    }
    # Metodos Set's (Modificacion)
    public function setNombreClienteInstancia($nuevoNombre){
        $this->nombreClienteInstancia = $nuevoNombre;
    }
    public function setApellidoClienteInstancia($nuevoApellido){
        $this->apellidoClienteInstancia = $nuevoApellido;
    }
    public function setEstadoClienteInstancia($nuevoEstado){
        $this->estadoClienteInstancia = $nuevoEstado;
    }
    public function setTipoDocClienteInstancia($nuevoTipoDoc){
        $this->tipoDocClienteInstancia = $nuevoTipoDoc;
    }
    public function setNroDocClienteInstancia($nuevoNroDoc){
        $this->nroDocClienteInstancia = $nuevoNroDoc;
    }
    # Metodo __toString redefinido "\n"
    public function __toString(){
        $cadena = (
            "Nombre del cliente: " . $this->getNombreClienteInstancia() . "\n" .
            "Apellido del cliente: " . $this->getApellidoClienteInstancia() . "\n" . 
            "Estado del cliente: " . $this->getEstadoClienteInstancia() . "\n" .
            "Tipo Documento: " . $this->getTipoDocClienteInstancia() . ",Numero: " . $this->getNroDocClienteInstancia()
        );
        return $cadena;
    }
}
?>