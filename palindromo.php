<?php
function es_palindromo($cadena) {
    $cadena = strtolower(str_replace(' ', '', $cadena));
    $invertida = strrev($cadena);
    return $cadena === $invertida;
}

echo es_palindromo("anilinaaa") ? "True\n" : "False\n";
echo es_palindromo("Hola mundo") ? "True\n" : "False\n";
?>
