<?php

	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


	require_once "config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$idProdutos = $_POST['idProdutos'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$valor = $_POST['valor'];
	

		$sql = "INSERT INTO produtos (idProdutos, nome, descricao, valor) VALUES ( ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssss", $idProdutos, $nome, $descricao, $valor);

		if($stmt ->execute()){
			echo "Produto cadastrado com sucesso";
		} else{
			echo "Erro: " . $sql. "<br>" . $conn->error;
		}

		$stmt->close();


	}

	$conn->close();


?>