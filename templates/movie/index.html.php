<?php

/** @var \App\Model\Movie[] $movies */
/** @var \App\Service\Router $router */

$title = 'Movie List';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Movie List</h1>

    <a href="<?= $router->generatePath('movie-create') ?>">Create new</a>

    <ul class="index-list">
        <?php foreach ($movies as $movie): ?>
            <li><h3><?= $movie->getTitle() ?></h3>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('movie-show', ['id' => $movie->getId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('movie-edit', ['id' => $movie->getId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
