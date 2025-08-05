<?php
require_once 'MetodoPago.php';

class PagoNequi implements MetodoPago {
    public function procesar($monto) {
        echo "Pago con Nequi procesado por $" . $monto;
    }
}
