<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        input[type=number], select { padding: 5px; width: 100px; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>
    <h2>Calculadora en PHP</h2>
    <form method="post">
        <input type="number" name="num1" required>
        <select name="operador">
            <option value="+">+</option>
            <option value="-">−</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select>
        <input type="number" name="num2" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operador = $_POST['operador'];
        $resultado = 0;

        switch ($operador) {
            case "+": $resultado = $num1 + $num2; break;
            case "-": $resultado = $num1 - $num2; break;
            case "*": $resultado = $num1 * $num2; break;
            case "/":
                if ($num2 == 0) {
                    echo "<p style='color:red;'>No se puede dividir por cero.</p>";
                    exit;
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
            default: echo "Operador inválido."; exit;
        }

        echo "<h3>Resultado: $num1 $operador $num2 = $resultado</h3>";
    }
    ?>
</body>
</html>
