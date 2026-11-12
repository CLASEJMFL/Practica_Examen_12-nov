<?php
// Activamos el búfer de salida antes de cualquier contenido.
// Esto evita que una salida accidental impida enviar cabeceras.
ob_start();

// 1. Cargamos las clases.
require_once __DIR__ . "/Coche.php";
require_once __DIR__ . "/CocheLujo.php";

// 2. Iniciamos la sesión.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. Inicializamos el array de coches si no existe.
if (!isset($_SESSION["coches"])) {
    $_SESSION["coches"] = [];
}

// 4. Procesamos el formulario.
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["crear"])) {

    $matricula = trim($_POST["matricula"] ?? "");
    $modelo = trim($_POST["modelo"] ?? "");
    $precio = $_POST["precio"] ?? "";

    if (
        $matricula !== "" &&
        $modelo !== "" &&
        $precio !== "" &&
        is_numeric($precio) &&
        (float)$precio >= 0
    ) {

        // Si se ha marcado la casilla de coche de lujo.
        if (isset($_POST["lujo"])) {

            $suplemento = $_POST["suplemento"] ?? "0";

            if (is_numeric($suplemento) && (float)$suplemento >= 0) {

                $coche = new CocheLujo(
                    $matricula,
                    $modelo,
                    $precio,
                    $suplemento
                );

                // Guardamos el coche de lujo en la sesión.
                $_SESSION["coches"][] = $coche;
            }

        } else {

            // Creamos un coche normal.
            $coche = new Coche(
                $matricula,
                $modelo,
                $precio
            );

            // Guardamos el coche normal en la sesión.
            $_SESSION["coches"][] = $coche;
        }
    }

    // Guardamos la sesión y redirigimos.
    session_write_close();

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// 5. Calculamos el coche más caro.
$modeloCaro = "";
$precioCaro = -1;

foreach ($_SESSION["coches"] as $coche) {

    // En los coches de lujo getPrecio() incluye el suplemento.
    if ($coche->getPrecio() > $precioCaro) {

        $precioCaro = $coche->getPrecio();
        $modeloCaro = $coche->getModelo();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de coches</title>
</head>

<body>

    <h1>Gestión de coches</h1>

    <!-- 6. Mostramos el coche más caro. -->

    <h2>Coche más caro:</h2>

    <?php if (count($_SESSION["coches"]) > 0): ?>

        <p>
            <?php
            echo htmlspecialchars($modeloCaro) . " - "
                . number_format($precioCaro, 2, ',', '.') . " €";
            ?>
        </p>

    <?php else: ?>

        <p>Todavía no hay coches guardados.</p>

    <?php endif; ?>


    <!-- 7. Formulario para crear coches. -->

    <h2>Crear un coche</h2>

    <form method="POST" action="">

        <p>
            <label for="matricula">Matrícula:</label>
            <input
                type="text"
                id="matricula"
                name="matricula"
                required
            >
        </p>

        <p>
            <label for="modelo">Modelo:</label>
            <input
                type="text"
                id="modelo"
                name="modelo"
                required
            >
        </p>

        <p>
            <label for="precio">Precio:</label>
            <input
                type="number"
                id="precio"
                name="precio"
                min="0"
                step="0.01"
                required
            >
        </p>

        <p>
            <input
                type="checkbox"
                id="lujo"
                name="lujo"
                value="1"
            >
            <label for="lujo">¿Es un coche de lujo?</label>
        </p>

        <p>
            <label for="suplemento">Suplemento:</label>
            <input
                type="number"
                id="suplemento"
                name="suplemento"
                min="0"
                step="0.01"
                value="0"
            >
        </p>

        <input
            type="submit"
            name="crear"
            value="Crear coche"
        >

    </form>


    <!-- 8. Listado de coches guardados en la sesión. -->

    <h2>Listado de coches</h2>

    <table border="1">

        <tr>
            <th>Matrícula</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Suplemento</th>
        </tr>

        <?php foreach ($_SESSION["coches"] as $coche): ?>

            <tr>

                <?php
                // Mostramos el objeto mediante su método __toString().
                echo $coche;

                // Si es un coche normal, no tiene suplemento.
                if (!($coche instanceof CocheLujo)) {
                    echo "<td>No procede</td>";
                }
                ?>

            </tr>

        <?php endforeach; ?>

    </table>


    <!-- 9. Enlace a la página principal. -->

    <p>
        <a href="../../../index.php">Página Principal</a>
    </p>

</body>
</html>