<?php
class Banco{
    // Zona de atributos
    private $clienteInstancia;
    private $tramiteInstancia;
    private $mostradorInstancia;
    
    # Metodo mostradoresQueAtienden($unTramite)
    public function mostradoresQueAtienden($unTramite) {
        $mostradoresDisponibles = [];
        
        foreach ($this->getMostradores() as $mostrador) {
            if ($mostrador->atiende($unTramite)) {
                $mostradoresDisponibles[] = $mostrador;
            }
        }
        
        return $mostradoresDisponibles;
    }
}
?>