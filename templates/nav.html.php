<?php

/** @var $router \App\Service\Router */

?>
<img src="/assets/images/zutlogo.jpg" class="open-button" onclick="hideLoginForm()">
<a href="<?= $router->generatePath('') ?>">Sekcja Plan</a>
<a href="<?= $router->generatePath('donde-szukaj') ?>">Sekcja Szukaj</a>

<div class="loginDiv">
    <form action="" id="login_form">

        <label for="login">Login:</label>
        <input type="text" id="login" name="login"><br>

        <label for="haslo">Haslo:</label>
        <input type="text" id="lname" name="haslo"><br>

        <input type="submit" value="Submit">
    </form>
</div>


<script type="text/javascript" src="/assets/dist/nav.js"></script>

<?php
