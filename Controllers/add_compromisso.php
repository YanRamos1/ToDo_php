<?php
namespace Controllers;
require_once '../vendor/autoload.php';

use Models\Compromisso;
use Models\Database;


if (!$_POST == null) {
    if (isset($_POST)) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localizacao = $_POST['localizacao'];
        $data = $_POST['data'];
        $created_at = date('Y-m-d');
        if (isset($_POST['terminado'])) {
            $terminado = 1;
        }
        else {
            $terminado = 0;
        }
        $compromisso = new Compromisso();
        $compromisso->setNome($nome);
        $compromisso->setDescricao($descricao);
        $compromisso->setLocalizacao($localizacao);
        $compromisso->setData($data);
        $compromisso->setCreated_at($created_at);
        $compromisso->setTerminado($terminado);
        $compromisso->save();
        return true;
    }
}

