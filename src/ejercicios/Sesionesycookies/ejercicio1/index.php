<?php
session_start(); // <= iniciamos la sesion

if (!isset($_SESSION['suma'])) { // < en caso de que no existan las variables las crea en la sesion y las inicia a 0;
    $_SESSION['suma'] = 0;
    $_SESSION['contador'] = 0;
}

if (isset($_POST['num'])) {
    $numero = $_POST['num']; // <= metemos el numero que enviamos con 'sumar' a una variable para trabajarla dentro
    $_SESSION['suma'] = $_SESSION['suma'] + $numero; // <= Sumamos el nuevo número
    $_SESSION['contador']++; // <= Aumentamos el contador para contar los numeros que hay dentro y sacar media
    
    if ($_SESSION['suma'] > 10000) { // <= Comprobamos si la suma supera 10000
        $media = $_SESSION['suma'] / $_SESSION['contador'];
        // Sacamos los datos:
        echo "Suma total: " . $_SESSION['suma'] . "<br>";
        echo "Números introducidos: " . $_SESSION['contador'] . "<br>";
        echo "Media: " . $media . "<br>";
        
        session_destroy(); // <= Destruimos las sesiones para poder empezar de nuevo asi podemos seguir metiendo numeros
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
        <input type="number" name="num" required>
        <input type="submit" value="Enviar">
    </form>
</body>
<a href="../../../index.php">Pagina Principal</a>
</html>