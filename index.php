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