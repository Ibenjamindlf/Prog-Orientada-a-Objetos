<?php
include_once 'cliente.php';
include_once 'moto.php';
include_once 'venta.php';
include_once 'empresa.php';
// 1.   Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new cliente("juan","Perez",true,"DNI",44628595);
$objCliente2 = new cliente("Pedro","Alfonso",true,"DNI",30226425);
// 2.   Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
//      descripción, porcentaje incremento anual, activo.
$objMoto1 = new moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2 = new moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3 = new moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
// 4.   Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
//      Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
//      [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$objEmpresa1 = new empresa("Alta Gama","AV Argentina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3],[]);
// 5.   Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//      $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//      punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$venta1 = $objEmpresa1->registrarVenta([11,12,13],$objCliente2);
// 6.   Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
//      $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//      punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
$venta2 = $objEmpresa1->registrarVenta([0],$objCliente2);
// 7.   Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
//      $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//      punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$venta3 = $objEmpresa1->registrarVenta([2],$objCliente2);
// 8.   Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//      corresponden con el tipo y número de documento del $objCliente1.
$ventasClientes = $objEmpresa1->retornarVentasXCliente("DNI",44628595);
// 9.   Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//      corresponden con el tipo y número de documento del $objCliente2
$ventasClientes2 = $objEmpresa1->retornarVentasXCliente("DNI",30226425);
// 10.   Realizar un echo de la variable Empresa creada en 2.
echo $objEmpresa1;
?>