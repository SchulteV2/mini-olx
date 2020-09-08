<?php
    require_once('src/dao/CategoriaDAO.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $stmt = CategoriaDAO::update($id, $nome);

    header("Location: /categorias/index.php")
?>