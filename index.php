<?php
require_once 'vendor/autoload.php';
use Models\Compromisso;
use Models\Database;
require_once './includes/header.php';
?>


<?php
$compromissos = new Compromisso();
$compromissos = $compromissos->all();
?>

<div style="margin: 20px">
    <table class="table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Localização</th>
            <th>Data</th>
            <th>Criado em</th>
            <th>Terminado</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($compromissos as $compromisso) {
                echo "<tr>";
                echo "<td>{$compromisso['nome']}</td>";
                echo "<td>{$compromisso['descricao']}</td>";
                echo "<td>{$compromisso['localização']}</td>";
                $data = new DateTime($compromisso['data']);
                echo "<td>{$data->format('d/m/Y')}</td>";
                $created_at = new DateTime($compromisso['created_at']);
                echo "<td>{$created_at->format('d/m/Y')}</td>";
                if($compromisso['terminado'] == 1) {
                    echo "<td>Sim</td>";
                } else {
                    echo "<td>Não</td>";
                }
                echo "<td style='justify-content: center; display: flex;'>
                    <a href='editar.php?id={$compromisso['id']}' class='btn btn-primary'>Editar</a>
                    <a href='delete.php?id={$compromisso['id']}' class='btn btn-danger'>Excluir</a>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<?php
require_once './includes/footer.php';
?>

