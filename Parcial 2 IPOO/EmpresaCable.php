<?php
//  planes, canales, clientes y los contratos de los planes.
class EmpresaCable{
    // Zona de atributos
    private $colContatos;
    private $colPlanes;
    // Zona de metodos
    // Metodo constructor
    public function __construct($colContatosIng,$colPlanesIng) {
        $this->colContatos = $colContatosIng;
        $this->colPlanes = $colPlanesIng;
    }

    public function incorporarPlan($objPlanIng){
        $todosLosPlanes = $this->getColPlanes();
        $cantidadPlanes = count($todosLosPlanes);
        $bandera = false;
        $i = 0;
        while (!$bandera && $cantidadPlanes<$i){
            $unPlan = $todosLosPlanes[$i];

            $i++;
        }
        
    }
    public function BuscarContrato($tipoDocIng,$nroDocIng){
        $contratoCliente = null;
        $todosLosContratos = $this->getColContratos();
        $cantidadContratos = count($todosLosContratos);
        $i = 0;
        $bandera = false;
        while (!$bandera && $i<$cantidadContratos){
            $unContrato = $todosLosContratos[$i];
            $clienteUnContrato = $unContrato->getRefCliente();
            $tipoDocClienteUnContrato = $clienteUnContrato->getTipoDoc();
            $nroDocClienteUnContrato = $clienteUnContrato->getNroDoc();
            if ($tipoDocIng == $tipoDocClienteUnContrato && $nroDocIng == $nroDocClienteUnContrato){
                $contratoCliente = $unContrato;
                $bandera = true;
            }
            $i++;
        }
        return $contratoCliente;
    }
    public function incorporarContrato($objPlanIng,$objClienteIng,$fechaInicioIng,$fechaVencimientoIng,$contratoWebIng){
        $tipoDocClienteIng = $objClienteIng->getTipoDoc();
        $nroDocClienteIng = $objClienteIng->getNroDoc();
        $hayUnContrato = $this->BuscarContrato($tipoDocClienteIng,$nroDocClienteIng);
        if ($hayUnContrato != null){
            $hayUnContrato->setRefPlan($objPlanIng);
            $hayUnContrato->setFechaInicio($fechaInicioIng);
            $hayUnContrato->setFechaVencimiento($fechaVencimientoIng);
        }
        $todosLosContratos = $this->getColContratos();
        if ($hayUnContrato == null){
            if ($contratoWebIng){
                $nuevoContrato = new ContratoWeb ($fechaInicioIng,$fechaVencimientoIng,$objPlanIng,"","","",$objClienteIng);
                array_push($todosLosContratos,$nuevoContrato);
                $this->setColContratos($todosLosContratos);
            } else{
                $nuevoContrato = new Contrato ($fechaInicioIng,$fechaVencimientoIng,$objPlanIng,"","","",$objClienteIng);
                array_push($todosLosContratos,$nuevoContrato);
                $this->setColContratos($todosLosContratos);
            }
        }
    }
    public function retornarPromImporteContratos($codigoPlanIng){
        $todosLosContratos = $this->getColContratos();
        $importe = 0;
        foreach ($todosLosContratos as $unContrato){
            $codigoPlanUnContrato = $unContrato->getRefPlan()->getCodigo();
            if ($codigoPlanUnContrato == $codigoPlanIng){
                $importeUncontrato = $unContrato->getCosto();
                $importe += $importeUncontrato;
            }  
        }
        return $importe;
    } 
}


?>