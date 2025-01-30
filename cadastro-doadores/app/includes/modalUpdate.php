<?php

require_once __DIR__ . '/../controller/Controller.php';
//die('chegando aqui');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $dados = Controller::show($id);

    if (!$dados) {
        die("Doador não encontrado.");
    }
} else {
    die("ID não fornecido.");
}

?>
<div class="modal modal-xl fade" id="createDoadorModal" tabindex="-2" role="dialog" aria-labelledby="createDoadorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Registro de Doador</h5>
            </div>
            <form action="../createDoador.php" method="POST">
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" />
                        </div>
                        <div class="form-group col">
                            <input type="email" id="email" name="email" class="form-control" placeholder="email" />
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col-3">
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" />
                        </div>
                        <div class="form-group col-3">
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" />
                        </div>
                        <div class="form-group col-3">
                            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" />
                        </div>
                        <div class="form-group col-3">
                            <input type="text" id="data_cadastro" name="data_cadastro" class="form-control" placeholder="Data de Cadastro" />
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col-3">
                            <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" />
                        </div>
                        <div class="form-group col-7">
                            <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" />
                        </div>
                        <div class="form-group col-2">
                            <input type="text" id="numero" name="numero" class="form-control" placeholder="Número" />
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col-2">
                            <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento" />
                        </div>
                        <div class="form-group col-4">
                            <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" />
                        </div>
                        <div class="form-group col-3">
                            <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" />
                        </div>
                        <div class="form-group col-3">
                            <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" />
                        </div>
                    </div>

                    <hr>

                    <div class="row my-2">
                        <div class="form-group col-4">
                            <select id="intervalo_doacao" name="intervalo_doacao" class="form-control">
                                <option selected>Intervalo de Doação</option>
                                <option value="unico">Único</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <input type="text" id="valor_doacao" name="valor_doacao" class="form-control" placeholder="Valor Doação" />
                        </div>
                        <div class="form-group col-4">
                            <label for="debito">
                                <input type="radio" id="debito" name="forma_pagamento" value="Débito"> Débito
                            </label>
                            <label for="credito">
                                <input type="radio" id="credito" name="forma_pagamento" value="Crédito"> Crédito
                            </label>
                        </div>
                    </div>

                    <div class="row my-2" id="dados_bancarios" style="display: none">
                        <div class="form-group col-4">
                            <input type="text" id="banco" name="banco" class="form-control" placeholder="Banco" />
                        </div>
                        <div class="form-group col-4">
                            <input type="text" id="agencia" name="agencia" class="form-control" placeholder="Agencia" />
                        </div>
                        <div class="form-group col-4">
                            <input type="text" id="conta" name="conta" class="form-control" placeholder="Conta" />
                        </div>
                    </div>

                    <div class="row my-2" id="dados_credito" style="display: none">
                        <div class="form-group col">
                            <input type="text" id="bandeira_cartao" name="bandeira_cartao" class="form-control" placeholder="Bandeira Cartão" />
                        </div>
                        <div class="form-group col">
                            <input type="text" id="cartao" name="cartao" class="form-control" placeholder="Número Cartão" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/" type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/footer.php';
