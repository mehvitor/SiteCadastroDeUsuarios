
<link rel="stylesheet" href="estilo.css">
 
<h1>Cadastre novo Produto</h1>

<form method="post" action="salvarProdutos.php">
	<input type="hidden" name="acao" value="cadastrar">
		<div class="mb-3">
		<label>Identificador</label>
		<input type="text" name="idProdutos" class="form-control">
	</div>
	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control">
	</div>
	<div class="mb-3">
		<label>Descrição</label>
		<input type="text" name="descricao" class="form-control">
	</div>
	<div class="mb-3">
		<label>Valor</label>
		<input type="text" name="valor" class="form-control">
	</div>
	<div class="mb-3">
		<input type="submit" value="Cadastrar"> 
	</div>
</form>

<link rel="stylesheet" href="estilo.css">
<a href="site.php" class="btn btn-secondary">Voltar</a>