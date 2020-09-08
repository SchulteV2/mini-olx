<?php
    require_once('src/dao/CategoriaDAO.php');
    
    $id = $_GET['id'];

    $stmt = CategoriaDAO::delete($id);

    header("Location: /categorias/index.php")
?>