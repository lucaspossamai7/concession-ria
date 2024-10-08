<?php

require 'config.php';

$CPF = $_GET['CPF'];

// Prepara a query para excluir o cliente
$sql = "DELETE FROM clientes WHERE CPF = ?;";
$sqldelete = $conexao->prepare($sql);
$sqldelete->bind_param("i", $CPF);
$sqldelete->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
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
    <h2>Excluir Cliente</h2>
    <div class="container">
        <?php if ($sqldelete): ?>
            <div>Exclusão realizada com sucesso</div>
        <?php else: ?>
            <div>Erro ao excluir, tente novamente</div>
        <?php endif; ?>
        <a href="consultar.php">Voltar</a>
    </div>
</body>
</html>
