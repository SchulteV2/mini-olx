<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\CategoriaDAO;
    use App\utils\FlashMessages;
    
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::create($nome);
    FlashMessages::setMessage("Categoria adicionada com sucesso!");
    header("Location: /categorias/index.php")
?>
