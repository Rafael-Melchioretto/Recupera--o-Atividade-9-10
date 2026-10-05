<?php

$host = 'localhost';
$dbname = 'mercado_estoque';
$usuario = 'root';
$senha = '';

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {

    die("Erro ao conectar com o banco de dados.");

}