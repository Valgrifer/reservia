<?php
include_once "dbutils_val.php";
include_once "utils.php";

$nav = [
    new nav_items("Hébergements", "#hebergements"),
    new nav_items("Activités", "#activites")
];

?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $_ENV["APPNAME"] ?></title>

        <link rel="preload" href="<?= url("font/Raleway-VariableFont_wght.ttf") ?>" as="font" type="font/ttf" crossorigin>

        <link rel="stylesheet" type="text/css" media="screen" href="<?= url("style.css") ?>" />
    </head>
    <body>
        <header>
            <span class="logo">
                <a href="<?= url("#") ?>">
                    <img src="<?= url($_ENV["APPLOGO"]) ?>" alt="<?= $_ENV["APPNAME"] ?> Logo">
                </a>
            </span>
            <nav>
                <ul>
<?php
for ($x = 0; $x < sizeof($nav); $x++)
{
    ?>                    <li><a href="<?= url($nav[$x]->getSlug()) ?>"<?= $x === 0 ? " class=\"active\"" : "" ?>><?= $nav[$x]->getName() ?></a></li>
<?php } ?>
                </ul>
                <span class="register">
                    <a href="<?= url("#") ?>">S'inscrire</a>
                </span>
            </nav>
        </header>
        <main>

        </main>
        <footer>

        </footer>
    </body>
</html>
