
<?php

class Coche
{

    protected $matricula;
    protected $modelo;
    protected $precio;

    protected static $modeloCaro = "";
    protected static $precioCaro = 0;

    public function __construct($matricula, $modelo, $precio)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;

        if ($precio > self::$precioCaro) {
            self::$precioCaro = $precio;
            self::$modeloCaro = $modelo;
        }
    }

    // Getters
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

    // Setters
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
        $this->precio = $precio;
    }

    // ToString
    public function __toString()
    {
        return "<td>$this->matricula</td>
                <td>$this->modelo</td>
                <td>" . $this->getPrecio() . "</td>";
    }


    // Método de clase
    public static function masCaro()
    {
        return self::$modeloCaro . " - " . self::$precioCaro . " €";
    }
}
?>