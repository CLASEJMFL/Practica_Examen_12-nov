
<?php

// Cargamos la clase padre.
require_once __DIR__ . "/Coche.php";

// CocheLujo hereda de Coche.
class CocheLujo extends Coche
{
    // Atributo propio de los coches de lujo.
    private $suplemento;

    public function __construct($matricula, $modelo, $precio, $suplemento)
    {
        // Inicializamos matrícula, modelo y precio base
        // utilizando el constructor de la clase padre.
        parent::__construct($matricula, $modelo, $precio);

        // Guardamos el suplemento.
        $this->suplemento = (float) $suplemento;
    }

    // Sobrescribimos getPrecio().
    // Ahora devuelve el precio base más el suplemento.
    public function getPrecio()
    {
        return $this->precio + $this->suplemento;
    }

    // Getter del suplemento.
    public function getSuplemento()
    {
        return $this->suplemento;
    }

    // Setter del suplemento.
    public function setSuplemento($suplemento)
    {
        $this->suplemento = (float) $suplemento;
    }

    // Sobrescribimos __toString() para mostrar también el suplemento.
    public function __toString()
    {
        return "<td>" . htmlspecialchars($this->matricula) . "</td>"
             . "<td>" . htmlspecialchars($this->modelo) . "</td>"
             . "<td>" . number_format($this->getPrecio(), 2, ',', '.') . " €</td>"
             . "<td>" . number_format($this->suplemento, 2, ',', '.') . " €</td>";
    }
}
