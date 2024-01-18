<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>delete kamer 2</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #f44336;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>
<h1>Klant verwijderen</h1>
<p>Hier kunt u een kamer verwijderen</p>
<h1>Delete klant 2</h1>
<p>
    Hier kunt u een kamer verwijderen
</p>

<?php
require "../src/kamer/Kamer.php";

$kamerId=$_POST["kameridvak"];

$kamer1 = new Kamer($kamerId);
$kamer1->deleteKamer();
?>
</body>
</html>
