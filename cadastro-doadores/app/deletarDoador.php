<?php
ob_start(); // Começa o buffer de saída
require_once __DIR__ .  '/controller/Controller.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    // Chamar o método estático delete() da classe Controller
    $result = Controller::delete($id);

    // Verificar se a exclusão foi bem-sucedida
    if ($result) {
        // Redirecionar para index.php com um parâmetro de sucesso
        header('Location: index.php?success=1');
        exit();
    } else {
        // Redirecionar para index.php com um parâmetro de erro
        header('Location: index.php?error=1');
        exit();
    }


    header('Location: index.php');
    exit();
}

ob_end_flush(); // Finaliza o buffer de saída
?>