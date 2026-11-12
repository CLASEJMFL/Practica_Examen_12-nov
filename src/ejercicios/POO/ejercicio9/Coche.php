
<?php

class Coche
{
    // Atributos comunes a todos los coches.
    protected $matricula;
    protected $modelo;
    protected $precio;

    // Constructor: se ejecuta al crear un coche con new Coche().
    public function __construct($matricula, $modelo, $precio)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = (float) $precio;
    }

    // GETTERS: permiten consultar los atributos.
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    // SETTERS: permiten modificar los atributos.
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setPrecio($precio)
    {
        $this->precio = (float) $precio;
    }

    // Se ejecuta automáticamente cuando hacemos echo $coche.
    public function __toString() {
        return "Coche: " . $this->modelo ." con la matricula: " . $this->matricula ." tiene el precio de: " . $this->precio;
    }
}