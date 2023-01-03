<?php

namespace App\Controller;

// use App\Exception\NotFoundException;
// use App\Model\movie;

use App\Service\Router;
use App\Service\Templating;

class SystemController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
       return '';
    }

    public function showAction(Templating $templating, Router $router): ?string
    {
        // $movie = Movie::find($MovieId);
        // if (!$movie) {
        //     throw new NotFoundException("Missing movie with id $MovieId");
        // }

        // $html = $templating->render('movie/show.html.php', [
        //     'movie' => $movie,
        //     'router' => $router,
        // ]);
        return null;
    }

    public function findAction(int $room, int $worker, Templating $templating, Router $router): ?string
    {
        // $movie = Movie::find($MovieId);
        // if (!$movie) {
        //     throw new NotFoundException("Missing movie with id $MovieId");
        // }

        // $html = $templating->render('movie/show.html.php', [
        //     'movie' => $movie,
        //     'router' => $router,
        // ]);
        return null;
    }

    public function deleteAction(int $MovieId, Router $router): ?string
    {
        // $movie = Movie::find($MovieId);
        // if (!$movie) {
        //     throw new NotFoundException("Missing movie with id $MovieId");
        // }

        // $movie->delete();
        // $path = $router->generatePath('movie-index');
        // $router->redirect($path);
        return null;
    }
}
