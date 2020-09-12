<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;
    
    $id = $_GET['id'];

    $stmt = ProdutoDAO::delete($id);
    FlashMessages::setMessage("Produto excluido com sucesso!");
    header("Location: /produtos/")
?>