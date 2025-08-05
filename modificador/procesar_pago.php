<?php
require_once 'pagos/MetodoPago.php';
require_once 'pagos/PagoTarjeta.php';
require_once 'pagos/PagoEfectivo.php';
require_once 'pagos/PagoNequi.php';

$metodo = $_POST['metodo'];
$montoInput = $_POST['monto'];

$monto = str_replace(['.', ',', ' '], '', $montoInput);

if (!is_numeric($monto) || $monto <= 0) {
    die("❌ Error: Monto inválido.");
}

switch ($metodo) {
    case 'tarjeta':
        $pago = new PagoTarjeta();
        $nombreMetodo = "Tarjeta de Crédito";
        break;
    case 'efectivo':
        $pago = new PagoEfectivo();
        $nombreMetodo = "Efectivo";
        break;
    case 'nequi':
        $pago = new PagoNequi();
        $nombreMetodo = "Nequi";
        break;
    default:
        die("❌ Error: Método de pago no soportado.");
}

$pago->procesar($monto);


$fecha = date("Y-m-d H:i:s");
$codigoTransaccion = strtoupper(uniqid());


$registro = "$fecha | $nombreMetodo | $monto COP | Código: $codigoTransaccion\n";
file_put_contents("pagos.log", $registro, FILE_APPEND);

echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Comprobante de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .comprobante {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .comprobante h2 {
            color: green;
        }
        .comprobante p {
            margin: 10px 0;
            font-size: 16px;
        }
        .codigo {
            font-family: monospace;
            font-size: 18px;
            background: #f9f9f9;
            padding: 5px;
            border-radius: 5px;
        }
        .acciones {
            margin-top: 20px;
        }
        .acciones a {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background: #007bff;
            color: white;
            margin: 5px;
        }
        .acciones a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class='comprobante'>
        <h2>✅ Pago Exitoso</h2>
        <p><strong>Método:</strong> $nombreMetodo</p>
        <p><strong>Monto:</strong> $" . number_format($monto, 0, ',', '.') . " COP</p>
        <p><strong>Fecha:</strong> $fecha</p>
        <p><strong>Código de transacción:</strong></p>
        <div class='codigo'>$codigoTransaccion</div>

        <div class='acciones'>
            <a href='index.html'>⬅ Realizar otro pago</a>
            <a href='#' onclick='window.print()'>🖨 Imprimir</a>
        </div>
    </div>
</body>
</html>
";
?>