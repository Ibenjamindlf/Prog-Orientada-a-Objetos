<?php
class Venta{
    // Zona de atributos
    private $numeroInst; # Siendo Inst una abreviacion de instancia
    private $fechaInst;
    private $refClienteInst; # Referencia al cliente (Variable instancia que es de tipo array)
    private $refColBiciInst; # Referencia a una coleccion de bicis (Variable instancia que es de tipo array)
    private $precioFinalInst;
    // Zona de metodos
    # Metodo __construct
    public function __construct($numero,$fecha,$cliente,$bicis,$precioFinal) {
        $this->numeroInst = $numero;
        $this->fechaInst = $fecha;
        $this->refClienteInst = $cliente;
        $this->refColBiciInst = $bicis;
        $this->precioFinalInst = $precioFinal;
    }
    # Metodos get's (Acceso)
    public function getNumeroInst(){
        return $this->numeroInst;
    }
    public function getFechaInst(){
        return $this->fechaInst;
    }
    public function getRefClienteInst(){
        return $this->refClienteInst;
    }
    public function getRefColBiciInst(){
        return $this->refColBiciInst;
    }
    public function getPrecioFinalInst(){
        return $this->precioFinalInst;
    }
    # Metodos set's (Modificacion)
    public function setNumeroInst($nuevoNumero){
        $this->numeroInst = $nuevoNumero;
    }
    public function setFechaInst($nuevaFecha){
        $this->fechaInst = $nuevaFecha;
    }
    public function setRefClienteInst($nuevaRefCliente){
        $this->refClienteInst = $nuevaRefCliente;
    }
    public function setRefColBiciInst($nuevaRefColBici){
        $this->refColBiciInst = $nuevaRefColBici;
    }
    public function setPrecioFinalInst($nuevoPrecioFinal){
        $this->precioFinalInst = $nuevoPrecioFinal;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $cadenaBicis = ""; # Inicio una variable vacia para guardar el array 
        $coleccionBicis = $this->getRefColBiciInst(); # Obtengo el array
        foreach ($coleccionBicis as $bici) {
            $cadenaBicis .= $bici . "\n"; # asumiendo que cada $bici tiene un método __toString
        }
        $cadena = (
            "Numero: " . $this->getNumeroInst() . "\n" .
            "Fecha: " . $this->getFechaInst() . "\n" .
            "Cliente: " . $this->getRefClienteInst() . "\n" .
            "Motos: " . $cadenaBicis . "\n" .
            "Prefio Final: " . $this->getPrecioFinalInst() . "\n" 
        );
        return $cadena;
    }
    # Metodo incorporarBicicleta($objBici)
    /*
    Implementar el método incorporarBicicleta($objBici) 
    que recibe por parámetro un objeto bicicleta y lo incorpora a la colección de bicicletas de la venta, ✅
    siempre y cuando sea posible la venta. ✅
    El método cada vez que incorpora una bicicleta a la venta, debe actualizar la variable instancia precio final de la venta. ✅
    Utilizar el método que calcula el precio de venta de la bici donde crea necesario. (darPrecioVenta -> obj_moto)✅

    */
    public function  incorporarBicicleta($objBici){
        $completoAccion = false; # Variable de retorno para saber si la accion se cumple o no
        $estaDisponible = $objBici->getActivaInst(); # Obtengo la variable condicion, si la bicicleta esta activa o no
        if ($estaDisponible) {
            $colBici = $this->getRefColBiciInst(); # Obtengo
            array_push($colBici,$objBici); # Almaceno
            $this->setRefColBiciInst($colBici); # Modifico
            $precioVenta = $objBici->darPrecioVenta(); # Utilizo la funcion haciendo referencia en el objeto que entra por parametros y la guardo en una variable 
            $this->setPrecioFinalInst($precioVenta); # Modifico
            $completoAccion = true; # Como se ejecuto la accion, cambio su valor
        }
        return $completoAccion; # Retorno la variable bool dependiendo si se realizo una accion o no
    }
}
?>