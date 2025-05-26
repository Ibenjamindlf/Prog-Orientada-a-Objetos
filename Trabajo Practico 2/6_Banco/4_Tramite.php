<?php
class Tramite{
    // Zona de atributos 
    private $tipoTramiteInstancia;
    private $horaCreacionInstancia;
    private $horaResolucionInstancia;
    // Zona de metodos
    # Metodo __construct
    public function __construct($tipoTramite,$horaCreacion) {
        $this->tipoTramiteInstancia = $tipoTramite;
        $this->horaCreacionInstancia = $horaCreacion;
        $this->horaResolucionInstancia = null;
    }
    # Metodo get (acceso)
    public function gettipoTramiteInstancia(){
        return $this->tipoTramiteInstancia;
    }
    public function gethoraCreacionInstancia(){
        return $this->horaCreacionInstancia;
    }
    public function gethoraResolucionInstancia(){
        return $this->horaResolucionInstancia;
    }
    # Metodo set (modificacion)
    public function setTipoTramiteInstancia($nuevoTramite){
        $this->tipoTramiteInstancia = $nuevoTramite;
    }
    public function setHoraCreacionInstancia($nuevaHoraCreacion){
        $this->horaCreacionInstancia = $nuevaHoraCreacion;
    }
    public function setHoraResolucionInstancia($nuevaHoraResolucion){
        $this->horaResolucionInstancia = $nuevaHoraResolucion;
    }
    # Método para finalizar el trámite con hora ingresada manualmente
    public function finalizarTramite($horaFinalizacion) {
        $horaAnterior = $this->getHoraResolucionInstancia(); # Obtener la hora actual (puede ser null)
        $this->setHoraResolucionInstancia($horaFinalizacion); # Asignar la nueva hora de finalización
        return $this->getHoraResolucionInstancia(); # Devolver la nueva hora asignada
    }    
    # Metodo to string redefinido
    public function __toString()
    {
        $cadena = "El tipo de tramite: " . $this->gettipoTramiteInstancia() . " Iniciado a las: " . $this->gethoraCreacionInstancia() . " finalizo a las: " . $this->gethoraResolucionInstancia(); 
        return $cadena;
    }
}

// $test = new Tramite("Deposito","12:00");
// // echo $test;
// $finalizacion = $test->finalizarTramite("15:00");
// echo $test;
?>