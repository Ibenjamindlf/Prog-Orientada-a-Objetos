<?php
# Siempre que vos quieras almacenar un array o modificarlo, esta es la conotacion 👇🏻
// $colCuotas = $this->getColDeCuotasInst(); # Obtengo 
// array_push($colCuotas,$cuota); #Almaceno
// $this->setColDeCuotasInst($colCuotas); #Modifico

# Siempre que se genere un while, debe tener una condicion de corte 👇🏻
// $numeroCuota = 1; #Inicio la condicion de corte en 1
// while ($numeroCuota<=$cantidadCuotas) { 
//     # Code... 
//     $numeroCuota++;} # Sumo la condicion de corte, evitando bucles infinitos

# Para obtener un valor de un objeto dentro de otro y que sea array 👇🏻
// $esCancelada = $col_Cuotas[$cuotaAct]->getCanceladaInst();

# Obtener el valor de un atributo de un objeto estando en otro 👇🏻
// $mailPersonaIng = $this->getPersonaInst()->getMailInst();

# Pasos para subir un proyecto a GitHub
// 1. Abro gui y creo un nuevo repositorio seleccionando la carpeta parcial
// 2. Entro en el repo y arriba a la izq en repository entro a git Bash
// 3. git init
// 4. git status
// 5. git add .
// 6. git commit -m "Mensaje"
// 7. puede ser que pida email y nombre
// 8. git branch -M main 
// 9. copiamos y pegamos el git remote add origin ________ 
// 10. git push -u origin main 

# Pasos para subir un cambio 
// 1. git status
// 2. git add . 
// 3. git commit -m "Mensaje"
// 4. git push -u origin main 



?>
