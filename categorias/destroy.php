<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\CategoriaDAO;
    use App\utils\FlashMessages;

    $id = $_GET['id'];

    $stmt = CategoriaDAO::delete($id);
    FlashMessages::setMessage("Categoria excluida com sucesso!");
    header("Location: /categorias/index.php")
?>