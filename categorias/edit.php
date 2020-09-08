<?php
    require_once('src/dao/CategoriaDAO.php');
    
    $id = $_GET['id'];

    $stmt = CategoriaDAO::getById($id);

    $categoria = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("partials/_head.php") ?>
    <title>Mini OLX - Categorias</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->

    <?php include("partials/_header.php") ?>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Edição de Categorias</h2>

                    <form action="/categorias/update.php?id=<?= $categoria->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $categoria->id ?>" />
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $categoria->nome ?>" />
                            </div>
                        </div>
                            <p>
                                <input type="submit" value="Atualizar" class="btn btn-success float-right">
                            </p>
                    </form>

                </div>

            </div>
        </div>
    </section>

    <?php include("../partials/_javascript_import.php") ?>
</body>

</html>