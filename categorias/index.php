<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\CategoriaDAO;

    $stmt = CategoriaDAO::getAll();

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
            <?php include("partials/_flash_messages.php") ?>
            <div class="row">
                <?php include("partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Cadastro de Categorias <a href="/categorias/new.php" class="btn btn-success float-right">Nova Categoria</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>AÇÕES</th>
                        </tr>

                        <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nome ?></td>
                                <td>
                                    <a href="/categorias/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/categorias/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Você realmente deseja excluir a categoria: <?= $row->nome ?>')">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <?php include("partials/_javascript_import.php") ?>
</body>
</html>