<?php 
class Cuadrado {
    private $verticesInstancia;

    public function __construct($x1InfIzq, $y1InfIzq, $x2InfDer, $y2InfDer, $x3SupDer, $y3SupDer, $x4SupIzq, $y4SupIzq) {
        $this->verticesInstancia = [
            "A" => ["x" => $x1InfIzq, "y" => $y1InfIzq], // Inferior Izquierdo
            "B" => ["x" => $x2InfDer, "y" => $y2InfDer], // Inferior Derecho
            "C" => ["x" => $x3SupDer, "y" => $y3SupDer], // Superior Derecho
            "D" => ["x" => $x4SupIzq, "y" => $y4SupIzq]  // Superior Izquierdo
        ];
    }

    // Getters
    public function getverticesInstancia(){
        return $this->verticesInstancia;
    }
    // Setters
    public function setVerticesInstancia($nuevosVertices) {
        $this->verticesInstancia = $nuevosVertices;
    }

    // Metodos area,desplazar,aumentarTamaño
    public function area(){
        $vertices = $this->getverticesInstancia();

        $lado = abs($vertices["B"]["x"] - $vertices["A"]["y"]);

        $area = ($lado * $lado);
        return $area;
    }

    public function desplazar($d){
        $coordenadaXInstancia = $this->getverticesInstancia()["A"]["x"];
        $coordenadaYInstancia = $this->getverticesInstancia()["A"]["y"];

        $coordenadaXUsuario = $d["x"];
        $coordenadaYUsuario = $d["y"];

        $dx = $coordenadaXUsuario - $coordenadaXInstancia;
        $dy = $coordenadaYUsuario - $coordenadaYInstancia;

        // Obtengo el array con metodo get
        $vertices = $this->getverticesInstancia();

        // 2. Modifico el array con las distancias
        foreach ($vertices as &$punto) {
            $punto["x"] += $dx;
            $punto["y"] += $dy;
    }
        // 3. Setteo el nuevo valor
        $this->setVerticesInstancia($vertices);

        // 4. Retorno ese nuevo valor 
        return $vertices;
    }

    public function aumentarTamaño($t) {
        // 1. Obtener una copia del array de vértices usando el getter
        $vertices = $this->getVerticesInstancia();
    
        // 2. Modificar las coordenadas de los vértices según el tamaño $t
        $vertices["B"]["x"] += $t; // B.x += t
        $vertices["C"]["x"] += $t; // C.x += t
        $vertices["C"]["y"] += $t; // C.y += t
        $vertices["D"]["y"] += $t; // D.y += t
    
        // 3. Guardar la copia modificada en el atributo original usando el setter
        $this->setVerticesInstancia($vertices);
    
        // 4. Retornar el array modificado
        return $vertices;
    }

    public function __toString() {
        $texto = "Cuadrado:\n";
        foreach ($this->verticesInstancia as $nombre => $coordenadas) {
            $texto .= "$nombre: (" . $coordenadas["x"] . ", " . $coordenadas["y"] . ")\n";
        }
        return $texto;
    }

}

// Crear el cuadrado
$testeoCuadrado = new Cuadrado(0,0,4,0,4,4,0,4);

// Mostrar datos originales
echo "Datos originales del cuadrado:\n";
echo $testeoCuadrado;

$area = $testeoCuadrado->area();
echo ("\nEl area del cuadrado es: " . $area);
// echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";
$desplazar = $testeoCuadrado->desplazar(["x" => 3, "y" => 4]);
echo "\n" . $testeoCuadrado;

$tamaño = $testeoCuadrado->aumentarTamaño(4);
echo "\n" . $testeoCuadrado;
// // Desplazar el cuadrado
// $cuadrado->desplazar(["x" => 3, "y" => 4]);

// // Mostrar datos después de desplazar
// echo "Datos después de desplazar:\n";
// echo $cuadrado;
// echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";

// // Aumentar tamaño
// $cuadrado->aumentarTamaño(5);
// echo "Datos después de aumentar su tamaño:\n";
// echo $cuadrado;
// echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";
?>