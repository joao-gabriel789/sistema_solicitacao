<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Solicitação</title>
</head>
<body>
    <h1>Editar Solicitação</h1>
    <form method="POST">
        <label for="data_previsao">Nova Data de Previsão:</label>
        <input type="date" name="data_previsao" value="<?php echo $solicitacao['data_previsao']; ?>" required>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
<?php
require '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data_previsao = $_POST['data_previsao'];

        try {
            $sql = "UPDATE cadastro_solicitacoes SET data_previsao = :data_previsao WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':data_previsao', $data_previsao);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            echo "Data de previsão atualizada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar solicitação: " . $e->getMessage();
        }
    }
    
    $sql = "SELECT * FROM cadastro_solicitacoes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $solicitacao = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php exit(); ?>

