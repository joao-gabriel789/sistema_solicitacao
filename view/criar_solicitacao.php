<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Solicitação</title>
</head>
<body>
<h1>Registrar Solicitação</h1>
    <form action="../controller/create.php" method="POST">
        
        <label for="data_previsao">Data Criação:</label><br>
        <input type="date" id="data_criacao" name="data_criacao" required><br><br>
        
        <label for="data_previsao">Data de Previsão:</label><br>
        <input type="date" id="data_previsao" name="data_previsao" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>


        <input type="submit" value="Salvar">

    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html>