<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white text-semigold">
    <div class="container"><small class="text-1">PMK - Digital Marketing &copy; 2025 By Rafael Rodrigo Doimo</small></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="../public/js/script.js"></script>

<script>
    flatpickr("#data_cadastro", {
        dateFormat: "Y-m-d",
        placeholder: "Data de Cadastro (YYYY-MM-DD)"
    });
    flatpickr("#data_nascimento", {
        dateFormat: "Y-m-d",
        placeholder: "Data Nascimento (YYYY-MM-DD)"
    });
</script>

</body>
</html>
