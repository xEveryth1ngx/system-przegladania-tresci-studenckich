<?php

namespace App\Controller;
use App\Service\Router;
use App\Service\Templating;
use App\Service\Config;
use App\Model\Pracownik;

class PlanController 
{
    public function showPlanByPokoj(?int $budynek, ?int $numer, Templating $templating, Router $router)
    {
        // TODO: DODAC WYBOR BUDYNKU
        if ($numer === null) {
            $html = $templating->render('system/plan.html.php', [
                'router' => $router,
            ]);
            return $html;
        }

        // pobranie daty i formatowanie, tak zeby pasowalo do linku
        $today = date("Y-m-d") . "T00:00:00";
        $tomorrow = date("Y-m-d", strtotime("tomorrow")) . "T00:00:00";
        // tu current time zwykly i dla testu
        // $currentTime = date("H:i:s");
        // $currentTime = "08:16:00";
        // echo $numer . '<br>';
        // https://plan.zut.edu.pl/schedule_student.php?room=WI+WI1-+013&start=2023-01-09T00:00:00+01:00&end=2023-01-10T00:00:00+01:00
        $url = "https://plan.zut.edu.pl/schedule_student.php?room=WI+WI{$budynek}-+{$numer}&start={$today}&end={$tomorrow}";
        
        // zapytanie http
        $plan = file_get_contents($url, true);
        // formatowanie do tablicy
        $plan = json_decode($plan);

        $zajecia = [];
        foreach ($plan as $key => $zajecie) {
            if($key !== 0) {
                $startTime = explode('T', $zajecie->start)[1];
                $endTime = explode('T', $zajecie->end)[1];
                $zajecia[] = [
                    'start' => date("H:i", strtotime($startTime)),
                    'end' => date("H:i", strtotime($endTime)),
                    'title' => $zajecie->title,
                ];
                // if ($currentTime >= $startTime && $currentTime <= $endTime) {
                //     echo $zajecie->worker . "<br>";
                //     echo $zajecie->title . "<br>";
                // }

            }
        }

        // TODO: ZABEZPIECZENIE JEZELI NIE MA BUDYNKU LUB NUMERU
        if(isset($budynek) && isset($numer)){
            $pracownicy = Pracownik::getData($budynek, $numer);
        }
        else{
            $pracownicy = null;
        }

        $html = $templating->render('system/plan.html.php', [
            'router' => $router,
            'zajecia' => $zajecia,
            'pracownicy' => $pracownicy,
        ]);
        return $html;
    }

    
}