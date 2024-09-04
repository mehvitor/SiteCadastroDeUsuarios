<?php

        session_start(); 
    
   

    require_once "config.php";

    function logout(){
    	session_unset();
    	session_destroy();
    	header("Location: index.php");
    	exit;
    }

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    	header("Location: index.php");
    	exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loja</title>
</head>
<body>
	<h1>Bem vindo!</h1>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
	 </form>
	
	<a href="logout.php">Logout</a>

	<?php
	if(isset($_POST["Logout"])){
		logout();
	}

	?>

</body>
</html>