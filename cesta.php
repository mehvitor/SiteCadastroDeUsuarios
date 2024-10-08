
<?php
session_start();
$cesta = $_SESSION['cesta'] ?? [];
$total = 0;

foreach ($cesta as $produto) {
    $total += $produto['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Sua Cesta de Compras</h1>
        <?php if (count($cesta) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cesta as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td><?= htmlspecialchars($produto['descricao']) ?></td>
                            <td>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>
        <?php else: ?>
            <p>Sua cesta está vazia.</p>
        <?php endif; ?>
        <a href="produtos.php" class="btn btn-secondary">Voltar aos Produtos</a>
    </div>
</body>
</html>