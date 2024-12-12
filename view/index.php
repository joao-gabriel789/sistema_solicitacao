<?php

require '../db.php'; // Arquivo de conexão com o banco de dados

// Busca todas as solicitações no banco de dados
try {
    $sql = "SELECT * FROM cadastro_solicitacoes ORDER BY id DESC"; // Ordena pelo ID mais recente
    $stmt = $pdo->query($sql);
    $solicitacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar solicitações: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Solicitações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Sistema de Solicitações</h1>

    <!-- Botão para criar nova solicitação -->
    <a href="../controller/create.php" class="btn">Nova Solicitação</a>

    <h2>Lista de Solicitações</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Número da Solicitação</th>
                <th>Descrição</th>
                <th>Data de Criação</th>
                <th>Data de Previsão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($solicitacoes) > 0): ?>
                <?php foreach ($solicitacoes as $solicitacao): ?>
                    <tr>
                        <td><?php echo $solicitacao['id']; ?></td>
                        <td><?php echo $solicitacao['numero_solicitacao']; ?></td>
                        <td><?php echo $solicitacao['descricao']; ?></td>
                        <td><?php echo $solicitacao['data_criacao']; ?></td>
                        <td><?php echo $solicitacao['data_previsao']; ?></td>
                        <td>
                            <a href="../controller/update.php?id=<?php echo $solicitacao['id']; ?>" class="btn">Editar</a>
                            <a href="../controller/delete.php?id=<?php echo $solicitacao['id']; ?>" class="btn" onclick="return confirm('Tem certeza que deseja excluir esta solicitação?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhuma solicitação encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
