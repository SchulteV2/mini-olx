<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\CategoriaDAO;
    use App\utils\FlashMessages;

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::update($id, $nome);
    FlashMessages::setMessage("Categoria atualizada com sucesso.");
    header("Location: /categorias/index.php")
?>