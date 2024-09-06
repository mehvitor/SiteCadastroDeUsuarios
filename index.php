<?php 

	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	require_once "config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
	}

	$sql = "SELECT * FROM users WHERE name = ? AND email = ?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $name, $email);
	$stmt->execute();

	$result = $stmt->get_result();

	if($result->num_rows === 1){
		$row = $result->fetch_assoc();

		if(password_verify($password, $row['password'])){
			$_SESSION["loggedin"] = true;
			header("Location: site.php");
			exit;
		}
	}

	else{
		$erro = "Usuário ou senha incorretos!";
	}


 ?>

 <?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'login1'; // Substitua pelo nome desejado para o banco de dados
$username = 'root'; // Usuário do MySQL
$password = ''; // Senha do MySQL

try {
    // Conectar ao MySQL sem especificar o banco de dados
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar o banco de dados, se não existir
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->exec($sql);

    // Conectar ao banco de dados recém-criado
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar tabela users
    $sql = "CREATE TABLE IF NOT EXISTS users (
        idUsers INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    // Criar tabela produtos
    $sql = "CREATE TABLE IF NOT EXISTS produtos (
        idProdutos INT(6) PRIMARY KEY not null,
        nome VARCHAR(100) NOT NULL,
        descricao VARCHAR(100) not null,
        valor DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    // Criar tabela fornecedores
    $sql = "CREATE TABLE IF NOT EXISTS fornecedores (
        idFornecedores INT(6)  PRIMARY KEY not null,
        nome VARCHAR(100) NOT NULL,
        cpf VARCHAR(11) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    echo "Banco de dados e tabelas criados com sucesso.";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$pdo = null;
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<h1>Inicie sua Sessão</h1>

	<form method="post" action="index.php">
		Nome: <input type="text" name="name" required><br>
		Email: <input type="email" name="email" required><br>
		Senha: <input type="password" name="password" required><br>

		<input type="submit" value="Logar" > 
	</form>
	<br>
	<a href="cadastrar.php">Cadastre Aqui</a>
</body>
</html>