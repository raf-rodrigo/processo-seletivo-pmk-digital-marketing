<?php
ob_start();
require_once __DIR__ . '/controller/DoadorController.php';

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados enviados via JSON
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (isset($inputData['id']) && !empty($inputData['dadosDoador'])) {
        $id = $inputData['id'];
        $dadosDoador = $inputData['dadosDoador'];
        $dadosDoacao = $inputData['dadosDoacao'] ?? []; // Pode ser vazio

        // Chama o método update() do Controller
        $result = DoadorController::update($id, $dadosDoador, $dadosDoacao);

        // Retorna resposta em JSON
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido']);
}
ob_end_flush();
?>