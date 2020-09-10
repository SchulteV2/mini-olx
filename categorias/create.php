<?php
    require_once('src/dao/CategoriaDAO.php');
    require_once('src/utils/FlashMessages.php');
    
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::create($nome);
    FlashMessages::setMessage("Categoria adicionada com sucesso!");
    header("Location: /categorias/index.php")
?>
