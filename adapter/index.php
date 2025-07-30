<?php
require_once 'adapter.php';

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["texto"])) {
    $texto = htmlspecialchars($_POST["texto"]);
    $impresoraAntigua = new ImpresoraAntigua();
    $adaptador = new AdaptadorImpresora($impresoraAntigua);
    $resultado = $adaptador->imprimirDocumento($texto);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo Adapter - PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f0f2f5; }
        form { background: white; padding: 20px; border-radius: 10px; max-width: 400px; }
        input[type="text"] { width: 100%; padding: 8px; margin: 10px 0; }
        input[type="submit"] { padding: 10px 20px; background: #007BFF; color: white; border: none; cursor: pointer; }
        .resultado { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Impresora con Adaptador</h2>
    <form method="post">
        <label>Texto a imprimir:</label>
        <input type="text" name="texto" required>
        <input type="submit" value="Imprimir">
    </form>

    <?php if ($resultado): ?>
        <div class="resultado">
            <?= $resultado ?>
        </div>
    <?php endif; ?>
</body>
</html>
