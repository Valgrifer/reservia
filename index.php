<?php
include_once "dbutils_val.php";
include_once "utils.php";

$nav = [
    new nav_items("Hébergements", "#hebergements"),
    new nav_items("Activités", "#activites")
];

$ville = "Maseille";

$filters = [
    ["name" => "Économique", "icon" => "dollar"],
    ["name" => "Familial", "icon" => "little-kid"],
    ["name" => "Romantique", "icon" => "loving"],
    ["name" => "Animaux autorisés", "icon" => "protection"],
];

$popular = [];

$hebergement = [];

$activity = [];

?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $_ENV["APPNAME"] ?></title>

        <link rel="preload" href="<?= url("font/Raleway-VariableFont_wght.ttf") ?>" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?= url("font/Raleway-ExtraBold.ttf") ?>" as="font" type="font/ttf" crossorigin>

        <link rel="stylesheet" type="text/css" media="screen" href="<?= url("style.css") ?>" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?= url("icon.css") ?>" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?= url("utils.css") ?>" />
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
            <div class="section">
                <div class="row">
                    <h2>Trouver votre hébergement pour des vacances de rêve</h2>
                </div>
                <div class="row" style="margin-top: 5px">
                    <p>En plein centre ville ou en plaine nature</p>
                </div>
                <div class="row" style="margin-top: 25px">
                    <form class="input-group">
                        <label class="secondary icon location" for="search"></label>
                        <input type="text" class="input-form" name="search" id="search" value="<?= $ville ?>, France">
                        <input type="submit" class="primary input-form" name="search" value="Recherche">
                    </form>
                </div>
                <div class="row" style="margin-top: 20px">
                    <h3>Filtres</h3>
                </div>
                <div class="row flex-direction-row flex-wrap-wrap" id="filter">
<?php
for ($x = 0; $x < sizeof($filters); $x++)
{
    ?>                    <div class="pill bold">
                            <span class="icon <?= $filters[$x]["icon"] ?>"></span><?= $filters[$x]["name"] ?>
                        </div>
<?php } ?>
                </div>
                <div class="row flex-direction-row" id="filterinfo">
                    <span class="icon tiny info"></span>
                    <span style="padding-top: 5px">Plus de 500 logements sont disponibles dans cette ville</span>
                </div>
            </div>
        </main>
        <footer class="section secondary">
            <div class="row col-4-md">
                <h3>A propos</h3>
                <ul>
                    <li><a href="#">Fonctionnement du site</a></li>
                    <li><a href="#">Conditions générales de vente</a></li>
                    <li><a href="#">Données et confidentialité</a></li>
                </ul>
            </div>
            <div class="row col-4-md">
                <h3>No hébergements</h3>
                <ul>
                    <li><a href="#">Charte qualité</a></li>
                    <li><a href="#">Soumettre votre hôtel</a></li>
                </ul>
            </div>
            <div class="row col-4-md">
                <h3>Assistance</h3>
                <ul>
                    <li><a href="#">Centre d'aide</a></li>
                    <li><a href="#">Nous contacter</a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>
