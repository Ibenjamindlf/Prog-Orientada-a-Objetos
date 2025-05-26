<?php
class Disquera{
    // Zona de atributos
    private $hora_desdeinstancia; # Recibo 2 numeros enteros
    private $hora_hastainstancia; # Recibo 2 numeros enteros
    private $estadoinstancia;
    private $direccioninstancia;
    private $dueñoinstancia; // referencia a la clase persona
    // Zona de metodos
    // Metodo __construct 
    public function __construct($hora_desde,$minutos_desde,$hora_hasta,$minutos_hasta,$estado,$direccion,$dueño) {
        $this->hora_desdeinstancia = ["h" => $hora_desde, "m"=> $minutos_desde];
        $this->hora_hastainstancia = ["h" => $hora_hasta, "m"=> $minutos_hasta];
        $this->estadoinstancia = $estado;
        $this->direccioninstancia = $direccion;
        $this->dueñoinstancia = $dueño;
    }
    // Metodos get´s 
    public function gethora_desdeinstancia(){
        return $this->hora_desdeinstancia;
    }
    public function gethora_hastainstancia(){
        return $this->hora_hastainstancia;
    }
    public function getestadoInstancia(){
        return $this->estadoinstancia;
    }
    public function getdireccioninstancia(){
        return $this->direccioninstancia;
    }
    public function getdueñoinstancia(){
        return $this->dueñoinstancia;
    }
    // Metodos Set´s
    public function sethora_desdeinstancia($nuevo_hora_desde){
        $this->hora_desdeinstancia = $nuevo_hora_desde;
    }
    public function sethora_hastainstancia($nuevo_hora_hasta){
        $this->hora_hastainstancia = $nuevo_hora_hasta;
    }
    public function setestadoinstancia($nuevoEstado){
        $this->estadoinstancia = $nuevoEstado;
    }
    public function setdireccioninstancia($nuevoDireccion){
        $this->direccioninstancia = $nuevoDireccion;
    }
    public function setdueñoinstancia($nuevoDueño){
        $this->dueñoinstancia = $nuevoDueño;
    }
    // Metodo dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
    // encontrarse abierta en ese horario y false en caso contrario.
    public function dentroHorarioAtencion($horaIngresada,$minutosIngresado) {
        $estaAbierto = false;

        $horaApertura = $this->gethora_desdeinstancia()["h"]; // Obtiene la hora de apertura
        $minutosApertura = $this->gethora_desdeinstancia()["m"]; // Obtiene los minutos de apertura
        $horaCierre = $this->gethora_hastainstancia()["h"]; // Obtiene la hora de cierre
        $minutosCierre = $this->gethora_hastainstancia()["m"]; // Obtiene los minutos de cierre
        

        if(
        ($horaIngresada > $horaApertura || ($horaIngresada == $horaApertura && $minutosIngresado >= $minutosApertura)) &&
        ($horaIngresada < $horaCierre || ($horaIngresada == $horaCierre && $minutosIngresado <= $minutosCierre))
        ){
            $estaAbierto = true;
        };

        return $estaAbierto;
    }
    // Metodo abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
    //horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
    public function abrirDisquera($horaIngresada,$minutosIngresado){
        $estaAbierto = false;

        $horaApertura = $this->gethora_desdeinstancia()["h"]; // Obtiene la hora de apertura
        $minutosApertura = $this->gethora_desdeinstancia()["m"]; // Obtiene los minutos de apertura
        $horaCierre = $this->gethora_hastainstancia()["h"]; // Obtiene la hora de cierre
        $minutosCierre = $this->gethora_hastainstancia()["m"]; // Obtiene los minutos de cierre
        $estadoDisquera = $this->getestadoInstancia(); // Obtiene el estado de la disquera

        if(
        ($horaIngresada > $horaApertura || ($horaIngresada == $horaApertura && $minutosIngresado >= $minutosApertura)) &&
        ($horaIngresada < $horaCierre || ($horaIngresada == $horaCierre && $minutosIngresado <= $minutosCierre))
        ){
            $estaAbierto = true;
        };

        // Actualizar el estado de la disquera
        $this->setestadoinstancia($estaAbierto);
        

        return $estadoDisquera;
    }
    // cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    // horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
    public function cerrarDisquera($horaIngresada,$minutosIngresado){
        $estaAbierto = false;

        $horaApertura = $this->gethora_desdeinstancia()["h"]; // Obtiene la hora de apertura
        $minutosApertura = $this->gethora_desdeinstancia()["m"]; // Obtiene los minutos de apertura
        $horaCierre = $this->gethora_hastainstancia()["h"]; // Obtiene la hora de cierre
        $minutosCierre = $this->gethora_hastainstancia()["m"]; // Obtiene los minutos de cierre
        $estadoDisquera = $this->getestadoInstancia(); // Obtiene el estado de la disquera

        if(
        ($horaIngresada > $horaApertura || ($horaIngresada == $horaApertura && $minutosIngresado >= $minutosApertura)) &&
        ($horaIngresada < $horaCierre || ($horaIngresada == $horaCierre && $minutosIngresado <= $minutosCierre))
        ){
            $estaAbierto = true;
        };

        // Actualizar el estado de la disquera
        $this->setestadoinstancia($estaAbierto);
        return $estaAbierto;

        return $estadoDisquera;
    }
    // Metodo __toString redefinido 
    public function __toString()
{
    $cadena = (
        $this->getdueñoinstancia() . "\n" .
        "-----Datos de la disquera-----\n" .
        "Horario de apertura: " . $this->gethora_desdeinstancia()["h"] . ":" . $this->gethora_desdeinstancia()["m"] . "\n" .
        "Horario de cierre: " . $this->gethora_hastainstancia()["h"] . ":" . $this->gethora_hastainstancia()["m"] . "\n" .
        "Dirección de la disquera: " . $this->getdireccioninstancia() . "\n" .
        "Estado de la disquera: " . ($this->getestadoInstancia() ? "Abierta" : "Cerrada") . "\n"
    );
    return $cadena;
}
}
?>