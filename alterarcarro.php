<?php
require 'config.php';

session_start();

$placa = isset($_GET['placa']) ? $_GET['placa'] : '';

$_SESSION['placa'] = $placa;

$sql = "SELECT nome, marca, quilometragem, motor, valor FROM carros WHERE placa = ?;";
$sqlselect = $conexao->prepare($sql);
$sqlselect->bind_param("s", $placa); // Alterado para "s" para tratar a placa como string
$sqlselect->execute();

$resultado = $sqlselect->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
    $marca = $row['marca'];
    $quilometragem = $row['quilometragem'];
    $motor = $row['motor'];
    $valor = $row['valor'];
} else {
    echo "Carro não encontrado, verifique os dados e tente novamente.";
    exit; // Para garantir que o restante do código não seja executado
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração</title>
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
    <h2>Alterar Carro</h2>
    <form method="POST" action="atualizarcarro.php">
        <input type="text" name="placa" value="<?php echo htmlspecialchars($placa); ?>" placeholder="Placa do Veículo" readonly>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" placeholder="Nome do Veículo">
        <input type="text" name="marca" value="<?php echo htmlspecialchars($marca); ?>" placeholder="Marca do Veículo">
        <input type="number" name="quilometragem" value="<?php echo htmlspecialchars($quilometragem); ?>" placeholder="Quilometragem">
        <input type="number" step="0.01" name="motor" value="<?php echo htmlspecialchars($motor); ?>" placeholder="Motor">
        <input type="number" step="0.01" name="valor" value="<?php echo htmlspecialchars($valor); ?>" placeholder="Valor">
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
