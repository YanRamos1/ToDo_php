<?php
require_once '../vendor/autoload.php';

use Models\Compromisso;
use Models\Database;

try {
    $id = $_POST['id'];
    $compromisso = new Compromisso();
    $compromisso->delete($id);


} catch (\Exception $e) {
    echo $e->getMessage();
}


?>

