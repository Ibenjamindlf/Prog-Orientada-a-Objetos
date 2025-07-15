<?php
// pruebas de rama 2
class Contrato{
    // Zona de atributos
    private $fechaInicio;
    private $fechaVencimiento;
    private $refPlan;
    private $estado; # (al día, moroso, suspendido, finalizado)
    private $costo;
    private $renovacion;
    private $refCliente;

    // Metodo calcularImporte()
    public function calcularImporte(){
        $importeFinal = 0;
        $importePlan = $this->getRefPlan()->getImporte();
        $importeCanales = 0;
        $todosLosCanales = $this->getRefPlan()->getColCanales();
        foreach ($todosLosCanales as $unCanal){
            $importeUnCanal = $unCanal->getImporte();
            $importeCanales += $importeUnCanal;
        }
        $importeFinal = ($importePlan + $importeCanales);
        $this->setCosto($importeFinal);
        return $importeFinal;
    }
    public function setCosto($nuevoCosto){
        $this->costo = $nuevoCosto;
    }
    // Metodo sumatoriaImporteCanales()
    public function sumatoriaImporteCanales(){
        $plan = $this->
    }
    public function __toString()
    {
        
    }
    // Metodo actualizarEstadoContrato()
    public function actualizarEstadoContrato(){
        $estadoMoroso = "Moroso";
        $estadoSuspendido = "Suspendido";
        $estadoAldia = "Al dia";
        $this->setEstado($estadoAldia);
        $diasContatoVencido = $this->diasContratoVencido();
        if ($diasContatoVencido>=10){
            $this->setEstado($estadoSuspendido);
        } else if ($diasContatoVencido>=0 && $diasContatoVencido<=10){
            $this->setEstado($estadoMoroso);
        }
    }
    public function diasContratoVencido($objContato){
        
    }
}
?>