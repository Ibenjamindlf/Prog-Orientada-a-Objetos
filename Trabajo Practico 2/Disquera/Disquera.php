<?php
class Disquera{
    // Zona de atributos
    private $horaDesdeInst; # Siendo inst una abreviacion de instancia 
    private $horaHastaInst; 
    private $estadoInst;
    private $direccionInst;
    private $refDueñoInst; # ref indicando que es una referencia, en este caso de la class Persona
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($horaDesde,$minutosDesde,$horaHasta,$minutosHasta,$estado,$direccion,$objPersona) { # Recibo la hora y los minutos por separado para almacenarnos en un arreglo (array) asociativo 
        $this->horaDesdeInst = ["CodigoBarra" => $horaDesde, "Cantidad"=> $minutosDesde]; # Guardo la hora desde en un arreglo asociativo, con h para horas y con m para minutos
        $this->horaHastaInst = ["h" => $horaHasta, "m"=> $minutosHasta]; # Guardo la hora hasta en un arreglo asociativo, con h para horas y con m para minutos
        $this->estadoInst = $estado;
        $this->direccionInst = $direccion;
        $this->refDueñoInst = $objPersona; # Almaceno el objPersona que entran por parametros en el testDisquera.php en dueño, ya que hace referencia a la clase persona
    }
    // Metodos de acceso (get´s)
    public function getHoraDesdeInst(){
        return $this->horaDesdeInst;
    }
    public function getHoraHastaInst(){
        return $this->horaHastaInst;
    }
    public function getEstadoInst(){
        return $this->estadoInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getRefDueñoInst(){
        return $this->refDueñoInst;
    }
    // Metodos de modificacion (set's)
    public function setHoraDesdeInst($nuevaHoraDesde){
        $this->horaDesdeInst = $nuevaHoraDesde;
    }
    public function setHoraHastaInst($nuevaHoraHasta){
        $this->horaHastaInst = $nuevaHoraHasta;
    }
    public function setEstadoInst($nuevoEstado){
        $this->estadoInst = $nuevoEstado;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setRefDueñoInst($nuevoDueño){
        $this->refDueñoInst = $nuevoDueño;
    }
    // Metodo devolucion de caracteres __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            $this->getRefDueñoInst() . "\n" .
            "-----Datos de la disquera-----\n" .
            "Horario de apertura: " . $this->getHoraDesdeInst()["h"] . ":" . $this->getHoraDesdeInst()["m"] . "\n" . # cuando tipeo $this->getHoraDesdeInst()["h"] estoy devolviendo lo que se almacena en hora
            "Horario de cierre: " . $this->getHoraHastaInst()["h"] . ":" . $this->getHoraHastaInst()["m"] . "\n" . # cuando tipeo $this->getHoraDesdeInst()["m"] estoy devolviendo lo que se almacena en minuto
            "Dirección de la disquera: " . $this->getDireccionInst() . "\n" .
            "Estado de la disquera: " . $this->getEstadoInst() . "\n"
        );
        return $cadena;
    }
    // Metodo dentroHorarioAtencion($hora,$minutos)
    // dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false en caso contrario.
    public function dentroHorarioAtencion($horaIng,$minutosIng){ # Siendo Ing una abreviacion de ingresado
        $estaAbierto = false; # Inicio la variable retorno como falsa por que aun no se cumplio la condicion
        $horaApertura = $this->getHoraDesdeInst()["h"]; # Obtengo y almaceno la hora de apertura 
        $minutosApertura = $this->getHoraDesdeInst()["m"]; # Obtengo y almaceno los minutos de apertura
        $horaCierre = $this->getHoraHastaInst()["h"]; # Obtengo y almaceno la hora de cierre
        $minutosCierre = $this->getHoraHastaInst()["m"]; # Obtengo y almaceno los minutos de cierre
        if(
            ($horaIng > $horaApertura || ($horaIng == $horaApertura && $horaIng >= $minutosApertura)) &&
            ($horaIng < $horaCierre || ($horaIng == $horaCierre && $horaIng <= $minutosCierre))
            ){
                $estaAbierto = true; # Como la condicion se cumple, cambio mi variable retorno
            };
        return $estaAbierto; # Retorno mi variable bool que contiene true o false
    }
    // Metodo abrirDisquera($hora,$minutos)
    // dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
    public function abrirDisquera($horaIng,$minutosIng){ # Siendo Ing una abreviacion de ingresado
        $estaAbierto = $this->dentroHorarioAtencion($horaIng,$minutosIng);
        if ($estaAbierto){
            $this->setEstadoInst('Abierta');
        }
    }
    // Metodo cerrarDisquera($hora,$minutos)
    // dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
    public function cerrarDisquera($horaIng,$minutosIng){ # Siendo Ing una abreviacion de ingresado
        $estaAbierto = $this->dentroHorarioAtencion($horaIng,$minutosIng);
        if (!$estaAbierto){
            $this->setEstadoInst('Cerrada');
        }
    }
}
?>