
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar fichero</title>
</head>

<body>

    <!-- Formulario para introducir el nombre del fichero -->
    <form action="" method="POST">
        Nombre del fichero:
        <input type="text" name="fichero" required>
        <input type="submit" value="Ordenar">
    </form>

    <?php

    // Comprobamos si hemos enviado el nombre del fichero.
    if (isset($_POST["fichero"])) {

        // Comprobamos si el fichero no existe.
        if (!file_exists($_POST["fichero"])) {

            echo "El archivo que quieres ordenar no existe, fijate que exista y comprueba la extension este bien";

        } else {

            // Guardamos el nombre del fichero en una variable.
            $fichero = $_POST["fichero"];

            // Leemos todas las líneas del fichero y las guardamos en un array.
            $palabras = file($fichero);

            // Quitamos los espacios y saltos de línea de cada elemento del array.
            $palabras = array_map("trim", $palabras);

            // Ordenamos alfabéticamente las palabras del array.
            sort($palabras);

            // Creamos el nombre del nuevo fichero añadiendo _sort antes de la extensión.
            $resultado = str_replace(".txt", "_sort.txt", $fichero);

            // Unimos todas las palabras en un texto separándolas por saltos de línea.
            $texto = implode("\n", $palabras) . "\n";

            // Escribimos el texto ordenado en el nuevo fichero.
            file_put_contents($resultado, $texto);

            // Mostramos el nombre del fichero creado.
            echo "Fichero ordenado correctamente: " . $resultado;
        }
    }

    ?>

    <br>

    <!-- Enlace para volver a la página principal -->
    <a href="../../../index.php">Pagina Principal</a>

</body>
</html>
