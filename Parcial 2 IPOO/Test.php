<?php
$empresa_cable = new EmpresaCable([],[]);

$canal1 = new Canal("tipo1",1000,"si");
$canal2 = new Canal("tipo2",2000,"si");
$canal3 = new Canal("tipo3",4000,"no");

$plan1 = new Plan(111,[$canal1,$canal2],1000,100);
$plan2 = new Plan(222,[$canal3],2000,500);

$cliente = new cliente("pedro","Perez","DNI",44628595);

$contrato1 = new Contrato("11/03/2003","05/30/1983",$plan1,"",1000,"",$cliente);
$contrato2 = new ContratoWeb("11/03/2003","05/30/1983",$plan2,"",1000,"",$cliente);
$contrato3 = new ContratoWeb("11/03/2003","05/30/1983",$plan3,"",1000,"",$cliente);

$contrato1->calcularImporte();
$contrato2->calcularImporte();
$contrato3->calcularImporte();

$empresa_cable->incorporarPlan($plan2);
$empresa_cable->incorporarContrato($plan2,$cliente,"30/05/2025","30/06/2025",false);
$empresa_cable->incorporarContrato($plan1,$cliente,"30/05/2025","30/06/2025",true);
$empresa_cable->pagarContrato($contrato1);
$empresa_cable->pagarContrato($contrato3);
$empresa_cable->retornarPromImporteContratos(111);
?>