<?php
class Categoria{
    // Zona de atributos
    private $idCategoria;
	private $descripcion;
    // Zona de metodos 
    // Metodo contructor 
    public function __construct($idcategoriaIngresado,$descripcionIngresado){
		$this->idCategoria=$idcategoriaIngresado;
		$this->descripcion= $descripcionIngresado;
	}
    // Metodos de acceso (get's)
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    // Metodos de Modificacion (set's)
    public function setIdCategoria($nuevoId){
        $this->idcategoria = $nuevoId;
    }
    public function setDescripcion($nuevaDescripcion){
        $this->descripcion = $nuevaDescripcion;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\nId Categoria: " . $this->getIdCategoria() . "\n");
        $cadena .= ("Descripcion: ". $this->getDescripcion() .  "\n");
        return $cadena;
    }
    // Metodo _____
}
?>