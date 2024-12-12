<?php
require '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM cadastro_solicitacoes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Solicitação excluída com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao excluir solicitação: " . $e->getMessage();
    }
}
?>
