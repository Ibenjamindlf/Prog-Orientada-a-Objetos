<?php
include_once 'cuota';
class Prestamo{
    // Zona de atributos
    private $identificacionInst; # Siendo inst una abreviacion de Instancia
    private $fechaOtorgamientoInst; 
    private $montoInst;
    private $cantDeCuotasInst;
    private $tazaDeInteresInst;
    private $colDeCuotasInst; # Array
    private $personaInst; # Referencia a la clase persona
    // Zona de metodos
    # Metodo __construct
    public function __construct($identificacion,$monto,$cantDeCuotas,$tazaDeInteres,$pers) {
        $this->identificacionInst = $identificacion;
        $this->fechaOtorgamientoInst = ""; # Se incia en vacio
        $this->montoInst = $monto;
        $this->cantDeCuotasInst = $cantDeCuotas;
        $this->tazaDeInteresInst = $tazaDeInteres;
        $this->colDeCuotasInst = []; # Inicio el array vacio
        $this->personaInst = $pers;
    }
    # Metodos get's (Acceso)
    public function getIdentificacionInst(){
        return $this->identificacionInst;
    }
    public function getFechaOtorgamientoInst(){
        return $this->fechaOtorgamientoInst;
    }
    public function getMontoInst(){
        return $this->montoInst;
    }
    public function getCantDeCuotasInst(){
        return $this->cantDeCuotasInst;
    }
    public function getTazaDeInteresInst(){
        return $this->tazaDeInteresInst;
    }
    public function getColDeCuotasInst(){
        return $this->colDeCuotasInst;
    }
    public function getPersonaInst(){
        return $this->personaInst;
    }
    # Metodos set's (Modificacion)
    public function setIdentificacionInst($nuevaIdentificacion){
        $this->identificacionInst = $nuevaIdentificacion;
    }
    public function setFechaOtorgamientoInst($nuevaFecha){
        $this->fechaOtorgamientoInst = $nuevaFecha;
    }
    public function setMontoInst($nuevoMonto){
        $this->montoInst = $nuevoMonto;
    }
    public function setCantDeCuotasInst($nuevaCantCuotas){
        $this->cantDeCuotasInst = $nuevaCantCuotas;
    }
    public function setTazaDeInteresInst($nuevaTazaInteres){
        $this->tazaDeInteresInst = $nuevaTazaInteres;
    }
    public function setColDeCuotasInst($nuevaColDeCuotas){
        $this->colDeCuotasInst = $nuevaColDeCuotas;
    }
    public function setPersonaInst($nuevaPersona){
        $this->personaInst = $nuevaPersona;
    }
    # Metodo __toString redefinido . "\n" .
    public function __toString()
    {
        $reprCuotas = $this->getColDeCuotasInst(); # Obtengo
        $cadenaCuotas = ""; # Inicio en vacio
        foreach ($reprCuotas as $cuota) { # Recorro 
            $cadenaCuotas .= $cuota . "\n"; # Guardo
        }
        $cadena = (
            "Identificacion: " . $this->getIdentificacionInst() . "\n" .
            "Fecha Otorgamiento: " . $this->getFechaOtorgamientoInst() . "\n" .
            "Monto: " . $this->getMontoInst() . "\n" .
            "Cantidad de coutas: " . $this->getCantDeCuotasInst() . "\n" .
            "Taza de interes: " . $this->getTazaDeInteresInst() . "\n" .
            "Cuotas: ". $cadenaCuotas . "\n" .
            "Persona: " . $this->getPersonaInst() . "\n" 
        );
        return $cadena;
    }
    # Metodo calcularInteresPrestamo(numCuota)
    private function calcularInteresPrestamo($numCuota){
        $interesPrestamo = 0; #Inicio la variable retorno en 0 
        $montoCuota = $this->getMontoInst(); #Obtengo el monto
        $interesCuota = $this->getTazaDeInteresInst(); #Obtengo el interes
        $cantCuotas = $this->getCantDeCuotasInst(); # Obtengo la cantidad de cuotas
        $interesPrestamo = (($montoCuota - (($montoCuota/$cantCuotas)*$numCuota-1)) * $interesCuota/0.01); #aplico la formula
        return $interesPrestamo; #Retorno la variable que almacena el calculo
    }
    # Metodo otorgarPrestamo 
    public function otorgarPrestamo(){
        $fecha = $this->getFechaOtorgamientoInst(); #Obtengo
        $fecha = date("Y-m-d"); #Almaceno
        $this->setFechaOtorgamientoInst($fecha); #Modifico
        $cantidadCuotas = $this->getCantDeCuotasInst(); # Obtengo la cantidad de cuotas
        $montoTotCuotas = $this->getMontoInst(); # Obtengo el monto de las cuotas
        $colCuotas = $this->getColDeCuotasInst(); # Obtengo la coleccion de cuotas
        $impTotCuota = ($montoTotCuotas/$cantidadCuotas); #Calculo importe Total de la cuota
        $numeroCuota = 1; #Inicio la condicion de corte en 1
        while ($numeroCuota<$cantidadCuotas) {
            $interesXcuota = $this->calcularInteresPrestamo($numeroCuota);
            $cuota = new Cuota($numeroCuota,$impTotCuota,$interesXcuota,true);
            array_push($colCuotas,$cuota); #Almaceno
            $this->setColDeCuotasInst($colCuotas); #Modifico
            $numeroCuota++;
        }
        return true;
    }
    # Metodo darSiguienteCuotaPagar 
    # ¿Como hago para obtener el valor cancelada del objeto cuota?
    public function darSiguienteCuotaPagar(){
        $siguienteCuotaAserAbonada = null; # Inicio la variable retorno como nula
        $col_Cuotas = $this->getColDeCuotasInst(); #Obtengo la columna de cuotas
        $totalCuotas = count($col_Cuotas); # Almaceno cuantas cuotas hay
        $cuotaEncontrada = false; # Inicio una condicion en false
        $cuotaAct = 0; # Inicio la condicion de corte del while

        while (($cuotaAct < $totalCuotas) && (!$cuotaEncontrada)) {
            if ($col_Cuotas[$cuotaAct]->getCanceladaInst()==false){
                # $esCancelada = $col_Cuotas[$cuotaAct]->getCanceladaInst();
                $siguienteCuotaAserAbonada = $col_Cuotas[$cuotaAct];
                $cuotaEncontrada = true;
            } else {
                $cuotaAct++;
            }
        }
    return $siguienteCuotaAserAbonada;}
}
?>