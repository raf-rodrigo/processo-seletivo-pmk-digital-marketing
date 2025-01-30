<?php
ob_start();

require_once __DIR__ . '/models/Doador.php';
require_once __DIR__ . '/models/DadosDoacao.php';
require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/conexao/Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados do doador
    $dadosDoador = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'cpf' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'data_nascimento' => $_POST['data_nascimento'],
        'data_cadastro' => $_POST['data_cadastro'],
        'cep' => $_POST['cep'],
        'logradouro' => $_POST['logradouro'],
        'numero' => $_POST['numero'],
        'complemento' => $_POST['complemento'],
        'bairro' => $_POST['bairro'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
    ];

    // Remove caracteres não numéricos do cartão
    $numeroCartao = preg_replace('/\D/', '', $_POST['cartao']);

    // Dados da doação
    $dadosDoacao = [
        'intervalo_doacao' => $_POST['intervalo_doacao'],
        'valor_doacao' => $_POST['valor_doacao'],
        'forma_pagamento' => $_POST['forma_pagamento'],
        'banco' => !empty($_POST['banco']) ? $_POST['banco'] : null, // Define como NULL se estiver vazio
        'agencia' => !empty($_POST['agencia']) ? $_POST['agencia'] : null,
        'conta' => !empty($_POST['conta']) ? $_POST['conta'] : null,
        'bandeira_cartao' => $_POST['bandeira_cartao'],
        'cartao' => $numeroCartao,
        'seis_primeiros_digitos' => substr($numeroCartao, 0, 6),
        'quatros_ultimos_digitos' => substr($numeroCartao, -4),
    ];

    // Verifica se os campos obrigatórios da doação estão preenchidos
    if ($dadosDoacao['forma_pagamento'] === "Crédito") {
        if (empty($dadosDoacao['seis_primeiros_digitos']) || empty($dadosDoacao['quatros_ultimos_digitos'])) {
            echo "Erro: Os campos seis_primeiros_digitos e quatro_ultimos_digitos são obrigatórios.";
            exit;
        }
    }

    // Obtém a conexão PDO
    $pdo = Conexao::getConexao();

    try {
        // Inicia a transação
        $pdo->beginTransaction();

        // Cria o doador e obtém o ID
        $doador_id = criarDoador($pdo, $dadosDoador);

        if (!$doador_id) {
            throw new Exception("Erro ao inserir doador.");
        }

        // Adiciona o ID do doador aos dados da doação
        $dadosDoacao['doador_id'] = $doador_id;

        // Depuração: Exibe os dados da doação
//        echo "<pre>";
//        echo "Dados da Doação:\n";
//        print_r($dadosDoacao);
//        echo "</pre>";

        // Cria a doação
        $resultado = criarDoacao($pdo, $dadosDoacao);

        if (!$resultado) {
            throw new Exception("Erro ao inserir doação.");
        }

        // Commit da transação
        $pdo->commit();
        echo "Cadastro realizado com sucesso!";
    } catch (Exception $e) {
        // Rollback em caso de erro
        $pdo->rollBack();
        echo "Erro ao cadastrar: " . $e->getMessage();
    }

    header('Location: index.php');
    exit();

}

// Função para criar um doador
function criarDoador($pdo, $dadosDoador) {
    $sql = "INSERT INTO doadores (nome, email, cpf, telefone, data_nascimento, data_cadastro, cep, logradouro, numero, complemento, bairro, cidade, estado)
            VALUES (:nome, :email, :cpf, :telefone, :data_nascimento, :data_cadastro, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :estado)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute($dadosDoador);
        return $pdo->lastInsertId(); // Retorna o ID do doador inserido
    } catch (PDOException $e) {
        throw new Exception("Erro ao inserir doador: " . $e->getMessage());
    }
}

// Função para criar uma doação
function criarDoacao($pdo, $dadosDoacao) {
    $sql = "INSERT INTO dados_doacao (doador_id, intervalo_doacao, valor_doacao, forma_pagamento, banco, agencia, conta, bandeira_cartao, cartao, seis_primeiros_digitos, quatros_ultimos_digitos)
            VALUES (:doador_id, :intervalo_doacao, :valor_doacao, :forma_pagamento, :banco, :agencia, :conta, :bandeira_cartao, :cartao, :seis_primeiros_digitos, :quatros_ultimos_digitos)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute($dadosDoacao);
        return true; // Retorna true se a inserção for bem-sucedida
    } catch (PDOException $e) {
        throw new Exception("Erro ao inserir doação: " . $e->getMessage());
    }
}

ob_end_flush();
?>
