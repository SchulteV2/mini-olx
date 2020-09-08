<?php
    require_once('src/dao/CategoriaDAO.php');
    
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::create($nome);

    header("Location: /categorias/index.php")
?>
