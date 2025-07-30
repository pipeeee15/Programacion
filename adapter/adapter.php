<?php
// Interfaz esperada
interface INuevaImpresora {
    public function imprimirDocumento(string $texto);
}

// Clase antigua con método diferente
class ImpresoraAntigua {
    public function imprimirTexto(string $texto) {
        return "Impresora antigua: " . $texto;
    }
}

// Adaptador
class AdaptadorImpresora implements INuevaImpresora {
    private $impresoraAntigua;

    public function __construct(ImpresoraAntigua $antigua) {
        $this->impresoraAntigua = $antigua;
    }

    public function imprimirDocumento(string $texto) {
        return $this->impresoraAntigua->imprimirTexto($texto);
    }
}
?>
