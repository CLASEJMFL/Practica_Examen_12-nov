<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar fichero</title>
</head>

<body>

    <form action="" method="POST">
        Nombre del fichero:
        <input type="text" name="fichero" required>
        <input type="submit" value="Ordenar">
    </form>

    <?php

    if (isset($_POST["fichero"])) {
 
        if (!file_exists($_POST["fichero"])) { // Comprobamos si el fichero no existe.

            echo "El archivo que quieres ordenar no existe, fijate que exista y comprueba la extension este bien";

        } else {
            $fichero = $_POST["fichero"]; // Guardamos el nombre del fichero.
            
            $palabras = file($fichero); // Leemos todas las líneas y las guardamos en un array.

            $palabras = array_map("trim", $palabras); // Quitamos espacios y saltos de línea de cada elemento.
           
            sort($palabras); // Ordenamos alfabéticamente el array.
           
            $resultado = str_replace(".txt", "_sort.txt", $fichero); // Creamos el nombre del fichero nuevo.

            $archivo = fopen($resultado, "w"); // Abrimos el fichero nuevo en modo escritura.
           
            foreach ($palabras as $palabra) { // Recorremos el array ordenado.
                fwrite($archivo, $palabra . "\n"); // Escribimos cada palabra en una línea.
            }

            fclose($archivo); // Cerramos el fichero.

            echo "Fichero ordenado correctamente: " . $resultado; // Mostramos el resultado.
        }
    }
    ?>
</body>
<br>
<a href="../../../index.php">Pagina Principal</a>
</html>