<?php

ob_start(); ?>

<select name="search" id="search-select">
<option selected value="pracownik">Pracownik</option>
<option value="pomieszczenie">Pomieszczenie</option>
</select>

    <form action="" id="pracownik_form">
        <label for="date">Data:</label>
        <input type="date" id="date" name="date"><br>

        <label for="time">Godzina:</label>
        <input type="" id="time" name="time"><br>

        <label for="fname">Imię:</label>
        <input type="text" id="fname" name="fname"><br>

        <label for="lname">Nazwisko:</label>
        <input type="text" id="lname" name="lname"><br>

        <input type="submit" value="Submit">
    </form>

    <form action="" id="pomieszczenie_form">
        <label for="date">Data:</label>
        <input type="date" id="date" name="date"><br>

        <label for="time">Godzina:</label>
        <input type="" id="time" name="time"><br>

        <label for="building">Budynek:</label>
        <select name="building" id="building-select">

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

        <label for="room_number">Numer pomieszczenia:</label>
        <input type="text" id="room_number" name="room_number"><br>

        <input type="submit" value="Submit">
    </form>

    <script type="text/javascript" src="/assets/dist/szukaj.js"></script>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';