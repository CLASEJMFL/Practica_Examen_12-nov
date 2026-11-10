<?php
session_start();
// Si todavía no existen las sesiones, las inicializamos
if (!isset($_SESSION['suma'])) {
    $_SESSION['suma'] = 0;
    $_SESSION['contador'] = 0;
}
if (isset($_POST['sumar'])) {
    $numero = $_POST['sumar'];
    // Sumamos el nuevo número
    $_SESSION['suma'] += $numero;
    // Aumentamos el contador
    $_SESSION['contador']++;
    // Comprobamos si la suma supera 10000
    if ($_SESSION['suma'] > 10000) {
        $media = $_SESSION['suma'] / $_SESSION['contador'];
        echo "Suma total: " . $_SESSION['suma'] . "<br>";
        echo "Números introducidos: " . $_SESSION['contador'] . "<br>";
        echo "Media: " . $media . "<br>";
        // Destruimos las sesiones para poder empezar de nuevo
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Sesiones</title>
</head>
<body>
    <h1>Ejercicio 3 - Sesiones</h1>
    <form action="" method="post">
        Numero a sumar:
        <input type="number" name="sumar" required>
        <input type="submit" value="Enviar">
    </form>
</body>
<a href="../../../index.php">Pagina Principal</a>
</html>