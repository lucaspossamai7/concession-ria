<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Vendedor</title>
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
    <h2>Atualizar Vendedor</h2>
    <div class="container">
        <?php
        require 'config.php';
        session_start();

        // Verifica se o método de requisição é POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura os dados do formulário
            $matricula = $_POST['matricula'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $datadenascimento = $_POST['datadenascimento'];
            $endereco = $_POST['endereco'];

            // Prepara a query de atualização
            $sql = "UPDATE vendedor SET nome = ?, telefone = ?, datadenascimento = ?, endereco = ? WHERE matricula = ?;";
            $sqlupdate = $conexao->prepare($sql);

            if ($sqlupdate) {
                // Faz o binding dos parâmetros
                $sqlupdate->bind_param("ssssi", $nome, $telefone, $datadenascimento, $endereco, $matricula);
                
                // Executa a query
                if ($sqlupdate->execute()) {
                    // Atualização bem-sucedida
                    echo "<div class='message'>Atualização realizada com sucesso.</div>";
                } else {
                    // Erro na execução da query
                    echo "<div class='message'>Erro ao atualizar, verifique os dados e tente novamente.</div>";
                }
            } else {
                // Erro na preparação da query
                echo "<div class='message'>Erro ao preparar a query.</div>";
            }
        } else {
            // Método de requisição inválido
            echo "<div class='message'>Método de requisição inválido.</div>";
        }
        ?>
        <div class="message">
            <a href="consultar.php">Voltar</a>
        </div>
    </div>
</body>
</html>
