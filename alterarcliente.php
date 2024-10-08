<?php

require 'config.php';

session_start();

$CPF = isset($_GET['CPF']) ? $_GET['CPF'] : '';

$_SESSION['CPF'] = $CPF;

$sql = "SELECT nome, endereco, telefone, renda, datadenascimento FROM clientes WHERE CPF = ?;";
$sqlselect = $conexao->prepare($sql);
$sqlselect->bind_param("i", $CPF);
$sqlselect->execute();

$resultado = $sqlselect->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
    $renda = $row['renda'];
    $datadenascimento = $row['datadenascimento'];
} else {
    echo "Cliente não encontrado, verifique os dados e tente novamente.";
    exit; // Para garantir que o restante do código não seja executado
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cliente</title>
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
    <h2>Alterar Cliente</h2>
    <form method="POST" action="atualizarcliente.php">
        <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome do Cliente">
        <input type="text" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>" placeholder="Endereço">
        <input type="number" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" placeholder="Telefone">
        <input type="number" name="renda" value="<?php echo htmlspecialchars($renda); ?>" placeholder="Renda Mensal">
        <input type="date" name="datadenascimento" value="<?php echo htmlspecialchars($datadenascimento); ?>">
        <input type="hidden" name="CPF" value="<?php echo htmlspecialchars($CPF); ?>">
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>