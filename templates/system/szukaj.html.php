<?php

ob_start(); ?>



<div class="formBox">
    <select name="search" id="search-select" onchange="hide()">
        <option selected value="pracownik">Pracownik</option>
        <option value="pomieszczenie">Pomieszczenie</option>
    </select>

    <form action="<?= $router->generatePath('donde-szukaj') ?>", method="post", id="pracownik_form">

        <input type="hidden" id="" name="typ" value="pracownik"><br>

        <label for="data">Data:</label>
        <input type="date" id="date" name="data"><br>

        <label for="godzina">Godzina:</label>
        <input type="text" id="time" name="godzina"><br>

        <label for="p1">Imię:</label>
        <input type="text" id="fname" name="p1"><br>

        <label for="p2">Nazwisko:</label>
        <input type="text" id="lname" name="p2"><br>

        <input type="submit" value="Submit">
    </form>

    <form action="<?= $router->generatePath('donde-szukaj') ?>", method="post" id="pomieszczenie_form">

        <input type="hidden" id="" name="typ" value="pomieszczenie"><br>

        <label for="data">Data:</label>
        <input type="date" id="date" name="data"><br>

        <label for="godzina">Godzina:</label>
        <input type="text" id="time" name="godzina"><br>

        <label for="building">Budynek:</label>

        <select class="formSelect" name="p1" id="building-select">

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

        </select><br>

        <label for="p2">Numer pomieszczenia:</label>
        <input type="text" id="room_number" name="p2"><br>

        <input type="submit" value="Submit">
    </form>
</div>


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
        </svg>

    </div>
    <!-- TODO: TU RENDEROWAC TO FOREACH -->
    <?php foreach ($pracownicy as $pracownik) : ?>
        <div class="info">
            Link do planu zajęć: <a href="https://plan.zut.edu.pl/">Plan</a><br>
            Tytuł: <?= $pracownik->getStopien() ?><br>
            Imię: <?= $pracownik->getImie() ?><br>
            Nazwisko: <?= $pracownik->getNazwisko() ?><br>
        </div>
    <?php endforeach ?>
</div>

<script type="text/javascript" src="/assets/dist/szukaj.js"></script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
