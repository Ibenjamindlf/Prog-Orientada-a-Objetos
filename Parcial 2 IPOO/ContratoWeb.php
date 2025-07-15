<?php
class ContratoWeb extends Contrato{
    // Zona de atributos
    private $porcentajeDcto;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct() {
        $this->porcentajeDcto = 0.10; // 10%
    }
    // Metodo de acceso (get)
    public function getPorcentajeDcto() {
        return $this->porcentajeDcto;
    }
    // Metodo de modificacion (set)
    public function setPorcentajeDcto($nuevoPorcentajeDcto) {
        $this->porcentajeDcto = $nuevoPorcentajeDcto;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = "\nInformacion Contrato Online: \n";
        $cadena .= parent::__toString();
        $cadena .= "\nPorcentaje Descuento: " . $this->getPorcentajeDcto() . "\n";
        return $cadena;
    }
    // Metodo calcularImporte() Redefinida
    public function calcularImporte(){
        $importeSinDcto = parent::calcularImporte();
        $descuento = $this->getPorcentajeDcto();
        $importeConDescuento = $importeSinDcto - ($importeSinDcto * $descuento);
        parent::setCosto($importeConDescuento);
        return $importeConDescuento; 
    }
}
?>