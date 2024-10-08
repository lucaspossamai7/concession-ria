<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e2f;
            color: #ecf0f1;
            margin: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }
        h1 {
            color: #e67e22;
            margin-bottom: 40px;
            font-size: 3em; /* Tamanho do título aumentado */
            text-transform: uppercase; /* Título em maiúsculas */
            letter-spacing: 2px; /* Espaçamento entre letras */
        }
        .button-container {
            display: flex;
            flex-wrap: wrap; /* Permite que os botões quebrem linha */
            justify-content: center; /* Centraliza os botões */
        }
        .button {
            display: inline-block;
            background-color: #e67e22;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: bold;
            margin: 10px; /* Menor margem para alinhar melhor */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .button:hover {
            background-color: #d35400;
            transform: translateY(-2px); /* Adiciona um efeito ao passar o mouse */
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à Concessionária</h1>
    <div class="button-container">
        <a class="button" href="cadastrarcarros.php">Cadastrar Carro</a>
        <a class="button" href="cadastrarclientes.php">Cadastrar Cliente</a>
        <a class="button" href="cadastrarvendedor.php">Cadastrar Vendedor</a>
        <a class="button" href="cadastrarvendas.php">Cadastrar Venda</a>
        <a class="button" href="consultar.php">Consultar</a>
    </div>
</body>
</html>

