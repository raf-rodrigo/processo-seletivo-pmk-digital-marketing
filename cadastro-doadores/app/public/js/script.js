document.addEventListener('DOMContentLoaded', function() {
    const formaPagamentoRadioButtons = document.getElementsByName('forma_pagamento');
    const dadosBancarios = document.getElementById('dados_bancarios');

    // Função para exibir ou ocultar os campos bancários
    function toggleDadosBancarios() {
        if (document.getElementById('debito').checked) {
            dadosBancarios.style.display = 'block';  // Exibe os campos
        } else {
            dadosBancarios.style.display = 'none';   // Oculta os campos
        }
    }

    // Adiciona event listeners para os radio buttons
    formaPagamentoRadioButtons.forEach(radio => {
        radio.addEventListener('change', toggleDadosBancarios);
    });

    // Chama a função para verificar o estado inicial
    toggleDadosBancarios();
});

function openConfirmationModal(id) {
    document.getElementById('recordId').value = id;
    document.getElementById('confirmationModal').style.display = 'block';
}

function closeConfirmationModal() {
    document.getElementById('confirmationModal').style.display = 'none';
}

function submitForm() {
    document.getElementById('deleteForm').submit();
}

function openConfirmationModal(id) {
    // Atualizar o valor do campo oculto no formulário
    document.getElementById('recordId').value = id;
    // Exibir o ID no modal (opcional)
    document.getElementById('modalRecordId').textContent = id;
    // Exibir o modal
    var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    modal.show();
}

function closeConfirmationModal() {
    // Fechar o modal
    var modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
    modal.hide();
}
