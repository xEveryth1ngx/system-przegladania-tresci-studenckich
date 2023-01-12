<?php
/** @var array $zajecia */
/** @var \App\Service\Router $router */

ob_start(); ?>
    <div class="plan">
        <div class="date">data</div>
        <!-- <div class="lessonBox">
            <div class="time">8:15-9:45</div>
            <div class="lesson">Nazwa przedmiotu (L)</div>
        </div> -->
    <?php if (isset($zajecia)) { ?>
    <?php foreach ($zajecia as $zajecie): ?>
        <div class="lessonBox">
            <div class="time"><?= $zajecie['start'] . '-' .$zajecie['end'] ?></div>
            <div class="lesson"><?= $zajecie['title'] ?></div>
        </div>
    <?php endforeach ?>
    <?php } ?>

    </div>

    <div class="right">
        <select name="building" id="building-select" onchange="changeImage(this);">

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
                <image href="/assets/images/WI1P1.svg" height="450" width="100%" id="floor"/>
            </svg>

        </div>
        <div class="info">
            Link do planu zajęć: <a href="">Plan.com</a><br>
            Tytuł:<br>
            Imię:<br>
            Nazwisko:<br>
            Gdzie może przebywać:
        </div>
    </div>

    <script type="text/javascript" src="../../public/plan.js"></script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
