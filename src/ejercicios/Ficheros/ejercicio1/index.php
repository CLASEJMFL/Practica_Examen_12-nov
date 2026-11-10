<?php

function escribirNumerosMod($numeros, $modo = "")
{

    $texto = implode("\n", $numeros) . "\n";

    if ($modo == "sobreescribir") {
        file_put_contents("numeros.txt", $texto);
    } else {
        file_put_contents("numeros.txt", $texto, FILE_APPEND);
    }
}

function leerContenidoFichero()
{
    $contenido = file("numeros.txt");

    foreach ($contenido as $numero) {
        echo $numero . "<br>";
    }
}

if (isset($_POST["enviar"])) {

    $numeros = explode(",", $_POST["numeros"]);

    escribirNumerosMod($numeros, $_POST["modo"]);
}

?>

<!DOCTYPE html>
<html>

<body>

    <h2>Introducir números</h2>

    <form method="POST">
        Números:
        <input type="text" name="numeros" required>

        <select name="modo">
            <option value="añadir">Añadir</option>
            <option value="sobreescribir">Sobreescribir</option>
        </select>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <h2>Contenido del fichero:</h2>

    <?php
    if (file_exists("numeros.txt")) {
        leerContenidoFichero();
    }
    ?>

</body>

</html>