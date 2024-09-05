<link rel="stylesheet" href="estilo.css">
<h1>Lista de Produtos</h1>


<?php 

	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


	require_once "config.php";

	$sql = "SELECT * FROM produtos";

	$res = $conn->query($sql);
	
	$qtd = $res->num_rows;


	if($qtd > 0){
		print "<table class='table table-hover table-stripped table-bordered'>";
			print "<tr>";
			print "<th>ID</th>";
			print "<th>Nome</th>";
			print "<th>Descrição</th>";
			print "<th>Valor</th>";
			print "</tr>";
		while ($row = $res->fetch_object()) {
			print "<tr>";
			print "<td>". $row -> idProdutos."</td>";
			print "<td>" .$row -> nome."</td>"; 
			print "<td>" .$row -> descricao."</td>";
			print "<td>" .$row -> valor."</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<p class='alert alert-danger' > Não foram encontrados produtos</p>";
	}


 ?>

