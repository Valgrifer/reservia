<?php
include_once "dbutils_val.php";

$envcontents = explode("\r", file_get_contents("./.env"));

foreach ($envcontents as $line) if($line)
    {
        $split = explode("=", $line);

        if(sizeof($split) < 2)
            continue;

        define($split[0], substr($line, strlen($split[0]) + 1));
        unset($line, $split);
    }

unset($envcontents);


?><!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Reservia</title>
    </head>
    <body>

    </body>
</html>
