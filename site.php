<?php


     if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<h1>Bem vindo!</h1>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
		
	</script>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  		<div class="container-fluid">
    		<a class="navbar-brand" href="cadastrarProdutos.php">Cadastro de Produtos</a>
    		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastrarFornecedores.php">Cadastrar Fornecedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cesta.php">Cesta</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
	 </form>
	
	<a href="logout.php">Logout</a>

	<div class="container">
		<div class="row">
			<div col mt-5>
			<?php 
				include("config.php");
				switch(@$_REQUEST['page']){
				case "novoFornecedor":
				include("cadastrarFornecedores.php");
				break;
				case "novoProduto":
				include("cadastrarProdutos.php");
				break;
				case "produtos":
				include("produtos.php");
				break;
				case "cesta":
				include("cesta.php");
				break;
				case"salvar":
				include("salvarFornecedor");
				break;
				case"salvarProduto":
				include("salvarProdutos.php");
				break;

				}
			?>
				
			</div>
		</div>
	</div>


	<?php



	if(isset($_POST["Logout"])){
		logout();
	}

	?>

</body>
</html>