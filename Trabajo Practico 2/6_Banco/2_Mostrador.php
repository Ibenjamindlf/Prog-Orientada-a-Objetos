<?php
class Mostrador{
    // Zona de atributos
    private $numeroMostradorInstancia; # Identificador del mostrador.
    private $tramitesAceptadosInstancia; # Tipos de trámites que puede atender.
    private $colaClientesInstancia; # Array donde se guardan los clientes en espera.
    private $capacidadMaximaInstancia; # Límite de clientes que puede atender en simultáneo.
    // Zona de metodos
    # Metodo construct
    public function __construct($numeroMostrador,$tramitesAceptados,$capacidadMaxima) {
        $this->numeroMostradorInstancia = $numeroMostrador;
        $this->tramitesAceptadosInstancia = $tramitesAceptados;
        $this->colaClientesInstancia = []; # Array que inicia vacio
        $this->capacidadMaximaInstancia = $capacidadMaxima;
    }
    # Metodos get (Acceso)
    public function getNumeroMostradorInstancia(){
        return $this->numeroMostradorInstancia;
    }
    public function getTramitesAceptados(){
        return $this->tramitesAceptadosInstancia;;
    }
    public function getColaClientesInstancia(){
        return $this->colaClientesInstancia;
    }
    public function getCapacidadMaximaInstancia(){
        return $this->capacidadMaximaInstancia;
    }
    # Metodos set (Modificacion)
    public function setNumeroMostradorInstancia($nuevoNumeroMostrador){
        $this->numeroMostradorInstancia = $nuevoNumeroMostrador;
    }
    public function setTramitesAceptados($nuevosTramitesAceptados){
        $this->tramitesAceptadosInstancia = $nuevosTramitesAceptados;
    }
    public function setColaClientesInstancia($nuevaColaClientes){
        $this->colaClientesInstancia = $nuevaColaClientes;
    }
    public function setCapacidadMaximaInstancia($nuevaCapacidadMaxima){
        $this->capacidadMaximaInstancia = $nuevaCapacidadMaxima;
    }
    # Metodo atiende($unTramite) 
    public function atiende($unTramite){
        $seRealiza = false;
        $tramitesAceptados_ = $this->getTramitesAceptados();
        if ($unTramite === $tramitesAceptados_) {
            $seRealiza = true;
        }
        return $seRealiza;
    }
    
}


?>