<?php
class Financiera{
    // Zona de atributos
    private $denominacionInst; # Siendo inst una abreviacion de instancia
    private $direccionInst;
    private $colPrestamosOtorgadosInst; # Array
    // Zona de metodos
    # Metodo __construct
    public function __construct($denominacion,$direccion) {
        $this->denominacionInst = $denominacion;
        $this->direccionInst = $direccion;
        $this->colPrestamosOtorgadosInst = []; # Inicio en vacio
    }
    # Metodos get's (Acceso)
    public function getDenominacionInst(){
        return $this->denominacionInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getColPrestamosOtorgadosInst(){
        return $this->colPrestamosOtorgadosInst;
    }
    # Metodos Set's (Modificacion)
    public function setDenominacionInst($nuevaDenominacion){
        $this->denominacionInst = $nuevaDenominacion;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setColPrestamosOtorgadosInst($nuevaColPrest){
        $this->colPrestamosOtorgadosInst = $nuevaColPrest;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $reprPrestamos = $this->getColPrestamosOtorgadosInst(); # Obtengo
        $cadenaPrestamos = ""; # Inicio en vacio
        foreach ($reprPrestamos as $prestamo) { # Recorro 
            $cadenaPrestamos .= $prestamo . "\n"; # Guardo
        }
        $cadena = (
            "Denominacion: " . $this->getDenominacionInst() . "\n" .
            "Direccion: " . $this->getDireccionInst() . "\n" .
            "Prestamos: " . $cadenaPrestamos . "\n" 
        );
        return $cadena;
    }
    # Metodo incorporarPrestamo 
    # Corroborar
    # Corroborar
    # Corroborar
    public function incorporarPrestamo($identificacion,$monto,$cantCuotas,$tazaInteres,$refPersona){
        $newPrestamo = new Prestamo($identificacion,$monto,$cantCuotas,$tazaInteres,$refPersona);
        $coleccionPrestamos = $this->getColPrestamosOtorgadosInst(); # Obtengo
        array_push($coleccionPrestamos,$newPrestamo); # Almaceno
        $this->setColPrestamosOtorgadosInst($coleccionPrestamos); # Modifico
        return $newPrestamo;
    }
    # Metodo otorgarPrestamoSiCalifica
    # Falta terminar
    # Falta terminar
    # Falta terminar
    public function otorgarPrestamoSiCalifica(){
        $coleccionPrestamos = $this->getColPrestamosOtorgadosInst(); # Obtengo
        foreach ($coleccionPrestamos as $prestamo) {
            
        }
    }
} 
?>