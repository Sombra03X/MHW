<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>create monster 2</title>
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
        <li><a href="../../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>
<h1>Create kamer 2</h1>

<?php
require "../../classes/monsters.php";

$monster_name =$_POST["monster_name"];
$monster_type =$_POST["monster_type"];
$monster_threatLevel = $_POST["monster_threatLevel"];
$monster_weakness1 = $_POST["monster_weakness1"];
$monster_weakness2 = $_POST["monster_weakness2"];
$monster_blight = $_POST["monster_blight"];
$monster_status = $_POST["monster_status"];
$monster_image = $_POST["monster_image"];
$monster_characteristics = $_POST["monster_characteristics"];
$monster_id = NULL;

$monsters1 = new Monsters(
    $monster_name,
    $monster_type,
    $monster_threatLevel,
    $monster_weakness1,
    $monster_weakness2,
    $monster_blight,
    $monster_status,
    $monster_image,
    $monster_characteristics,
    $monster_id
);
$monsters1->createMonster();
?>
</body>
</html>
