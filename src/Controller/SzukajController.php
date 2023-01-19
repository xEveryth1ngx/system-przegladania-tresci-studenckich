<?php

namespace App\Controller;
use App\Service\Router;
use App\Service\Templating;

class SzukajController 
{
    public function indexSzukaj($typ,$data, ?string $godzina, ?string $p1, ?string $p2, Templating $templating, Router $router)
    {
       if(!isset($typ))
       {
        $html = $templating->render('system/szukaj.html.php', [
            'router' => $router,
           ]);
       }
       else if ($typ === "pracownik" )
       {
        echo($typ);
        echo($data);
        echo($godzina);
        echo($p1);
        echo($p2);
       }
       
       else if($typ === "pomieszczenie")
       {
        echo($typ);
        echo($data);
        echo($godzina);
        echo($p1);
        echo($p2);


       }


       return $html;
    }



}