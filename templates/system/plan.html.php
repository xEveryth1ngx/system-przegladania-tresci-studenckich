<?php

/** @var array $zajecia */
/** @var \App\Service\Router $router */
/** @var \App\Controller\Pracownik[] $pracownik */


ob_start(); ?>
<div class="plan">
    <div class="date">data</div>
    <!-- <div class="lessonBox">
            <div class="time">8:15-9:45</div>
            <div class="lesson">Nazwa przedmiotu (L)</div>
        </div> -->
    <?php if (isset($zajecia)) { ?>
        <?php foreach ($zajecia as $zajecie) : ?>
            <div class="lessonBox">
                <div class="time"><?= $zajecie['start'] . '-' . $zajecie['end'] ?></div>
                <div class="lesson"><?= $zajecie['title'] ?></div>
            </div>
        <?php endforeach ?>
    <?php } ?>

</div>

<div class="right">
    <select name="building" id="buildingselect" onchange="chngimg()">

        <option selected value="WI1PP">WI1 piwnica</option>
        <option value="WI1P0">WI1 piętro 0</option>
        <option value="WI1P1">WI1 piętro 1</option>
        <option value="WI1P2">WI1 piętro 2</option>
        <option value="WI1P3">WI1 piętro 3</option>

        <option value="WI2PP">WI2 piwnica</option>
        <option value="WI2P0">WI2 piętro 0</option>
        <option value="WI2P1">WI2 piętro 1</option>
        <option value="WI2P2">WI2 piętro 2</option>
        <option value="WI2P3">WI2 piętro 3</option>

    </select>
    <div class="map">
        <svg height="450" width="60vw">
            <image href="/assets/images/WI1PP.svg" height="450" width="100%" id="WI1PP" />
            <image href="/assets/images/WI1P1.svg" height="450" width="100%" id="WI1P1" />
            <rect x="50" y="100" width="50" height="100" onclick="<?= $router->generatePath('donde-plan', ['budynek' => '1', 'numer' => '128']) ?>" style="fill:blue;stroke:pink;stroke-width:5;fill-opacity:0.1;stroke-opacity:0.9;"/>
        </svg>

    </div>
    <!-- TODO: TU RENDEROWAC TO FOREACH -->
    <?php foreach ($pracownicy as $pracownik) : ?>
        <div class="info">
            Link do planu zajęć: <a href="">Plan.com</a><br>
            Tytuł: <?= $pracownik->getStopien() ?><br>
            Imię: <?= $pracownik->getImie() ?><br>
            Nazwisko: <?= $pracownik->getNazwisko() ?><br>
        </div>
    <?php endforeach ?>
</div>

<script type="text/javascript" src="/assets/dist/plan.js"></script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
