<?php
// endereco
// nome do BD
// usuario
// senha
$endereco = 'localhost';
$banco = 'diogonoite';
$admin = 'postgres';
$senha = 'postgres';
try {
    // sgbd:host;port;dbname
    // admin
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $admin,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Conectado no banco de dados!!!";
    $sql = "CREATE TABLE IF NOT EXISTS 
    usuarios (ID SERIAL, 
    NOME VARCHAR(255), 
    DATA_NASCIMENTO VARCHAR(255), 
    TELEFONE VARCHAR(255), 
    EMAIL VARCHAR(255) PRIMARY KEY, 
    SENHA VARCHAR(255))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
