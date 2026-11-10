    <?php
        $fondo = $_POST["fondo"];

        setcookie("fondo", $fondo, time() + 3600);

        echo "Color guardado: " . $fondo;
    ?>

    <body style="background-color: <?php echo $fondo; ?>;">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sesiones & cookies - 2</title>
    </head>

    <body>
        <h1>Sesiones & cookies - 2</h1>
        <form action="" method="post">
            Color que vamos a elegir: <input type="color" name="fondo" required>
            <input type="submit" name="Enviar">
        </form>
    </body>
    <a href="../../../index.php">Pagina Principal</a>

    </html>