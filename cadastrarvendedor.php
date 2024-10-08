<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vendedor</title>
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
            background: linear-gradient(135deg, #2c3e50, #34495e);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: auto;
        }
        input[type="number"],
        input[type="text"],
        input[type="date"],
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        input {
            background-color: #34495e;
            color: #ecf0f1;
        }
        input::placeholder {
            color: #bdc3c7;
        }
        button {
            background-color: #e67e22;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <h2>Cadastrar Vendedor</h2>
    <form method="post" action="confirmacadastrovendedor.php">
        <input type="number" name="matricula" placeholder="Digite a matrícula do vendedor:" required>
        <input type="text" name="nome" placeholder="Digite o nome do vendedor:" required>
        <input type="number" name="telefone" placeholder="Digite o telefone do vendedor:" required>
        <input type="date" name="datadenascimento" placeholder="Digite a data de nascimento do vendedor:" required>
        <input type="text" name="endereco" placeholder="Digite o endereço do vendedor:" required>
        <button type="submit">Cadastrar Vendedor</button>
    </form>
</body>
</html>
