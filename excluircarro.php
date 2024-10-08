<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Carro</title>
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
        }
        .message {
            text-align: center;
            margin: 20px 0;
        }
        a {
            display: inline-block;
            background-color: #e67e22;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <h2>Excluir Carro</h2>
    <div class="container">
        <?php
        require 'config.php';

        $placa = $_GET['placa'];

        // Primeiro, exclua as vendas associadas
        $sqlDeleteVendas = "DELETE FROM vendas WHERE PLACAcarro = ?;";
        $stmtDeleteVendas = $conexao->prepare($sqlDeleteVendas);
        $stmtDeleteVendas->bind_param("s", $placa);
        $stmtDeleteVendas->execute();

        // Depois, exclua o carro
        $sqlDeleteCarro = "DELETE FROM carros WHERE placa = ?;";
        $stmtDeleteCarro = $conexao->prepare($sqlDeleteCarro);
        $stmtDeleteCarro->bind_param("s", $placa);
        $stmtDeleteCarro->execute();

        if ($stmtDeleteCarro) {
            echo "<div class='message'>Exclusão realizada com sucesso</div>";
        } else {
            echo "<div class='message'>Erro ao excluir, tente novamente</div>";
        }
        ?>
        <div class="message">
            <a href="consultar.php">Voltar</a>
        </div>
    </div>
</body>
</html>
