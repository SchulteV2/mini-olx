<?php
    set_include_path( '..' . DIRECTORY_SEPARATOR);

    require_once('src/dao/ProdutoDAO.php');

    if(isset($_GET['categoria_id'])) {
        $stmt_produtos = ProdutoDAO::getByCategoriaId($_GET['categoria_id']);
    } else {
        $stmt_produtos = ProdutoDAO::getAll();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("partials/_head.php") ?>
    <title>Mini OLX</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->

    <?php include("partials/_header.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Produtos</h2>

                    <div class="row">
                        <?php while($produto = $stmt_produtos->fetch(PDO::FETCH_OBJ)) : ?>
                            <div class="col-md-4 produto">
                                <div class="border">
                                    <h4><?= $produto->nome ?></h4>

                                    <?php if($produto->url_imagem_produto) : ?>
                                        <img src="<?= $produto->url_imagem_produto ?>" alt="<?= $produto->nome ?>" />
                                    <?php else : ?>
                                        <img src="/img/no-image.png" />
                                    <?php endif ?>

                                    <p><?= substr($produto->descricao, 0, 140) . "..." ?></p>
                                    <p><a href="/produtos/show.php?id=<?= $produto->id ?>" class="btn btn-success">Ver Mais</a></p>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("partials/_javascript_import.php") ?>
</body>
</html>