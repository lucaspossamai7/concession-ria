<?php

require 'config.php';

session_start();

$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : '';

$_SESSION['matricula'] = $matricula;

$sql = "SELECT nome, telefone, datadenascimento, endereco FROM vendedor WHERE matricula = ?;";
$sqlselect = $conexao->prepare($sql);
$sqlselect->bind_param("i", $matricula);
$sqlselect->execute();

$resultado = $sqlselect->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
    $telefone = $row['telefone'];
    $datadenascimento = $row['datadenascimento'];
    $endereco = $row['endereco'];
} else {
    echo "<p>Vendedor não encontrado, verifique os dados e tente novamente.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Vendedor</title>
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
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            margin: auto;
        }
        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #e67e22;
            background-color: #34495e;
            color: #ecf0f1;
        }
        button {
            background-color: #e67e22;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <h2>Alterar Vendedor</h2>
    <form method="POST" action="atualizarvendedor.php">
        <input type="number" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>" hidden>
        <input type="text" name="nome" placeholder="Nome" value="<?php echo htmlspecialchars($nome); ?>" required>
        <input type="number" name="telefone" placeholder="Telefone" value="<?php echo htmlspecialchars($telefone); ?>" required>
        <input type="date" name="datadenascimento" value="<?php echo htmlspecialchars($datadenascimento); ?>" required>
        <input type="text" name="endereco" placeholder="Endereço" value="<?php echo htmlspecialchars($endereco); ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>

