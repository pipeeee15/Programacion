<?php
function suma_numeros($numeros) {
    $suma = 0;
    foreach ($numeros as $num) {
        $suma += $num;
    }
    return $suma;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entrada = $_POST["numeros"]; 
    $numeros = array_map('intval', explode(',', $entrada));
    $resultado = suma_numeros($numeros);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suma de Números</title>
</head>
<body>
    <h2>Suma de una lista de números</h2>
    <form method="post">
        <label>Ingresa números separados por coma:</label><br>
        <input type="text" name="numeros" required placeholder="Ej: 1,2,3,4,5"><br><br>
        <input type="submit" value="Calcular Suma">
    </form>

    <?php if (isset($resultado)) : ?>
        <h3>Resultado: <?php echo $resultado; ?></h3>
    <?php endif; ?>
</body>
</html>
