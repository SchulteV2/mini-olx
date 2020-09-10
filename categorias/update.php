<?php
    require_once('src/dao/CategoriaDAO.php');
    require_once('src/utils/FlashMessages.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::update($id, $nome);
    FlashMessages::setMessage("Categoria atualizada com sucesso.");
    header("Location: /categorias/index.php")
?>