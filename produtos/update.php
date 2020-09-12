<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;
    use App\utils\ImageUpload;
    
    $id = $_POST['id'];
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
        FlashMessages::setMessage($return, "error");
        FlashMessages::setMessage("Deu erro mas não fique triste");
        header("Location: /produtos/edit.php?id=$id");
        exit(0);
    }

    $return = ProdutoDAO::update($id, $nome, $preco, $imageUpload->uri, $categoria_id, $descricao);
    FlashMessages::setMessage("Produto atualizado com sucesso.");
    header("Location: /produtos/")
?>
