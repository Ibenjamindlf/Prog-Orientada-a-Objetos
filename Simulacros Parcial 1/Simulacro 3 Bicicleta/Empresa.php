<?php
class Empresa{
    // Zona de atributos
    private $denominacionInst; # Siendo Inst una abreviacion de instancia
    private $direccionInst;
    private $colClienteInst; # Siendo col una abreviacion de coleccion, Variable instancia de tipo array
    private $colBicisInst; # Variable instancia de tipo array
    private $colVentasRealizadasInst; # Variable instancia de tipo array
    // Zona de metodos
    # Metodo __construct
    public function __construct($denominacion,$direccion,$clientes,$bicis,$ventas) {
        $this->denominacionInst = $denominacion;
        $this->direccionInst = $direccion;
        $this->colClienteInst = $clientes;
        $this->colBicisInst = $bicis;
        $this->colVentasRealizadasInst = $ventas;
    }
    # Metodos get's (Acceso)
    public function getDenominacionInst(){
        return $this->denominacionInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getColClienteInst(){
        return $this->colClienteInst;
    }
    public function getColBicisInst(){
        return $this->colBicisInst;
    }
    public function getColVentasRealizadasInst(){
        return $this->colVentasRealizadasInst;
    }
    # Metodos set's (Modificacion)
    public function setDenominacionInst($nuevaDenominacion){
        $this->denominacionInst = $nuevaDenominacion;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setColClienteInst($nuevaColClientes){
        $this->colClienteInst = $nuevaColClientes;
    }
    public function setColBicisInst($nuevaColBicis){
        $this->colBicisInst = $nuevaColBicis;
    }
    public function setColVentasRealizadasInst($nuevaColVentas){
        $this->colVentasRealizadasInst = $nuevaColVentas;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $cadenaClientes = ""; # Inicio una variable vacia para guardar el array 
        $colecccionCliente = $this->getColClienteInst(); # Obtengo el array
        foreach ($colecccionCliente as $cliente) {
            $cadenaClientes .= $cliente . "\n"; # asumiendo que cada $cliente tiene un método __toString
        }

        $cadenaBici = ""; # Inicio una variable vacia para guardar el array 
        $coleccionBici = $this->getColBicisInst(); # Obtengo el array
        foreach ($coleccionBici as $bicicleta) {
            $cadenaBici .= $bicicleta . "\n"; # asumiendo que cada $bicicleta tiene un método __toString
        }

        $cadenaVentas = ""; # Inicio una variable vacia para guardar el array 
        $coleccionVentas = $this->getColVentasRealizadasInst(); # Obtengo el array
        foreach ($coleccionVentas as $venta) {
            $cadenaVentas .= $venta . "\n"; # asumiendo que cada $venta tiene un método __toString
        }

        $cadena = (
            "Denominacion: " . $this->getDenominacionInst() . "\n" .
            "Direccion: " . $this->getDireccionInst() . "\n" .
            "Clientes: " . $cadenaClientes . "\n" .
            "Bici: " . $cadenaBici . "\n" .
            "Ventas Realizadas: " . $cadenaVentas  . "\n" 
        );
        return $cadena;
    }
    # Metodo retornarBici($codigoBici)
    /*
    Implementar el método retornarBici($codigoBici) 
    que recorre la colección de bicis de la Empresa ✅
    y retorna la referencia al objeto bicicleta cuyo código coincide con el recibido por parámetro. ✅
    ----------------------------------------------------------------------------------------------
    un while que cuando se coincida retorne eso mismo
    Si hay un while y deseo recorrer una coleccion, debo tener como condicion de corte una bandera y un $i<count (array)
    */
    public function retornarBici($codigoBici) {
        $coleccionBicicletas = $this->getColBicisInst(); # Obtengo
        $unaBicicleta = null; # inicio la variable retorno en nula
        $numBicicletas = count($coleccionBicicletas); # Cuento cuantas bicicletas hay en el array
        $i = 0; # Establezco una condicion de corte que se va sumando 
        $bandera = false;
        while (!$bandera && $i < $numBicicletas) {
            $unaBicicleta = $coleccionBicicletas[$i];
            $codigoOriginal = $unaBicicleta->getCodigoInst(); 
            if ($codigoOriginal == $codigoBici) {
                $bandera = true;
            }
            $i++;
        }
        return $unaBicicleta;
    }
    # Metodo registrarVenta($colCodigosBici, $objCliente)
    /*
    Implementar el método registrarVenta($colCodigosBici, $objCliente) 
    método que recibe por parámetro una colección de códigos de bicicletas, la cual es recorrida, ✅
    y por cada elemento de la colección se busca el objeto bicicleta correspondiente al código ✅ // Funcion retornar Bici 
    y se incorpora a la colección de bicis de la instancia Venta que debe ser creada. ✅
    Recordar que no todos los clientes ni todas las bicis, están disponibles para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta // Funcion darPrecioVenta()
    Venta (($numero,$fecha,$cliente,$bicis,$precioFinal))
    */
    public function  registrarVenta($colCodigosBici, $objCliente){
        $colBicis = [];
        $clienteActivo = $objCliente->getEsBaja();
        $importeFinal = 0; # Variable que debe ser retornada
        if ($clienteActivo){ # Si el cliente esta activo entonces
        foreach ($colCodigosBici as $codigo) { # recorre toda la coleccion de codigos que entro
            $unaBicicleta = $this->retornarBici($codigo); # Se asigna un objeto bicicleta si es que coincide el codigo, si no se asigna nulo
            $biciActiva = $unaBicicleta->getActivaInst(); # Se obtiene si la bici esta activa
            if ($unaBicicleta != null && $biciActiva) { # Si hay un objeto bicicleta guardado y esa bicicleta esta activa entonces
                array_push($colBicis,$unaBicicleta); # Guarda la bicicleta en colBicis 
            }
        }
    }
        $numMotosVenta = count($colBicis); # Cuenta cuantas bicis hay guardadas, hay disponibles para la venta
        if ($numMotosVenta>0){ # Si hay mas de 0 bicis para la venta entonces
            $catVentas = $this->getColVentasRealizadasInst(); # Obtengo la cantidad de ventas realizadas
            $fechaAct = date("Y-m-d"); # Obtengo la fecha actual
            $unaVenta = new venta($catVentas+1,$fechaAct,$objCliente,[],0); # Creo un objeto venta, en donde empiezo en numero = 1 
            foreach ($colBicis as $unaBici) { # Recorro las bicis que estan disponibles para la venta
                $unaVenta->incorporarBicicleta($unaBici); # Incorporo una a una las bicis disponibles para la venta con la funcion incorporarBicicleta (Me guarda la bicicleta y tambien actualizo el precio de la misma)
            }
            $importeFinal = $unaVenta->getPrecioFinalInst(); # Calculo el importe final haciendo referencia al objeto venta creado y obtengo su valor 
        }
        return $importeFinal; # Retorno el importe final
}
    # Metodo retornarVentasXCliente($tipo,$numDoc) 
    /*
    Implementar el método retornarVentasXCliente($tipo,$numDoc) 
    que recibe por parámetro el tipo y número de documento de un Cliente 
    y retorna una colección con las ventas realizadas al cliente.
    */
    # Metodo retornarVentasXCliente($tipo,$numDoc) tener en cuneta que esta funcion se trae desde un ejemplo de motos
    public function retornarVentasXCliente($tipo, $numDoc) {
        $col_ventaCliente = array();
        $col_venta = $this->getColeccionVentasInstancia();
        foreach ($col_venta as $obj_Venta) {
                $obj_cliente = $obj_Venta->getRefClienteInstancia();
                if($obj_cliente->getTipoDocClienteInstancia()==$tipo
                    &&  $obj_cliente->getNroDocClienteInstancia()==$numDoc){
                    $col_ventaCliente= array_push($col_ventaCliente,$obj_Venta);
                    
                }
                
        }
        return $col_ventaCliente;
    }
}
?>