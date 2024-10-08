<?php
require 'config.php'; // Inclua seu arquivo de configuração do banco de dados

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $placa = $_POST['placa'];
    $nome = $_POST['modelo'];
    $marca = $_POST['marca'];
    $quilometragem = $_POST['quilometragem'];
    $motor = $_POST['motor'];
    $valor = $_POST['valor'];

    // Prepara a query de inserção
    $sql = "INSERT INTO carros (placa, nome, marca, quilometragem, motor, valor) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Faz o binding dos parâmetros
        $stmt->bind_param("sssiid", $placa, $nome, $marca, $quilometragem, $motor, $valor);
        
        // Executa a query
        if ($stmt->execute()) {
            // Cadastro bem-sucedido
            header("Location: index.php");
        } else {
            // Erro na execução
            echo "Erro ao cadastrar o carro, verifique os dados e tente novamente.";
        }
    } else {
        // Erro na preparação da query
        echo "Erro ao preparar a query.";
    }

    $stmt->close(); // Fechar o statement
    $conexao->close(); // Fechar a conexão
} else {
    // Método de requisição inválido
    echo "Método de requisição inválido.";
}
?>
