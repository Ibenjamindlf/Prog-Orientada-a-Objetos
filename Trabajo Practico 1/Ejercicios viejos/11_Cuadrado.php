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

    public function area() {
        $lado = abs($this->verticesInstancia["B"]["x"] - $this->verticesInstancia["A"]["x"]);
        return $lado * $lado;
    }

    public function desplazar($d) {
        $dx = $d["x"] - $this->verticesInstancia["A"]["x"];
        $dy = $d["y"] - $this->verticesInstancia["A"]["y"];

        foreach ($this->verticesInstancia as &$punto) {
            $punto["x"] += $dx;
            $punto["y"] += $dy;
        }
    }

    public function aumentarTamaño($t) {
        $this->verticesInstancia["B"]["x"] += $t;
        $this->verticesInstancia["C"]["x"] += $t;
        $this->verticesInstancia["C"]["y"] += $t;
        $this->verticesInstancia["D"]["y"] += $t;
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
$cuadrado = new Cuadrado(0, 0, 4, 0, 4, 4, 0, 4);

// Mostrar datos originales
echo "Datos originales del cuadrado:\n";
echo $cuadrado;
echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";

// Desplazar el cuadrado
$cuadrado->desplazar(["x" => 3, "y" => 4]);

// Mostrar datos después de desplazar
echo "Datos después de desplazar:\n";
echo $cuadrado;
echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";

// Aumentar tamaño
$cuadrado->aumentarTamaño(5);
echo "Datos después de aumentar su tamaño:\n";
echo $cuadrado;
echo "Área del cuadrado: " . $cuadrado->area() . "\n\n";
?>
