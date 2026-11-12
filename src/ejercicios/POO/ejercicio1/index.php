<?php

// Creamos la clase Empleado
class Empleado {

    // ATRIBUTOS PRIVADOS
    // Solo se pueden modificar o consultar desde dentro de la clase
    private $nombre;
    private $sueldo;

    // CONSTRUCTOR: se ejecuta al crear un objeto
    public function __construct($nombre, $sueldo) {

        // Guardamos los datos recibidos en los atributos
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    // GETTER: devuelve el nombre del empleado
    public function getNombre() {
        return $this->nombre;
    }

    // GETTER: devuelve el sueldo del empleado
    public function getSueldo() {
        return $this->sueldo;
    }

    // SETTER: modifica el nombre del empleado
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // SETTER: modifica el sueldo del empleado
    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    // MÉTODO ASIGNA: comprueba el nombre y actualiza el sueldo
    public function asigna($nombre, $sueldo) {

        // Comprobamos si el nombre coincide
        if ($nombre == $this->nombre) {

            // Si coincide, actualizamos el sueldo
            $this->sueldo = $sueldo;
        }
    }

    // MÉTODO IMPUESTOS: comprueba si debe pagar impuestos
    public function impuestos() {

        // Mostramos el nombre usando el getter
        echo "Empleado: " . $this->getNombre() . "<br>";

        // Comprobamos si el sueldo supera los 3000
        if ($this->getSueldo() > 3000) {

            echo "Debe pagar impuestos";

        } else {

            echo "No debe pagar impuestos";
        }
    }
}

// CREAMOS UN OBJETO
$empleado1 = new Empleado("Juan", 2500);

// CONSULTAMOS LOS DATOS CON GETTERS
echo $empleado1->getNombre() . "<br>";
echo $empleado1->getSueldo() . "<br>";

// MODIFICAMOS EL SUELDO CON EL MÉTODO ASIGNA
$empleado1->asigna("Juan", 3500);

// TAMBIÉN PODRÍAMOS MODIFICARLO CON UN SETTER
// $empleado1->setSueldo(3500);

// COMPROBAMOS SI DEBE PAGAR IMPUESTOS
$empleado1->impuestos();

?>