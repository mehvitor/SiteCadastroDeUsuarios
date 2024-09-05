<?php
session_start();

// Verifica se a sessão do carrinho já existe, se não, cria uma nova
if (!isset($_SESSION['carrinhos'])) {
    $_SESSION['carrinhos'] = [];
}

// Verifica se os dados do produto estão presentes na requisição POST
if (isset($_POST['idProdutos']) && isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['valor'])) {
    $produto = [
        'idProdutos' => $_POST['idProdutos'],
        'nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'valor' => $_POST['valor'],
        
    ];

    // Adiciona o produto ao carrinho
    $_SESSION['carrinhos'][] = $produto;
}

// Redireciona de volta para a página dos produtos ou para a página do carrinho
header("Location: view_cart.php");
exit();
?>
