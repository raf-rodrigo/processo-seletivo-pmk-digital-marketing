<div class="modal modal-xl fade" id="createDoadorModal" tabindex="-2" role="dialog" aria-labelledby="createDoadorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Registro de Doador</h5>
            </div>
            <form action="creaateDoador.php" method="POST">
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required/>
                        </div>
                        <div class="form-group col">
                            <input type="email" id="email" name="email" class="form-control" placeholder="email" required/>
                        </div>
                    </div>
t
                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder=Telefone"" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="data_cadastro" name="data_cadastro" class="form-control" placeholder="Data de Cadastro" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="numero" name="numero" class="form-control" placeholder="Número" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="intervalo_doacao" name="intervalo_doacao" class="form-control" placeholder="Intervalo de Doação" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="valor_doacao" name="valor_doacao" class="form-control" placeholder="Valor Doação" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="forma_pagamento" name="forma_pagamento" class="form-control" placeholder="Forma de Pagamento" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="banco" name="banco" class="form-control" placeholder="Banco" required/>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="agencia" name="agencia" class="form-control" placeholder="Agencia" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="conta" name="conta" class="form-control" placeholder="Conta" required/>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="form-group col">
                            <input type="text" id="bandeira_cartao" name="bandeira_cartao" class="form-control" placeholder="" required/>
                        </div>
                        <div class="form-group col">
                            <input type="text" id="numero_cartao" name="numero_cartao" class="form-control" placeholder="" required/>
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