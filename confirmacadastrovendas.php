<?php
require 'config.php'; // Inclua seu arquivo de configuração do banco de dados

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $valordavenda = $_POST['valordavenda'];
    $formadepagamento = $_POST['formadepagamento'];
    $datadavenda = $_POST['datadavenda'];
    $CPFcliente = $_POST['CPFcliente'];
    $PLACAcarro = $_POST['PLACAcarro'];
    $MATRICULAvendedor = $_POST['MATRICULAvendedor'];

    // Prepara a query de inserção
    $sql = "INSERT INTO vendas (valordavenda, formadepagamento, datadavenda, CPFcliente, PLACAcarro, MATRICULAvendedor) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Faz o binding dos parâmetros
        $stmt->bind_param("issisi", $valordavenda, $formadepagamento, $datadavenda, $CPFcliente, $PLACAcarro, $MATRICULAvendedor);
        
        // Executa a query
        if ($stmt->execute()) {
            // venda bem-sucedido
            header("Location: index.php"); // Redireciona para uma página de sucesso
            exit(); // Encerra o script após o redirecionamento
        } else {
            // Erro na execução
            echo "Erro ao cadastrar a venda, verifique os dados e tente novamente.";
        }
    } else {
        // Erro na preparação da query
        echo "Erro ao preparar a query.";
    }

    $stmt->close(); // Fecha o statement
    $conexao->close(); // Fecha a conexão
} else {
    // Método de requisição inválido
    echo "Método de requisição inválido.";
}
?>
