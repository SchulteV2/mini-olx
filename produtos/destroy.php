<?php
    require_once('src/dao/ProdutoDAO.php');
    require_once('src/utils/FlashMessages.php');
    
    $id = $_GET['id'];

    $stmt = ProdutoDAO::delete($id);
    FlashMessages::setMessage("Produto excluido com sucesso!");
    header("Location: /produtos/")
?>