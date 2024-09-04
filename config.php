<?php

	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "login1";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error){
		die("Falha na conexão com o Banco de Dados" . $conn->connect_error);
	}
	

?>