<?php
    require_once('src/dao/ProdutoDAO.php');
    require_once('src/utils/ImageUpload.php');
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $categoria_id = $_POST['categoria_id'];
    $descricao = $_POST['descricao'];

    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = "/img/produtos/";
    $imageUpload->nome = $nome;
    $imageUpload->imagem = $_FILES['imagem'];
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true) {
        header("Location: /produtos/edit.php?id=$id&erro=" . implode("; ", $return));
        exit(0);
    }

    $stmt = ProdutoDAO::update($id, $nome, $preco, $imageUpload->uri, $categoria_id, $descricao);

    header("Location: /produtos/")
?>
