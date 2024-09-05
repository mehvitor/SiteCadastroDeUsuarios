<link rel="stylesheet" href="estilo.css">
<h1>Lista de Produtos</h1>
<link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
			print "<th>Incluir no carrinho</th>";
			print "</tr>";
		while ($row = $res->fetch_object()) {
			print "<tr>";
			print "<td>". $row -> idProdutos."</td>";
			print "<td>" .$row -> nome."</td>"; 
			print "<td>" .$row -> descricao."</td>";
			 print "<td>R$ ". number_format($row->valor, 2, ',', '.') ."</td>";
        print "<td>
            <form method='POST' action='add_to_cart.php'>
                <input type='hidden' name='idProdutos' value='". $row->idProdutos ."'>
                <input type='hidden' name='nome' value='". $row->nome ."'>
                <input type='hidden' name='descricao' value='". $row->descricao ."'>
                <input type='hidden' name='valor' value='". $row->valor ."'>
                <button class='btn btn-success' type='submit'>Adicionar</button>
            </form>
			</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<p class='alert alert-danger' > Não foram encontrados produtos</p>";
	}

 ?>

 <a href="site.php" class="btn btn-secondary">Voltar</a>