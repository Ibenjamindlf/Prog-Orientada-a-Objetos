<?php
class Torneo{
    // Zona de atributos
    private $colPartidos;
    private $importePremio;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($importePremioIngresado){
        $this->colPartidos = [];
        $this->importePremio = $importePremioIngresado;
    }
    // Metodos de acceso (get's)
    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function getImportePremio(){
        return $this->importePremio;
    }
    // Metodos de Modificacion (set's)
    public function setColPartidos($nuevaColeccion){
        $this->colPartidos = $nuevaColeccion;
    }
    public function setImportePremio($nuevoPremio){
        $this->importePremio = $nuevoPremio;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $partidos = $this->getColPartidos();
        $cantidadPartidos = count($partidos);
        $cadenaPartidos = "";
        foreach ($partidos as $unPartido) {
            $cadenaPartidos .= $unPartido . "\n";
        }
        $cadena = ("\n" . "Vagones: (" . $cantidadPartidos . ")"  . $cadenaPartidos . "\n");
        $cadena .= ("Importe Premio: ". $this->getImportePremio());
        return $cadena;
    }
    // Metodo ingresarPartido()
    /* recibe por parámetro 2 equipos, la fecha en la que se realizará el partido
    * y si se trata de un partido de futbol o basquetbol 
    * El método debe crear y retornar la instancia de la clase Partido que corresponda 
    * y almacenarla en la colección de partidos del Torneo. 
    * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, 
    * caso contrario no podrá ser registrado ese partido en el torneo
    */
    public function ingresarPartido($OBJEquipo1Ingresado,$OBJEquipo2Ingresado,$fechaIngresado,$tipoPartidoIngresado){
        $nuevoPartido = null;
        $partidos = $this->getColPartidos();
        $cantPartidos = count($partidos);
        $nombreCategoriaEquipo1 = $OBJEquipo1Ingresado->getObjCategoria()->getDescripcion();
        $nombreCategoriaEquipo2 = $OBJEquipo2Ingresado->getObjCategoria()->getDescripcion();
        $cantJugadoresEquipo1 = $OBJEquipo1Ingresado->getCantJugadores();
        $cantJugadoresEquipo2 = $OBJEquipo2Ingresado->getCantJugadores();
        if (($nombreCategoriaEquipo1 == $nombreCategoriaEquipo2) &&
            ($cantJugadoresEquipo1 == $cantJugadoresEquipo2)){
                $idNuevoPartido = ($cantPartidos+1);
                $nuevoPartido = new Partido($idNuevoPartido,$fechaIngresado,$OBJEquipo1Ingresado,0,$OBJEquipo2Ingresado,0);
                array_push($partidos,$nuevoPartido);
                $this->setColPartidos($partidos);
        }
        return $nuevoPartido;
    }
    // Metodo darGanadores(deporteIngresado)
    /* recibe por parámetro si se trata de un partido de fútbol o de básquetbol
    * en  base  al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). 
    * El método retorna una colección con los objetos de los equipos encontrados.
    */
    public function darGanadores($deporteIngresado){
        $deporteIngresado = strtolower($deporteIngresado);
        $deportesValidos = ["futbol", "basquet"];
        if (!in_array($deporteIngresado, $deportesValidos)) {
            throw new Exception("Deporte no válido: $deporteIngresado");
        }
        $equiposGanadores = [];
        // $partidos = $this->getColPartidos();
        // $cantidadPartidos = count($partidos);
        $partidosPorDeporte = $this->partidosPorDeporte($deporteIngresado);
        $cantidadPartidos = count($partidosPorDeporte);
        if ($cantidadPartidos > 0){
            foreach ($partidosPorDeporte as $unPartido){
                $equipoGanador = $unPartido->darEquipoGanador();
                array_push($equiposGanadores,$equipoGanador);
            }
        } else {
            throw new Exception("No se encontraron partidos");
        }
        return $equiposGanadores;
    }
    private function partidosPorDeporte($deporteIngresado) {
    $partidos = $this->getColPartidos();
    $partidosPorDisciplina = [];
    foreach ($partidos as $unPartido) {
        if (
            ($deporteIngresado == "futbol" && $unPartido instanceof PartidoFutbol) ||
            ($deporteIngresado == "basquet" && $unPartido instanceof PartidoBasquet)
        ) {
            $partidosPorDisciplina[] = $unPartido;
        }
    }
    return $partidosPorDisciplina;
    }
    // Metodo calcularPremioPartido()
    /*
    * debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ contiene la referencia al equipo ganador; 
    * la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. 
    * (premioPartido = Coef_partido * ImportePremio)
    */
    public function calcularPremioPartido($objPartidoIngresado){
        $premioEquipoGanador = [
            'equipoGanador' => '',
            'premioPartido' => 0
        ];
        $equipoGanador = $objPartidoIngresado->darEquipoGanador();
        $coeficiente = $objPartidoIngresado->coeficientePartido();
        $premioPartido = ($coeficiente*$this->getImportePremio());

        $premioEquipoGanador['equipoGanador'] = $equipoGanador;
        $premioEquipoGanador['premioPartido'] = $premioPartido;
        
        return $premioEquipoGanador;
    }

}
?>