<?php

require 'config.php';

// Inicializa a variável de exclusão
$exclusaoBemSucedida = false;
$errorMessage = '';

// Verifica se o parâmetro matricula foi passado na URL
if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    
    // Verifica se a matrícula é um número
    if (is_numeric($matricula)) {
        // Prepara a query para excluir o vendedor
        $sql = "DELETE FROM vendedor WHERE matricula = ?;";
        $sqldelete = $conexao->prepare($sql);

        if ($sqldelete) {
            $sqldelete->bind_param("i", $matricula);
            $sqldelete->execute();

            // Verifica se a exclusão foi bem-sucedida
            if ($sqldelete->affected_rows > 0) {
                $exclusaoBemSucedida = true;
            } else {
                $errorMessage = "Nenhum registro encontrado com essa matrícula.";
            }
        } else {
            $errorMessage = "Erro ao preparar a query: " . $conexao->error;
        }
    } else {
        $errorMessage = "Matrícula deve ser um número.";
    }
} else {
    $errorMessage = "Matrícula não fornecida.";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Vendedor</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e2f;
            color: #ecf0f1;
            margin: 20px;
        }
        h2 {
            color: #e67e22;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .container {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
        a {
            display: inline-block;
            background-color: #e67e22;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        a:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <h2>Excluir Vendedor</h2>
    <div class="container">
        <?php if ($exclusaoBemSucedida): ?>
            <div>Exclusão realizada com sucesso</div>
        <?php else: ?>
            <div><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <a href="consultar.php">Voltar</a>
    </div>
</body>
</html>
