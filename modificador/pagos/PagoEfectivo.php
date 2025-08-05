<?php
require_once 'MetodoPago.php';

class PagoEfectivo implements MetodoPago {
    public function procesar($monto) {
        echo "Pago en efectivo registrado por $" . $monto;
    }
}
