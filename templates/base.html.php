<!DOCTYPE html>
<html>
    <head>
    <title>ZUT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/dist/style.min.css">
    </head>

    <body>
        <div class="nav"><?php require(__DIR__ . DIRECTORY_SEPARATOR . 'nav.html.php') ?></div>
        <div class="main"><?= $main ?? null ?></div>
    </body>
</html>