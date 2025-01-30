<?php

require_once __DIR__ . '/../conexao/Conexao.php';
class Controller
{
    public static function index()
    {
        try {
            $pdo = Conexao::getConexao();

            $sql = "
            SELECT 
                doadores.id as id,
                doadores.nome as nome,
                doadores.email as email,
                doadores.cpf as cpf,
                dados_doacao.id as doacao_id,
                dados_doacao.intervalo_doacao as intervalo_doacao,
                dados_doacao.valor_doacao as valor_doacao,
                dados_doacao.forma_pagamento as forma_doacao
            FROM 
                doadores
            LEFT JOIN 
                dados_doacao 
            ON 
                doadores.id = dados_doacao.doador_id;
        ";

            $stmt = $pdo->query($sql);

            // Verifica se a consulta retornou resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultados;

        } catch (PDOException $e) {
            var_dump("Erro ao executar a consulta: " . $e->getMessage());
            return [];
        }
    }

    public static function show()
    {
        try {

            $pdo = Conexao::getConexao();

            $sql = "
                SELECT 
                    doadores.id AS doador_id,
                    doadores.nome AS doador_nome,
                    doadores.email AS doador_email,
                    doadores.cpf AS doador_cpf,
                    doadores.telefone AS doador_telefone,
                    doadores.data_nascimento AS doador_data_nascimento,
                    doadores.data_cadastro AS doador_data_cadastro,
                    doadores.cep AS doador_cep,
                    doadores.logradouro AS doador_logradouro,
                    doadores.numero AS doador_numero,
                    doadores.complemento AS doador_complemento,
                    doadores.bairro AS doador_bairro,
                    doadores.cidade AS doador_cidade,
                    doadores.estado AS doador_estado,
                    dados_doacao.id AS doacao_id,
                    dados_doacao.intervalo_doacao AS doacao_intervalo,
                    dados_doacao.valor_doacao AS doacao_valor,
                    dados_doacao.forma_pagamento AS doacao_forma_pagamento,
                    dados_doacao.banco AS doacao_banco,
                    dados_doacao.agencia AS doacao_agencia,
                    dados_doacao.conta AS doacao_conta,
                    dados_doacao.bandeira_cartao AS doacao_bandeira,
                    dados_doacao.cartao AS doacao_cartao,
                    dados_doacao.seis_primeiros_digitos AS doacao_seis_digitos,
                    dados_doacao.quatros_ultimos_digitos AS doacao_quatro_digitos
                FROM 
                    doadores
                LEFT JOIN 
                    dados_doacao 
                ON 
                    doadores.id = dados_doacao.doador_id;
            ";

            $stmt = $pdo->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Erro ao executar a consulta: " . $e->getMessage());
        }
    }

    public static function update($id, $dadosDoador, $dadosDoacao)
    {
        // Verificar se o ID é válido
        if (empty($id)) {
            return false;
        }

        try {
            // Obter a conexão com o banco de dados
            $db = Conexao::getConexao();

            // Atualizar os dados do doador
            $sqlDoador = "UPDATE doadores 
                          SET nome = :nome, email = :email, cpf = :cpf, telefone = :telefone, 
                              data_nascimento = :data_nascimento, data_cadastro = :data_cadastro,
                              cep = :cep, logradouro = :logradouro, numero = :numero, 
                              complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado
                          WHERE id = :id";

            $stmtDoador = $db->prepare($sqlDoador);
            $stmtDoador->execute([
                ':id' => $id,
                ':nome' => $dadosDoador['nome'],
                ':email' => $dadosDoador['email'],
                ':cpf' => $dadosDoador['cpf'],
                ':telefone' => $dadosDoador['telefone'],
                ':data_nascimento' => $dadosDoador['data_nascimento'],
                ':data_cadastro' => $dadosDoador['data_cadastro'],
                ':cep' => $dadosDoador['cep'],
                ':logradouro' => $dadosDoador['logradouro'],
                ':numero' => $dadosDoador['numero'],
                ':complemento' => $dadosDoador['complemento'],
                ':bairro' => $dadosDoador['bairro'],
                ':cidade' => $dadosDoador['cidade'],
                ':estado' => $dadosDoador['estado']
            ]);

            // Atualizar os dados de doação (se fornecidos)
            if (!empty($dadosDoacao)) {
                $sqlDoacao = "UPDATE dados_doacao 
                              SET intervalo_doacao = :intervalo_doacao, valor_doacao = :valor_doacao, 
                                  forma_pagamento = :forma_pagamento, banco = :banco, 
                                  agencia = :agencia, conta = :conta, bandeira_cartao = :bandeira_cartao, 
                                  cartao = :cartao, seis_primeiros_digitos = :seis_primeiros_digitos, 
                                  quatros_ultimos_digitos = :quatros_ultimos_digitos
                              WHERE doador_id = :doador_id";

                $stmtDoacao = $db->prepare($sqlDoacao);
                $stmtDoacao->execute([
                    ':doador_id' => $id,
                    ':intervalo_doacao' => $dadosDoacao['intervalo_doacao'],
                    ':valor_doacao' => $dadosDoacao['valor_doacao'],
                    ':forma_pagamento' => $dadosDoacao['forma_pagamento'],
                    ':banco' => $dadosDoacao['banco'],
                    ':agencia' => $dadosDoacao['agencia'],
                    ':conta' => $dadosDoacao['conta'],
                    ':bandeira_cartao' => $dadosDoacao['bandeira_cartao'],
                    ':cartao' => $dadosDoacao['cartao'],
                    ':seis_primeiros_digitos' => $dadosDoacao['seis_primeiros_digitos'],
                    ':quatros_ultimos_digitos' => $dadosDoacao['quatros_ultimos_digitos']
                ]);
            }

            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar dados: " . $e->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        // Verifique se o ID é válido
        if (empty($id)) {
            return false;
        }

        try {
            // Obter a conexão com o banco de dados usando o método estático de Conexao
            $db = Conexao::getConexao();

            // Preparar a query SQL para excluir o registro
            $sql = "DELETE FROM doadores WHERE id = :id";

            // Preparar a instrução SQL
            $stmt = $db->prepare($sql);

            // Vincular o parâmetro de ID
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Executar a query e verificar se foi bem-sucedido
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Em caso de erro, capturar a exceção e retornar false
            echo "Erro ao excluir doador: " . $e->getMessage();
            return false;
        }
    }
}