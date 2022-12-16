<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Model\movie;
use App\Service\Router;
use App\Service\Templating;

class MovieController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $movies = Movie::findAll();
        $html = $templating->render('movie/index.html.php', [
            'movies' => $movies,
            'router' => $router,
        ]);
        return $html;
    }

    public function createAction(?array $requestMovie, Templating $templating, Router $router): ?string
    {
        if ($requestMovie) {
            $movie = Movie::fromArray($requestMovie);
            // @todo missing validation
            $movie->save();

            $path = $router->generatePath('movie-index');
            $router->redirect($path);
            return null;
        } else {
            $movie = new Movie();
        }

        $html = $templating->render('movie/create.html.php', [
            'movie' => $movie,
            'router' => $router,
        ]);
        return $html;
    }

    public function editAction(int $MovieId, ?array $requestMovie, Templating $templating, Router $router): ?string
    {
        $movie = Movie::find($MovieId);
        if (!$movie) {
            throw new NotFoundException("Missing movie with id $MovieId");
        }

        if ($requestMovie) {
            $movie->fill($requestMovie);
            // @todo missing validation
            $movie->save();

            $path = $router->generatePath('movie-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('movie/edit.html.php', [
            'movie' => $movie,
            'router' => $router,
        ]);
        return $html;
    }

    public function showAction(int $MovieId, Templating $templating, Router $router): ?string
    {
        $movie = Movie::find($MovieId);
        if (!$movie) {
            throw new NotFoundException("Missing movie with id $MovieId");
        }

        $html = $templating->render('movie/show.html.php', [
            'movie' => $movie,
            'router' => $router,
        ]);
        return $html;
    }

    public function deleteAction(int $MovieId, Router $router): ?string
    {
        $movie = Movie::find($MovieId);
        if (!$movie) {
            throw new NotFoundException("Missing movie with id $MovieId");
        }

        $movie->delete();
        $path = $router->generatePath('movie-index');
        $router->redirect($path);
        return null;
    }
}
