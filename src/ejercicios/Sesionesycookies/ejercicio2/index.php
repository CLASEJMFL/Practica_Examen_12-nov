<?php
    if (isset($_POST["fondo"])) { // <= Comprobamos si hemos enviado un color mediante el formulario
        $fondo = $_POST["fondo"]; // <= Guardamos el color que hemos elegido en una variable
        setcookie("bg", $fondo, time() + 60*60); // <= Creamos una cookie llamada "bg" que guarda el color durante 1 hora
    } elseif (isset($_COOKIE["bg"])) { // <=Si no hemos enviado un color nuevo, comprobamos si ya existe una cookie
        $fondo = $_COOKIE["bg"]; // <=  Recuperamos el color que estaba guardado anteriormente en la cookie
    } else { // <= Si no hemos enviado ningún color y tampoco existe una cookie
        $fondo = "white"; // <= Ponemos el fondo blanco por defecto
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones & cookies - 2</title>
</head>
<style>
    body {
        background-color: <?php echo $fondo; ?>;
    }
</style>
<body>
    <h1>Sesiones & cookies - 2</h1>
    <!-- Formulario para elegir un color y enviarlo mediante POST -->
    <form action="" method="post">
        Color que vamos a elegir:
        <input type="color" name="fondo" required>
        <input type="submit" name="Enviar">
    </form>
    <a href="../../../index.php">Página Principal</a>
</body>
</html>