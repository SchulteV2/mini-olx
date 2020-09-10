<?php
    require_once('src/dao/CategoriaDAO.php');
    require_once('src/utils/FlashMessages.php');
    
    $id = $_GET['id'];

    $stmt = CategoriaDAO::delete($id);
    FlashMessages::setMessage("Categoria excluida com sucesso!");
    header("Location: /categorias/index.php")
?>