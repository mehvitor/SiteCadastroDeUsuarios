<?php
session_start();
$carrinho = $_SESSION['carrinhos'] ?? [];

$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Carrinho de Compras</h1>

        <?php if (count($carrinho) > 0): ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrinho as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto['idProdutos']) ?></td>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td><?= htmlspecialchars($produto['descricao']) ?></td>
                            <td>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></td>
                            
                        </tr>
                        <?php $total += $produto['valor']?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>
        <?php else: ?>
            <p class="alert alert-warning">Seu carrinho está vazio.</p>
        <?php endif; ?>

        <a href="produtos.php" class="btn btn-secondary">Continuar Comprando</a>
        <a href="site.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
