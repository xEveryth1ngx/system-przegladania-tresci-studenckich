<!DOCTYPE html>
<html>

<head>

    <title>ZUT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/dist/style.min.css">
</head>

<body>
    <div class="nav">
        <img src="/assets/images/zutlogo.jpg">
        <a href="">Sekcja Plan</a>
        <a href="">Sekcja Szukaj</a>
    </div>


    <div class="main">
        <div class="plan">
            <div class="date">data</div>
            <div class="lessonBox">
                <div class="time">8:15-9:45</div>
                <div class="lesson">Nazwa przedmiotu (L)</div>
            </div>
        </div>

        <div class="right">
            <select name="building" id="building-select">

                <option selected value="WI1PP">WI1 piwnica</option>
                <option value="WI1P1">WI1 piętro 0</option>
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
                    <image href="/assets/images/plan-pietro-pierwsze.svg" height="450" width="100%" />
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

    </div>
</body>

</html>