<?php 

$hostname = "localhost";
$port = "3306";
$username = "root";
$password = "Paocomqueijo/1";
$database = "gerenciador_senhas";

$connection = new mysqli($hostname, $username, $password, $database, $port);

//o metodo connect_error verifica se houve erro na conexão com o banco de dados. Se houver, ele exibe uma mensagem de erro e encerra o script usando a função die().

if($connection-> connect_error){
    //A função die() é usada para encerrar o script PHP e exibir uma mensagem de erro. Isso é útil para depuração e para garantir que o script não continue a ser executado se houver um erro crítico.
    
    die("Falha na conexão: " . $connection->connect_error);

}else{
}
?>