<?php

session_start();

require_once __DIR__ . "/Coche.php";
require_once __DIR__ . "/CocheLujo.php";

if (!isset($_SESSION["coches"])) {
    $_SESSION["coches"] = [];
}

if (isset($_POST["crear"])) {

    $matricula = $_POST["matricula"];
    $modelo = $_POST["modelo"];
    $precio = $_POST["precio"];

    if (isset($_POST["lujo"])) {
        $suplemento = $_POST["suplemento"];

        $coche = new CocheLujo($matricula, $modelo, $precio, $suplemento);
    } else {
        $coche = new Coche($matricula, $modelo, $precio);
    }

    $_SESSION["coches"][] = $coche;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
</head>

<body>

    <h2>Coche más caro: <?php echo Coche::masCaro(); ?></h2>

    <h2>Crear coche</h2>

    <form method="POST">

        Matrícula:
        <input type="text" name="matricula" required>

        Modelo:
        <input type="text" name="modelo" required>

        Precio:
        <input type="number" name="precio" required>

        <br><br>

        ¿Es de lujo?
        <input type="checkbox" name="lujo">

        Suplemento:
        <input type="number" name="suplemento" value="0">

        <br><br>

        <input type="submit" name="crear" value="Crear coche">

    </form>

    <h2>Listado de coches</h2>

    <table border="1">

        <tr>
            <th>Matrícula</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Suplemento</th>
        </tr>

        <?php

        foreach ($_SESSION["coches"] as $coche) {

            echo "<tr>";
            echo $coche;

            if ($coche instanceof CocheLujo) {
                // El suplemento ya aparece en el toString
            } else {
                echo "<td>No procede</td>";
            }

            echo "</tr>";
        }

        ?>

    </table>

</body>

<a href="../../../index.php">Pagina Principal</a>

</html>