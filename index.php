<?php
include_once "dbutils_val.php";
include_once "utils.php";

$nav = [
    new nav_items("Hébergements", "#hebergements"),
    new nav_items("Activités", "#activites")
];

$imgsize = "3_medium";

$ville = "Maseille";

$filters = [
    ["name" => "Économique", "icon" => "dollar"],
    ["name" => "Familial", "icon" => "little-kid"],
    ["name" => "Romantique", "icon" => "loving"],
    ["name" => "Animaux autorisés", "icon" => "protection"],
];

$populars = [
        new Card("Hôtel Le soleil du matin", "emile-guillemot-Bj_rcSC5XfE-unsplash.jpg", 128, 5),
        new Card("Au cœur de l'eau Chambres d'hôtes", "aw-creative-VGs8z60yT2c-unsplash.jpg", 71, 4),
        new Card("Hôtel Tout bleu et Blanc", "febrian-zakaria-sjvU0THccQA-unsplash.jpg", 68, 4),
];

$hebergements = [
    new Card("Auberge la Cannebière", "marcus-loke-WQJvWU_HZFo-unsplash.jpg", 25, 4),
    new Card("Hôtel du port", "fred-kleber-gTbaxaVLvsg-unsplash.jpg", 52, 5),
    new Card("Hôtel Les mouettes", "reisetopia-B8WIgxA_PFU-unsplash.jpg", 76, 4),
    new Card("Hôtel de la mer", "emile-guillemot-Bj_rcSC5XfE-unsplash.jpg", 46, 3),
    new Card("Auberge Le panier", "nicate-lee-kT-ZyaiwBe0-unsplash.jpg", 23, 4),
    new Card("Hôtel chez Anima", "febrian-zakaria-M6S1WvfW68A-unsplash.jpg", 96, 5),
];

$activitys = [
    new Card("Vieux Port", "reno-laithienne-QUgJhdY5Fyk-unsplash.jpg"),
    new Card("Fort de Pomègues", "paul-hermann-QFTrLdQIRhI-unsplash.jpg"),
    new Card("Îles du Frioul", "kevin-hikari-rV_Qd1l-VXg-unsplash.jpg"),
    new Card("Parc National des Calanques", "kilyan-sockalingum-NR8-cBCN3aI-unsplash.jpg"),
    new Card("Notre-Dame-de-la-Garde", "florian-wehde-xW9e8gdotxI-unsplash.jpg"),
    new Card("Parc Longchamp", "lena-paulin-wH2-EJoDcV0-unsplash.jpg"),
];

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
foreach ($filters as $filter)
{
?>                    <div class="pill bold">
                            <span class="icon <?= $filter["icon"] ?>"></span><?= $filter["name"] ?>
                        </div>
<?php } ?>
                </div>
                <div class="row flex-direction-row" id="filterinfo">
                    <span class="icon tiny info"></span>
                    <span style="padding-top: 5px">Plus de 500 logements sont disponibles dans cette ville</span>
                </div>
            </div>
            <section id="hebergements">
                <div id="popular" class="col-12 secondary">
                    <div class="row flex-direction-row justify-content-space-between">
                        <h3>Les plus populaires</h3>
                        <h2 class="icon font stats"></h2>
                    </div>
                    <div class="row flew-wrap-wrap">
<?php
foreach ($populars as $popolar)
{
?>
                        <div class="card flex-direction-row">
                            <img class="card-img" src="<?= url("images/hebergements/$imgsize/{$popolar->getImg()}")?>" alt="<?= $popolar->getTitle() ?>">
                            <div class="card-content">
                                <h4 class="card-title"><?= $popolar->getTitle() ?></h4>
                                <p>Nuit à partir de <?= $popolar->getPrice() ?><span class="font-bold">€</span></p>
                                <div class="note"><?php
                                    for ($x = 0; $x < 5; $x++)
                                    {
                                    ?>
                                    <div class="star<?= $x < $popolar->getScore() ? " fill" : "" ?>"></div><?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
<?php
}
?>
                    </div>
                </div>
                <div id="result" class="col-12 secondary-mb">
                    <div class="row"><h3>Hébergements à <?= $ville ?></h3></div>
                    <div class="row flew-wrap-wrap">
<?php
foreach ($hebergements as $hebergement)
{
?>
                            <div class="card">
                                <img class="card-img" src="<?= url("images/hebergements/$imgsize/{$hebergement->getImg()}")?>" alt="<?= $hebergement->getTitle() ?>">
                                <div class="card-content">
                                    <h4 class="card-title"><?= $hebergement->getTitle() ?></h4>
                                    <p>Nuit à partir de <?= $hebergement->getPrice() ?><span class="font-bold">€</span></p>
                                    <div class="note">
<?php
for ($x = 0; $x < 5; $x++)
{
?>
                                        <div class="star<?= $x < $hebergement->getScore() ? " fill" : "" ?>"></div>
<?php
}
?>
                                    </div>
                                </div>
                            </div>
<?php
}
?>
                    </div>
                    <div class="row" style="margin-top: 30px;"><h3>Afficher plus</h3></div>
                </div>
            </section>
            <section id="activites">
                <div id="result" class="col-12 secondary-mb">
                    <div class="row"><h3>Activités à <?= $ville ?></h3></div>
                    <div class="row flew-wrap-wrap">
<?php
foreach ($activitys as $activity)
{
?>
                            <div class="card full-size">
                                <img class="card-img" src="<?= url("images/activites/$imgsize/{$activity->getImg()}")?>" alt="<?= $activity->getTitle() ?>">
                                <h4 class="card-content card-title"><?= $activity->getTitle() ?></h4>
                            </div>
<?php
}
?>
                    </div>
                </div>
            </section>
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
