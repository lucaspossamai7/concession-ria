<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Clientes</title>
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
        input[type="text"],
        input[type="number"],
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
    <h2>Cadastrar Cliente</h2>
    <form method="post" action="confirmacadastrocliente.php">
        <input type="text" name="nome" placeholder="Digite o seu nome:" required>
        <input type="text" name="endereco" placeholder="Digite o seu endereço:" required>
        <input type="number" name="CPF" placeholder="Digite o seu CPF:" required>
        <input type="number" name="telefone" placeholder="Digite o seu número de telefone:" required>
        <input type="number" name="renda" placeholder="Digite a sua renda mensal:" required>
        <input type="date" name="datadenascimento" placeholder="Digite a data de nascimento:" required>
        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>
