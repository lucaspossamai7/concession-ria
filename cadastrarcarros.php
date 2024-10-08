<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carros</title>
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
        button,
        select {
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
        select {
            background-color: #34495e;
            color: #ecf0f1;
        }
    </style>
    <script>
        const models = {
            BMW: ["X1", "X2", "X3", "X4", "X5", "X6", "X7", "IX", "IX M60", "I7", "I4", "I5 M60", "IX1", "IX2", "IX3", "M1"],
            Audi: ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "RS3", "RS6", "RS7", "RS Q3", "SQ5", "Q3", "Q5", "TT Coupé", "TT Roadster", "TTS"],
            Renault: ["Sandero", "Sandero Stepway", "Duster", "Logan", "Oroch", "Captur", "Master", "Zoe", "Kangoo", "Kangoo Express", "Kardian", "Megane", "Master Chassi"],
            Fiat: ["Palio", "Uno", "Toro", "Mobi", "Cronos", "Argo", "Fastback", "Pulse", "Strada", "Scudo", "Ducato", "Fiorino"],
            Ford: ["Fiesta", "Focus", "Fusion", "Ranger", "Raptor", "Ka", "Ecosport", "F-1000", "F-250", "Maverick", "Mustang"],
            Mercedes: ["EQE", "EQS", "EQA", "EQB", "Classe C", "Classe E", "Classe S", "GLB", "GLA", "GLS", "GLC", "GLE", "CLA", "AMG"],
            Chevrolet: ["Onix", "Cruze", "Tracker", "Spin", "S10", "Camaro", "Bolt", "Equinox", "Prisma", "Montana", "Cobalt", "celta", "Corsa"],
            Volkswagen: ["Gol", "Polo", "Polo Track", "T-Cross", "Vistus", "Jetta", "Nivus", "Taos", "ID.4", "Tiguan", "Saveiro", "Amarok", "ID.Buzz"],
            Hyundai: ["HB20", "HB20S", "HB20X", "Tucson", "Creta", "i30", "IX35", "HR", "Kona", "Ionic", "Palaside"],
            Jeep: ["Renegade", "Compass", "Wrangler", "Gladiator", "Grand Cherokke", "Commander", "CJ-5", "Willys"],
            KIA: ["Seltos", "Sportage", "Rio", "Bongo", "Cerato", "Carnival", "Stonic", "Niro", "Grand Carnival", "EV5"],
            Citroen: ["Aircross", "C3", "C3 Aircross", "C4", "C4 Cactus", "C4 Lounge", "Jumper", "Jumpy"],
            Peugeot: ["208", "2008", "E-2008", "3008", "Boxer", "Expert", "Partner", "Partner Rapid"],
            Nissan: ["Versa", "Kicks", "Sentra", "Frontier", "LEAF"],
            Honda: ["Civic", "City", "CR-V", "City Hatchback", "Acordd", "ZR-V", "Fit", "HR-V"],
            Volvo: ["XC40", "XC60", "XC90", "EX30", "S60", "S90", "C40"],
            Toyota: ["Corolla", "Corolla Cross", "Corolla Hatch", "SW4", "Hilux Cabine Dupla", "Hilux Cabine Simples", "RAV4", "Yaris Hatch", "Yaris Sedan", "Camry", "Prius"],
        };

        function updateModels() {
            const brandSelect = document.querySelector('select[name="marca"]');
            const modelSelect = document.querySelector('select[name="modelo"]');
            const selectedBrand = brandSelect.value;

            // Limpa modelos anteriores
            modelSelect.innerHTML = '<option value="" disabled selected>Selecione o modelo do veículo</option>';

            // Adiciona os modelos da marca selecionada
            if (models[selectedBrand]) {
                models[selectedBrand].forEach(model => {
                    const option = document.createElement('option');
                    option.value = model;
                    option.textContent = model;
                    modelSelect.appendChild(option);
                });
            }
        }
    </script>
</head>
<body>
    <h2>Cadastrar Carro</h2>
    <form method="post" action="confirmacadastrocarro.php">
        <input type="text" name="placa" placeholder="Digite a placa do veículo:" required>

        <select name="marca" onchange="updateModels()" required>
            <option value="" disabled selected>Selecione a marca do veículo</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Renault">Renault</option>
            <option value="Fiat">Fiat</option>
            <option value="Ford">Ford</option>
            <option value="Mercedes">Mercedes</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Jeep">Jeep</option>
            <option value="KIA">KIA</option>
            <option value="Citroen">Citroen</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Nissan">Nissan</option>
            <option value="Honda">Honda</option>
            <option value="Volvo">Volvo</option>
            <option value="Toyota">Toyota</option>
        </select>

        <select name="modelo" required>
            <option value="" disabled selected>Selecione o modelo do veículo</option>
        </select>

        <input type="number" name="quilometragem" placeholder="Digite a quilometragem do veículo:" required>
        
        <select name="motor" required>
            <option value="" disabled selected>Selecione a força do motor</option>
            <option value="1.0">1.0</option>
            <option value="1.4">1.4</option>
            <option value="1.6">1.6</option>
            <option value="2.0">2.0</option>
            <option value="2.5">2.5</option>
            <option value="3.0">3.0</option>
            <option value="Turbo">Turbo</option>
        </select>

        <input type="number" step="0.01" name="valor" placeholder="Digite o valor do veículo:" required>
        <button type="submit">Cadastrar Carro</button>
    </form>
</body>
</html>



