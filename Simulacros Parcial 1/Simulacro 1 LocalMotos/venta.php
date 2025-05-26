<?php
include_once 'moto.php';
class venta{
    // Zona de atributos 
    private $numeroInstancia;
    private $fechaInstancia;
    private $refClienteInstancia; # Hace referencia a la clase cliente
    private $refColeccionMotosInstancia; # Hace referencia a la clase moto
    private $precioFinalInstancia;
    // Zona de metodos
    # Metodo __construct
    public function __construct($numero,$fecha,$refCliente) {
        $this->numeroInstancia = $numero;
        $this->fechaInstancia = $fecha;
        $this->refClienteInstancia = $refCliente;
        // $this->refColeccionMotosInstancia = $refColeccionMotos;
        $this->refColeccionMotosInstancia = [];
        $this->precioFinalInstancia = 0;
    }
    # Metodos get's (acceso)
    public function getNumeroInstancia(){
        return $this->numeroInstancia;
    }
    public function getFechaInstancia(){
        return $this->fechaInstancia;
    }
    public function getRefClienteInstancia(){
        return $this->refClienteInstancia;
    }
    public function getRefColeccionMotosInstancia(){
        return $this->refColeccionMotosInstancia;
    }
    public function getPrecioFinalInstancia(){
        return $this->precioFinalInstancia;
    }
    # Metodos set's (Modificacion)
    public function setNumeroInstancia($nuevoNumero){
        $this->numeroInstancia = $nuevoNumero;
    }
    public function setFechaInstancia($nuevaFecha){
        $this->fechaInstancia = $nuevaFecha;
    }
    public function setRefClienteInstancia($nuevaRefCliente){
        $this->refClienteInstancia = $nuevaRefCliente;
    }
    public function setRefColeccionMotosInstancia($nuevaRefMotos){
        $this->refColeccionMotosInstancia = $nuevaRefMotos;
    }
    public function setPrecioFinalInstancia($nuevoPrecioFinal){
        $this->precioFinalInstancia = $nuevoPrecioFinal;
    }
    # Metodo incorporarMoto($objMoto)
    public function incorporarMoto($objMoto) {
        $retorno = false;
        $activa = $objMoto->getActivaInstancia();
        if ($activa)
        {
            // Guardo la moto que entra en un array
            $coleccion = $this->getRefColeccionMotosInstancia(); # Obtengo 
            $coleccion[] = $objMoto; # Almaceno
            $this->setRefColeccionMotosInstancia($coleccion); # Modifico
            // Actualizacion de la variable precioFinal con la funcion darPrecioVenta
            $precioMoto = $objMoto->darPrecioVenta(); # Obtengo el precio de venta
            $precio = $this->getPrecioFinalInstancia(); # Obtengo el precio final
            $this->setPrecioFinalInstancia($precio + $precioMoto); # Actualizo el precio final
            $retorno = true;
        }
        return $retorno;
    }
    # Metodo _toString redefinido
    public function __toString(){
        $cadenaMotos = ""; # Inicio una variable vacia para guardar el array 
        $coleccionMotos = $this->getRefColeccionMotosInstancia(); # Obtengo el array
        foreach ($coleccionMotos as $moto) {
            $cadenaMotos .= $moto . "\n"; # asumiendo que cada $moto tiene un método __toString
        }
        $cadena = 
            (
                "Numero: " . $this->getNumeroInstancia() . "\n" .
                "Fecha: " . $this->getFechaInstancia() . "\n" .
                "Cliente: " . $this->getRefClienteInstancia() . "\n" .
                "Coleccion Motos: " . $cadenaMotos . "\n" .
                "Precio Final: " . $this->getPrecioFinalInstancia() . "\n" 
            );
        return $cadena;
    }
    
}
?>