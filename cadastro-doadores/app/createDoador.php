<?php

require_once __DIR__ . '/models/Doador.php';
require_once __DIR__ . '/models/DadosDoacao.php';
require_once __DIR__ . '/controller/Controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $data_cadastro = $_POST['data_cadastro'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


    $doador_id = $_POST[''];


    $intervalo_doacao = $_POST['intervalo_doacao'];
    $valor_doacao = $_POST['valor_doacao'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $bandeira_cartao = $_POST['bandeira_cartao'];
    $seis_primeiros_digitos = $_POST['seis_primeiros_digitos'];
    $quatros_ultimos_digitos = $_POST['quatros_ultimos_digitos'];
}
