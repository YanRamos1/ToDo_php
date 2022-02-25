<?php
require_once 'vendor/autoload.php';

use Models\Compromisso;
use Models\Database;

require_once './includes/header.php';
?>

<?php

    $compromisso = new Compromisso();
    if(isset($_GET['id'])){
        $compromisso = $compromisso->getById($_GET['id']);
        echo '<div class="card">';
        echo '<h1>Excluir compromisso</h1>';
        if(!$compromisso['nome'] == null){
            echo '<p>Tem certeza que deseja excluir o compromisso: ' . $compromisso['nome'] . '?</p>';
            echo '<input type="text" value='.$compromisso['descricao'] .'>';
            echo '<form method="post" action="./Controllers/delete_compromisso.php">';
            echo '<input type="hidden" name="id" value="' . $compromisso['id'] . '">';
            echo '<input type="submit" value="Excluir">';
            echo '<button><a href="index.php" style="text-decoration: none">Não</a></button>';
            echo '</form>';
        }else{
            echo '<p>Não foi possível excluir o compromisso.</p>';
            echo '<button onclick="history.back()">Voltar</button>';
        }
    }else{
        echo '<div class="card">';
        echo '<p>Não foi possível excluir o compromisso.</p>';
        echo '<button onclick="history.back()">Voltar</button>';
        echo '</div>';
    }
    echo '</div>';

?>



<?php
require_once './includes/footer.php';
?>
