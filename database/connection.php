<?php 

//definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

//dados conexão bd local
$server = 'localhost';
$database = 'crud-js';
$user = 'root';
$password = '';

try {
	$pdo = new PDO("mysql:dbname=$$database;host=$$server;charset=utf8", "$user", "$password");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados!<br>';
	echo $e;
}

?>