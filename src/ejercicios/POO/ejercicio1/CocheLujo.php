
<?php

require_once "Coche.php";

class CocheLujo extends Coche
{

    private $suplemento;

    public function __construct($matricula, $modelo, $precio, $suplemento)
    {

        parent::__construct($matricula, $modelo, $precio);

        $this->suplemento = $suplemento;
    }

    public function getPrecio()
    {
        return $this->precio + $this->suplemento;
    }

    public function getSuplemento()
    {
        return $this->suplemento;
    }

    public function setSuplemento($suplemento)
    {
        $this->suplemento = $suplemento;
    }

    public function __toString()
    {
        return "<td>$this->matricula</td>
                <td>$this->modelo</td>
                <td>" . $this->getPrecio() . "</td>
                <td>$this->suplemento</td>";
    }
}
?>