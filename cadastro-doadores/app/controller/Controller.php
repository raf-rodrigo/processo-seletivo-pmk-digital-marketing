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

    public static function show($id) {
        $pdo = Conexao::getConexao();

        $sql = "SELECT 
                    d.id AS doador_id, d.nome, d.email, d.cpf, d.telefone, 
                    d.data_nascimento, d.data_cadastro, d.cep, d.logradouro, 
                    d.numero, d.complemento, d.bairro, d.cidade, d.estado,
                    dd.id AS doacao_id, dd.intervalo_doacao, dd.valor_doacao, 
                    dd.forma_pagamento, dd.banco, dd.agencia, dd.conta, 
                    dd.bandeira_cartao, dd.cartao, dd.seis_primeiros_digitos, 
                    dd.quatros_ultimos_digitos
                FROM doadores d
                LEFT JOIN dados_doacao dd ON d.id = dd.doador_id
                WHERE d.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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