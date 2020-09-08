<?php
    require_once('src/dao/ProdutoDAO.php');
    
    $id = $_GET['id'];

    $stmt = ProdutoDAO::delete($id);

    header("Location: /produtos/")
?>