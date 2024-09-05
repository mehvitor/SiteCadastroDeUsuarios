
<link rel="stylesheet" href="estilo.css">
 
<h1>Cadastre novo Fornecedor</h1>
<form method="post" action="salvarFornecedor.php">
	<input type="hidden" name="acao" value="cadastrar">
		<div class="mb-3">
		<label>Identificador</label>
		<input type="text" name="idFornecedores" class="form-control">
	</div>
	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control">
	</div>
	<div class="mb-3">
		<label>CPF</label>
		<input type="text" name="cpf" class="form-control">
	</div>
	<div class="mb-3">
		<input type="submit" value="Cadastrar"> 
	</div>
</form>

<a href="site.php" class="btn btn-secondary">Voltar</a>