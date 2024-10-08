<?php

require 'config.php';

echo '<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #1e1e2f;
        color: #ecf0f1;
        margin: 20px;
    }
    h2 {
        color: #e67e22;
        border-bottom: 2px solid #e67e22;
        padding-bottom: 10px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .card {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
    }
    .card-title {
        font-size: 22px;
        font-weight: bold;
        color: #e67e22;
        margin-bottom: 10px;
    }
    .card-info {
        margin: 8px 0;
        font-size: 15px;
        line-height: 1.5;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    a.button {
        display: inline-block;
        background-color: #e67e22;
        color: white;
        padding: 10px 15px;
        border-radius: 25px;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
        margin-right: 10px;
        text-align: center;
        font-weight: bold;
        border: 2px solid transparent;
    }
    a.button:hover {
        background-color: #d35400;
        border-color: #d35400;
        transform: translateY(-2px);
    }
</style>';

$sql = "SELECT * FROM clientes";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h2>Clientes:</h2><div class='container'>";
    while ($row = $resultado->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-title">' . $row['nome'] . '</div>';
        echo '<div class="card-info">Endereço: ' . $row['endereco'] . '</div>';
        echo '<div class="card-info">CPF: ' . $row['CPF'] . '</div>';
        echo '<div class="card-info">Telefone: ' . $row['telefone'] . '</div>';
        echo '<div class="card-info">Renda: ' . $row['renda'] . '</div>';
        echo '<div class="card-info">Data de Nascimento: ' . date("d/m/Y", strtotime($row['datadenascimento'])) . '</div>';
        echo '<a class = button href="alterarcliente.php?CPF=' . $row['CPF'] . '">Alterar</a>';
        echo '<a class = button href="excluircliente.php?CPF=' . $row['CPF'] . '">Excluir</a>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "<p>Nenhum registro encontrado!</p>";
}

$sql2 = "SELECT * FROM carros;";
$resultado2 = $conexao->query($sql2);

if ($resultado2->num_rows > 0) {
    echo "<h2>Carros:</h2><div class='container'>";
    while ($row2 = $resultado2->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-title">' . $row2['nome'] . '</div>';
        echo '<div class="card-info">Placa: ' . $row2['placa'] . '</div>';
        echo '<div class="card-info">Marca: ' . $row2['marca'] . '</div>';
        echo '<div class="card-info">Quilometragem: ' . $row2['quilometragem'] . '</div>';
        echo '<div class="card-info">Valor: ' . $row2['valor'] . '</div>';
        echo '<div class="card-info">Motor: ' . $row2['motor'] . '</div>';
        echo '<a class = button href="alterarcarro.php?placa=' . $row2['placa'] . '">Alterar</a>';
        echo '<a class = button href="excluircarro.php?placa=' . $row2['placa'] . '">Excluir</a>';
        echo '</div>';
    }
    echo '</div>';
}

$sql3 = "SELECT * FROM vendedor;";
$resultado3 = $conexao->query($sql3);

if ($resultado3->num_rows > 0) {
    echo "<h2>Vendedores:</h2><div class='container'>";
    while ($row3 = $resultado3->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-title">' . $row3['nome'] . '</div>';
        echo '<div class="card-info">Matrícula: ' . $row3['matricula'] . '</div>';
        echo '<div class="card-info">Telefone: ' . $row3['telefone'] . '</div>';
        echo '<div class="card-info">Data de Nascimento: ' . $row3['datadenascimento'] . '</div>';
        echo '<div class="card-info">Endereço: ' . $row3['endereco'] . '</div>';
        echo '<a class = button href="alterarvendedor.php?matricula=' . $row3['matricula'] . '">Alterar</a>';
        echo '<a class = button href="excluirvendedor.php?matricula=' . $row3['matricula'] . '">Excluir</a>';
        echo '</div>';
    }
    echo '</div>';
}

$sql4 = "SELECT ID, valordavenda, formadepagamento, datadavenda, CPFcliente, MATRICULAvendedor, PLACAcarro,  clientes.nome as Cliente, vendedor.nome as Vendedor, carros.nome as Modelo FROM vendas JOIN carros on PLACAcarro = carros.placa JOIN vendedor on MATRICULAvendedor = vendedor.matricula JOIN clientes on CPFcliente = clientes.cpf;";
$resultado4 = $conexao->query($sql4);
echo "<h2>Vendas:</h2><div class='container'>";
if ($resultado4->num_rows > 0) {
   
    while ($row4 = $resultado4->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-info">ID: ' . $row4['ID'] . '</div>';
        echo '<div class="card-info">Valor: ' . $row4['valordavenda'] . '</div>';
        echo '<div class="card-info">Forma de Pagamento: ' . $row4['formadepagamento'] . '</div>';
        echo '<div class="card-info">Data: ' . $row4['datadavenda'] . '</div>';
        echo '<div class="card-info">CPF: ' . $row4['CPFcliente'] . '</div>';
        echo '<div class="card-info">Cliente: ' . $row4['Cliente'] . '</div>';
        echo '<div class="card-info">Matricula: ' . $row4['MATRICULAvendedor'] . '</div>';
        echo '<div class="card-info">Vendedor: ' . $row4['Vendedor'] . '</div>';
        echo '<div class="card-info">Placa: ' . $row4['PLACAcarro'] . '</div>';
        echo '<div class="card-info">Modelo: ' . $row4['Modelo'] . '</div>';
        echo '<a class = button href="excluirvenda.php?ID=' . $row4['ID'] . '">Excluir</a>';
        echo '</div>';
    }
    echo '</div>';
}

?>
