<?php 

define('ENCRYPTION_KEY', 'sua-chave-secreta-de-32-bytes!'); // Exatamente 32 bytes para AES-256
define('ENCRYPTION_IV', '1234567890123456'); // Exatamente 16 bytes para AES-256-CBC
define('ENCRYPTION_METHOD', 'AES-256-CBC');

function criptografar($dados) {
    return openssl_encrypt($dados, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

function descriptografar($dadosCriptografados) {
    return openssl_decrypt($dadosCriptografados, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}


?>