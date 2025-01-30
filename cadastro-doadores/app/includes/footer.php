<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white text-semigold">
    <div class="container"><small class="text-1">PMK - Digital Marketing &copy; 2025 By Rafael Rodrigo Doimo</small></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="../public/js/script.js"></script>


<script>
    flatpickr("#data_cadastro", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d/m/Y",
        placeholder: "Data de Cadastro (YYYY-MM-DD)"
    });
    flatpickr("#data_nascimento", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d/m/Y",
        placeholder: "Data Nascimento (DD/MM/YYYY)"
    });
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0000');
    });
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
    });
    $(document).ready(function() {
        $('#cep').mask('00000-000');
    });
    $(document).ready(function () {
        $('#valor_doacao').mask('#.##0,00', { reverse: true });
    });

</script>

</body>
</html>
