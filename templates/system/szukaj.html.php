<?php

ob_start(); ?>
<select name="search" id="search-select">
<option selected value="pracownik">Pracownik</option>
<option value="pomieszczenie">Pomieszczenie</option>
</select>

    <form action="">
        <label for="date">Data:</label>
        <input type="date" id="date" name="date"><br>

        <label for="time">Godzine:</label>
        <input type="" id="time" name="time"><br>

        <label for="fname">Imię:</label>
        <input type="text" id="fname" name="fname"><br>

        <label for="lname">Nazwisko:</label>
        <input type="text" id="lname" name="lname"><br>

        <input type="submit" value="Submit">
    </form>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';