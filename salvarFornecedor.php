<?php

	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


	require_once "config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$idFornecedores = $_POST['idFornecedores'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
	

		$sql = "INSERT INTO fornecedores (idFornecedores, nome, cpf) VALUES ( ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $idFornecedores, $nome, $cpf);

		if($stmt ->execute()){
			echo "Fornecedor criado com sucesso";
		} else{
			echo "Erro: " . $sql. "<br>" . $conn->error;
		}

		$stmt->close();


	}

	$conn->close();


?>