<?php
require '../db.php';
require '../view/criar_solicitacao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $data_previsao = $_POST['data_previsao'];
    $data_criacao = $_POST['data_criacao'];
    $numero_solicitacao = 'SOL-' . time();

    try {
        $sql = "INSERT INTO cadastro_solicitacoes (numero_solicitacao, descricao, data_criacao, data_previsao) 
                VALUES (:numero_solicitacao, :descricao, :data_criacao, :data_previsao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numero_solicitacao', $numero_solicitacao);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_criacao', $data_criacao);
        $stmt->bindParam(':data_previsao', $data_previsao);

        if ($stmt->execute()) {
            echo "Solicitação registrada com sucesso! Número da solicitação: " . $numero_solicitacao;
            echo '<br><a href="../view/index.php"><button>Ver Lista de Solicitações</button></a>';
        } else {
            echo "Erro ao registrar a solicitação.";

        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}

//         echo "Solicitação criada com sucesso!";
//     } catch (PDOException $e) {
//         echo "Erro ao criar solicitação: " . $e->getMessage();
//     }
// }