<?php 
require '../db.php';
require 'criar_solicitacao.php';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura os dados do formulário
            $descricao = $_POST['descricao'];
            $data_previsao = $_POST['data_previsao'];
            $data_criacao = $_POST['data_criacao'];
            
        // Gera um número de solicitação único (baseado no timestamp atual)
        $numero_solicitacao = 'SOL-' . time();

        // Query para inserção dos dados
        $sql = "INSERT INTO cadastro_solicitacoes (numero_solicitacao, data_criacao, descricao, data_previsao) 
                VALUES (:numero_solicitacao, :data_criacao, :descricao, :data_previsao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numero_solicitacao', $numero_solicitacao);
        $stmt->bindParam(':data_criacao', $data_criacao);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_previsao', $data_previsao);

        // Executa a inserção
        if ($stmt->execute()) {
            echo "Solicitação registrada com sucesso! Número da solicitação: " . $numero_solicitacao;
            echo '<br><a href="index.php"><button>Ver Lista de Solicitações</button></a>';
        } else {
            echo "Erro ao registrar a solicitação.";

        }
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>