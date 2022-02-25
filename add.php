<?php
require_once 'vendor/autoload.php';

use Models\Compromisso;
use Models\Database;

require_once './includes/header.php';
?>

<div>
    <h1>Adicionar Compromisso</h1>
    <div>
        <form id="form" method="post" action="Controllers/add_compromisso.php" class="form-inline card">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
            <label for="localizacao">Localização:</label>
            <input type="text" name="localizacao" id="localizacao" class="form-control" required>
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" class="form-control" required>
            <div class="card">
                <label for="terminado">Feito:</label>
                <input type="radio" name="terminado" id="terminado" class="form-control">
            </div>
            <div class="card">
                <input type="submit" value="Adicionar" class="btn btn-primary" onclick="validateForm()">
                <input type="button" value="Limpar" onclick="clearForm()" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
<script>
    //clear the form
    function clearForm() {
        document.getElementById("nome").value = "";
        document.getElementById("descricao").value = "";
        document.getElementById("localizacao").value = "";
        document.getElementById("data").value = "";
        document.getElementById("terminado").checked = false;
    }
    function validateForm(){

    }
    //validate form
    document.getElementById("form").addEventListener("submit", validateForm);
</script>


<?php
require_once './includes/footer.php';
?>
