<?php
require_once('src/utils/FlashMessages.php');

$errors = FlashMessages::getMessages('error');
// Não precisa colocar o 'info', pq já esta como padrão
$infos = FlashMessages::getMessages();

?>

<?php if(isset($errors)) : ?>
    <ul class="alert alert-danger">
        <?php foreach($errors as $e) : ?>
            <li><?= $e ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>
<?php if(isset($infos)) : ?>
    <ul class="alert alert-info">
        <?php foreach($infos as $info) : ?>
            <li><?= $info ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>