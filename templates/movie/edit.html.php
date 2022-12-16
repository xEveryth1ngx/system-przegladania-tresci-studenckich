<?php

/** @var \App\Model\Movie $movie */
/** @var \App\Service\Router $router */

$title = "Edit Post {$movie->getTitle()} ({$movie->getId()})";
$bodyClass = "edit";

ob_start(); ?>
    <h1><?= $title ?></h1>
    <form action="<?= $router->generatePath('movie-edit') ?>" method="movie" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . '_form.html.php'; ?>
        <input type="hidden" name="action" value="movie-edit">
        <input type="hidden" name="id" value="<?= $movie->getId() ?>">
    </form>

    <ul class="action-list">
        <li>
            <a href="<?= $router->generatePath('movie-index') ?>">Back to list</a></li>
        <li>
            <form action="<?= $router->generatePath('movie-delete') ?>" method="movie">
                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                <input type="hidden" name="action" value="movie-delete">
                <input type="hidden" name="id" value="<?= $movie->getId() ?>">
            </form>
        </li>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
