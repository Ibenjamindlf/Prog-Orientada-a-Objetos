<?php 

class Login {
    private $nombreUsuarioInstancia;
    private $contraseñaInstancia;
    private $fraseRecordarInstancia;
    private $historialInstancia = []; // Inicializamos un array vacio, ya que debemos guardar datos 

    public function __construct($nombreUsuario, $contraseñaUsuario, $fraseRecordar = "") { //$fraseRecordar se inicializa en un valor vacio para que no sea obligatorio la frase recordar, en caso de que se obligatorio, se puede borrar
        $this->nombreUsuarioInstancia = $nombreUsuario;
        $this->contraseñaInstancia = $contraseñaUsuario;
        $this->fraseRecordarInstancia = $fraseRecordar;
    }

    public function getNombreUsuarioInstancia(){
        return $this->nombreUsuarioInstancia;
    }
    
    public function getContraseñaInstancia(){
        return $this->contraseñaInstancia;
    }
    
    public function getFraseRecordarInstancia(){
        return $this->fraseRecordarInstancia;
    }
    
    public function getHistorialInstancia(){
        return $this->historialInstancia;
    }
    
    public function setNombreUsuarioInstancia($nombreUsuario){
        if (!empty($nombreUsuario)) { //Verificamos que el nombre ingresado no este vacio,  SI (if) ESTO ($nombreUsuario) NO (!) VACIO (empty) ENTONCES ({) ESTO ($this y return) SINO (return "error")
            $this->nombreUsuarioInstancia = $nombreUsuario;
            return "Nombre de usuario cambiado con éxito.";
        } 
        return "Error: El nombre de usuario no puede estar vacío.";
    }

    public function setContraseñaInstancia($nuevaContraseña){
        if (strlen($nuevaContraseña) < 6) { //Verifica que la contraseña tenga al menos 6 digitos
            return "Error: La contraseña debe tener al menos 6 caracteres.";
        }
    
        if (!empty($this->contraseñaInstancia)) { // Verifica si la contraseña esta vacia o no 
            $this->agregarAlHistorial($this->contraseñaInstancia);
        }
    
        $this->contraseñaInstancia = $nuevaContraseña; // Cambia la contraseña
        return "Contraseña cambiada con éxito.";
    }

    private function agregarAlHistorial($contraseñaVieja) {
        if (count($this->historialInstancia) >= 4) {
            array_shift($this->historialInstancia); // Elimina la más antigua
        }
        $this->historialInstancia[] = $contraseñaVieja;
    }

    public function validarContraseña($contraseñaIngresada) {
        return $this->contraseñaInstancia === $contraseñaIngresada;
    }

    public function recordarContraseña() {
        return "Frase para recordar la contraseña: " . $this->fraseRecordarInstancia;
    }
    
    public function cambiarContraseña($nuevaContraseña) {
        if ($nuevaContraseña == "") {
            return "Error: La contraseña esta vacia.";
        }
        if (in_array($nuevaContraseña, $this->historialInstancia)) {
            return "Error: No puedes usar una de tus últimas 4 contraseñas.";
        }
    
        if (strlen($nuevaContraseña) < 6) {
            return "Error: La contraseña debe tener al menos 6 caracteres.";
        }
    
        if (!empty($this->contraseñaInstancia)) {
            $this->agregarAlHistorial($this->contraseñaInstancia);
        }
    
        $this->contraseñaInstancia = $nuevaContraseña;
        return "Contraseña cambiada con éxito.";
    }

    // Permite imprimir la información del usuario como string
    public function __toString() {
        return "Usuario: " . $this->nombreUsuarioInstancia . "\n" .
            "Contraseña: " . $this->contraseñaInstancia . "\n" .
            "Frase Recordar: " . $this->fraseRecordarInstancia . "\n" .
            "Historial: " . implode(", ", $this->historialInstancia);
    }
}

// Prueba del código
$usuario = new Login("Benjamin", "pepe1234", "Mi termo es de color rojo");

echo $usuario->cambiarContraseña("pepe") . "\n"; // Contraseña demasiado corta
echo $usuario->cambiarContraseña("") . "\n"; // No puede usar una de las últimas 4
echo $usuario->cambiarContraseña("pepe5678") . "\n"; // Contraseña válida
echo $usuario->cambiarContraseña("pepe1234") . "\n"; // No puede usar una de las últimas 4

echo "\n--- Información del usuario ---\n";
echo $usuario; // Muestra los datos del usuario

?>
