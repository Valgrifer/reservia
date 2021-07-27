<?php
include_once "dbutils_val.php";

$envcontents = explode("\r", file_get_contents("./.env"));

foreach ($envcontents as $line) if($line)
    {
        $split = explode("=", $line);

        if(sizeof($split) < 2)
            continue;

        $_ENV[$split[0]] = substr($line, strlen($split[0]) + 1);
        unset($line, $split);
    }

unset($envcontents);

?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $_ENV["APPNAME"] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= $_ENV["BASEURL"] ?>style.css" />
    </head>
    <body>
        <header>

        </header>
        <main>

        </main>
        <footer>

        </footer>
    </body>
</html>
