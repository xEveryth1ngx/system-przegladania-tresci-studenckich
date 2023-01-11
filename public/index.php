<?php
error_reporting(E_ERROR | E_PARSE);
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'donde-plan':
    case null:
        // $controller = new \App\Controller\SystemController();
        // $view = $controller->indexAction($templating, $router);
        $controller2 = new \App\Controller\PlanController();
        $view = $controller2->showPlanByPokoj($_REQUEST['numer'] ? $_REQUEST['numer'] : null, $templating, $router);
        break;
    case 'donde-szukaj':
        if (! ($_REQUEST['room'] || $_REQUEST['worker'])) {
            break;
        }
        $controller = new \App\Controller\SystemController();
        $view = $controller->findAction($_REQUEST['room'], $_REQUEST['worker'], $templating, $router);
        break;
    
    // case 'movie-show':
    //     if (! $_REQUEST['id']) {
    //         break;
    //     }
    //     $controller = new \App\Controller\MovieController();
    //     $view = $controller->showAction($_REQUEST['id'], $templating, $router);
    //     break;
    // case 'movie-delete':
    //     if (! $_REQUEST['id']) {
    //         break;
    //     }
    //     $controller = new \App\Controller\MovieController();
    //     $view = $controller->deleteAction($_REQUEST['id'], $router);
    //     break;
    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
