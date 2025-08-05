<?php
require_once 'MetodoPago.php';

class PagoTarjeta implements MetodoPago {
    public function procesar($monto) {
        echo "Procesando pago con tarjeta por $" . $monto;
    }
}
