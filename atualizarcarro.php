<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Carro</title>
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
    <h2>Atualizar Carro</h2>
    <div class="container">
        <?php
        require 'config.php';
        session_start();

        $placa = $_SESSION['placa'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $marca = $_POST['marca'];
            $quilometragem = $_POST['quilometragem'];
            $motor = $_POST['motor'];
            $valor = $_POST['valor'];

            // Prepara a query de atualização
            $sql = "UPDATE carros SET nome = ?, marca = ?, quilometragem = ?, motor = ?, valor = ? WHERE placa = ?";
            $sqlupdate = $conexao->prepare($sql);
            
            // Verifica se a preparação da query foi bem-sucedida
            if ($sqlupdate) {
                $sqlupdate->bind_param("ssiiis", $nome, $marca, $quilometragem, $motor, $valor, $placa);
                
                // Executa a query
                if ($sqlupdate->execute()) {
                    // Atualização bem-sucedida
                    echo "<div class='message'>Carro atualizado com sucesso!<br>";
                    echo "Placa: $placa<br>Nome: $nome<br>Marca: $marca<br>Quilometragem: $quilometragem<br>Motor: $motor<br>Valor: $valor</div>";
                } else {
                    // Erro na execução
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
