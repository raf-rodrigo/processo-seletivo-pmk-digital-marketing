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
                <table>
                    
                </table>

            </div>
        <? endif ?>


    </div>
</section>
<?php
include('modalCreate.php');
?>