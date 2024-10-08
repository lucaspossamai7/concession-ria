<?php
require 'config.php'; // Inclua seu arquivo de configuração do banco de dados

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $CPF = $_POST['CPF'];
    $telefone = $_POST['telefone'];
    $renda = $_POST['renda'];
    $datadenascimento = $_POST['datadenascimento'];

    // Prepara a query de inserção
    $sql = "INSERT INTO clientes (nome, endereco, CPF, telefone, renda, datadenascimento) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Faz o binding dos parâmetros
        $stmt->bind_param("ssisss", $nome, $endereco, $CPF, $telefone, $renda, $datadenascimento);
        
        // Executa a query
        if ($stmt->execute()) {
            // Cadastro bem-sucedido
            header("Location: index.php"); // Redireciona para uma página de sucesso
            exit(); // Encerra o script após o redirecionamento
        } else {
            // Erro na execução
            echo "Erro ao cadastrar o cliente, verifique os dados e tente novamente.";
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
