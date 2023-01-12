<?php

namespace App\Controller;
use App\Service\Router;
use App\Service\Templating;

class SzukajController 
{
    public function indexSzukaj(Templating $templating, Router $router)
    {
       $html = $templating->render('system/szukaj.html.php', [
        'router' => $router,
       ]);
       return $html;
    }
}