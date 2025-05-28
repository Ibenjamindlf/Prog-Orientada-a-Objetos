<?php
class Teatro {
    // Zona de atributos 
    private $nombre;
    private $direccion;
    private $colFunciones; # array de objetos Funcion
    // Zona de metodos
    // Metodoc constructor (__construct)
    public function __construct($nombreIng,$direccionIng,$colFuncionesIng) {
        $this->nombre = $nombreIng;
        $this->direccion = $direccionIng;
        $this->colFunciones = $colFuncionesIng;
    }
    // Metodos de acceso (get's)
    public function getNombre() {
        return $this->nombre;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColFunciones() {
        return $this->colFunciones;
    }
    // Metodos de Modificacion (set's)
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setColFunciones($colFunciones) {
        $this->colFunciones = $colFunciones;
    }
    // Metodo de caracteres ()
    public function __toString(){
        $funciones = $this->getColFunciones();
        $cantidadFunciones = count($funciones);
        $cadenaFunciones = "";
        foreach ($funciones as $unaFuncion) {
            $cadenaFunciones .= $unaFuncion . "\n";
        }
        $cadena = ("\nNombre del teatro: " . $this->getNombre() . "\n");
        $cadena = ("Direccion del teatro: " . $this->getDireccion() . "\n");
        $cadena .= ("Funciones: (" . $cantidadFunciones . ")"  . $cadenaFunciones);
        return $cadena;
    }
    public function modificarNombreFuncion($indice,$nuevoNombre){
        $funciones = $this->getColFunciones();
        $indice = ($indice-1);
        $unaFuncion = $funciones[$indice];
        $unaFuncion->setNombre($nuevoNombre);
    }
    public function modificarPrecioFuncion($indice,$nuevoPrecio){
        $funciones = $this->getColFunciones();
        $indice = ($indice-1);
        $unaFuncion = $funciones[$indice];
        $unaFuncion->setNombre($nuevoPrecio);
    }
    public function cargarFuncion($objFuncionIng){
        $seCargo = false;
        $funciones = $this->getColFunciones();
        $cantFunciones = count($funciones);
        $horaInicioObjFuncion = $objFuncionIng->getHoraInicio();
        $duracionObjFuncion = $objFuncionIng->getDuracionObra();
        $i = 0;
        $haySolapamiento = false;
        while (!$haySolapamiento && $i<$cantFunciones){
            $unaFuncion = $funciones[$i];
            $horaInicioUnaFuncion = $unaFuncion->getHoraInicio();
            $duracionUnaFuncion = $unaFuncion->getDuracionObra();
            $haySolapamiento = $this->haySolapamiento($horaInicioUnaFuncion,$duracionUnaFuncion,$horaInicioObjFuncion,$duracionObjFuncion);
            $i++;
        }
        // foreach ($funciones as $unaFuncion) {
        //     $horaInicioUnaFuncion = $unaFuncion->getHoraInicio();
        //     $duracionUnaFuncion = $unaFuncion->getDuracionObra();
        //     $haySolapamiento = $this->haySolapamiento($horaInicioUnaFuncion,$duracionUnaFuncion,$horaInicioObjFuncion,$duracionObjFuncion);
        // }
        if (!$haySolapamiento){
            array_push($funciones,$objFuncionIng);
            $this->setColFunciones($funciones);
            $seCargo = true;
        }
        return $seCargo;
    }
    public function haySolapamiento($horaInicioA,$duracionMinutosA,$horaInicioB,$duracionMinutosB){
        $haySolapamiento = false;

        $inicioMinutosA =$this->convertirHoraAMinutos($horaInicioA); // 990
        $finMinutosA = ($inicioMinutosA + $duracionMinutosA);  // 1080 (18:00)

        $inicioMinutosB =$this->convertirHoraAMinutos($horaInicioB); // 990
        $finMinutosB = ($inicioMinutosB + $duracionMinutosB);  // 1080 (18:00)

        if ($inicioMinutosB < $finMinutosA && $finMinutosB > $inicioMinutosA) {
            $haySolapamiento = true;
        }
        return $haySolapamiento;
    }
    public function convertirHoraAMinutos($horaStr){
    list($hora, $minutos) = explode(":", $horaStr);
    return $hora * 60 + $minutos;
    }
    // Métodos para agregar funciones, modificar, verificar solapamientos, etc.
}

?>