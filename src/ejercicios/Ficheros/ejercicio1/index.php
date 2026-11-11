<?php

// Función que escribe números en el fichero según el modo elegido
function escribirNumerosMod($numeros, $modo = "")
{

    // Convierte el array de números en un texto separado por saltos de línea
    $texto = implode("\n", $numeros) . "\n";

    // Comprueba si el modo elegido es sobreescribir
    if ($modo == "sobreescribir") {

        // Escribe en el fichero borrando su contenido anterior
        file_put_contents("numeros.txt", $texto);
    } else {

        // Añade los números al final del fichero sin borrar lo anterior
        file_put_contents("numeros.txt", $texto, FILE_APPEND);
    }
}

// Función que lee y muestra el contenido del fichero
function leerContenidoFichero()
{
    // Lee todas las líneas del fichero y las guarda en un array
    $contenido = file("numeros.txt");

    // Recorre todas las líneas del fichero
    foreach ($contenido as $numero) {

        // Muestra cada número seguido de un salto de línea HTML
        echo $numero . "<br>";
    }
}

// Comprueba si se ha pulsado el botón enviar
if (isset($_POST["enviar"])) {

    // Separa los números introducidos por comas y los guarda en un array
    $numeros = explode(",", $_POST["numeros"]);

    // Llama a la función para escribir los números usando el modo seleccionado
    escribirNumerosMod($numeros, $_POST["modo"]);
}

?>

<!DOCTYPE html>
<html>

<body>

    <h2>Introducir números</h2>

    <!-- Formulario para introducir números y elegir el modo de escritura -->
    <form method="POST">

        Números:
        <input type="text" name="numeros" required>

        <!-- Selector para elegir si añadir o sobreescribir -->
        <select name="modo">
            <option value="añadir">Añadir</option>
            <option value="sobreescribir">Sobreescribir</option>
        </select>

        <!-- Botón que envía el formulario -->
        <input type="submit" name="enviar" value="Enviar">

    </form>

    <h2>Contenido del fichero:</h2>

    <?php

    // Comprueba si el fichero existe
    if (file_exists("numeros.txt")) {

        // Si existe, llama a la función que muestra su contenido
        leerContenidoFichero();
    }

    ?>

</body>

</html>