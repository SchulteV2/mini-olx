<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\CategoriaDAO;
    use App\dao\ProdutoDAO;
    
    $id = $_GET['id'];

    $stmt_cat = CategoriaDAO::getAll();
    
    $stmt_prod = ProdutoDAO::getById($id);
    $produto = $stmt_prod->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("partials/_head.php") ?>
    <title>Mini OLX - Produtos</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->

    <?php include("partials/_header.php") ?>

    <section id="content">
        <div class="container">
            <?php include("partials/_flash_messages.php") ?>
            <div class="row">
                <?php include("partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Edição de Produto</h2>

                    <form action="/produtos/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $produto->id ?>">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto->nome ?>" />
                            </div>
                        </div>    

                        <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="imagem" name="imagem" />
                                <?php if($produto->url_imagem_produto) : ?>
                                    <img src="<?= $produto->url_imagem_produto ?>" alt="<?= $produto->nome ?>" class="mt-2" />
                                <?php else : ?>
                                    <img src="/img/no-image.png" />
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="preco" name="preco" value="<?= $produto->preco ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_id" class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="categoria_id" name="categoria_id" >
                                    <?php while($categoria = $stmt_cat->fetch(PDO::FETCH_OBJ)) : ?>
                                        <option <?= ($produto->categoria_id == $categoria->id) ? "selected" : "" ?> value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea name="descricao" id="descricao" rows="15"><?= $produto->descricao ?></textarea>
                            </div>
                        </div>

                            <p>
                                <input type="submit" value="Cadastrar" class="btn btn-info float-right">
                            </p>
                    </form>

                </div>

            </div>
        </div>
    </section>

    <?php include("partials/_javascript_import.php") ?>
</body>

</html>