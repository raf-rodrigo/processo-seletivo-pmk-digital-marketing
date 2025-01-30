<?php

require_once __DIR__ . '/../controller/Controller.php';

$dados = Controller::index();

?>

<!-- Sessão Principal -->
<section class="page-section master min-vh-90 mb-0" id="master">
    <div class="container">
        <!-- Cabeçalho da Sessão -->
        <h4 class="page-section-heading text-center text-uppercase text-1_5 text-semibold text-secondary mb-0 mt-2 my-auto">Registros</h4>
        <div class="d-flex justify-content-end my-4">
            <button type="button" class="btn btn-outline-primary text-semibold" data-bs-toggle="modal" data-bs-target="#createDoadorModal">Novo Registro</button>
        </div>
        <? if (empty($dados)):?>
            <div class="w-100 mv-5">
                <p class="text-center">Nenhum Doador Cadastrado</p>
            </div>
        <? else: ?>
            <div class="w-100">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Intervalo Doações</th>
                            <th scope="col">Valor Doação</th>
                            <th scope="col">Forma Doação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($dados as $dado): ?>
                        <tr>
                            <td><?=$dado['nome']?></td>
                            <td><?=$dado['email']?></td>
                            <td><?=$dado['cpf']?></td>
                            <td><?=$dado['intervalo_doacao']?></td>
                            <td><?=$dado['valor_doacao']?></td>
                            <td><?=$dado['forma_doacao']?></td>
                            <td>
                                <div>
                                    <a href="#"><span title="Editar Registro"><img src="../public/assets/icon/edit.svg" width="20" height="20"/></span></a>
                                    <button class="btn btn-link" onclick="openConfirmationModal(<?=$dado['id'] ?>)"><span title="Excluir Registro">
                                            <img src="../public/assets/icon/trash.svg" width="20" height="20"/></span></button>
                                </div>
                            </td>
                        </tr>
                        <? endforeach ?>
                    </tbody>
                </table>
            </div>
        <? endif ?>


    </div>
</section>

<div id="confirmationModal" class="modal">
    <div class="modal-dialog border border-opacity-100 border-danger rounded-4">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja excluir este registro? <span style="display: none" id="modalRecordId"></span></p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="../deletarDoador.php">
                    <input type="hidden" id="recordId" name="id">
                    <button class="btn btn-outline-primary" type="button" onclick="closeConfirmationModal()">Cancelar</button>
                    <button class="btn btn-outline-danger" type="submit">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include('modalCreate.php');
?>