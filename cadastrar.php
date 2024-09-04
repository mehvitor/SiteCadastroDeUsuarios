<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<h1>Informe seus dados para o Cadastro</h1>
	<form method="post" action="cadastro.php">
		
		Nome: <input type="text" name="name" required><br>
		Email: <input type="email" name="email" required><br>
		Senha: <input type="password" name="password" required><br>

		<input type="submit">

	</form>

	<br>
	<a href="index.php">Faça o Login</a>
     

</body>
</html>