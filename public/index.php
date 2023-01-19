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
        $view = $controller2->showPlanByPokoj($_REQUEST['budynek'] ? $_REQUEST['budynek'] : null, $_REQUEST['numer'] ? $_REQUEST['numer'] : null, $templating, $router);
        break;
    case 'donde-szukaj':
        // if (! ($_REQUEST['room'] || $_REQUEST['worker'])) {
        //     break;
        // }
        $controller = new \App\Controller\SzukajController();
       // $view = $controller->indexSzukaj($templating, $router);
        $view = $controller->indexSzukaj($_REQUEST['typ'] ? $_REQUEST['typ'] : null, $_REQUEST['data'] ? $_REQUEST['data'] : null,
         $_REQUEST['godzina'] ? $_REQUEST['godzina'] : null,
         $_REQUEST['p1'] ? $_REQUEST['p1'] : null,
         $_REQUEST['p2'] ? $_REQUEST['p2'] : null, $templating, $router);
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
