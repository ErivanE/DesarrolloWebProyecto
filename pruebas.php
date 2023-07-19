<?php
// Comprobar si la extensión cURL está habilitada
if (extension_loaded('curl')) {
    echo 'cURL está habilitado en el servidor.';
} else {
    echo 'cURL no está habilitado en el servidor.';
}
