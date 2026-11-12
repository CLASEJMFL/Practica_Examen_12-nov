<?php
        if (isset($_POST["fondo"])) {
        $fondo = $_POST["fondo"];

        setcookie("bg", $fondo, time() + 60*60);
    }

    if (isset($_COOKIE["bg"])) {
        $fondo = $_COOKIE["bg"];
    } else {
        $fondo = "white";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body style="background-color: <?php echo $fondo; ?>;">

    <h1>Página principal</h1>

    <form action="" method="post">
        Color que vamos a elegir:
        <input type="color" name="fondo" required>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>