<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body>

    <form action="" method="POST">
        Nombre del fichero:
        <input type="text" name="fichero" required>
        <input type="submit" value="Ordenar">
    </form>

    <?php
    // Comprueba si se ha enviado el nombre del fichero
    if (isset($_POST["fichero"])) {

        // Guarda el nombre del fichero introducido en el formulario
        $fichero = $_POST["fichero"];

        // Lee todas las líneas del fichero y las guarda en un array
        $palabras = file($fichero);

        // Ordena alfabéticamente las palabras del array
        sort($palabras);

        // Cambia .txt por _sort.txt para crear el nombre del fichero resultado
        $resultado = str_replace(".txt", "_sort.txt", $fichero);

        // Abre el fichero resultado en modo escritura
        $archivo = fopen($resultado, "w");

        // Recorre todas las palabras ordenadas
        foreach ($palabras as $palabra) {

            // Escribe cada palabra en una línea del fichero resultado
            fwrite($archivo, $palabra . "\n");
        }

        // Cierra el fichero para guardar los cambios
        fclose($archivo);

        // Muestra un mensaje indicando que se ha creado el fichero ordenado
        echo "Fichero ordenado correctamente: " . $resultado;
    }
    ?>

</body>
</body>
</html>