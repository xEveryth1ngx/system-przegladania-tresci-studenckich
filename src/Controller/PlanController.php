<?php

namespace App\Controller;
use App\Service\Router;
use App\Service\Templating;
class PlanController 
{
    public function showPlanByPokoj(int $numer, Templating $templating, Router $router)
    {
        $today = date("Y-m-d") . "T00:00:00";
        $tomorrow = date("Y-m-d", strtotime("tomorrow")) . "T00:00:00";
        // $currentTime = date("H:i:s");
        $currentTime = "08:16:00";
        echo $numer . '<br>';
        // https://plan.zut.edu.pl/schedule_student.php?room=WI+WI1-+013&start=2023-01-09T00:00:00+01:00&end=2023-01-10T00:00:00+01:00
        $url = "https://plan.zut.edu.pl/schedule_student.php?room=WI+WI1-+{$numer}&start={$today}&end={$tomorrow}";
        
        $plan = file_get_contents($url, true);
        $plan = json_decode($plan);
        foreach ($plan as $key => $zajecie) {
            if($key !== 0) {
                $startTime = explode('T', $zajecie->start)[1];
                $endTime = explode('T', $zajecie->end)[1];
                if ($currentTime >= $startTime && $currentTime <= $endTime) {
                    echo $zajecie->worker . "<br>";
                    echo $zajecie->title . "<br>";
                }
            }
        }
    }
}