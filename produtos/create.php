<?php
    require_once('src/dao/ProdutoDAO.php');
    require_once('src/utils/ImageUpload.php');
    require_once('src/utils/FlashMessages.php');
    
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];
    $descricao = $_POST['descricao'];

    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = "/img/produtos/";
    $imageUpload->nome = $nome;
    $imageUpload->imagem = $_FILES['imagem'];
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true) {
        header("Location: /produtos/new.php?erro=" . implode("; ", $return));
        exit(0);
    }

    ProdutoDAO::create($nome, $preco, $imageUpload->uri, $categoria_id, $descricao);
    FlashMessages::setMessage("Produto adicionado com sucesso!");
    header("Location: /produtos/")
?>
