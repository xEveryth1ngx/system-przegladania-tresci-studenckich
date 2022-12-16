<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'movie-index':
    case null:
        $controller = new \App\Controller\MovieController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'movie-create':
        $controller = new \App\Controller\MovieController();
        $view = $controller->createAction($_REQUEST['movie'] ?? null, $templating, $router);
        break;
    case 'movie-edit':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\MovieController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['movie'] ?? null, $templating, $router);
        break;
    case 'movie-show':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\MovieController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'movie-delete':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\MovieController();
        $view = $controller->deleteAction($_REQUEST['id'], $router);
        break;
    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
